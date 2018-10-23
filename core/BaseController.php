<?php 
/**
* Clase que heredaran los controladores
*/
class BaseController{

	function __construct(){
		require_once 'Connect.php';
		require_once 'BaseEntity.php';
		//require_once 'BaseModel.php';

		//Incluir todos los modelos
		foreach (glob("model/*.php") as $file) {
			require_once $file;
		}
	}

    //Un  método para renderizar vistas.
	public function view($view,$arrData){
		foreach ($arrData as $id_assoc  => $value) {
			${$id_assoc}=$value;
		}

		require_once 'HelpersViews.php';
		$helper = new HelpersViews();

		require_once 'view/'.$view.'View.php';
	}

	// Metodo que redirecciona a un controlador
	public function redirect($controller=DEFAULT_CONTROLLER,$action=DEFAULT_ACTION){
		header("Location:index.php?controller=".$controller."&action=".$action);
	}
}
?>