//javascript functions

//Scrolling local navigation function and fading logos function

$(window).scroll(function(){

  var wScroll = $(this).scrollTop();

  if (wScroll >= 170) {

    var bScroll = wScroll - 170;

    $('.localnav').css({
      'transform' : 'translate(0px , '+ bScroll +'px)'
    });
  }
  else {
    $('.localnav').css({
      'transform' : 'translate(0px , 0px)'
    });
  }

  var transitionHeight = 150;

  var opacityDefault = 0.75;

  if (wScroll == 0) {
    $('.logo').css({
      'opacity' : opacityDefault
    });
  }

  else if ((wScroll <= transitionHeight) && !(wScroll == 0)) {

    var relativeValue = ( wScroll / transitionHeight ) * opacityDefault;

    console.log(relativeValue);
    console.log(opacityDefault);
    console.log(wScroll);

    $('.logo').css({
      'opacity' : opacityDefault - relativeValue
    });
  }

  else {
    $('.logo').css({
      'opacity' : 0
    });
  }
});

//the function above is inspired by Travis Neilsons Youtube Series "Paralax on the Web"

//The next function is found here:
//https://css-tricks.com/snippets/jquery/smooth-scrolling/

$(function() {

  $('a[href*="#"]:not([href="#"])').click(function() {

    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {

      var target = $(this.hash);

      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');

      if (target.length) {

        $('html, body').animate({
          scrollTop: target.offset().top - 50
        }, 500);

        return false;
      }
    }
  });
});
