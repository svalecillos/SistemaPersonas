<?php 

class Persona extends BaseEntity{

    private $id;
    private $nombre;
    private $email;
    private $telefono;
    private $fecha;

    function __construct($adapter){
		$table = "personas";
		parent::__construct($table,$adapter);
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }
    
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function save(){
        $query="INSERT INTO personas (id,nombre,email,telefono)
                VALUES(NULL,
                       '".$this->nombre."',
                       '".$this->email."',
                       '".$this->telefono."');";
        $save=$this->getDb()->query($query);
        //$this->db()->error;
        return $save;
    }

    public function update(){
        $query = "UPDATE personas SET 
                    nombre='" . $this->nombre . "', 
                    email='" . $this->email . "', 
                    telefono='" . $this->telefono . "' 
                    WHERE id='" . $this->id . "'";
        $update = $this->getDb()->query($query);
        return $update;
    }
}

?>