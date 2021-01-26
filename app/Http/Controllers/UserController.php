<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Session;

class UserController extends Controller
{
    public function home(){
        return view ('home');
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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
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

    public function logout (Request $r) {
        Session::forget('user_id');
        return Redirect::to('/login');
    }
}
