@extends('layouts.default')
@section('title')
  Digg På Døren
@endsection
@section('content')
<div class="container">
  <h1 class="text-center register-title">DIGG PÅ DØREN</h1>


  <div class="register-container">
    <h1 class="signup-title text-center">REGISTRER DEG</h1>
    <form class="signup" action="/register" method="post">
      {{csrf_field()}}
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" id="email" name="email" value="Email">
      </div>

      <div class="form-group">
        <label for="firstName">Fornavn:</label>
        <input type="text" class="form-control" id="firstName" name="firstName" value="Fornavn">
      </div>

      <div class="form-group">
        <label for="lastName">Etternavn:</label>
        <input type="text" class="form-control" id="lastName" name="lastName" value="Etternavn">
      </div>

      <div class="form-group">
        <label for="password">Passord:</label>
        <input type="password" class="form-control" id="password" name="password" value="password">
      </div>

      <div class="form-group">
        <label for="password_confirmation">Bekreft Passord:</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="password">
      </div>

      <div class="text-center form-group">
        <button type="submit" class="standard-button">
          SUBMIT
          </button>
      </div>

        @include('includes.errors')

    </form>
    <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>

  </div>

</div>
@endsection
