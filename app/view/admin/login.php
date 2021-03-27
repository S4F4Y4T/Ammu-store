<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="<?php echo BASE; ?>/style/css/stylelogin.css" media="screen" />
</head>
<body>

<div class="container">
	<section id="content">
	<?php
			if(isset($msg)){
				echo "<span style='font-size:14px;color:red;font-weight:bold;'>".$msg."</span>";
			}

		?>
		<form action="<?php echo BASE; ?>/Admin/loginAuth" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password"  name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="http://www.facebook.com/S4F4Y4T">S4F4Y4T</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>
