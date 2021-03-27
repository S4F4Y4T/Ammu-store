

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Version 2.0</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Money</span>
                  <span class="info-box-number">$<?php if(isset($money)){ echo $money[0][0]; } ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="ion ion-ios-cart-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Products</span>
                  <span class="info-box-number"><?php if(isset($pcount)){ echo $pcount[0][0]; } ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Orders</span>
                  <span class="info-box-number"><?php if(isset($ocount)){ echo $ocount[0][0]; } ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Members</span>
                  <span class="info-box-number"><?php if(isset($ucount)){ echo $ucount[0][0]; } ?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <div class="col-md-8">
              <!-- MAP & BOX PANE -->
              <div class="row">
                <div class="col-md-6">

                </div><!-- /.col -->
              </div><!-- /.row -->

              <!-- TABLE: LATEST ORDERS -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Orders</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th>Order ID</th>
                          <th>Item</th>
                          <th>Status</th>
                          <th>Order Date</th>
                        </tr>
                      </thead>
                      <tbody>
                <?php if(isset($order)){ foreach($order as $value){ ; ?>
                        <tr>
                          <td><a href="pages/examples/invoice.html"><?php echo $value['orderid']; ?></a></td>
                          <td><?php echo $value['name']; ?></td>
                          <td><span class="label label-success"><?php echo $value['process']; ?></span></td>
                          <td><div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo $value['date']; ?></div></td>
                        </tr>
                <?php }} ?>
                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <a href="<?php echo BASE; ?>/Admin/orderlist" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
              
              <!-- USERS LIST -->
                  <div class="box box-danger">
                    <div class="box-header with-border">
                      <h3 class="box-title">Latest Members</h3>
                      <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div><!-- /.box-header -->
                    <div class="box-body no-padding">
                      <ul class="users-list clearfix">
                         <?php if(isset($user)){ foreach($user as $value){ ; ?>
                        <li>
                          <img src="<?php echo BASE; ?>/style/dist/img/user1-128x128.jpg" alt="User Image">
                          <a class="users-list-name" href="<?php echo BASE; ?>/Admin/viewuser/<?= base64_encode($value['userid']); ?>"><?php echo $value['username']; ?></a>
                          <span class="users-list-date"><?php echo $value['phone']; ?></span>
                        </li>
                        <?php }} ?>
                      </ul><!-- /.users-list -->
                    </div><!-- /.box-body -->
                    <div class="box-footer text-center">
                      <a href="<?php echo BASE; ?>/Admin/users" class="uppercase">View All Users</a>
                    </div><!-- /.box-footer -->
                  </div><!--/.box -->
            </div><!-- /.col -->

            <div class="col-md-4">
              

              <!-- PRODUCT LIST -->
              <div class="box box-primary">
                <div class="box-header with-border">

                  <h3 class="box-title">Recently Added Products</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                    <li class="item">

					<?php if(isset($product)){ foreach($product as $value){ ; ?>

                      <div class="product-img">
                        <a href="<?php echo BASE; ?>/img/<?php echo $value['image1']; ?>">
						<img class="img-thumbnail" src="<?php echo BASE; ?>/img/<?php echo $value['image1']; ?>" alt="Product Image">
						</a>
                      </div>


                      <div class="product-info">
                        <a href="<?php echo BASE; ?>/Product/editproduct/<?php echo base64_encode($value['id']); ?>" class="product-title"><?php echo $value['name']; ?><span class="label label-warning pull-right">$<?php echo $value['price']; ?></span></a>
                        <span class="product-description">
                          <?php echo $value['productDetails']; ?>
                        </span>
                      </div>
                    </li><!-- /.item -->

					<?php }} ?>
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="<?php echo BASE; ?>/Product/productlist" class="uppercase">View All Products</a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
