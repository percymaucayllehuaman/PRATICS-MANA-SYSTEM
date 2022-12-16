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
                require_once(MODELS.'practicas_model.php');
                $p = new Practicas_model();
                $existe_practicas = $p->get_practicas_by_estudiante_esp_mod_anio_period($data['Estudiantes_DNI'],$select_especilidad_sol,$select_module_soli,$select_year_soli,$select_period_soli);
                if($existe_practicas->rowCount()==0){
                    $res = $p->add_practica($data);
                    if($res){
                        Flasher::new('Realizó solicitud Satisfactoriamente!','primary');
                        // aqui inicializa el registro de visitas ya que el rol docente no tiene opcion de registro de visitas
                        require_once(MODELS.'visitassupervision_model.php');
                        $visitas = new Visitassupervision_model();
                            
                        // registra una visita una vez solicita la PP
                        $data_ini = [
                            'id_practicas' => intval($p->lastId()->fetchObject()->id_practicas),
                            'dni' => $data['Estudiantes_DNI'],
                            'fecha' => date('Y-m-d'),
                            'asistencia' => "No",
                            'actividad' => "No",
                            'noseencontro' => "No",
                            'sugerencias' => ""
                        ];
                        $visitas->init_add_visitas($data_ini);
                        // HASTA AQUI EL INIT ADD
                        
                        Redirect::to('practitionersolicitud');
                    }else{
                        Flasher::new('Error al Registrar','warning');
                        echo "<script>window.history.go(-1)</script>";
                    }
                }else{
                    Flasher::new('Ya solicitó PPP en el periodo!','warning');
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

    static function load_modules(){
        if($_POST){
            $select_especilidad_sol = scape_string(clean($_POST['select_especilidad_sol']));
            if($select_especilidad_sol){
                require_once(MODELS.'modulo_model.php');
                $m = new Modulo_model();
                $mod = $m->get_modulos_by_Id_especialidad($select_especilidad_sol);
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