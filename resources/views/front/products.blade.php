@extends('layouts.default')
@section('title')
  Digg På Døren
@endsection
@section('content')

@isset($client)
@if($client->client == 1)
  <div class="client-header" style="background: url('{{$client->clientheaderimg->image}}');">
    <h1>{{$client->firstName}} {{$client->lastName}}</h1>
  </div>
@endif
@endisset
<div class="container">
  <div class="row">
    <div class="popular-products col-xs-12">
        <h1 class="text-center category-title">{{$category->name}}</h1>
          <div class="flex main-product-wrapper">
          @foreach($products as $product)



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
              {!! Form::open(['route' => ['cart.addItem',$product->id], 'method' => 'POST']) !!}
              <input class="qty-input" name="qty" id="dev{{$product->id}}" type="integer" value="0">



              <input type="submit" class="cart-button" value="Legg til">

              {!! Form::close() !!}
          </div>
          @endforeach
      </div>

    </div>
  </div>
</div>

@include('includes.cart')
@endsection
