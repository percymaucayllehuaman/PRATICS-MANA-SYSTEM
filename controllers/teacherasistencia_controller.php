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
    
    public static function validate_asistencia_actividad(){
        if($_POST){
            $id_asistencia_actividad = scape_string(clean($_POST['id_asistencia_actividad']));
            $fechaValidate_asistencia_actividad = scape_string(clean($_POST['fechaValidate_asistencia_actividad']));
            
            if($id_asistencia_actividad && $fechaValidate_asistencia_actividad){
                require_once(MODELS.'asistenciaactividad_model.php');
                $a = new Asistenciaactividad_model();
                $date = '0000-00-00 00:00:00';
                $r = 0;
                //echo json_encode(array('success' => 1, 'id_asistencia_actividad' => $id_asistencia_actividad, 'date_asistenciaactividad' => $fechaValidate_asistencia_actividad ));
                if($fechaValidate_asistencia_actividad == '0000-00-00 00:00:00'){
                    $date = date('Y-m-d H:i:s');  
                    $res = $a->update_date_asistenciaActividad($id_asistencia_actividad,$date);
                    if($res){
                        $r = 1;
                    }
                }else{
                    $res = $a->update_date_asistenciaActividad($id_asistencia_actividad,$date);
                    if($res){
                        $r = 2;
                    }
                }
                echo json_encode(array('success' => 1, 'id_asistencia_actividad' => $id_asistencia_actividad, 'date_asistenciaactividad' => $date ));
            }else{
                echo json_encode(array('success' => null));
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