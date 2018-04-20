$(document).ready(function(){
    //NAVBAR DEL MATERIALIZE.CSS
    $('.sidenav').sidenav();

    //Carousel index.php
    $('.carousel.carousel-slider').carousel({
      fullWidth: true,
      indicators: true},setTimeout(autoplay, 3500));

    function autoplay() {
      $('.carousel.carousel-slider').carousel('next');
      setTimeout(autoplay, 3500);
    }
    
    //parallax
    $('.parallax').parallax();

    //efecto de la imagen al pasar el mouse
    $('.materialboxed').materialbox();

    //productos
    $('.tabs').tabs();

    //btn contactanos
    $('.fixed-action-btn').floatingActionButton();
    $('.modal').modal();



//Cierre de Jquery
  });


