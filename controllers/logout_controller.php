<?php

class Logout_controller{

    function __construct()
    {
        
    }

    function logout(){
        session_destroy();
        Redirect::to('login');
    }
}
?>