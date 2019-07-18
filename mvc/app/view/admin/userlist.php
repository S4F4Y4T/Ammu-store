
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            User List
          </h1>
        </section>
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">user Data</h3>
                </div><!-- /.box-header -->

                <div style="overflow-x:auto;" class="box-body">
                  <table class="display table table-bordered table-hover" id="data">
					<thead>
						<tr>
							<th>Serial</th>
							<th>User Name</th>
                            <th>Email</th>
                            <th>Phone</th>
							<td >Action</td>
						</tr>
					</thead>
					<tbody>
					<?php if(isset($user)){ $i = 0; foreach($user as $value){ $i++; ?>

						<tr class="odd gradeX">
							<td ><?php echo $i; ?></td>
							<td><?php echo $value['username']; ?></td>
							<td><?php echo $value['email']; ?></td>
							<td><?php echo $value['phone']; ?></td>
							<td ><a href="<?= BASE; ?>/Admin/viewuser/<?php echo base64_encode($value['userid']); ?>" class="btn btn-primary btn-sm">view</a></td>
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
