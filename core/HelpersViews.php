<?php 
/**
 * Clase que define los metodos para usarlos en las views
 */
class HelpersViews{

    public function url($controller=DEFAULT_CONTROLLER,$action=DEFAULT_ACTION){
        $url="index.php?controller=".$controller."&action=".$action;
        return $url;
    }
}
?>