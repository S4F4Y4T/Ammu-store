  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Add Sub Category
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
                  <h3 class="box-title">Insert Sub Category Details</h3>
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

                <!-- form start -->
                <form class="form-horizontal" method="post" action="<?php echo BASE; ?>/Subcat/insertsub">
                  <div class="box-body">

                    <div class="form-group">
                               <label style="font-size:16px;" class="col-sm-2 control-label">Category</label>
                               <div class="col-sm-3">
         							<select class="form-control select2" name="cat" style="width: 100%;">
                        <?php if(isset($category)){ foreach($category as $value){ ?>

                            <option value="<?php echo $value['catid']; ?>"><?php echo $value['catname']; ?></option>

                        <?php }} ?>


         							</select>
         						</div>
                             </div>

                    <div class="form-group">
                      <label for="inputEmail3" style="font-size:16px;" class="display-3 col-sm-2 control-label">Sub ategory Name</label>

                      <div class="col-sm-6">
                        <input type="text" name="subcat" class="form-control input-lg" id="inputEmail3" placeholder="Sub Category Name">
                      </div>

                    </div>
                  </div><!-- /.box-body -->
                  <div class="ml-20 box-footer">

                    <button type="submit" name="submit" style="margin-right:20px;" class="btn-lg btn btn-info pull-right">Submit</button>
                  </div><!-- /.box-footer -->
                </form>
              </div><!-- /.box -->
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
