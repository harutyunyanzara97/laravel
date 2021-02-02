<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Like;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Follow;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function createPost($id){
        $category=Category::where('id',$id)->first();
        $user=User::where('id',Auth::user()->getId())->first();
        return view('post_create',compact('category','user'));
    }
    public function comments($id){
        $post=Post::where('id',$id)->first();
        $user=User::where('id',Auth::user()->getId())->first();
        return view('post_comments',compact('post','user'));
    }
    public function store(Request $request){
        $newPost = new Post();
        $newPost->fill($request->all());
        $newPost->user_id=Auth::user()->getId();
        $newPost->category_id=$request->id;
        $newPost->follow_id=1;
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
        $user=User::where('id',Auth::user()->getId())->first();
        return view('post_created',compact('newPost','user'));

    }
    public function insertComments(Request $request)
    {
        $comments = Comment::where(['user_id' => Auth::user()->getId(), 'post_id' => $request->id])->first();
        if (!$comments) {
            $comments = new Comment();
            $comments->fill($request->all());
            $comments->user_id = Auth::user()->getId();
            $comments->post_id = $request->id;
            $comments->save();
            if($request->hasfile('photo'))
            {

                foreach($request->file('photo') as $image)
                {
                    $name=time().$image->getClientOriginalName();
                    $image->move(public_path().'/images', $name);
                    $comments->images = $name;

                }
            }
            if($request::hasFile('video')) {
                foreach ($request->file('photo') as $video) {
                    $file = Request::file('video');
                    $filename = $file->getClientOriginalName();
                    $path = public_path() . '/uploads/';
                    $file->move($path, $filename);
                    $comments->files=$filename;
                    $comments->save();
                }
            }
        }
        return Redirect::back();
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
