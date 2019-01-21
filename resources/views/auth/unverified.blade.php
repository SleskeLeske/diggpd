@extends('layouts.default')

@section('content')
<div class="container">
  <div class="row">
    <div class="verfied-container text-center">
          <h1>Du er ikke verifisert</h1>

          <hr>
          <p>Vennligst følg Emailen sendt til din registrerings email for å få din konto bekreftet.</p>
          <p>Har du ikke motatt mail? <br> Trykk på linken under for å få tilsendt en ny bekreftelses mail</p>
          <a class="standard-button" href="{{route('sendNewVerificationEmail')}}">Send mail</a>
    </div>
  </div>
</div>

@endsection
