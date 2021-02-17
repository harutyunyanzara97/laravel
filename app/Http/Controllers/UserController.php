<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Category;
use App\Models\Follow;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Session;

class UserController extends Controller
{
    public function home(){
        $user = User::where('id', Auth::user()->getId())
            ->first();
        return view ('home',compact('user'));
    }
    public function members(){
        $users=User::all();
        return view ('members',compact('users'));
    }
    public function network(){
        return view('network');
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
        $user = User::where('id', Auth::user()->getId())->first();
        return view('account',compact('user'));
    }
    public function myPosts() {
        $myPosts=Post::with('comments')->where('user_id',Auth::user()->getId())->paginate(5);
        $user=User::where('id', Auth::user()->getId())->first();
        return view('my-posts',compact('myPosts',$myPosts,'user',$user));
    }

    public function myComments() {
        $myPosts=Post::with('comments.likes','likes')->where('user_id',Auth::user()->getId())->get();
        $user=User::where('id', Auth::user()->getId())->first();
        return view('my-comments',compact('myPosts',$myPosts,'user',$user));
    }
    public function card(Request $request){
        $card=new Card();
        $card->user_id=Auth::id();
        $card->fill($request->all());
        $card->save();

        Session::flash('success', 'Payment created successfully!');

        return back();
    }

}
