<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Tutorial Conexión PHP BD puro</title>
	<!-- Css usado para dar estilo a la hoja -->
	<link href="basic.css" rel="stylesheet" title="Default Style">
	<!--Librerias para el uso del Datatable-->
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
	<!-- Librerias para el uso de bootstrap -->
	<!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">-->
	<!-- Librerias para los iconos de los botones -->
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
	<!-- Con el link rel y los 2 script es que se puede levantar el modal -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<!-- Div en el que se podrá registrar usuarios -->
	<form id="frmEditarUsuario"  action="" method="POST">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-centrar">
					<h1>Por favor ingrese los datos:</h1>

					  <input type="text" class="form-control" id="id" name="id">
					  <input type="text" id="opcion" name="opcion" value="modificar">
					  <div class="form-group">
					    <label for="nombre">Nombre</label>
					    <input type="text" class="form-control" id="nombreusuario" name="nombre" > 
					  </div>
					  <div class="form-group">
					    <label for="hobby">Hobby</label>
					    <input type="text" class="form-control" id="hobby" name="hobby" > 
					  </div>
					  <button type="submit" class="btn btn-primary">Enviar</button>
					  <input type="button" id="btn_listar" class="btn btn-primary" value="Listar">
					  <div id="test" class="mensaje"></div>	
				</div>
			</div>
		</div>
	</form>
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
					      <th scope="col"></th>
					    </tr>
				    </thead>
				</table>
				<!--<input type="button" class="btn btn-primary" onclick="mostrarDatos(<?php echo $id; ?>)" value="Listar antiguo">-->
				<div id="test" class="mensaje">
					<!--<button type="button" class="editar btn btn-primary"><i class="fa fa-pencil-square-o"></i></button>
					<button type="button" class="eliminar btn btn-danger" data-toggle="modal" data-target="#modalEliminar"><i class="fa fa-trash-o"></i></button>-->
				</div>


		</div>
	</div>

  <!-- Modal Eliminar usuario -->
  <form id="frmEliminarUsuario" action="" method="POST">
  		<input type="text" id="id" value="">
  		<input type="text" id="opcion" name="opcion" value="eliminar">
		  <div class="modal fade" id="modalEliminar" tabindex="-1" role="dialog" aria-labelledby="modalEliminarLabel">
		    <div class="modal-dialog" role="document">
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		          <h4 class="modal-title" id="modalEliminarLabel">Eliminar usuario</h4>
		        </div>
		        <div class="modal-body">
		          ¿Estás seguro de eliminar al usuario?<strong data-name=""></strong>
		        </div>
		        <div class="modal-footer">
		          <button type="button" id="eliminar-usuario" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
		          <button type="button" onclick="" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		        </div>
		      </div>
		      
		    </div>
		  </div>
  </form>
  <!-- Fin Modal Eliminar usuario -->

	<!-- Termino de div listar -->
	<!--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
	<!-- Script necesario para el uso del Datatable-->
    <script type="text/javascript" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="app.js"></script>
    <script>
       $(document).ready(function(){
          console.log("Probando document ready");
          listar();
          guardar();
          eliminar();
       });
    </script>

</body>
</html>

