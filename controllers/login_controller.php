<?php

class Login_controller extends Controller{
    function __construct()
    {
        
    }

    static function index(){
        View::render('index',['title' => 'Login']);
    }

    function logout(){
        return;
    }

    function post_login(){

        if (!Csrf::validate($_POST['csrf']) || !check_posted_data(['input-user-login','csrf','input-password-login'], $_POST)) {
            Flasher::new('Acceso no autorizado.', 'danger');
            Redirect::back();
        }
       
        $usuario  = clean($_POST['input-user-login']);
        $password = clean($_POST['input-password-login']);
        $password = sha1($password);
        
        $login = new Login_model();
        // echo $login->exists("user_type", "admin");

        
        $data = ['usuario' => $usuario, 'contrasenia'=> $password, 'user_type' => 'ADMIN'] ;
        
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

        // Loggear al usuario
        // Auth::login($user['id'], $user);
        // Redirect::to('home/flash');
    }
}