<?php

class Teacherasistencia_controller extends Controller{
    function __construct()
    {
        
    }

    static function index(){
        if (!Auth::validate()) {
            Flasher::new('Debes iniciar sesión primero.', 'danger');
            Redirect::to('login');
        }
        View::render('index',['module' => 'asistencia practicante']);
    }
    public static function show_asistencia(){
        //    using ajax
        if($_POST){
            if($_POST['select_especialidad_asis'] && $_POST['select_module_asis'] && $_POST['select_date_asis']){
                $select_especialidad_asis = scape_string(clean($_POST['select_especialidad_asis']));
                $select_module_asis = scape_string(clean($_POST['select_module_asis']));
                $select_date_asis = scape_string(clean($_POST['select_date_asis']));
                require_once(MODELS.'asistenciaactividad_model.php');
                $asis_act = new Asistenciaactividad_model();
                $p = $asis_act->list_students_asistencia_Teacher($select_especialidad_asis, $select_module_asis, $select_date_asis);
                echo json_encode(array('success' => $p->fetchAll()));  //$p->fetchObject()
            }else{
                echo json_encode(array('success' => 1));
            }
        }else{
            echo json_encode(array('success' => null));
        }
    }

    public static function load_modules(){
        if($_POST){
            if($_POST['select_especialidad_asis']){
                $select_especialidad_asis = scape_string(clean($_POST['select_especialidad_asis']));
                // $select_module_asis = scape_string(clean($_POST['select_module_asis']));
                // $select_date_asis = scape_string(clean($_POST['select_date_asis']));
                require_once(MODELS.'modulo_model.php');
                $asis_act = new Modulo_model();
                $p = $asis_act->get_modulos_by_Id_especialidad($select_especialidad_asis);
                echo json_encode(array('success' => $p->fetchAll(PDO::FETCH_ASSOC)));  //$p->fetchObject()
            }else{
                echo json_encode(array('success' => 1));
            }
        }else{
            echo json_encode(array('success' => null));
        }
    }
}