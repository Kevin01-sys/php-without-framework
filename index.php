<?php
$id=13;
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}

table.center {
  margin-left: auto; 
  margin-right: auto;
}
</style>
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
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
	<!-- Div en el que se podrá registrar usuarios -->
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
	<!-- Termino de registro de usuarios -->

	<!-- Sección en la cual se listan los datos, se puede borrar registros -->
	<div class="row">
		<div class="table-responsive col-sm-12">
			<h1>Mostrar y editar datos:</h1>
				<table id="dt_cliente" class="table table-bordered table-hover" cellpadding="0" width="100%">
				    <thead>
					    <tr>
					      <th scope="col">Id</th>
					      <th scope="col">Nombre</th>
					      <th scope="col">Hobby</th>
					      <th scope="col">Eliminar</th>
					      <td><button onclick="mostrarDatos(<?php echo $id; ?>)">Eliminar</button></td>
					    </tr>
				    </thead>
				</table>
				<div id="test">test</div>
		</div>
	</div>
	<!-- Termino de div listar -->

	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

</body>
</html>
    <script language="javascript" type="text/javascript">
       $(document).ready(function () {
          console.log("hi");
          listar();
       });
    	var listar = function(){
    		var table = $("#dt_cliente").DataTable({
    			"ajax":{
    				"method":"POST",
    				"url":"editarUsuario.php"
    			},
    			"columns":[
    				{"data":"id"},
    				{"data":"nombre"},
    				{"data":"hobby"},
    			]
    		});
    	}
    </script>

					    	<script >
								function mostrarDatos(id){
									//var id = '<?=$id?>';
									$.ajax({
										type:"POST",
										url:"editarUsuario.php",
										dataType: "json",
										data: {'id':id},
										success:function(data){
											$('#test').html(data);
												console.log(data);
												//$('#test').value(data);
												//$('#test').innerhtml(data);
												//$('#test').load(data);
										}
									});
								}
							</script>
