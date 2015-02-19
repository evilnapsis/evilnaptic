<?php
/// evilnapsis.tk evilnaps 6RSk!IpTJ]vv
class Database {
	public static $db;
	public static $con;
	function Database(){
//		$this->user="evilnaps_admin";$this->pass="l00lapal00za";$this->host="localhost";$this->ddbb="evilnaps_mood";
		$this->user="root";$this->pass="";$this->host="localhost";$this->ddbb="evilnaptic";
	}

	function connect(){
		$con = new mysqli($this->host,$this->user,$this->pass,$this->ddbb);
		return $con;
	}

	public static function getCon(){
		if(self::$con==null && self::$db==null){
			self::$db = new Database();
			self::$con = self::$db->connect();
		}
		return self::$con;
	}
	
}
?>
