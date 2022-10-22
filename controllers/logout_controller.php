<?php

class Logout_controller{

    function __construct()
    {
        
    }

    static function logout(){
        Auth::logout();
        session_destroy();
        Redirect::to('login');
    }
}
?>