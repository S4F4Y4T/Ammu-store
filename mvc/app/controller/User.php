<?php
	class User extends Mcontroller{
		public function __construct(){
		    error_reporting(0);
		    Session::init();
			parent::__construct();
		}
		public function Index(){
			$this->user();
		}
		
		public function header(){
		 $sid = session_id();
	    $cart = array(
		'table'			 => array('table' => 'cart'),
		//'pkey'			 => array('pkey' => 'cartid'),
		'selectcond' => array('count' => 'COUNT(*)'),
		//'orderby'	   => array('order' => 'DESC'),
		//'limit' 	 => array('start' => 2,'limit' => 3),
		'wherecond'=> array('where' =>array('sid' => $sid))
	);
	
	    $Model = $this->load->model("Madmin");
	    $count = $Model->fetchdata($cart);
	    if($count[0][0] > 0){
	        $data['cart'] = Session::get("total");
	    }else{
	        $data['cart'] = "empty";
	    }
	
	    $this->load->view("inc/header",$data);
	}
	
	public function user(){
	    Session::userlogin();
	    $this->header();
	    $this->load->view("login");
	    $this->load->view("inc/footer");
	}
	
	public function login(){
	    	if(!($_POST)){
			header("Location:".BASE."/User/user");
		}else{
		$input = $this->load->valid("Validation");

		$input->post("username")
					->schar()
					->isempty();

		$input->post("password")
					->schar()
					->isempty();

        if($input->submit()){		

		$Model = $this->load->model('Madmin');

		$username = $input->value['username'];
		$password = $input->value['password'];
		$encrypt  = $Model->encrypt($password);

		$logcount = array(
			'table'			 => array('table' => 'users'),
			//'pkey'			 => array('pkeys' => 'id'),
			'selectcond' => array('count' => 'COUNT(*)'),
			//'orderby' 	 => array('order' => 'DESC'),
			'limit' 	 => array('start' => 1),
			'wherecond'=> array('where' => array('username' => $username,'password' => $encrypt,'verify' => 1))
		);
		$data = array(
			'table'			 => array('table' => 'users'),
			//'pkey'			 => array('pkeys' => 'id'),
			'selectcond' => array('select' => '*'),
			//'orderby' 	 => array('order' => 'DESC'),
			'limit' 	 => array('start' => 1),
			'wherecond'=> array('where' => array('username' => $username,'password' => $encrypt,'verify' => 1))
		);
		
        $usrchk = $this->userchk($username);
        
        if($usrchk == true){
            $mdata['loginmsg'] =	'<span style="color: red;font-weight: bold;">User Doesnt Exist</span>';
		    header("Location:user?loginmsg=".urlencode(serialize($mdata)));
        }else{
		$logauth = $Model->fetchdata($logcount);
		$login = $Model->fetchdata($data);

		if($logauth[0][0] > 0){
		    foreach($login as $value){
    			Session::init();
    			Session::set("userlogin", true);
    			Session::set("userid",$value['userid']);
    			Session::set("username",$value['username']);
    			Session::set("useremail",$value['email']);
    			header("Location:".BASE."/Cart");
		    }
		}else{
    		$mdata['loginmsg'] =	'<span style="color: red;font-weight: bold;">Incorrect Password</span>';
    		header("Location:user?loginmsg=".urlencode(serialize($mdata)));
		}
        }
        }else{
    		$mdata['loginmsg'] =	'<span style="color: red;font-weight: bold;">Field Must Not Be Empty</span>';
    		header("Location:user?loginmsg=".urlencode(serialize($mdata)));
	}
        
	
}
	}
	
	public function userchk($username){
	   $data = array(
            		'table'			 => array('table' => 'users'),
            		//'pkey'			 => array('pkey' => 'userid'),
            		'selectcond' => array('select' => 'username'),
            		//'orderby'	   => array('order' => 'DESC'),
            		//'limit' 	 => array('start' => 2,'limit' => 3),
            		'wherecond'=> array('where' =>array('username' => $username))
            	);
       $Model = $this->load->model("Madmin");
	   $user = $Model->fetchdata($data);
	   
	   if($user[0] <= 0){
	       return true;
	   }else{
	       return false;
	   }
	}
	
	public function emailchk($email){
	    $data = array(
            		'table'			 => array('table' => 'users'),
            		//'pkey'			 => array('pkey' => 'userid'),
            		'selectcond' => array('select' => 'email'),
            		//'orderby'	   => array('order' => 'DESC'),
            		//'limit' 	 => array('start' => 2,'limit' => 3),
            		'wherecond'=> array('where' =>array('email' => $email,'verify' => 1))
            	);
       $Model = $this->load->model("Madmin");
	   $email = $Model->fetchdata($data);
	   
	   if($email[0] > 0){
	       return true;
	   }else{
	       return false;
	   }
	}
	
	public function logout(){
		$pkey  = "sid";
        $sid = session_id();
		
		$data = array(
            'table'			 => array('table' => 'cart'),
			//'choice'		 => array('single' => 'catid'),
			//'choice'		 => array('id' => '1','id' =>'2'),
			'wherecond'  => array('where' =>array('sid' => $sid))
		);
			$Model 	 = $this->load->model('Madmin');
			$delcart = $Model->delete($data);
		
	    session_destroy();
		session_unset();
		Session::set("userlogin",false);
		
		header("Location:".BASE);
	}
	
	public function confirm(){
	    if(Session::get("emailverify") && Session::get("idverify")){
            $this->header();
            
        			if(!empty($_GET['msg'])){
        				$msg = $_GET['msg'];
        				$msg = unserialize(urldecode($msg));
        				foreach($msg as $key => $val){
        					echo $val;
        				}
        			}
    	    echo '
    	     <form style="margin:50px" method="post" action="auth">
             <fieldset>
              <legend>confirmation code</legend>
              <input name="vcode" type="text">
              <input name="id" type="hidden" value="'.Session::get("idverify").'">
              <input name="email" type="hidden" value="'.Session::get("emailverify").'">
              <input type="submit" class="buysubmit" name="submit" value="confirm">
             </fieldset>
            </form>
    	    ';
	        $this->load->view("inc/footer");
	    }else{
	        header("Location: user");
	    }
	}
	public function auth(){
	    if(!($_POST)){
			header("Location:".BASE."/User/");
		}else{
	    $vcode = $_POST['vcode'];
	    $id = $_POST['id'];
	    $email = $_POST['email'];
	    if($vcode == ''){
	        $mdata['msg'] =	'<span style="color: red;font-weight: bold;">Field must not be empty</span>';
			header("Location:confirm?msg=".urlencode(serialize($mdata)));
	    }else{
	    if(Session::get('confirmation-code') == $vcode){
	        $table = 'users';
	        $pkey = 'userid';
	        $data = array(
				'verify'     => 1
			);
	        $Model = $this->load->model('Madmin');
			$update = $Model->updatedata($table,$data,$pkey,$id);
			if($update){
			    session_destroy();
		        session_unset();
    	        Session::init();
    			Session::set("userlogin", true);
    			Session::set("userid",$id);
    			header("Location:".BASE."/Cart");
    			
			}else{
			    echo "Account Havent verified";
			}
	    }else{
	        $mdata['msg'] =	'<span style="color: red;font-weight: bold;">Confirmation code incorrect</span>';
			header("Location:confirm?msg=".urlencode(serialize($mdata)));
	    }
		}
		}
	}
	
	public function registration(){
	    if(!($_POST)){
			header("Location:".BASE."/User/");
		}else{
        
		$input = $this->load->valid("Validation");

		$input->post("name")
		            ->isempty()
					->schar();
		$input->post("city")
					->schar()
					->isempty();
		$input->post("zip")
					->schar()
					->isempty();
		$input->post("email")
					->schar()
					->isempty();
		$input->post("address")
					->schar()
					->isempty();
		$input->post("country")
					->schar()
					->isempty();
		$input->post("phone")
					->schar()
					->isempty();
		$input->post("password")
					->schar()
					->isempty();
        
        $Model = $this->load->model('Madmin');
            
        if($input->submit()){

			$name     = $input->value["name"];
			$city      = $input->value["city"];
			$zip      = $input->value["zip"];
			$email    = $input->value["email"];
			$address    = $input->value["address"];
			$country    = $input->value["country"];
			$phone    = $input->value["phone"];
			$password    = $input->value["password"];
			$encrypt  = $Model->encrypt($password);
            
            $emailvalid = $this->emailchk($email);
        
        if($emailvalid == true){
            $mdata['loginmsg'] =	'<span style="color: red;font-weight: bold;">Email Already Exist</span>';
		    header("Location:user?msg=".urlencode(serialize($mdata)));
        }else{
            
			$data = array(
				'username'     => $name,
				'city' => $city,
				'zip' => $zip,
				'email'    => $email,
				'address'    => $address,
				'country'    => $country,
				'phone'    => $phone,
				'password'            => $encrypt
			);
			$table ="users";
            $insert = $Model->insertdata($data,$table);
			if($insert == '1'){
			    $rand = rand();
                Session::set("confirmation-code",$rand);
            	$to      = $email;
                $subject = 'Confirmation Code';
                $message = 'Your confirmation code is:<br><h2><Span style="text-align:center;border:1px solid #ccc;font-weight:bold">'.Session::get("confirmation-code").'</h2></span>';
                
                $mail = $this->sendmail($to, $subject, $message);
                
			    $profile = array(
        		'table'			 => array('table' => 'users'),
        		'pkey'			 => array('pkey' => 'userid'),
        		'selectcond' => array('select' => 'userid'),
        		'orderby'	   => array('order' => 'DESC'),
        		'limit' 	 => array('start' => 1),
        		'wherecond'=> array('where' =>array('verify' => 0))
        	);

	        $user = $Model->fetchdata($profile);
	        foreach($user as $value){
	            $userid = $value['userid'];
	        }
	        Session::set("emailverify",$email);
	        Session::set("idverify",$userid);
	        if($mail){
			    $this->confirm($email,$userid);
	        }
			
			}else{
				header("Location:".BASE."/User/user");
			}
            }
			
		}else{
			 $mdata['msg'] =	'<span style="color: red;font-weight: bold;">Field Must Not Be Empty</span>';
			header("Location:user?msg=".urlencode(serialize($mdata)));
		}
        
		
	}
	}
	
	public function profile(){
	    Session::chkuser();
	    $this->header();

		$Model = $this->load->model("Madmin");
	    
	   $profile = array(
		'table'			 => array('table' => 'users'),
		//'pkey'			 => array('pkey' => 'userid'),
		'selectcond' => array('select' => '*'),
		//'orderby'	   => array('order' => 'DESC'),
		//'limit' 	 => array('start' => 2,'limit' => 3),
		'wherecond'=> array('where' =>array('userid' => Session::get("userid"),'verify' => '1'))
	);

	 $data["profile"] = $Model->fetchdata($profile);
	    
	    $this->load->view("profile",$data);
	    $this->load->view("inc/footer");
	}
	public function edit(){
	    $this->header();
	    
	    $Model = $this->load->model("Madmin");
	    
	   $profile = array(
		'table'			 => array('table' => 'users'),
		//'pkey'			 => array('pkey' => 'userid'),
		'selectcond' => array('select' => '*'),
		//'orderby'	   => array('order' => 'DESC'),
		//'limit' 	 => array('start' => 2,'limit' => 3),
		'wherecond'=> array('where' =>array('userid' => Session::get("userid"), 'verify' => '1'))
	);

	 $data["profile"] = $Model->fetchdata($profile);
	    
	    $this->load->view("edit-profile",$data);
	    $this->load->view("inc/footer");
	}
	public function update(){
	    Session::chkuser();
	    if(!($_POST)){
			header("Location: ".BASE."/User/profile");
		}else{
$input = $this->load->valid("Validation");

		$input->post("name")
		            ->isempty()
					->schar();
		$input->post("city")
					->schar()
					->isempty();
		$input->post("zip")
					->schar()
					->isempty();
		$input->post("email")
					->schar()
					->isempty();
		$input->post("address")
					->schar()
					->isempty();
		$input->post("country")
					->schar()
					->isempty();
		$input->post("phone")
					->schar()
					->isempty();


			$mdata = array();
			$table = "users";
			$pkey = "userid";

			if($input->submit()){

				$name     = $input->value["name"];
			$city      = $input->value["city"];
			$zip      = $input->value["zip"];
			$address    = $input->value["address"];
			$country    = $input->value["country"];
			$phone    = $input->value["phone"];

			$data = array(
				'username'     => $name,
				'city' => $city,
				'zip' => $zip,
				'address'    => $address,
				'country'    => $country,
				'phone'    => $phone
			);
            $id = Session::get('userid');
				$Model = $this->load->model('Madmin');
				$update = $Model->updatedata($table,$data,$pkey,$id);

				if($update == '1'){
					header("Location:".BASE."/User/profile");
				}else{
					header("Location:".BASE."/User/profile");
				}
			}else{
				header("Location:".BASE."/User/profile");
			}
		 }
	}
	
	public function findacc(){
            $this->header();
            
        			if(!empty($_GET['msg'])){
        				$msg = $_GET['msg'];
        				$msg = unserialize(urldecode($msg));
        				foreach($msg as $key => $val){
        					echo $val;
        				}
        			}
    	    echo '
    	     <form style="margin:50px" method="post" action="sendcode">
             <fieldset>
              <legend>Your Email</legend>
              <input name="email" type="email">
              <input type="submit" class="buysubmit" name="submit" value="confirm">
             </fieldset>
            </form>
    	    ';
	        $this->load->view("inc/footer");
	    
	}
	
	public function sendcode(){
	    if(!($_POST)){
			header("Location:".BASE."/User/");
		}else{
            $this->header();
            $email = $_POST['email'];
            if($email == ''){
                $mdata['msg'] =	'<span style="color: red;font-weight: bold;">Field Must Not Be Empty</span>';
			    header("Location:findacc?msg=".urlencode(serialize($mdata)));
            }else{
            
            $emailchk = $this->emailchk($email);
            
            if($emailchk == true){
            
            $rand = rand();
            Session::set("confirmation-code",$rand);
        	$to      = $email;
            $subject = 'Confirmation Code';
            $message = 'Your confirmation code is:<br><h2><Span style="text-align:center;border:1px solid #ccc;font-weight:bold">'.Session::get("confirmation-code").'</h2></span>';
            
            $mail = $this->sendmail($to, $subject, $message);
            
			if(!empty($_GET['msg'])){
				$msg = $_GET['msg'];
				$msg = unserialize(urldecode($msg));
				foreach($msg as $key => $val){
					echo $val;
				}
			}
    	    echo '
    	     <form style="margin:50px" method="post" action="newpass">
             <fieldset>
              <legend>confirmation code</legend>
              <input name="vcode" type="text">
              <input name="email" type="hidden" value="'.$email.'">
              <input type="submit" class="buysubmit" name="submit" value="confirm">
             </fieldset>
            </form>
    	    ';
	        $this->load->view("inc/footer");
		}else{
		    $mdata['msg'] =	'<span style="color: red;font-weight: bold;">Email Not Found</span>';
			header("Location:findacc?msg=".urlencode(serialize($mdata)));
		}
            }
		}
	}
	
	public function newpass(){
	    if(!($_POST)){
			header("Location:".BASE."/User/");
		}else{
		    
	    $vcode = $_POST['vcode'];
	    $email = $_POST['email'];
	    
	    if($vcode == ''){
	        $mdata['msg'] =	'<span style="color: red;font-weight: bold;">Field Must Not Be Empty</span>';
			header("Location:findacc?msg=".urlencode(serialize($mdata)));
	    }else{
	    if(Session::get('confirmation-code') == $vcode){
	        $this->header();
	        echo '
    	     <form style="margin:50px" method="post" action="changepass">
             <fieldset>
              <legend>change Password</legend>
              <input name="pass" type="password">
              <input name="email" type="hidden" value="'.$email.'">
              <input type="submit" class="buysubmit" name="submit" value="confirm">
             </fieldset>
            </form>
    	    ';
    	    $this->load->view("inc/footer");
	    }else{
			$mdata['msg'] =	'<span style="color: red;font-weight: bold;">Confirmation code didnt match</span>';
			header("Location:findacc?msg=".urlencode(serialize($mdata)));
	    }
		}
		}
	}
	
	public function changepass(){
	    
	    $password = $_POST['pass'];
	    $email = $_POST['email'];
	    $id = $email;
	    if($password == ''){
	        $mdata['msg'] =	'<span style="color: red;font-weight: bold;">Field must not be empty</span>';
			header("Location:findacc?msg=".urlencode(serialize($mdata)));
	    }else{
	    $Model = $this->load->model('Madmin');
	    $encrypt  = $Model->encrypt($password);
	    $table = 'users';
	        $pkey = 'email';
	        $data = array(
				'password'  => $encrypt,
				'verify'    => 1
			);
			
			$update = $Model->updatedata($table,$data,$pkey,$id);
			if($update){
			    session_destroy();
		        session_unset();
    	        $mdata['msg'] =	'<span style="color: green;font-weight: bold;">Password Changed Successfull</span>';
    			header("Location: user?loginmsg=".urlencode(serialize($mdata)));
    			
			}else{
			    echo "Account Havent verified";
			}
	    }
	}
	
	
	public function contact(){
	    $this->header();
	    $this->load->view("contact");
	    $this->load->view("inc/footer");
	}
	public function sendmsg(){
	    if(!($_POST)){
			header("Location:".BASE."/User/contact");
		}else{

		$input = $this->load->valid("Validation");

		$input->post("name")
		            ->isempty()
					->schar();
		$input->post("email")
					->schar()
					->isempty();
		$input->post("sub")
					->schar()
					->isempty();
		$input->post("msg")
					->schar()
					->isempty();

		$mdata = array();
        
		if($input->submit()){

			$name     = $input->value["name"];
			$email      = $input->value["email"];
			$sub      = $input->value["sub"];
			$msg    = $input->value["msg"];

			$data = array(
				'name'     => $name,
				'email' => $email,
				'subject' => $sub,
				'message'    => $msg
			);
			$table ="mail";
			$Model = $this->load->model('Madmin');
			$insert = $Model->insertdata($data,$table);

			if($insert == '1'){
				header("Location:".BASE."/User/contact");
			}else{
				header("Location:".BASE."/User/contact?msg=wrong");
			}
			
		}else{
			 header("Location:".BASE."/User/contact?msg=validate");
		}
		}
	}
	
	public function sendmail($to,$sub,$message){
	    $mail = new PHPMailer(true);
        try {
            $mail->AddAddress($to , 'client');
            $mail->SetFrom(mail, 'Developer');
            $mail->AddReplyTo('safayatmahmud.99@gmail.com',"Developer");
            
            
            $mail->Subject = $sub;
            $mail->Body = $message;
            $mail->IsHTML(true);
          if($mail->Send()){
           return true;   
          }
        } catch (phpmailerException $e) {
          echo $e->errorMessage(); //Pretty error messages from PHPMailer
        } catch (Exception $e) {
          echo $e->getMessage(); //Boring error messages from anything else!
        }
        
        //echo !extension_loaded('openssl')?"Not Available":"Available";
        
        //https://www.google.com/settings/security/lesssecureapps
	}
	
}