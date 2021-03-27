

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
			    	<?php if(isset($cart) && $count[0][0] != 0){ ?>
						<div style="overflow-x:auto;">
						<table class="tblone">
    							<tr>
    								<th width="20%">Product Name</th>
    								<th width="10%">Image</th>
    								<th width="15%">Price</th>
    								<th width="25%">Quantity</th>
    								<th width="20%">Total Price</th>
    								<th width="10%">Action</th>
    							</tr>
    							<?php if(isset($cart)){ $i = 0; $sub = 0; foreach($cart as $value){ $i++; ?>
    							<tr>
    								<td><?php echo $value['productname']; ?></td>
    								<td><img src="<?php echo BASE; ?>/img/<?php echo $value['image']; ?>" alt=""/></td>
    								<td>Tk. <?php echo $value['price']; ?></td>
    								<td>
    									<form action="<?php echo BASE; ?>/Cart/upcart/<?php echo base64_encode($value['cartid']); ?>" method="post">
    										<input type="number" name="quantity" value="<?php echo $value['quantity']; ?>"/>
    										<input type="submit" name="submit" value="Update"/>
    									</form>
    								</td>
    								<td>Tk. <?php echo $total = $value['price']*$value['quantity']; ?></td>
    								<td><a href="<?php echo BASE; ?>/Cart/delcart/<?php echo base64_encode($value['cartid']); ?>">X</a></td>
    							</tr>
    							<?php
							    $sub   = $sub+$total;
							    $vat   = (vat / 100)*$sub;
							    $grand = $sub+$vat;
							    Session::set("total", $sub);
							 }} ?>
							</table>
						</div>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td>TK. <?php echo $sub; ?></td>
							</tr>
							<tr>
								<th>VAT(10%) : </th>
								<td>TK. <?php echo $vat; ?></td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td>TK. <?= $grand; ?> </td>
							</tr>
					   </table>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="<?= BASE; ?>"> <img src="<?php echo BASE; ?>/style/images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="<?= BASE; ?>/Order/payment"> <img src="<?= BASE; ?>/style/images/check.png" alt="" /></a>
						</div>
					</div>
					<?php }else{ ?>
					    <h1>Your Cart Is Empty</h1>
					<?php } ?>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
  