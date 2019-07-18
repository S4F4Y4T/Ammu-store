<?php
class Admin extends Mcontroller{
	public function __construct(){
		parent::__construct();
	}

	public function Index(){
		$this->login();
	}

	public function header(){
     $data = array();
     $count = array(
      'table'			 => array('table' => 'mail'),
      'pkey'			 => array('pkeys' => 'id'),
      'selectcond' => array('count' => 'COUNT(*)'),
      'orderby' 	 => array('order' => 'DESC'),
      //'limit' 	 => array('start' => 2,'limit' => 3),
      'wherecond'=> array('where' => array('seen' => 0))
    );

    $image = array(
      'table'			 => array('table' => 'login'),
      'selectcond' => array('select' => '*'),
    );

    $Model   	  	= $this->load->model("Madmin");

    $data["count"] = $Model->fetchdata($count);
    $data["image"] = $Model->fetchdata($image);

   $this->load->view("admin/inc/header",$data);
 }

 public function footer(){
   $this->load->view("admin/inc/footer");
 }

	public function login($data = NULL){
		Session::init();
		Session::chklogin();
		$this->load->view("admin/login",$data);
	}

	public function loginAuth(){
		if(!($_POST)){
			header("Location:".BASE."/Admin/login");
		}else{
		$input = $this->load->valid("Validation");

		$input->post("username")
					->schar()
					->isempty()
					->lengh();

		$input->post("password")
					->schar()
					->isempty()
					->lengh();

		if($input->submit()){

		$Model = $this->load->model('Madmin');

		$username = $input->value['username'];
		$password = $input->value['password'];
		$encrypt  = $Model->encrypt($password);

		$data = array(
			'table'			 => array('table' => 'login'),
			//'pkey'			 => array('pkeys' => 'id'),
			'selectcond' => array('count' => 'COUNT(*)'),
			//'orderby' 	 => array('order' => 'DESC'),
			'limit' 	 => array('start' => 1),
			'wherecond'=> array('where' => array('username' => $username,'password' => $encrypt))
		);

		$login = $Model->fetchdata($data);

		foreach($login as $value){

		if($value[0] > 0){
			Session::init();
			Session::set("login", true);
			header("Location:".BASE."/Admin/panel");

		}else{
			$data['msg'] = "Username Or Password Is Incorrect";
			$this->load->view("admin/login",$data);
		}
		}
	}else{
		$data['msg'] = "Field Must Not Be Empty";
		$this->load->view("admin/login",$data);
	}
}
	}

	public function panel(){
		$data = array(
		 'TableMain'		 => array('TableMain' => 'product'),
		 'Tablea'			   => array('Tablea'    => 'category'),
		 //'Tableb'			 => array('Tableb'    => 'brand'),
		 'Tablec'			 => array('Tablec'    => 'subcat'),

		 'Mainconda'			   => array('Mainconda' => 'category'),
		 //'Maincondb'			 => array('Maincondb' => 'brand'),
		 'Maincondc'			 => array('Maincondc' => 'subcategory'),

		 'Conda'			   => array('Conda' => 'catid'),
		 //'Condb'			 => array('Condb' => 'brandid'),
		 'Condc'			 => array('Condc' => 'subid'),

		 'selectcond' => array('select' => '*'),
		 'orderby'	  => array('order'  => 'DESC'),
		 'pkey'       => array('pkey'   => 'id'),
		 'limit' 	  => array('start'  => 0,'limit' => 8),
		 //'wherecond'=> array('where'  =>array('subid' => '1'))
	 );
	 $order = array(
		 'TableMain'		 => array('TableMain' => 'orders'),
		 'Tablea'			   => array('Tablea'    => 'product'),
		 //'Tableb'			 => array('Tableb'    => 'brand'),
		 //'Tablec'			 => array('Tablec'    => 'subcat'),

		 'Mainconda'			   => array('Mainconda' => 'pid'),
		 //'Maincondb'			 => array('Maincondb' => 'brand'),
		 //'Maincondc'			 => array('Maincondc' => 'subcategory'),

		 'Conda'			   => array('Conda' => 'id'),
		 //'Condb'			 => array('Condb' => 'brandid'),
		 //'Condc'			 => array('Condc' => 'subid'),

		 'selectcond' => array('select' => '*'),
		 'orderby'	  => array('order'  => 'DESC'),
		 'pkey'       => array('pkey'   => 'id'),
		 'limit' 	  => array('start'  => 0,'limit' => 5),
		 //'wherecond'=> array('where'  =>array('subid' => '1'))
	 );
	 $user = array(
			'table'			 => array('table' => 'users'),
			'pkey'			 => array('pkey' => 'userid'),
			'selectcond' => array('select' => '*'),
			'orderby'	   => array('order' => 'DESC'),
			'limit' 	 => array('start' => 0,'limit' => 4)
			//'wherecond'=> array('where' =>array('catid' => 156))
		);
		$money = array(
			'table'			 => array('table' => 'payment'),
			//'pkey'			 => array('pkey' => 'userid'),
			'selectcond' => array('select' => 'SUM(paid_amount)'),
			//'orderby'	   => array('order' => 'DESC'),
			//'limit' 	 => array('start' => 0,'limit' => 4)
			//'wherecond'=> array('where' =>array('catid' => 156))
		);
        
        $pcount = array(
			'table'			 => array('table' => 'product'),
			//'pkey'			 => array('pkey' => 'userid'),
			'selectcond' => array('count' => 'COUNT(*)'),
			//'orderby'	   => array('order' => 'DESC'),
			//'limit' 	 => array('start' => 0,'limit' => 5)
			//'wherecond'=> array('where' =>array('catid' => 156))
		);
		$ucount = array(
			'table'			 => array('table' => 'users'),
			//'pkey'			 => array('pkey' => 'userid'),
			'selectcond' => array('count' => 'COUNT(*)'),
			//'orderby'	   => array('order' => 'DESC'),
			//'limit' 	 => array('start' => 0,'limit' => 5)
			//'wherecond'=> array('where' =>array('catid' => 156))
		);
		$ocount = array(
			'table'			 => array('table' => 'orders'),
			//'pkey'			 => array('pkey' => 'userid'),
			'selectcond' => array('count' => 'COUNT(*)'),
			//'orderby'	   => array('order' => 'DESC'),
			//'limit' 	 => array('start' => 0,'limit' => 5)
			//'wherecond'=> array('where' =>array('cat' => 156))
		);
		$Model   	  	   = $this->load->model("Madmin");
		$data["product"] = $Model->join($data);
		$data["order"] = $Model->join($order);
		$data["user"] = $Model->fetchdata($user);
		
		$data["money"] = $Model->fetchdata($money);
		$data["pcount"] = $Model->fetchdata($pcount);
		$data["ucount"] = $Model->fetchdata($ucount);
		$data["ocount"] = $Model->fetchdata($ocount);

		$this->header();
		$this->load->view("admin/index",$data);
		$this->footer();
	}

	public function changepass(){
		$data = array(
			'table'			 => array('table' => 'login'),
			'pkey'			 => array('pkey' => 'id'),
			'selectcond' => array('select' => '*'),
			'orderby'	   => array('order' => 'DESC'),
			'limit' 	 => array('start' => 1)
			//'wherecond'=> array('where' =>array('catid' => 156))
		);

		$Model    = $this->load->model("Madmin");
		$data["cpass"] = $Model->fetchdata($data);

		$this->header();
		$this->load->view("admin/changepass",$data);
		$this->footer();
	}

	public function updatepass($img){
		if(!($_POST)){
			header("Location:".BASE."/Admin/changepass");
		}else{
			$data = array(
				'table'			 => array('table' => 'login'),
				'pkey'			 => array('pkey' => 'id'),
				'selectcond' => array('select' => '*'),
				'orderby'	   => array('order' => 'DESC'),
				'limit' 	 => array('start' => 1),
				//'wherecond'=> array('where' =>array('catid' => 156))
			);

		$filetmp	= $_FILES["img"]["tmp_name"];
		$filename   = $_FILES["img"]["name"];

		$Model    = $this->load->model("Madmin");
		$data["cpass"] = $Model->fetchdata($data);

		if(isset($data["cpass"])){
			foreach($data["cpass"] as $value){
				$oldpass = $value['password'];
				$id      = $value['id'];
			}
		}

		$div 	    = explode('.',$filename);
		$file_ext = strtolower(end($div));
		$uniq 	  = substr(md5(time()), 0 , 10).'.'.$file_ext;
		$upload   = imglocation.$uniq;

		$input = $this->load->valid("Validation");

		$input->validext($file_ext);

		$input->post("user")
					->schar()
					->isempty()
					->lengh();

		$input->post("oldpass")
					->schar()
					->isempty()
					->lengh();
		$input->post("newpass")
					->schar()
					->isempty()
					->lengh();
		$input->post("confirmpass")
					->schar()
					->isempty()
					->lengh();
		$input->files("img");

		if($input->submit()){

			$user     	 = $input->value["user"];
			$newpass     = $input->value["newpass"];
			$oldpassword = $input->value["oldpass"];
			$confirmpass = $input->value["confirmpass"];

			$newpass     = $Model->encrypt($newpass);
			$oldpassword = $Model->encrypt($oldpassword);
			$confirmpass = $Model->encrypt($confirmpass);

			$confirmchk = $this->check($newpass,$confirmpass);
			$oldchk  	  = $this->check($oldpassword,$oldpass);
			$newchk     = $this->check($oldpass,$newpass);


			if($newchk){
				$mdata['msg'] = '<div class="error"><span class="err">Error!</span>You Havent Change Anything Yet</div>';
				header("Location:".BASE."/Admin/changepass?msg=".urlencode(serialize($mdata)));
			}else{
			if($confirmchk){
				if($oldchk){

			unlink("H:/wamp/www/ecommerce/img/".base64_decode($img));
			move_uploaded_file($filetmp,$upload);

			$data = array(
				'username' => $user,
				'password' => $newpass,
				'image'	   => $uniq
			);
			$table = "login";
			$pkey  = "id";

			$updatepass = $Model->updatedata($table,$data,$pkey,$id);

			if($updatepass == '1'){
				$mdata['msg'] = '<div class="success"><span class="sccs">Success!</span>Password Updated Successfully</div>';

			}else{
				$mdata['msg'] = '<div class="error"><span class="err">Error!</span>Sorry There Was A Problem</div>';
			}
				header("Location:".BASE."/Admin/changepass?msg=".urlencode(serialize($mdata)));

			}else{
				$mdata['msg'] = '<div class="error"><span class="err">Error!</span>Old Password Didnt Match</div>';
				header("Location:".BASE."/Admin/changepass?msg=".urlencode(serialize($mdata)));
			}
			}else{
				$mdata['msg'] = '<div class="error"><span class="err">Error!</span>Confirm Password Didnt Match</div>';
				header("Location:".BASE."/Admin/changepass?msg=".urlencode(serialize($mdata)));
			}
			}
		}else{
			$mdata['msg'] = '<div class="error"><span class="err"></span>*Field Must Not Be Empty </br> *You Can Upload Only Jpg,jpeg,png,Gif File</div>';
			header("Location:Location:".BASE."/Admin/changepass?msg=".urlencode(serialize($mdata)));
		}
	}
	}
	public function check($oldpass = NULL ,$newpass = NULL){
		if($oldpass == $newpass){
			return true;
		}else{
			return false;
		}
	}

	public function logout(){
		Session::init();
		Session::set("login", false);
		Session::destroy();
		header("Location: ".BASE."/Admin/login");
	}
	
	public function users(){
	    $this->header();
	    
	    $data = array(
				'table'			 => array('table' => 'users'),
				'pkey'			 => array('pkey' => 'userid'),
				'selectcond' => array('select' => '*'),
				'orderby'	   => array('order' => 'DESC'),
				//'limit' 	 => array('start' => 1),
			    'wherecond'=> array('where' =>array('verify' => 1))
			);
			
		$Model    = $this->load->model("Madmin");
	    $data["user"]  = $Model->fetchdata($data);
	    
	    $this->load->view("admin/userlist",$data);
	    $this->footer();
	}
	
	public function viewuser($id = NULL){
	    $this->header();
	    
	    $data = array(
				'table'			 => array('table' => 'users'),
				'pkey'			 => array('pkey' => 'userid'),
				'selectcond' => array('select' => '*'),
				'orderby'	   => array('order' => 'DESC'),
				//'limit' 	 => array('start' => 1),
				'wherecond'=> array('where' =>array('userid' => base64_decode($id)))
			);
			
		$Model    = $this->load->model("Madmin");
	    $data["user"]  = $Model->fetchdata($data);
	    
	    $this->load->view("admin/viewuser",$data);
	    $this->footer();
	}
	
	public function orderlist(){
	    $this->header();
	    
	     $data = array(
    		'TableMain'		 => array('TableMain' => 'orders'),
    		'Tablea'			   => array('Tablea'    => 'product'),
    		'Tableb'			 => array('Tableb'    => 'users'),
    		//'Tablec'			 => array('Tablec'    => 'subcat'),
    
    		'Mainconda'			   => array('Mainconda' => 'pid'),
    		'Maincondb'			 => array('Maincondb' => 'uid'),
    		//'Maincondc'			 => array('Maincondc' => 'subcategory'),
    
    		'Conda'			   => array('Conda' => 'id'),
    		'Condb'			 => array('Condb' => 'userid'),
    		//'Condc'			 => array('Condc' => 'subid'),
    
    		'selectcond' => array('select' => '*'),
    		'orderby'	  => array('order'  => 'DESC'),
    		'pkey'       => array('pkey'   => 'orderid'),
    		//'limit' 	  => array('start'  => 0,'limit' => 2),
    		//'wherecond'=> array('where'  =>array('id' => base64_decode($id)))
    	  );
	    
	    $Model    = $this->load->model("Madmin");
	    $data["order"]  = $Model->join($data);
	    
	    $this->load->view("admin/orderlist",$data);
	    $this->footer();
	}
	public function process($orderid = NULL){
	    if(!($_POST)){
			header("Location: ".BASE."/Admin/orderlist");
		}else{
		    $input = $this->load->valid("Validation");

            $trans_id = $_POST['transid'];
			$input->post("process")
				  ->isempty();
				  
		    $mdata = array();
			$table = "orders";
			$pkey = "orderid";
            $id   = $orderid;
			if($input->submit()){

				$process     		= $input->value["process"];


				$data = array(
					'process'     => $process
				);

				$Model = $this->load->model('Madmin');
				$process = $Model->updatedata($table,$data,$pkey,base64_decode($id));

				if($process == '1'){
					$mdata['msg'] = '<div class="alert success"><span class="sccs">Success!</span>Product Updated Successfully</div>';
				}else{
					$mdata['msg'] = '<div class="alert error"><span class="err">Error!</span>Sorry There Was A Problem</div>';
				}
				header("Location:".BASE."/Admin/orderlist");
			}else{
				header("Location:".BASE."/Admin/orderlist");
			}
		}
	}
	
	public function deliverd($id){
	    $data = array(
            'table'			 => array('table' => 'orders'),
			//'choice'		 => array('single' => 'catid'),
			//'choice'		 => array('id' => '1','id' =>'2'),
			'wherecond'  => array('where' =>array('orderid' => base64_decode($id)))
		);
		
		$Model 	 = $this->load->model('Madmin');
		$delete = $Model->delete($data);
		
		if($delete == '1'){
			$mdata['msg'] = '<div class="alert success"><span class="sccs">Success!</span>Product Deleted Successfully</div>';
		}else{
			$mdata['msg'] = '<div class="alert error"><span class="err">Error!</span>Sorry There Was A Problem</div>';
		}
		header("Location:".BASE."/Admin/orderlist");
	}
}
?>
