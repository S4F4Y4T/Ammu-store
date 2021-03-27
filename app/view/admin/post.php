<?php require"header.php"; ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Tables
            <small>advanced tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Hover Data Table</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="display table table-bordered table-hover" id="data">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Category</th>
							<th>Brand</th>
							<th>Description</th>
							<th>Image</th>
							<th style="width:13%">Action</th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd gradeX">
							<td >01</td>
							<td>Freeze</td>
							<td>Electronics</td>
							<td>Samsung</td>
							<td>This is a higher tech high quality electronics device wich will help you to save your 80% of wasted food</td>
							<td>image.jpg</td>
							<td ><a class="btn btn-primary btn-sm">Edit</a>
							<a class="btn btn-danger btn-sm" onClick="return confirm('Are You Sure To Delete');" href="deletecat/">Delete</a></td>
						</tr>
					</tbody>
				</table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

             
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
     <?php require"footer.php"; ?>