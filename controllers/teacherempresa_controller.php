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
                // $p = $practicas->get_practicas_by_Esp_Mod_Empresa($select_especialidad_emp, $select_module_emp);
                $p = $practicas->get_all('empresa');
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

    function validate_empresa(){
        //using ajax
        if($_POST){
            $code_ident_empresa = scape_string((clean($_POST['ruc_cod_empresa'])));
            $fecha_hora_validacion = scape_string(clean($_POST['fecha_validate_empresa']));
            $r = 0;
            
            if($code_ident_empresa && $fecha_hora_validacion){
                
                require_once(MODELS.'empresa_model.php');
                $em = new Empresa_model();
                $date = '';
                if($fecha_hora_validacion == "0000-00-00 00:00:00"){
                    $date = date('Y-m-d H:i:s');   //date('Y-m-d H:i:s')
                    $res = $em->udpate_validation_empresa($date, $code_ident_empresa);
                    if($res){
                        $r = 1;
                    }
                }else{
                    $date = "0000-00-00 00:00:00";
                    $res = $em->udpate_validation_empresa($date, $code_ident_empresa);
                    if($res){
                        $r = 2;
                    }
                }    
                echo json_encode(array('success' => $r, 'fecha_validacion' => $date, 'id_cod_ruc' => $code_ident_empresa));   
                
            }else{
                echo json_encode(array('success' => null));
            }
        }else{
            echo json_encode(array('success' => null)); 
        }    
    }


}