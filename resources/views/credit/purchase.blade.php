@extends('layouts.default')

@section('content')
<div class="container">
  <div class="row">
      <h1 class="text-center register-title">DIGG PÅ DØREN</h1>
      <div class="col-sm-8 col-sm-offset-2 text-center">
      <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Hjem</a></li>
            <li class="breadcrumb-item active" aria-current="page">Valg av kredittmengde</li>
          </ol>
      </nav>
    </div>
    </div>
    <div class="row">
      <div class="text-center checkout-text">
        <h1>Bare litt igjen! <br><br> Betal med kort eller vipps.</h1>
        <div class="col-sm-12 text-center">
          <ul>
            <li>Pris: {{$amount}}</li>
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
                <form action="{{route('credit.store', $amount)}}" method="post" id="payment-form">
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
