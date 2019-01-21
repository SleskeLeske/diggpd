@extends('layouts.default')

@section('content')
<div class="container">
  <div class="row">
      <h1 class="text-center register-title">DIGG PÅ DØREN</h1>
      <div class="col-sm-8 col-sm-offset-2 text-center">
      <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Hjem</a></li>
            <li class="breadcrumb-item"><a href="/cart">Handlevogn</a></li>
            <li class="breadcrumb-item"><a href="/cart">Velg ordertype</a></li>
            <li class="breadcrumb-item active" aria-current="page">Betaling</li>
          </ol>
      </nav>
    </div>
    </div>
    <div class="row">
      <div class="text-center checkout-text">
        <h1>Bare litt igjen! <br><br> Betal med kort eller vipps.</h1>
        <div class="col-sm-4 col-sm-offset-2 text-center">
          <ul>
            <li>Pris:</li>
            <li>Kjørepris:</li>
            <li>Ordertype: </li>
            <hr>
            <li>Totalt:</li>
          </ul>
        </div>
        <div class="col-sm-4 text-center">
          <ul>
            <li>{{$subtotal}} kr</li>
            <li>70.00 kr</li>
            <li>@if($type == 0) Hurtigkjøp @else Dagskjøp @endif</li>
            <hr>
            <li>{{$subtotal + 70}} kr</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-8 col-sm-offset-2 text-center">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Betal med kort
        </button>

      <form style="margin-top:20px;" action="{{route('payment.store.credit', $type)}}" method="post">
                          {{csrf_field()}}
        <button type="submit" class="btn btn-primary">
          @if($user->credits < Cart::subtotal())
              Kjøp og betal med kreditter!
              @else Betal med kreditter
          @endif
        </button>
      </form>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Betal med bankkort</h5>
                <button style="padding-bottom:10px;" type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{route('payment.store', $type)}}" method="post" id="payment-form">
                  {{csrf_field()}}
                  <div class="form-row">
                    <label  for="card-element">
                      Bankkort
                    </label>
                    <div id="card-element">
                      <!-- a Stripe Element will be inserted here. -->
                    </div>

                    <!-- Used to display Element errors -->
                    <div id="card-errors" role="alert"></div>
                  </div>

                  <button>Betal</button>
                </form>
              </div>
            </div>
          </div>
        </div>

    </div>

    </div>
  </div>
</div>

@endsection
