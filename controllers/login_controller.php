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
        
        // Auth::login($user['id'], $user);
        // Redirect::to('home/flash');

        if (!Csrf::validate($_POST['csrf']) || !check_posted_data(['input-user-login','csrf','input-password-login'], $_POST)) {
            Flasher::new('Acceso no autorizado.', 'danger');
            Redirect::back();
        }
       
        $usuario  = clean($_POST['input-user-login']);
        $password = clean($_POST['input-password-login']);
        $password = sha1((string) $password);   ///or use strval() method
        
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
        
        // echo $login->exists("user_type", "admin");

        
        // $data = ['usuario' => $usuario, 'contrasenia'=> $password, 'user_type' => 'ADMIN'] ;
        
        // $res = $login->add_login($data);
        // if($res){
        //     echo 'Registro exitoso';
        // }
        

        // if($login->go_login($usuario,$password)){
            // echo "existe usuario";
        // }

        // session_start();

        //echo $usuario."<br>".$password;
        // Redirect::to('adminconvenios');

        // Información del usuario loggeado, simplemente se puede reemplazar aquí con un query a la base de datos
        // para cargar la información del usuario si es existente
        $user = 
        [
        'id'       => 123,
        'name'     => 'Bee Default', 
        'email'    => 'hellow@joystick.com.mx', 
        'avatar'   => 'myavatar.jpg', 
        'tel'      => '11223344', 
        'color'    => '#112233',
        'user'     => 'bee',
        'password' => '$2y$10$R18ASm3k90ln7SkPPa7kLObcRCYl7SvIPCPtnKMawDhOT6wPXVxTS'
        ];


        if ($usuario !== $user['user'] || !password_verify($password.AUTH_SALT, $user['password'])) {
        // Flasher::new('Las credenciales no son correctas.', 'danger');
        // Redirect::back();

        }
    }
}