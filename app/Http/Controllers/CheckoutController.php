<?php

namespace App\Http\Controllers;
use Auth;
use App\Order;
use App\User;
use App\Admin;
use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
class CheckoutController extends Controller
{
//  public function step1() {
//      if(Auth::check()) {
  //       return redirect()->route('checkout.shipping');
  //    }
  //    return redirect('login');
  //  }
public function orderType() {
  $user = Auth::user();
  return view('front.ordertype', compact('user'));
}


    public function shipping() {
      $admin = Admin::findOrFail(1);
      if ($admin->website_status !== 1){
      return redirect()->route('downPage');
      }
    $user = Auth::user();
      if($user->addressline AND $user->phone AND $user->place AND $user->postnr)
      {

        return view('front.ordertype', compact('user'));
      }
      else {
                  return redirect()->route('user.editShipping', compact('type'));
        }

      }

    public function payment($type) {

      $admin = Admin::findOrFail(1);
      if ($admin->website_status !== 1){
      return redirect()->route('downPage');
      }
    /*  if(!$type) {
          session()->flash('message','Vennligst velg en ordertype');
          return redirect()->route('checkout.orderType');
      } */

      $id = Auth::id();
      $user = User::find($id);
      if($user['confirmed'] == 0) {
                session()->flash('message','Vennligst bekreft kontoen din');
        return redirect()->route('auth.verify');
      }

      $subtotal = Cart::subtotal();
      $user = Auth::user();
      return view('front.payment',compact(['subtotal', 'user','type']));
    }

    public function storePayment(Request $request, $type) {
      // Set your secret key: remember to change this to your live secret key in production
      // See your keys here: https://dashboard.stripe.com/account/apikeys
      \Stripe\Stripe::setApiKey("sk_test_JxhjowKaAkw5Pw4LP2SEeQKd");

      // Token is created using Checkout or Elements!
      // Get the payment token ID submitted by the form:
      $token = $request->stripeToken;

      // Charge the user's card:
      try {
        $charge = \Stripe\Charge::create(array(
          "amount" => Cart::subtotal()*100 + 7000,
          "currency" => "nok",
          "description" => "Example charge",
          "source" => $token,
        ));
      } catch (\Stripe\Error\Card $e) {
        //The card has been declined
      }

      //make order
      Order::createOrder($type);

      //Update how many times each product has been bought
      $cartItems = Cart::content();
      $cartQty = Cart::count();

      foreach($cartItems as $cartItem) {
        $id = $cartItem->id;
        $product = Product::find($id);

        $product->times_bought = $product->times_bought + $cartItem->qty;
        $product->save();
      }

        //destroy shopping cart
        Cart::destroy();

        session()->flash('message','Din bestilling er på vei!');
        return redirect()->route('user.order');
    }




    public function storeCreditPayment(Request $request) {
      // Set your secret key: remember to change this to your live secret key in production
      // See your keys here: https://dashboard.stripe.com/account/apikeys
      \Stripe\Stripe::setApiKey("sk_test_JxhjowKaAkw5Pw4LP2SEeQKd");

      // Token is created using Checkout or Elements!
      // Get the payment token ID submitted by the form:
    //  $token = $request->stripeToken;
      $user = Auth::user();
      if($user->credits < Cart::subtotal()) {

        session()->flash('message','Betaling mislykket. Ikke nok kreditter.');
        return redirect()->route('getCredit');

      } else {
        User::removeCredits();
        Order::createOrder();
        Cart::destroy();
        session()->flash('message','Din bestilling er på vei!');
        return redirect()->route('home');
      }






    }

}
