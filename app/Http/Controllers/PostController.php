<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Like;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Follow;
class PostController extends Controller
{
    public function createPost(){
        return view('post_create');
    }
    public function comments(Request $request){
        return view('post_comments');
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
    public function insertComments(Request $request)
    {
        $comments = Comment::where(['user_id' => Auth::user()->getId(), 'post_id' => $request->id])->first();
        if (!$comments) {
            $comments = new Comment();
            $comments->user_id = Auth::user()->getId();
            $comments->post_id = $request->id;
            $comments->save();
        }
    }
    public function insertLikes(Request $request)
    {
        $likes = Like::where(['user_id' => Auth::user()->getId(), 'post_id' => $request->id])->first();
        if (!$likes) {
            $likes = new Like();
            $likes->user_id = Auth::user()->getId();
            $likes->post_id = $request->id;
            $likes->save();
        }
    }
}
