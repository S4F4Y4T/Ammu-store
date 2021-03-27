<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Brand List
    </h1>

  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">
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

	       </h3>
  <div style="overflow-x:auto;" class="box-body">
    <table class="display table table-bordered table-hover" id="data">
			<thead>
				<tr>
					<th>Serial No.</th>
					<th>Brand Name</th>
                    <th>Brand Image</th>
                    <th>Brand Description</th>
                    <th>Creation Date</th>
                    <th>Update Date</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php if(isset($brand)){ $i = 0; foreach($brand as $value){ $i++; ?>
					<tr class="odd gradeX">

						<td><?php echo $i; ?></td>
						<td><?php echo $value["brandname"]; ?></td>
            <td> <img height="80px" width="80px" src="<?php echo BASE; ?>/img/<?php echo $value['image'];?>" class="img-thumbnail" /> </td>
            <td><?php echo $value["brandDesc"]; ?></td>
            <td><?php echo $value["creationDate"]; ?></td>
            <td><?php echo $value["updationDate"]; ?></td>
						<td style="width:20%">
							<a class="btn btn-primary" href="editbrand/<?php echo base64_encode($value["brandid"]); ?>">Edit</a>
							<a class="btn btn-danger" onClick="return confirm('Are You Sure To Delete');" href="deletebrand/<?php echo base64_encode($value["brandid"]); ?>">Delete</a>
						</td>
					</tr>
				<?php } }?>
			</tbody>
	</table>
          </div><!-- /.box-body -->
        </div><!-- /.box -->


      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->



      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
