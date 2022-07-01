<?php


class Practitionerlogout_controller extends Controller{

    function __construct()
    {
        
    }

    function index(){
        // View::render("index",['module' => 'logout']);
        session_destroy();
        Redirect::to('login');
    }
}