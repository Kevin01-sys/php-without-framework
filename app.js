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
    				{"defaultContent":'<button type="button" id="buttonEditar" class="editar btn btn-primary"><i class="fa fa-pencil-square-o"></i></button> <button type="button" id="buttonEliminar" class="eliminar btn btn-danger" data-toggle="modal" data-target="#modalEliminar"><i class="fa fa-trash-o"></i></button> '},
    			],
    			"language": idioma_espanol,
    		});

    		obtener_data_editar("#dt_cliente", table);

    		obtener_id_eliminar("#dt_cliente", table);


    	}
    	//Se obtienen las variables de la fila editar 
    	var obtener_data_editar = function(tbody, table){
    		$(tbody).on("click", "#buttonEditar", function(){
    			var data = table.row( $(this).parents("tr")).data();
    			var idusuario = $("#id").val(data.id),
    				nombre = $("#nombreusuario").val(data.nombre),
    				hobby = $("#hobby").val(data.hobby);
    			console.log(data);	
    		});
    	}
       // Se envian los datos para editar el usuario 
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
    	//Se obtienen las variables de la fila a eliminar
    	var obtener_id_eliminar = function(tbody, table){
    		$(tbody).on("click", "#buttonEliminar", function(){
    			var data = table.row( $(this).parents("tr")).data();
    			var idusuario = $("#frmEliminarUsuario #idusuarioeliminar").val(data.id);
    			console.log(data);	
    		});
    	}
    	// Se elimina el usuario al cambiar su estado a 0. 
       var eliminar = function(){
       	$("#eliminar-usuario").on("click",function(){
       		var idusuario = $("#frmEliminarUsuario #idusuario").val(),
       			opcion = $("#frmEliminarUsuario #opcion").val();
       			console.log(idusuario+opcion);
       			$.ajax({
       				method: "POST",
       				url: "guardar.php",
       				data: {"idusuario": idusuario,"opcion": opcion}
       			}).done(function(info){
       				var json_info=JSON.parse(info);
       				mostrar_mensaje(json_info);
       				limpiar_datos();
       				listar();
       			})
       	});
       }
		// Función que se usa para mostrar un mensaje en pantalla
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

		//Limpia los campos
		var limpiar_datos = function() {
		    $("#opcion").val("registrar");
		    $("#id").val("");
		    $("#nombreusuario").val("").focus();
		    $("#hobby").val("");
		}
		// Variable que se usa para configurar el Data table en idioma espanol			
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
		//Función para listar datos. Se reemplazo por el método listar, pero aun sirve para hacer pruebas.
		/*var mostrarDatos = function(id) {
		    //var id = '<?=$id?>';
		    $.ajax({
		        type: "POST",
		        url: "listarUsuario.php",
		        dataType: "json",
		        data: {
		            'id': id
		        },
		        success: function(data) {
		            $('#test').html(data);
		            console.log(data);
		            //$('#test').value(data);
		            //$('#test').innerhtml(data);
		            //$('#test').load(data);
		        }
		    });
		}*/