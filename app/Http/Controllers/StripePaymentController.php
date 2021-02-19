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
        if($user->balance > $request->price) {
            $transaction = Stripe\Charge::create([
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
                $user_transaction->transaction_id = $transaction->id;
                $user_transaction->user_id = $user->id;
                $user_transaction->to_id = $charged_user->id;
                $user_transaction->amount = $amount;
                $user_transaction->date = date('Y-m-d H:i:s');
                $user_transaction->save();
            }

            Session::flash('success', 'Payment created successfully. Your balance has been decreased by $' . $amount . '!');
        }
//        } else {
////            Session::flash('Your balance is smaller than the price requested by you!','alert-danger');
////        }
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
        $transactions = Transaction::with('user','seller')->where('user_id',$user->id)->get();
        $seller_transactions = Transaction::with('user','seller')->where('to_id',$user->id)->get();
        return view('history',compact('user','transactions','seller_transactions'));
    }
    public function pay(Request $request)
    {
        $user = Auth::user();
        if ($user->balance > $request->price) {
            $amount = floatval($request->price);
            $charged_user=User::where('id',$request->id)->first();
            $charged_user->balance += $amount;
            $charged_user->save();
            $user->balance -= $amount;
            $user->save();

            Session::flash('success', 'Payment created successfully. Your balance has been decreased by $' . $amount . '!');
        }
    }
}
