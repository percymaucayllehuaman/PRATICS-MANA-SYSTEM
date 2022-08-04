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
                $v = new Visitassupervision_model();
                // var_dump($v);
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
}


?>