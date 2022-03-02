<?php
require_once "Config.php";
	spl_autoload_register(function($clase){
		require_once "$clase.php";

	});
$db= new Database(DB_HOST,DB_USER,DB_PASS,DB_NAME);
			$db->preparar("SELECT * FROM usuarios");
			$db->ejecutar();
			$db->prep()->bind_result($id,$nombre_BD,$hobby_BD); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tutorial Conexión PHP BD puro</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<style>
		.col-centrar{
			margin: 0 auto;
		}
	</style>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-centrar">
				<h1>Por favor ingrese los datos:</h1>

				<form method="post" action="registro.php">
				  <div class="form-group">
				    <label for="nombre">Nombre</label>
				    <input type="text" class="form-control" name="nombre" > 
				  </div>
				  <div class="form-group">
				    <label for="hobby">Hobby</label>
				    <input type="text" class="form-control" name="hobby" > 
				  </div>
				  <button type="submit" class="btn btn-primary">Enviar</button>
				</form>
			</div>	
		</div>
	</div>
	<div>
		<h1>Mostrar y editar datos:</h1>
			<table class="table">
			    <thead>
				    <tr>
				      <th scope="col">Id</th>
				      <th scope="col">Nombre</th>
				      <th scope="col">Hobby</th>
				      <th scope="col">Eliminar</th>
				    </tr>
			    </thead>
			    <tbody>
			    	<?php while($db->resultado()){ ?>
					  	<tr>
					  	  <td><?php echo $id; ?></td>
					      <td><?php echo $nombre_BD; ?></td>
					      <td><?php echo $hobby_BD; ?></td>
					      <td><button onclick="mostrarDatos(<?php echo $id; ?>)">Eliminar</button></td>
					    	<script >
								function mostrarDatos(id){
									//var id1 = id;
									//var id = '<?=$id?>';
									//var nombre_BD = '<?=$nombre_BD?>';
									console.log(id);
									$.ajax({
										type:"POST",
										url:"editarUsuario.php",
										dataType: "json",
										data: {'id':id},
										success:function(data){
											if(data.status == 'ok') {

												$('#test').text(data.result);
											} else 
											{
												document.getElementById("test").value = "Nivel y Categoria deben ser seleccionados" ;
											}
										}
									});
								}
							</script>
					    </tr>
					<?php } ?>
			    </tbody>
			</table>
			<div id="test">test	</div>
	</div>
		


	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>