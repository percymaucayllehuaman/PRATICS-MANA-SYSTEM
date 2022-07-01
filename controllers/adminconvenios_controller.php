<?php 
class Adminconvenios_controller extends Controller{
    
    function __construct()
    {
        
    }

    function index(){
        view::render('index',['module' => 'admincontroller']);
    }
}


?>