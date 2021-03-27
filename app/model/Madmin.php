<?php
class Madmin extends Mmodel{

	public function __construct(){
		parent::__construct();
	}

	//Fetch Data Dynamicly
	public function fetchdata($data){
		return $this->db->fetchdata($data);
	}
	//Fetch Data Dynamicly
	public function subcat($data){
		return $this->db->subcat($data);
	}
	//Fetch Data By Join Table
	public function join($data){
		return $this->db->join($data);
	}
	//Fetch Data By Join Table

	//Insert Data Into Database
	public function insertdata($data,$table){
		return $this->db->insertdata($data,$table);
	}
	//Insert Data Into Database

	//Update Data Into Database
	public function updatedata($table,$data,$pkey,$id){
		return $this->db->update($table,$data,$pkey,$id);
	}
	//Update Data Into Database

	//Delete Data From Database
	public function delete($data){
		return $this->db->delete($data);
	}
	//Delete Data From Database

	public function multidelete($id,$table,$pkey){
		return $this->db->multidelete($id,$table,$pkey);
	}

	public function encrypt($pass){
		$password = md5($pass);

		$password = str_replace(" ","0",$password);
		$password = str_replace("0","x",$password);

		$password = str_replace("1","x0",$password);
		$password = str_replace("2","y0",$password);
		$password = str_replace("3","z0",$password);
		$password = str_replace("4","x1",$password);
		$password = str_replace("5","y1",$password);
		$password = str_replace("6","z1",$password);
		$password = str_replace("7","x2",$password);
		$password = str_replace("8","y2",$password);
		$password = str_replace("9","z2",$password);

		$password = str_replace("a","x3",$password);
		$password = str_replace("b","y3",$password);
		$password = str_replace("c","z3",$password);
		$password = str_replace("d","x4",$password);
		$password = str_replace("e","y4",$password);
		$password = str_replace("f","z4",$password);
		$password = str_replace("g","x5",$password);
		$password = str_replace("h","y5",$password);
		$password = str_replace("i","z5",$password);
		$password = str_replace("j","x6",$password);
		$password = str_replace("k","y6",$password);
		$password = str_replace("l","z6",$password);
		$password = str_replace("m","x7",$password);
		$password = str_replace("n","y7",$password);
		$password = str_replace("o","z7",$password);
		$password = str_replace("p","x8",$password);
		$password = str_replace("q","y8",$password);
		$password = str_replace("r","z8",$password);
		$password = str_replace("s","x9",$password);
		$password = str_replace("t","y9",$password);
		$password = str_replace("u","z9",$password);
		$password = str_replace("v","xx",$password);
		$password = str_replace("w","xy",$password);
		$password = str_replace("x","xz",$password);
		$password = str_replace("y","yx",$password);
		$password = str_replace("z","yy",$password);

		$password = str_replace("@","yz",$password);
		$password = str_replace("(","zx",$password);
		$password = str_replace(")","zy",$password);
		$password = str_replace("<","zz",$password);
		$password = str_replace(">","1",$password);
		$password = str_replace("{","2",$password);
		$password = str_replace("}","3",$password);
		$password = str_replace("[","4",$password);
		$password = str_replace("]","5",$password);
		$password = str_replace("$","6",$password);
		$password = str_replace("&","7",$password);

		return $password;
	}
}
?>
