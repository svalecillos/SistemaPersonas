<?php 
/**
 * Esta clase sera heredada de los modelos que representen 
 * entidades, aqui estaran definidos los metodos que necesitemos
 * para ayudarnos con las peticiones a la DB.
 */
class BaseEntity{

    private $table;
	private $db;
    private $connection;
    
    function __construct($table, $adapter){
		$this->table=(string) $table;
		$this->connection = null;
		$this->db = $adapter;
    }
    
    public function getConnection(){
        return $this->connection;
    }

    public function getDb(){
        return $this->db;
    }
    
    //Metodo que devuelte todos los registros de una tabla
    public function getAll(){
		$query=$this->db->query("SELECT * FROM $this->table ORDER BY id DESC");	
			
		//DEVOLVEMOS EL RESULTADO EN FORMA DE UN ARRAY DE OBJETOS
		while($row=$query->fetch_object()){
			$resultSet[] = $row;
        }
        return $resultSet;
    }
    
    //Consulta un registro de una tabla desde el id que recibe por parametro
    public function getById($id){
		$query=$this->db->query("SELECT * FROM $this->table WHERE id=$id");	

        while($row=$query->fetch_object()){
				$resultSet[] = $row;
		}
		return $resultSet;
    }
    
    //Elimina un registro por id
    public function deleteById($id){
        $query=$this->db->query("DELETE FROM $this->table WHERE id=$id");
        return $query;
    }

}
?>