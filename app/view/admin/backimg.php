<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update Image
      </h1>
    </section>


<!-- Main content -->
<section class="content">
<div class="row">
  <div class="col-md-12">
<!-- Horizontal Form -->
  <div style='height:500px' class="box box-info">
    <div>
    <?php
        if(!empty($_GET['msg'])){
          $msg = $_GET['msg'];
          $msg = unserialize(urldecode($msg));
          foreach($msg as $key => $value){
            echo $value;
          }
        }
      ?>
    </div>
    <div class="col-sm-4">
    </div>
<?php if(isset($images)){foreach($images as $value){ ?>
    <img style="margin-top:5%" height="200px" width="200px" class="img-thumbnail" src="<?php echo BASE; ?>/img/<?php echo $value['image3'] ?>">

<form action="<?php echo BASE; ?>/Product/updateback/<?php echo base64_encode($value['image3']); ?>/<?php echo base64_encode($value['id']); ?>" method="post" enctype="multipart/form-data">
<div class="col-sm-4">
</div>
      <label for="test" style="cursor:pointer;height:100px;width:130px;background:#ccc;position:absolute;z-index:1000">
        <i style="font-size:40px;margin:23% 35%" class="fa fa-image"></i>
      </label>
        <div class="form-group">
            <div style="position:relative;left:0;height:0;z-index:100" class="col-sm-3">
              <input   type="file" name="img" style="margin-top:8px" id="test">
            </div>
        </div>
  </div>
    <button type="submit" class="btn-lg btn btn-primary pull-right">Submit</button>
</form>
<?php }} ?>
  </div>
</div>
</div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
