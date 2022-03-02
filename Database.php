<?php

class Database{

    protected $db;//sera una instancia de la clase mysqli
    protected $prep;/*sera una instancia del objeto que devuelve el metodo "prepare" de la instancia $db de la clase mysqli*/
    protected $consulta;/*sera la consulta sql que enviaremos como parametro al metodo preparar*/
    protected $resultado;/*se usará para validar los datos del usuario*/


    /*En el metodo constructor de la clase, $db pasara a ser una instancia de la clase mysqli, despúes verificamos que no haya habido algún error, usando la propiedad "connect_errno" que devolvera un codigo de error, si envia 0 entonces no ocurrieron errores. (0 = false).*/

    public function __construct($dbhost, $dbuser, $db_pass, $db_name){
        $this->db= new mysqli($dbhost, $dbuser, $db_pass, $db_name);
        if($this->db->connect_errno){
            echo "error<br>Fallo la conexion con Mysql, tipo de error -> ({$this->db->connect_error}) <a href='index.php'>Regresar</a>";  
        }
    }
    /*El método "query" es directo de la instancia $db de la clase mysqli, nos permite hacer una consulta directa, la uso en este "validadDatos" para corroborar si el usuario ya existe, enviándole de parametros, la columna que queremos, de que tabla y bajo que condición, es un SELECT sencillo.*/

    public function validarDatos($columna, $tabla, $condicion){
        $this->resultado= $this->db->query("SELECT $columna FROM $tabla WHERE $columna = '$condicion'");
        $chequear= $this->resultado->num_rows;
        return $chequear; 
    }

    /*En el metodo preparar, recibiremos la consulta como parametro y se la daremos al metodo "prepare" que la preparara; mandara false si el servidor tuvo problemas con la sentencia de consulta.*/

    public function preparar($consulta){
        $this->consulta= $consulta;
        $this->prep= $this->db->prepare($this->consulta);
        if(!$this->prep){
            //echo ($this->prep);
            echo("Error al preparar la consulta. <a href='index.php'>Regresar</a>");
        } 
        else {
            echo ("Sentencia preparada con éxito");
        }
    }



}
?>