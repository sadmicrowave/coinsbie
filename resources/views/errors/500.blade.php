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
				              <h1 class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s">500<h3 class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s">Whoops, looks like something went wrong.</h3></h1>
							  
							  <form action="/coin" method="POST">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<input type="text" id="main-search" name="search" class="wow fadeInDown form-control" data-wow-duration="1000ms" data-wow-delay="0.3s" placeholder="Search Coins" autofocus aria-label="Search Coins by Name or Symbol" aria-describedby="basic-addon2"/>
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
		    <div class="row justify-content-md-left">
			    <div class="col-md-12 wow ct-1-4" data-wow-delay="0.2s">
					<div class="wow fadeInDown text-center" data-wow-duration="1000ms" data-wow-delay="0.3s">
						<br><br>
						There seems to have been an issue with loading the requested page.  
						<br><br>
						This could have occurred for a couple of reasons.  Either, you intentionally navigated to a page that is not presently loaded on Coinsbie's site, or you searched for something that is not a coin name or symbol.  Either way, try navigating back to the <a href="/">Home page</a> and searching through the existing coins. 
						
						<br><br><br><br>
					</div>			
				</div>
		    </div>
	    </div>
    </section>

    

@include('partials.footer')
 