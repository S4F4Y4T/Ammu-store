

 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
						<table class="tblone" style="width: 50%;margin: 0 auto;border: 1px solid #ccc;color:#3F3F3F">
						    <?php if(isset($profile)){ $i = 0; $sub = 0; foreach($profile as $key => $value){ $i++; ?>
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
					
       <div class="clear"></div>
    </div>
 </div>
</div>
  