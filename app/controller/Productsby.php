<?php
	class Productsby extends Mcontroller{
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
	
	public function feature($page){
	    $this->header();
	    
	    if($page <= 0){
	        $page = 1;
	    }
	    $limit = 20;
	    $start = ($page - 1)*$limit;
	    
	    $feature = array(
                    		'table'			 => array('table' => 'product'),
                    		'pkey'			 => array('pkey' => 'id'),
                    		'selectcond' => array('select' => '*'),
                    		'orderby'	   => array('order' => 'DESC'),
                    		'limit' 	 => array('start' => $start,'limit' => $limit),
                    		'wherecond'=> array('where' =>array('type' => 1))
                    	);
        $count = array(
                    		'table'			 => array('table' => 'product'),
                    		'pkey'			 => array('pkey' => 'id'),
                    		'selectcond' => array('count' => 'COUNT(*)'),
                    		'orderby'	   => array('order' => 'DESC'),
                    		//'limit' 	 => array('start' => $fstart,'limit' => $flast),
                    		'wherecond'=> array('where' =>array('type' => 1))
                    	);
    	$Model   	  	    = $this->load->model("Madmin");
    	$data["product"] = $Model->fetchdata($feature);
    	$num = $Model->fetchdata($count);
	    
	    $this->load->view("products",$data);
	   
	   $this->pagination($page,$num,$limit);
	   
	    $this->load->view("inc/footer");
	}
	
	public function products($page){
	    $this->header();
	    
	    if($page <= 0){
	        $page = 1;
	    }
	    $limit = 20;
	    $start = ($page - 1)*$limit;
	    
	    $product = array(
                    		'table'			 => array('table' => 'product'),
                    		'pkey'			 => array('pkey' => 'id'),
                    		'selectcond' => array('select' => '*'),
                    		'orderby'	   => array('order' => 'DESC'),
                    		'limit' 	 => array('start' => $start,'limit' => $limit),
                    		'wherecond'=> array('where' =>array('type' => 2))
                    	);
        $count = array(
                    		'table'			 => array('table' => 'product'),
                    		'pkey'			 => array('pkey' => 'id'),
                    		'selectcond' => array('count' => 'COUNT(*)'),
                    		'orderby'	   => array('order' => 'DESC'),
                    		//'limit' 	 => array('start' => $fstart,'limit' => $flast),
                    		'wherecond'=> array('where' =>array('type' => 2))
                    	);
    	$Model   	  	    = $this->load->model("Madmin");
    	$data["product"] = $Model->fetchdata($product);
    	$num = $Model->fetchdata($count);
	    
	   $this->load->view("products",$data);
	   $this->pagination($page,$num,$limit); 
	   $this->load->view("inc/footer");
	}
	
	
	
	public function category($id = NULL){
	    $this->header();
	    $brand = array(
		'table'			 => array('table' => 'subcat'),
		'pkey'			 => array('pkey' => 'subid'),
		'selectcond' => array('select' => '*'),
		'orderby'	   => array('order' => 'DESC'),
		//'limit' 	 => array('start' => 0,'limit' => 4),
		'wherecond'=> array('where' =>array('cat' => base64_decode($id)))
	);
	$Model   	  	   = $this->load->model("Madmin");
	$data["brand"] = $Model->fetchdata($brand);
	$this->header(); 
	
	
	echo '<div class="main">
    <div class="content">';
    
    if(isset($data['brand'])){ foreach($data['brand'] as $value){ 
        
    	echo '<div class="content_top">
    		<div class="heading">
    		<h3>'; echo $value['subcat']; echo'</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">';
	

	
	    
	    $pro = array(
		'table'			 => array('table' => 'product'),
		//'pkey'			 => array('pkey' => 'brandid'),
		'selectcond' => array('select' => '*'),
		//'orderby'	   => array('order' => 'DESC'),
		'limit' 	 => array('start' => 0,'limit' => 5),
		'wherecond'=> array('where' =>array('subcategory' => $value['subid']))
	);
	$count = array(
		'table'			 => array('table' => 'product'),
		//'pkey'			 => array('pkey' => 'brandid'),
		'selectcond' => array('count' => 'COUNT(*)'),
		//'orderby'	   => array('order' => 'DESC'),
		//'limit' 	 => array('start' => 0,'limit' => 4),
		'wherecond'=> array('where' =>array('subcategory' => $value['subid']))
	);
	
	
		$data["product"] = $Model->fetchdata($pro);
	    $data["count"] = $Model->fetchdata($count);

        if($data["count"][0][0] == 0){
        	        echo '<span style="padding:5px;font-weight:bold;color:black;margin:5px">No product found</span>';
        	    }else{
        	if(isset($data["product"])){ foreach($data["product"] as $val){
        	    
        	    
        	    echo '<div class="grid_1_of_4 images_1_of_4">';
        				
            			echo '<a href="'; BASE; echo '/Indexs/details/'; echo base64_encode($value['id']); echo '">
					     <div class="image-box" style="background-image: url('; echo BASE; echo '/img/'; echo $val['image1']; echo'); background-position: center;background-repeat: no-repeat;background-size: cover;">
					        
					     </div> 
					   </a>';
            					 
            					 echo '<h2>'; echo $val['name']; echo '</h2>';
            					 echo '<p>'; $st = $val['productDetails'];
            							$st = substr($st, 0, 200);
            							echo $st; echo '</p>
            					 <p><span class="price">$'; echo $val['price']; echo '</span></p>
            				     <div class="button"><span><a href="'; echo BASE; echo '/Indexs/details/'; echo base64_encode($val['id']); echo '" class="details">Details</a></span></div>
        				</div>
        	';
                	}}
        	if($data["count"][0][0] > 5 ){
        	   echo "<span ><a style='float:right;color:#602D8D;padding:4px 8px;border:2px solid #ccc' href='"; echo BASE; echo "/Productsby/subproduct/"; echo base64_encode($val['category']); echo"/"; echo base64_encode($val['subcategory']); echo "'>see all</a></span>";
        	}else{ 
        	     NULL;
        	}
        
        	echo '</div>';
            }}}
	
    echo '</div>
 </div>
</div>
';
	    $this->load->view("brand",$data);
	    $this->load->view("inc/footer");
	
	}
	
	public function subproduct($cat = NULL,$sub = NULL,$page){
	    $this->header();
	    
	    if($page <= 0){
	        $page = 1;
	        header("Location: ".BASE."/Productsby/subproduct/".$cat."/".$sub."/".$page);
	    }
	    $limit = 2;
	    $start = ($page - 1)*$limit;
	    
	    $pro = array(
            		'table'			 => array('table' => 'product'),
            		'pkey'			 => array('pkey' => 'id'),
            		'selectcond' => array('select' => '*'),
            		'orderby'	   => array('order' => 'DESC'),
            		'limit' 	 => array('start' => $start,'limit' => $limit),
            		'wherecond'=> array('where' =>array('category' => base64_decode($cat), 'subcategory' => base64_decode($sub)))
                    	);
        $count = array(
            		'table'			 => array('table' => 'product'),
            		'pkey'			 => array('pkey' => 'id'),
            		'selectcond' => array('count' => 'COUNT(*)'),
            		'orderby'	   => array('order' => 'DESC'),
            		//'limit' 	 => array('start' => $fstart,'limit' => $flast),
            		'wherecond'=> array('where' =>array('category' => base64_decode($cat), 'subcategory' => base64_decode($sub)))
                    	);
    	$Model   	  	    = $this->load->model("Madmin");
    	$data["product"] = $Model->fetchdata($pro);
    	$num = $Model->fetchdata($count);
	    
	    $this->load->view("products",$data);
	    $this->pagination($page,$num,$limit);
	    $this->load->view("inc/footer");
	}
	
	public function brand(){
	    $this->header();
	    $brand = array(
		'table'			 => array('table' => 'brand'),
		'pkey'			 => array('pkey' => 'brandid'),
		'selectcond' => array('select' => '*'),
		//'orderby'	   => array('order' => 'DESC'),
		//'limit' 	 => array('start' => 0,'limit' => 4),
		//'wherecond'=> array('where' =>array('cat' => base64_decode($id)))
	);
	$Model   	  	   = $this->load->model("Madmin");
	$data["brand"] = $Model->fetchdata($brand);
	$this->header(); 
	
	
	echo '<div class="main">
    <div class="content">';
    
    if(isset($data['brand'])){ foreach($data['brand'] as $value){ 
        
    	echo '<div class="content_top">
    		<div class="heading">
    		<h3>'; echo $value['brandname']; echo'</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">';
	

	
	    
	    $pro = array(
		'table'			 => array('table' => 'product'),
		//'pkey'			 => array('pkey' => 'brandid'),
		'selectcond' => array('select' => '*'),
		//'orderby'	   => array('order' => 'DESC'),
		'limit' 	 => array('start' => 0,'limit' => 5),
		'wherecond'=> array('where' =>array('brand' => $value['brandid']))
	);
	    $count = array(
		'table'			 => array('table' => 'product'),
		//'pkey'			 => array('pkey' => 'brandid'),
		'selectcond' => array('count' => 'COUNT(*)'),
		//'orderby'	   => array('order' => 'DESC'),
		//'limit' 	 => array('start' => 0,'limit' => 4),
		'wherecond'=> array('where' =>array('brand' => $value['brandid']))
	);
	
	
	$data["product"] = $Model->fetchdata($pro);
	$data["count"] = $Model->fetchdata($count);
	
        if($data["count"][0][0] == 0){
        	        echo '<span style="padding:5px;font-weight:bold;color:black;margin:5px">No product found</span>';
        	    }else{
        	if(isset($data["product"])){ foreach($data["product"] as $val){
        	    
        	    
        	    echo '<div class="grid_1_of_4 images_1_of_4">';
        					 echo '<a href="'; BASE; echo '/Indexs/details/'; echo base64_encode($value['id']); echo '">
            					     <div class="image-box" style="background-image: url('; echo BASE; echo '/img/'; echo $val['image1']; echo'); background-position: center;background-repeat: no-repeat;background-size: cover;">
            					        
            					     </div> 
            					   </a>'; 
            					 echo '<h2>'; echo $val['name']; echo '</h2>';
            					 echo '<p>';
            							$st = $val['productDetails'];
            							$st = substr($st, 0, 200);
            							echo $st;
            						    echo '</p>
            					 <p><span class="price">$'; echo $val['price']; echo '</span></p>
            				     <div class="button"><span><a href="'; echo BASE; echo '/Indexs/details/'; echo base64_encode($val['id']); echo '" class="details">Details</a></span></div>
        				</div>
        	';
                	}}
        	if($data["count"][0][0] > 5 ){
        	   echo "<span ><a style='float:right;color:#602D8D;padding:4px 8px;border:2px solid #ccc' href='"; echo BASE; echo "/Productsby/allbrand/"; echo base64_encode($val['brand']); echo "'>see all</a></span>";
        	}else{ 
        	     NULL;
        	}
        
        	echo '</div>';
            }}}
	
    echo '</div>
 </div>
</div>
';
	    $this->load->view("brand",$data);
	    $this->load->view("inc/footer");
	
	}
	
	public function allbrand($id,$page){
	    $this->header();
	    
	    if($page <= 0){
	        $page = 1;
	        header("Location: ".BASE."/Productsby/allbrand/".$id."/".$page);
	    }
	    $limit = 20;
	    $start = ($page - 1)*$limit;
	    
	    $pro = array(
                    		'table'			 => array('table' => 'product'),
                    		'pkey'			 => array('pkey' => 'id'),
                    		'selectcond' => array('select' => '*'),
                    		'orderby'	   => array('order' => 'DESC'),
                    		'limit' 	 => array('start' => $start,'limit' => $limit),
                    		'wherecond'=> array('where' =>array('brand' => base64_decode($id)))
                    	);
         $count = array(
                    		'table'			 => array('table' => 'product'),
                    		'pkey'			 => array('pkey' => 'id'),
                    		'selectcond' => array('count' => 'COUNT(*)'),
                    		'orderby'	   => array('order' => 'DESC'),
                    		//'limit' 	 => array('start' => $fstart,'limit' => $flast),
                    		'wherecond'=> array('where' =>array('brand' => base64_decode($id)))
                    	);
    	$Model   	  	    = $this->load->model("Madmin");
    	$data["product"] = $Model->fetchdata($pro);
    	$num = $Model->fetchdata($count);
	    
	    $this->load->view("products",$data);
	    
	    $this->pagination($page,$num,$limit);
	    
	    $this->load->view("inc/footer");
	}
	
	public function pagination($page,$num,$limit){
    	$page_num    = $page;
    	$row         = $num[0][0];
    	$per_page 	 = $limit;
    	$last_page	 = ceil($row/$per_page);
    	$pagi_button = 5;
    	$half 		 = floor($pagi_button/2);
    	$pagination  = '';
    	$pagination .= '<nav class="page">';
    	$pagination .= '<ul class="pagination pager">';
    	
    	if($row > $per_page){
    	if($page_num < 1){
    		$page_num = 1;
    	}else if($page_num > $last_page){
    		$page_num = $last_page;
    	}
    	
    	if($page_num < $pagi_button){
    		for($i=1;$i<= $last_page;$i++){
    			if($i == $page_num){
    				$pagination .= '<li class="page-item" ><a class="page_link" style="background:purple;color:#fff" href="'.$i.'">'.$i.'</a></li>';
    			}else{
    				$pagination .= '<li class="page-item"><a class="page_link"  href="'.$i.'">'.$i.'</a></li>';
    			}
    		}
    		if($last_page > $pagi_button){
    			$pagination .= '<li class="page-item"><a class="page_link"  href="'.($page+1).'">&raquo;</a></li>';
    		}
    	}else if($page_num >= $pagi_button AND $last_page > $pagi_button ){
    		
    		if(($page_num+$half) >= $last_page){
    			$pagination .= '<li class="page-item"><a class="page_link"  href="'.($last_page-$pagi_button).'">&laquo;</a></li>';
    				
    			for($i=($page_num - $half);$i<= $last_page;$i++){
    			if($i == $page_num){
    				$pagination .= '<li class="page-item" ><a class="page_link" style="background:purple;color:#fff" href="'.$i.'">'.$i.'</a></li>';
    			}else{
    				$pagination .= '<li class="page-item"><a class="page_link"  href="'.$i.'">'.$i.'</a></li>';
    			}
    		}
    		
    		}
    		else if(($page_num+$half) < $last_page){
    			$pagination .= '<li class="page-item"><a class="page_link"  href="'.($page_num-1).'">&laquo;</a></li>';
    			
    			for($i=($page_num - $half);$i<= ($page_num+$half);$i++){
    			if($i == $page_num){
    				$pagination .= '<li class="page-item" ><a class="page_link" style="background:purple;color:#fff" href="'.$i.'">'.$i.'</a></li>';
    			}else{
    				$pagination .= '<li class="page-item"><a class="page_link"  href="'.$i.'">'.$i.'</a></li>';
    			}
    		}
    		
    			$pagination .= '<li class="page-item"><a class="page_link"  href="'.($page_num+1).'">&raquo;</a></li>';
    		
    		}
    		
    	}
    	$pagination .= "</nav></ul>";
    	echo $pagination;
    	}else{
    	    NULL;
    	}
	
	}
	
}