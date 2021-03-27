

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Compare List</h2>
			    	<div class='table-responsive'>
						<table class="tblone">
    							<tr>
    								<th width="20%">Product Name</th>
    								<th width="10%">Image</th>
    								<th width="15%">Brand</th>
    								<th width="25%">Price</th>
    								<th width="20%">Details</th>
    								<th width="10%">Action</th>
    							</tr>
							<?php if(isset($compare)){ $i = 0; $sub = 0; foreach($compare as $value){ $i++; ?>
    							<tr>
    								<td><a href="<?php echo BASE; ?>/Indexs/details/<?php echo base64_encode($value['productid']); ?>"><?php echo $value['name']; ?></a></td>
    								<td><img src="<?php echo BASE; ?>/img/<?php echo $value['image']; ?>" alt=""/></td>
    								<td><?php echo $value['brand']; ?></td>
    								<td>Tk. <?php echo $value['price']; ?></td>
    								<td><?php
							$st = $value['description'];
							$st = substr($st, 0, 200);
							echo $st;
						  ?></td>
    								
    								<td><a href="<?php echo BASE; ?>/Compare/delcomp/<?php echo base64_encode($value['compareid']); ?>">X</a></td>
    							</tr>
							<?php
							 }} ?>
							</table>
						</div>
					</div>
					
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
  