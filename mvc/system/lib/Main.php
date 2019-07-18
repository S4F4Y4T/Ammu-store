<?php
class Main{
	public $url;
	public $Controller = "Indexs";
	public $Path       = "app/controller/";
	public $Method      = "Index";
	public $ctlr;
	public $param;

	public function __construct(){
		$this->getUrl();
		$this->loadCtlr();
		$this->loadMethod();
	}

	public function getUrl(){
		$this->url = isset($_GET['url']) ? $_GET['url'] : NULL;
		if($this->url != NULL){
            $this->url = rtrim($this->url, "/");
			$this->url = explode('/' , $this->url);
		}else{
			unset($this->url);
		}
		
		if(isset($this->url[1])){
		    if($this->url[1] == 'footer' || $this->url[1] == 'header'){
		        header("Location: ".BASE);
		    }
	    }
	}
    
	public function loadCtlr(){
		if(!isset($this->url[0])){
			require $test = $this->Path.$this->Controller.".php";
			$this->ctlr = new $this->Controller();
		}else{
			$this->Controller = ucfirst($this->url[0]);
			$fileName = $this->Path.$this->Controller.".php";
			if(file_exists($fileName)){
				require $fileName;
				if(class_exists($this->Controller)){
					$this->ctlr = new $this->Controller();
				}else{
					header("Location: ". BASE ."/Indexs/error");
				}
			}else{
				header("Location: ". BASE ."/Indexs/error");
			}
		}
	}

	public function loadMethod(){
		if(isset($this->url[4])){
			$this->Method = $this->url[1];
			if(method_exists($this->ctlr, $this->Method)){
				$this->ctlr->{$this->Method}($this->url[2],$this->url[3],$this->url[4]);
			}else{
				header("Location: ". BASE ."/Indexs/error");
			}
		}else if(isset($this->url[3])){
			$this->Method = $this->url[1];
			if(method_exists($this->ctlr, $this->Method)){
				$this->ctlr->{$this->Method}($this->url[2],$this->url[3]);
			}else{
				header("Location: ". BASE ."/Indexs/error");
			}
		}else if(isset($this->url[2])){
			$this->Method = $this->url[1];
			if(method_exists($this->ctlr, $this->Method)){
				$this->ctlr->{$this->Method}($this->url[2]);
			}else{
				header("Location: ". BASE ."/Indexs/error");
			}
		}else if(isset($this->url[1])){
			if(isset($this->url[1])){
				$this->Method = $this->url[1];
				if(method_exists($this->ctlr, $this->Method)){
					$this->ctlr->{$this->Method}();
				}else{
					header("Location: ". BASE ."/Indexs/error");
				}
			}
		}else{
			if(method_exists($this->ctlr, $this->Method)){
					$this->ctlr->{$this->Method}();
				}else{
					header("Location: ". BASE ."/Indexs/error");
				}
		}
	}

}

?>
