<?php 
/**
* clase Users
*/
class users_model extends Connect
{
	private $db; //sera una instancia de la clase mysqli
	private $users; // ser una instacia para dejar una lista completa de todos los usuarios
    protected $prep;/*sera una instancia del objeto que devuelve el metodo "prepare" de la instancia $db de la clase mysqli*/
    protected $consulta;/*sera la consulta sql que enviaremos como parametro al metodo preparar*/
    protected $resultado;/*se usará para validar los datos del usuario*/

	public function __construct(){
		$this->db = parent::connection();
		$this->users = array();
	}

	public function get_users(){
		$query = $this->db->query("SELECT * FROM usuarios");
		while ($rows = $query->fetch_assoc()){
			$this->users[] = $rows;
		}
		return $this->users;
	}
	
    /*El método "query" es directo de la instancia $db de la clase mysqli, nos permite hacer una consulta directa, la uso en este "validadDatos" para corroborar si el usuario ya existe, enviándole de parametros, la columna que queremos, de que tabla y bajo que condición, es un SELECT sencillo.*/

    public function validarDatos($columna, $tabla, $condicion){
        $this->resultado= $this->db->query("SELECT $columna FROM $tabla WHERE $columna = '$condicion'");
        $chequear= $this->resultado->num_rows;
        return $chequear; 
    }

    /*En el metodo preparar, recibiremos la consulta como parametro y se la daremos al metodo "prepare" que la preparara; mandara false si el servidor tuvo problemas con la sentencia de consulta.*/

    public function preparar($consulta){
        $validar=null;
        $this->consulta= $consulta;
        $this->prep= $this->db->prepare($this->consulta);
        if(!$this->prep){
            return $validar;
            //echo("Error al preparar la consulta. <a href='index.php'>Regresar</a>");
        } 
        else {
            $validar=1;
            return $validar;
            //echo ("Sentencia preparada con éxito");
        }
    }
    /*Dado que "prepare" además de preparar la consulta devuelve un objeto tipo sentencia, es este último quien tiene el método "execute" el cual ejecuta la sentencia en el servidor.*/

    public function ejecutar(){
        // Se ejecuta la query solo si el método preparar es diferente de nulo
        if(!$this->prep){
            return null;
        } 
        else {
            return $this->prep->execute();
        }
    }


    /*Usaremos una función pública para acceder a la sentencia que es una variable encapsulada/protected desde afuera de la clase, ya que usaremos un método que posee.*/

    public function prep(){
        return $this->prep;
    }

    /*El metodo resultado hara uso del metodo fetch que trae una fila de la busquedad que haya hecho en la base de datos, dado que solo trae una, haremos uso de un ciclo while despúes, para que muestre todos los registros.*/

    public function resultado(){
        return $this->prep->fetch(); 
    }

    // método free_result() Libera la memoria de los resultados almacenados del gestor de sentencia dado
    public function liberar(){
        $this->prep->free_result();
    }

    //Al cerrar la consulta y despúes la "conexión" liberamos la memoria, es regla.
    public function cerrar(){
        $this->prep->close();
        $this->db->close();
    }
	
}
?>