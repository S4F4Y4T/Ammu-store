<?php
class Product extends Mcontroller{

	public function __construct(){
		parent::__construct();
	}

	public function Index(){
		$this->productlist();
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

	public function productlist(){
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
		//'limit' 	  => array('start'  => 0,'limit' => 2),
		//'wherecond'=> array('where'  =>array('subid' => '1'))
	);

	 $Model   	  	   = $this->load->model("Madmin");
	 $data["product"]  = $Model->join($data);

		$this->header();
		$this->load->view("admin/productlist",$data);
		$this->footer();
	}

	public function addproduct($mdata = NULL){
		$category = array(
			'table'	 	  => array('table' => 'category'),
			'pkey'		 	  => array('pkey' => 'catid'),
			'selectcond' => array('select' => '*'),
			'orderby'    => array('order' => 'DESC'),
			//'limit' 		=> array('start' => 2,'limit' => 3),
			//'wherecond'=> array('where' =>array('catid' => 153))
		);
		
		$brand = array(
			'table'	 	  => array('table' => 'brand'),
			'pkey'		 	  => array('pkey' => 'brandid'),
			'selectcond' => array('select' => '*'),
			'orderby'    => array('order' => 'DESC'),
			//'limit' 		=> array('start' => 2,'limit' => 3),
			//'wherecond'=> array('where' =>array('catid' => 153))
		);

	$Model   	  	     = $this->load->model("Madmin");
	$data["category"]  = $Model->fetchdata($category);
	$data["brand"] 		 = $Model->fetchdata($brand);

		$this->header();
		$this->load->view("admin/addproduct",$data);
		$this->footer();
	}

	public function insertproduct(){
		if(!($_POST)){
			header("Location:".BASE."/Product/addproduct");
		}else{
			$filetmp1		= $_FILES["img1"]["tmp_name"];
			$filename1   = $_FILES["img1"]["name"];

			$filetmp2		= $_FILES["img2"]["tmp_name"];
			$filename2   = $_FILES["img2"]["name"];

			$filetmp3		= $_FILES["img3"]["tmp_name"];
			$filename3   = $_FILES["img3"]["name"];

			$div1	  = explode('.',$filename1);
			$div2 	  = explode('.',$filename2);
			$div3	  = explode('.',$filename3);

			$file_ext1 = strtolower(end($div1));
			$file_ext2 = strtolower(end($div2));
			$file_ext3 = strtolower(end($div3));

			$uniq1 	  = substr(md5(time()), 0 , 10).'.'.$file_ext1;
			$uniq2 	  = substr(md5(time()), 1 , 10).'.'.$file_ext2;
			$uniq3 	  = substr(md5(time()), 2 , 10).'.'.$file_ext3;



			$upload1   = imglocation.$uniq1;
			$upload2   = imglocation.$uniq2;
			$upload3   = imglocation.$uniq3;


		$input = $this->load->valid("Validation");

		$input->validext($file_ext1);
		$input->validext($file_ext2);
		$input->validext($file_ext3);

		$input->post("name")
					->schar()
					->isempty()
					->lengh();
		$input->post("cat")
			  ->isempty();
		$input->post("subcat")
			  ->isempty();
		$input->post("brand")
			  ->isempty();
		$input->post("details")
			  ->isempty();
		$input->post("preprice")
			  ->isempty();
		$input->post("currentprice")
					->isempty();
		$input->post("availability")
			  ->isempty();
		$input->post("type")
			  ->isempty();
		$input->post("shipcharge")
			  ->isempty();
		$input->files("img1");
		$input->files("img2");
		$input->files("img3");

		$mdata = array();
		$table = "product";

		if($input->submit()){

			$name     = $input->value["name"];
			$cat      = $input->value["cat"];
			$sub      = $input->value["subcat"];
			$brand    = $input->value["brand"];
			$preprice    = $input->value["preprice"];
			$currentprice    = $input->value["currentprice"];
			$availability    = $input->value["availability"];
			$type    = $input->value["type"];
			$shipcharge    = $input->value["shipcharge"];
			$details  = $input->value["details"];

			move_uploaded_file($filetmp1,$upload1);
			move_uploaded_file($filetmp2,$upload2);
			move_uploaded_file($filetmp3,$upload3);

			date_default_timezone_set('Asia/Dhaka');
			$date = date('Y-m-d h:i:s', time());

			$data = array(
				'name'     => $name,
				'category' => $cat,
				'subcategory' => $sub,
				'brand'    => $brand,
				'price'    => $currentprice,
				'priceBeforeDiscount'    => $preprice,
				'availability'    => $availability,
				'type'            => $type,
				'shippingCharge'    => $shipcharge,
				'productDetails'  => $details,
				'image1'	   => $uniq1,
				'image2'	   => $uniq2,
				'image3'	   => $uniq3,
				'creationDate' => $date,
				'updationDate' => ""
			);
			$table ="product";
			$Model = $this->load->model('Madmin');
			$addproduct = $Model->insertdata($data,$table);

			if($addproduct == '1'){
				$mdata['msg'] = '<div class="alert success"><span class="sccs">Success!</span>Product Added Successfully</div>';
			}else{
				$mdata['msg'] = '<div class="alert error"><span class="err">Error!</span>Sorry There Was A Problem</div>';
			}
			header("Location:".BASE."/Product/productlist?msg=".urlencode(serialize($mdata)));
		}else{
			$mdata['msg'] = $input->error;
			foreach($mdata as $key => $val){
			    foreach($val as $value){
			        $mdata['msg'] = '<div class="alert error">'.implode(',',$value).'</div>';
				    header("Location:".BASE."/product/productlist?msg=".urlencode(serialize($mdata)));
			    }
			}
		}
		}
	}
	public function editproduct($id = NULL){
		$data = array(
				'table'	 	  => array('table' => 'product'),
				//'pkey'		 	  => array('pkey' => 'catid'),
				'selectcond' => array('select' => '*'),
				//'orderby'    => array('order' => 'DESC'),
				//'limit' 		=> array('start' => 2,'limit' => 3),
				'wherecond'=> array('where' =>array('id' => base64_decode($id)))
			);
		$category = array(
			'table'	 	  => array('table' => 'category'),
			'pkey'		 	  => array('pkey' => 'catid'),
			'selectcond' => array('select' => '*'),
			'orderby'    => array('order' => 'DESC'),
			//'limit' 		=> array('start' => 2,'limit' => 3),
			//'wherecond'=> array('where' =>array('catid' => 153))
		);
		$subcat = array(
			'table'	 	  => array('table' => 'subcat'),
			//'pkey'		 	  => array('pkey' => 'catid'),
			'selectcond' => array('select' => '*'),
			//'orderby'    => array('order' => 'DESC'),
			//'limit' 		=> array('start' => 2,'limit' => 3),
			//'wherecond'=> array('where' =>array('catid' => 153))
		);
		$brand = array(
			'table'	 	  => array('table' => 'brand'),
			'pkey'		 	  => array('pkey' => 'brandid'),
			'selectcond' => array('select' => '*'),
			'orderby'    => array('order' => 'DESC'),
			//'limit' 		=> array('start' => 2,'limit' => 3),
			//'wherecond'=> array('where' =>array('catid' => 153))
		);

	  $Model   	  	   	 = $this->load->model("Madmin");

    	$data["category"]  = $Model->fetchdata($category);
    	$data["subcat"]  	 = $Model->fetchdata($subcat);
    	$data["brand"]  	 = $Model->fetchdata($brand);
        $data["product"]   = $Model->fetchdata($data);



		$this->header();
		$this->load->view("admin/editproduct",$data);
		$this->footer();
	}

public function getdata(){
	if(!($_POST)){
		header("Location:".BASE."/Product/productlist");
	}else{
	$val  = $_POST['cat'];

	$subcat = array(
		'table'	 	  => array('table' => 'subcat'),
		//'pkey'		 	  => array('pkey' => 'catid'),
		'selectcond' => array('select' => '*'),
		//'orderby'    => array('order' => 'ASC')
		//'limit' 		=> array('start' => 2,'limit' => 3),
		'wherecond'=> array('where' =>array('cat' => 	$val ))
	);
	$Model   	  	= $this->load->model("Madmin");
	$data["sub"]  = $Model->subcat($subcat);
	
	$i = 0; foreach($data["sub"] as $value){ $i++; 
	    echo $result = "<option value='".$value['subid']."'>".$value['subcat']."</option>";
	}
}
}

	public function updateproduct($id){
		if(!($_POST)){
			header("Location: ".BASE."/Product/productlist");
		}else{

			$input = $this->load->valid("Validation");


			$input->post("name")
						->schar()
						->isempty()
						->lengh();

			$input->post("cat")
				  	->isempty();
			$input->post("subcat")
				  	->isempty();
			$input->post("brand")
				  	->isempty();
			$input->post("details")
						->isempty()
						->lengh();
			$input->post("preprice")
				  	->isempty();
		    $input->post("type")
			      ->isempty();
			$input->post("currentprice")
						->isempty();
			$input->post("availability")
				  	->isempty();
			$input->post("shipcharge")
				  	->isempty();

			$mdata = array();
			$table = "product";
			$pkey = "id";

			if($input->submit()){

				$name     		= $input->value["name"];
				$cat      		= $input->value["cat"];
				$sub      		= $input->value["subcat"];
				$brand    		= $input->value["brand"];
				$preprice   	= $input->value["preprice"];
				$type           = $input->value["type"];
				$currentprice = $input->value["currentprice"];
				$availability = $input->value["availability"];
				$shipcharge   = $input->value["shipcharge"];
				$details  		= $input->value["details"];

				date_default_timezone_set('Asia/Dhaka');
				$date = date('Y-m-d h:i:s', time());

				$data = array(
					'name'     => $name,
					'category' => $cat,
					'subcategory' => $sub,
					'brand'    => $brand,
					'type'      => $type,
					'price'    => $currentprice,
					'priceBeforeDiscount'    => $preprice,
					'availability'    => $availability,
					'shippingCharge'    => $shipcharge,
					'productDetails'  => $details,
					'updationDate' => $date
				);

				$Model = $this->load->model('Madmin');
				$updateprouct = $Model->updatedata($table,$data,$pkey,base64_decode($id));

				if($updateprouct == '1'){
					$mdata['msg'] = '<div class="alert success"><span class="sccs">Success!</span>Product Updated Successfully</div>';
				}else{
					$mdata['msg'] = '<div class="alert error"><span class="err">Error!</span>Sorry There Was A Problem</div>';
				}
				header("Location:".BASE."/Product/productlist?msg=".urlencode(serialize($mdata)));
			}else{
				$mdata['msg'] = $input->error;
    			foreach($mdata as $key => $val){
    			    foreach($val as $value){
    			        $mdata['msg'] = '<div class="alert error">'.implode(',',$value).'</div>';
    				    header("Location:".BASE."/product/productlist?msg=".urlencode(serialize($mdata)));
    			    }
    			}
			}
		 }
	 }
	 public function updatefrontimg($id = NULL){
		 $data = array(
			 'table'			 => array('table' => 'product'),
			 //'pkey'			 => array('pkeys' => 'id'),
			 'selectcond' => array('select' => '*'),
			 //'orderby' 	 => array('order' => 'DESC'),
			 //'limit' 	 => array('start' => 2,'limit' => 3),
			 'wherecond'=> array('where' => array('id' => base64_decode($id)))
		 );

		$Model   	  	   = $this->load->model("Madmin");
		$data["images"]  = $Model->fetchdata($data);

		$this->header();
		$this->load->view("admin/frontimage",$data);
		$this->footer();
	 }

	 public function updatefront($img = NULL,$id = NULL){
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
		 $table = "product";
		 $pkey = "id";

		 if($input->submit()){

            unlink(imglocation.base64_decode($img));

			 move_uploaded_file($filetmp,$upload);

			 $data = array(
				 'image1' => $uniq
			 );

			 $Model = $this->load->model('Madmin');
			 $updateprouct = $Model->updatedata($table,$data,$pkey,base64_decode($id));

			 if($updateprouct == '1'){
				 $mdata['msg'] = '<div class="alert success"><span class="sccs">Success!</span>Image Updated Successfully</div>';
			 }else{
				 $mdata['msg'] = '<div class="alert error"><span class="err">Error!</span>Sorry There Was A Problem</div>';
			 }
			 header("Location:".BASE."/Product/editproduct/".$id."?msg=".urlencode(serialize($mdata)));
		 }else{
			 $mdata['msg'] = $input->error;
    			foreach($mdata as $key => $val){
    			    foreach($val as $value){
    			        $mdata['msg'] = '<div class="alert error">'.implode(',',$value).'</div>';
    				    header("Location:".BASE."/product/productlist?msg=".urlencode(serialize($mdata)));
    			    }
    			}
		 }
		}
		public function updatesideimg($id){
 		 $data = array(
 			 'table'			 => array('table' => 'product'),
 			 //'pkey'			 => array('pkeys' => 'id'),
 			 'selectcond' => array('select' => '*'),
 			 //'orderby' 	 => array('order' => 'DESC'),
 			 //'limit' 	 => array('start' => 2,'limit' => 3),
 			 'wherecond'=> array('where' => array('id' => base64_decode($id)))
 		 );

 		$Model   	  	   = $this->load->model("Madmin");
 		$data["images"]  = $Model->fetchdata($data);

 		$this->header();
 		$this->load->view("admin/sideimage",$data);
 		$this->footer();
 	 }

	 public function updateside($img,$id){
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
	 	$table = "product";
	 	$pkey = "id";

	 	if($input->submit()){

	 		unlink(imglocation.base64_decode($img));
	 		move_uploaded_file($filetmp,$upload);

	 		$data = array(
	 			'image2' => $uniq
	 		);

	 		$Model = $this->load->model('Madmin');
	 		$updateprouct = $Model->updatedata($table,$data,$pkey,base64_decode($id));

	 		if($updateprouct == '1'){
	 			$mdata['msg'] = '<div class="alert success"><span class="sccs">Success!</span>Image Updated Successfully</div>';
	 		}else{
	 			$mdata['msg'] = '<div class="alert error"><span class="err">Error!</span>Sorry There Was A Problem</div>';
	 		}
	 		header("Location:".BASE."/Product/editproduct/".$id."?msg=".urlencode(serialize($mdata)));
	 	}else{
	 		$mdata['msg'] = $input->error;
			foreach($mdata as $key => $val){
			    foreach($val as $value){
			        $mdata['msg'] = '<div class="alert error">'.implode(',',$value).'</div>';
				    header("Location:".BASE."/product/productlist?msg=".urlencode(serialize($mdata)));
			    }
			}
	 	}
	  }

		public function updatebackimg($id = NULL){
		 $data = array(
			 'table'			 => array('table' => 'product'),
			 //'pkey'			 => array('pkeys' => 'id'),
			 'selectcond' => array('select' => '*'),
			 //'orderby' 	 => array('order' => 'DESC'),
			 //'limit' 	 => array('start' => 2,'limit' => 3),
			 'wherecond'=> array('where' => array('id' => base64_decode($id)))
		 );

		$Model   	  	   = $this->load->model("Madmin");
		$data["images"]  = $Model->fetchdata($data);

		$this->header();
		$this->load->view("admin/backimg",$data);
		$this->footer();
		}

		public function updateback($img,$id){
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
		 $table = "product";
		 $pkey = "id";

		 if($input->submit()){

			 unlink(imglocation.base64_decode($img));
			 move_uploaded_file($filetmp,$upload);

			 $data = array(
				 'image3' => $uniq
			 );

			 $Model = $this->load->model('Madmin');
			 $updateprouct = $Model->updatedata($table,$data,$pkey,base64_decode($id));

			 if($updateprouct == '1'){
				 $mdata['msg'] = '<div class="alert success"><span class="sccs">Success!</span>Image Updated Successfully</div>';
			 }else{
				 $mdata['msg'] = '<div class="alert error"><span class="err">Error!</span>Sorry There Was A Problem</div>';
			 }
			 header("Location:".BASE."/Product/editproduct/".$id."?msg=".urlencode(serialize($mdata)));
		 }else{
			 $mdata['msg'] = $input->error;
    			foreach($mdata as $key => $val){
    			    foreach($val as $value){
    			        $mdata['msg'] = '<div class="alert error">'.implode(',',$value).'</div>';
    				    header("Location:".BASE."/product/productlist?msg=".urlencode(serialize($mdata)));
    			    }
    			}
		 }
		 }

	public function deleteproduct($id = NULL){
	    $data = array(
			 'table'			 => array('table' => 'product'),
			 //'pkey'			 => array('pkeys' => 'id'),
			 'selectcond' => array('select' => '*'),
			 //'orderby' 	 => array('order' => 'DESC'),
			 //'limit' 	 => array('start' => 2,'limit' => 3),
			 'wherecond'=> array('where' => array('id' => base64_decode($id)))
		 );

		$Model   	  	   = $this->load->model("Madmin");
		$image  = $Model->fetchdata($data);
		
		foreach($image as $value){
		    $img1 = $value['image1'];
		    $img2 = $value['image2'];
		    $img3 = $value['image3'];
		}
		unlink(imglocation.$img1);
		unlink(imglocation.$img2);
		unlink(imglocation.$img3);
		
    	$data = array(
                'table'			 => array('table' => 'product'),
    			//'choice'		 => array('single' => 'catid'),
    			//'choice'		 => array('id' => '1','id' =>'2'),
    			'wherecond'  => array('where' =>array('id' => base64_decode($id)))
    		);
		
		$delete = $Model->delete($data);
		
		if($delete == '1'){
			$mdata['msg'] = '<div class="alert success"><span class="sccs">Success!</span>Product Deleted Successfully</div>';
		}else{
			$mdata['msg'] = '<div class="alert error"><span class="err">Error!</span>Sorry There Was A Problem</div>';
		}
		header("Location:".BASE."/Product/productlist?msg=".urlencode(serialize($mdata)));
	}
}
?>
