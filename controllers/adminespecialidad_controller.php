<?php 
class Adminespecialidad_controller extends Controller{
    
    function __construct()
    {
        
    }

    static function index(){
        if (!Auth::validate()) {
            Flasher::new('Debes iniciar sesión primero.', 'danger');
            Redirect::to('login');
        }
        view::render('index',['module' => 'adminespecialidad']);
    }


   
}


?>