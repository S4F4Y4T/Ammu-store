<?php
    require'app/config/dompdf/autoload.inc.php';
    require"app/config/Pdf.php";
	require"app/config/config.php";
	require"app/config/stripe-php/init.php";
    require 'app/config/phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer(true);


	spl_autoload_register(function($class){
		require"system/lib/".$class.".php";
	});
	
	$index = new Main();

	
	
	
?>
