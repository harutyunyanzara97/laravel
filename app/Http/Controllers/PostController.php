<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Card;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Like;
use App\Models\Category;
use App\Models\Rate;
use App\Models\Rates_post;
use App\Models\Rating;
use App\Models\Reply;
use App\Models\User;
use App\Models\Post_follower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use App\Models\Follow;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination;
use Laravel\Cashier\Cashier;

class PostController extends Controller
{
    private $IMAGE = '';
    private $VIDEO = '';
    private static $IMAGES = '';

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
        $cards = Card::where('user_id', Auth::id())->get();
        $helpful = Rates_Post::where('title', 'helpful')->where('leader_id', $post->id)->where('rater_id',Auth::id())->first();
//        $inflammatory = Rates_Post::where('title', 'inflammatory')->where('leader_id', $post->id)->get();
        if (Auth::user()) {
            $followed_posts = Auth::user()->following_posts()->get();
        }
        $calculated = Rates_Post::where('title', 'calculated')->where('leader_id', $post->id)->where('rater_id',Auth::id())->first();

        if (Auth::user() && $cards) {
            return view('comments.post-comments', compact('post', 'postUser', 'categories', 'cards', 'helpful', 'calculated', 'followed_posts'));
        } else {
            return view('comments.post-comments', compact('post', 'postUser', 'categories', 'helpful',  'calculated'));
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required']
        ]);
        if ($validatedData) {
            $newPost = new Post();
            $newPost->fill($request->all());
            $newPost->user_id = Auth::id();
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
            if ($request->hasFile('file')) {
                foreach ($request->file('file') as $video) {
                    $filename = $video->getClientOriginalName();
                    $path = public_path() . '/uploads/';
                    $video = $video->move($path, $filename);

                    $newPost->files = $video->getFilename();
                }
                $newPost->save();
            }
        } else {
            return redirect('createPost')
                ->withErrors($validatedData)
                ->withInput();
        }
        $category = Category::where('id', $request->id)->first();
        return redirect()->action(
            [CategoryController::class, 'showPosts'], ['id' => $category->id]
        );
    }

    public function rate(Request $request)
    {
        $post = Post::findOrFail($request->id);
        if (Auth::user()->rating_posts->contains($request->id)) {
            Auth::user()->rating_posts()->detach($post->id);
            $rate = 2;

        } else {
            Auth::user()->rating_posts()->attach($post->id, ['title' => $request->type]);
            $rate = 1;
        }
        return response()->json($rate);


    }

    public function insertComments(Request $request)
    {
        $comments = new Comment();
        $comments->description = $request->description;
        $comments->user_id = Auth::id();
        $comments->post_id = $request->id;
        $comments->category_id = $request->cat_id;
        if ($request->hasfile('photo')) {
            foreach ($request->file('photo') as $image) {
                $name = time() . $image->getClientOriginalName();
                self::$IMAGES .= $name . '/';
                $filename = substr(self::$IMAGES, 0, -1);
                $image->move(public_path() . '/images', $filename);
                $comments->images = $filename;
            }
        }
        $comments->save();

        return Redirect::back();
    }

    public function deletePost(Request $request)
    {
        Post::where("id", $request->id)->delete();

        return Redirect::back();
    }

    public function followPost(Request $request)
    {
        $post = Post::findOrFail($request->id);

        if (Auth::user()->following_posts->contains($request->id)) {
            Auth::user()->following_posts()->detach($post->id);
            $follow = 2;
        } elseif (!Auth::user()->following_posts->contains($request->id)) {
            Auth::user()->following_posts()->attach($post->id);
            $follow = 1;
        }

        return response()->json($follow);

    }

    public function likePost(Request $request)
    {
        $post = Post::findOrFail($request->id);

        if (Auth::user()->liking_posts->contains($request->id)) {
            Auth::user()->liking_posts()->detach($post->id);
            $like = 2;
        } elseif (!Auth::user()->liking_posts->contains($request->id)) {
            Auth::user()->liking_posts()->attach($post->id);
            $like = 1;
        }


        return response()->json($like);

    }

    public function myPosts()
    {
        $myPosts = Post::with('comments')->where('user_id', Auth::id())->get();
        $user = User::where('id', Auth::id())->first();
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
        return view('posts.edit-post', compact('modal_post', 'category'));
    }

    public function update(Request $request)
    {
        $post = Post::where('id', $request->id)->first();
        $post->update($request->all());
        if ($request->hasfile('photo')) {
            foreach ($request->file('photo') as $image) {
                $name = time() . $image->getClientOriginalName();
                $image->move(public_path() . '/images', $name);
                $post->images = $name;
                $post->save();
            }
        }
        echo '<script type="text/javascript">'
        , 'history.go(-2);'
        , '</script>';
    }
//    public function postStar (Request $request, Post $post) {
//        $rating = new Rating;
//        $rating->user_id = Auth::id();
//        $rating->rating = $request->input('star');
//        $post->ratings()->save($rating);
//        return redirect()->back();
//    }
    public function preview(Request $request) {
        $category = Category::where('id',$request->id)->first();
        $posts = $category->posts;
        $cards = Card::where('user_id', Auth::id())->get();
        return view('post-preview',compact('cards',$cards,'posts',$posts));
    }
    public function rate_post(Request $request)
    {
        $post = Post::where('id', $request->post)->first();
//        dd(Auth::user());
        if (Auth::user()->rate_posts->contains($request->post)) {
            Auth::user()->rate_posts()->detach($post->id);
            Auth::user()->rate_posts()->attach($post->id,['rate' => $request->id]);

            $rate = 2;
        } else {
            Auth::user()->rate_posts()->attach($post->id,['rate' => $request->id]);
            $rate = 1;
        }
//        $rating = new Rating();
//        $rating->rate = $request->id;
//        $rating->user_id = Auth::id();
//        $rating->post_id = $request->post;
//        $rating->save();
//        if ($request->id == 1) {
//            Auth::user()->rate_posts()->detach();
//            Auth::user()->rate_posts()->attach($post->id, ['rate' => $request->id]);
//            $rate = 1;
//        } else if ($request->id == 2) {
//            Auth::user()->rate_posts()->detach();
//            Auth::user()->rate_posts()->attach($post->id, ['rate' => $request->id]);
//            $rate = 2;
//        } else if ($request->id == 3) {
//            Auth::user()->rate_posts()->detach();
//            Auth::user()->rate_posts()->attach($post->id, ['rate' => $request->id]);
//            $rate = 3;
//        } else if ($request->id == 4) {
//            Auth::user()->rate_posts()->detach();
//            Auth::user()->rate_posts()->attach($post->id, ['rate' => $request->id]);
//            $rate = 4;
//        } else if ($request->id == 5) {
//            Auth::user()->rate_posts()->detach();
//            Auth::user()->rate_posts()->attach($post->id, ['rate' => $request->id]);
//            $rate = 5;
//        }
        return response()->json($rate);

    }
}
