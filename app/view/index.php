	

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
				
				<?php if(isset($feature)){ $i = 0; foreach($feature as $value){ $i++; ?>
				
				<div class="grid_1_of_4 images_1_of_4">  
					 <a href="<?php echo BASE; ?>/Indexs/details/<?php echo base64_encode($value['id']); ?>">
					     <div class="image-box" style="background-image: url('<?php echo BASE; ?>/img/<?php echo $value['image1']; ?>'); background-position: center;background-repeat: no-repeat;background-size: cover;">
					        
					     </div> 
					   </a>
					 <h2><?php echo $value['name'];?> </h2>
					 <p><?php
							$st = $value['productDetails'];
							$st = substr($st, 0, 200);
							echo $st;
						  ?></p>
					 <p><span class="price">$<?php echo $value['price'];?></span></p>
				     <div class="button"><span><a href="<?php echo BASE; ?>/Indexs/details/<?php echo base64_encode($value['id']); ?>" class="details">Details</a></span></div>
				    
				</div>
				 <?php }} 
				 if($fcount[0][0] > 5){
				 ?>
				 
				 <span ><a style='float:right;color:#602D8D;padding:4px 8px;border:2px solid #ccc' href='<?= BASE; ?>/Productsby/feature'>see all</a></span>
				 <?php } ?>
			</div>
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			    <?php if(isset($newpro)){ $i = 0; foreach($newpro as $value){ $i++; ?>
				<div class="grid_1_of_4 images_1_of_4">  
					 <a href="<?php echo BASE; ?>/Indexs/details/<?php echo base64_encode($value['id']); ?>">
					     <div class="image-box" style="background-image: url('<?php echo BASE; ?>/img/<?php echo $value['image1']; ?>'); background-position: center;background-repeat: no-repeat;background-size: cover;">
					        
					     </div> 
					   </a>
					 <h2><?php echo $value['name'];?> </h2>
					 <p><?php
							$st = $value['productDetails'];
							$st = substr($st, 0, 200);
							echo $st;
						  ?></p>
					 <p><span class="price">$<?php echo $value['price'];?></span></p>
				     <div class="button"><span><a href="<?php echo BASE; ?>/Indexs/details/<?php echo base64_encode($value['id']); ?>" class="details">Details</a></span></div>
				    
				</div>
			 <?php }} 
			 if($pcount[0][0] > 5){
				 ?>
			 <span ><a style='float:right;color:#602D8D;padding:4px 8px;border:2px solid #ccc' href='<?= BASE; ?>/Productsby/products/1'>see all</a></span>
			 <?php } ?>
			</div>
    </div>
 </div>
</div>
   