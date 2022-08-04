<?php 
class Practitionerdocuments_controller extends Controller{
    
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

    static function register_documentp(){
        if($_POST){
            $select_type_documents_prac = clean($_POST['select_type_documents_prac']);
            $upload_file_document_prac = $_FILES['upload_file_document_prac']['name'];
            $button_save_document_prac = $_POST['button_save_document_prac'];
            
            if($select_type_documents_prac && !empty($upload_file_document_prac)){
                $prac = new Practicas_model();
                $p = $prac->get_last_practica_by_estudentDNI($_SESSION['USER-LOGIN']->usuario);
                if($p){    // verify if exist practica
                    $data['Practicas_id_practicas'] = $p->id_practicas;
                    $data['Practicas_Estudiantes_DNI'] = $p->Estudiantes_DNI;
                    $data['fecha'] = date('Y-m-d H:i:s');
                    $data['tipo'] = $select_type_documents_prac;
                    $file_new_name = date('YmdHis').$_SESSION['USER-LOGIN']->usuario.'.pdf';   ////por seguridad se debe encriptar
                    $data['ruta_archivo'] = $file_new_name;
                    $data['validacion'] = '';
                    $data['observacion'] = '';
                    // $targetFilePath = RESOURCES.'data/documents/'.basename($upload_file_document_prac);
                    $targetFilePath = RESOURCES.'data/documents/'.$file_new_name;   //set date to file name
                    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION); ///type file
                    $allowTypes = array('pdf'); ///files permitidos  array('jpg','png','jpeg','gif','pdf')
                    if(in_array($fileType, $allowTypes)){
                        if(move_uploaded_file($_FILES["upload_file_document_prac"]["tmp_name"], $targetFilePath)){  ///copiar file en el hosting
                            $doc = new Documentos_model();
                            $doc->add_document($data);
                            if($doc){
                                Flasher::new('El documento se envió satisfactoriamente','success');
                                Redirect::to('practitionerdocuments');
                            }else{
                                Flasher::new('Error al Registrar, Intente mas Tarde','warning');
                                echo "<script>window.history.go(-1)</script>";
                            }
                        }else{
                            Flasher::new('Error al enviar Documento, intente mas tarde','warning');
                            echo "<script>window.history.go(-1)</script>";
                        }
                    }else{
                        Flasher::new('Archivo no permitido, admitido solo PDF','warning');
                        echo "<script>window.history.go(-1)</script>";
                    }
                    }else{
                        Flasher::new('Solicita tus Practicas, Intentar mas tarde','warning');
                        echo "<script>window.history.go(-1)</script>";
                    }
            }
        }else{
            Flasher::new('Pagina no encontrada','danger');
            Redirect::to('practitionerdata/');
        }
    }
}
