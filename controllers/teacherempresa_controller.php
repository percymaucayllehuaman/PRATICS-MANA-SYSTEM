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
}