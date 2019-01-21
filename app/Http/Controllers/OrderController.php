<?php

namespace App\Http\Controllers;
use App\Order;
use Illuminate\Http\Request;
use Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{
    public function Orders($type='')
    {
          $user = Auth::user();

            if($type == 'pending-quick') {
            $orders = Order::where([['type', '0'], ['delivered', '0']])->get();
            $type= "Ventende Hurtigbestillinger";
            $delivered = "no";
          }elseif($type == 'delivered-quick') {
            $orders = Order::where([['type', '0'], ['delivered', '1']])->get();
            $delivered = "yes";
            $type= "Leverte Hurtigbestillinger";
          }elseif($type == 'pending-day') {
            $orders = Order::where([['type', '1'], ['delivered', '0']])->get();
            $delivered = "no";
            $type= "Ventende Dagsbestillinger";
          }
        elseif($type == 'delivered-day') {
          $orders = Order::where([['type', '1'], ['delivered', '1']])->get();
          $delivered = "yes";
          $type= "Leverte Dagsbestillinger";
        }
          else {
            $delivered = "all";
            $orders = Order::all();
          }

          return view('admin.orders',compact(['orders', 'user','type', 'delivered']));
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
