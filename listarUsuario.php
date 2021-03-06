<?php
	/*Con el require_once haremos uso del archivo Config.php donde guardamos en constantes los datos requeridos para conectarnos a la BD.*/
	require_once "config.php";
	/*La función spl_autoload_register permite cargar o llamar automáticamente una función que le pasemos, es decir es un "autoloader", dentro pasaremos un "require_once" con un parametro $clase, el truco es que, cuando instanciemos una clase que no esta en nuestro archivo, esa variable tomara el nombre de la clase, en el caso más abajo será "Database", así si en un futuro tenemos muchas clases en distintos archivos, no tendremos que hacer un "require" o un "include" por cada una.*/
	spl_autoload_register(function($clase){
		require_once "$clase.php";

	});
	//Se traen los datos $_POST
	extract($_POST, EXTR_OVERWRITE);
	//Instanciamos la clase Database para hacer la conexión y las consultas.
	$db= new Database(DB_HOST,DB_USER,DB_PASS,DB_NAME);
			$db->preparar("SELECT * FROM usuarios WHERE estado = 1");
			$db->ejecutar();
/*Aquí haremos uso de la consulta que estaba encapsulada en la clase, por que haremos uso del método "bind_result" que nos asigna cada registro que la consulta haya hecho a las variables que le suministremos (Se declaran dentro del mismo paso de parametros).*/
			$db->prep()->bind_result($id,$run,$nombre_BD,$hobby_BD,$estado_BD);

			// resultado() en Database hace un fetch() por lo que ira pasando fila por fila en el registro de lo que encuentra
			while($db->resultado()){
				$data['status'] = 'ok';
				$data['data'][]  = ["id"=> $id,"run" => $run,"nombre" => $nombre_BD,"hobby" => $hobby_BD];
				//$data['id'][] = $id;
				//$data['data']['id'][] = $id;
				//$data[$i] = $nombre_BD;
				//$i++;
				}

			$db->liberar();
			$db->cerrar();
	
	//returns data as JSON format
	echo json_encode($data);

 ?>