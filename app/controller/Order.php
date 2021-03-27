<?php
	class Order extends Mcontroller{ 
		public function __construct(){
		    error_reporting(0);
		    Session::init();
			parent::__construct();
			Session::chkuser();
		}
		public function Index(){
		    $this->list();	
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
	    $sid = session_id();
        $uid = Session::get("userid");
        
        
        $cart = array(
		'table'			 => array('table' => 'orders'),
		//'pkey'			 => array('pkey' => 'cartid'),
		'selectcond' => array('count' => 'COUNT(*)'),
		//'orderby'	   => array('order' => 'DESC'),
		//'limit' 	 => array('start' => 2,'limit' => 3),
		'wherecond'=> array('where' =>array('uid' => $uid))
	);
	    $Model = $this->load->model("Madmin");
	    $data['count'] = $Model->fetchdata($cart);
	    
	    
	         $order = array(
		'TableMain'		 => array('TableMain' => 'orders'),
                		'Tablea'			   => array('Tablea'    => 'product'),
                		'Tableb'			 => array('Tableb'    => 'users'),
                		//'Tablec'			 => array('Tablec'    => 'users'),
                
                		'Mainconda'			   => array('Mainconda' => 'pid'),
                		'Maincondb'			 => array('Maincondb' => 'uid'),
                		//'Maincondc'			 => array('Maincondc' => 'subcategory'),
                
                		'Conda'			   => array('Conda' => 'id'),
                		'Condb'			 => array('Condb' => 'userid'),
                		//'Condc'			 => array('Condc' => 'subid'),
                
                		'selectcond' => array('select' => '*'),
                		'orderby'	  => array('order'  => 'DESC'),
                		'pkey'       => array('pkey'   => 'orderid'),
                		//'limit' 	  => array('start'  => $astart,'limit' => $alast),
                		'wherecond'=> array('where'  =>array('uid' => $uid))
	);

	 $data["order"] = $Model->join($order);
		
        $this->header();
        $this->load->view("order",$data);
        $this->load->view("inc/footer");
	        
	        
	}
	
	public function stripe(){
	    if(!($_POST)){
			header("Location: ".BASE."/Cart");
		}else{
    	// Retrieve stripe token, card and user info from the submitted form data 
        $token  = $_POST['stripeToken']; 
        $name = $_POST['name']; 
        $email = $_POST['email']; 
        $card_number = $_POST['card_number']; 
        $card_exp_month = $_POST['card_exp_month']; 
        $card_exp_year = $_POST['card_exp_year']; 
        $card_cvc = $_POST['card_cvc']; 
        $total = Session::get("total");
        $currency = 'usd';
           
           
           // Set API key 
        \Stripe\Stripe::setApiKey(STRIPE_API_KEY); 
         
        // Add customer to stripe 
        $customer = \Stripe\Customer::create(array( 
            'email' => $email, 
            'source'  => $token 
        )); 
         
        // Unique order ID 
        $orderID = strtoupper(str_replace('.','',uniqid('', true))); 
         
        // Convert price to cents 
        $cent = ($total*100); 
         
        // Charge a credit or a debit card 
        $charge = \Stripe\Charge::create(array( 
            'customer' => $customer->id, 
            'amount'   => $cent, 
            'currency' => $currency,  
            'metadata' => array( 
                'order_id' => $orderID 
            ) 
        )); 
         
        // Retrieve charge details 
        $chargeJson = $charge->jsonSerialize(); 
     
        // Check whether the charge is successful 
        if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){ 
            // Order details  
            $transactionID = $chargeJson['balance_transaction']; 
            $paidAmount = $chargeJson['amount']; 
            $paidCurrency = $chargeJson['currency']; 
            $payment_status = $chargeJson['status']; 
           
           
            
            $data = array(
    				'name' => $name,
    				'email'    => $email,
    				'card_number'    => $card_number,
    				'card_exp_month' => $card_exp_month,
    				'card_exp_year' => $card_exp_year,
    				'cvc'        => $card_cvc,
    				'paid_amount' => $total,
    				'paid_amount_currency' => $currency,
    				'txn_id' => $transactionID,
    				'payment_status' => $payment_status
    			);
    			
    		$Model   	  	= $this->load->model("Madmin");
    		$table ="payment";
    			
    		$order = $Model->insertdata($data,$table);
             
            if($order){
                Session::set("transid",$transactionID);
                $this->order($transactionID,$total);
            }
        }
	  }
    
	}
	
	public function payment(){
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
	    
	    if($data['count'][0][0] <= 0){
	        header("Location: ".BASE."/Cart");
	    }else{
	        $cart = array(
		'table'			 => array('table' => 'cart'),
		'pkey'			 => array('pkey' => 'cartid'),
		'selectcond' => array('select' => '*'),
		'orderby'	   => array('order' => 'DESC'),
		//'limit' 	 => array('start' => 2,'limit' => 3),
		'wherecond'=> array('where' =>array('sid' => $sid))
	);
	$profile = array(
		'table'			 => array('table' => 'users'),
		//'pkey'			 => array('pkey' => 'userid'),
		'selectcond' => array('select' => '*'),
		//'orderby'	   => array('order' => 'DESC'),
		//'limit' 	 => array('start' => 2,'limit' => 3),
		'wherecond'=> array('where' =>array('userid' => Session::get("userid")))
	);

	 $data["profile"] = $Model->fetchdata($profile);

	 $data["cart"] = $Model->fetchdata($cart);
		
        $this->header();
        $this->load->view("payment",$data);
        $this->load->view("inc/footer");
	        
	    } 
	}
	
	public function order($transactionID,$total){
	   if(Session::get('transid')){
	       $sid = session_id();
	   $uid = Session::get("userid");
	   $cart = array(
		'table'			 => array('table' => 'cart'),
		'pkey'			 => array('pkey' => 'cartid'),
		'selectcond' => array('select' => '*'),
		'orderby'	   => array('order' => 'DESC'),
		//'limit' 	 => array('start' => 2,'limit' => 3),
		'wherecond'=> array('where' =>array('sid' => $sid))
	);
	$Model   	  	= $this->load->model("Madmin");
	$data["cart"] = $Model->fetchdata($cart);
	
	foreach($data['cart'] as $value){
	    $pid = $value['productid'];
	    $quantity = $value['quantity'];
	
	$data = array(
				'uid' => $uid,
				'quantity'    => $quantity,
				'pid'    => $pid,
				'trans_id' => $transactionID
			);
		
			$table ="orders";
			
	$order = $Model->insertdata($data,$table);
	if($order == '1'){
	    
	    $data = array(
            'table'			 => array('table' => 'cart'),
			//'choice'		 => array('single' => 'catid'),
			//'choice'		 => array('id' => '1','id' =>'2'),
			'wherecond'  => array('where' =>array('sid' => $sid))
		);
			$delcart = $Model->delete($data);
			
            if($delcart){
                $this->invoice($transactionID,$total);   
            }else{
                header("Location: ".BASE.'/Order/list'); 
            }
	    
	}else{
               header("Location: ".BASE.'/Order/list?=didnt insert'); 
            }
	}
	   }else{
	   header("Location: ../cart");
	}
	}
	
	public function invoice($transactionID,$total){
	    if(Session::get('transid')){
    	    $file_name = rand() . '.pdf';
            $html_code =  '  <!doctype html><html lang="en"><head><meta charset="UTF-8"><title>Aloha!</title><style type="text/css">* {font-family: Verdana, Arial, sans-serif;}table{font-size: x-small;}tfoot tr td{font-weight: bold;font-size: x-small;}.gray {background-color: lightgray}</style></head><body><table width="100%"><tr><td valign="top"><img src="{{asset('.BASE.'/style/images/logo.png)}}" alt="" width="150"/></td></td><td align="right"><h3>Store BD Online</h3><pre>Date:'.date("Y/m/d").'<br>Safayat Mahmud <br> phone: +8801818119332</pre> </td></tr></table><table width="100%"><tr><td><strong>From:</strong> Safayat</td><td><strong>To:</strong> '.Session::get("username").'</td></tr></table><br/><table width="100%"><thead style="background-color: lightgray;"><tr><th>status</th><th>Transaction ID</th><th>Total</th><th>Paid By</th></tr><tr><td>Paid</td><td>'.$transactionID.'</td> <td>'.$total.'</td> <td>'.Session::get('username').'</td></tr> </thead><tbody></tfoot></table></body></html>';
            $pdf = new Pdf();
            $pdf->load_html($html_code);
            $pdf->render();
            $file = $pdf->output();
            file_put_contents('invoice/'.$file_name, $file);
			 
            $mail = new PHPMailer(true);
            
            try {
                $mail->AddAddress(Session::get("useremail") , 'client');
                $mail->SetFrom(mail, 'Developer');
                $mail->IsHTML(true);       //Sets message type to HTML    
                $mail->AddAttachment('invoice/'.$file_name);         //Adds an attachment from a path on the filesystem
                $mail->Subject = 'Payment Invoice';   //Sets the Subject of the message
                $mail->Body = 'Use This To Get Your Product';
                if($mail->Send())        //Send an Email. Return true on success or false on error
                 {
                  unlink('invoice/'.$file_name);
                  unset($_SESSION['transid']);
                  unset($_SESSION['total']);
                  header("Location: ".BASE.'/Order/list');
                 }
              
            } catch (phpmailerException $e) {
              echo $e->errorMessage(); //Pretty error messages from PHPMailer
            } catch (Exception $e) {
              echo $e->getMessage(); //Boring error messages from anything else!
            }
	    }else{
	        header("Location: ".BASE.'/Order');
	    }
	
	}
}