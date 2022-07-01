<?php 
class Admindata_controller extends Controller{
    
    function __construct()
    {
        
    }

    function index(){
        view::render('index',['module' => 'admindata']);
    }
}


?>