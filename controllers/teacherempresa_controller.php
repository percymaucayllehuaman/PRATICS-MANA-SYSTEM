<?php
class Teacherempresa_controller extends Controller{

    function __construct()
    {
        
    }

    static function index(){
        if (!Auth::validate()) {
            Flasher::new('Debes iniciar sesión primero.', 'danger');
            Redirect::to('login');
        }
        View::render('index', ['module' => 'module teacherempresa']);
    }

    static function show_empresas(){
    //    using ajax
        if($_POST){
            if($_POST['select_especialidad_emp'] && $_POST['select_module_emp']){
                $select_especialidad_emp = scape_string(clean($_POST['select_especialidad_emp']));
                $select_module_emp = scape_string(clean($_POST['select_module_emp']));
                require_once(MODELS.'practicas_model.php');
                $practicas = new Practicas_model();
                $p = $practicas->get_practicas_by_Esp_Mod_Empresa($select_especialidad_emp, $select_module_emp);
                echo json_encode(array('success' => $p->fetchAll()));  //$p->fetchObject()
            }else{
                echo json_encode(array('success' => null));
            }
        }else{
            echo json_encode(array('success' => null));
        }
    }

    public static function load_modules(){
        if($_POST){
            $select_especialidad_emp = scape_string(clean($_POST['select_especialidad_emp']));
            if($select_especialidad_emp){
                require_once(MODELS.'modulo_model.php');
                $m = new Modulo_model();
                $mod = $m->get_modulos_by_Id_especialidad($select_especialidad_emp);
                echo json_encode(array('success' => $mod->fetchAll()));
            }else{
                echo json_encode(array('success' => null));
            }
        }else{
            echo json_encode(array('success' => null));
        }
    }
}