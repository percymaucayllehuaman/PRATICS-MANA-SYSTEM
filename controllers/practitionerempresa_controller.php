<?php 
class Practitionerempresa_controller extends Controller{
    
    function __construct()
    {
        
    }

    function index(){
        if (!Auth::validate()) {
            Flasher::new('Debes iniciar sesión primero.', 'danger');
            Redirect::to('login');
        }
        View::render('index',['module' => 'Perfil']);
    }

    function register(){

        $empresa_ruc_regis = scape_string(clean($_POST['prac_empresa_ruc_regis'])) ;
        $raz_empresa_regis = scape_string(clean($_POST['prac_raz_empresa_regis'])) ;
        $rubro_empresa_regis = scape_string(clean($_POST['prac_rubro_empresa_regis'])) ;
        $departamento_em_regis = scape_string(clean($_POST['prac_departamento_em_regis'])) ;
        $prov_emp_regis = scape_string(clean($_POST['prac_prov_emp_regis'])) ;
        $dist_empr_regis = scape_string(clean($_POST['prac_dist_empr_regis'])) ;
        $address_empr_regis = scape_string(clean($_POST['prac_address_empr_regis'])) ;
        $repre_empr_regis = scape_string(clean($_POST['prac_repre_empr_regis'])) ;
        $select_gender_em = scape_string(clean($_POST['prac_select_gender_em'])) ;
        $tele_empr_regis = scape_string(clean($_POST['prac_tele_empr_regis'])) ;
        $tea_email_regis = scape_string(clean($_POST['prac_emp_email_regis'])) ;
        
        $button_sendform_registerempresa = scape_string(clean($_POST['prac_button_sendform_registerempresa'])) ;
        
        if($_POST){
            if($empresa_ruc_regis && $raz_empresa_regis && $rubro_empresa_regis && $departamento_em_regis 
            && $prov_emp_regis && $dist_empr_regis && $address_empr_regis && $repre_empr_regis && $select_gender_em 
            && $tele_empr_regis && $tea_email_regis){

                $empresa = new Empresa_model();
                if(!$empresa->exists('empresa',"RUC_codigo_ident",$empresa_ruc_regis)){
                    
                    $data = [
                        'RUC_codigo_ident' =>$empresa_ruc_regis,
                        'Estudiantes_DNI' =>$_SESSION['USER-LOGIN']->usuario,
                        'nombre' => $raz_empresa_regis,
                        'rubro' => $rubro_empresa_regis,
                        'departamento' => $departamento_em_regis,
                        'provincia' => $prov_emp_regis,
                        'distrito' => $dist_empr_regis,
                        'direccion' => $address_empr_regis,
                        'nom_ape_encargado' => $repre_empr_regis,
                        'sexo_encargado' => $select_gender_em,
                        'celular' => $tele_empr_regis,
                        'correo' => $tea_email_regis,
                        'fecha_hora_registro' =>date('Y-m-d H:i:s'),
                        'fecha_hora_validacion' =>'',
                        'doc_convenio' =>'',
                    ];
                    $res = $empresa->add_emp($data); 
                    if($res){
                        Flasher::new('Se Registró satisfactoriamente ','primary');
                        Redirect::to('practitionerEmpresa');
                        
                    }else{
                        Flasher::new('No se pudo Completar el Registro','warning');
                        echo "<script>window.history.go(-1)</script>";
                    }

                }else{
                    Flasher::new('La Empresa ya esta Registrada con ese RUC' ,'warning');
                    echo "<script>window.history.go(-1)</script>";
                }
            }else{
                Flasher::new('Llene todos los Campos, Son Obligatorios','warning');
                echo "<script>window.history.go(-1)</script>";
            }
        }
    }
}
