@extends('layouts.default')
@section('title')
  Digg På Døren
@endsection
@section('content')
<div class="container">
  <h1 class="text-center register-title">DIGG PÅ DØREN</h1>


  <div class="register-container">
    <h1 class="signup-title text-center">LOGG INN</h1>
    <form class="signup" action="/login" method="post">
      {{csrf_field()}}
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" id="email" name="email" value="email">
      </div>

      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password" value="password">
      </div>

      <div class="text-center form-group">
        <button type="submit" class="standard-button">
          SUBMIT
          </button>
      </div>

      <a href="{{route('forgotPassword')}}">Glemt passord?</a>

      <a style="float:right;" href="{{route('register')}}">Ingen bruker?</a>
        @include('includes.errors')

    </form>
    <a href="{{ url('/auth/facebook') }}" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
  </div>

</div>

<!--
<script>
window.fbAsyncInit = function() {
  FB.init({
    appId      : '2259778204236457',
    cookie     : true,
    xfbml      : true,
    version    : 'v3.2'
  });

  FB.AppEvents.logPageView();

};

(function(d, s, id){
   var js, fjs = d.getElementsByTagName(s)[0];
   if (d.getElementById(id)) {return;}
   js = d.createElement(s); js.id = id;
   js.src = "https://connect.facebook.net/en_US/sdk.js";
   fjs.parentNode.insertBefore(js, fjs);
 }(document, 'script', 'facebook-jssdk'));


FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
});

{
    status: 'connected',
    authResponse: {
        accessToken: '...',
        expiresIn:'...',
        signedRequest:'...',
        userID:'...'
    }
}

function checkLoginState() {
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
}
</script>

<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/nb_NO/sdk.js#xfbml=1&version=v3.2&appId=2259778204236457&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>-->
@endsection
