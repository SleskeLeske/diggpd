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
            <li class="breadcrumb-item active" aria-current="page">Velg ordertype</li>
          </ol>
      </nav>
    </div>
    </div>
    <div class="row">
      <div class="page-title text-center">
              <h1> Velg ordertype</h1>
      </div>

        <div class="col-sm-6 order-card text-center">
            <div class="order-card">
              <div class="order-card-title">
                  <h3>Hurtigkjøp</h3>
              </div>
              <div class="order-card-body">
                <p>Få varene umiddelbart levert på døren. Bare tilgjengelig i visse tider</p>
                  <a href="{{route('checkout.payment', 0)}}" class="standard-button">Hurtigkjøp</a>
              </div>
            </div>
        </div>

        <div class="col-sm-6 order-card text-center">
            <div class="order-card">
              <div class="order-card-title">
                  <h3>Dagskjøp</h3>
              </div>
              <div class="order-card-body">
                <p>Få varene levert på utvalgte tider på spesifikke dager.</p>
                  <a href="{{route('checkout.payment', 1)}}" class="standard-button">Dagskjøp</a>
              </div>
            </div>
        </div>

    </div>

    </div>


@endsection
