<?php
	// $_SERVER['DOCUMENT_ROOT'] como punto de referencia al directorio raiz del proyecto.
	require_once($_SERVER['DOCUMENT_ROOT'].'/config/db.php');
	require_once($_SERVER['DOCUMENT_ROOT'].'/models/users_model.php');
	//Se traen los datos $_POST
	extract($_POST, EXTR_OVERWRITE);
	//Instanciamos la clase Database para hacer la conexión y las consultas.
	$db = new users_model();
	//$db= new Database(DB_HOST,DB_USER,DB_PASS,DB_NAME);
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