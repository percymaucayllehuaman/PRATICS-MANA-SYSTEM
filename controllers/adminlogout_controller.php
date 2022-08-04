<?php 
class Adminlogout_controller extends Controller{
    
    function __construct()
    {
        
    }

    static function index(){
        Auth::logout();
        Auth::logout();
        unset($_SESSION['USER-LOGIN']);
        unset($_SESSION['user_session']);
        session_destroy();
        Redirect::to('login');
    }
}


?>