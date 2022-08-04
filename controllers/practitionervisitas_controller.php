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
                
                $v = new Visitassupervision_model();
                var_dump($v->get_visitassu_estudiante($select_especialidad_visi, $select_module_visi, $select_year_visi, $select_period_visi,$_SESSION['USER-LOGIN']->usuario));
            }else{

            }
            // get_visitassu_estudiante
        }else{

        }
    }
}

?>