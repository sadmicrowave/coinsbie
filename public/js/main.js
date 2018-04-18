


/*
 Make Table Rows Clickable
 ========================================================================== */

 	$(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });


/*
 Auto Focus on Search Box
 ========================================================================== */
	$(document).ready(function(){
		$('input#main-search').focus();
	});
  

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

      /*// one page navigation 
      $('.main-navigation').onePageNav({
              currentClass: 'active'
      });*/    
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
 /* $(function(){
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
			  var price 		= parseFloat(coin['price_usd']).toFixed(2)
			  	 ,priceParts 	= price.toString().split(".")
			  	 ,priceNum 		= priceParts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",") + (priceParts[1] ? "." + priceParts[1] : "")
			  	 
			  	 ,cap 			= parseFloat(coin['market_cap_usd']).toFixed(2)
			  	 ,capParts 		= cap.toString().split(".")
			  	 ,capNum 		= capParts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",") + (capParts[1] ? "." + capParts[1] : "")
			  	 ;

			  
			  elmsToAppend.push(
				  					$("<tr/>").addClass('clickable-row')
				  						   .data('href', '/coin/' + coin['symbol'])
				  						   .append(
					  						    $("<td/>").text( coin['rank'] )
					  						   ,$("<td/>").text( coin['name'] )
					  						   ,$("<td/>").text( coin['symbol'] )
					  						   ,$("<td/>").text( "$ " + priceNum )
					  						   ,$("<td/>").text( "$ " + capNum )
					  						   ,$("<td/>").append( coin['available_supply'].toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")
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

   

   
   