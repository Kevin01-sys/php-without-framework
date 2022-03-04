<?php
	/*Con el require_once haremos uso del archivo Config.php donde guardamos en constantes los datos requeridos para conectarnos a la BD.*/
	require_once "config.php";
	/*La función spl_autoload_register permite cargar o llamar automáticamente una función que le pasemos, es decir es un "autoloader", dentro pasaremos un "require_once" con un parametro $clase, el truco es que, cuando instanciemos una clase que no esta en nuestro archivo, esa variable tomara el nombre de la clase, en el caso más abajo será "Database", así si en un futuro tenemos muchas clases en distintos archivos, no tendremos que hacer un "require" o un "include" por cada una.*/
	spl_autoload_register(function($clase){
		require_once "$clase.php";

	});
	$informacion = [];
	//Se traen los datos $_POST
	extract($_POST, EXTR_OVERWRITE);
	//Instanciamos la clase Database para hacer la conexión y las consultas.
	$db= new Database(DB_HOST,DB_USER,DB_PASS,DB_NAME);

	switch ($opcion) {
		case 'modificar':
			modificar($id, $nombre, $hobby, $db);
			break;
		
		case 'eliminar':
			# code...
			eliminar($id,$db);
			break;
	}


	function modificar($id, $nombre, $hobby, $db){
		$query= "UPDATE usuarios SET nombre='$nombre',
						  hobby='$hobby'
					 WHERE id = '$id'";
	    $db->preparar($query);
	    $resultado = $db->ejecutar1();
	    //$resultado = $db->ejecutar();
	    //$resultado = mysqli_query($db, $query);
	    //echo $resultado;
	    //echo ($resultado);
	    //echo json_encode($resultado);
	    //$db->liberar();
		//$db->cerrar();
		//$resultado = mysqli_query($db, $query);
		verificar_resultado($resultado);
		//cerrar( $db );
	}


	function eliminar($id,$db){
		$query= "UPDATE usuarios SET estado=0 WHERE id = '$id'";
		$resultado = mysqli_query($db, $query);
		verificar_resultado( $resultado);
		cerrar( $db );
	}

	function verificar_resultado($resultado){
		if (! $resultado )  $informacion["respuesta"] = "ERROR";
		else $informacion["respuesta"] = "BIEN";
		echo json_encode($informacion);
	}

	/*function cerrar($db){
		mysql_close($db);
	}*/


?>