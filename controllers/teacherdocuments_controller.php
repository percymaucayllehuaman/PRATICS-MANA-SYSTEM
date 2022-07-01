<?php


class Teacherdocuments_controller extends Controller{


    function __construct()
    {
        
    }

    function index(){

        View::render('index',['module' => 'teacher documents']);
    }
}
