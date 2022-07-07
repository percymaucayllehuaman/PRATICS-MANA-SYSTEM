<?php

class Teacherlogout_controller extends Controller{


    function __construct()
    {
        
    }

    function index(){
        // View::render('index',['module' => 'teacherlogout']);
        Auth::logout();
        Auth::logout();
        unset($_SESSION['USER-LOGIN']);
        unset($_SESSION['user_session']);
        session_destroy();
        Redirect::to('login');
    }
}