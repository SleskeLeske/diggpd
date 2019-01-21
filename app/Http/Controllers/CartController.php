<?php

namespace App\Http\Controllers;
use App\Product;
use Auth;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\User;
use App\Admin;
class CartController extends Controller

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
        $user = Auth::user();
        $cartItems = Cart::content();
        $cartQty = Cart::count();

        $cartSubtotal = strval(Cart::subtotal());

        $var = str_replace( ',', '', Cart::subtotal() );
         $operation = $var + 70 ;

         $cartTotal = $operation;
        return view('cart.index',compact(['cartQty','cartItems', 'user', 'cartSubtotal', 'cartTotal']));
    }


    public function postCartForm(Request $request, $id) {
      $product = Product::find($id);
      $qty = $request->get('qty');

      Cart::add($id, $product->name, $qty, $product->price);

      $cartCount = Cart::content()->count();

      $result = array(
        'cartCount' => $cartCount,
        'qty' => $qty,
      );
      echo json_encode($result);
    }

    public function postCart(Request $request, $id) {

        $product = Product::find($id);

        Cart::add($id, $product->name, 1, $product->price);
        $cartCount = Cart::content()->count();

        $data = array(
          'cartCount' => $cartCount
        );
        echo json_encode($data);

      }

      public function cartPlus(Request $request, $id) {

        $product = Product::find($id);
        $rowId = $request->get('rowId');
        $cartItem = Cart::get($rowId);
        $cartItemQty = $cartItem->qty;
        $newCartItemQty = $cartItemQty + 1;
        Cart::update($rowId, $newCartItemQty);
        $cartCount = Cart::content()->count();

        $data = array(
          'cartCount' => $cartCount,
          'rowId' => $rowId,
          'newcartItemQty' => $newCartItemQty
        );
        echo json_encode($data);

        }

        public function cartMinus(Request $request, $id) {

            $product = Product::find($id);
      $rowId = $request->get('rowId');
      $cartItem = Cart::get($rowId);
            $cartItemQty = $cartItem->qty;
            $newCartItemQty = $cartItemQty - 1;
            Cart::update($rowId, $newCartItemQty);
            $cartCount = Cart::content()->count();

            $data = array(
              'cartCount' => $cartCount,
              'rowId' => $rowId,
              'newCartItemQty' => $newCartItemQty
            );
            echo json_encode($data);

          }

    public function cartGet() {
      $cartCount = Cart::count();
      $cartContents = Cart::content();
      $output = array();
//      for($i=0,$i<$cartCount) {
//        $inputQty_$i = '<input id="cart-'.$i.'" type="integer" name="qty" value="hei" class="cart-bar-qty">';
//      }
      $cartNumber = 0;
      $products=Product::all();

      if($cartCount > 0) {
      foreach($cartContents as $cartContent) {


          $id = $cartContent->id;
          $product = Product::find($id);
          $productImage = $product->image;
          $productImageURL = "img/".$productImage;
          $rowId = $cartContent->rowId;
                $cartItem = Cart::get($rowId);
                $cartItemQty = $cartItem->qty;
          $output[] = '<div class="cart-bar-item item">

                          <input type="hidden" id="cart-row-id-'.$cartNumber.'" name="row_id" value="'.$cartContent->rowId.'" class="cart-bar-qty">
                            <input type="hidden" id="cart-product-id-'.$cartNumber.'" name="id" value="'.$id.'" class="cart-bar-qty">
                        <div class="cart-bar-title">'.$cartContent->name.'</div>
                        <div class="cart-bar-image"><img src="'.$productImageURL.'"></div>
                        <div>'.$cartItemQty.'</div>
                        <div class="cart-icon-wrapper">
                          <a class="add-to-cart cartIcon cartPlus'.$product->id.'" id="cartPlus'.$cartNumber.'"><i class="fas fa-plus"></i></a>
                          <a class="add-to-cart cartIcon cartMinus'.$product->id.'" id="cartMinus'.$cartNumber.'"><i class="fas fa-minus"></i></a>
                        </div>
                        <div id="cart-item-qty-'.$cartNumber.'">'.$cartItemQty.'</div>
                        </div>';

            $cartNumber++;
        }


      }
      $data = array(
        'cartCount' => $cartCount,
        'cartContent' => $output,
      );
      return json_encode($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    }

    public function addItem(Request $request, $id)
    {
      if($request->qty < 1) {
                    session()->flash('message','Vennligst velg en gyldig mengde');
        return redirect()->back();
      } else {
        $product = Product::find($id);
        $qty = $request->qty;
        Cart::add($id, $product->name, $qty, $product->price);

        return redirect()->back();
      }

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
        Cart::update($id, $request->qty);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return back();
    }


    public function destroyCart() {
      Cart::destroy();
            $cartCount = Cart::count();
      $result = array(
        'cartCount' => $cartCount,

      );
      echo json_encode($result);
    }
}
