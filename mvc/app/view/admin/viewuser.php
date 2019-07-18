
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            User Data
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
                  <h3 class="box-title">User Details</h3>
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
          <?php if(isset($user)){ foreach($user as $value){ ?>
                <!-- form start -->
                <form class="form-horizontal" action="<?= BASE; ?>/Admin/users">

                  <div class="box-body" style="font-size: 26px;">
                    <div class="form-group">
                      <label for="inputEmail3" style="font-size:16px;" class="col-sm-2 control-label">User Name</label>
                      <div class="col-sm-6">
                            <?php echo $value['username']; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" style="font-size:16px;" class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-6">
                            <?php echo $value['email']; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" style="font-size:16px;" class="col-sm-2 control-label">Phone</label>
                      <div class="col-sm-6">
                            <?php echo $value['phone']; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" style="font-size:16px;" class="col-sm-2 control-label">Country</label>
                      <div class="col-sm-6">
                            <?php echo $value['country']; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" style="font-size:16px;" class="col-sm-2 control-label">City</label>
                      <div class="col-sm-6">
                            <?php echo $value['city']; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" style="font-size:16px;" class="col-sm-2 control-label">Address</label>
                      <div class="col-sm-6">
                            <?php echo $value['address']; ?>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputEmail3" style="font-size:16px;" class="col-sm-2 control-label">zip</label>
                      <div class="col-sm-6">
                            <?php echo $value['zip']; ?>
                      </div>
                    </div>


					

              </div>
        </div><!-- /.box-body -->
        <div class="box-footer">
                    <button type="submit" class="btn-lg btn btn-primary pull-right">ok</button>
                  </div><!-- /.box-footer -->
                </form>

<?php }} ?>
              </div><!-- /.box -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      </aside>
