<?php 
class Adminconvenios_controller extends Controller{
    
    function __construct()
    {
        
    }

    function index(){
        if (!Auth::validate()) {
            Flasher::new('Debes iniciar sesión primero.', 'danger');
            Redirect::to('login');
        }
        View::render('index',['module' => 'admincontroller']);
    }

    function registro(){
        if (!Auth::validate()) {
            Flasher::new('Debes iniciar sesión primero.', 'danger');
            Redirect::to('login');
        }
        View::render('index',['module' => 'admincontroller']);

    }

    function register(){
        echo "registrar convenio";
        return;
    }

   

}


?>