<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContributeController extends Controller
{
    public function contribute(){
        return view('contributors');
    }
}
