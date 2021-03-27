<?php
class Brand extends Mcontroller{

	public function __construct(){
		parent::__construct();
	}
  public function Index(){
		$this->brandlist();
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
	
	public function brandlist(){
	 $data = array(
		 'table'	 	  => array('table' => 'brand'),
		 'pkey'		 	  => array('pkey' => 'brandid'),
		 'selectcond' => array('select' => '*'),
		 'orderby'    => array('order' => 'DESC'),
		 //'limit' 		=> array('start' => 2,'limit' => 3),
		 //'wherecond'=> array('where' =>array('catid' => 153))
	 );


	 $Model   	  	= $this->load->model("Madmin");
	 $data["brand"] = $Model->fetchdata($data);

   $this->header();
	 $this->load->view("admin/brandlist",$data);
	 $this->footer();
	}

	public function addbrand(){


		 $this->header();
		 $this->load->view("admin/addbrand");
		 $this->footer();
	}

	 public function insertbrand(){
		 if(!($_POST)){
			 header("Location: ".BASE."/Brand");
		 }else{
			  $filetmp		= $_FILES["img"]["tmp_name"];
				$filename   = $_FILES["img"]["name"];

				$div	  = explode('.',$filename);

				$file_ext = strtolower(end($div));

				$uniq 	  = substr(md5(time()), 0 , 10).'.'.$file_ext;

				$upload   = imglocation.$uniq;

			 $mdata = array();
			 $table = "brand";

			 $Model = $this->load->model('Madmin');
			 $input = $this->load->valid("Validation");

			 $input->post("brand")
						 ->schar()
						 ->isempty()
						 ->lengh();
			 $input->post("desc")
						 ->isempty()
						 ->lengh();
		  $input->validext($file_ext);
		  $input->files("img");

			 $brand  	  	= $input->value["brand"];
			 $description = $input->value["desc"];

			 if($input->submit()){

				 $check = $this->check($table,$brand,$Model);

				 if($check){
					 $mdata['msg'] =	'<div class="alert error"><span class="err">Error!</span>Sorry This Brand Already Exists</div>';;
					 header("Location:".BASE."/Brand/addbrand?msg=".urlencode(serialize($mdata)));
				 }else{
					 date_default_timezone_set('Asia/Dhaka');
					 $date = date('Y-m-d h:i:s', time());

					 $data = array(
						 'brandname' 	  => $brand,
						 'brandDesc'    => $description,
						 'creationDate' => $date,
						 'image'			  => $uniq,
						 'updationDate' => ""
					 );

					 move_uploaded_file($filetmp,$upload);

					 $brand 	 = $Model->insertdata($data,$table);

					 if($brand == '1'){
						 $mdata['msg'] = '<div class="alert success"><span class="err">success!</span>Brand Added Successfully</div>';
					 }else{
						 $mdata['msg'] = '<div class="aalert lert error"><span class="err">Error!</span>Sorry There Was A Problem</div>';
					 }

					 header("Location:".BASE."/Brand/brandlist?msg=".urlencode(serialize($mdata)));
				 }
		 }else{
			 $mdata['msg'] = $input->error;
			foreach($mdata as $key => $val){
			    foreach($val as $value){
			        $mdata['msg'] = '<div class="alert error">'.implode(',',$value).'</div>';
				    header("Location:".BASE."/brand?msg=".urlencode(serialize($mdata)));
			    }
			}
		 }
		 }
	 }

	 public function brandimg($id = NULL){
	   $data = array(
	     'table'			 => array('table' => 'brand'),
	     //'pkey'			 => array('pkeys' => 'id'),
	     'selectcond' => array('select' => '*'),
	     //'orderby' 	 => array('order' => 'DESC'),
	     //'limit' 	 => array('start' => 2,'limit' => 3),
	     'wherecond'=> array('where' => array('brandid' => base64_decode($id)))
	   );

	  $Model   	  	   = $this->load->model("Madmin");
	  $data["images"]   = $Model->fetchdata($data);

	  $this->header();
	  $this->load->view("admin/brandimg",$data);
	  $this->footer();
	 }

	 public function updatebrandimg($img=NULL,$id=NULL){
     $filetmp		= $_FILES["img"]["tmp_name"];
 	 	$filename   = $_FILES["img"]["name"];

 	 	$div	  = explode('.',$filename);

 	 	$file_ext = strtolower(end($div));

 	 	$uniq 	  = substr(md5(time()), 0 , 10).'.'.$file_ext;

 	 	$upload   = imglocation.$uniq;

 	 $input = $this->load->valid("Validation");

 	 $input->validext($file_ext);

 	 $input->files("img");

 	 	$mdata = array();
 	 	$table = "brand";
 	 	$pkey = "brandid";

 	 	if($input->submit()){

 	 		unlink(imglocation.base64_decode($img));
 	 		move_uploaded_file($filetmp,$upload);

 	 		$data = array(
 	 			'image' => $uniq
 	 		);

 	 		$Model = $this->load->model('Madmin');
 	 		$updatebrand = $Model->updatedata($table,$data,$pkey,base64_decode($id));

 	 		if($updatebrand == '1'){
 	 			$mdata['msg'] = '<div class="alert success"><span class="sccs">Success!</span>Image Updated Successfully</div>';
 	 		}else{
 	 			$mdata['msg'] = '<div class="alert error"><span class="err">Error!</span>Sorry There Was A Problem</div>';
 	 		}
 	 		header("Location:".BASE."/Brand/editbrand/".$id."?msg=".urlencode(serialize($mdata)));
 	 	}else{
 	 		$mdata['msg'] = $input->error;
			foreach($mdata as $key => $val){
			    foreach($val as $value){
			        $mdata['msg'] = '<div class="alert error">'.implode(',',$value).'</div>';
				    header("Location:".BASE."/brand?msg=".urlencode(serialize($mdata)));
			    }
			}
 	 	}
   }

	 public function editbrand($id = NULL){
		 $data = array(
			 'table'		 	=> array('table' => 'brand'),
			 //'pkey'		 	=> array('pkey' => 'catid'),
			 'selectcond' => array('select' => '*'),
			 //'orderby' 	=> array('order' => 'DESC'),
			 //'limit' 	 	=> array('start' => 2,'limit' => 3),
			 'wherecond' 	=> array('where' =>array('brandid' => base64_decode($id)))
		 );

		 $Model   	  	= $this->load->model("Madmin");
		 $data["brand"] = $Model->fetchdata($data);

		 $this->header();
		 $this->load->view("admin/editbrand",$data);
		 $this->footer();
	 }

		 public function updatebrand($id = NULL){
			 if(!($_POST)){
				 header("Location: ".BASE."/Brand");
			 }else{
				 $mdata = array();
				 $table = "brand";
				 $pkey  = "brandid";

				 $Model = $this->load->model('Madmin');
				 $input = $this->load->valid("Validation");

				 $input->post("brand")
							 ->schar()
							 ->isempty()
							 ->lengh();
				 $input->post("desc")
							 ->isempty()
							 ->lengh();

				 $brand  	 		= $input->value["brand"];
				 $description = $input->value["desc"];

				 if($input->submit()){

					 $check = 	$this->check($table,$brand,$Model)	;

					 if($check){
						 $mdata['msg'] =	'<div class="alert error"><span class="err">Error!</span>Sorry This Brand Already Exists</div>';;
						 header("Location:".BASE."/Brand/editbrand/".$id."?msg=".urlencode(serialize($mdata)));
					 }else{
						 date_default_timezone_set('Asia/Dhaka');
						 $date = date('Y-m-d h:i:s', time());

						 $data = array(
							 'brandname' 		=> $brand,
							 'brandDesc' 	  => $description,
							 'updationDate' => $date
						 );

						 $editbrand 	 = $Model->updatedata($table,$data,$pkey,base64_decode($id));

						 if($editbrand == '1'){
							 $mdata['msg'] = '<div class="alert success"><span class="err">success!</span>Brand Updated Successfully</div>';
						 }else{
							 $mdata['msg'] = '<div class="alert error"><span class="err">Error!</span>Sorry There Was A Problem</div>';
						 }

						 header("Location:".BASE."/Brand/brandlist?msg=".urlencode(serialize($mdata)));
					 }
			 }else{
				 $mdata['msg'] = $input->error;
    			foreach($mdata as $key => $val){
    			    foreach($val as $value){
    			        $mdata['msg'] = '<div class="alert error">'.implode(',',$value).'</div>';
    				    header("Location:".BASE."/brand?msg=".urlencode(serialize($mdata)));
    			    }
    			}
			 }
		 }

		 public function check($table = NULL,$brand = NULL,$Model =NULL){
			 $data = array(
				 'table'		  => array('table' => $table),
				 'selectcond' => array('count' => 'COUNT(*)'),
				 //'orderby'  => array('order' => 'DESC'),
				 //'limit'    => array('start' => 2,'limit' => 3),
				 'wherecond'  => array('where' => array('brandname' => $brand))
			 );

			 $count = $Model->fetchdata($data);

			 foreach($count as $value){
				 if($value[0] > 0){
					 return true;
				 }
			 }
		 }

		 public function deletebrand($id = NULL){
		     $data = array(
				'table'			 => array('table' => 'brand'),
				'selectcond' => array('select' => '*'),
				//'orderby'  => array('order' => 'DESC'),
				//'limit'  	 => array('start' => 2,'limit' => 3),
				'wherecond'  => array('where' => array('brandid' => base64_decode($id)))
			);
            
            $Model 	 = $this->load->model('Madmin');
			$img = $Model->fetchdata($data);
			
			foreach($img as $value){
			    $image =  $value['image'];
			}
			unlink(imglocation.$image);
			
			 $data = array(
            'table'			 => array('table' => 'brand'),
			//'choice'		 => array('single' => 'catid'),
			//'choice'		 => array('id' => '1','id' =>'2'),
			'wherecond'  => array('where' =>array('brandid' => base64_decode($id)))
		);
		$delpro = array(
            'table'			 => array('table' => 'product'),
			//'choice'		 => array('single' => 'catid'),
			//'choice'		 => array('id' => '1','id' =>'2'),
			'wherecond'  => array('where' =>array('brand' => base64_decode($id)))
		);
		
		$delete = $Model->delete($data);
		$delpro = $Model->delete($delpro);

			 if($delete == '1'){
			 $mdata['msg'] = '<div class="alert success"><span class="sccs">Success!</span>Brand Deleted Successfully</div>';
			 }else{
				 $mdata['msg'] = '<div class="alert error"><span class="err">Error!</span>Sorry There Was A Problem</div>';
			 }
			 header("Location:".BASE."/Brand/brandlist?msg=".urlencode(serialize($mdata)));
		 }

 }
?>
