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
				          <br><br>
			              <h1 class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s">How To Use Coinsbie</h1>
			              <h3 class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s">Helping you become a smarter and more efficient investor.</h3>
			            </div>
			          </li>
		          </ul>
	          	</div>	        
	        </div> 
	      </div> 
	      
	     
    </header>
    <!-- Header Section End --> 


    <section class="distance">
	    <div class="container">
		    <div class="row justify-content-md-left">
			    <div class="col-md-12 wow ct-1-4" data-wow-delay="0.2s">
				    
				    <div class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="0.3s">											
						The Coinsbie calculation will show you what a coin could <u><b>potentially</b></u> be worth if it ever reached the current value of Bitcoin.  
						But to understand a cryptocurrency’s potential value you must first understand <a href="https://www.investopedia.com/articles/basics/03/031703.asp">market capitalization</a>.
						<br><br>
						
						The market capitalization is a simple calculation of the total number of coins multiplied by the total price 
						of those coins which gives you the total value.
						<br><br>
						
						<ul class="list-group">
						  <li class="list-group-item active">Let's Look At An Example</li>
						  <li class="list-group-item">
						  	A new cryptocurrency only made 100 coins, then sold them at $4.00/coin. 
							The total market cap of this cryptocurrency would be <b>$400.00</b> <code>(100 * $4.00 = $400)</code>.
						  </li>
						</ul>
				    </div>
					<br><br><br>
					
					<div class="section-header">
						<h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">What About <span>Mining?</span></h2>
						<hr class="lines wow zoomIn" data-wow-delay="0.3s">
					</div>
					<div class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="0.3s">
						Determining the market cap can get slightly more complicated when you involve mining coins, 
						because the total amount of coins (the supply) isn’t available instantly. 
						
						<br><br>
						For example, Bitcoin has a maximum supply of <code>21,000,000</code>. 
						Only the coins that have been mined are available to be used. Which is why the available supply does not match the maximum supply. 
					
						<br><br>
						<ul class="list-group">
						  <li class="list-group-item active">Time For Another Example</li>
						  <li class="list-group-item">
						  	To make the math easy let’s say one bitcoin is worth $10,000 and 16,000,000 coins have been mined (available supply). 
						  	The market cap in this scenario is <code>(16,000,000 * $10,000 = $160,000,000,000)</code> $160 billion dollars.
						  </li>
						</ul>
					</div>
					<br><br><br>
					
					<div class="section-header">
						<h2 class="section-title wow fadeIn" data-wow-duration="1000ms" data-wow-delay="0.3s">The Coinsbie <span>Calculator</span></h2>
						<hr class="lines wow zoomIn" data-wow-delay="0.3s">
					</div>

					<div class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="0.3s">
						Now suppose another coin's current price is $1.00.  If you want to understand what it could be worth in the future you have to look at it’s market cap. 
						Say this coin has a total supply of 80,000,000,000 coins. So it’s market cap is $80,000,000,000. This can now help you compare it to bitcoin.
						<br><br>
						
						<div class="jumbotron">
							<p>
								If this coin were to reach the current value of bitcoin ($160 billion) then it needs to double in price, which would double the market cap, from $80 billion to $160 billion. 
								Now you understand that if you invest in this coin at $1.00 then you could expect that it would rise to $2.00 if it were ever as popular and valuable as Bitcoin.  Effectively giving you a potential return on your investment (ROI) of 2x.
							</p>
							<hr class="my-4">
							<p>
								Lucky for you all of that math is done for you in our free Coinsbie calculator!
							</p>
						</div>
						
						What did we learn from that example above?  We learned that even though a coin looked like a good cheap investment at $1.00, its total value, 
						if it were ever as popular as Bitcoin, would only make it worth $2.00/coin due to its very large coin supply. 
						<b>This should tell you that not all cheap investments are good investments.</b>
						<br><br>
						
						On the other hand, you may enter a coin into the Coinsbie calculator and find that you could make 1,000x your investment. This is great, 
						but before you get too excited let’s do some more research on it.
						<br><br>
						
											
						<ul class="list-group">
							<li class="list-group-item active">When we see that a coin has a potentially large ROI, we look into many other factors. We think it is smart to research the following things:</li>
							<li class="list-group-item">The cryptocurrency team behind the coin. Do they have good experience?</li>
							<li class="list-group-item">The functional use of the cryptocurrency. How can this coin be used in the future? Will it make an impact in any particular industry?</li>
							<li class="list-group-item">How long has the coin been released and in use?</li>
							<li class="list-group-item">How many followers does this coin have on sites like Reddit, Twitter, Facebook, etc.? 
														If a coin looks promising, but has a low amount of followers and has been around for awhile, 
														then it may be a sign that it won’t gain the popularity necessary to succeed.</li>
						</ul>
						
						<br>
						
						There are many other factors you can look into as well.  Remember that you should not use the Coinsbie calculation in isolation. 
						Coinsbie is an excellent tool to help you begin your investment journey, but be a smart investor. You want to understand what you 
						are investing in and not throw your money at the first coin you see that may provide a 1000x return.
						<br><br>
						
						Good luck investing!
					</div>
			    </div>
		    </div>
	    </div>
    </section>

    
<br><br>
@include('partials.footer')
 