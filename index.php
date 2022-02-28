<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Llenar select a partir de otro con php y mysql</title>
	<script
	src="https://code.jquery.com/jquery-3.3.1.min.js"
	integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
	crossorigin="anonymous"></script>
	<script src="js/jquery-2.1.0.min.js"></script>
	
</head>
<body>
	<h2>Llenar un select a partir de otro select con jquery y php</h2>

			<label>SELECT 1 (Categoria)</label>
			<select id="lista1" name="lista1">
				<option value="0">Selecciona una categoria</option>
				<option value="1">A</option>
				<option value="2">B</option>
				<option value="3">C</option>
				<option value="4">D</option>
			</select>
			<br>
			<label>SELECT 2 (Niveles)</label>
			<select id="lista2" name="lista2">
				<option value="0">Selecciona un nivel</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
			</select>
			<br>


			<input type="text" id="sueldo">
			<input type="text" id="primaria">
			<input type="text" id="ley">

</body>
</html>
<script >
	$(document).ready(function(){

		 $('#lista2').change(function(){
		 	//console.log("Probando 5,6,7");
		 	mostrarDatos();
		 	})
		 $('#lista1').change(function(){
		 	//console.log("Probando 1,2,3");
		 	mostrarDatos();

		 })
	})
</script>

<script >
	function mostrarDatos(){
		$.ajax({
			type:"POST",
			url:"datosprueba.php",
			dataType: "json",
			data: {'id_categoria': $('#lista1').val(),
				   'nivel': $('#lista2').val()},
				   
			success:function(data){
				if(data.status == 'ok') {
					document.getElementById("sueldo").value = data.result.id;
					document.getElementById("primaria").value = data.result.id_continente;
					document.getElementById("ley").value = data.result.pais;

				} else 
				{
					document.getElementById("sueldo").value = "Nivel y Categoria deben ser seleccionados" ;
					document.getElementById("primaria").value = "Nivel y Categoria deben ser seleccionados";
					document.getElementById("ley").value = "Nivel y Categoria deben ser seleccionados";
				}
			}
		});
	}
</script>
