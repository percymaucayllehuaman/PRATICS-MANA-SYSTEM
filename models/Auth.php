
<?php
/**
 * Clase para crear sesiones seguras de usuarios
 */
class Auth {
    private $var    = 'user_session';
    private $logged = false;
    private $token  = null;
    private $id     = null;
    private $ssid   = null;
    private $user   = [];

    public function __construct()
    {
        if(isset($_SESSION['USER-LOGIN'])){
            self::load_user_complement_data();
        }
        if (isset($_SESSION[$this->var])) {
            return;
        }


        $session =
            [
                'logged' => false,
                'token'  => $this->token,
                'id'     => $this->id,
                'ssid'   => $this->ssid,
                'user'   => $this->user
            ];

        $_SESSION[$this->var] = $session;
        return;
    }

    // Crear sesión de usuario
    public static function login_init($user_id, $user_data = [])
    {
        $self    = new self();
        $session =
            [
                'logged' => true,
                'token'  => random_password(32),
                'id'     => $user_id,
                'ssid'   => session_id(),
                'user'   => $user_data
            ];

        $_SESSION[$self->var] = $session;
        return true;
    }

    // Validar la sesión del usuario
    public static function validate()
    {
        $self = new self();
        if (!isset($_SESSION[$self->var]) && !isset($_SESSION['USER-LOGIN'])) { //si la session no esta declarado o es null;
            return false;
        } else if (isset($_SESSION['USER-LOGIN']) && $_SESSION[$self->var]['logged'] === true && $_SESSION[$self->var]['ssid'] === session_id() && $_SESSION[$self->var]['token'] != null) {
            return true;
        }
        // return $_SESSION['USER-LOGIN']!=null && $_SESSION[$self->var]['logged'] === true && $_SESSION[$self->var]['ssid'] === session_id() && $_SESSION[$self->var]['token'] != null;
    }

    // Cerrar sesión del usuario
    public static function logout()
    {
        $self    = new self();
        $session =
            [
                'logged' => $self->logged,
                'token'  => $self->token,
                'id'     => $self->id,
                'ssid'   => $self->ssid,
                'user'   => $self->user
            ];

        $_SESSION[$self->var] = $session;
        return true;
    }

    public function __get($var)
    {
        if (!isset($this->{$var})) return false;
        return $this->{$var};
    }

    public static function load_user_complement_data(){   ///designa datos complementarios del usuario estudiante o docente
            if($_SESSION['USER-LOGIN']){
                if($_SESSION['USER-LOGIN']->user_type =="DOCENTE"){
                    require_once(MODELS.'decentes_model.php');
                    if(Docentes_model::get_by_DNI(intval($_SESSION['USER-LOGIN']->usuario))){
                        echo 'data';
                        $_SESSION['DATA-USER'] = Docentes_model::get_by_DNI(intval($_SESSION['USER-LOGIN']->usuario));
                    }else{
                        $_SESSION['DATA-USER'] = false;
                    }
                }else if($_SESSION['USER-LOGIN']->user_type =="ESTUDIANTE"){
                    require_once(MODELS.'estudiantes_model.php');
                    if(Estudiantes_model::get_by_DNI(intval($_SESSION['USER-LOGIN']->usuario))){
                        $_SESSION['DATA-USER'] = Estudiantes_model::get_by_DNI(intval($_SESSION['USER-LOGIN']->usuario));
                    }else{
                        $_SESSION['DATA-USER'] = false;
                    }
                }  
            }else{
                $_SESSION['DATA-USER'] = false;
            }
        }
    
}
