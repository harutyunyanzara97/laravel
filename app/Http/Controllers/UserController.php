<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $user = User::where('id', Auth::user()->getId())
            ->first();
        $users=User::all();
        return view ('members',compact('users','user'));
    }
    public function network(){
        return view('network');
    }
    public function sign_up(){
        return view('signup');
    }
    public function login() {
        return view('login');
    }
    public function store(Request $request) {
        $user=new User();
        $valid=$request->validate(['email' => 'required|email|unique:users', 'password' => 'required|min:6']);
        if ($valid->fails()) {
            return redirect()->back()
                ->withErrors($valid)
                ->withInput();
        }
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();
         return redirect('/login');
    }
    public function signIn(Request $r){
        $validateLogin=Validator::make($r->all(),[
            'email'=>'required | email',
            'password'=>'required | min:6'
        ]);

        $user=User::where("email",$r->email)->first();
        $validateLogin->after(function ($validateLogin)
        use ($user,$r)
        {

            if(!$user){
                $validateLogin->errors()->add('email', 'Wrong email information!');

            }
            elseif(!Hash::check($r->password,$user->password)) {

                $validateLogin->errors()->add('password', 'Wrong password!');
            }

        });

        if ($validateLogin->fails()) {
            return redirect()->back()
                ->withErrors($validateLogin)
                ->withInput();
        }
        else {
            Session::put('user_id',$user->id);
            auth()->login($user);
        }
        return view('home',compact('user',$user));

     }
    public function  profile(){
        $user = User::where('id', Auth::user()->getId())
            ->first();
        return view('profile',compact('user',$user));
    }
    public function storeProfile(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        $request->validate(['name' => 'required', 'contact_email' => 'required|email']);
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
        $user = User::where('id', $request->id)->first();
        $user->fill($request->about);
        $user->save();
        return response()->json($user);
    }
    public function account() {
        $user = User::where('id', Auth::user()->getId())->first();
        return view('account',compact('user'));
    }
    public function myPosts() {
        return view('myPosts');
    }

    public function myComments() {
        return view('myComments');
    }


    public function logout (Request $r) {
        Session::forget('user_id');
        return Redirect::to('/login');
    }
}
