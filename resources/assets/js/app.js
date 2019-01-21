// Closes the sidebar menu
$("#menu-close").click(function(e) {
  e.preventDefault();
  $("#sidebar-wrapper").toggleClass("active");
  $('.cross').delay(40000000).removeClass('active-cross');
  $('.wrapper').removeClass('toggled');
  $('.menu-bar').toggleClass('active-menu-bar');
});

//FLASH MESSAGING
$('#flash').delay(500).fadeIn(250).delay(3000).fadeOut(500);

// Opens the sidebar menu
$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#sidebar-wrapper").toggleClass("active");
  $('.cross').delay(40000000).addClass('active-cross');
  $('.wrapper').addClass('toggled');
  $('.menu-bar').toggleClass('active-menu-bar');
});

// Opens the bottombar menu
$("#cart-toggle").click(function(e) {
  e.preventDefault();
  $("#cart-bar").toggleClass("open");
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


$('.owl-carousel').owlCarousel({
      nav:true,

            margin: 250,

    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
});

var stripe = Stripe('pk_test_Rguu0vBg9OmuKlKybesFzzMf');
var elements = stripe.elements();
// Custom styling can be passed to options when creating an Element.
var style = {
  base: {
    // Add your base input styles here. For example:
    fontSize: '16px',
    color: "#32325d",
  }
};

// Create an instance of the card Element
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>
card.mount('#card-element');

card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Create a token or display an error when the form is submitted.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the customer that there was an error
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server
      stripeTokenHandler(result.token);
    }
  });
});

function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
};

//paste this code under the head tag or in a separate js file.
// Wait for window load
$(window).load(function() {
  // Animate loader off screen
  document.getElementById("car-div").style.display = "none";
});
