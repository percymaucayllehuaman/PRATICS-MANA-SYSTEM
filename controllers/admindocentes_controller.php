<?php 
class Admindocentes_controller extends Controller{
    
    function __construct()
    {
        
    }

    function index(){
        view::render('index',['module' => 'admindocentes']);
    }
}


?>