<?php
	Session::init();
	Session::chksession();
?>
<?php
  //set headers to NOT cache a page
  header("Cache-Control: no-cache, must-revalidate"); //HTTP 1.1
  header("Pragma: no-cache"); //HTTP 1.0
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Panel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <?php if(isset($image)){ foreach($image as $value){ ?>
            <link rel = "icon" type = "image/png" href = "<?php echo BASE; ?>/img/<?php echo $value['image']; ?>">
	<?php }} ?>
	
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo BASE; ?>/style/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo BASE; ?>/style/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo BASE; ?>/style/dist/css/AdminLTE.min.css?v=2.0">

    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo BASE; ?>/style/dist/css/skins/_all-skins.min.css">

	<!-- Data Table -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
	<!-- Data Table -->
	<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>


	<!-- text editor -->
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'.tinymce' });</script>
	<!-- text editor -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

		<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
		<script type="text/javascript">
		function getdata(val){
		  $.ajax({
		    type:"POST",
		    url:"<?php echo BASE; ?>/Product/getdata",
		    data:"cat="+val,
		    success:function(data){
		      $("#subcat").html(data);
		    }
		  });
		}
		</script>

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

<header class="main-header">

  <!-- Logo -->
  <a href="<?= BASE; ?>/Admin" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>A</b>LT</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Admin</b>LTE</span>
  </a>

  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Messages: style can be found in dropdown.less-->
        <li class="dropdown messages-menu">
          <a href="<?php echo BASE; ?>/Mail/fetch">
            <i class="fa fa-envelope-o"></i>
            <span class="label label-success"><?php if(isset($count)){ foreach($count as $value){  echo $value[0];  }} ?></span>
          </a>
        </li>

        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<?php if(isset($image)){ foreach($image as $value){ ?>
            <img src="<?php echo BASE; ?>/img/<?php echo $value['image']; ?>" class="user-image" alt="<?php echo $value['username']; ?>">
            <span class="hidden-xs"><?php echo $value['username']; ?></span>
						<?php }} ?>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
							<?php if(isset($image)){ foreach($image as $value){ ?>
              <img src="<?php echo BASE; ?>/img/<?php echo $value['image']; ?>" class="user-image" alt="<?php echo $value['username']; ?>">
						<?php }} ?>
							<p>
                <?php echo $value['username']; ?>
              </p>
            </li>
            <li class="user-footer">

              <div class="pull-right">
                <a href="<?php echo BASE; ?>/Admin/logout" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>

  </nav>
</header>
      <!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
				<?php if(isset($image)){ foreach($image as $value){ ?>
				<img src="<?php echo BASE; ?>/img/<?php echo $value['image']; ?>" class="img-circle" alt="<?php echo $value['username']; ?>">

      </div>
      <div class="pull-left info">
        <p><?php echo $value['username']; ?></p>
				<?php }} ?>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">Control Panel</li>
      <li class="active treeview">
        <a href="<?php echo BASE; ?>/Admin/panel">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
      </li>
		<li class="treeview">
        <a href="<?php echo BASE; ?>/Admin/changepass">
          <i class="fa fa-exchange"></i> <span>Change Password</span>
        </a>
      </li>
		<li class="treeview">
        <a href="<?php echo BASE; ?>/Admin/orderlist">
          <i class="fa fa-circle-o"></i> <span>Orders</span>
        </a>
      </li>
		<li class="treeview">
        <a href="<?php echo BASE; ?>/Admin/users">
          <i class="fa fa-circle-o"></i> <span>Users</span>
        </a>
      </li>
        <li class="treeview">
        <a href="#">
          <i class="fa fa-circle-o"></i> <span>Categories</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo BASE; ?>/Category/addcategory"><i class="fa fa-edit"></i>Add Category</a></li>
          <li><a href="<?php echo BASE; ?>/Category/catlist"><i class="fa fa-table"></i>Category List</a></li>
        </ul>
		</li>
        
		<li class="treeview">
				<a href="#">
					<i class="fa fa-circle-o"></i> <span>Sub Categories</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="<?php echo BASE; ?>/Subcat/addsubcat"><i class="fa fa-edit"></i>Add Sub Category</a></li>
					<li><a href="<?php echo BASE; ?>/Subcat/sublist"><i class="fa fa-table"></i>Sub Category List</a></li>
				</ul>
			</li>

			<li class="treeview">
        <a href="#">
          <i class="fa fa-circle-o"></i> <span>Brand</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo BASE; ?>/Brand/addbrand"><i class="fa fa-edit"></i>Add Brand</a></li>
          <li><a href="<?php echo BASE; ?>/Brand/brandlist"><i class="fa fa-table"></i>Brand List</a></li>
        </ul>
      </li>

			<li class="treeview">
        <a href="#">
          <i class="fa fa-circle-o"></i> <span>Product</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo BASE; ?>/Product/addproduct"><i class="fa fa-edit"></i>Add Product</a></li>
          <li><a href="<?php echo BASE; ?>/Product/productlist"><i class="fa fa-table"></i>Product List</a></li>
        </ul>
      </li>

      <li>
          <a href="<?php echo BASE; ?>/Mail/fetch"><i class="fa fa-envelope"></i> <span>Mailbox</span><small class="label pull-right bg-yellow"><?php if(isset($count)){ foreach($count as $value){  echo $value[0];  }} ?></small></a>

      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
