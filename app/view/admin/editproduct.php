
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
          <?php if(isset($product)){ foreach($product as $value){ ?>
                <!-- form start -->
                <form class="form-horizontal" action="<?php echo BASE; ?>/Product/updateproduct/<?php echo base64_encode($value['id']); ?>" method="post" enctype="multipart/form-data">

                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" style="font-size:16px;" class="col-sm-2 control-label">Product Name</label>
                      <div class="col-sm-6">
                        <input type="text" value='<?php echo $value['name']; ?>' name="name" class="form-control input-lg" id="inputEmail3" placeholder="Product Name">
                      </div>
                    </div>


					 <div class="form-group">
                      <label style="font-size:16px;" class="col-sm-2 control-label">Category</label>
                      <div class="col-sm-4">
							<select onChange="getdata(this.value)" class="form-control" name="cat" id="cat" style="width: 100%;">

                <?php if(isset($category)){foreach($category as $val){?>

							  <option <?php if($val['catid'] == $value['category']){echo "selected=selected"; } ?> value="<?php echo $val['catid']; ?>"><?php echo $val['catname']; ?></option>

              <?php }} ?>

							</select>
						</div>
          </div>

          <div class="form-group">
                     <label style="font-size:16px;" class="col-sm-2 control-label">Sub Category</label>
                     <div class="col-sm-4">
            <select class="form-control" name="subcat" id="subcat" style="width: 100%;">
              <?php if(isset($subcat)){foreach($subcat as $val){ ?>
                <?php if($val['subid'] == $value['subcategory']){ ?>
               <option value="<?php echo $val['subid']; ?>"><?php echo $val['subcat']; ?></option>
             <?php }}} ?>
             </select>
           </div>
         </div>

					<div class="form-group">
              <label style="font-size:16px;" class="col-sm-2 control-label">Brand</label>
                      <div class="col-sm-4">
							<select class="form-control select2" name="brand" style="width: 100%;">

                <?php if(isset($brand)){foreach($brand as $val){?>

                <option <?php if($val['brandid'] == $value['brand']){echo "selected=selected"; } ?> value="<?php echo $val['brandid']; ?>"><?php echo $val['brandname']; ?></option>

                <?php }} ?>
							</select>
						</div>
        </div>

					<div class="form-group">
             <label style="font-size:16px;" class="col-sm-2 control-label">Price(Befor Discount)</label>
             <div class="col-sm-4">
                  <input type="number" value="<?php echo $value['priceBeforeDiscount']?>" required name="preprice" class="form-control" placeholder="Product Price">
              </div>
          </div>

          <div class="form-group">
             <label style="font-size:16px;" class="col-sm-2 control-label">Product(Current)</label>
             <div class="col-sm-4">
                  <input type="number" value="<?php echo $value['price']?>" required name="currentprice" class="form-control" placeholder="Product Price">
              </div>
          </div>

          <div class="form-group">
              <label style="font-size:16px;" class="col-sm-2 control-label">Product Availability</label>
              <div class="col-sm-4">
							    <select class="form-control select2" name="availability" style="width: 100%;">
                                    <option value="<?php echo $value['availability']; ?>"><?php echo $value['availability']; ?></option>
    							    <option value="In Stock">In Stock</option>
                                    <option value="Out Of Stock">Out Of Stock</option>

							     </select>
						</div>
        </div>
        
        <div class="form-group">
        <label style="font-size:16px;" class="col-sm-2 control-label">Product Type</label>
        <div class="col-sm-4">
				    <select class="form-control select2" name="type" style="width: 100%;">
				        <?php if($value['type'] == 1){ ?>
				            <option value="<?php echo $value['type']; ?>">Feature</option>
				            <option value="2">General</option>
				         <?php }elseif($value['type'] == 2){ ?>
				             <option value="<?php echo $value['type']; ?>">General</option>
				             <option value="1">Feature</option>
				         <?php } ?>
				     </select>
			</div>
        </div>
        
          <div class="form-group">
             <label style="font-size:16px;" class="col-sm-2 control-label">shipping Charge</label>
             <div class="col-sm-4">
                  <input type="number" value="<?php echo $value['shippingCharge']?>" required name="shipcharge" class="form-control" placeholder="Product Price">
              </div>
          </div>

					<div class="form-group">
              <label style="font-size:16px;" class="col-sm-2 control-label">Front Image</label>

              <div class="col-sm-3">
                <img class="img-thumbnail" height="200px" width="200px" src="<?php echo BASE.'/img/'.$value['image1']; ?>" />
                <a href="<?php echo BASE; ?>/Product/updatefrontimg/<?php echo base64_encode($value['id']); ?>">Update Image</a>
              </div>
          </div>

          <div class="form-group">
              <label style="font-size:16px;" class="col-sm-2 control-label">Front Image</label>

              <div class="col-sm-3">
                <img class="img-thumbnail" height="200px" width="200px" src="<?php echo BASE.'/img/'.$value['image2']; ?>" />
                <a href="<?php echo BASE; ?>/Product/updatesideimg/<?php echo base64_encode($value['id']); ?>">Update Image</a>

              </div>
          </div>

          <div class="form-group">
              <label style="font-size:16px;" class="col-sm-2 control-label">Back Image</label>
              <div class="col-sm-3">
                <img class="img-thumbnail" height="200px" width="200px" src="<?php echo BASE.'/img/'.$value['image3']; ?>" />
                <a href="<?php echo BASE; ?>/Product/updatebackimg/<?php echo base64_encode($value['id']); ?>">Update Image</a>

              </div>
          </div>

					<div class="form-group">
              <label style="font-size:16px;" class="col-sm-2 control-label">Product Details</label>
               <div class="col-sm-8">
						        <textarea name="details" class="tinymce"><?php echo $value['productDetails'] ?></textarea>
                </div>
          </div>



              </div>
        </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn-lg btn btn-primary pull-right">Submit</button>
                  </div><!-- /.box-footer -->
                </form>

<?php }} ?>
              </div><!-- /.box -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      </aside>
