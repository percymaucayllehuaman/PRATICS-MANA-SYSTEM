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
            // $button_show_documents = clean($_POST['button_show_documents']);
            if($select_especialidad_documents !='' && $select_module_documents !=''){
                require_once(MODELS.'documentos_model.php');
                $documents = new Documentos_model;
                $d = $documents->get_list_estudiantes_by_EspAndMod($select_especialidad_documents, $select_module_documents);
                // if($d->rowCount() > 0){
                    // echo json_encode(array('success' => 1, 'data' => $d->fetchAll(PDO::FETCH_ASSOC)));
                    $_SESSION['data-doc'] = $d;
                    Redirect::to('teacherdocuments');
                // }else{
                    // echo json_encode(array('success' => 2, 'data' => null));
                //     $_SESSION['data-doc'] = false;
                //     Redirect::to('teacherdocuments');
                // }
                // var_dump($documents->get_list_estudiantes_by_EspAndMod($select_especialidad_documents, $select_module_documents));
            }else{
                // echo json_encode(array('success' => 3, 'data' => null));
                Flasher::new('Complete todos los campos!','warning');
                echo "<script>window.history.go(-1)</script>";
            }
        }else{
            // echo json_encode(array('success' => null));
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

    public static function validate_document_by_teacher(){
        if($_POST){
            $id_document = scape_string(clean($_POST['id_document']));
            $date_validation = scape_string(clean($_POST['date_validation']));
            if($id_document && $date_validation){
                require_once(MODELS.'documentos_model.php');
                $d = new Documentos_model();
                $date = '0000-00-00 00:00:00';
                $r = 0;
                if($date_validation == '0000-00-00 00:00:00'){
                    $date = date('Y-m-d H:i:s'); 
                    $res = $d->update_validate_document($id_document, $date);
                    if($res){
                        echo json_encode(array('success' => 1, 'id_document' => $id_document, 'date_validate' => $date));
                    }else{
                        echo json_encode(array('success' => 3, 'message' => 'Error al Actualizar'));
                    }
                }else{
                    $res = $d->update_validate_document($id_document, $date);
                    if($res){
                        echo json_encode(array('success' => 2, 'id_document' => $id_document, 'date_validate' => $date));
                    }else{
                        echo json_encode(array('success' => 3, 'message' => 'Error al Actualizar'));
                    }
                }
                
            }else{
                echo json_encode(array('success' => 3));
            }
            
        }else{
            echo json_encode(array('success' => null));
        }
    }
}
