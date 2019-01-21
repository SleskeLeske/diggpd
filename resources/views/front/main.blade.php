@extends('layouts.main')

  @section('title')
    Digg På Døren
  @endsection

@section('content')


<section class="main">
  <div class="container">
    <div class="row">
      <div class="text-left category-sidebar">

        <div class="categories">
          <input type="text" name="searchProduct" id="searchProduct" class="form-control" placeholder="Søk produkter" />
          <h3>Kategorier</h3>
          <hr>
          <ul class="text-left">
            @foreach($categories as $category)
            <li><a href="/category/{{$category->id}}">{{$category->name}}</a></li>
            @endforeach
          </ul>
        </div>
        <!--<div class="category-sidebar">
          <h3>Restauranter</h3>
          <hr>
          <ul class="text-left">
            @foreach($clients as $client)
            <li><a href="/restauranter/{{$client->id}}">{{$client->firstName}} {{$client->lastName}}</a></li>
            @endforeach
          </ul>
        </div>-->
    </div>


      <div class="popular-products col-md-offset-1 col-md-10 col-sm-10 col-sm-offset-2 col-xs-offset-2">
          <h1 class="text-center">Mest Populære Varer</h1>

            <div class="flex main-product-wrapper" id="main-product-wrapper">




  </div>
</div>
</section>









@endsection
@section('scripts')

<script>

  $(document).ready(function() {

  });
</script>
<script>

//GET CART AJAX
$(document).ready(function() {

  fetch_cart();

  function fetch_cart()
  {
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $.ajax({
    type: 'get',
    url: '{{url("/cart/get")}}',

    error: function(data) {
      console.log('something went wrong');
      var errors = data.responseJSON;
      console.log(errors);
    },
dataType: 'json',
    success:function(data) {
      $('#cartResult').text(data.cartCount);
      $('#cartData').html(data.cartContent);
      console.log('cart fetched');

    },

});
};
});

  $(document).ready(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
//FETCH CART FUNCTION
    function fetch_cart()
    {

    $.ajax({
      type: 'get',
      url: '{{url("/cart/get")}}',

      error: function(data) {
        console.log('something went wrong');
        var errors = data.responseJSON;
        console.log(errors);
      },
  dataType: 'json',
      success:function(data) {
        $('#cartResult').text(data.cartCount);
        $('#cartData').html(data.cartContent);
        console.log('cart fetched');


      }

  }).done(function(data){
    if(data.cartCount > 0) {
      $('#cart-bar').addClass('open');
    }
  });
  };

//FETCH PRODUCTS
  fetch_products();

  function fetch_products(product = '')
  {
    $.ajax({
      url:"{{route('searchProducts')}}",
      method:'GET',
      data:{product:product},
      dataType:'json',
      success:function(products)
      {
        $('#main-product-wrapper').html(products.products);
        console.log('Produkter funnet');
      },
      error: function(products) {
        var errors = products.responseJSON;
        console.log(errors);
      },
    })
  }
  $(document).on('keyup', '#searchProduct', function(){
    var product = $(this).val();
    fetch_products(product);
  });


//FIRST BUY

<?php $maxP = count($products);
for($i=0;$i<$maxP; $i++){
?>
$('body').on('click','#cartBtn<?php echo $i;?>',function(){
          var product_id<?php echo $i;?> = $('#product_id<?php echo $i;?>').val();

      $.ajax({
        type: 'get',
        url: '<?php echo url('/cart/post');?>/'+ product_id<?php echo $i;?>,
        error: function(data) {
          var errors = data.responseJSON;
          console.log(errors);
        },
        dataType:'json',
        success:function(data) {
          $('#cartBtn<?php echo $i;?>').addClass('no-show');
          $('#productForm<?php echo $i;?>').removeClass('no-show');
          $('#cartResult').text(data.cartCount);
          console.log('Første kjøp-knapp suksess');

        },

      }).done(fetch_cart());


    });
<?php } ?>


//FORM INSERT INTO CART
<?php
$maxP = count($products);

for($i=0;$i<$maxP; $i++){
?>

    $('body').on('click','#ajaxSubmit<?php echo $i;?>',function(event) {
              $.ajaxSetup({
                  headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });
                  event.preventDefault();
                  var product_id<?php echo $i;?> = $('#product_id<?php echo $i;?>').val();
                  var qty<?php echo $i;?> = $("#productFormQty<?php echo $i;?>").val();
                  var _token = $("input[name='_token']").val();

      $.ajax({

        type: 'post',
        dataType:'json',
        url: '<?php echo url('/cart/form');?>/'+ product_id<?php echo $i;?>,
        data: {
          qty:qty<?php echo $i; ?>,
          _token:_token ,
        },
        error: function(result) {
          var errors = result.responseJSON;
          console.log(errors);
          console.log('Kunne ikke opdatere handlekurv');
        },

        success:function(result) {
          $('#cartResult').text(result.cartCount);
          console.log("Form sending suksess, antallet er " + result.qty);
        },

      }).done(fetch_cart());
return false;
          e.preventDefault();
    });
<?php } ?>


//CART PLUS 1

<?php $maxP = 10;
for($i=0;$i<$maxP; $i++){
?>
$('body').on('click','#cartPlus<?php echo $i;?>',function(){
          var product_id<?php echo $i;?> = $('#product_id<?php echo $i;?>').val();
          var product_row_id<?php echo $i;?> = $('#cart-row-id-<?php echo $i;?>').val();
      $.ajax({
        type: 'get',
        url: '<?php echo url('/cart/plus');?>/'+ product_id<?php echo $i;?>,
        data: {
          rowId: product_row_id<?php echo $i;?>
        },
        error: function(data) {
          var errors = data.responseJSON;
          console.log(errors);
        },
        dataType:'json',
        success:function(data) {
          $('#cartResult').text(data.cartCount);
          console.log('Pluss-knapp suksess');

        },

      }).done(fetch_cart());


    });
<?php } ?>

//CART MINUS 1

<?php $maxP = count($products);
for($i=0;$i<$maxP; $i++){
?>
          $('body').on('click','#cartMinus<?php echo $i;?>',function(){
          var product_id<?php echo $i;?> = $('#cart-product-id-<?php echo $i;?>').val();
          var product_row_id<?php echo $i;?> = $('#cart-row-id-<?php echo $i;?>').val();
      $.ajax({
        type: 'get',
        url: '<?php echo url('/cart/minus');?>/'+ product_id<?php echo $i;?>,
        data: {
          rowId: product_row_id<?php echo $i;?>
        },
        error: function(data) {
          var errors = data.responseJSON;
          console.log(errors);
          console.log('minus feil');
          console.log(data.rowId);
        },

        dataType:'json',
        success:function(data) {
          $('#cartResult').text(data.cartCount);
          $('#cart-item-qty<?php echo $i;?>').text(data.newCartItemQty);
          console.log('Minus-knapp suksess');

        },

      }).done(fetch_cart());


    });
<?php } ?>


//Destroy Cart
$('#cart-destroy').click(function(){


           $.ajax({
               url: "cart/destroy",
               cache: false,
               success:function(result){

               }
           }).done(fetch_cart());;
       });

});




</script>


@endsection
