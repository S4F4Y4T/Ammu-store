<div class="header_bottom_left">
    
    
    
			<div class="section group">
			    
			    <?php if(isset($topbrand)){foreach($topbrand as $value){ ?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="<?php echo BASE; ?>/Indexs/details/<?php echo base64_encode($value['id']); ?>">
					     <div class="list-box" style="background-image: url('<?php echo BASE; ?>/img/<?php echo $value['image1']; ?>'); background-position: center;background-repeat: no-repeat;background-size: cover;">
					        
					     </div> 
					   </a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?php $st = $value['name'];
            							$st = substr($st, 0, 20);
            							echo $st; ?></h2>
						<div class="button"><span><a href="<?php echo BASE; ?>/Indexs/details/<?php echo base64_encode($value['id']); ?>">Add to cart</a></span></div>
				   </div>
			   </div>			
				<?php }} ?>
			</div>
			
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider" style="height:250px;">
				  <div class="flexslider">
					<ul class="slides">
					    <?php if(isset($slide)){foreach($slide as $value){ ?>
						<li>
					     <div class="slide-box" style="background-image: url('<?php echo BASE; ?>/img/<?php echo $value['image']; ?>'); background-position: center;background-repeat: no-repeat;background-size: cover;">
					        
					     </div></li>
						<?php }} ?>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>