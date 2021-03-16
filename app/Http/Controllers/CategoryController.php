<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Follow;
use App\Models\Category_follower;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with( 'posts', 'comments')->orderBy('id', 'DESC')->paginate(5);
        return view('network', compact('categories'));


    }
    public function followCategory(Request $request)
    {
        $category=Category::findOrFail($request->id);

        if(Auth::user()->following_categories->contains($request->id)){
            Auth::user()->following_categories()->detach($category->id);
            $follow=2;
        }
        elseif(!Auth::user()->following_categories->contains($request->id)) {
            Auth::user()->following_categories()->attach($category->id);
            $follow=1;
        }

        return response()->json($follow);

    }

    public function showPosts($id)
    {
        $category = Category::where('id', $id)->first();
        $posts = Post::with('comments', 'likes')->where('category_id', $id)->orderBy('id', 'DESC')->paginate(5);
        return view('posts.posts', compact('category', $category, 'posts'));
    }
}
