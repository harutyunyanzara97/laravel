<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Card;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Like;
use App\Models\Category;
use App\Models\Reply;
use App\Models\User;
use App\Models\Post_follower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Follow;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination;
use Laravel\Cashier\Cashier;

class PostController extends Controller
{
    private $IMAGE = '';
    private $VIDEO = '';

    public function createPost($id)
    {
        $category = Category::where('id', $id)->first();
        return view('posts.post-create', compact('category'));
    }

    public function comments($id)
    {
        $post = Post::where('id', $id)->with('categories')->first();
        $categories = Category::all();
        $postUser = Post::where('id', $id)->with('user')->first();
        $cards=Card::where('user_id',Auth::id())->get();
        if (Auth::user() && $cards) {
            return view('comments.post-comments', compact('post', 'postUser', 'categories','cards'));
        } else {
            return view('comments.post-comments', compact('post', 'postUser', 'categories'));
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'unique:posts', 'max:255'],
            'description' => ['required']
        ]);
        if($validatedData) {
            $newPost = new Post();
            $newPost->fill($request->all());
            $newPost->user_id = Auth::user()->getId();
            $newPost->category_id = $request->id;
            $newPost->follow_id = 1;
            $newPost->save();
            if ($request->hasfile('photo')) {

                foreach ($request->file('photo') as $image) {
                    $name = time() . $image->getClientOriginalName();
                    $this->IMAGE .= $name . '/';
                    $image->move(public_path() . '/images/', $name);
                    $newPost->images = substr($this->IMAGE, 0, -1);
                }
                $newPost->save();
            }
            if($request->hasFile('file')){
                foreach ($request->file('file') as $video) {
                    $filename = $video->getClientOriginalName();
                    $path = public_path() . '/uploads/';
                  $video=$video->move($path, $filename);

                    $newPost->files = $video->getFilename();
                }
                $newPost->save();
            }
        } else {
            return redirect('createPost')
                ->withErrors($validatedData)
                ->withInput();
        }

        return view('posts.post-created', compact('newPost'));
    }

    public function insertComments(Request $request)
    {
        $comments = new Comment();
        $comments->description = $request->description;
        $comments->user_id = Auth::id();
        $comments->post_id = $request->id;
        $comments->category_id = $request->cat_id;
        $comments->save();
        if ($request->hasfile('photo')) {
            foreach ($request->file('photo') as $image) {
                $name = time() . $image->getClientOriginalName();
                $image->move(public_path() . '/images', $name);
                $comments->images = $name;
                $comments->save();
            }
        }

//        if ($request->hasFile('video')) {
//            foreach ($request->file('photo') as $video) {
//                $file = Request::file('video');
//                $filename = $file->getClientOriginalName();
//                $path = public_path() . '/uploads/';
//                $file->move($path, $filename);
//                $comments->files = $filename;
//                $comments->save();
//            }
//        }
        return Redirect::back();
    }

    public function deletePost(Request $request)
    {
        Post::where("id", $request->id)->delete();

        return Redirect::back();
    }

    public function followPost(Request $request)
    {
        $post=Post::findOrFail($request->id);

        if(Auth::user()->following_posts->contains($request->id)){
            Auth::user()->following_posts()->detach($post->id);
            $follow=2;
        }
        elseif(!Auth::user()->following_posts->contains($request->id)) {
            Auth::user()->following_posts()->attach($post->id);
            $follow=1;
        }

        return response()->json($follow);

    }

    public function myPosts()
    {
        $myPosts = Post::with('comments')->where('user_id', Auth::user()->getId())->paginate(5);
        $user = User::where('id', Auth::user()->getId())->first();
        return view('posts.my-posts', compact('myPosts', $myPosts, 'user', $user));
    }
    public function memberPosts(Request $request)
    {

        $memberPosts = Post::with('comments')->where('user_id', $request->id)->paginate(5);
        $user = User::where('id', $request->id)->first();
        return view('posts.member-posts', compact('memberPosts', $memberPosts, 'user', $user));
    }
    public function editPost(Request $request)
    {
        $modal_post = Post::with('categories')->where('id', $request->id)->first();
        $category = $modal_post->categories;
        return view('posts.edit-post', compact('modal_post','category'));
    }

    public function update(Request $request)
    {
        $post= Post::where('id', $request->id)->first();
        $post->update($request->all());
        if ($request->hasfile('photo')) {
            foreach ($request->file('photo') as $image) {
                $name = time() . $image->getClientOriginalName();
                $image->move(public_path() . '/images', $name);
                $post->images = $name;
                $post->save();
            }
        }
        return Redirect::back();
    }
}
