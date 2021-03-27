<?php
class Category extends Mcontroller{

 public function __construct(){
 	parent::__construct();
 }
	public function Index(){
		$this->catlist();
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

 public function catlist(){
	$data = array(
		'table'			 => array('table' => 'category'),
		'pkey'			 => array('pkey' => 'catid'),
		'selectcond' => array('select' => '*'),
		'orderby'	   => array('order' => 'DESC'),
		//'limit' 	 => array('start' => 2,'limit' => 3),
		//'wherecond'=> array('where' =>array('catid' => 156))
	);

	$Model   	  	    = $this->load->model("Madmin");
	$data["category"] = $Model->fetchdata($data);

	$this->header();
	$this->load->view("admin/catlist",$data);
	$this->footer();
 }

 public function addcategory(){
		$this->header();
		$this->load->view("admin/addcategory");
		$this->footer();
 }

	public function insertcategory(){
		if(!($_POST)){
			header("Location: ".BASE."/Category/addcategory");
		}else{
      $filetmp		= $_FILES["img"]["tmp_name"];
 		  $filename   = $_FILES["img"]["name"];

 		  $div	  = explode('.',$filename);

 		  $file_ext = strtolower(end($div));

 		  $uniq 	  = substr(md5(time()), 0 , 10).'.'.$file_ext;

 		  $upload   = imglocation.$uniq;


			$mdata = array();
			$table = "category";
			//$pkey  = "catid";

			$Model = $this->load->model('Madmin');
			$input 			= $this->load->valid("Validation");

			$input->post("category")
					  ->schar()
						->isempty()
						->lengh();
			$input->post("desc")
						->isempty()
						->lengh();

          $input->validext($file_ext);
 		  $input->files("img");

			$category  	 	= $input->value["category"];
			$description  = $input->value["desc"];

			if($input->submit()){

				$check = $this->check($table,$category,$Model);

				if($check){
					$mdata['msg'] =	'<div class="alert error"><span class="err">Error!</span>Sorry This Category Already Exists</div>';;
					header("Location:".BASE."/Category/addcategory?msg=".urlencode(serialize($mdata)));
				}else{
					date_default_timezone_set('Asia/Dhaka');
					$date = date('Y-m-d h:i:s', time());

					$data = array(
						'catname' 		 	 => $category,
						'catDescription' => $description,
						'creationDate' 	 => $date,
            'image'          => $uniq,
						'updationDate' 	 => ""
					);

          move_uploaded_file($filetmp,$upload);

					$category 	 = $Model->insertdata($data,$table);

					if($category == '1'){
						$mdata['msg'] = '<div class="alert success"><span class="err">success!</span>Category Added Successfully</div>';
					}else{
						$mdata['msg'] = '<div class="alert error"><span class="err">Error!</span>Sorry There Was A Problem</div>';
					}

					header("Location:".BASE."/Category/catlist?msg=".urlencode(serialize($mdata)));
				}
		}else{
			$mdata['msg'] = $input->error;
			foreach($mdata as $key => $val){
			    foreach($val as $value){
			        $mdata['msg'] = '<div class="alert error">'.implode(',',$value).'</div>';
				    header("Location:".BASE."/Category?msg=".urlencode(serialize($mdata)));
			    }
			}
		}
		}
	}

  public function catimg($id = NULL){
    $data = array(
      'table'			 => array('table' => 'category'),
      //'pkey'			 => array('pkeys' => 'id'),
      'selectcond' => array('select' => '*'),
      //'orderby' 	 => array('order' => 'DESC'),
      //'limit' 	 => array('start' => 2,'limit' => 3),
      'wherecond'=> array('where' => array('catid' => base64_decode($id)))
    );

   $Model   	  	   = $this->load->model("Madmin");
   $data["images"]   = $Model->fetchdata($data);

   $this->header();
   $this->load->view("admin/catimg",$data);
   $this->footer();
  }

  public function updatecatimg($img=NULL,$id=NULL){
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
	 	$table = "category";
	 	$pkey = "catid";

	 	if($input->submit()){

	 		unlink(imglocation.base64_decode($img));
	 		move_uploaded_file($filetmp,$upload);

	 		$data = array(
	 			'image' => $uniq
	 		);

	 		$Model = $this->load->model('Madmin');
	 		$updateprouct = $Model->updatedata($table,$data,$pkey,base64_decode($id));

	 		if($updateprouct == '1'){
	 			$mdata['msg'] = '<div class="alert success"><span class="sccs">Success!</span>Image Updated Successfully</div>';
	 		}else{
	 			$mdata['msg'] = '<div class="alert error"><span class="err">Error!</span>Sorry There Was A Problem</div>';
	 		}
	 		header("Location:".BASE."/Category/editcategory/".$id."?msg=".urlencode(serialize($mdata)));
	 	}else{
	 		$mdata['msg'] = $input->error;
			foreach($mdata as $key => $val){
			    foreach($val as $value){
			        $mdata['msg'] = '<div class="alert error">'.implode(',',$value).'</div>';
				    header("Location:".BASE."/Category?msg=".urlencode(serialize($mdata)));
			    }
			}
	 	}
  }

	public function editcategory($id = NULL){
		$data = array(
			'table'			 => array('table' => 'category'),
			//'pkey'		 => array('pkey' => 'catid'),
			'selectcond' => array('select' => '*'),
			//'orderby'  => array('order' => 'DESC'),
			//'limit'    => array('start' => 2,'limit' => 3),
			'wherecond'  => array('where' =>array('catid' => base64_decode($id)))
		);
		$Model   	  	= $this->load->model("Madmin");
		$data["category"] = $Model->fetchdata($data);

		$this->header();
		$this->load->view("admin/editcategory",$data);
		$this->footer();
	}

	public function updatecat($id = NULL){
		if(!($_POST)){
			header("Location:".BASE."/Category/catlist");
		}else{
			$mdata = array();
			$table = "category";
			$pkey  = "catid";

			$Model = $this->load->model('Madmin');
			$input = $this->load->valid("Validation");

			$input->post("category")
						->schar()
						->isempty()
						->lengh();
			$input->post("desc")
						->isempty()
						->lengh();

			$category  	 	= $input->value["category"];
			$description  = $input->value["desc"];

			if($input->submit()){

				$check = 	$this->check($table,$category,$Model)	;

				if($check){
					$mdata['msg'] =	'<div class="alert error"><span class="err">Error!</span>Sorry This Category Already Exists</div>';
					header("Location:".BASE."/Category/editcategory/".$id."?msg=".urlencode(serialize($mdata)));
				}else{
					date_default_timezone_set('Asia/Dhaka');
					$date = date('Y-m-d h:i:s', time());

					$data = array(
						'catname' 		 	 => $category,
						'catDescription' => $description,
						'updationDate' 	 => $date
					);

					$editcat 	 = $Model->updatedata($table,$data,$pkey,base64_decode($id));

					if($editcat == '1'){
						$mdata['msg'] = '<div class="alert success"><span class="err">success!</span>Category Updated Successfully</div>';
					}else{
						$mdata['msg'] = '<div class="alert error"><span class="err">Error!</span>Sorry There Was A Problem</div>';
					}

					header("Location:".BASE."/Category/catlist?msg=".urlencode(serialize($mdata)));
				}
		}else{
			$mdata['msg'] = $input->error;
			foreach($mdata as $key => $val){
			    foreach($val as $value){
			        $mdata['msg'] = '<div class="alert error">'.implode(',',$value).'</div>';
				    header("Location:".BASE."/Category?msg=".urlencode(serialize($mdata)));
			    }
			}
		}
		}
	}

		public function check($table,$category,$Model){
			$data = array(
				'table'			 => array('table' => $table),
				'selectcond' => array('count' => 'COUNT(*)'),
				//'orderby'  => array('order' => 'DESC'),
				//'limit'  	 => array('start' => 2,'limit' => 3),
				'wherecond'  => array('where' => array('catname' => $category))
			);

			$count = $Model->fetchdata($data);

			foreach($count as $value){
				if($value[0] > 0){
					return true;
				}
			}
		}

		public function deletecat($id = NULL){
		    $data = array(
				'table'			 => array('table' => 'category'),
				'selectcond' => array('select' => '*'),
				//'orderby'  => array('order' => 'DESC'),
				//'limit'  	 => array('start' => 2,'limit' => 3),
				'wherecond'  => array('where' => array('catid' => base64_decode($id)))
			);
            
            $Model 	 = $this->load->model('Madmin');
			$img = $Model->fetchdata($data);
			
			foreach($img as $value){
			    $image =  $value['image'];
			}
			unlink(imglocation.$image);
			
			$data = array(
            'table'			 => array('table' => 'category'),
			//'choice'		 => array('single' => 'catid'),
			//'choice'		 => array('id' => '1','id' =>'2'),
			'wherecond'  => array('where' =>array('catid' => base64_decode($id)))
		);
		
		$delpro = array(
            'table'			 => array('table' => 'product'),
			//'choice'		 => array('single' => 'catid'),
			//'choice'		 => array('id' => '1','id' =>'2'),
			'wherecond'  => array('where' =>array('category' => base64_decode($id)))
		);
		
		
		$delete = $Model->delete($data);
		$delpro = $Model->delete($delpro);

			if($delete == '1'){
			$mdata['msg'] = '<div class="alert success"><span class="sccs">Success!</span>Category Deleted Successfully</div>';
			}else{
				$mdata['msg'] = '<div class="alert error"><span class="err">Error!</span>Sorry There Was A Problem</div>';
			}
			header("Location:".BASE."/Category/catlist?msg=".urlencode(serialize($mdata)));
		}

}
?>
