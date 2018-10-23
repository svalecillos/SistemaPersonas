<?php ob_start(); session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />        <title>Home</title>
        <style>
            input{
                margin-top:5px;
                margin-bottom:5px;
            }
            .right{
                float:right;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <?php 
                //Configuración global
                require_once 'config/global.php';

                //Base para los controladores
                require_once 'core/BaseController.php';
                
                //Funciones para el controlador frontal
                require_once 'core/FunctionsController.php';

                //Cargamos controladores y acciones
                if(isset($_GET["controller"])){
                    $controllerObj=loadController($_GET["controller"]);
                    lanzarAction($controllerObj);
                }else{
                    $controllerObj=loadController(DEFAULT_CONTROLLER);
                    lanzarAction($controllerObj);
                }
                ?>
                <footer class="col-lg-12">
                    <hr/>
                    Desarrollado por <a href="https://www.linkedin.com/in/svalecillos-93/">- Saul Valecillos -</a>  Copyright &copy; <?php echo  date("Y"); ?>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="public/js/plugins/jquery.validate.js"></script>
        <script src="public/js/validateForm.js"></script>
    </body>
</html>
<?php ob_end_flush(); ?>

