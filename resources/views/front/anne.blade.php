@extends('layouts.default')

  @section('title')
    Digg På Døren
  @endsection


@section('content')
@include('includes.cart')

    <div class="container">
      <div class="row">

        <div class="col-sm-12 anne-container">
          <div style="width:100%;" class="anne-wrapper">
            <h1 class="text-center">Gratulerer med dagen Anne!</h1>
            <div class="col-sm-12 img-wrapper">
              <img style="display:block; max-height:auto; width:60%; margin-left:auto; margin-right:auto;" class="text-center" src="{{asset('img/heart.gif')}}" alt="">
            </div>
            <h2 class="col-sm-12 text-center">Elsker deg!</h2>
            <div class="col-sm-12 link-wrapper" style="width:100%;">
            <a style="border:2px solid black; width:20%; font-size:20px; margin: 30px auto; display: block; text-align:center; padding: 10px;" href="https://youtu.be/AU26oZHVXq0">Klikk Her!</a>
            </div>
          </div>
        </div>

      </div>
    </div>
@endsection
