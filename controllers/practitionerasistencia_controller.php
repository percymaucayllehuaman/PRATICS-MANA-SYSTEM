<?php 
class Practitionerasistencia_controller extends Controller{
    
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

    static function register_entrada(){
        
        if($_POST){
            $date = date('Y-m-d');
            $datetime = date('Y-m-d H:i:s');
            $prac = new Practicas_model();
            if($prac->get_practicas_by_estudiante($_SESSION['USER-LOGIN']->usuario)->rowCount()==1){
                $p = $prac->get_practicas_by_estudiante($_SESSION['USER-LOGIN']->usuario)->fetchObject();
                $asis_ac = new Asistenciaactividad_model();
                $a = $asis_ac->get_by_DNIandDate($_SESSION['USER-LOGIN']->usuario, $date);
                if(!$a){///si no hay registro
                    $data = [
                        'Practicas_id_practicas' => $p->id_practicas,
                        'Practicas_Estudiantes_DNI' => $_SESSION['USER-LOGIN']->usuario,
                        'fecha' => $date,
                        'fecha_hora_entrada' =>$datetime,
                        'validacion_entrada' =>'No',
                        'actividad' =>'',
                        'validacion_actividad' =>'No',
                        'fecha_hora_salida' =>'',
                        'validacion_salida' =>'',
                        'observacion' =>''
                        ];
                    $r = $asis_ac->add_asis($data);
                    if($r){
                        Flasher::new("Registraste tu Entrada","primary");
                        Redirect::to("practitionerasistencia"); 
                    }else{
                        Flasher::new("Error al registrar entrada","warning");
                        Redirect::to("practitionerasistencia"); 
                    }
                    
                }else{
                    Flasher::new("Ya registraste tu entrada Hoy, No se puede volver a registrar","warning");
                    Redirect::to("practitionerasistencia"); 
                }
            }else{
                Flasher::new("Error al registrar entrada, Primero Solicita tu Practica","danger");
                Redirect::to("practitionerasistencia");
            }
        }else{
            Flasher::new("Error pagina no encontrada,","danger");
            Redirect::to("practitionerasistencia");    
        }
        
    }

    static function register_salida(){
        if($_POST){
            //verificar si registró la entrada , si no pedir que registre su entrada
            $asis = new Asistenciaactividad_model();
            $a = $asis->get_by_DNIandDate($_SESSION['USER-LOGIN']->usuario, date('Y-m-d'));   //entrada
            if($a){  ///si registró la entrada -> registrar salida 
                if($a->fecha_hora_salida == '0000-00-00 00:00:00'){        //verificar la salida si esta vacia
                    //code registrar salida
                    $asis->register_salida($a->id_asistencia_actividad,date('Y-m-d H:i:s'));
                    if($asis){
                        Flasher::new('Registraste tu salida exitosamente, No olvide registrar la actividad del día','primary');
                        Redirect::to('practitionerasistencia'); 
                    }else{
                        Flasher::new('Hubo error al registrar salida, Vuelve a intentar mas tarde','warning');
                        Redirect::to('practitionerasistencia'); 
                    }
                }else{
                    Flasher::new('Ya registraste la salida Hoy','warning');
                    Redirect::to('practitionerasistencia'); 
                }
                    
            }else{
                Flasher::new('Primero debes registrar Entrada, Vuelve a intentar mas tarde','danger');
                Redirect::to('practitionerasistencia');     
            }
        }else{
            Flasher::new('Pagina no encontrada','danger');
            Redirect::to('practitionerasistencia');
        }
    }

    static function register_actividad(){
        if($_POST){
            $textarea_actividad = scape_string(clean($_POST['textarea_actividad']));
            if($textarea_actividad){
                $asis = new Asistenciaactividad_model();
                $a = $asis->get_by_DNIandDate($_SESSION['USER-LOGIN']->usuario,date('Y-m-d'));
                if($a){   //// si existe registro de entrada
                    if(!$a->actividad){    /// si no existe actividad
                        $as = $asis->register_actividad($a->id_asistencia_actividad,$textarea_actividad);
                        if($as){
                            Flasher::new('Registro Satisfactorio','success');
                            Redirect::to('practitionerasistencia');
                        }else{
                            Flasher::new('Error al registrar activadad, vuelve a intentar mas tarde','primary');
                            Redirect::to('practitionerasistencia');
                        }
                    }else{
                        Flasher::new('Ya Registraste la Actividad','warning');
                        Redirect::to('practitionerasistencia');
                    }
                }else{
                    Flasher::new('Registra tu entrada Primero','warning');
                    echo "<script>window.history.go(-1);</script>";
                }
            }else{
                Flasher::new('Ingre Actividad','warning');
                echo "<script>window.history.go(-1);</script>";
            }

        }else{
            Flasher::new('Pagina no encontrada','danger');
            Redirect::to('practitionerasistencia');
        }
    }


}
