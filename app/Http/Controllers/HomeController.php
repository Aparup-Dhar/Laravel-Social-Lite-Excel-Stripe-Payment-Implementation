<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function payment()
    {
        $user = auth()->user();
        return view('payment', 
        ['intent' => $user->createSetupIntent(),]);
    }

    public function singleCharge(Request $request)
    {
        $amount = $request->amount;
        $amount = $amount * 100;
        $paymentMethod = $request->payment_method;

        $user = auth()->user();
        $user->createOrGetStripeCustomer();

        $paymentMethod = $user->addPaymentMethod($paymentMethod);

        
        $user->charge($amount,$paymentMethod->id);
        return redirect()->back()->with('message','Payment Successful');
    }

    public function import()
    {
        return view('import');
    }
}
