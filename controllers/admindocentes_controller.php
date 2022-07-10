<?php 
class Admindocentes_controller extends Controller{
    
    function __construct()
    {
        
    }

    function index(){
        if (!Auth::validate()) {
            Flasher::new('Debes iniciar sesión primero.', 'danger');
            Redirect::to('login');
        }
        view::render('index',['module' => 'admindocentes']);
    }

    function register(){
        $tea_dni_regis = scape_string(clean($_POST['tea_dni_regis']));
        $tea_appat_regis = scape_string(clean($_POST['tea_appat_regis']));
        $tea_apmat_regis = scape_string(clean($_POST['tea_apmat_regis']));
        $tea_names_regis = scape_string(clean($_POST['tea_names_regis']));
        $tea_birthdate_regis = $_POST['tea_birthdate_regis'];
        $select_gender_tea = scape_string(clean($_POST['select_gender_tea']));
        $select_espe_tea = scape_string(clean($_POST['select_espe_tea']));
        $tea_tele_regis = scape_string(clean($_POST['tea_tele_regis']));
        $tea_email_regis = scape_string(clean($_POST['tea_email_regis']));
        $tea_addres_regis = scape_string(clean($_POST['tea_addres_regis']));
        $tea_usernamedni = scape_string(clean($_POST['tea_usernamedni']));
        $tea_password_login = scape_string(clean($_POST['tea_password_login']));
        $tea_password_confirm = scape_string(clean($_POST['tea_password_confirm']));
        
        $button_sendform_registerteacher = $_POST['button_sendform_registerteacher'];
        
        if($_POST) {
            if($tea_dni_regis && $tea_appat_regis && $tea_apmat_regis && $tea_names_regis && $tea_birthdate_regis && 
            $select_gender_tea && $select_espe_tea && $tea_tele_regis && $tea_email_regis && $tea_addres_regis && 
            $tea_usernamedni && $tea_password_login && $tea_password_confirm)
            {
                $teacher = new Docentes_model();
                $login = new Login_model();
                if(!$teacher->exists("Docentes",'DNI',$tea_dni_regis)){
                    if($tea_password_confirm == $tea_password_login){ 
                        $data = [
                            'DNI' => $tea_dni_regis,
                            'apellido_paterno' => $tea_appat_regis,
                            'apellido_materno' => $tea_apmat_regis,
                            'nombres' => $tea_names_regis,
                            'fecha_nac' => $tea_birthdate_regis,
                            'sexo' => $select_gender_tea,
                            'especialidad' => $select_espe_tea,
                            'celular' => $tea_tele_regis,
                            'correo' => $tea_email_regis,
                            'direccion' => $tea_addres_regis
                        ];
                        if($tea_dni_regis == $tea_usernamedni){
                            $data_login = [
                                'usuario' =>  $tea_usernamedni,
                                'contrasenia' => sha1($tea_password_login),
                                'user_type' => 'DOCENTE'
                                ];
            
                                if($teacher->add_doc($data) && $login->add_login($data_login)){
                                    Flasher::new("Registro exitoso, :)",'primary');
                                    Redirect::to('admindocentes');
                                }else{
                                    echo "error al registrar";
                                }
                        }else{
                            echo "<script>window.history.go(-1)</script>";
                            Flasher::new("El campo Usuario es el DNI, no coinciden!",'warning');
                        }
                        
    
                    }else{
                        // Redirect::back();
                        // header("Location:".$_SERVER[HTTP_REFERER]);
                        echo "<script>window.history.go(-1)</script>";
                        Flasher::new("Las contraseñas no coinciden!",'warning');
                    } 
                }else{
                    echo "<script>window.history.go(-1)</script>";
                    Flasher::new("Ya existe un Docente con este DNI!",'warning');
                }
                
            } else{
                echo "<script>window.history.go(-1)</script>";
                Flasher::new("Todos los campos son oblogatorios!",'warning');    
            }
        }else{
            Redirect::to('admindocentes');
            Flasher::new("Error pagina no encontrada",'danger');
        }
    }
   
}
