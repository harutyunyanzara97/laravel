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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Follow;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination;

class PostController extends Controller
{
    private $IMAGE = '';
    private $VIDEO = '';

    public function createPost($id)
    {
        $category = Category::where('id', $id)->first();
        return view('post-create', compact('category'));
    }

    public function comments($id)
    {
        $post = Post::where('id', $id)->with('categories')->first();
        $categories=Category::all();
        $postUser = Post::where('id', $id)->with('user')->first();
        $card = Card::where('user_id', Auth::id())->first();
        return view('post-comments', compact('post', 'postUser', 'card','categories'));
    }

    public function store(Request $request)
    {
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
        return view('post-created', compact('newPost'));
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
        if ($request->hasFile('video')) {
            foreach ($request->file('photo') as $video) {
                $file = Request::file('video');
                $filename = $file->getClientOriginalName();
                $path = public_path() . '/uploads/';
                $file->move($path, $filename);
                $comments->files = $filename;
                $comments->save();
            }
        }
        return Redirect::back();
    }

    public function deletePost(Request $request)
    {
        Post::where("id", $request->id)->delete();

        return Redirect::back();
    }

    public function followPost(Request $request)
    {
        $follow = Follow::where(['user_id' => $request->id, 'category_id' => 1])->first();
        if (!$follow) {
            $follow = new Follow();
            $follow->user_id = Auth::user()->getId();
            $follow->category_id = Auth::user()->getId();
            $follow->post_id = $request->postId;
            $follow->save();
        }
    }

    public function unfollowPost(Request $request)
    {
        $follow = Follow::where(['user_id' => $request->id])->first();
        if ($follow) {
            $follow->delete();
        }
    }
}
