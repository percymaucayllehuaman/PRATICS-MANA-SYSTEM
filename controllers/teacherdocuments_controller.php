<?php


class Teacherdocuments_controller extends Controller{


    function __construct()
    {
        
    }

    static function index(){
        if (!Auth::validate()) {
            Flasher::new('Debes iniciar sesión primero.', 'danger');
            Redirect::to('login');
        }
        View::render('index',['module' => 'teacher documents']);
    }
    static function show_documents(){
        if($_POST){
            $select_especialidad_documents = clean($_POST['select_especialidad_documents']);
            $select_module_documents = clean($_POST['select_module_documents']);
            $button_show_documents = clean($_POST['button_show_documents']);
            if($select_especialidad_documents && $select_module_documents){
                require_once(MODELS.'documentos_model.php');
                $documents = new Documentos_model;
                $d = $documents->get_list_estudiantes_by_EspAndMod($select_especialidad_documents, $select_module_documents);
                if(!empty($d)){
                    $_SESSION['data-doc'] = $d;
                    Redirect::to('teacherdocuments');
                }else{
                    $_SESSION['data-doc'] = false;
                    Redirect::to('teacherdocuments');
                }
                // var_dump($documents->get_list_estudiantes_by_EspAndMod($select_especialidad_documents, $select_module_documents));
            }else{
                Flasher::new('Complete todos los campos','warning');
                echo "<script>window.history.go(-1)</acript>";
            }
        }else{
            Flasher::new('Pafina no encontrada','warning');
            Redirect::to('teacherdocuments');
        }
    }

    public static function load_modules(){
        if($_POST){
            if($_POST['select_especialidad_documents']){
                $select_especialidad_documents = scape_string(clean($_POST['select_especialidad_documents']));
                
                require_once(MODELS.'modulo_model.php');
                $asis_act = new Modulo_model();
                $p = $asis_act->get_modulos_by_Id_especialidad($select_especialidad_documents);
                echo json_encode(array('success' => $p->fetchAll(PDO::FETCH_ASSOC)));  //$p->fetchObject()
            }else{
                echo json_encode(array('success' => 1));
            }
        }else{
            echo json_encode(array('success' => null));
        }
    }
}
