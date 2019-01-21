<?php

namespace App\Http\Controllers;
use App\Order;
use Illuminate\Http\Request;
use Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class DriverController extends Controller
{

  public function index() {
    return view('driver.index');
  }
  public function Orders($type='')
  {
        $user = Auth::user();

          if($type == 'pending') {
          $orders = Order::where('delivered','0')->get();
          $delivered = "no";
        }elseif($type == 'delivered') {
          $orders = Order::where('delivered', '1')->get();
          $delivered = "yes";
        }else {
          $delivered = "all";
          $orders = Order::all();
        }

        return view('driver.orders',compact(['orders', 'user', 'delivered']));
  }

  public function toggleDeliver(Request $request, $orderId)
  {

    $order = Order::find($orderId);
    if($request->has('delivered')){
      $order->delivered=$request->delivered;
    }else{
      $order->delivered="0";
    }
    $order->delivered=$request->delivered;
    $order->save();
        session()->flash('message','Order typen er skiftet');
    return back();
  }
}
