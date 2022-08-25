<?php

class Login_controller extends Controller{
    function __construct()    {
        
    }

    static function index(){
        if (Auth::validate()) {
            if(isset($_SESSION['USER-LOGIN'])){
                Flasher::new('Ya hay una sesión abierta.');
                Auth::login_init($_SESSION['USER-LOGIN']->id_usuario,[]);

                if($_SESSION['USER-LOGIN']->user_type === 'ADMIN'){
                    Redirect::to('admindata/');
                }else if($_SESSION['USER-LOGIN']->user_type === 'DOCENTE'){
                    Redirect::to('teacherdata/');
                }else if($_SESSION['USER-LOGIN']->user_type === 'ESTUDIANTE'){
                    Redirect::to('practitionerdata/');
                }
            }
        }

        View::render('index',['title' => 'Login']);
        
      
    }

    static function post_login(){
        
        if($_POST){
            if (!Csrf::validate($_POST['csrf']) || !check_posted_data(['input-user-login','csrf','input-password-login'], $_POST)) {
                Flasher::new('Acceso no autorizado.', 'danger');
                Redirect::back();
            }
           
            $usuario  = clean($_POST['input-user-login']);
            $password = clean($_POST['input-password-login']);
            $password = sha1((string) $password);   ///or use strval() method
            
            require_once(MODELS.'login_model.php');
            $login = new Login_model();
            $res = $login->log_in($usuario,$password);
            
            if($res){       //!= false
                session_destroy();
                session_start(); 
                $_SESSION['USER-LOGIN'] = $res;
                
                Auth::login_init($_SESSION['USER-LOGIN']->id_usuario,[]);  ///init token and others vars
                
                if($_SESSION['USER-LOGIN']->user_type === 'ADMIN'){
                    Redirect::to('admindata/');
                }else if($_SESSION['USER-LOGIN']->user_type === 'DOCENTE'){
                    Redirect::to('teacherdata/');
                }else if($_SESSION['USER-LOGIN']->user_type === 'ESTUDIANTE'){
                    Redirect::to('practitionerdata/');
                }
                
            }else{
                Flasher::new('Las credenciales no son correctas.', 'danger');
                Redirect::back();
            }
        }else{
            Flasher::new('Página no encontrada', 'danger');
            Redirect::to('login');
        }

        
        
        
        
    }
}