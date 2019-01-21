<!--<div class="cart-container cart-direct">
  <div class="cart">
    <a href="{{route('cart.index')}}">
    <span class="fa-stack fa-lg">
      <i class="cart-logo fa circle fa-circle fa-stack-2x"></i>
      <i class="cart-i fa fa-shopping-cart fa-stack-1x"></i>
    </span>
    <span class="badge">{{Cart::count()}}</span>
    <span class="badge"><a style="position: relative; top:1.2em; right:2.2em;" href="/cart/destroy" data-toggle="tooltip" title="Slett handlekurv"><i style="font-size:1.3em; color:red;" class="fas fa-times"></i></a></span>
    </a>
  </div>
</div> -->

<div class="cart-container" >
  <div class="cart">
    <a href="#" id="cart-toggle">
    <span class="fa-stack fa-lg">
      <i class="cart-logo fa circle fa-circle fa-stack-2x"></i>
      <i class="cart-i fa fa-shopping-cart fa-stack-1x"></i>
    </span>
    <span class="badge cartresult" id="cartResult" style="position: absolute; top:0; right:-20px;"></span>
    <span class="badge"><p style="position: absolute; bottom:0; right:-10px;" id="cart-destroy" data-toggle="tooltip" title="Slett handlekurv"><i style="font-size:1.6em; color:red;" class="fas fa-times"></i></p></span>
    </a>
  </div>
</div>

<div class="cart-bar" id="cart-bar">
  <div class="cart-bar-container">
    <div class="container" >
      <div class="row" >
        <div class="cart-bar-wrapper" id="cartData">

        </div>
      </div>
    </div>
  </div>
</div>
