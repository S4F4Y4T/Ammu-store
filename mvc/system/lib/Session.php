<?php
 class Session{

	  public static function init(){
		  session_start();
          session_regenerate_id(true);
	  }
	  public static function set($key, $val){
		  $_SESSION[$key] = $val;
      //session_generate_id();
	  }
	  public static function get($key){
		  if(isset($_SESSION[$key])){
			  return $_SESSION[$key];
	  }else{
		  return false;
	  }
	  }
	  public static function chksession(){
		  if(self::get("login") == false){
			  self::destroy();
			header("Location: ".BASE."/Admin/login");
		  }
	  }
	  public static function chklogin(){
		  if(self::get("login") == true){
		  header("Location: ".BASE."/Admin/panel");
		  }
	  }
	  
	  public static function userlogin(){
		  if(self::get("userlogin") == true){
		  header("Location: ".BASE);
		  }
	  }
	  public static function chkuser(){
		  if(self::get("userlogin") == false){
			header("Location: ".BASE."/User/user");
		  }
	  }
	  public static function destroy(){
		  session_destroy();
		  session_unset();
	  }
   }
?>
