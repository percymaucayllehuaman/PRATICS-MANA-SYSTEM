<?php 
class Teachervisitas_controller extends Controller{

    function __construct (){
    }

    static function index(){
        if (!Auth::validate()) {
            Flasher::new('Debes iniciar sesión primero.', 'danger');
            Redirect::to('login');
        }
        View::render('index',['module' => 'teacher visitas']);
    }
    
    static function show_teacher_visitas(){
        if($_POST){
            $select_especialidad_visitas = scape_string(clean($_POST['select_especialidad_visitas']));
            $select_module_visitas = scape_string(clean($_POST['select_module_visitas']));
            $select_dni_visitas = scape_string(clean($_POST['select_dni_visitas']));
            if($select_especialidad_visitas &&  $select_module_visitas &&  $select_dni_visitas){
                require_once(MODELS.'visitassupervision_model.php');
                $v = new Visitassupervision_model();
                $ressult = $v->get_visitassu_to_teacher($select_especialidad_visitas, $select_module_visitas, $select_dni_visitas);
                if($ressult){
                    $_SESSION['data_visitas'] = $ressult;
                }
                Redirect::to('teachervisitas');
            }else{
                Flasher::flash('Ingrese todos lo campos','waning');
                echo "<script>window.history.go(-1)</script>";
            }
        }else{
            Flasher::flash('Pagina no encontrada','danger');
            Redirect::to('teachervisitas');
        }
    }

    public function show_visitas(){
        if($_POST){
            $select_especialidad_visitas = scape_string(clean($_POST['select_especialidad_visitas']));
            $select_module_visitas = scape_string(clean($_POST['select_module_visitas']));
            $select_dni_visitas = scape_string(clean($_POST['select_dni_visitas']));
            if($select_especialidad_visitas &&  $select_module_visitas &&  $select_dni_visitas){
                require_once(MODELS.'visitassupervision_model.php');
                $v = new Visitassupervision_model();
                $res = $v->get_visitassu_by_EspModDNIPract($select_especialidad_visitas, $select_module_visitas,$select_dni_visitas);
                if($res){
                    echo json_encode(array('success' => $p->fetchAll(PDO::FETCH_ASSOC)));
                }else{
                    echo json_encode(array('success' => 0));
                }
            }else{
                echo json_encode(array('success' => null));
            }
        }
        //get_visitassu_by_EspModDNIPract
    }


    public static function load_modules(){
        if($_POST){
            if($_POST['select_especialidad_visitas']){
                $select_especialidad_visitas = scape_string(clean($_POST['select_especialidad_visitas']));
                
                require_once(MODELS.'modulo_model.php');
                $asis_act = new Modulo_model();
                $p = $asis_act->get_modulos_by_Id_especialidad($select_especialidad_visitas);
                echo json_encode(array('success' => $p->fetchAll(PDO::FETCH_ASSOC)));  //$p->fetchObject()
            }else{
                echo json_encode(array('success' => 1));
            }
        }else{
            echo json_encode(array('success' => null));
        }
    }

    public static function visita_sugerencia_update(){
        
        if($_POST){
            $id_visitas_supervision = scape_string(clean($_POST['id_visitas_supervision']));
            $sugerencias = scape_string(clean($_POST['sugerencias']));
            if($id_visitas_supervision && $sugerencias){
                require_once(MODELS.'visitassupervision_model.php');
                $v = new Visitassupervision_model();
                $res = $v->update_sugerencias($id_visitas_supervision,$sugerencias);
                if($res){
                    echo json_encode(array('success' => 1));
                }else{
                    echo json_encode(array('success' => 3));
                }
                
            }else{
                echo json_encode(array('success' => 3));
            }
        }else{
            echo json_encode(array('success' => 3));
        }
    }

    public static function visita_asistencia_update(){
        if($_POST){
            $id_visitas_supervision = scape_string(clean($_POST['id_visitas_supervision']));
            $asistencia = scape_string(clean($_POST['asistencia']));
            
            if($id_visitas_supervision){
                require_once(MODELS.'visitassupervision_model.php');
                $v = new Visitassupervision_model();
                $asis = '';
                if($asistencia == 'Si'){
                    $asis = 'No';
                }else if($asistencia == 'No'){
                    $asis = 'Si';
                }else{
                    $asis = 'Si';
                }
                $res = $v->update_asistencia($id_visitas_supervision,$asis);
                if($res){
                    echo json_encode(array('success' => 1, 'asistencia' => $asis));
                }else{
                    echo json_encode(array('success' => 3, 'error' => 'error'));
                }
                
            }else{
                echo json_encode(array('success' => 3, 'res' => 'No asistencia'));
            }
        }else{
            echo json_encode(array('success' => 3));
        }
    }

    public static function visita_actividad_update(){
        if($_POST){
            $id_visitas_supervision = scape_string(clean($_POST['id_visitas_supervision']));
            $actividad = scape_string(clean($_POST['actividad']));

            if($id_visitas_supervision){
                require_once(MODELS.'visitassupervision_model.php');
                $v = new Visitassupervision_model();
                $act = '';
                if($actividad == 'Si'){
                    $act = 'No';
                }else if($actividad == 'No'){
                    $act = 'Si';
                }else{
                    $act = 'Si';
                }
                $res = $v->update_actividad($id_visitas_supervision,$act);
                if($res){
                    echo json_encode(array('success' => 1, 'actividad' => $act));
                }else{
                    echo json_encode(array('success' => 3, 'error' => 'error'));
                }
                
            }else{
                echo json_encode(array('success' => 3, 'res' => 'No actividad'));
            }
        }else{
            echo json_encode(array('success' => 3));
        }
    }
    public static function visita_ausencia_update(){
        if($_POST){
            $id_visitas_supervision = scape_string(clean($_POST['id_visitas_supervision']));
            $ausencia = scape_string(clean($_POST['ausencia']));
            if($id_visitas_supervision){
                require_once(MODELS.'visitassupervision_model.php');
                $v = new Visitassupervision_model();
                $aus = '';
                if($ausencia == 'Si'){
                    $aus = 'No';
                }else if($ausencia == 'No'){
                    $aus = 'Si';
                }else{
                    $aus = 'Si';
                }
                $res = $v->update_ausencia($id_visitas_supervision,$aus);
                if($res){
                    echo json_encode(array('success' => 1, 'no_se_encontro' => $aus));
                }else{
                    echo json_encode(array('success' => 3, 'error' => 'error'));
                }
                
            }else{
                echo json_encode(array('success' => 3, 'res' => 'No ausencia'));
            }
        }else{
            echo json_encode(array('success' => 3));
        }
    }
}


?>