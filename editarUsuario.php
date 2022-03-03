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
				//echo $i++;
				//echo $nombre_BD;
					$data[$id] = $nombre_BD;
					//$data[$i] = $nombre_BD;
				$i++;
				}

			//$userData = $db->resultado()->fetch_assoc();
			//$data['result'] = $db->resultado();


	 		/*echo '<table class="table">
			  <thead>
			    <tr>
			      <th scope="col">Nombre</th>
			      <th scope="col">Hobby</th>
			    </tr>
			  </thead>
			  <tbody>';
			  while($db->resultado()){
			  	echo"
			  	<tr>
			      <td>$nombre_BD</td>
			      <td>$hobby_BD</td>
			    </tr>
			    ";
			  } 
			 echo '</tbody>
			</table>';*/


	
	$data['status'] = 'ok';

			$db->liberar();
			$db->cerrar();
	
	//returns data as JSON format
	echo json_encode($data);

 ?>