
        <footer>
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-3 col-xs-12 text-center  footer-col-left hidden-xs">
                <strong>Postadresse/hovedkontor</strong><br>
                Søndre skogveien 31,<br>
                5055 Bergen<br>
                <div class="hidden-xs"><br><span class="copyright">&copy;2018 med enerett</span></div>
              </div>
              <div class="col-sm-3 col-xs-12 text-center  footer-col-left hidden-xs">
                <strong>FORETAKSREGISTERET </strong><br>
                NO 919 398 388,<br>
                 Bergen<br>
              </div>
              <div class="col-sm-3 col-xs-6 text-center footer-col-center">
                <div class="messenger-header">Lurer du på noe?</div>
                <a href="https://m.me/DiggPD" target="_blank" class="btn messenger-btn">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="96 93 322 324">
                    <path d="M257 93c-88.918 0-161 67.157-161 150 0 47.205 23.412 89.311 60 116.807V417l54.819-30.273C225.449 390.801 240.948 393 257 393c88.918 0 161-67.157 161-150S345.918 93 257 93zm16 202l-41-44-80 44 88-94 42 44 79-44-88 94z" id="messenger"/>
                  </svg>
                  Vi er på Messenger</a>
              </div>
              <div class="col-sm-3 col-xs-6 text-center footer-col-right">
                <div class="contact-links">
                  <a href="tel:41358715"><i class="icon ion-android-call" aria-hidden="true"></i> 413 58 715</a><br>
                  <a href="/cdn-cgi/l/email-protection#a4ccc1cde4c0cdc3c3d4c08acacb"><i class="icon ion-android-mail" aria-hidden="true"></i> <span class="__cf_email__" data-cfemail="88e0ede1c8ece1efeff8eca6e6e7">admin@diggpd.no</span></a>
                </div>
                <br>
                <ul class="list-inline social-buttons">
                  <li><a href="https://twitter.com/realdiggpd" target="_blank"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="https://www.facebook.com/DiggPD/" target="_blank"><i class="fa fa-facebook"></i></a></li>
                  <li><a href="https://www.instagram.com/digg_pa_doren/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
</body>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="{!! asset('vendor/owlcarousel/dist/owl.carousel.min.js') !!}"></script>
<script src="https://js.stripe.com/v3/"></script>
<script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();
});
</script>
<script>
window.sr = ScrollReveal();
sr.reveal('.1');
sr.reveal('.2');
sr.reveal('.3');
</script>
@yield('scripts')
<script>
//paste this code under the head tag or in a separate js file.
// Wait for window load

  document.addEventListener("DOMContentLoaded", function(event){
    // Animate loader off screen
  $("#car-div").delay( 850 ).fadeOut();

});

</script>

<script type="text/javascript" src="{!! asset('js/app.js') !!}"></script>
</html>
