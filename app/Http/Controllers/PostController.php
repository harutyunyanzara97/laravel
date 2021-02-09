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
    private  $IMAGE = '';
    private  $VIDEO = '';
    public function createPost($id){
        $category=Category::where('id',$id)->first();
        $user=User::where('id',Auth::user()->getId())->first();
        return view('post_create',compact('category','user'));
    }
    public function comments($id){
        $post=Post::where('id',$id)->with('categories')->first();
        $postUser=Post::where('id',$id)->with('user')->first();
        $user=User::where('id',Auth::user()->getId())->first();
        return view('post_comments',compact('post','user','postUser'));
    }
    public function store(Request $request){
        $newPost = new Post();
        $newPost->fill($request->all());
        $newPost->user_id=Auth::user()->getId();
        $newPost->category_id=$request->id;
        $newPost->follow_id=1;
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
        $user=User::where('id',Auth::user()->getId())->first();
        return view('post_created',compact('newPost','user'));
    }
    public function insertComments(Request $request)
    {
            $comments = new Comment();
            $comments->description=$request->description;
            $comments->user_id = Auth::user()->getId();
            $comments->post_id = $request->id;
            $comments->category_id = $request->cat_id;
            $comments->save();
            if($request->hasfile('photo'))
            {
                foreach($request->file('photo') as $image)
                {
                    $name=time().$image->getClientOriginalName();
                    $image->move(public_path().'/images', $name);
                    $comments->images = $name;
                    $comments->save();
                }
            }
            if($request->hasFile('video')) {
                foreach ($request->file('photo') as $video) {
                    $file = Request::file('video');
                    $filename = $file->getClientOriginalName();
                    $path = public_path() . '/uploads/';
                    $file->move($path, $filename);
                    $comments->files=$filename;
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
}
