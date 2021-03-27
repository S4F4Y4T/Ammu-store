
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

					<?php
						if(!empty($_GET['msg'])){
							$msg = $_GET['msg'];
							$msg = unserialize(urldecode($msg));
							foreach($msg as $key => $val){
								echo $val;
							}
						}
					?>
                <div style="overflow-x:auto;" class="box-body">
                  <table class="display table table-bordered table-hover" id="data">
					<thead>
						<tr>
						  <th>Serial</th>
						  <th>Name</th>
                          <th>Image</th>
                          <th>Sub Category</th>
                          <th>price</th>
                          <th>Availability</th>
						  <th>Description</th>
						  <th style="width:20%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php if(isset($product)){ $i = 0; foreach($product as $value){ $i++; ?>

						<tr class="odd gradeX">
							<td ><?php echo $i; ?></td>
							<td><?php echo $value['name']; ?></td><td><img class="img-thumbnail" height="50px" width="50px" src="<?php echo BASE.'/img/'.$value['image1']; ?>" /></td>
                            <td><?php echo $value['subcat']; ?></td>
                            <td><?php echo $value['price']; ?></td>
							<td><?php echo $value['availability']; ?></td>
							<td><?php
							$st = $value['productDetails'];
							$st = substr($st, 0, 200);
							echo $st;
						  ?></td>

							<td ><a href="<?= BASE; ?>/Product/editproduct/<?php echo base64_encode($value['id']); ?>" class="btn btn-primary btn-sm">Edit</a>
							<a class="btn btn-danger btn-sm" onClick="return confirm('Are You Sure To Delete');" href="deleteproduct/<?php echo base64_encode($value['id']); ?>">Delete</a></td>
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
