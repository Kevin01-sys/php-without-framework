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
		


	<script src="js/jquery-3.5.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>