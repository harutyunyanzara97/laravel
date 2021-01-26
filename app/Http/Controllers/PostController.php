<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Follow;
class PostController extends Controller
{
//    public function index(Request $request)
//    {
//        $posts = Post::where('user_id', Auth::user()->getId())->with('categories')->get();
//        return view('network', compact('posts', $posts));
//    }
    public function create(Request $request){
        $post = new Post();
        $categories = Category::where('id',$post->category_id)->get();
        return view('createPost',compact('post','categories'));
    }
    public function store(Request $request){
        $newPost = new Post();
        $newPost->fill($request->all());
        $newPost->user_id=Auth::user()->getId();
        $newPost->save();
        if($request->hasfile('photo'))
        {

            foreach($request->file('photo') as $image)
            {
                $name=time().$image->getClientOriginalName();
                $image->move(public_path().'/images', $name);
                $newPost->images = $name;
                $newPost->save();

            }
        }
        return redirect()->back();

    }
}
