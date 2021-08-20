<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Reply;
use App\Models\Like;
use App\Models\Answer;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use phpDocumentor\Reflection\Types\True_;

class CommentController extends Controller
{
    private static $IMAGE = '';

    public function deleteComment(Request $request)
    {
        Comment::where("id", $request->id)->delete();

        return Redirect::back();
    }

    public function deleteReply(Request $request)
    {
        Reply::where("id", $request->id)->delete();

        return Redirect::back();
    }
    public function deleteAnswer(Request $request)
    {
        Answer::where("id", $request->id)->delete();

        return Redirect::back();
    }
    public function likeComment(Request $request)
    {
        $comment = Comment::findOrFail($request->id);

        if (Auth::user()->liking_comments->contains($request->id)) {
            Auth::user()->liking_comments()->detach($comment->id);
            $like = 2;
        } elseif (!Auth::user()->liking_comments->contains($request->id)) {
            Auth::user()->liking_comments()->attach($comment->id);
            $like = 1;
        }


        return response()->json($like);

    }
    public function rate(Request $request)
    {
        $comment = Comment::findOrFail($request->id);
        if(Auth::user()->rating_comments->contains($request->id)) {
            Auth::user()->rating_comments()->detach($comment->id);
            $rate=2;

        }else {
            Auth::user()->rating_comments()->attach($comment->id,['title' => $request->type]);
            $rate=1;
        }
        return response()->json($rate);

    }
    public function reply_rate(Request $request)
    {

        $reply = Reply::where('id',$request->id)->first();
        if(Auth::user()->rating_replies->contains($request->id)) {
            Auth::user()->rating_replies()->detach($reply->id);
            $rate=2;

        }else {
            Auth::user()->rating_replies()->attach($reply->id,['title' => $request->type]);
            $rate=1;
        }
        return response()->json($rate);

    }
    public function reply(Request $request)
    {
        $comment = Comment::where('id', $request->id)->first();
        $reply = new Reply();
        $reply->title = $request->reply;
        $reply->comment_id = $comment->id;
        $reply->user_id = Auth::id();
        $reply->post_id = $request->post_id;

        if ($request->hasfile('photo')) {
            foreach ($request->file('photo') as $image) {
                $name = time() . $image->getClientOriginalName();
                self::$IMAGE .= $name . '/';
                $filename = substr(self::$IMAGE, 0, -1);
                $image->move(public_path() . '/images', $filename);
                $reply->images = $filename;

            }
        }
        $reply->save();

        return Redirect::back();
    }

    public function reply_to_reply(Request $request)
    {
        $reply = Reply::where('id', $request->id)->first();
        $reply_to_reply = new Answer();
        $reply_to_reply->name = $request->answer;
        $reply_to_reply->reply_id = $reply->id;
        $reply_to_reply->user_id = Auth::id();
        $is_chat = DB::select(DB::raw("SELECT COUNT($reply->id) as result FROM `answers` where user_id =:user1  or user_id =:user2 GROUP by user_id"),
            array('user1'      => $reply_to_reply->user_id,
                'user2'      => $reply->user_id
            ));
//        dd($is_chat[0]->result);

        if ($request->hasfile('photo')) {
            foreach ($request->file('photo') as $image) {
                $name = time() . $image->getClientOriginalName();
                self::$IMAGE .= $name . '/';
                $filename = substr(self::$IMAGE, 0, -1);
                $image->move(public_path() . '/images', $filename);
                $reply_to_reply->images = $filename;
            }
        }

//            if (intval($is_chat[0][0]->result < 4)) {
//                $reply_to_reply->save();
//                return back();
//
//            } else {
//                $chat_val = true;
//                return redirect()->back()->with('result', $chat_val);
//            }
        if($is_chat ) {
            if (intval($is_chat[0]->result) < 2) {
                $reply_to_reply->save();
                return back();

            } else {
                $chat_val = true;
                return redirect()->back()->with('result', $chat_val);
            }
        } else {
            $reply_to_reply->save();
            return back();
        }

    }

    public function chat(Request $request)
    {
        $reply = Reply::where('id', $request->id)->first();
        $reply_to_reply = new Answer();
        $reply_to_reply->name = $request->answer;
        $reply_to_reply->reply_id = $reply->id;
        $reply_to_reply->user_id = Auth::id();

//        dd($is_chat[0]->result);

        if ($request->hasfile('photo')) {
            foreach ($request->file('photo') as $image) {
                $name = time() . $image->getClientOriginalName();
                self::$IMAGE .= $name . '/';
                $filename = substr(self::$IMAGE, 0, -1);
                $image->move(public_path() . '/images', $filename);
                $reply_to_reply->images = $filename;
            }
        }
        $reply_to_reply->save();
        return back();
    }
    public function dislike(Request $request)
    {
        $likes = Like::where(['user_id' => Auth::id(), 'comment_id' => $request->id])->first();
        if ($likes) {
            $likes->delete();
        }
    }

    public function editComment(Request $request)
    {
        $comment= Comment::where('id', $request->id)->first();
        $comment->description=$request->description;
        $comment->save();
        return Redirect::back();
    }
    public function editReply(Request $request)
    {
        $reply= Reply::where('id', $request->id)->first();
        $reply->title=$request->description;
        $reply->save();
        return Redirect::back();
    }
    public function editAnswer(Request $request)
    {
        $answer= Answer::where('id', $request->id)->first();
        $answer->name=$request->name;
        $answer->save();
        return Redirect::back();
    }
    public function myComments()
    {
        $posts = Post::with('comments')->orderBy('id', 'DESC')->paginate(6);
        $user = User::where('id', Auth::id())->first();
        return view('comments.my-comments', compact('posts', $posts, 'user', $user));
    }

    public function memberComments(Request $request)
    {
        $memberComments = Comment::where('user_id', $request->id)->with('likes')->get();
        $user = User::where('id', $request->id)->first();
        return view('comments.member-comments', compact('memberComments', $memberComments, 'user', $user));
    }
    public function rate_comment(Request $request)
    {
        $comment = Comment::where('id', $request->post)->first();
        if (Auth::user()->rate_comments->contains($request->post)) {
            Auth::user()->rate_comments()->detach($comment->id);
            Auth::user()->rate_comments()->attach($comment->id,['rate' => $request->id]);

            $rate = 2;
        } else {
            Auth::user()->rate_comments()->attach($comment->id,['rate' => $request->id]);
            $rate = 1;
        }
        return response()->json($rate);

    }

}
