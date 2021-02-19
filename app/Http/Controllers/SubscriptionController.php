<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use Illuminate\Support\Facades\Auth;
use Stripe;
use Session;

class SubscriptionController extends Controller
{
    public function create(Request $request)
    {
        Stripe\Stripe::setApiKey('sk_test_51IDT1rLV6S2YaGRAJ4BLZcGt468ETmMzHuGWlHVv7MBTjjLda3pXurPbmwD74BalNTuV7kLhiqbiwKBfKTuRnjqq00pKL4vtzv');
        $payment = Stripe\Charge::create([
            "amount" => 100 * 150,
            "currency" => "inr",
            "source" => $request->stripeToken,
            "description" => "Making test payment."
        ]);
        echo '<script type="text/javascript">'
        , 'history.go(-1);'
        , '</script>';

    }
}

