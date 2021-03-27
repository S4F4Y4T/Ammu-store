
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Insert Product
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">

            <!-- right column -->
            <div class="col-md-12">
              <!-- Horizontal Form -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Product Details</h3>
                </div><!-- /.box-header -->
				<?php
						if(!empty($_GET['msg'])){
							$msg = $_GET['msg'];
							$msg = unserialize(urldecode($msg));
							foreach($msg as $key => $value){
								echo $value;
							}
						}
					?>
          <?php if(isset($cpass)) foreach($cpass as $value){ ?>

                  <!-- form start -->
                  <form class="form-horizontal" action="<?php echo BASE; ?>/Admin/updatepass/<?php echo base64_encode($value['image']);?>" method="post" enctype="multipart/form-data">


                  <div class="box-body">
                    <div class="form-group">
                      <label style="font-size:16px;" class="col-sm-2 control-label">Admin Photo</label>
                      <div class="col-sm-3">
                        <input type="file" name="img" style="margin-top:8px" id="exampleInputFile">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" style="font-size:16px;" class="col-sm-2 control-label">Username</label>
                      <div class="col-sm-6">
                        <input type="text" name="user" class="form-control input-lg" id="inputEmail3" placeholder="Username">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" style="font-size:16px;" class="col-sm-2 control-label">Old Password</label>
                      <div class="col-sm-6">
                        <input type="password" name="oldpass" class="form-control input-lg" id="inputEmail3" placeholder="Old password">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" style="font-size:16px;" class="col-sm-2 control-label">New Password</label>
                      <div class="col-sm-6">
                        <input type="password" name="newpass" class="form-control input-lg" id="inputEmail3" placeholder="New Password">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" style="font-size:16px;" class="col-sm-2 control-label">Retype New Password</label>
                      <div class="col-sm-6">
                        <input type="password" name="confirmpass" class="form-control input-lg" id="inputEmail3" placeholder="Re-type New Password">
                      </div>
                    </div>

              </div>
        </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn-lg btn btn-primary pull-right">Submit</button>
                  </div><!-- /.box-footer -->
                </form>
          <?php } ?>

              </div><!-- /.box -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      </aside>
