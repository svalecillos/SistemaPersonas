<?php 

//FUNCIONES PARA EL CONTROLADOR FRONTAL
function loadController($controller){
    $nameController = ucwords($controller).'Controller';
    $fileController = 'controller/'.$nameController.'.php';

    //Si no existe el archivo, cargara el controlador por defecto
    if(!is_file($fileController))
    {
        $fileController='controller/'.ucwords(DEFAULT_CONTROLLER).'Controller.php';
    }

    //Importamos el nombre del controlador y instanciamos el objeto
    require_once $fileController;
    $objController = new $nameController();
    return $objController;
}

function executeAction($objController, $action){
	//$accion=$action;
	$objController->$action();
}

function lanzarAction($objController){
    if(isset($_GET["action"]) && method_exists($objController, $_GET["action"])){
        executeAction($objController, $_GET["action"]);
    }else{
        executeAction($objController, DEFAULT_ACTION);
    }
}

?>