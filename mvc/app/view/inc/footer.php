<div class="footer">
   	  <div class="wrapper">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Information</h4>
						<ul>
						<li><a href="<?php echo BASE; ?>/Indexs/about">About Us</a></li>
						<li><a href="<?php echo BASE; ?>/Indexs/about">Customer Service</a></li>
						<li><a href="<?php echo BASE; ?>/Indexs/contact"><span>Contact Us</span></a></li>
						</ul>
					</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Why buy from us</h4>
						<ul>
						<li><a href="<?php echo BASE; ?>/Indexs/about">About Us</a></li>
						<li><a href="<?php echo BASE; ?>/Indexs/about">Customer Service</a></li>
						<li><a href="<?php echo BASE; ?>/Indexs/about">Privacy Policy</a></li>
						<li><a href="<?php echo BASE; ?>/Indexs/contact"><span>Site Map</span></a></li>
						<li><a href="#search_box"><span>Search Terms</span></a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>My account</h4>
						<ul>
							<li><a href="<?php echo BASE; ?>/User/user">Sign In</a></li>
							<li><a href="<?php echo BASE; ?>/Cart/cart">View Cart</a></li>
							<li><a href="<?php echo BASE; ?>/Wishlist/list">My Wishlist</a></li>
							<li><a href="<?php echo BASE; ?>/Compare/list">My Comparelist</a></li>
							<li><a href="<?php echo BASE; ?>/Order">Track My Order</a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Contact</h4>
						<ul>
							<li><span>safayatmahmud.99@gmail.com</span></li>
						</ul>
						<div class="social-icons">
							<h4>Follow Us</h4>
					   		  <ul>
							      <a href="http://facebook.com/S4F4Y4T" target="_blank"><li class="facebook">  </li></a>
							      <li class="twitter"><a href="#" target="_blank"> </a></li>
							      <li class="googleplus"><a href="#" target="_blank"> </a></li>
							      <li class="contact"><a href="#" target="_blank"> </a></li>
							      <div class="clear"></div>
						     </ul>
   	 					</div>
				</div>
			</div>
			<div class="copy_right">
				<p>S4F4Y4T-SELF DEVELOPER &amp; All rights Reseverd </p>
		   </div>
     </div>
    </div>
     
    <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5d13342b53d10a56bd7be769/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
    <link href="<?php echo BASE; ?>/style/css/flexslider.css" rel='stylesheet' type='text/css' />
	  <script defer src="<?php echo BASE; ?>/style/js/jquery.flexslider.js"></script>
	  <script type="text/javascript">
		$(function(){
		  SyntaxHighlighter.all();
		});
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	  </script>
	  <!-- Stripe JavaScript library -->
<script src="https://js.stripe.com/v2/"></script>

<!-- jQuery is used only for this example; it isn't required to use Stripe -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<script>
// Set your publishable key
Stripe.setPublishableKey('<?php echo STRIPE_PUBLISHABLE_KEY; ?>');

// Callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        // Enable the submit button
        $('#payBtn').removeAttr("disabled");
        // Display the errors on the form
        $(".payment-status").html('<p>'+response.error.message+'</p>');
    } else {
        var form$ = $("#paymentFrm");
        // Get token id
        var token = response.id;
        // Insert the token into the form
        form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
        // Submit form to the server
        form$.get(0).submit();
    }
}

$(document).ready(function() {
    // On form submit
    $("#paymentFrm").submit(function() {
        // Disable the submit button to prevent repeated clicks
        $('#payBtn').attr("disabled", "disabled");
		
        // Create single-use token to charge the user
        Stripe.createToken({
            number: $('#card_number').val(),
            exp_month: $('#card_exp_month').val(),
            exp_year: $('#card_exp_year').val(),
            cvc: $('#card_cvc').val()
        }, stripeResponseHandler);
		
        // Submit from callback
        return false;
    });
});
</script>
 <!-- DataTables -->
    <script src="http://safayat.a2hosted.com/style/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="http://safayat.a2hosted.com/style/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
      $(function () {
        $("#data").DataTable();
        
      });
    </script>
</body>
</html>
