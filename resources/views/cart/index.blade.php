@extends('layouts.default')
@section('title')
  Digg På Døren
@endsection
@section('content')
<div class="container">
  <div class="row">
    <div class="cart-title text-center">
          <h3>Din Handlekurv</h3>
    </div>
    <nav aria-label="breadcrumb" role="navigation">
        <ol class="breadcrumb text-center">
          <li class="breadcrumb-item"><a href="/">Hjem</a></li>
          <li class="breadcrumb-item active">Handlevogn</li>

        </ol>
    </nav>
  </div>
  <div class="row col-sm-8 col-sm-offset-2 cart-table">
    @if($cartQty > 0)
<table class="table table-hover">
<thead>
<tr>
  <th>Navn</th>
  <th>Pris</th>
  <th>Antall</th>
</tr>
</thead>
<tbody>
@endif
@forelse($cartItems as $cartItem)
  <tr>
      <td>{{$cartItem->name}}</td>
      <td>{{$cartItem->price}}</td>
      <td>
          {!! Form::open(['route' => ['cart.update',$cartItem->rowId], 'method' => 'PUT']) !!}
          <input class="qty-input" name="qty" type="text" value="{{$cartItem->qty}}">


          <input type="submit" class="cart-button" value="Endre">
          {!! Form::close() !!}

            <td>
          <form action="{{route('cart.destroy',$cartItem->rowId)}}"  method="POST">
             {{csrf_field()}}
             {{method_field('DELETE')}}
             <input class="cart-button button-delete" type="submit" value="Slett">
           </form>
      </td>
  </tr>
  @empty
  <div class="text-center noproducts">
      <h5>Du har ingen produkter enda!</h5>
      <a href="/">Handle litt så kom tilbake igjen hit!</a>
  </div>

@endforelse

</tbody>
</table>
</div>

<div class="row col-sm-8 col-sm-offset-2 cart-table">

@if (Auth::check())
  @if($cartQty > 0)
    @if($user->addressline AND $user->phone AND $user->place AND $user->postnr)

      <table class="table table-hover">
        <thead>
          <tr>
          <th>Telefon</th>
          <th>Addresse</th>
          <th>Post nr</th>
          <th>Stedsnavn</th>
          </tr>
        </thead>
      <tbody>
        <tr>
            <td>{{$user->phone}}</td>
            <td>{{$user->postnr}}</td>
            <td>{{$user->addressline}}</td>
            <td>{{$user->place}}</td>
        </tr>
      </tbody>
      </table>
  <a href="{{route('user.editShipping')}}">Oppdater leveringsinfo</a>
    @else
      <div class="text-center noproducts">
          <h5>Vennligst oppdater addressen din!</h5>
          <a href="{{route('user.editShipping')}}" class="standard-button">Oppdater leveringsinfo</a> <hr>
      </div>

    @endif
  @endif
@endif




</div>




        @if($cartQty > 0)
      <div class="row col-sm-2 col-sm-offset-2">

              Antall varer: {{Cart::count()}} <br> <br>
              Pris:{{$cartSubtotal}} kr <br> <br>
              Kjørepris: 70 kr <br> <br><hr>

              <strong>Total pris: {{$cartTotal}} kr</strong> <br> <br>



          <a href="{{route('checkout.shipping')}}" class="standard-button">Til Betaling</a>



        </div>
  @endif
</div>



@endsection
