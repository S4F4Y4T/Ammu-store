

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Order</h2>
			    	<?php if(isset($order) && $count[0][0] != 0){ ?>
						<div class='table-responsive'>
						<table class="tblone">
    							<tr>
    								<th width="20%">Product Name</th>
    								<th width="10%">Image</th>
    								<th width="25%">Quantity</th>
    								<th width="20%">Email</th>
    								<th width="20%">Status</th>
    							</tr>
							<?php if(isset($order)){ foreach($order as $value){ ?>
							<tr>
								<td><?php echo $value['name']; ?></td>
								<td><img src="<?php echo BASE; ?>/img/<?php echo $value['image1']; ?>" alt=""/></td>
								<td>
								    <?php echo $value['quantity']; ?>
								</td>
								<td><?php echo $total = $value['email']; ?></td>
								<td><?php echo $total = $value['process']; ?></td>
							</tr>
							<?php
							 }} ?>
							</table>
						</div>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="<?php echo BASE; ?>"> <img src="<?php echo BASE; ?>/style/images/shop.png" alt="" /></a>
						</div>
					</div>
					<?php }else{ ?>
					    <h3>Your order Is Empty</h3>
					<?php } ?>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
  