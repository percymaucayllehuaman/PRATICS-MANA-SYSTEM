<?php 
class Adminespecialidad_controller extends Controller{
    
    function __construct()
    {
        
    }

    function index(){
        view::render('index',['module' => 'adminespecialidad']);
    }
}


?>