<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Category;
use App\Models\Follow;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Laravel\Cashier\Cashier;
use Session;

class UserController extends Controller
{
    public function members(){
        $users=User::all();
        return view ('members',compact('users'));
    }
    public function followUser(Request $request)
    {
        $follow = Follow::where(['user_id' =>$request->id])->first();
        if (!$follow) {
            $follow = new Follow();
            $follow->user_id = Auth::user()->getId();
            $follow->save();
        }
    }
    public function unfollowUser(Request $request)
    {
        $follow = Follow::where(['user_id' => $request->id])->first();
        if ($follow) {
            $follow->delete();
        }
    }

    public function  profile(){
        $posts=Post::where('user_id',Auth::user()->getId())->get();
        $comments=Comment::where('user_id',Auth::user()->getId())->get();
        return view('profile',compact('posts',$posts,'comments',$comments));
    }
    public function storeProfile(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        $request->validate(['name' => 'required']);
        $user->fill($request->all());
        $user->save();
        if($request->hasfile('photo'))
        {

            foreach($request->file('photo') as $image)
            {
                $name=time().$image->getClientOriginalName();
                $image->move(public_path().'/images', $name);
                $user->avatar_url = $name;
                $user->save();

            }
        }
        echo '<script type="text/javascript">'
        , 'history.go(-1);'
        , '</script>';
    }
    public function editProfile(Request $request){
//        dd($request->id);
        $user = User::where('id', $request->id)->update(['about'=>$request->about]);
//        $user->save();
        return response()->json($user);
    }
    public function updateUser(Request $request){
        $user = User::where('id', $request->id)->first();
        if($request->hasfile('photo'))
        {
            foreach($request->file('photo') as $image)
            {
                $name=time().$image->getClientOriginalName();
                $image->move(public_path().'/images', $name);
                $user->avatar_url = $name;
                $user->save();
            }
        }
        return Redirect::back();
    }
    public function account() {
        $user = Auth::user();
        return view('account',compact('user'));
    }

    public function balance() {
        $user =  Auth::user();
        $card = Card::where('user_id', $user->id)->first();
        $balance=$user->balance;
        $transactions = Transaction::with('user','seller')->where('user_id',$user->id)->get();
        $seller_transactions = Transaction::with('user','seller')->where('to_id',$user->id)->get();
        return view('balance',compact('user','balance','card','transactions','seller_transactions'));
    }

//    public function card(Request $request){
//        $user=Auth::user();
//
//        Session::flash('success', 'Payment created successfully!');
//
//        return view('comments.post-comments',compact($card));
//    }

}
