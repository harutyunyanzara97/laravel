<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContributeController extends Controller
{
    public function contribute(){
        $card = Card::where('user_id', Auth::id())->first();
        $cards=Card::where('user_id',Auth::id())->get();
        return view('contributors',compact('card','cards'));
    }
}
