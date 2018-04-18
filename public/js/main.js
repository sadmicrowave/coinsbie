/* 
   CounterUp
   ========================================================================== */
   /* jQuery(document).ready(function( $ ) {
      $('.counter').counterUp({
        time: 500
      });
    });
	*/
/*
   MixitUp
   ========================================================================== */
  /*  $(function(){
      $('#portfolio').mixItUp();
    });
  */


/*
 Make Table Rows Clickable
 ========================================================================== */

 	$(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });


/*
 Ensure User's Browser is Capable
 ========================================================================== */
/*	if (!Modernizr.svg) {
		$("img#main-brand").attr("src", "img/Coinsbie Calculator.png");
	}
*/
/*
 Auto Focus on Search Box
 ========================================================================== */
	$(document).ready(function(){
		$('input#main-search').focus();
	});
  
/*
   Touch Owl Carousel
   ========================================================================== */
 /*   $(".touch-slider").owlCarousel({
        navigation: false,
        pagination: true,
        slideSpeed: 1000,
        stopOnHover: true,
        autoPlay: true,
        items: 1,
        itemsDesktopSmall: [1024, 1],
        itemsTablet: [600, 1],
        itemsMobile: [479, 1]
    });
    $('.touch-slider').find('.owl-prev').html('<i class="fa fa-chevron-left"></i>');
    $('.touch-slider').find('.owl-next').html('<i class="fa fa-chevron-right"></i>');
  */
/* 
   Sticky Nav
   ========================================================================== */
    $(window).on('scroll', function() {
        if ($(window).scrollTop() > 200) {
            $('.header-top-area').addClass('menu-bg');
        } else {
            $('.header-top-area').removeClass('menu-bg');
        }
    });

/* 
   VIDEO POP-UP
   ========================================================================== */
  /*  $('.video-popup').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false,
    });
  */
/* 
   Back Top Link
   ========================================================================== */
    var offset = 200;
    var duration = 500;
    $(window).scroll(function() {
      if ($(this).scrollTop() > offset) {
        $('.back-to-top').fadeIn(400);
      } else {
        $('.back-to-top').fadeOut(400);
      }
    });
    $('.back-to-top').click(function(event) {
      event.preventDefault();
      $('html, body').animate({
        scrollTop: 0
      }, 600);
      return false;
    })

/* 
   One Page Navigation & wow js
   ========================================================================== */
  jQuery(function($) {
      //Initiat WOW JS
      new WOW().init();

      // one page navigation 
      $('.main-navigation').onePageNav({
              currentClass: 'active'
      });    
  });
  
  

  jQuery(document).ready(function() {
     
      $('body').scrollspy({
          target: '.navbar-collapse',
          offset: 195
      });

      $(window).on('scroll', function() {
          if ($(window).scrollTop() > 50) {
              $('.fixed-top').addClass('menu-bg');
          } else {
              $('.fixed-top').removeClass('menu-bg');
          }
      });

  });
  

  /* Nivo Lightbox
  ========================================================*/
 /* jQuery(document).ready(function( $ ) {    
     $('.lightbox').nivoLightbox({
      effect: 'fadeScale',
      keyboardNav: true,
    });

  });
 */
  
  /* stellar js
  ========================================================*/
  $(function(){
    $.stellar({
      horizontalScrolling: false,
      verticalOffset: 10,
      responsive: true
    });
  });
  
/* 
   Page Loader
   ========================================================================== */
   $(window).load(function() {
    "use strict";
    $('#loader').fadeOut();
   });
   
   
   
/*
	Donation Modals
   ========================================================================== */   
   
   $('a.donate').on('click', function(){
	  var ref = $(this).attr('ref');
	  $( '#' + ref).modal('show'); 
   });

/*
	Card Information Modals
   ========================================================================== */   
   
   $('.card').on('click', function(){
	  var ref = $(this).attr('ref');
	  $( '#' + ref).modal('show'); 
   });
   
/*
	Input Card Focus on Input when Clicked
   ========================================================================== */   
   
   $('#card-input').on('click', function(){
	  $('input#coin_input').focus();
   });
   
/*
	Validate Coin Calculator Input & Perform Calculation
   ========================================================================== */   
   
    $("#coin_input").keyup(function (e) {
	    $(this).removeClass('shake animated danger');
	    
	    //var charCode = (evt.which) ? evt.which : evt.keyCode
	    //return !(charCode > 31 && (charCode < 48 || charCode > 57));
	    var  inv = parseInt( $(this).val() )
	    	,price = $(this).data('usd-price')
	    	,potprice = $(this).data('potential-price')
	    	,potearn  = $(this).data('earning-multiple')
	    	,coinamt = ( inv / price ).toFixed(2)
	    	,potentialearnings = ( inv * potearn ).toFixed(2)
	    	
	    	,coinamt = ( ! isNaN(coinamt) ? coinamt : '' )
	    	,potentialearnings = ( ! isNaN(potentialearnings) ? '$' + String(potentialearnings) : '' )
	    	;	    
	    
	    if ( $(this).val() && ! $.isNumeric(inv) ) {
	    	$(this).removeClass().addClass('shake animated danger').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(){
		        $(this).removeClass('shake animated');
		    });
	    	return false;
	    }
	    
	    $('#total_coins').text( coinamt.replace(/\B(?=(\d{3})+\b)/g, ",") );
	    $('#potential_earnings').text( potentialearnings.replace(/\B(?=(\d{3})+\b)/g, ",") );
	});



/*
	Handle Continuous Scroll Pagination on "Load Next 50 Coins" Button Click
   ========================================================================== */
   $("button#loadmore").on('click', function(){
	  var coins 	= $.parseJSON( sessionStorage.getItem('coins') )
	  	 ,index 	= parseInt( sessionStorage.getItem('tableIndex') )
	  	 ,nextStart = index + 1
	  	 ,nextStop 	= index + 50
	  	 ,elmsToAppend = [] //create element node container to append to dialog body
	  	 ;
	  
	  $.each(coins, function(index, coin){
		  if ( coin['rank'] >= nextStart && coin['rank'] <= nextStop )
		  {
			  elmsToAppend.push(
				  					$("<tr/>").addClass('clickable-row')
				  						   .data('href', '/coin/' + coin['symbol'])
				  						   .append(
					  						    $("<td/>").text( coin['rank'] )
					  						   ,$("<td/>").text( coin['name'] )
					  						   ,$("<td/>").text( coin['symbol'] )
					  						   ,$("<td/>").text( coin['price_usd'] )
					  						   ,$("<td/>").text( coin['market_cap_usd'] )
					  						   ,$("<td/>").text( coin['available_supply']
					  						   				  	,$("<span/>").addClass('lnr lnr-chevron-right table-row-chevron')
					  						   				    )
				  						   )
				  						   .on('click', function(){
					  						   window.location = $(this).data("href");
				  						   })
			  				);
		  }
	  });
	  
	  $("table#top-50-table tbody").append( elmsToAppend );
	  
	  sessionStorage.setItem('tableIndex', nextStop);
   });

   
/*
	Hero Login Slider
   ========================================================================== */
 /*  
   jQuery(document).ready(function( $ ) {
	    var slidesWrapper = $('.cd-hero-slider')
	    	,slidesNumber = slidesWrapper.children('li').length
	    	;
		
		$("#sign-up-btn").on('click', function(){
			nextSlide(slidesWrapper.find('.selected'), slidesWrapper, 1);
		});
		$(".sign-in-lnk").on('click', function(){
			nextSlide(slidesWrapper.find('.selected'), slidesWrapper, 2);
		});
   					
		$("#sign-up-back-1").on('click', function(){
			prevSlide(slidesWrapper.find('.selected'), slidesWrapper, 0);
		});
		$("#sign-up-back-2").on('click', function(){
			prevSlide(slidesWrapper.find('.selected'), slidesWrapper, 1);
		});
		
		$("#sign-in-back").on('click', function(){
			prevSlide(slidesWrapper.find('.selected'), slidesWrapper, 1);
		});

		$("#sign-in-back").on('click', function(){
			prevSlide(slidesWrapper.find('.selected'), slidesWrapper, 1);
		});

   
	   function nextSlide(visibleSlide, container, n){
			visibleSlide.removeClass('selected from-left from-right').addClass('is-moving').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
				visibleSlide.removeClass('is-moving');
			});
	
			container.children('li').eq(n).addClass('selected from-right').prevAll().addClass('move-left');
		}
		
		function prevSlide(visibleSlide, container, n){
		visibleSlide.removeClass('selected from-left from-right').addClass('is-moving').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
			visibleSlide.removeClass('is-moving');
		});

		container.children('li').eq(n).addClass('selected from-left').removeClass('move-left').nextAll().removeClass('move-left');
	}
	
   });
*/
   
   