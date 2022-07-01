<?php

class Teacherasistencia_controller extends Controller{
    function __construct()
    {
        
    }

    function index(){
        View::render('index',['module' => 'asistencia practicante']);
    }
}