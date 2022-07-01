<?php 
class Practitionerdocuments_controller extends Controller{
    
    function __construct()
    {
        
    }

    function index(){
        View::render('index',['module' => 'Perfil']);
    }
}

?>