<?php
class Mail extends Mcontroller{

	public function __construct(){
		parent::__construct();
	}

	public function Index(){
		$this->fetch();
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

	public function fetch(){
		$data = array(
			'table'			 => array('table' => 'mail'),
			'pkey'			 => array('pkey' => 'id'),
			'selectcond' => array('select' => '*'),
			'orderby'	   => array('order' => 'DESC'),
			//'limit' 	 => array('start' => 2,'limit' => 3),
			//'wherecond'=> array('where' =>array('catid' => 156))
		);

		$Model   	  	    = $this->load->model("Madmin");
		$data["mail"] = $Model->fetchdata($data);

		$this->header();
		$this->load->view("admin/mail",$data);
		$this->footer();
	}

	public function readmail($id = NULL){
		$mail = array(
			'table'			 => array('table' => 'mail'),
			'pkey'			 => array('pkey' => 'id'),
			'selectcond' => array('select' => '*'),
			'orderby'	   => array('order' => 'DESC'),
			//'limit' 	 => array('start' => 2,'limit' => 3),
			'wherecond'=> array('where' =>array('id' => base64_decode($id)))
		);

		$tables = "mail";
		$pkey  = "id";
		$value = array(
			'seen' 		 	 => 1
		);

		$Model   	  	 = $this->load->model("Madmin");
		$data["mail"]  = $Model->fetchdata($mail);
		$updateseen 	 = $Model->updatedata($tables,$value,$pkey,base64_decode($id));

		$this->header();
		$this->load->view("admin/readmail",$data);
		$this->footer();
	}

	public function compose($id = NULL){
		$data = array(
			'table'			 => array('table' => 'mail'),
			//'pkey'			 => array('pkey' => 'id'),
			'selectcond' => array('select' => '*'),
			//'orderby'	   => array('order' => 'DESC'),
			//'limit' 	 => array('start' => 2,'limit' => 3),
			'wherecond'=> array('where' =>array('id' => base64_decode($id)))
		);

		$Model   	  	    = $this->load->model("Madmin");
		$data["mail"] 	  = $Model->fetchdata($data);

		$this->header();
		$this->load->view("admin/compose",$data);
		$this->footer();
	}
	public function mailauth(){
		if(!($_POST)){
			header("Location: ".BASE."/Mail/compose");
		}else{
			$input = $this->load->valid("Validation");

			$input->post("from")
						->schar()
						->isempty();
			$input->post("to")
						->schar()
						->isempty();
			$input->post("sub")
				  	->isempty();
			$input->post("message")
				  	->isempty();

			if($input->submit()){

				$from     = $input->value["from"];
				$to       = $input->value["to"];
				$sub      = $input->value["sub"];
				$message  = $input->value["message"];

				$mail = $this->sendmail($to,$sub,$message,$from);

				
			}else{
				$mdata['msg'] = '<div class="alert error">*Invalid Mail *Field Must Not Be Empty </br> *You Can Upload Only Jpg,Jpeg,Png,Gif File </div>';
				header("Location:".BASE."/Mail/compose?msg=".urlencode(serialize($mdata)));
			}
		 }
	}
	
	public function sendmail($to,$sub,$message,$from){
	    $mail = new PHPMailer(true);
        try {
            $mail->AddAddress($to , 'client');
            $mail->SetFrom(mail, 'Developer');
            $mail->AddReplyTo('safayatmahmud.99@gmail.com',"Developer");
            
            
            $mail->Subject = $sub;
            $mail->Body = $message;
            $mail->IsHTML(true);
          
        } catch (phpmailerException $e) {
          echo $e->errorMessage(); //Pretty error messages from PHPMailer
        } catch (Exception $e) {
          echo $e->getMessage(); //Boring error messages from anything else!
        }
        
        //echo !extension_loaded('openssl')?"Not Available":"Available";
        
        //https://www.google.com/settings/security/lesssecureapps
	}
	
	public function delmail($id = NULL){
        $data = array(
            'table'			 => array('table' => 'mail'),
			//'choice'		 => array('single' => 'catid'),
			//'choice'		 => array('id' => '1','id' =>'2'),
			'wherecond'  => array('where' =>array('id' => base64_decode($id)))
		);
		
		$Model 	 = $this->load->model('Madmin');
		$delete = $Model->delete($data);

		if($delete == '1'){
			header("Location: ".BASE."/Mail/fetch");
		}
	}
	public function deletemail(){
		$chk 	  = $_REQUEST['chk'];
		$id 	  = implode(',',$chk);
		$table  = "mail";
		$pkey   = "id";

		$Model  = $this->load->model("Madmin");
		$delete = $Model->multidelete($id,$table,$pkey);

		if($delete){
			header("Location: ".BASE."/Mail/fetch");
		}
	}
}
?>
