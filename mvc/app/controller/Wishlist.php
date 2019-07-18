<?php
	class Wishlist extends Mcontroller{ 
		public function __construct(){
		    error_reporting(0);
		    Session::init();
			parent::__construct();
			Session::chkuser();
		}
		public function Index(){
			$this->cart();
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
	
	public function list(){
	   $uid = Session::get("userid");
        $count = array(
		'table'			 => array('table' => 'wish'),
		//'pkey'			 => array('pkey' => 'cartid'),
		'selectcond' => array('count' => 'COUNT(*)'),
		//'orderby'	   => array('order' => 'DESC'),
		//'limit' 	 => array('start' => 2,'limit' => 3),
		'wherecond'=> array('where' =>array('uid' => $uid))
	);
	    $Model = $this->load->model("Madmin");
	    $data['count'] = $Model->fetchdata($count);
	    
	    
	        $wish = array(
		'table'			 => array('table' => 'wish'),
		'pkey'			 => array('pkey' => 'wishid'),
		'selectcond' => array('select' => '*'),
		'orderby'	   => array('order' => 'DESC'),
		//'limit' 	 => array('start' => 2,'limit' => 3),
		'wherecond'=> array('where' =>array('uid' => $uid))
	);

	 $data["wish"] = $Model->fetchdata($wish);
		
        $this->header();
        $this->load->view("wish",$data);
        $this->load->view("inc/footer");
	        
	       
	      
	}
	
	public function addwish($id = NULL){
            $uid = Session::get('userid');
			     
			
			$datas = array(
			'table'			 => array('table' => 'product'),
			//'pkey'		 => array('pkey' => 'catid'),
			'selectcond' => array('select' => '*'),
			//'orderby'  => array('order' => 'DESC'),
			//'limit'    => array('start' => 2,'limit' => 3),
			'wherecond'  => array('where' =>array('id' => base64_decode($id)))
		);
		$Model   	  	= $this->load->model("Madmin");
		$pro = $Model->fetchdata($datas);
		
		$check = array(
			'table'			 => array('table' => 'wish'),
			//'pkey'		 => array('pkey' => 'catid'),
			'selectcond' => array('count' => 'COUNT(*)'),
			//'orderby'  => array('order' => 'DESC'),
			//'limit'    => array('start' => 2,'limit' => 3),
			'wherecond'  => array('where' =>array('uid' => $uid, 'productid'=> base64_decode($id)))
		);
		$val = $Model->fetchdata($check);
		
		if($val[0][0] > 0){
		    
			header("Location: ".BASE.'/Wishlist/list');
		    
		}else{
		 
		foreach($pro as $key => $val){
		    $name = $val['name'];
		    $price= $val['price'];
		    $image = $val['image1'];
		    $brand= $val['brand'];
		    $details= $val['productDetails'];
		}
		
	    $data = array(
				'productid'     => base64_decode($id),
				'uid' => $uid,
				'name' => $name,
				'brand'    => $brand,
				'price'    => $price,
				'image'   => $image,
				'description'   => $details
			);
		
			$table ="wish";
			$addwish = $Model->insertdata($data,$table);
			
        if($addwish == '1'){
            header("Location: ".BASE.'/Wishlist/list');
            }else{
                echo "Something went wrong";
            }
        }
       
       }
       
       public function delwish($id = NULL){
           $uid = Session::get("userid");
            
            $data = array(
            'table'			 => array('table' => 'wish'),
			//'choice'		 => array('single' => 'catid'),
			//'choice'		 => array('id' => '1','id' =>'2'),
			'wherecond'  => array('where' =>array('uid' => $uid, 'wishid'=> base64_decode($id)))
		);
			$Model 	 = $this->load->model('Madmin');
			$delete = $Model->delete($data);

			if($delete == '1'){
			     header("Location: ".BASE.'/wishlist/list');
			}else{
				 header("Location: ".BASE.'/wishlist/list?=problem');
			}
       }
}