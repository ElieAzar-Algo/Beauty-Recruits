<?php

namespace App\Http\Controllers;

use App\Subscription;
use App\SubscriptionUser;
use Illuminate\Http\Request;
use Session;
use Stripe;

class StripeController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('front.stripe');
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $subscriptionUser = SubscriptionUser::where('user_id', '=', auth()->user()->id)->where('success', '=', 0)->first();

        $subscription = Subscription::findOrFail($subscriptionUser->subscription_id);

        Stripe\Charge::create([
            "amount" => (int)($subscription->price) * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "This payment is tested"
        ]);
        $subscriptionUser->success = 1;
        $subscriptionUser->save();
        Session::flash('success', 'Payment successful!');

        return back();
    }
}
