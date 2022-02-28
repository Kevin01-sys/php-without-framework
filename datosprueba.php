<?php

$conexion=mysqli_connect('localhost','root','1234','prueba');
$id_categoria=$_POST['id_categoria'];
$nivel=$_POST['nivel'];
$data = array();


$sql="SELECT *
FROM t_mundo 
WHERE id_continente='$id_categoria' AND id='$nivel'";

//$sql="SELECT *
//FROM t_mundo 
//WHERE id_continente='1' AND id='1'";

$query=mysqli_query($conexion,$sql);
   if($query->num_rows > 0){
        $userData = $query->fetch_assoc();
        $data['status'] = 'ok';
        $data['result'] = $userData;
    }else{
        $data['status'] = 'err';
        $data['result'] = '';
        }
//echo $id_categoria.$nivel;
//echo $query;

//returns data as JSON format
echo json_encode($data);


?>