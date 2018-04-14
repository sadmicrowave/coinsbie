   <!-- Footer Section Start -->
    <footer>          
      <div class="container">
	    <div class="row">
		    <div class="col-md-6">
			    <div class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="0.3s">
				    <ul id="social">
					    <li class="social">
						    <a href="https://m.facebook.com/Coinsbie-212587355988266/" title="Facebook"><i class="fab fa-facebook"></i></a>
					    </li>
						<li class="social">
							<a href="https://www.instagram.com/coinsbie/" title="Instagram"><i class="fab fa-instagram"></i></a>
						</li>
						<li class="social">
							<a href="https://twitter.com/CoinsbieCalc" title="Twitter"><i class="fab fa-twitter"></i></a>
						</li>
						<li class="social">
							<a href="#" title="Reddit"><i class="fab fa-reddit-alien"></i></a>
						</li>
				    </ul>
			    </div>
			    
		    </div>
		    <div id="donate" class="col-md-6">
			    <div class="site-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="0.3s">
				    <ul class="donate">
						<li>Donate BTC: <a class="donate" href="#BTCDonate" ref="BTCDonate">3NvmSwsF19NKmTNi2txG8ndvUWXVeRDhnH</a></li>
					    <li>Donate LTC: <a class="donate" href="#LTCDonate" ref="LTCDonate">MWf8evizV8RmwwPeeFnEPTj7Nhu7LhugMC</a></li>
					    <li>Donate ETH: <a class="donate" href="#ETHDonate" ref="ETHDonate">0x5bF0E0882A9eB5dCc5FF28E9aF8d38c715B24538</a></li>
					    <li>Donate BCH: <a class="donate" href="#BCHDonate" ref="BCHDonate">qzv84wfmp63m6rpf60w3lrzyr9fry803g5yjnzhszx</a></li>
				    </ul>
			    </div>
		    </div>
	    </div>
	    <br><br>
        <div class="row">
          <div class="col-md-12">
            <div class="site-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="0.3s">
              <p>All copyrights reserved &copy; <?php echo date("Y"); ?> - Coinsbie</p>
            </div>  
          </div>
        </div>
        
        <nav class="footer">
	        <div class="row">
	          <div class="col-md-12">
	            <div class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="0.3s">
	              <ul>
		              <li><a href="/disclaimer">Disclaimer</a></li>
	              </ul>
	            </div>  
	          </div>
	        </div>
        </nav>
      </div>
    </footer>
    <!-- Footer Section End --> 

    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
      <i class="lnr lnr-arrow-up"></i>
    </a>

    <div id="loader">
      <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
      </div>
    </div>    


	<!-- Modal -->
	<div class="modal fade" id="BTCDonate" tabindex="-1" role="dialog" aria-labelledby="DonateBitcoin" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="DonateBitcoin">Donate Bitcoin</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="contents text-center">
		        <p>3NvmSwsF19NKmTNi2txG8ndvUWXVeRDhnH</p>
		        <img src="{{ URL::to('/') }}/img/QR_BTC_Address.jpg"/>
		        
	        </div>
	      </div>
	    </div>
	  </div>
	</div>


	<div class="modal fade" id="LTCDonate" tabindex="-1" role="dialog" aria-labelledby="DonateLitecoin" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="DonateLitecoin">Donate Litecoin</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="contents text-center">
		        <p>MWf8evizV8RmwwPeeFnEPTj7Nhu7LhugMC</p>
		        <img src="{{ URL::to('/') }}/img/QR_LTC_Address.jpg"/>
		        
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
	
	
	<div class="modal fade" id="ETHDonate" tabindex="-1" role="dialog" aria-labelledby="DonateEthereum" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="DonateEthereum">Donate Ethereum</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="contents text-center">
		        <p>0x5bF0E0882A9eB5dCc5FF28E9aF8d38c715B24538</p>
		        <img src="{{ URL::to('/') }}/img/QR_ETH_Address.jpg"/>
		        
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
	
	
	<div class="modal fade" id="BCHDonate" tabindex="-1" role="dialog" aria-labelledby="DonateBitcoinCash" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="DonateBitcoinCash">Donate Bitcoin Cash</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        <div class="contents text-center">
		        <p>qzv84wfmp63m6rpf60w3lrzyr9fry803g5yjnzhszx</p>
		        <img src="{{ URL::to('/') }}/img/QR_BCH_Address.jpg"/>
		        
	        </div>
	      </div>
	    </div>
	  </div>
	</div>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="{{ asset('/js/jquery-min.js') }}"></script>
    <script src="{{ asset('/js/tether.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/js/classie.js') }}"></script>
    <script src="{{ asset('/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('/js/nivo-lightbox.js') }}"></script>
    <script src="{{ asset('/js/owl.carousel.min.js') }}"></script>   
    <script src="{{ asset('/js/jquery.stellar.min.js') }}"></script>    
    <script src="{{ asset('/js/jquery.nav.js') }}"></script>
    <script src="{{ asset('/js/smooth-scroll.js') }}"></script>  
    <script src="{{ asset('/js/smooth-on-scroll.js') }}"></script>
    <script src="{{ asset('/js/wow.js') }}"></script>    
    <!--<script src="{{ asset('/js/menu.js') }}"></script>-->
    <!--<script src="{{ asset('/js/jquery.vide.js') }}"></script>
    <script src="{{ asset('/js/jquery.counterup.min.js') }}"></script> -->
    <script src="{{ asset('/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('/js/waypoints.min.js') }}"></script>    
    <script src="{{ asset('/js/form-validator.min.js') }}"></script>
    <script src="{{ asset('/js/form-script.js') }}"></script>     
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="{{ asset('/js/main.js') }}"></script>
   <!-- <script src="{{ asset('/js/hero-slider.js') }}"></script>-->
   
   <script src="https://www.google.com/recaptcha/api.js" async defer></script>
   <script defer src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
   
    
  </body>
</html>