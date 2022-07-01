<?php

class Teacherlogout_controller extends Controller{


    function __construct()
    {
        
    }

    function index(){
        // View::render('index',['module' => 'teacherlogout']);
        session_destroy();
        Redirect::to('login');
    }
}