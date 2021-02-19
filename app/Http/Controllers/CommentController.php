<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Reply;
use App\Models\Like;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    public function insertLikes(Request $request)
    {
        $likes = Like::where(['user_id' => Auth::user()->getId(), 'comment_id' => $request->id])->first();
        if (!$likes) {
            $likes = new Like();
            $likes->user_id = Auth::user()->getId();
            $likes->post_id = $request->postId;
            $likes->comment_id = $request->id;
            $likes->save();
        }
    }

    public function reply(Request $request)
    {
        $comment = Comment::where('id', $request->id)->first();
        $reply = new Reply();
        $reply->title = $request->reply;
        $reply->comment_id = $comment->id;
        $reply->user_id = Auth::id();
        $reply->post_id = $request->post_id;
        $reply->save();
        if ($request->hasfile('photo')) {
            foreach ($request->file('photo') as $image) {
                $name = time() . $image->getClientOriginalName();
                $image->move(public_path() . '/images', $name);
                $reply->images = $name;
                $reply->save();
            }
        }
        return Redirect::back();
    }

    public function dislike(Request $request)
    {
        $likes = Like::where(['user_id' => Auth::user()->getId(), 'comment_id' => $request->id])->first();
        if ($likes) {
            $likes->delete();
        }
    }
    public function myComments() {
        $myPosts=Post::with('comments.likes','likes')->where('user_id',Auth::user()->getId())->get();
        $user=User::where('id', Auth::user()->getId())->first();
        return view('comments.my-comments',compact('myPosts',$myPosts,'user',$user));
    }
}
