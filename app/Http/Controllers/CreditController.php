<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\Clientheaderimg;
use Auth;
use App\Admin;
use App\User;
use Illuminate\Http\Request;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $admin = Admin::findOrFail(1);
      if ($admin->website_status !== 1){
      return redirect()->route('downPage');
      }
        return view('credit.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($amount)
    {
      $admin = Admin::findOrFail(1);
      if ($admin->website_status !== 1){
      return redirect()->route('downPage');
      }
      return view('credit.purchase', compact('amount'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $amount)
    {
      $admin = Admin::findOrFail(1);
      if ($admin->website_status !== 1){
      return redirect()->route('downPage');
      }
      $id = Auth::id();
      // Set your secret key: remember to change this to your live secret key in production
      // See your keys here: https://dashboard.stripe.com/account/apikeys
      \Stripe\Stripe::setApiKey("sk_test_JxhjowKaAkw5Pw4LP2SEeQKd");

      // Token is created using Checkout or Elements!
      // Get the payment token ID submitted by the form:
      $token = $request->stripeToken;

      // Charge the user's card:
      try {
        $charge = \Stripe\Charge::create(array(
          "amount" => $amount,
          "currency" => "nok",
          "description" => "Example charge",
          "source" => $token,
        ));
      } catch (\Stripe\Error\Card $e) {
        //The card has been declined
      }
      $id = Auth::user()->id;
      $user = User::find($id);
      $user->credits = $amount;
      $user->save();

        session()->flash('message','Din kredittmengde har blitt oppdatert.');
    return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
