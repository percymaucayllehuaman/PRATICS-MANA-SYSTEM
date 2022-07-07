<?php

class Logout_controller{

    function __construct()
    {
        
    }

    function logout(){
        Auth::logout();
        session_destroy();
        Redirect::to('login');
    }
}
?>