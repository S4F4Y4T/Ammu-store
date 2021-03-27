
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Mailbox
            <small><?php if(isset($count)){ foreach($count as $value){  echo $value[0];  }} ?> new messages</small>
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
              <a href="<?php echo BASE; ?>/Mail/compose" class="btn btn-primary btn-block margin-bottom">Compose</a>
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Folders</h3>
                  <div class="box-tools">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href=""><i class="fa fa-inbox"></i> Inbox <span class="label label-primary pull-right"></span></a></li>
                    <li><a href="<?php echo BASE; ?>/Mail/compose"><i class="fa fa-envelope-o"></i> Compose</a></li>
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /. box -->

            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Inbox</h3>

                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="mailbox-controls">
                    <!-- Check all button -->
              <form method="post" action="<?= BASE; ?>/Mail/deletemail" >
                    <label id="checkAll" class="btn btn-default btn-sm checkbox-toggle"><input id="selectall" type="checkbox"></label>
                    <div class="btn-group">
                      <button type="submit" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                    </div><!-- /.btn-group -->
                    <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                  </div>
                  <div class="table-responsive mailbox-messages">
                    <table class="display table table-hover table-striped" id="data">
					<thead>
						<tr>
							<th></th>
							<th></th>
							<th>Name</th>
							<th>Body</th>
							<th></th>
							<th>Date</th>
						</tr>
					</thead>
                      <tbody>

					  <?php if(isset($mail)){ foreach($mail as $value){ ?>
                        <tr>
                          <td><input name="chk[]" value="<?php echo $value['id']; ?>" class="checkboxall" type="checkbox"></td>
                          <td><input type="hidden"></td>
                          <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                          <td class="mailbox-name"><a <?php if($value['seen'] == 0) { echo 'style="font-weight:bold;color:#3c8dbc"'; }else{echo 'style="color:#262626"'; } ?> href="<?php echo BASE; ?>/Mail/readmail/<?php echo base64_encode($value['id']); ?>"> <?php echo $value['name']; ?> </a>
                            <?php if($value['seen'] == 0) { echo '<div class="label pull-right bg-yellow">New</div>'; } ?></td>
                          <td class="mailbox-subject" ><b><?php echo $value['subject']; ?></b> -<span <?php if($value['seen'] == 0) { echo 'style="font-weight:bold;"'; } ?>>
						  <?php
							$st = $value['message'];
							$st = substr($st, 0, 20);
							echo $st;
						  ?>
            </span>
						</td>
                          <td class="mailbox-date"><?php echo $value['date']; ?></td>
                        </tr>
					  <?php }} ?>
                      </tbody>
              </form>
                    </table><!-- /.table -->
                  </div><!-- /.mail-box-messages -->
                </div><!-- /.box-body -->

              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
