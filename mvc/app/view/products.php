

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	          <?php if(isset($product)){ foreach($product as $value){ ?>
				<div class="grid_1_of_4 images_1_of_4">
					  <a href="<?php echo BASE; ?>/Indexs/details/<?php echo base64_encode($value['id']); ?>">
					     <div class="image-box" style="background-image: url('<?php echo BASE; ?>/img/<?php echo $value['image1']; ?>'); background-position: center;background-repeat: no-repeat;background-size: cover;">
					        
					     </div> 
					   </a>
					 <h2><?php echo $value['name']; ?> </h2>
					 <p><?php
							$st = $value['productDetails'];
							$st = substr($st, 0, 200);
							echo $st;
						  ?></p>
					 <p><span class="price">$<?php echo $value['price']; ?></span></p>
				     <div class="button"><span><a href="<?php echo BASE; ?>/Indexs/details/<?php echo base64_encode($value['id']); ?>" class="details">Details</a></span></div>
				</div>	
				<?php }} ?>	
			</div>
    </div>
 </div>
</div>
  