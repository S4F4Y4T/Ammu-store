

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Read Mail
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Mailbox</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Read Mail</h3>
                </div><!-- /.box-header -->
                <div class="box-body no-padding">

				<?php if(isset($mail)){ foreach($mail as $value){ ?>

                  <div class="mailbox-read-info">
                    <h3><a href="../"><?php echo $value['subject']; ?></a></h3>
                    <h5><?php echo $value['message']; ?> <span class="mailbox-read-time pull-right"><?php echo $value['date']; ?></span></h5>
                  </div><!-- /.mailbox-read-info -->
                  <div class="mailbox-controls with-border text-center">
                  <div class="mailbox-read-message">
                    <p>
					<?php
						echo $value['message'];
					?></p>
                  </div><!-- /.mailbox-read-message -->
                </div><!-- /.box-body -->

                <div class="box-footer">
                  <div class="pull-right">
                    <a href="<?php echo BASE; ?>/Mail/compose/<?php echo base64_encode($value['id']); ?>"><button class="btn btn-default"><i class="fa fa-reply"></i> Reply</button></a>
                  </div>
                  <a href="<?php echo BASE; ?>/Mail/delmail/<?php echo base64_encode($value['id']); ?>"><button class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button></a>
                </div><!-- /.box-footer -->

                <?php } } ?>

              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
