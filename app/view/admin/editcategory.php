
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Update Category
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
                  <h3 class="box-title">Update Categories Name</h3>
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
                <!-- form start -->

				<?php if(isset($category)) {foreach($category as $value){ ?>

                <form class="form-horizontal" action="<?php echo BASE; ?>/Category/updatecat/<?php echo base64_encode($value['catid']); ?>" method="post">
                  <div class="box-body">


                    <div class="form-group">
                        <label style="font-size:16px;" class="col-sm-2 control-label">Category Image</label>
                        <div class="col-sm-3">
                          <img height="200px" width="200px" src="<?php echo BASE; ?>/img/<?php echo $value['image'];?>" class="img-thumbnail" />
                          <a href="<?php echo BASE; ?>/Category/catimg/<?php echo base64_encode($value['catid'])?>">Update Image</a>
                        </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail3" style="font-size:16px;" class="display-3 col-sm-2 control-label">Category</label>
                      <div class="col-sm-6">
                        <input type="text" name="category" value="<?php echo $value['catname']; ?>"class="form-control input-lg" id="inputEmail3">
                      </div>
                    </div>

					          <div class="form-group">
                      <label style="font-size:16px;" class="col-sm-2 control-label">Category Details</label>
                      <div class="col-sm-8">
						             <textarea name="desc" class="tinymce"><?php echo $value['catDescription']; ?></textarea>
                      </div>
                    </div>
                  </div><!-- /.box-body -->
                  <div class="ml-20 box-footer">

                    <button type="submit" style="margin-right:20px;" class="btn-lg btn btn-info pull-right">Submit</button>
                  </div><!-- /.box-footer -->
                </form>

				<?php } } ?>

              </div><!-- /.box -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
