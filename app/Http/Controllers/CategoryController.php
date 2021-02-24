<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('followers', 'posts', 'comments')->orderBy('id', 'DESC')->paginate(5);
        return view('network', compact('categories'));


    }

    public function insertFollows(Request $request)
    {
        $follows = Follow::where(['user_id' => Auth::user()->getId(), 'category_id' => $request->id])->first();
        if (!$follows) {
            $follows = new Follow();
            $follows->user_id = Auth::user()->getId();
            $follows->category_id = $request->id;
            $follows->save();
        }
    }

    public function unfollow(Request $request)
    {
        $follows = Follow::where(['user_id' => Auth::user()->getId(), 'category_id' => $request->id])->first();
        if ($follows) {
            $follows->delete();
        }
    }



    public function showPosts(Request $request, $id)
    {
        $category = Category::where('id', $id)->first();
        $posts = Post::with('comments', 'likes')->where('category_id', $id)->orderBy('id', 'DESC')->paginate(5);
        return view('posts.posts', compact('category', $category, 'posts'));
    }




}



//$cat = Category::where('id', $request->id)->update(['name' => $request->name]);
//$cat->save();
//return Redirect::to('/network');
//}
