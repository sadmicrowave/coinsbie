@include('partials.header')
     
   	<!-- Header Section Start -->

    <header id="hero-area" class="mini" data-stellar-background-ratio="0.5">    
    	
	      @include('partials.nav')

	      <div class="container">
	        <div class="row justify-content-md-center">
		          	<div class="col-md-10 wow" data-wow-delay="0.2s">
			          <ul class="cd-hero-slider">
				          <li class="selected pane">
				          	<div class="contents text-center">
					          	<br>
				            	<h1 class="wow fadeInDown coin-title" data-wow-duration="1000ms" data-wow-delay="0.3s">{{$coin['name']}} <span class="coin-symbol">({{$coin['symbol']}})</span></h1>
				              
								<form action="/coin" method="POST">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="text" id="main-search" list="coins" name="search" class="wow fadeInDown form-control" data-wow-duration="1000ms" data-wow-delay="0.3s" placeholder="Search Coins" autofocus aria-label="Search Coins" aria-describedby="basic-addon2"/>
									
									<datalist id="coins"> 
										@foreach($tickers as $ticker)
											<option value="{{ $ticker['name'] }}">{{ $ticker['name'] }} ({{ $ticker['symbol']}})</option>
										@endforeach
									</datalist>
									
								</form>
				            </div>
				          </li>
			          </ul>
		          	</div>	        
	          </div>
	        </div> 
	      </div> 
    </header>
    <!-- Header Section End --> 


    <section class="distance">
	    <div class="container">
		    <div class="row wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="0.3s">
			    
			    <div class="col-12 justify-content-center card-container">
				    <div class="card coin" style="width: 18rem;">
					  <div class="card-body">
					    <h5 class="card-title">Current USD Price</h5>
					    <p class="card-text">${{ number_format( $coin['price_usd'], 2) }}</p>
					  </div>
					</div>
	
	
					<div class="card coin with-question" ref="pot-max-price" style="width: 18rem;">
					  <div class="card-body">
					    <h5 class="card-title">Potential Max Price</h5>
					    <p class="card-text">${{ number_format( $coin['price_at_bitcoin_marketcap'], 2) }}</p>
					    <span class="card-info lnr lnr-question-circle"></span>
					  </div>
					</div>
					
					<div class="card coin with-question" ref="earning-multiple" style="width: 18rem;">
					  <div class="card-body">
					    <h5 class="card-title">Earning Multiple</h5>
					    <p class="card-text">x{{ number_format( $coin['potential_earning_multiple'], 2) }}</p>
					    <span class="card-info lnr lnr-question-circle"></span>
					  </div>
					</div>
			    </div>
			    
		    </div>
	    </div>
    </section> 
    
    
    <section class="distance">
	    <div class="container">
			<div class="row justify-content-md-center">
			    <div class="section-header">
					<h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">The Coinsbie <span>Calculator</span></h2>
					<hr class="lines wow zoomIn" data-wow-delay="0.3s">
					<p class="section-subtitle wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">O.K., here's how it works! Want to know how much your potential return could be if you invest a certain dollar amount at the coin's current market price?  Enter your value in the <code>Investment Amount</code> block below and watch the magic of the Coinsbie Calculator.</p>
				</div>
			    
			    <div class="container">
				    <div class="row wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="0.3s">
					    <div class="col-12 justify-content-center card-container">
						    
						    <div id="card-input" class="card coin with-question" style="width: 18rem;">
							  <div class="card-body">
							    <h5 class="card-title">Investment Amount</h5>
							    <input id="coin_input" pattern="[0-9.]+" data-usd-price="{{ $coin['price_usd'] }}" data-potential-price="{{ $coin['price_at_bitcoin_marketcap'] }}" data-earning-multiple="{{ $coin['potential_earning_multiple'] }}"/>
							  </div>
							</div>
			
							<div class="card coin with-question" ref="total-coins" style="width: 18rem;">
							  <div class="card-body">
							    <h5 class="card-title">Total Coins Received</h5>
							    <p id="total_coins" class="card-text"></p>
							    <span class="card-info lnr lnr-question-circle"></span>
							  </div>
							</div>
							
							<div class="card coin with-question" ref="potential-earning" style="width: 18rem;">
							  <div class="card-body">
							    <h5 class="card-title">Potential Earning</h5>
							    <p id="potential_earnings" class="card-text"></p>
							    <span class="card-info lnr lnr-question-circle"></span>
							  </div>
							</div>
					    </div>
					    
				    </div>
				    <p class="calc-error"></p>
			    </div>
			</div>
	    </div>
    </section>
    
    
    
    
    <div class="modal fade" id="pot-max-price" tabindex="-1" role="dialog" aria-labelledby="PotentialMaxPrice" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="col-12 modal-title text-center" id="PotentialMaxPrice">Potential Max Price
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
	        </h5>
	      </div>
	      <div class="modal-body">
	        <div class="contents text-center">
		        <p>The Potential Maximum Price calculation represents the potential price per coin if the coin were to reach Bitcoin's current <a href="https://www.investopedia.com/articles/basics/03/031703.asp">market capitalization</a>.</p>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
	
	<div class="modal fade" id="earning-multiple" tabindex="-1" role="dialog" aria-labelledby="EarningMultiple" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="col-12 modal-title text-center" id="EarningMultiple">Earning Multiple
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
	        </h5>
	      </div>
	      <div class="modal-body">
	        <div class="contents text-center">
		        <p>The Potential Earning Multiple calculation represents your return on investment multiplier from investing at the coin's current price, and if the coin ever reaches Bitcoin's current <a href="https://www.investopedia.com/articles/basics/03/031703.asp">market capitalization</a>.</p>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
	
	<div class="modal fade" id="total-coins" tabindex="-1" role="dialog" aria-labelledby="TotalCoins" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content text-center">
	      <div class="modal-header">
	        <h5 class="col-12 modal-title text-center" id="TotalCoins">Total Coins Received
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
	        </h5>
	      </div>
	      <div class="modal-body">
	        <div class="contents text-center">
		        <p>The Total Coins Received calculation represents the amount of coins you would own based on your investment and the coin's current market price.</p>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
	
	<div class="modal fade" id="potential-earning" tabindex="-1" role="dialog" aria-labelledby="PotentialEarning" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="col-12 modal-title text-center" id="PotentialEarning">Potential Earning
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
	        </h5>
	      </div>
	      <div class="modal-body">
	        <div class="contents text-center">
		        <p>The Potential Earning calculation represents your total return on investment from investing at the coin's current price, and if the coin ever reaches Bitcoin's current <a href="https://www.investopedia.com/articles/basics/03/031703.asp">market capitalization</a>.</p>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
    

@include('partials.footer')
 