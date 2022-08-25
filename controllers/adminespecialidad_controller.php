<?php 
class Adminespecialidad_controller extends Controller{
    
    function __construct()
    {
        
    }

    static function index(){
        if (!Auth::validate()) {
            Flasher::new('Debes iniciar sesión primero.', 'danger');
            Redirect::to('login');
        }
        View::render('index',['module' => 'adminespecialidad']);
    }
    public static function registerespecialidad(){
        if($_POST){
            $especialidad_name_admin = scape_string(clean($_POST['especialidad_name_admin']));
            $especialidad_description_admin = scape_string(clean($_POST['especialidad_description_admin']));
            $button_sendform_convenio = scape_string(clean($_POST['button_sendform_conveniodocument']));
            if($especialidad_name_admin && $especialidad_description_admin){
                require_once(MODELS.'especialidad_model.php');
                $es = new Especialidad_model();
                $data = [
                    'nombre' => $especialidad_name_admin,
                    'descripcion' => $especialidad_description_admin
                ];
                $r = $es->add_especialidad($data);
                if($r){
                    Flasher::new('Registro satisfactorio' , 'succcess');
                    Redirect::to('adminespecialidad');
                }else{
                    Flasher::new('Error, Vuelva a intentar mas tarde' , 'warning');
                    echo "<script>window.history.go(-1);</script>";
                }
            }else{
                Flasher::new('Completo todos los campos' , 'warning');
                echo "<script>window.history.go(-1);</script>";
            }
        }else{
            Flasher::new('Acceso no Admitido' , 'danger');
            Redirect::to('adminespecialidad');
        }
    }


    public static function registermodule(){
        if($_POST){
            $select_especialidad_regis = scape_string(clean($_POST['select_especialidad_regis']));
            $module_name_admin = scape_string(clean($_POST['module_name_admin']));
            $module_description_admin = scape_string(clean($_POST['module_description_admin']));
            $button_sendform_conveniodocument = scape_string(clean($_POST['button_sendform_conveniodocument']));

            if($select_especialidad_regis && $module_name_admin && $module_description_admin){
                require_once(MODELS.'modulo_model.php');
                $m = new Modulo_model();
                $data = [
                    'Especialidad_id_especialidad' => $select_especialidad_regis,
                    'nombre' => $module_name_admin,
                    'descripcion' => $module_description_admin
                ];
                $modulo = $m->add_modulo($data);
                if($modulo){
                    Flasher::new('Registro satisfactorio' , 'success');
                    Redirect::to('adminespecialidad');
                }else{
                    Flasher::new('Error al registrar Modulo, Intente mas tarde' , 'warning');
                    echo "<script>window.history.go(-1);</script>"; 
                }
            }else{
                Flasher::new('Complete todos los Campos' , 'warning');
                echo "<script>window.history.go(-1);</script>";
            }

        }else{
            Flasher::new('Acceso no Admitido' , 'danger');
            Redirect::to('adminespecialidad');
        }           
    }
}


?>