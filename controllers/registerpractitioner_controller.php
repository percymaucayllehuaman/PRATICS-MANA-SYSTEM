<?php 
class Registerpractitioner_controller extends Controller{
    
    function __construct()
    {
        
    }

    static function index(){
        View::render('index',['module' => 'Registerprctitioner']);
    }
    
    static function register(){
        $inp_dni_prac = scape_string(clean($_POST['inp_dni_prac']));
        $inp_lastnamefirst_prac = scape_string(clean($_POST['inp_lastnamefirst_prac']));
        $inp_lastnamesecond_prac = scape_string(clean($_POST['inp_lastnamesecond_prac']));
        $inp_names_prac = scape_string(clean($_POST['inp_names_prac']));
        $inp_birthdate_prac = scape_string(clean($_POST['inp_birthdate_prac']));
        $inp_gender_prac = scape_string(clean($_POST['select_gender_prac']));
        $inp_departament_prac = scape_string(clean($_POST['inp_departament_prac']));
        $inp_province_prac = scape_string(clean($_POST['inp_province_prac']));
        $inp_district_prac = scape_string(clean($_POST['inp_district_prac']));
        $inp_email_prac = scape_string(clean($_POST['inp_email_prac']));
        $inp_phone_prac = scape_string(clean($_POST['inp_phone_prac']));
        $inp_address_prac = scape_string(clean($_POST['inp_address_prac']));
        $select_grado_prac = scape_string(clean($_POST['select_grado_prac']));
        $select_estadocivil_prac = scape_string(clean($_POST['select_estadocivil_prac']));
        $input_user_name = scape_string(clean($_POST['input_user_name']));
        $input_password_user = scape_string(clean($_POST['input_password_user']));
        $input_repassword_user = scape_string(clean($_POST['input_repassword_user']));

        $button_sendform_registerprac = scape_string(clean($_POST['button_sendform_registerprac']));        

        if($_POST) {
            if($inp_dni_prac && $inp_lastnamefirst_prac && $inp_lastnamesecond_prac && $inp_names_prac && $inp_birthdate_prac && 
            $inp_gender_prac && $inp_departament_prac && $inp_province_prac && $inp_district_prac && $inp_email_prac && 
            $inp_phone_prac && $inp_address_prac && $select_grado_prac && $select_estadocivil_prac && $input_user_name && 
            $input_password_user && $input_repassword_user)
            {
                require_once(MODELS.'estudiantes_model.php');
                require_once(MODELS.'login_model.php');

                $practitioner = new Estudiantes_model();
                $login = new Login_model();
                if(!$practitioner->exists("estudiantes",'DNI',$inp_dni_prac)){
                    if($input_password_user == $input_repassword_user){ 
                        $data = [
                            'DNI' => $inp_dni_prac,
                            'apellido_paterno' => $inp_lastnamefirst_prac,
                            'apellido_materno' => $inp_lastnamesecond_prac,
                            'nombres' => $inp_names_prac,
                            'fecha_nac' => $inp_birthdate_prac,
                            'sexo' => $inp_gender_prac,
                            'departamento' => $inp_departament_prac,
                            'provincia' => $inp_province_prac,
                            'distrito' => $inp_district_prac,
                            'correo' => $inp_email_prac,
                            'celular' => $inp_phone_prac,
                            'direccion' => $inp_address_prac,
                            'grado_instruccion' => $select_grado_prac,
                            'estado_civil' => $select_estadocivil_prac
                        ];
                        if($inp_dni_prac == $input_user_name){
                            $data_login = [
                                'usuario' =>  $input_user_name,
                                'contrasenia' => sha1($input_password_user),
                                'user_type' => 'ESTUDIANTE'
                                ];
            
                                if($practitioner->add_prac($data) && $login->add_login($data_login)){
                                    Flasher::new("Registro exitoso, Ir a Login :)",'primary');
                                    Redirect::to('registerpractitioner');
                                }else{
                                    echo "Error al registrarse";
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
                    Flasher::new("Ya existe Estudiante con este DNI!",'warning');
                }
                
            } else{
                echo "<script>window.history.go(-1)</script>";
                Flasher::new("Todos los campos son obligatorios!",'warning');    
            }
        }else{
            Flasher::new("Error pagina no encontrada",'danger');
            Redirect::to('login');
        }
    }
}

?>