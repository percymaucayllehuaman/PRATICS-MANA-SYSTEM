<?php

class Teacherppp_controller extends Controller{

    function __construct()
    {
        
    }

    static function index(){
        if (!Auth::validate()) {
            Flasher::new('Debes iniciar sesión primero.', 'danger');
            Redirect::to('login');
        }
        View::render('index',['module' => 'teacher ppp']);
    }

    static function show_ppp(){
        //using ajax
        if($_POST){
            if($_POST['select_especialidad_pp'] && $_POST['select_module_pp'] && $_POST['select_year_visi'] && $_POST['select_period_visi']){
                $select_especialidad_pp = scape_string(clean($_POST['select_especialidad_pp']));
                $select_module_pp = scape_string(clean($_POST['select_module_pp']));
                $select_year_visi = scape_string(clean($_POST['select_year_visi']));
                $select_period_visi = scape_string(clean($_POST['select_period_visi']));
                $practicas = new Practicas_model();
                $p = $practicas->get_practicas_by_Es_Mod_Anio_Periodo($select_especialidad_pp, $select_module_pp, $select_year_visi,$select_period_visi,$_SESSION['USER-LOGIN']->usuario);

                echo json_encode(array('success' => $p->fetchAll()));  //$p->fetchObject()
            }else{
                echo json_encode(array('success' => null));
            }
        }else{
            echo json_encode(array('success' => null));
        }
    }
}