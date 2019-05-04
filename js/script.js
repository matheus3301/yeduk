(function ($) {
  'use strict';


  // Preloader js    
  $(window).on('load', function () {
    $('.preloader').fadeOut(700);
  });

  //   navfixed
  $(window).on('scroll', function () {
    var scrolling = $(this).scrollTop();

    if (scrolling > 10) {
      $('.naviagtion').addClass('nav-bg');
    } else {
      $('.naviagtion').removeClass('nav-bg');
    }
  });

  // Background-images
  $('[data-background]').each(function () {
    $(this).css({
      'background-image': 'url(' + $(this).data('background') + ')'
    });
  });

  // venobox popup 
  $('.venobox').venobox();

  //  Count Up
  function counter() {
    var oTop;
    if ($('.counter').length !== 0) {
      oTop = $('.counter').offset().top - window.innerHeight;
    }
    if ($(window).scrollTop() > oTop) {
      $('.counter').each(function () {
        var $this = $(this),
          countTo = $this.attr('data-count');
        $({
          countNum: $this.text()
        }).animate({
          countNum: countTo
        }, {
          duration: 1000,
          easing: 'swing',
          step: function () {
            $this.text(Math.floor(this.countNum));
          },
          complete: function () {
            $this.text(this.countNum);
          }
        });
      });
    }
  }
  $(window).on('scroll', function () {
    counter();
  });


  // testimonial
  $('.testimonial-slider-single').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    dots: false,
    arrows: true,
    nextArrow: '<buttton class="nextarrow"></buttton>',
    prevArrow: '<buttton class="prevarrow"></buttton>'
  });


  // blog slider
  $('.blog-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: false,
    dots: false,
    arrows: true,
    nextArrow: '<buttton class="nextarrow"></buttton>',
    prevArrow: '<buttton class="prevarrow"></buttton>',
    responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });

  $('.category-slider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: false,
    dots: false,
    arrows: true,
    nextArrow: '<buttton class="nextarrow"></buttton>',
    prevArrow: '<buttton class="prevarrow"></buttton>',
    responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });

  $('.testimonial-slider').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: false,
    dot: false,
    autoplay: true,
    responsive: [{
        breakpoint: 1024,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });


})(jQuery);