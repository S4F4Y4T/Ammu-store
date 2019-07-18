<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sub Category List
      </h1>
    </section>

<!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Sub Category Data</h3>
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
      <div style="overflow-x:auto;" class="box-body">
      <table class="display table table-bordered table-hover" id="data">
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Category Name</th>
						<th>Sub Category Name</th>
						<th>Creation Date</th>
            <th>Update Date</th>
						<th >Action</th>
					</tr>
				</thead>
				<tbody>
				<?php if(isset($subcat)){ $i = 0; foreach($subcat as $value){ $i++; ?>

					<tr class="odd gradeX">
						<td > <?php echo $i; ?>			    </td>
						<td>  <?php echo $value['catname']; ?> </td>
						<td>  <?php echo $value['subcat']; ?> </td>
						<td>  <?php echo $value['createDate']; ?> </td>
            <td>  <?php echo $value['updateDate']; ?> </td>
						<td >
							<a href="editsub/<?php echo base64_encode($value['subid']); ?>/" class="btn btn-primary btn-sm">Edit</a>
							<a class="btn btn-danger btn-sm" onClick="return confirm('After Delete This subCategory All The Product Related To This Subcategory Will Be vanish.Do You Still Want To Delete This?');" href="deletesub/<?php echo base64_encode($value['subid']); ?>">Delete</a>
						</td>
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
