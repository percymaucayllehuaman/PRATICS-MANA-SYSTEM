<?php 
class Practitionervisitas_controller extends Controller{
    
    function __construct()
    {
        
    }

    static function index(){
        if (!Auth::validate()) {
            Flasher::new('Debes iniciar sesión primero.', 'danger');
            Redirect::to('login');
        }
        View::render('index',['module' => 'Perfil']);
    }

    static function show_visitas(){
        if($_POST){
            $select_especialidad_visi = scape_string(clean($_POST['select_especialidad_visi']));
            $select_module_visi = scape_string(clean($_POST['select_module_visi']));
            $select_year_visi = scape_string(clean($_POST['select_year_visi']));
            $select_period_visi = scape_string(clean($_POST['select_period_visi']));
            if($select_especialidad_visi && $select_module_visi && $select_year_visi && $select_period_visi){
                
                require_once(MODELS.'visitassupervision_model.php');
                $v = new Visitassupervision_model();
                $vis = $v->get_visitassu_estudiante($select_especialidad_visi, $select_module_visi, $select_year_visi, $select_period_visi,$_SESSION['USER-LOGIN']->usuario);  ///return a fetchAll
                echo json_encode(array('success' => $vis));
                
                // echo "<br><br>";
                // echo json_encode("Subir el grado de comunicaci�n con el personal")."<br><br>";
                // var_dump($v->get_visitassu_estudiante_ayax($select_especialidad_visi, $select_module_visi, $select_year_visi, $select_period_visi,$_SESSION['USER-LOGIN']->usuario)->fetchAll());
            }else{
                echo json_encode(array('success' => null));
            }
            // get_visitassu_estudiante
        }else{
            echo json_encode(array('success' => null));
        }
    }

    static function load_modules(){
        if($_POST){
            $select_especialidad_visi = scape_string(clean($_POST['select_especialidad_visi']));
            if($select_especialidad_visi){
                require_once(MODELS.'modulo_model.php');
                $m = new Modulo_model();
                $mod = $m->get_modulos_by_Id_especialidad($select_especialidad_visi);
                echo json_encode(array('success' => $mod->fetchAll()));
            }else{
                echo json_encode(array('success' => null));
            }
        }else{
            echo json_encode(array('success' => null));
        }
    }
}

?>