<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Category List
      </h1>
    </section>

<!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Category Data</h3>
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
      <table class="display tblone table table-bordered table-hover" id="data">
				<thead>
					<tr>
						<th>Serial No.</th>
						<th>Name</th>
            <th>Image</th>
						<th>Description</th>
						<th>Creation Date</th>
            <th>Update Date</th>
						<th >Action</th>
					</tr>
				</thead>
				<tbody>
				<?php if(isset($category)){ $i = 0; foreach($category as $value){ $i++; ?>

					<tr class="odd gradeX">
						<td > <?php echo $i; ?>			    </td>
						<td>  <?php echo $value['catname']; ?> </td>
            <td> <img height="80px" width="80px" src="<?php echo BASE; ?>/img/<?php echo $value['image'];?>" class="img-thumbnail" /> </td>
						<td>  <?php echo $value['catDescription']; ?> </td>
						<td>  <?php echo $value['creationDate']; ?> </td>
            <td>  <?php echo $value['updationDate']; ?> </td>
						<td >
							<a href="editcategory/<?php echo base64_encode($value['catid']); ?>" class="btn btn-primary btn-sm">Edit</a>
							<a class="btn btn-danger btn-sm" onClick="return confirm('After Delete This Category All The Product Related To This Category Will Be Vanish.Do You Still Want To Delete?');" href="deletecat/<?php echo base64_encode($value['catid']); ?>">Delete</a>
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
