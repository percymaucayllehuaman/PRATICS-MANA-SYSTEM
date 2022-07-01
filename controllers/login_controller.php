<?php

class Login_controller extends Controller{
    function __construct()
    {
        
    }

    function index(){
        View::render('index',['title' => 'Login']);
    }

    function logout(){
        return;
    }

    function post_login(){

        if (!Csrf::validate($_POST['csrf']) || !check_posted_data(['input_username','csrf','input_password'], $_POST)) {
            // Flasher::new('Acceso no autorizado.', 'danger');
            // Redirect::back();
        }

        // Data pasada del formulario
        $usuario  = clean($_POST['input_username']);
        $password = clean($_POST['input_password']);

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