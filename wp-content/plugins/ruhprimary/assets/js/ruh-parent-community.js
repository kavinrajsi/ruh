jQuery(document).ready(function ($) {
  $(".owl-carousel").owlCarousel({
    loop: true,
    margin: 10,
     center: true,
    nav: false,
    dots: false,
    autoplay: true,
    responsive: {
      0: {
        items: 1.4,
      },
      600: {
        items: 3.2,
      },
      1000: {
        items: 5.6,
      },
    },
  });
});
