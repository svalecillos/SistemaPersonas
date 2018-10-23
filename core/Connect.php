<?php 
/**
 * Clase que nos permite iniciar la conexion a la base de datos
 * usando MySQLi. 
 */
class Connect{
    private $driver;
    private $host, $user, $password, $database, $charset;
    
    function __construct(){
		$connectionData = require_once 'config/database.php';
		$this->driver = $connectionData["driver"];
		$this->host = $connectionData["host"];
		$this->user = $connectionData["user"];
		$this->password = $connectionData["password"];
		$this->database = $connectionData["database"];
		$this->charset = $connectionData["charset"];
    }
    
    public function Connection(){

			if($this->driver == "mysql" || $this->driver == null){
			   $connection = new mysqli($this->host, $this->user, $this->password, $this->database);
			   $connection->query("SET NAMES '".$this->charset."'");
			}
			return $connection;
		}
		
}
?>