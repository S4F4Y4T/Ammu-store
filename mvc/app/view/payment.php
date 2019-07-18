<div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
		    	<h2>Your Payment</h2>
		    	
		    	<div class='pay-left'>
			    <div style='overflow-x:hidden'>
			    	<table class="tblone tbl-pay">
			    	    
						    <?php if(isset($profile)){ $i = 0; $sub = 0; foreach($profile as $key => $value){ $i++; ?>
						    <tr>
						        <td colspan='3' style="background:  #f1948a;color:#fff">Delivery Address</td>
						    </tr>
							<tr>
								<td>Name</td>
								<td>:</td>
								<td><?php echo $value['username']; ?></td>
							</tr>
							<tr>
							    <td>Phone</td>
							    <td>:</td>
							    <td><?php echo $value['phone']; ?></td>
							</tr>
							<tr>
							    <td>Country</td>
							    <td>:</td>
							    <td><?php echo $value['country']; ?></td>
							</tr>
							<tr>
							    <td>City</td>
							    <td>:</td>
							    <td><?php echo $value['city']; ?></td>
							</tr>
							<tr>
							    <td>Address</td>
							    <td>:</td>
							    <td><?php echo $value['address']; ?></td>
							</tr>
							<tr>
							    <td>Zip</td>
							    <td>:</td>
							    <td><?php echo $value['zip']; ?></td>
							</tr>
							<tr>
							    <td>Email</td>
							    <td>:</td>
							    <td><?php echo $value['email']; ?></td>
							</tr>
						<?php
							 }} ?>
							 <tr>
							     <td></td>
							     <td><div class="up-btn"><a href="<?= BASE; ?>/User/edit">update</a></div> </td>
							    <td></td>
							 </tr>
							
						</table>
					</div>		
					   
	<div class="panel">
    
    <div class="panel-body">
        <!-- Display errors returned by createToken -->
        <div class="payment-status">Payment</div>
		
        <!-- Payment form -->
        <form action="<?= BASE; ?>/Order/stripe" method="POST" id="paymentFrm">
             <div style='overflow-x:hidden'>
            <table class="tblone tbl-pay">
                <tr>
                    <td width='20%'>NAME</td>
                    <td><input type="text" name="name" id="name" placeholder="Enter name" required="" autofocus=""></td>
                </tr>
                <tr>
                    <td>EMAIL</td>
                    <td><input type="email" name="email" id="email" placeholder="Enter email" required=""></td>
                </tr>
                <tr>
                    <td>CARD NUMBER</td>
                    <td><input type="text" name="card_number" id="card_number" placeholder="1234 1234 1234 1234" autocomplete="off" required=""></td>
                </tr>
                <tr>
                    <td>EXPIRY DATE</td>
                    <td><input type="text" name="card_exp_month" id="card_exp_month" placeholder="MM" required=""></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="text" name="card_exp_year" id="card_exp_year" placeholder="YYYY" required=""></td>
                </tr>
                <tr>
                    <td>CVC CODE</td>
                    <td><input type="text" name="card_cvc" id="card_cvc" placeholder="CVC" autocomplete="off" required=""></td>
                </tr>
                <input type="hidden" name="price_total" value='<?= Session::get('total'); ?>'>
            </table>
             </div>
            <button type='submit' class="login order-btn" >order</button>
        </form>
    </div>
</div>
		    	    
		    	    
		    	</div>	
		        <div class='pay-right'>
		            <?php if(isset($cart) && $count[0][0] != 0){ ?>
		            <div style='overflow-x:hidden'>
						<table class="tblone pay-table tbl-pay" >
							<tr>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="15%">Price</th>
								<th width="25%">Quantity</th>
								<th width="20%">Total Price</th>
							</tr>
							<?php if(isset($cart)){ $i = 0; $sub = 0; foreach($cart as $value){ $i++; ?>
							<tr>
								<td><?php echo $value['productname']; ?></td>
								<td><img src="<?php echo BASE; ?>/img/<?php echo $value['image']; ?>" alt=""/></td>
								<td>Tk. <?php echo $value['price']; ?></td>
								<td>
									<?php echo $value['quantity']; ?>
								</td>
								<td>Tk. <?php echo $total = $value['price']*$value['quantity']; ?></td>
							</tr>
							<?php
							    $sub   = $sub+$total;
							    $vat   = (vat / 100)*$sub;
							    $grand = $sub+$vat;
							    Session::set("total", $grand);
							 }} ?>
							<tr style='border-top:3px solid #ccc'>
								<th colspan='2'>Sub Total : </th>
								<td colspan='3'>TK. <?php echo $sub; ?></td>
							</tr>
							<tr>
								<th colspan='2'>VAT(10%) : </th>
								<td colspan='3'>TK. <?php echo $vat; ?></td>
							</tr>
							<tr>
								<th colspan='2'>Grand Total :</th>
								<td colspan='3'>TK. <?= $grand; ?> </td>
							</tr>
							</table>
						</div>
							<?php }else{ ?>
							<h1>Your Cart Is Empty</h1>
							<?php } ?>
		        </div>
					   
			</div>
					
					
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
</div>
  