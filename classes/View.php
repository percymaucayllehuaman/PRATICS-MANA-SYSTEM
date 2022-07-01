<?php


class View {
    
    public static function render($view, $data = [])
    {
        // Convertir el array asociativo en objeto
        $d = to_object($data); // $data en array assoc o $d en objectos

        if(!is_file(VIEWS.CONTROLLER.DS.$view.'_view.php')) {
            echo VIEWS.CONTROLLER.DS.$view.'_view.php';
            die(sprintf('No existe la vista "%s_view" en la carpeta "%s".', $view, CONTROLLER));
        }

        require_once VIEWS.CONTROLLER.DS.$view.'_view.php';
        exit(); 
    }
}