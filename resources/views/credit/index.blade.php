@extends('layouts.default')

@section('content')

<div class="container">
  <div class="row">


        <div class="credit-wrapper text-center col-xs-12 col-md-4">
          <div class="credit">
            <h1>Mengde:</h1>
            <p>Velg 200,- kroner</p>
            <hr>
            <a href="{{route('credit.buy', 200)}}" class="credit-link-anchor standard-button">200 Kr,-</a>
          </div>

        </div>


        <div class="credit-wrapper text-center col-xs-12 col-md-4">
          <div class="credit">
            <h1>Mengde:</h1>
            <p>Velg 500,- kroner</p>
            <hr>
            <a href="{{route('credit.buy', 500)}}" class="credit-link-anchor standard-button">500 Kr,-</a>
          </div>

        </div>

        <div class="credit-wrapper text-center col-xs-12 col-md-4">
          <div class="credit">
            <h1>Mengde:</h1>
            <p>Velg 1000,- kroner</p>
            <hr>
            <a href="{{route('credit.buy', 1000)}}" class="credit-link-anchor standard-button">1000 Kr,-</a>
          </div>

        </div>




    </div>
    <div class="row"></div>
  </div>




@endsection
