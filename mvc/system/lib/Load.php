<?php
class Load{
	public function view($view, $data = false){
		if($data == true){
			extract($data);
		}
		require_once"app/view/".$view.".php";
		
	}
	public function model($model){
		require_once"app/model/".$model.".php";
		return new $model();
	}
	public function valid($input){
		require_once"system/lib/".$input.".php";
		return new $input();
	}
	
}
?>
