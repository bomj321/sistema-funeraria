$(document).ready(function(){
  //NAVBAR DEL MATERIALIZE.CSS
    $('.sidenav').sidenav();


    $('.carousel.carousel-slider').carousel({
      fullWidth: true,
      indicators: true},setTimeout(autoplay, 3500));

    function autoplay() {
      $('.carousel.carousel-slider').carousel('next');
      setTimeout(autoplay, 3500);
    }



//Cierre de Jquery
  });


