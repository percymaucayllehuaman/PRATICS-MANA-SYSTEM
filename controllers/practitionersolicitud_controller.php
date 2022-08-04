<?php 
class Practitionersolicitud_controller extends Controller{
    
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

    static function register(){
        $select_especilidad_sol = scape_string(clean( $_POST['select_especilidad_sol']));
        $select_module_soli = scape_string(clean( $_POST['select_module_soli']));
        $select_section_soli = scape_string(clean( $_POST['select_section_soli']));
        $select_year_soli = scape_string(clean( $_POST['select_year_soli']));
        $select_period_soli = scape_string(clean( $_POST['select_period_soli']));
        $select_empresa_soli = scape_string(clean( $_POST['select_empresa_soli']));
        $select_tipo_soli = scape_string(clean( $_POST['select_tipo_soli']));
        $select_teacher_soli = scape_string(clean( $_POST['select_teacher_soli']));
        $date_soli_regis_start = scape_string(clean( $_POST['date_soli_regis_start']));
        $date_soli_regis_end = scape_string(clean( $_POST['date_soli_regis_end']));
        $select_turno_soli = scape_string(clean( $_POST['select_turno_soli']));
        $prac_timestart_regis = scape_string(clean( $_POST['prac_timestart_regis']));
        $prac_timeend_regis = scape_string(clean( $_POST['prac_timeend_regis']));
       
        $_button_sendform_registerpp = scape_string(clean( $_POST['button_sendform_registerpp']));

        if($_POST){
            if($select_especilidad_sol && $select_module_soli && $select_section_soli && 
            $select_year_soli && $select_period_soli && $select_empresa_soli && 
            $select_tipo_soli && $select_teacher_soli && $date_soli_regis_start && 
            $date_soli_regis_end && $select_turno_soli && $prac_timestart_regis && $prac_timeend_regis){ 
                $data = [
                    'Estudiantes_DNI' => $_SESSION['USER-LOGIN']->usuario,
                    'Especialidad_id_especialidad' => $select_especilidad_sol,
                    'Modulo_id_modulo' => $select_module_soli,
                    'seccion' => $select_section_soli,
                    'anio' => $select_year_soli,
                    'periodo' => $select_period_soli,
                    'Empresa_RUC' => $select_empresa_soli,
                    'Docentes_DNI' => $select_teacher_soli,
                    'tipo' => $select_tipo_soli,
                    'fecha_inicio' => $date_soli_regis_start,
                    'fecha_fin' => $date_soli_regis_end,
                    'turno' => $select_turno_soli,
                    'hora_inicio' => $prac_timestart_regis,
                    'hora_fin' => $prac_timeend_regis,
                    'validacion' => ""
                ];
                $p = new Practicas_model();
                $res = $p->add_practica($data);
                
                if($res){
                    Flasher::new('Registro Satisfactorio ','primary');
                    Redirect::to('practitionersolicitud');
                }else{
                    Flasher::new('Error al Registrar','warning');
                    echo "<script>window.history.go(-1)</script>";
                }
            }else{
                Flasher::new('Completa todos los campos! ','warning');
                echo "<script>window.history.go(-1)</script>";
            }
        }
        else{
            Flasher::new('Página no encontrada','warning');
            Redirect::to('practitionersolicitud');
        }
    }
}

?>