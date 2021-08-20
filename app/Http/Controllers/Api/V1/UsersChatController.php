<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersChatController extends Controller
{
    public function index()
    {
        return User::orderBy('name')->where('id', '!=', Auth::id())->get();

    }

}
