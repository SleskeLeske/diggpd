<?php

namespace App;
use Auth;
use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Facades\Cart;
class Order extends Model
{
    protected $fillable = ['total', 'delivered', 'addressline', 'phone', 'place', 'postnr', 'type'];

    public function orderItems()
    {
      return $this->belongsToMany(Product::class)->withPivot('qty','total');
    }


    public function user()
    {
    return $this->belongsTo(User::class);
    }


    public static function createOrder($type)
    {
      //Create order
      $user = Auth::user();
      if($type == '0') {
        $type = 0;
      }
      else {
        $type = 1;   
      }
      $order = $user->orders()->create([
        'total' => Cart::subtotal() + 70,
        'delivered' => 0,
        'addressline' => $user->addressline,
        'postnr' => $user->postnr,
        'place' => $user->place,
        'phone' => $user->phone,
        'type' => $type,
      ]);

      $cartItems=Cart::content();
      foreach($cartItems as $cartItem){
        $order->orderItems()->attach($cartItem->id, [
          'qty' => $cartItem->qty,
          'total' => $cartItem->qty*$cartItem->price,
        ]);
      }

    }

}
