<?php 

class PersonaController extends BaseController{
    
    public $connect;
    public $adapter;

    public function __construct() {
        parent::__construct();
        $this->connect = new Connect();
        $this->adapter = $this->connect->Connection();
    }

    /**Carga la vista donde se listan las personas registradas */
    public function index(){
        $persona=new Persona($this->adapter);
        $allpersona=$persona->getAll();
        
        //Cargamos la vista index y le pasamos valores
        $this->view("index",array(
            "allpersona"=>$allpersona,
            "id"=>1
        ));
    }

    /**Carga la vista para registrar una persona */
    public function registerView(){
        $this->view("register", array());
    }

    /**Carga la vista para modificar a una persona*/
    public function updateView(){
        if(isset($_GET["id"])){
            $idPersona = $_GET["id"];
            $persona=new Persona($this->adapter);
            $datosPersona=$persona->getById($idPersona);
            $this->view("update", array(
                "datosPersona" => $datosPersona
            ));
        }
    }

    /**Metodo que inserta una persona a la db*/
    public function register(){
        $persona=new Persona($this->adapter);
        if(isset($_POST["nombre"])){
            $persona->setNombre(trim($_POST["nombre"]));
            $persona->setEmail(trim($_POST["email"]));
            $persona->setTelefono(trim($_POST["telefono"]));

             mail($persona->getEmail(),"Sistema de personas","Bienvenido al sistema, su usuario a sido registrado satisfactoriamente");
            $successful=$persona->save();
            if($successful == 1){
                $_SESSION["msjSuccessful"] = "La persona a sido registrada exitosamente";
                $this->redirect("persona","index");
            }else{
                $_SESSION["msjError"] = "Error al registrar la persona";
                $this->redirect("persona","index");
            }
        }
    }

    public function update(){
        $persona=new Persona($this->adapter);
        if(isset($_POST["nombre"])){
            $persona->setId($_POST["idPersona"]);
            $persona->setNombre(trim($_POST["nombre"]));
            $persona->setEmail(trim($_POST["email"]));
            $persona->setTelefono(trim($_POST["telefono"]));
            $successful=$persona->update();
            if($successful == 1){
                $_SESSION["msjSuccessful"] = "Los datos de la persona se modificaron con exito";
                $this->redirect("persona","index");
                //Con mensaje
            }else{
                $_SESSION["msjSuccessful"] = "Error al modificar la persona";
                $this->redirect("persona","index");
            }
        }
    }

    public function delete(){
        if(isset($_GET["id"])){
            $idPersona = (int)$_GET["id"];

            $persona=new Persona($this->adapter);
            $successful=$persona->deleteById($idPersona);
            if($successful == 1){
                $this->redirect("persona","index");
                $_SESSION["msjSuccessful"] = "Registro eliminado con exito";
            }
        }
    }
}
?>