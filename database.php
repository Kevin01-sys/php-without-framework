<?php

class Database{

    protected $db;//sera una instancia de la clase mysqli
    protected $prep;/*sera una instancia del objeto que devuelve el metodo "prepare" de la instancia $db de la clase mysqli*/
    protected $consulta;/*sera la consulta sql que enviaremos como parametro al metodo preparar*/


    /*En el metodo constructor de la clase, $db pasara a ser una instancia de la clase mysqli, despúes verificamos que no haya habido algún error, usando la propiedad "connect_errno" que devolvera un codigo de error, si envia 0 entonces no ocurrieron errores. (0 = false).*/

    public function __construct($dbhost, $dbuser, $db_pass, $db_name){
        $this->db= new mysqli($dbhost, $dbuser, $db_pass, $db_name);
        if($this->db->connect_errno){
            echo "error<br>Fallo la conexion con Mysql, tipo de error -> ({$this->db->connect_error}) <a href='index.php'>Regresar</a>";  
        }
    }
    
}
?>