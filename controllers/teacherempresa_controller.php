<?php
class Teacherempresa_controller extends Controller{

    function __construct()
    {
        
    }

    function index(){
        View::render('index', ['module' => 'module teacherempresa']);
    }
}