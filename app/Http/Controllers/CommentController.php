<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Follow;
use App\Models\Like;
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
            $likes->post_id=$request->postId;
            $likes->comment_id = $request->id;
            $likes->save();
        }
    }
    public function reply(Request $request)
    {
        $comment = Comment::where('id',$request->id)->first();

            $comment->reply=$request->reply;
            $comment->save();
        if($request->hasfile('photo'))
        {
            foreach($request->file('photo') as $image)
            {
                $name=time().$image->getClientOriginalName();
                $image->move(public_path().'/images', $name);
                $comment->images = $name;
                $comment->save();
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
}
