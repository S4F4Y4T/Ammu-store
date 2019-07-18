<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Insert Brand Name
      <small>Preview</small>
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
            <h3 class="box-title">Brand Name</h3>
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
         <?php if(isset($brand)){foreach($brand as $value){?>
          <!-- form start -->
          <form class="form-horizontal" action="<?php echo BASE; ?>/Brand/updatebrand/<?php echo base64_encode($value['brandid']) ?>" method="post">
            <div class="box-body">

              <div class="form-group">
                  <label style="font-size:16px;" class="col-sm-2 control-label">Brand Image</label>
                  <div class="col-sm-3">
                    <img height="200px" width="200px" src="<?php echo BASE; ?>/img/<?php echo $value['image'];?>" class="img-thumbnail" />
                    <a href="<?php echo BASE; ?>/Brand/brandimg/<?php echo base64_encode($value['brandid'])?>">Update Image</a>
                  </div>
              </div>

              <div class="form-group">
                <label for="inputEmail3" style="font-size:16px;" class="display-3 col-sm-2 control-label">Brand</label>
                <div class="col-sm-6">
                  <input type="text" name="brand" class="form-control input-lg" id="inputEmail3" value="<?php echo $value['brandname']; ?>">
                </div>
              </div>

		          <div class="form-group">
                <label style="font-size:16px;" class="col-sm-2 control-label">Brand Details</label>
                <div class="col-sm-8">
			                <textarea name="desc" class="tinymce"><?php echo $value['brandDesc']; ?></textarea>
                </div>
              </div>
            </div><!-- /.box-body -->
            <div class="ml-20 box-footer">

              <button type="submit" style="margin-right:20px;" class="btn-lg btn btn-info pull-right">Submit</button>
            </div><!-- /.box-footer -->
          </form>

        <?php }} ?>

        </div><!-- /.box -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
