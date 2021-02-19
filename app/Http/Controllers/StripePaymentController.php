<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('payment');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $user=$request->user();
        $charged_user=User::where('id',$request->id)->first();
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
         $transaction=Stripe\Charge::create([
            "amount" => 100 * $request->price,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment."
        ]);

        if ($transaction) {
            $amount = floatval($request->price);
            $charged_user->balance += $amount - ($amount * 10) / 100;
            $charged_user->save();
            $user->balance -= $amount;
            $user->save();

            $user_transaction = new Transaction();
            $user_transaction->id = $transaction->id;
            $user_transaction->user_id = $user->id;
            $user_transaction->to_id = $charged_user->id;
            $user_transaction->amount = $amount;
            $user_transaction->date = date('Y-m-d H:i:s');
            $user_transaction->save();
        }
        Session::flash('success', 'Your balance has been replenished by $'. $amount .'!');

        return back();
    }
    public function payout(Request $request)
    {
        $user = $request->user();
        $price = floatval($request->price);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        if ($user->balance += $price) {
            Stripe\Payout::create([
                'amount' => 100 * $price,
                'currency' => 'usd',
            ]);

        }
    }
    public function history(){
        $user = User::where('id', Auth::user()->getId())->first();
        $transaction = Transaction::where('user_id', $user->id)->first();
        return view('history',compact('user','transaction'));
    }
}
