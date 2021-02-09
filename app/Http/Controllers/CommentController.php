<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function insertLikes(Request $request)
    {
        $likes = Like::where(['user_id' => Auth::user()->getId(), 'comment_id' => $request->id])->first();
        if (!$likes) {
            $likes = new Like();
            $likes->user_id = Auth::user()->getId();
            $likes->comment_id = $request->id;
            $likes->save();
        }
    }
    public function dislike(Request $request)
    {
        $likes = Like::where(['user_id' => Auth::user()->getId(), 'comment_id' => $request->id])->first();
        if ($likes) {
            $likes->delete();
        }
    }
}
