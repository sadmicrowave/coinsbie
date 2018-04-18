
@include('partials.header')
     
   	<!-- Header Section Start -->

    <header id="hero-area" data-stellar-background-ratio="0.5">    
    	
	      @include('partials.nav')

	      <div class="container">
	        <div class="row justify-content-md-center">
		          	<div class="col-md-10 wow" data-wow-delay="0.2s">
			          <ul class="cd-hero-slider">
				          <li class="selected pane">
				          	<div class="contents text-center">
					          	<br><br>
				            	<h1 class="wow fadeInDown coinsbie" data-wow-duration="1000ms" data-wow-delay="0.3s">Coinsbie<h3 class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s">Maximizing Cryptocurrency Investors Return on Investment</h3></h1>
								<p class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="400ms">Free cryptocurrency investment statistics to help you make the right investment choices.</p>

								<form action="/coin" method="POST">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<input type="text" id="main-search" name="search" class="wow fadeInDown form-control" data-wow-duration="1000ms" data-wow-delay="0.3s" placeholder="Search Coins" autofocus aria-label="Search Coins" aria-describedby="basic-addon2"/>
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
		    <div class="row justify-content-md-center">
			    <div class="section-header">
				  <div class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="0.3s">          
			          <h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">Top <span>Fifty</span></h2>
			          <hr class="lines wow zoomIn" data-wow-delay="0.3s">
			          <p class="section-subtitle wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">The top fifty hottest coins on the market as defined by <a href="http://coinmarketcap.com" title="coinmarketcap.com">coinmarketcap.com</a>.  Use the search bar to find a specific coin by symbol or coin name and view its Coinsbie Calculation.  Alternatively, you may click the table row of a coin in the table below to see the Coinsbie Calculation.</p>
				  </div>
		        </div>
			    
			    <div class="col-md-12">
				    <div class="wow fadeInUp table-responsive" data-wow-duration="1000ms" data-wow-delay="0.3s">
					    <div id="table-wrapper" class="card">
							    <table id="top-50-table" class="table table-striped table-bordered table-hover rounded">
								  <thead>
								    <tr>
									  <th scope="col">Rank</th>
								      <th scope="col">Name</th>
								      <th scope="col">Symbol</th>
								      <th scope="col">Price (USD)</th>
								      <th scope="col">Market Cap (USD)</th>
								      <th scope="col">Available Supply</th>
								    </tr>
								  </thead>
								  <tbody>
								  	@foreach($tickers as $ticker)
								    <tr class='clickable-row' data-href="/coin/{{$ticker['symbol']}}">
									  <td>{{$ticker['rank']}}</td>
								      <td>{{$ticker['name']}}</td>
								      <td>{{$ticker['symbol']}}</td>
								      <td>${{ number_format( $ticker['price_usd'], 2) }}</td>
								      <td>${{ number_format( $ticker['market_cap_usd'], 2) }}</td>
								      <td>{{ number_format( $ticker['available_supply'] ) }} <span class="lnr lnr-chevron-right table-row-chevron"></span></td>
								    </tr>
								    @endforeach
								  </tbody>
							    </table>
					    </div>
				    </div>
			    </div>
		    </div>
		    
		    
		    <br>
		    <div class="row justify-content-md-center">
			    <div class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="0.3s"> 
			    	<button id="loadmore" type="button" class="btn btn-primary rounded">Load Next 50 Coins</button>
			    </div>
		    </div>
		    
		    
	    </div>	    
    </section> 


@include('partials.footer')
 