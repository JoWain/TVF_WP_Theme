//javascript functions

//Scrolling local navigation function

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

});

//the function above is heavily inspired by Travis Neilsons Youtube Series "Paralax on the Web"
