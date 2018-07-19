$(document).ready(function(){
	
	
	/*
   	Restructure Coins SessionStorage Array with Rank as Index
   	========================================================================== */
	$( function() {
		if ( window.location.href.indexOf("/coin/") > -1 ){

			var  coins = $.parseJSON( sessionStorage.getItem('coins') )
				,indexObj = {}
				;
			
			$.each(coins, function(index, el){
				indexObj[ el['rank'] ] = el;
			});
			
			sessionStorage.setItem("coins", JSON.stringify( indexObj ) );		
		}
	});
	
	
	
	
	/*
   	Handle coin slider construction logic
   	========================================================================== */
	$( function() {
		
		// only perform the following operation if the current page is a coin page
		if ( window.location.href.indexOf("/coin/") > -1 ){
		
			var  $handle = $('#custom-handle')
				,$slider = $('#slider')	// set the DOM element to interact with
				,coin  = $.parseJSON( sessionStorage.getItem('coin') ) // get searched coin from session storage
				;
		
			$( "#slider" ).slider({
				 'min'	: 1
				,'max'	: coin['rank']
				,'value': coin['rank']
				,'step'	: 1
				
				,'create': function() {
					$handle.text( $( this ).slider( "value" ) );
				 }
				,'slide': function( event, ui ) {					
					var val = (coin['rank'] - ui.value)+1;
					$handle.text( val );
					
					recalculate ( val, coin );
				 }
			});
			// override slider.value declaration
			$handle.text( '1' );
			
		}
	});
	
	
	/*
   	Handle Recalculating Potential Max Price and Potential Earning on Slide
   	========================================================================== */
	function recalculate ( rank, coin ) {
		
		var  coins		  	= $.parseJSON( sessionStorage.getItem('coins') ) 
			,$coinInput		= $("#coin_input")
			,$potMaxPrice 	= $("#pot-max-price .card-body .card-text")
			,$potEarnMult 	= $("#earning-multiple .card-body .card-text")
			
			,compCoin 	= coins[ rank ] // set the coin to compare against
			
			,potPrice	= compCoin['market_cap_usd'] / coin['available_supply']
			,potMult	= potPrice / coin['price_usd']
			,potPrice	= potPrice.toFixed(2)
			,potMult	= potMult.toFixed(2)		
			;
		
		$potMaxPrice.text('$ ' + potPrice );
		$potEarnMult.text('x ' + potMult );
		
		$coinInput.data({'potential-price': potPrice, 'earning-multiple': potMult });
		
		var  inv = parseInt( $coinInput.val() )
	    	,price = $coinInput.data('usd-price')
	    	//,potprice = $(this).data('potential-price')
	    	,potearn  = $(this).data('earning-multiple')
	    	//,coinamt = ( inv / price ).toFixed(2)
	    	,potentialearnings = ( inv * potMult ).toFixed(2)
	    	
	    	//,coinamt = ( ! isNaN(coinamt) ? coinamt : '0' )
	    	,potentialearnings = ( ! isNaN(potentialearnings) ? '$' + String(potentialearnings) : '0' )
	    	;	 
				
		//$('#total_coins').text( coinamt.replace(/\B(?=(\d{3})+\b)/g, ",") );
	    $('#potential_earnings').text( potentialearnings.replace(/\B(?=(\d{3})+\b)/g, ",") );
		
	}
	
	
});