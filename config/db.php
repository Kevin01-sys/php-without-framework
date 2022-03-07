<?php 
require_once('config.php');
	/**
	* Conexion a bbdd usando mysqli
	*/
	class Connect 
	{
		
		public static function connection(){
			$con = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
			return $con;
		}

	}
?>