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
					      <th scope="col"></th>
					      <td><button onclick="mostrarDatos(<?php echo $id; ?>)">Eliminar</button></td>
					    </tr>
				    </thead>
				</table>
				<div id="test">
					<input type="button" id="btn_listar" class="btn btn-primary" value="listar">
				</div>
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
       $(document).ready(function(){
          console.log("Probando document ready");
          listar();
       });
       $("#btn_listar").on("click", function(){
       		listar();
       });
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
    			],
    			"language": idioma_espanol,
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

					    	<script>
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
							</script>
