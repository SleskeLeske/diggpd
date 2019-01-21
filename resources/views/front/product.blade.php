@extends('layouts.default')
@section('title')
  Digg På Døren
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="product-container">
      <a href="{{route('product')}}"<i class="fa fa-exclamation" aria-hidden="true"></i></a>
      <div class="product-img">
        <img src="{{url('img', $product->image)}}">
      </div>
      <p class="price text-center">{{$product->price}} kr</p>
      <div class="product-title">{{$product->title}}</div>
        <div class="amount-container">
          <a class="plus" href="{{route('cart.addItem')}}"><span class="fa-stack fa-lg">
                <i class="fa fa-circle-thin fa-stack-2x"></i>
                <i class="fa fa-plus fa-stack-1x"></i></span>
          </a>
          <a class="minus" href="#"><span class="fa-stack fa-lg">
                <i class="fa fa-circle-thin fa-stack-2x"></i>
                <i class="fa fa-minus fa-stack-1x"></i></span></a>
        </div>
    </div>
  </div>
</div>

@endsection
