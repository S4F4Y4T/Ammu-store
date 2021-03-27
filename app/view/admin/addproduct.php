<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Insert Product
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
            <h3 class="box-title">Product Details</h3>
          </div><!-- /.box-header -->
      	<?php
      			if(!empty($_GET['msg'])){
      				$msg = $_GET['msg'];
      				$msg = unserialize(urldecode($msg));
      				foreach($msg as $key => $value){
      					echo $value;
      				}
      			}
      		?>
          <!-- form start -->
          <form class="form-horizontal" action="<?php echo BASE; ?>/Product/insertproduct" method="post" enctype="multipart/form-data">

            <div class="box-body">
              <div class="form-group">
                <label for="inputEmail3" style="font-size:16px;" class="col-sm-2 control-label">Product Name</label>
                <div class="col-sm-6">
                  <input type="text" name="name" class="form-control input-lg" id="inputEmail3" placeholder="Product Name">
                </div>
              </div>


		 <div class="form-group">
                <label style="font-size:16px;" class="col-sm-2 control-label">Category</label>
                <div class="col-sm-4">
				<select class="form-control" onChange="getdata(this.value)" name="cat" style="width: 100%;">
          <?php if(isset($category)){ foreach($category as $value){ ?>

				  <option value="<?php echo $value['catid']; ?>"><?php echo $value['catname']; ?></option>

          <?php } } ?>
				</select>
			</div>
    </div>

            <div class="form-group">
               <label style="font-size:16px;" class="col-sm-2 control-label">Sub Category</label>
               <div class="col-sm-4">
                  <select class="form-control" name="subcat" id="subcat" style="width: 100%;">

                  </select>
       <span style="color:red">(Keep Atleast 2 category and subcategory)</span>
     </div>
   </div>

		<div class="form-group">
        <label style="font-size:16px;" class="col-sm-2 control-label">Brand</label>
                <div class="col-sm-4">
				<select class="form-control select2" name="brand" style="width: 100%;">

          <?php if(isset($brand)){ foreach($brand as $value){ ?>

				  <option value="<?php echo $value['brandid']; ?>"><?php echo $value['brandname']; ?></option>

          <?php } } ?>

				</select>
			</div>
    </div>

		<div class="form-group">
       <label style="font-size:16px;" class="col-sm-2 control-label">Price(Befor Discount)</label>
       <div class="col-sm-4">
            <input type="number" required name="preprice" class="form-control" placeholder="Product Price">
        </div>
    </div>

    <div class="form-group">
       <label style="font-size:16px;" class="col-sm-2 control-label">Product(Current)</label>
       <div class="col-sm-4">
            <input type="number" required name="currentprice" class="form-control" placeholder="Product Price">
        </div>
    </div>

    <div class="form-group">
        <label style="font-size:16px;" class="col-sm-2 control-label">Product Availability</label>
        <div class="col-sm-4">
				    <select class="form-control select2" name="availability" style="width: 100%;">

              <option value="In Stock">In Stock</option>
              <option value="Out Of Stock">Out Of Stock</option>

				     </select>
			</div>
  </div>
  <div class="form-group">
        <label style="font-size:16px;" class="col-sm-2 control-label">Product Type</label>
        <div class="col-sm-4">
				    <select class="form-control select2" name="type" style="width: 100%;">
                          <option value="2">General</option>
                          <option value="1">Feature</option>
				     </select>
			</div>
  </div>

    <div class="form-group">
       <label style="font-size:16px;" class="col-sm-2 control-label">shipping Charge</label>
       <div class="col-sm-4">
            <input type="number" required name="shipcharge" class="form-control" placeholder="Shipping Charge">
        </div>
    </div>

		<div class="form-group">
        <label style="font-size:16px;" class="col-sm-2 control-label">Front Image</label>
        <div class="col-sm-3">
          <input type="file" name="img1" style="margin-top:8px" id="exampleInputFile">
        </div>
    </div>

    <div class="form-group">
        <label style="font-size:16px;" class="col-sm-2 control-label">Side Image</label>
        <div class="col-sm-3">
          <input type="file" name="img2" style="margin-top:8px" id="exampleInputFile">
        </div>
    </div>

    <div class="form-group">
        <label style="font-size:16px;" class="col-sm-2 control-label">Backend Image</label>
        <div class="col-sm-3">
          <input type="file" name="img3" style="margin-top:8px" id="exampleInputFile">
        </div>
    </div>

		<div class="form-group">
        <label style="font-size:16px;" class="col-sm-2 control-label">Product Details</label>
         <div class="col-sm-8">
			        <textarea name="details" class="tinymce"></textarea>
          </div>
    </div>



        </div>
  </div><!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn-lg btn btn-primary pull-right">Submit</button>
            </div><!-- /.box-footer -->
          </form>


        </div><!-- /.box -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->
</aside>
