<?php 
class Adminlogout_controller extends Controller{
    
    function __construct()
    {
        
    }

    function index(){
        // view::render('index',['module' => 'adminlogout']);
        session_destroy();
        Redirect::to('login');
    }
}


?>