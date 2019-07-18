<?php
class Validation{
	public $error = array();
	public $value = array();
	public $currentvalue;

	public function __construct(){}

	public function post($key){
		$this->value[$key] = trim($_POST[$key]);
		$this->currentvalue = $key;
		return $this;
	}

	public function schar(){
		$this->value[$this->currentvalue] = htmlspecialchars($this->value[$this->currentvalue]);
		return $this;
	}

	public function isempty(){
		if(empty($this->value[$this->currentvalue])){
			$this->error[$this->currentvalue]["empty"] = "Field Must Not Be Empty";
		}
		return $this;
	}

	public function lengh(){
		if(strlen($this->value[$this->currentvalue]) < 3){
			$this->error[$this->currentvalue]["lengh"] = "Minimum Lengh Should Be 3 Character";
		}
	}
	public function number(){
		if($this->value[$this->currentvalue] <= 0){
			$this->error[$this->currentvalue]["lengh"] = "Minimum Lengh Should Be 3 Character";
		}
	}

	public function files($key){
		$this->value[$key] = $_FILES[$key]["name"];
		$this->currentvalue = $key;
		if(empty($this->value[$this->currentvalue])){
			$this->error[$this->currentvalue]["empty"] = "Must Attach A Image";
		}
		return $this;
	}

	public function validext($file_ext){
		$permit = array('jpg','jpeg','png','gif');
		if(in_array($file_ext,$permit) == false){
			$this->error['img']["empty"] = "You Can Upload Only ".implode(',',$permit)." File";
		}
		return $this;
	}

	public function submit(){
		if(empty($this->error)){
			return true;
		}else{
			return false;
		}
	}
}
?>
