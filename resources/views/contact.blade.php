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
				              <h1 class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s">Contact Coinsbie<h3 class="wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s">We want to hear from you... about how much you like us.</h3></h1>
				            </div>
				          </li>
			          </ul>
		          	</div>	        
	          </div>
	        </div> 
	      </div> 
	      
	     
    </header>
    <!-- Header Section End --> 







<!-- Contact Section Start -->
    <section  class="section">
      <div class="container">
        <div class="row justify-content-md-center">          
          <div class="col-md-9 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="0.3s">            
            <div class="contact-block">

              <form id="contactForm" data-toggle="validator">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required data-error="Please enter your name">
                      <div class="help-block with-errors"></div>
                    </div>                                 
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input placeholder="Your Email" type="email" id="email" class="form-control" name="email" required data-error="Bruh, that email address is invalid">
                      <div class="help-block with-errors"></div>
                    </div> 
                  </div>
                  <div class="col-md-12">
                    <div class="form-group"> 
                      <textarea class="form-control" name="message" placeholder="Your Message" rows="11" data-error="Write a message" required></textarea>
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-md-12">
	                <div class="form-group">
				        <input type="text" name="recaptcha" required value="" id="recaptchaValidator" pattern="1" data-error="Sorry, no robots!" style="visibility: hidden">

			          	<div class="g-recaptcha" data-sitekey="6LfAV0oUAAAAAEhdbjUt4kY5F9nH7QAMM9KwlidU" data-callback="captcha_onclick"></div>
					  	<br>
			          	<div class="help-block with-errors text-left"></div>
	                </div>
                  </div>
                  <div class="col-md-12">
		          	<button class="btn btn-common" id="contact-submit" type="submit">Send Message</button>
		          	<div id="msgSubmit" class="h3 hidden"></div> 
					<div class="clearfix"></div> 
                  </div>
                </div>            
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Contact Section End -->
    
    

@include('partials.footer')
