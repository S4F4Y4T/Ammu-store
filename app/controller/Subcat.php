<?php
class Subcat extends Mcontroller{

 public function __construct(){
 	parent::__construct();
 }
	public function Index(){
		$this->sublist();
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

 public function sublist(){
   $data = array(
     'TableMain'		 => array('TableMain' => 'subcat'),
     'Tablea'			   => array('Tablea'    => 'category'),
     //'Tableb'			 => array('Tableb'    => 'brand'),
     //'Tablec'			 => array('Tablec'    => 'subcat'),

     'Mainconda'			   => array('Mainconda' => 'cat'),
     //'Maincondb'			 => array('Maincondb' => 'brand'),
     //'Maincondc'			 => array('Maincondc' => 'sub'),

     'Conda'			   => array('Conda' => 'catid'),
     //'Condb'			 => array('Condb' => 'brandid'),
     //'Condc'			 => array('Condc' => 'subid'),

     'selectcond' => array('select' => '*'),
     'orderby'	  => array('order'  => 'DESC'),
     'pkey'       => array('pkey'   => 'subid'),
     //'limit' 	  => array('start'  => 0,'limit' => 2),
     //'wherecond'=> array('where'  =>array('subid' => '1'))
   );

	$Model   	  	   = $this->load->model("Madmin");
	$data["subcat"]  = $Model->join($data);

	$this->header();
	$this->load->view("admin/sublist",$data);
	$this->footer();
 }

 public function addsubcat(){
   $data = array(
 		'table'			 => array('table' => 'category'),
 		'pkey'			 => array('pkey' => 'catid'),
 		'selectcond' => array('select' => '*'),
 		'orderby'	   => array('order' => 'DESC'),
 		//'limit' 	 => array('start' => 2,'limit' => 3),
 		//'wherecond'=> array('where' =>array('catid' => 153))
 	 );

	$Model   	  	     = $this->load->model("Madmin");
    $data["category"]    = $Model->fetchdata($data);


		$this->header();
		$this->load->view("admin/addsub",$data);
		$this->footer();
 }

  public function insertsub(){
    if(!($_POST)){
			header("Location: ".BASE."/Subcat/addsubcat");
		}else{
			$mdata = array();
			$table = "subcat";
			//$pkey  = "catid";

			$Model = $this->load->model('Madmin');
			$input 			= $this->load->valid("Validation");

			$input->post("cat")
				  ->schar()
				  ->isempty();
            $input->post("subcat")
				  ->schar()
				  ->isempty()
				  ->lengh();

			
			$category = $_POST['cat'];
			$subcat = $_POST['subcat'];

			if($input->submit()){

				$check = $this->check($table,$category,$subcat,$Model);

				if($check){
					$mdata['msg'] =	'<div class="alert error"><span class="err">Error!</span>Sorry This Sub Category Already Exists</div>';;
					header("Location:".BASE."/Subcat/addsubcat?msg=".urlencode(serialize($mdata)));
				}else{
					date_default_timezone_set('Asia/Dhaka');
					$date = date('Y-m-d h:i:s', time());

					$data = array(
						'cat' 		 	 => $category,
						'subcat'     => $subcat,
						'createDate' => $date,
						'updateDate' => ""
					);

					$addsubcat 	 = $Model->insertdata($data,$table);

					if($addsubcat == '1'){
						$mdata['msg'] = '<div class="alert success"><span class="err">success!</span>Sub Category Added Successfully</div>';
					}else{
						$mdata['msg'] = '<div class="alert error"><span class="err">Error!</span>Sorry There Was A Problem</div>';
					}

					header("Location:".BASE."/Subcat/sublist?msg=".urlencode(serialize($mdata)));
				}
		}else{
			$mdata['msg'] = $input->error;
			foreach($mdata as $key => $val){
			    foreach($val as $value){
			        $mdata['msg'] = '<div class="alert error">'.implode(',',$value).'</div>';
				    header("Location:".BASE."/Subcat?msg=".urlencode(serialize($mdata)));
			    }
			}
		}
		}
  }



	public function editsub($id = NULL){
    $data = array(
      'table'			 => array('table' => 'subcat'),
      //'pkey'		 => array('pkey' => 'catid'),
      'selectcond' => array('select' => '*'),
      //'orderby'  => array('order' => 'DESC'),
      //'limit'    => array('start' => 2,'limit' => 3),
      'wherecond'  => array('where' =>array('subid' => base64_decode($id)))
    );

    $cat = array(
  		'table'			 => array('table' => 'category'),
  		//'pkey'			 => array('pkey' => 'catid'),
  		'selectcond' => array('select' => '*'),
  		//'orderby'	   => array('order' => 'DESC'),
  		//'limit' 	 => array('start' => 2,'limit' => 3),
  		//'wherecond'=> array('where' =>array('catid' => base64_decode($cats)))
  	);

    $Model   	  	    = $this->load->model("Madmin");
    $data["subcat"]   = $Model->fetchdata($data);
    $data["cat"]      = $Model->fetchdata($cat);

    $this->header();
    $this->load->view("admin/editsub",$data);
    $this->footer();
	}

	public function updatesub($id = NULL,$cat = NULL){
    if(!($_POST)){
			header("Location: ".BASE."/Subcat/sublist");
		}else{
			$mdata = array();
			$table = "subcat";
			$pkey  = "subid";

			$Model  = $this->load->model('Madmin');
			$input 	= $this->load->valid("Validation");

			$input->post("cat")
				  ->schar()
				  ->isempty();
            $input->post("subcat")
				  ->schar()
				  ->isempty()
				  ->lengh();

			$category  = $input->value["cat"];
			$subcat    = $input->value["subcat"];

			if($input->submit()){

				$check = $this->check($table,$category,$subcat,$Model);

				if($check){
					$mdata['msg'] =	'<div class="alert error"><span class="err">Error!</span>Sorry This Sub Category Already Exists</div>';;
					header("Location:".BASE."/Subcat/editsub/".$id."/".$cat."?msg=".urlencode(serialize($mdata)));
				}else{
					date_default_timezone_set('Asia/Dhaka');
					$date = date('Y-m-d h:i:s', time());

					$data = array(
						'cat' 		 	 => $category,
						'subcat'     => $subcat,
						'updateDate' => $date
					);

					$subcat 	 = $Model->updatedata($table,$data,$pkey,base64_decode($id));

					if($subcat == '1'){
						$mdata['msg'] = '<div class="alert success"><span class="err">success!</span>Sub Category Added Successfully</div>';
					}else{
						$mdata['msg'] = '<div class="alert error"><span class="err">Error!</span>Sorry There Was A Problem</div>';
					}

					header("Location:".BASE."/Subcat/sublist?msg=".urlencode(serialize($mdata)));
				}
		}else{
			$$mdata['msg'] = $input->error;
			foreach($mdata as $key => $val){
			    foreach($val as $value){
			        $mdata['msg'] = '<div class="alert error">'.implode(',',$value).'</div>';
				    header("Location:".BASE."/Subcat?msg=".urlencode(serialize($mdata)));
			    }
			}
		}
		}
	}

  public function check($table,$category,$subcat,$Model){
    $data = array(
      'table'			 => array('table' => $table),
      'selectcond' => array('count' => 'COUNT(*)'),
      //'orderby'  => array('order' => 'DESC'),
      //'limit'  	 => array('start' => 2,'limit' => 3),
      'wherecond'  => array('where' => array('cat' => $category, 'subcat' => $subcat))
    );

    $count = $Model->fetchdata($data);

    foreach($count as $value){
      if($value[0] > 0){
        return true;
      }
    }
  }

	public function deletesub($id = NULL){
		$data = array(
            'table'			 => array('table' => 'subcat'),
			//'choice'		 => array('single' => 'catid'),
			//'choice'		 => array('id' => '1','id' =>'2'),
			'wherecond'  => array('where' =>array('subid' => base64_decode($id)))
		);
		$delpro = array(
            'table'			 => array('table' => 'product'),
			//'choice'		 => array('single' => 'catid'),
			//'choice'		 => array('id' => '1','id' =>'2'),
			'wherecond'  => array('where' =>array('subcategory' => base64_decode($id)))
		);
		
		$Model 	 = $this->load->model('Madmin');
		$delete = $Model->delete($data);
		$delpro = $Model->delete($delpro);

		if($delete == '1'){
		    $mdata['msg'] = '<div class="alert success"><span class="sccs">Success!</span>Sub Category Deleted Successfully</div>';
		}else{
			$mdata['msg'] = '<div class="alert error"><span class="err">Error!</span>Sorry There Was A Problem</div>';
		}
		header("Location:".BASE."/Subcat/sublist?msg=".urlencode(serialize($mdata)));
	}
}
?>
