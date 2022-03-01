<?php

/*Con el require_once haremos uso del archivo Config.php donde guardamos en constantes los datos requeridos para conectarnos a la BD.*/
require_once "config.php";
require_once "database.php";

//$db= new Database(DB_HOST,DB_USER,DB_PASS,DB_NAME);

// mysqli, de manera procesal
//$conexion=mysqli_connect('localhost','root','1234','prueba');
// mysqli, de manera orientado a objetos
//$conexion=new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
// PDO
$conexion=new PDO("mysql:host=localhost;dbname=prueba",'root','1234');

$id_categoria=$_POST['id_categoria'];
$nivel=$_POST['nivel'];
$data = array();


$sql="SELECT *
FROM t_mundo 
WHERE id_continente='$id_categoria' AND id='$nivel'";

//$query=mysqli_query($conexion,$sql);
$query=$conexion->query("SELECT *
FROM t_mundo 
WHERE id_continente='$id_categoria' AND id='$nivel'");	

$numerofilas=$query->rowCount();


    //if($query->num_rows > 0){
    if($numerofilas > 0){
        $userData = $query->fetch(PDO::FETCH_ASSOC);
        $data['status'] = 'ok';
        $data['result'] = $userData;
    }else{
        $data['status'] = 'err';
        $data['result'] = '';
        }


//returns data as JSON format
echo json_encode($data);


?>