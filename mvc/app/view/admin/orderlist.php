
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Product List
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Product Data</h3>
                </div><!-- /.box-header -->

                <div style="overflow-x:auto;" class="box-body">
                  <table class="display table table-bordered table-hover" id="data">
					<thead>
						<tr>
							<th>Serial</th>
							<th>User Details</th>
                            <th>Product Details</th>
                            <th>Transiction ID</th>
                            <th>Quantity</th>
                            <th>Order Date</th>
							<th style="width:25%">process</th>
						</tr>
					</thead>
					<tbody>
					<?php if(isset($order)){ $i = 0; foreach($order as $value){ $i++; ?>

						<tr class="odd gradeX">
							<td ><?php echo $i; ?></td>
							<td><a href="<?= BASE; ?>/Admin/viewuser/<?= base64_encode($value['userid']); ?>"><?php echo $value['username']; ?></a></td>
							<td><a href="<?= BASE; ?>/Product/editproduct/<?= base64_encode($value['id']); ?>"><?php echo $value['name']; ?></a></td>
							<td><?php echo $value['trans_id']; ?></td>
                            <td><?php echo $value['quantity']; ?></td>
                            <td><?php echo $value['date']; ?></td>
							
    				          <td>
    				              <form action="<?php BASE; ?>/Admin/process/<?php echo base64_encode($value['orderid']); ?>" method="post">
    				              <select class="form-control select2" name="process" style="display:inline-block;width: 50%;">
    				                  <option value="<?= $value['process']; ?>"><?= $value['process']; ?></option>
    				                  <?php if($value['process'] == 'Deliverd'){ ?>
                                      <?php }else if($value['process'] == 'Shipped'){ ?>
                                      <option value="Deliverd">Deliverd</option>
                                      <?php }else{ ?>
                                      <option value="Shipped">Shipped</option>
                                      <option value="Deliverd">Deliverd</option>
                                      <?php } ?>
    				                </select>
    				                <input type="hidden" name='transid' value='<?php echo $value['trans_id']; ?>'>
							    <input class="btn btn-primary btn-sm" style="padding:7px" type="submit" value="update">
							    
							    <?php if($value['process'] == 'Deliverd'){ ?>
							    <a style="padding:7px" class="btn btn-danger btn-sm" onClick="return confirm('Are You Sure To Delete');" href="<?= BASE; ?>/Admin/deliverd/<?php echo base64_encode($value['orderid']); ?>">Delete</a>
							    <?php }?>
							    
							    </form>
							</td>
						</tr>
					<?php } } ?>
					</tbody>
				</table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->


            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
