

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Wishlist</h2>
			    	<?php if(isset($wish) && $count[0][0] != 0){ ?>
						<div class='table-responsive'>
						<table class="tblone" id="data">
    							<tr>
    								<th width="20%">Product Name</th>
    								<th width="10%">Image</th>
    								<th width="15%">Brand</th>
    								<th width="25%">Price</th>
    								<th width="20%">Details</th>
    								<th width="10%">Action</th>
    							</tr>
    						</thead>
							<?php if(isset($wish)){ $i = 0; $sub = 0; foreach($wish as $value){ $i++; ?>
    							<tr>
    								<td><a href="<?php echo BASE; ?>/Indexs/details/<?php echo base64_encode($value['productid']); ?>"><?php echo $value['name']; ?></td>
    								<td><img src="<?php echo BASE; ?>/img/<?php echo $value['image']; ?>" alt=""/></td>
    								<td><?php echo $value['brandname']; ?></td>
    								<td>Tk. <?php echo $value['price']; ?></td>
    								<td><?php
							$st = $value['description'];
							$st = substr($st, 0, 200);
							echo $st;
						  ?></td>
    								
    								<td><a href="<?php echo BASE; ?>/Wishlist/delwish/<?php echo base64_encode($value['wishid']); ?>">X</a></td>
    							</tr>
							<?php
							 }} ?>
							</table>
						</div>
					</div>
					<?php }else{ ?>
					    <h1>Your Wishlist Is Empty</h1>
					<?php } ?>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
  