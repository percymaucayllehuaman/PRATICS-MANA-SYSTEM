<?php 
class Practitionervisitas_controller extends Controller{
    
    function __construct()
    {
        
    }

    function index(){
        View::render('index',['module' => 'Perfil']);
    }
}

?>