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

					  <input type="hidden" class="form-control" id="id" name="id">
					  <input type="hidden" id="opcion" name="opcion" value="modificar">
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
  		<input type="hidden" id="id" value="">
  		<input type="hidden" id="opcion" name="opcion" value="eliminar">
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
		          <button type="button" onclick="" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
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
    <script>
       $(document).ready(function(){
          console.log("Probando document ready");
          listar();
          guardar();
       });

       var guardar = function(){
       		$("#frmEditarUsuario").on("submit", function(e){
       			e.preventDefault();
       			var frm = $(this).serialize();
       			console.log(frm);
       			$.ajax({
       				method: "POST",
       				url: "guardar.php",
       				data: frm
       			}).done(function(info){
       				console.log(info);
       				var json_info = JSON.parse(info);
       				console.log(json_info);
       				mostrar_mensaje(json_info);
       				limpiar_datos();
       			});
       		});
       }

		var mostrar_mensaje = function( informacion ){
		var texto = "", color = "";
		if( informacion.respuesta == "BIEN" ){
		texto = "<strong>Bien!</strong> Se han guardado los cambios correctamente.";
		color = "#379911";
		}else if( informacion.respuesta == "ERROR"){
		texto = "<strong>Error</strong>, no se ejecutó la consulta.";
		color = "#C9302C";
		}else if( informacion.respuesta == "EXISTE" ){
		texto = "<strong>Información!</strong> el usuario ya existe.";
		color = "#5b94c5";
		}else if( informacion.respuesta == "VACIO" ){
		texto = "<strong>Advertencia!</strong> debe llenar todos los campos solicitados.";
		color = "#ddb11d";
		}

		$(".mensaje").html( texto ).css({"color": color });
		$(".mensaje").fadeOut(5000, function(){
		$(this).html("");
		$(this).fadeIn(3000);
		}); 
		}

		var limpiar_datos = function(){
		$("#opcion").val("registrar");
		$("#id").val("");
		$("#nombreusuario").val("").focus();
		$("#hobby").val("");
		}


       //Al presionar el boton btn_listar, ocurrira la función listar()
       $("#btn_listar").on("click", function(){
       		console.log("Probando btn listar");
       		listar();
       });

       //La funcíón listar transforma el table "dt_cliente" en un Datatable y trae los datos del servidor 
    	var listar = function(){
    		var table = $("#dt_cliente").DataTable({
    			"destroy": true,
    			"ajax":{
    				"method":"POST",
    				"url":"listarUsuario.php"
    			},
    			"columns":[
    				{"data":"id"},
    				{"data":"nombre"},
    				{"data":"hobby"},
    				{"defaultContent":'<button type="button" id="buttonEditar" class="editar btn btn-primary"><i class="fa fa-pencil-square-o"></i></button> <button type="button" id="buttonEliminar" class="eliminar btn btn-danger" data-toggle="modal" data-target="#modalEliminar"><i class="fa fa-trash-o"></i></button>'},
    			],
    			"language": idioma_espanol,
    		});

    		obtener_data_editar("#dt_cliente", table);

    		obtener_id_eliminar("#dt_cliente", table);


    	}

    	var obtener_data_editar = function(tbody, table){
    		$(tbody).on("click", "#buttonEditar", function(){
    			var data = table.row( $(this).parents("tr")).data();
    			var idusuario = $("#id").val(data.id),
    				nombre = $("#nombreusuario").val(data.nombre),
    				hobby = $("#hobby").val(data.hobby);
    			console.log(data);	
    		});
    	}

    	var obtener_id_eliminar = function(tbody, table){
    		$(tbody).on("click", "#buttonEliminar", function(){
    			var data = table.row( $(this).parents("tr")).data();
    			var idusuario = $("#frmEliminarUsuario #idusuarioeliminar").val(data.id);
    			console.log(data);	
    		});
    	}



    	var idioma_espanol = {
							    "aria": {
							        "sortAscending": ": orden ascendente",
							        "sortDescending": ": orden descendente"
							    },
							    "autoFill": {
							        "cancel": "Cancelar",
							        "fill": "Llenar todas las celdas con <i>%d&lt;\\\/i&gt;<\/i>",
							        "fillHorizontal": "Llenar celdas horizontalmente",
							        "fillVertical": "Llenar celdas verticalmente"
							    },
							    "buttons": {
							        "collection": "Colección <span class=\"ui-button-icon-primary ui-icon ui-icon-triangle-1-s\"><\/span>",
							        "colvis": "Visibilidad de la columna",
							        "colvisRestore": "Restaurar visibilidad",
							        "copy": "Copiar",
							        "copyKeys": "Presiona ctrl or u2318 + C para copiar los datos de la tabla al portapapeles.<br \/><br \/>Para cancelar, haz click en este mensaje o presiona esc.",
							        "copySuccess": {
							            "_": "Copió %ds registros al portapapeles",
							            "1": "Copió un registro al portapapeles"
							        },
							        "copyTitle": "Copiado al portapapeles",
							        "csv": "CSV",
							        "excel": "Excel",
							        "pageLength": {
							            "_": "Mostrar %ds registros",
							            "-1": "Mostrar todos los registros"
							        },
							        "pdf": "PDF",
							        "print": "Imprimir"
							    },
							    "datetime": {
							        "amPm": [
							            "AM",
							            "PM"
							        ],
							        "hours": "Horas",
							        "minutes": "Minutos",
							        "months": {
							            "0": "Enero",
							            "1": "Febrero",
							            "10": "Noviembre",
							            "11": "Diciembre",
							            "2": "Marzo",
							            "3": "Abril",
							            "4": "Mayo",
							            "5": "Junio",
							            "6": "Julio",
							            "7": "Agosto",
							            "8": "Septiembre",
							            "9": "Octubre"
							        },
							        "next": "Siguiente",
							        "previous": "Anterior",
							        "seconds": "Segundos",
							        "weekdays": [
							            "Dom",
							            "Lun",
							            "Mar",
							            "Mie",
							            "Jue",
							            "Vie",
							            "Sab"
							        ]
							    },
							    "decimal": ",",
							    "editor": {
							        "close": "Cerrar",
							        "create": {
							            "button": "Nuevo",
							            "submit": "Crear",
							            "title": "Crear nuevo registro"
							        },
							        "edit": {
							            "button": "Editar",
							            "submit": "Actualizar",
							            "title": "Editar registro"
							        },
							        "error": {
							            "system": "Ocurrió un error de sistema (&lt;a target=\"\\\" rel=\"nofollow\" href=\"\\\"&gt;Más información)."
							        },
							        "multi": {
							            "info": "Los elementos seleccionados contienen diferentes valores para esta entrada. Para editar y configurar todos los elementos de esta entrada con el mismo valor, haga clic o toque aquí, de lo contrario, conservarán sus valores individuales.",
							            "noMulti": "Esta entrada se puede editar individualmente, pero no como parte de un grupo.",
							            "restore": "Deshacer cambios",
							            "title": "Múltiples valores"
							        },
							        "remove": {
							            "button": "Eliminar",
							            "confirm": {
							                "_": "¿Está seguro de que desea eliminar %d registros?",
							                "1": "¿Está seguro de que desea eliminar 1 registro?"
							            },
							            "submit": "Eliminar",
							            "title": "Eliminar registro"
							        }
							    },
							    "emptyTable": "Sin registros",
							    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
							    "infoEmpty": "Mostrando 0 a 0 de 0 registros",
							    "infoFiltered": "(filtrado de _MAX_ registros)",
							    "infoThousands": ".",
							    "lengthMenu": "Mostrar _MENU_ registros",
							    "loadingRecords": "Cargando...",
							    "paginate": {
							        "first": "Primero",
							        "last": "Último",
							        "next": "Siguiente",
							        "previous": "Anterior"
							    },
							    "processing": "Procesando...",
							    "search": "Buscar:",
							    "searchBuilder": {
							        "add": "Agregar Condición",
							        "button": {
							            "_": "Filtros (%d)",
							            "0": "Filtrar"
							        },
							        "clearAll": "Limpiar Todo",
							        "condition": "Condición",
							        "conditions": {
							            "array": {
							                "contains": "Contiene",
							                "empty": "Vacío",
							                "equals": "Igual",
							                "not": "Distinto",
							                "notEmpty": "No vacío",
							                "without": "Sin"
							            },
							            "date": {
							                "after": "Mayor",
							                "before": "Menor",
							                "between": "Entre",
							                "empty": "Vacío",
							                "equals": "Igual",
							                "not": "Distinto",
							                "notBetween": "No entre",
							                "notEmpty": "No vacío"
							            },
							            "number": {
							                "between": "Entre",
							                "empty": "Vacío",
							                "equals": "Igual",
							                "gt": "Mayor",
							                "gte": "Mayor o igual",
							                "lt": "Menor",
							                "lte": "Menor o igual",
							                "not": "Distinto",
							                "notBetween": "No entre",
							                "notEmpty": "No vacío"
							            },
							            "string": {
							                "contains": "Contiene",
							                "empty": "Vacío",
							                "endsWith": "Termina con",
							                "equals": "Igual",
							                "not": "Distinto",
							                "notEmpty": "No vacío",
							                "startsWith": "Comienza con"
							            }
							        },
							        "data": "Datos",
							        "deleteTitle": "Eliminar regla de filtrado",
							        "leftTitle": "Filtros anulados",
							        "logicAnd": "Y",
							        "logicOr": "O",
							        "rightTitle": "Filtro",
							        "title": {
							            "_": "Filtros (%d)",
							            "0": "Filtrar"
							        },
							        "value": "Valor"
							    },
							    "searchPanes": {
							        "clearMessage": "Limpiar todo",
							        "collapse": {
							            "_": "Paneles de búsqueda (%d)",
							            "0": "Paneles de búsqueda"
							        },
							        "count": "{total}",
							        "countFiltered": "{shown} ({total})",
							        "emptyPanes": "Sin paneles de búsqueda",
							        "loadMessage": "Cargando paneles de búsqueda...",
							        "title": "Filtros activos - %d"
							    },
							    "select": {
							        "cells": {
							            "_": "%d celdas seleccionadas",
							            "1": "Una celda seleccionada"
							        },
							        "columns": {
							            "_": "%d columnas seleccionadas",
							            "1": "Una columna seleccionada"
							        },
							        "rows": {
							            "1": "Una fila seleccionada",
							            "_": "%d filas seleccionadas"
							        }
							    },
							    "thousands": ".",
							    "zeroRecords": "No se encontraron registros"
							} 
    </script>

					    	<!--<script>
					    		//Función para listar datos. Se reemplazo por el método listar, pero aun sirve para hacer pruebas.
					    		var mostrarDatos = function(id){
									//var id = '<?=$id?>';
									$.ajax({
										type:"POST",
										url:"listarUsuario.php",
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
							</script>-->

</body>
</html>

