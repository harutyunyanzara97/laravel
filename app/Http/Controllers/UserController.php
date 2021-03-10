<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Category;
use App\Models\Follow;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Post;
use Illuminate\Pagination;
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
        $users=User::orderBy('id', 'DESC')->paginate(6);
        return view ('members',compact('users'));
    }
    public function followUser(Request $request)
    {
        $follow = Follow::where(['user_id' =>$request->id])->first();
        if (!$follow) {
            $follow = new Follow();
            $follow->user_id = Auth::id();
            $follow->save();
            if($follow->save()) {
            $user=User::where('id',$request->id)->first();
            $user->notify=1;
            $user->follower_id=Auth::id();
            $user->save();
            }
        }
    }
    public function unfollowUser(Request $request)
    {
        $user=User::where('id',$request->id)->first();
        $follow = Follow::where(['user_id' => $request->id])->first();
        if ($follow) {
            $follow->delete();
            $user->follower_id === 0;

        }
    }

    public function  profile(){
        $posts=Post::where('user_id',Auth::id())->get();
        $cards=Card::where('user_id',Auth::id())->get();
        $comments=Comment::where('user_id',Auth::id())->get();
        return view('profile',compact('posts','comments','cards'));
    }
    public function  membeProfile($id){
        $member=User::where('id',$id)->first();
        $posts=Post::where('user_id',$member->id)->get();
        $comments=Comment::where('user_id',$member->id)->get();
        return view('member-profile',compact('posts','comments','member'));
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
        $user = User::where('id', $request->id)->update(['about'=>$request->about]);
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
        $cards=Card::where('user_id',Auth::id())->get();
        $transactions = Transaction::with('user','seller')->where('user_id',$user->id)->get();
        $seller_transactions = Transaction::with('user','seller')->where('to_id',$user->id)->get();
        if (Auth::user() && $transactions) {
            return view('balance', compact('user', 'balance', 'card', 'transactions', 'seller_transactions', 'cards'));
        } else
        return view('balance',compact('user','balance','card','transactions','seller_transactions'));
    }

}
