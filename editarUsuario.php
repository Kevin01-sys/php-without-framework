<?php
	require_once "Config.php";
	spl_autoload_register(function($clase){
		require_once "$clase.php";

	});
	extract($_POST, EXTR_OVERWRITE);
	$db= new Database(DB_HOST,DB_USER,DB_PASS,DB_NAME);
			//$db->preparar("DELETE FROM usuarios WHERE id='$id'");
			//$db->ejecutar();
			//$db->liberar();
			$db->preparar("SELECT * FROM usuarios");
			$db->ejecutar();
			//$data['result']=$db->prep()->num_rows();
			$db->prep()->bind_result($id,$nombre_BD,$hobby_BD);
			$i=1;
			
			while($db->resultado()){
				 //$userData = $db->prep()->bind_result($id,$nombre_BD,$hobby_BD)
				//echo $i++;
				//echo $nombre_BD;
					//$data['id'][] = $id;
					//$data['nombre'][] = $nombre_BD;
					//$data['hobby'][] = $Hobby_BD;
					//$data['data']['id'][] = $id;
					$data['status'] = 'ok';
					$data['data'][]  = ["id" => $id,"nombre" => $nombre_BD,"hobby" => $hobby_BD];
					//$data['data']['nombre'][] = $nombre_BD;
					//$data['data']['hobby'][] = $hobby_BD;
					//$data['result'] = $userData;
					//$data[$i] = $nombre_BD;
				$i++;
				}

	

			$db->liberar();
			$db->cerrar();
	
	//returns data as JSON format
	echo json_encode($data);

 ?>