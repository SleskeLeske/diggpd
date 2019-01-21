@extends('layouts.default')

  @section('title')
    Digg På Døren
  @endsection


@section('content')
@include('includes.cart')



    <div id="wrapper">
      <div class="overlay"></div>


        <!-- Section: Concept

        <section class="konsept" id="konsept">
          <div class="container">
            <div class="row text-center">
              <div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1">
                <div class="konsept-div">
                  <div class="konsept-logo konsept-lead">
                    <img src="img/dpd-logo-black.png" alt="">
                  </div>
                  <div class="konsept-text konsept-lead text-center">
                    <br>
                    <b>Innbyggere av Bergen - nå står reform for tur; <br> folkene bak konseptet
                    <i>Digg På Døren</i> har løsningen for deg!</b><br> <br>
                  </div>
                  <div class="konsept-text konsept-lead text-left">
                    Vi tilbyr direktesalg av et mindre utvalg varer, levert helt frem til din dør
                    av våre egne, erfarne sjåfører. Og det beste av alt; vi matcher kiosk-prisene!
                    Det vil altså aldri koste mer å handle hos oss enn å snope på bensinstasjonen.
                  </div>
                  <div class="konsept-text konsept-lead text-left">
                    Fordelen er at du slipper å dra noe sted for å få tak i de varene du måtte ønske
                    sent på lørdagskvelden. Dette er også økonomisk av natur, ettersom du har full
                    kontroll og tar gjennomtenkte beslutninger når du bestiller. Slik unngår du å
                    handle for mye, du sparer lommeboken - og miljøet!
                  </div>
                  <div class="konsept-text konsept-lead text-left">
                    Vi starter først opp i Bergen, og begynner med levering av digg 1. september,
                    eller om <span id="demo"></span>. Fra da av vil du kunne nyte all helgegodisen dere
                    måtte ha lyst på, og det hele med god samvittighet!
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section> -->

        <section class="how-we-work">
          <div class="container">
            <div class="row">
              <h1 class="text-center">Hvordan funker vi?</h1>

              <div class="icon-container icon-1 col-sm-4">
                <img src="{{asset('img/about-icons/002-barcode-scanner.svg')}}" alt="">
                <h3 class="text-center">Finn varer</h3>
                <p class="text-center">Velg av våre forsiktig utvalgte varer og plasser dem i din handlevogn</p>
                <a href="{{route('home')}}" class="text-center">Finn Varer</a>
              </div>

              <div class="icon-container icon-2 col-sm-4">
                <img src="{{asset('img/about-icons/001-credit-card.svg')}}" alt="">
                <h3 class="text-center">Betal</h3>
                <p class="text-center">Betal med kort eller tidligere kjøpte Digg På Døren kreditter</p>
                <a href="{{route('getCredit')}}" class="text-center">Kjøp Kreditter</a>
              </div>

              <div class="icon-container icon-3 col-sm-4">
                <img src="{{asset('img/about-icons/003-delivery-truck.svg')}}" alt="">
                <h3 class="text-center">Få din bestilling på døren!</h3>
                <p class="text-center">Velg av våre forsiktig utvalgte varer og plasser dem i din handlevogn</p>
                <a href="{{route('register')}}" class="text-center">Registrer deg</a>
              </div>

            </div>
          </div>
        </section>

        <!-- Section: Team -->

        <section class="team" id="team">
          <div class="container">
            <div class="row text-center">
              <div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1">
                <div class="team-div">
                  <div class="team-header team-lead">Menneskene bak ideen</div>
                  <div class="team-text team-lead">
                    Digg På Døren ble skapt av tre bergensere med et sterkt ønske for å forbedre
                    tilgjengeligheten på snacks og kioskvarer på nattestid og på distriktet. Inspirert
                    av tjenester som Foodora og Kolonial ble konseptet bygget på å fylle et behov som
                    ikke per dags dato tilfredsstilles av tradisjonelle forhandlere.
                  </div>
                  <div class="team-members">
                    <div class="row text-center">
                      <div class="team-member team-member-fade col-sm-12 col-sm-4">
                        <div class="row">
                          <div class="col-xs-10 col-xs-offset-1">
                            <div class="team-member-img-div"><img src="{{asset('img/team3.jpg')}}" class="img-circle team-member-img img-responsive" alt=""></div>
                            <div class="team-member-name"><strong>Frederick Thøgersen</strong></div>
                            <div class="team-member-title">Økonomi</div>
                          </div>
                        </div>
                      </div>
                      <div class="team-member team-member-fade col-sm-12 col-sm-4">
                        <div class="row">
                          <div class="col-xs-10 col-xs-offset-1">
                            <div class="team-member-img-div"><img src="{{asset('img/team1.jpg')}}" class="img-circle team-member-img img-responsive" alt=""></div>
                            <div class="team-member-name"><strong>Emil Kumhle</strong></div>
                            <div class="team-member-title">Logistikk</div>
                          </div>
                        </div>
                      </div>
                      <div class="team-member-fade team-member col-sm-12 col-sm-4">
                        <div class="row">
                          <div class="col-xs-10 col-xs-offset-1">
                            <div class="team-member-img-div"><img src="{{asset('img/team2.jpg')}}" class="img-circle team-member-img img-responsive" alt=""></div>
                            <div class="team-member-name"><strong>Heine Vidme</strong></div>
                            <div class="team-member-title">Plattform</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="team-text team-lead">
                    Nå jobber vi hardt for å få bedriften på hjul slik vi kan levere Digg på din Dør!
                    Sammen vil vi skape det beste tilbudet med den høyeste grad av service din by har
                    å tilby. Vi gleder oss!
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- Section: Career -->

      <!--  <section id="jobb" class="career">
          <div class="container">
            <div class="row">
              <div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1">
                <div class="career-header career-lead">Vil du jobbe med oss?</div>
                <div class="career-text career-lead text-muted"><b>Vi trenger flere sjåfører!</b><br><br>Har du en smal bil og et bredt smil? Vi kan tilby gode arbeidsvilkår og trygge ordninger. Opplæring i bruk av systemer og logistikk vil bli gitt. Har du lyst til å ta del i skapingen av morgendagens standard innad digital handel? Ta kontakt med oss i dag!</div>
                <div class="career-lead career-button"><button type="button" class="btn btn-lg btn-modal" data-toggle="modal" data-target="#myModal">Kom i kontakt med oss</button></div>

                <div id="myModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Kom i kontakt med oss!</h4>
                      </div>
                      <div class="modal-body">
                        <form action="./mail.php" method="POST">
                          <input type="hidden" name="SEND_FORM" value="true">
                          <input type="hidden" name="subject" value="Forespørsel om jobb">
                          <input type="hidden" name="redirect" value="landing">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Navn *" id="name" required data-validation-required-message="Navn påkrevd.">
                                <p class="help-block text-danger"></p>
                              </div>
                              <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Epost-adresse *" id="email" required data-validation-required-message="Epost-adresse påkrevd.">
                                <p class="help-block text-danger"></p>
                              </div>
                              <div class="form-group">
                                <input type="tel" class="form-control" name="tel" placeholder="Mobilnummer *" id="phone" required data-validation-required-message="Telefonnummer påkrevd.">
                                <p class="help-block text-danger"></p>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <textarea class="form-control" name="message" placeholder="Melding *" id="message" required data-validation-required-message="Melding påkrevd."></textarea>
                                <p class="help-block text-danger"></p>
                              </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                              <div id="success"></div>
                              <button type="submit" class="btn btn-lg btn-modal">Send inn</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </section>

        <!-- Section: Footer -->

<!-- Icons Published by Vectors Market  8 months ago
License: Flaticon Basic License
Download format: Vector icon (SVG & EPS), PNG and PSD
Style: Flat Color / Flat-->
      </div>
      <!-- /#page-content-wrapper -->
    </div>
    <!-- /#wrapper -->

    <script data-cfasync="false" src="/cdn-cgi/scripts/d07b1474/cloudflare-static/email-decode.min.js"></script><script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>

        <script>

    var countDownDate = new Date("Sep 1, 2017 21:00").getTime();
    var x = setInterval(function() {
      var now = new Date().getTime();
      var distance = countDownDate - now;
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
      document.getElementById("demo").innerHTML = days + " dager " + hours + " timer og "
      + minutes + " minutter";
      if (distance < 0) {
          clearInterval(x);
          document.getElementById("demo").innerHTML = "VI KJØRER!";
      }
    }, 1000);
    </script>

    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
      e.preventDefault();
      $("#sidebar-wrapper").toggleClass("active");
      $('.cross').delay(40000000).removeClass('active-cross');
      $('.wrapper').removeClass('toggled');
      $('.menu-bar').toggleClass('active-menu-bar');
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#sidebar-wrapper").toggleClass("active");
      $('.cross').delay(40000000).addClass('active-cross');
      $('.wrapper').addClass('toggled');
      $('.menu-bar').toggleClass('active-menu-bar');
    });

    $(document).ready(function(){
      $(".scroll").on('click', function(event) {
        if (this.hash !== "") {
          event.preventDefault();
          var hash = this.hash;
          $('html, body').animate({
            scrollTop: $(hash).offset().top
          }, 800, function(){
            window.location.hash = hash;
          });
        }
      });
    });
    </script>

    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>

    <script>
    window.sr = ScrollReveal();
    sr.reveal('.icon-1');
    sr.reveal('.icon-2', 300);
    sr.reveal('.icon-3', 3000);
    sr.reveal('.head-lead');
    sr.reveal('.head-lead', 300);
    sr.reveal('.konsept-lead');
    sr.reveal('.konsept-lead', 300);
    sr.reveal('.career-lead');
    sr.reveal('.career-lead', 300);
    sr.reveal('.team-lead');
    sr.reveal('.team-lead', 300);
    sr.reveal('.team-member-fade');
    sr.reveal('.team-member-fade', 200);
    sr.reveal('.footer-lead');
    sr.reveal('.footer-lead', 300);
    distance: '10px';
    </script>


@endsection
