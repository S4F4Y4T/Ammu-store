<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Mailbox
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Mailbox</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-3">
        <a href="<?php echo BASE; ?>/Mail/fetch" class="btn btn-primary btn-block margin-bottom">Back to Inbox</a>
        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Folders</h3>
            <div class="box-tools">
              <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
              <li><a href="<?php echo BASE; ?>/Mail/fetch"><i class="fa fa-inbox"></i> Inbox <span class="label label-primary pull-right"></span></a></li>
              <li class="active"><a href="<?php echo BASE; ?>/Mail/compose"><i class="fa fa-envelope-o"></i> Compose</a></li>
            </ul>
          </div><!-- /.box-body -->
        </div><!-- /. box -->
      </div><!-- /.col -->
      <div class="col-md-9">
        <?php
            if(!empty($_GET['msg'])){
              $msg = $_GET['msg'];
              $msg = unserialize(urldecode($msg));
              foreach($msg as $key => $value){
                echo $value;
              }
            }
          ?>
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Compose New Message</h3>
          </div><!-- /.box-header -->

          <form action="<?php echo BASE ?>/Mail/mailauth" method="post" enctype="multipart/form-data">
          <div class="box-body">
            <div class="form-group">

              <input type="email" required class="form-control" name="from" value='<?= mail; ?>' readonly>

            </div>
            <div class="form-group">

              <input class="form-control" type="email" required name="to" placeholder="TO:" <?php if(isset($mail)){foreach($mail as $value){ ?> value="<?php echo $value['email']; ?>" <?php }} ?> >

            </div>
            <div class="form-group">
              <input class="form-control" name="sub" placeholder="Subject:">
            </div>
            <div class="form-group">
              <textarea name="message" class="tinymce"></textarea>
            </div>
            
          </div><!-- /.box-body -->
          <div class="box-footer">
            <div class="pull-right">
              <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
            </div>
          </div><!-- /.box-footer -->

        </form>

        </div><!-- /. box -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
