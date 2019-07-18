<?php
    //set headers to NOT cache a page
    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1.
    header("Pragma: no-cache"); // HTTP 1.0.
    header("Expires: 0"); // Proxies.
    // Date in the past
    //or, if you DO want a file to cache, use:
    //header("Cache-Control: max-age=2592000"); 
    //30days (60sec * 60min * 24hours * 30days)
      
    session_cache_limiter("must-revalidate");
      
    Session::init(); 
?>
    
<!DOCTYPE HTML>
<head>
<title>Store Website</title>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name=”description” content="This is a ARM dealing site made out of fun by a self developer name safayat mahmud its not violence any of law">
<link rel=”canonical” href=”<?= BASE; ?>” />
<meta property="og:url"                content="<?= BASE; ?>" />
<meta property="og:type"               content="ecommerce" />
<meta property="og:title"              content="Store Website" />
<meta property="og:description"        content="This is a ARM dealing site made out of fun by a self developer name safayat mahmud its not violence any of law" />

<meta property=”og:site_name” content=”SITE NAME” />
<link href="<?php echo BASE; ?>/style/css/style.css?v=7.5" rel="stylesheet" type="text/css" media="all"/>
<link href="<?php echo BASE; ?>/style/css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<link rel = "icon" type = "image/png" href = "<?php echo BASE; ?>/style/images/logo.png">
<script src="<?php echo BASE; ?>/style/js/jquerymain.js"></script>
<script src="<?php echo BASE; ?>/style/js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo BASE; ?>/style/js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="<?php echo BASE; ?>/style/js/nav.js"></script>
<script type="text/javascript" src="<?php echo BASE; ?>/style/js/move-top.js"></script>
<script type="text/javascript" src="<?php echo BASE; ?>/style/js/easing.js"></script> 
<script type="text/javascript" src="<?php echo BASE; ?>/style/js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>

<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
<!-- Data Table -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
	<!-- Data Table -->
	<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="<?php echo BASE; ?>"><img src="<?php echo BASE; ?>/style/images/logo.png" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box" id='search_box'>
				    <form action="<?php echo BASE; ?>/Indexs/search" method="post">
				    	<input type="text" name='search' value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search for Products';}">
				    	<input type="submit" value="SEARCH">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="<?php echo BASE; ?>/cart" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">Cart</span>
								<span class="no_product"><?php echo $cart; ?></span>
							</a>
						</div>
			      </div>
			     <?php if(Session::get("userlogin") != true){ ?> 
		   <div class="login"><a href="<?= BASE; ?>/User/user">Sign In</a></div>
		        <?php }else{ ?>
		        <div class="login"><a href="<?= BASE; ?>/User/logout">Signout</a></div>
		        <?php } ?>
		   
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="<?= BASE; ?>">Home</a></li>
	  <li><a href="<?= BASE; ?>/Productsby/brand">Top Brands</a></li>
	  
	  <?php if(Session::get("userlogin") == true){ ?> 
		   <li><a href="<?= BASE; ?>/User/profile">Profile</a></li>
		   <li><a href="<?= BASE; ?>/Order/list">Order</a></li>
		   <li><a href="<?= BASE; ?>/Compare/list">Compare</a></li>
		   <li><a href="<?= BASE; ?>/Wishlist/list">Wishlist</a></li>
		        <?php } ?>
	  <li><a href="<?= BASE; ?>/Cart/cart">Cart</a></li>
	  
	  <?php if(Session::get("userlogin") == true){ ?> 
	  <li><a href="<?= BASE; ?>/User/contact">Contact</a> </li>
	  <?php } ?>
	  
	  <div class="clear"></div>
	</ul>
</div>
	<div class="header_bottom">
		