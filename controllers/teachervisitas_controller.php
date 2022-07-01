<?php 
class Teachervisitas_controller extends Controller{

    function __construct (){
    }

    function index(){
        View::render('index',['module' => 'teacher visitas']);
    }
}


?>