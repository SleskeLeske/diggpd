<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\Clientheaderimg;
use Auth;
use App\User;
use App\Admin;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Postnr;
use DB;
use App\Order;
class FrontController extends Controller
{
    public function index()
    {
      $admin = Admin::findOrFail(1);
      if ($admin->website_status !== 1){
      return redirect()->route('downPage');
    }



      $postnumbers = Postnr::all();
      $products = Product::orderBy('times_bought')->limit(4)->get();
      $categories = Category::all();
      $clients = User::where('client', 1)->orderBy('firstName', 'desc')->get();
      $cartContents = Cart::content();
      $cartAmount = Cart::content()->count();
      return view('front.main', compact(['categories','clients', 'products', 'postnumbers', 'cartContents', 'cartAmount',]));

    }



    public function product()
    {
      $admin = Admin::findOrFail(1);
      if ($admin->website_status !== 1){
      return redirect()->route('downPage');
      }
      $products = Product::all();
        return view('front.products', compact('products'));
    }

    public function about()
    {
      $admin = Admin::findOrFail(1);
      if ($admin->website_status !== 1){
      return redirect()->route('downPage');
      }
        return view('front.about');
    }

    public function getCredit()
    {
      $admin = Admin::findOrFail(1);
      if ($admin->website_status !== 1){
      return redirect()->route('downPage');
      }
        return view('front.credit');
    }

    public function getCar() {
      $admin = Admin::findOrFail(1);
      if ($admin->website_status !== 1){
      return redirect()->route('downPage');
      }
      return view('front.car-logo');
    }

    public function anne() {
      return view('front.anne');
    }

    public function getAdminPassword() {
      $admin = Admin::where('user_id', 1)->first();
      $password = $admin->admin_password;
      return view('admin.admin.password', compact('password'));
    }

    public function websiteStatus() {

    }

    public function unverified() {
      $admin = Admin::findOrFail(1);
      if ($admin->website_status !== 1){
      return redirect()->route('downPage');
      }
      $id = Auth::id();
      $user = User::findOrFail($id);
      if($user->confirmed == 0) {
        return view('auth.unverified');
      } else {
        return redirect()->route('home');
      }
    }

    Public function downPage() {
      return view('front.down-page');
    }

    public function checkPostnr(Request $request) {
    $postnumber = $request['postnr'];
    $postnr = Postnr::where('name', '=', $postnumber);

      Redirect::route('home')->with( ['postnr' => $postnr] );

    }

    public function searchProducts(Request $request)
      {
        $query = $request->get('product');
        if($query != '')
        {
        $data = DB::table('products')
          ->where('name', 'like', '%'.$query.'%')
          ->get();
          $total_row = $data->count();
          $output = array();
          $countP = 0;
          foreach($data as $product)
          {
            $output[] = '



            <div class="item main-product-container">
                        <input type="hidden" id="product_id'.$countP.'" value="'.$product->id.'">
            <a href="#"<i class="fa fa-exclamation" aria-hidden="true"></i></a>
            <div class="product-img text-center">
              <div type="button" data-toggle="modal" data-target="#modal-'.$countP.'"><img src="img/'.$product->image.'" alt="'.$product->description.'"></div>
            </div>
            <p class="price text-center">'.$product->price.',- kr</p>
            <div class="product-title">'.$product->name.'</div>

              <form class="no-show productForm'.$product->id.' productForm" id="productForm'.$countP.'">

              <input class="qty-input" name="qty" id="productFormQty'.$countP.'" type="integer" value="">
              <input type="hidden" id="idproductFormId'.$countP.'" name="id" value="'.$product->id.'">


              <input type="submit" id="ajaxSubmit'.$countP.'" class="cart-button" value="Legg til">
              </form>
              <button class="btn btn-default add-to-cart cartBtn'.$product->id.'" id="cartBtn'.$countP.'">Kjøp</button>

            </div>


            <!-- Modal HTML -->
        <div class="modal fade" id="modal-'.$countP.'" tabindex="-1" role="dialog" aria-labelledby="'.$product->name.'">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">'.$product->name.'</h4>
                </div>
              <div class="modal-body">
                <img src="img/'.$product->image.'" alt="" />
              </div>
              <hr />
              <p>'.$product->description.'</p>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>
            ';
            $countP++;
          }
        }
        else
        {
          $data = Product::orderBy('times_bought')->limit(4)->get();
          $total_row = $data->count();
          $output = array();
          $countP = 0;
          foreach($data as $product)
          {
            $productImage = "url('img/".$product->image."')";
            $output[] = '



            <div class="item main-product-container">
                        <input type="hidden" id="product_id'.$countP.'" value="'.$product->id.'">
            <a href="#"<i class="fa fa-exclamation" aria-hidden="true"></i></a>
            <div class="product-img text-center">
              <div type="button" class="modal-button" data-toggle="modal" data-target="#modal-'.$countP.'"><img src="img/'.$product->image.'" alt="'.$product->description.'"></div>
            </div>
            <p class="price text-center">'.$product->price.',- kr</p>
            <div class="product-title">'.$product->name.'</div>

              <form class="no-show productForm'.$product->id.' productForm" id="productForm'.$countP.'">

              <input class="qty-input" name="qty" id="productFormQty'.$countP.'" type="integer" value="">
              <input type="hidden" id="idproductFormId'.$countP.'" name="id" value="'.$product->id.'">


              <input type="submit" id="ajaxSubmit'.$countP.'" class="cart-button" value="Legg til">
              </form>
              <button class="btn btn-default add-to-cart cartBtn'.$product->id.'" id="cartBtn'.$countP.'">Kjøp</button>

            </div>


            <!-- Modal HTML -->
        <div class="modal fade" id="modal-'.$countP.'" tabindex="-1" role="dialog" aria-labelledby="'.$product->name.'">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">'.$product->name.'</h4>
              </div>
              <div class="modal-body text-center">
                <div class="modal-image"  style="width:100%; padding:0; margin:0; height:200px; background-position: center; background-image:'.$productImage.'; background-size: contain; background-repeat: no-repeat;">'.$product->description.'</div>
              </div>
              <hr />
              <div class="text-center"><p>'.$product->description.'</p></div>

            </div>
          </div>
        </div>
            ';
            $countP++;
          }
        }

        if(empty($output)) {
          $output[] = '<h1>Ingen varer stemmer med søket</h1>';
        }

          $products = array(
            'products' => $output,
          );
          echo json_encode($products);
        }

        public function userOrder($id) {

        if($id != Auth::id()) {
          return redirect()->back();
        }
        elseif(! Auth::check()) {
        return redirect()->back();
        }

          $user = Auth::user();


          $orders = Order::where('user_id', $id)->get();


          return view('auth.order',compact(['orders', 'user',]));
        }

}


/*
<?php $countP = 0; ?>
@foreach($products as $product)

<input type="hidden" id="product_id<?php echo $countP; ?>" value="{{$product->id}}">


<div class="item main-product-container">
<a href="#"<i class="fa fa-exclamation" aria-hidden="true"></i></a>
<div class="product-img text-center">
  <img src="{{url('img', $product->image)}}">
</div>
<p class="price text-center">{{$product->price}},- kr</p>
<div class="product-title">{{$product->name}}</div>
  <!--<div class="amount-container">
    <a href="javascript:;" class="plus" id="expand{{$product->id}}"><span class="fa-stack fa-lg">
          <i class="fa fa-circle-thin fa-stack-2x"></i>
          <i class="fa fa-plus fa-stack-1x"></i></span>
    </a>

    <a class="minus" href="#"><span class="fa-stack fa-lg">
          <i class="fa fa-circle-thin fa-stack-2x"></i>
          <i class="fa fa-minus fa-stack-1x"></i></span></a>
  </div>-->



  <form class="no-show productForm{{$product->id}} productForm" id="productForm<?php echo $countP;?>">
    {{csrf_field()}}
  <input class="qty-input" name="qty" id="productFormQty<?php echo $countP;?>" type="integer" value="">
  <input type="hidden" id="idproductFormId<?php echo $countP;?>" name="id" value="{{$product->id}}">


  <input type="submit" id="ajaxSubmit<?php echo $countP;?>" class="cart-button" value="Legg til">
  </form>
  <button class="btn btn-default add-to-cart cartBtn<?php echo $product->id;?>" id="cartBtn<?php echo $countP;?>">Kjøp</button>

</div>
<?php $countP++?>
@endforeach
</div>

</div>


*/
