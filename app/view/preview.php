

 <div class="main">
    <div class="content">
        
       
     
    	<div class="section group">
    	    <?php if(isset($details)){ $i = 0; foreach($details as $value){ $i++; ?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
					    <a href='<?php echo BASE; ?>/img/<?php echo $value['image1']; ?>'>
						    <img style='margin-bottom:5px;' src="<?php echo BASE; ?>/img/<?php echo $value['image1']; ?>" alt="<?php echo $value['name']; ?>" />
						</a>
							<div class="grid images_1_of_1">
					    <a href='<?php echo BASE; ?>/img/<?php echo $value['image2']; ?>'>
					        <img style="width:49%;height:auto" src="<?php echo BASE; ?>/img/<?php echo $value['image2']; ?>" alt="" />
					   </a>
						<a href='<?php echo BASE; ?>/img/<?php echo $value['image3']; ?>'>
						    <img style="width:49%;height:auto" src="<?php echo BASE; ?>/img/<?php echo $value['image3']; ?>" alt="<?php echo $value['name']; ?>" />
						</a>
					</div>
					</div>
				
				<div class="desc span_3_of_2">
					<h2><?php echo $value['name']; ?> </h2>
					<p><?php
							$st = $value['productDetails'];
							$st = substr($st, 0, 200);
							echo $st;
						  ?></p>					
					<div class="price">
						<p>Price: <span>$<?php echo $value['price']; ?></span></p>
						<p>Category: <span><?php echo $value['catname']; ?></span></p>
						<p>Subcategory:<span><?php echo $value['subcat']; ?></span></p>
						<p>Brand:<span><?php echo $value['brandname']; ?></span></p>
					</div>
				<div class="add-cart">
					<form action="<?php echo BASE; ?>/Cart/insertcart/<?php echo base64_encode($value['id']); ?>" method="post">
						<input type="number" class="buyfield" value='1' name="q"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>	
				</div>
				<div class='btn-feature' style="margin-top: 20px;">
				<a style="width: 55px;margin: 0 10px 0px 0px;" class="buysubmit" href="<?= BASE; ?>/Compare/addcompare/<?php echo base64_encode($value['id']); ?>">Compare </a>
				<a style='width:55px' class="buysubmit" href="<?= BASE; ?>/Wishlist/addwish/<?php echo base64_encode($value['id']); ?>">Wish list </a>
				</div>
			</div>
			
			<div class="product-desc">
			<h2> Product Details </h2>
			<p><?php echo $value['productDetails']; ?></p>
	    </div>
				
	</div>
	<?php }} ?>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
					    <?php if(isset($category)){ $i = 0; foreach($category as $value){ $i++; ?>
				      <li><a href="<?php echo BASE; ?>/Productsby/category/<?php echo base64_encode($value['catid']); ?>"><?php echo $value['catname']; ?></a></li>
				      <?php }} ?>
    				</ul>
    	
 				</div>
 				
 		</div>
 	</div>
	</div>
  
 

