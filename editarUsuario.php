<?php
	require_once "Config.php";
	spl_autoload_register(function($clase){
		require_once "$clase.php";

	});
	extract($_POST, EXTR_OVERWRITE);
	$db= new Database(DB_HOST,DB_USER,DB_PASS,DB_NAME);
			$db->preparar("DELETE FROM usuarios WHERE id='$id'");
			$db->ejecutar();
			$db->liberar();
			$db->preparar("SELECT * FROM usuarios");
			$db->ejecutar();
			//$db->prep()->bind_result($id,$nombre_BD,$hobby_BD); 
	$data = array();
	$data['status'] = 'ok';
	$data['result'] = "Hola";
	//returns data as JSON format
	echo json_encode($data);

 ?>