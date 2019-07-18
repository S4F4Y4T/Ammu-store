<?php
	class Cart extends Mcontroller{ 
		public function __construct(){
		    error_reporting(0);
		    Session::init();
			parent::__construct();
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
	
    public function cart(){
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
	    $data['count'] = $Model->fetchdata($cart);
	    
	    
	        $cart = array(
		'table'			 => array('table' => 'cart'),
		'pkey'			 => array('pkey' => 'cartid'),
		'selectcond' => array('select' => '*'),
		'orderby'	   => array('order' => 'DESC'),
		//'limit' 	 => array('start' => 2,'limit' => 3),
		'wherecond'=> array('where' =>array('sid' => $sid))
	);

	 $data["cart"] = $Model->fetchdata($cart);
		
        $this->header();
        $this->load->view("cart",$data);
        $this->load->view("inc/footer");
	        
	        
	    
    }	
    
    
    public function insertcart($id = NULL){
       if(!($_POST)){
           header("Location: ".BASE);
       }else{
            $sid = session_id();
			$input = $this->load->valid("Validation");
			$input->post("q")
			       ->number();
			if($input->submit()){
			     
			$quantity = $input->value['q'];
			
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
			'table'			 => array('table' => 'cart'),
			//'pkey'		 => array('pkey' => 'catid'),
			'selectcond' => array('count' => 'COUNT(*)'),
			//'orderby'  => array('order' => 'DESC'),
			//'limit'    => array('start' => 2,'limit' => 3),
			'wherecond'  => array('where' =>array('sid' => $sid, 'productid'=> base64_decode($id)))
		);
		$quan = array(
			'table'			 => array('table' => 'cart'),
			//'pkey'		 => array('pkey' => 'catid'),
			'selectcond' => array('select' => '*'),
			//'orderby'  => array('order' => 'DESC'),
			//'limit'    => array('start' => 2,'limit' => 3),
			'wherecond'  => array('where' =>array('sid' => $sid, 'productid'=> base64_decode($id)))
		);
		$val = $Model->fetchdata($check);
		$quan = $Model->fetchdata($quan);
		
		foreach($quan as $key => $value){
		    $q = $value['quantity']+$quantity;
		}
		
		if($val[0][0] > 0){
		    
			$table = "cart";
			$pkey  = "productid";

					$data = array(
						'quantity' 		 	 => $q
					);

					$upcart 	 = $Model->updatedata($table,$data,$pkey,base64_decode($id));

					if($upcart == '1'){
						header("Location: ".BASE.'/Cart/cart');
					}else{
						header("Location: ".BASE.'/Cart/cart?why');
					}
		    
		}else{
		 
		foreach($pro as $key => $val){
		    $name = $val['name'];
		    $price= $val['price'];
		    $image = $val['image1'];
		    $total = $quantity*$price;
		}
		
	    $data = array(
				'productid'     => base64_decode($id),
				'sid' => $sid,
				'productname' => $name,
				'quantity'    => $quantity,
				'price'    => $price,
				'image'   => $image,
				'total'   => $total
			);
		
			$table ="cart";
			$addcart = $Model->insertdata($data,$table);
			
        if($addcart == '1'){
            header("Location: ".BASE.'/Cart/cart');
            }
        }
			}else{
			    echo"<script>window.alert('value must be more than 0')</script>";
			    
			    header("Location: <script>history.go(-0)</script>");
			}
       }
       
       }
       
       public function upcart($id = NULL){
           if(!($_POST)){
			header("Location:".BASE."/Cart/cart");
		}else{
			$table = "cart";
			$pkey  = "cartid";

			$Model = $this->load->model('Madmin');
			$input = $this->load->valid("Validation");

			$input->post("quantity")
						->schar()
						->isempty();

			$quantity  	 	= $input->value["quantity"];

			if($input->submit()){



					$data = array(
						'quantity' 		 	 => $quantity
					);

					$upcart 	 = $Model->updatedata($table,$data,$pkey,base64_decode($id));

					if($upcart == '1'){
						header("Location: ".BASE.'/Cart/cart');
					}else{
						header("Location: ".BASE.'/Cart/cart');
					}
			
		}else{
			header("Location: ".BASE.'/Cart/cart');
		}
		}
       }
       
       public function delcart($id = NULL){
			Session::init();
            $sid = session_id();
            
            $data = array(
            'table'			 => array('table' => 'cart'),
			//'choice'		 => array('single' => 'catid'),
			//'choice'		 => array('id' => '1','id' =>'2'),
			'wherecond'  => array('where' =>array('sid' => $sid, 'cartid'=> base64_decode($id)))
		);
			$Model 	 = $this->load->model('Madmin');
			$delcart = $Model->delete($data);

			if($delcart == '1'){
			     header("Location: ".BASE.'/Cart/cart');
			}else{
				 header("Location: ".BASE.'/Cart/cart');
			}
       }
        
    
	}
       
       
       
    
?>