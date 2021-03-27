<?php
	class Indexs extends Mcontroller{
		public function __construct(){
		    error_reporting(0);
		    Session::init();
			parent::__construct();
		}
		public function Index(){
			$this->home();
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
	
	public function error(){
	    $this->header();
	    echo '<h1 style="margin: 25%;font-size: 51px;font-weight: bold;color: red;">404 Page Not Found</h1>';
	    $this->load->view("inc/footer");
	}
	
	public function about(){
	    $this->header();
	    $this->load->view("aboutus");
	    $this->load->view("inc/footer");
	}

	public function home(){
		    $this->header();
		    
		$pcount = array(
          'table'			 => array('table' => 'product'),
          'pkey'			 => array('pkeys' => 'id'),
          'selectcond' => array('count' => 'COUNT(*)'),
          //'orderby'	   => array('order' => 'DESC'),
          //'limit' 	 => array('start' => 5 ,'limit' => 7),
          'wherecond'=> array('where' =>array('type' => 2))
        );
        $fcount = array(
          'table'			 => array('table' => 'product'),
          'pkey'			 => array('pkeys' => 'id'),
          'selectcond' => array('count' => 'COUNT(*)'),
          //'orderby'	   => array('order' => 'DESC'),
          //'limit' 	 => array('start' => 5 ,'limit' => 7),
          'wherecond'=> array('where' =>array('type' => 1))
        );
        $acount = array(
                	    'TableMain'		 => array('TableMain' => 'product'),
                		'Tablea'			   => array('Tablea'    => 'brand'),
                		//'Tableb'			 => array('Tableb'    => 'brand'),
                		//'Tablec'			 => array('Tablec'    => 'subcat'),
                
                		'Mainconda'			   => array('Mainconda' => 'brand'),
                		//'Maincondb'			 => array('Maincondb' => 'brand'),
                		//'Maincondc'			 => array('Maincondc' => 'subcategory'),
                
                		'Conda'			   => array('Conda' => 'brandid'),
                		//'Condb'			 => array('Condb' => 'brandid'),
                		//'Condc'			 => array('Condc' => 'subid'),
                
                		'selectcond' => array('count' => 'COUNT(*)'),
                		//'orderby'	  => array('id'  => 'ASC'),
                		//'pkey'       => array('pkey'   => 'brandid'),
                		//'limit' 	  => array('start'  => $astart,'limit' => $alast),
                		//'wherecond'=> array('where'  =>array('id' => base64_decode($id)))
                	);
                	
		    $Model   	  	    = $this->load->model("Madmin");
		    $data["acount"] = $Model->join($acount);
		    $alast = $data['acount'][0][0];
		    $plimit = $plast-4;
		    $alimit = $alast-3;
		    
		    
		    if($alimit <= 0){
		        $astart = 0;
		    }else{
		        $astart = $alast-4;
		    }
		    $top = array(
                		'TableMain'		 => array('TableMain' => 'brand'),
                		'Tablea'			   => array('Tablea'    => 'product'),
                		//'Tableb'			 => array('Tableb'    => 'brand'),
                		//'Tablec'			 => array('Tablec'    => 'subcat'),
                
                		'Mainconda'			   => array('Mainconda' => 'brandid'),
                		//'Maincondb'			 => array('Maincondb' => 'brand'),
                		//'Maincondc'			 => array('Maincondc' => 'subcategory'),
                
                		'Conda'			   => array('Conda' => 'brand'),
                		//'Condb'			 => array('Condb' => 'brandid'),
                		//'Condc'			 => array('Condc' => 'subid'),
                
                		'selectcond' => array('select' => '*'),
                		'orderby'	  => array('id'  => 'DESC'),
                		'pkey'       => array('pkey'   => 'brandid'),
                		'limit' 	  => array('start'  => $astart,'limit' => $alast),
                		//'wherecond'=> array('where'  =>array('id' => base64_decode($id)))
                	);
		    $data = array(
                    		'table'			 => array('table' => 'product'),
                    		'pkey'			 => array('pkey' => 'id'),
                    		'selectcond' => array('select' => '*'),
                    		'orderby'	   => array('order' => 'DESC'),
                    		'limit' 	 => array('start' => 0 ,'limit' => 5),
                    		'wherecond'=> array('where' =>array('type' => 2))
                    	);
            
            $feature = array(
                    		'table'			 => array('table' => 'product'),
                    		'pkey'			 => array('pkey' => 'id'),
                    		'selectcond' => array('select' => '*'),
                    		'orderby'	   => array('order' => 'DESC'),
                    		'limit' 	 => array('start' => 0,'limit' => 5),
                    		'wherecond'=> array('where' =>array('type' => 1))
                    	);
            $brand = array(
                    		'table'			 => array('table' => 'brand'),
                    		//'pkey'			 => array('pkey' => 'brandid'),
                    		'selectcond' => array('select' => '*'),
                    		//'orderby'	   => array('order' => 'DESC'),
                    		//'limit' 	 => array('start' => $pstart ,'limit' => $plast),
                    		//'wherecond'=> array('where' =>array('type' => 2))
                    	);
	
	$data["newpro"] = $Model->fetchdata($data);
	$data["topbrand"] = $Model->join($top);
	$data["feature"] = $Model->fetchdata($feature);
	$data["slide"] = $Model->fetchdata($brand);
	$data["pcount"] = $Model->fetchdata($pcount);
	$data["fcount"] = $Model->fetchdata($fcount);
	
	
	        $this->load->view("inc/slide",$data);
			$this->load->view("index",$data);
			$this->load->view("inc/footer");
		}
		
		
	public function details($id = NULL){
		$data = array(
		'TableMain'		 => array('TableMain' => 'product'),
		'Tablea'			   => array('Tablea'    => 'category'),
		'Tableb'			 => array('Tableb'    => 'brand'),
		'Tablec'			 => array('Tablec'    => 'subcat'),

		'Mainconda'			   => array('Mainconda' => 'category'),
		'Maincondb'			 => array('Maincondb' => 'brand'),
		'Maincondc'			 => array('Maincondc' => 'subcategory'),

		'Conda'			   => array('Conda' => 'catid'),
		'Condb'			 => array('Condb' => 'brandid'),
		'Condc'			 => array('Condc' => 'subid'),

		'selectcond' => array('select' => '*'),
		//'orderby'	  => array('order'  => 'DESC'),
		'pkey'       => array('pkey'   => 'id'),
		//'limit' 	  => array('start'  => 0,'limit' => 2),
		'wherecond'=> array('where'  =>array('id' => base64_decode($id)))
	);
	
	$category = array(
		'table'			 => array('table' => 'category'),
		'pkey'			 => array('pkey' => 'catid'),
		'selectcond' => array('select' => '*'),
		'orderby'	   => array('order' => 'DESC'),
		//'limit' 	 => array('start' => 2,'limit' => 3),
		//'wherecond'=> array('where' =>array('catid' => 156))
	);


	 $Model   	  	   = $this->load->model("Madmin");
	 $data["details"]  = $Model->join($data);
	 $data["category"] = $Model->fetchdata($category);
		    $this->header();
		    $this->load->view("preview",$data);
		    $this->load->view("inc/footer");
		}
		
	public function search(){
	    if(!($_POST)){
			header("Location:".BASE);
		}else{
		$input = $this->load->valid("Validation");

		$input->post("search")
					->schar()
					->isempty()
					->post();

		if($input->submit()){

			$q     = $input->value["search"];

			$data = array(
        		'table'			 => array('table' => 'product'),
        		//'pkey'			 => array('pkey' => 'catid'),
        		'selectcond' => array('select' => '*'),
        		//'orderby'	   => array('order' => 'DESC'),
        		//'limit' 	 => array('start' => 2,'limit' => 3),
        		'search'    => array('name' => $q),
        		'wherecond'=> array('where' =>array('name' => $q,'productDetails' => $q))
        	);
        	
			$Model = $this->load->model('Madmin');
			$data['product'] = $Model->fetchdata($data);

			$this->header();
			$this->load->view("products",$data);
			$this->load->view("inc/footer");
		}else{
			   header("Location:".BASE);
		}
	  }
	}
		
}
?>
