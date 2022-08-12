<?php 

class Sisepp {

  // Propiedades del SISTEMA
  // Desarrollado por el equipo Consultora Arroba E. I. R. L.
  /**
   * @var string
   */
  private $system    = 'SISEPP'; // Nombre del sistema
  private $version      = '1.0';         // versión actual del sistema
  private $lng          = 'es';
  private $uri          = [];
  private $use_composer = true;

  // La función principal que se ejecuta al instanciar nuestra clase
  function __construct() {
    $this->init();
  }

  /**
   * Método para ejecutar cada "método" de forma subsecuente
   *
   * @return void
   */
  private function init() {
    // Todos los métodos que queremos ejecutar consecutivamente
    $this->init_session();
    $this->init_load_config();
    $this->init_load_functions();
    $this->init_load_composer();
    $this->init_autoload();
    
    $this->init_csrf();
    
    // $this->init_globals();
    // $this->init_custom();
    
    $this->dispatch();
    $this->init_load_csrf();
    
  }

  /**
   * Método para iniciar la sesión en el sistema
   * 
   * @return void
   */
  private function init_session() {
    if(session_status() == PHP_SESSION_NONE) {
      session_start();
    }

    return;
  }

  /**
   * Método para cargar la configuración del sistema
   *
   * @return void
   */ 
  private function init_load_config() {
    // Carga del archivo de settings inicialmente para establecer las constantes personalizadas
    // desde un comienzo en la ejecución del sitio
    $file = 'sisepp_config.php';
    if(!is_file('core/'.$file)) {
      die(sprintf('El archivo %s no se encuentra, es requerido para que %s funcione.', $file, $this->framework));
    }

    // Cargando el archivo de configuración
    require_once 'core/'.$file;
    
    $file = 'settings.php';
    if(!is_file('core/'.$file)) {
      die(sprintf('El archivo %s no se encuentra, es requerido para que %s funcione.', $file, $this->framework));
    }

    // Cargando el archivo de configuración
    require_once 'core/'.$file;

    return;
  }

  /**
   * Método para cargar todas las funciones del sistema y del usuario
   *
   * @return void
   */
  private function init_load_functions() {
    $file = 'arroba_functions.php';
    if(!is_file(FUNCTIONS.$file)) {
      die(sprintf('El archivo %s no se encuentra, es requerido para que %s funcione.', $file, $this->framework));
    }

    // // Cargando el archivo de funciones core
    require_once FUNCTIONS.$file;

    $file = 'arroba_custom_functions.php';
    if(!is_file(FUNCTIONS.$file)) {
      // die(sprintf('El archivo %s no se encuentra, es requerido para que %s funcione.', $file, $this->framework));
    }

    // Cargando el archivo de funciones custom
    // require_once FUNCTIONS.$file;

    return;
  }

  /**
   * Inicializa composer
   */
  private function init_load_composer() {
    if (!$this->use_composer) {
      return;
    }

    // $file = 'app/vendor/autoload.php';
    // if(!is_file($file)) {
    //   die(sprintf('El archivo %s no se encuentra, es requerido para que %s funcione.', $file, $this->framework));
    // }

    // Cargando el archivo de configuración
    // require_once $file;

    return;
  }

  /**
   * Método para cargar todos los archivos de forma automática
   *
   * @return void
   */
  private function init_autoload() {
    require_once CLASSES.'Autoloader.php';
    Autoloader::init();
    return;
  }

  /**
   * Método para crear un nuevo token de la sesión del usuario
   *
   * @return void
   */
  private function init_load_csrf(){
    $file = CLASSES.'Csrf.php';
    if(!is_file($file)){
      die(sprintf('El archivo %s no se encuentra, es requerido para que %s funcione.', $file, $this->system));
    }
  }
  
  private function init_csrf() {
    require_once(CLASSES.'Csrf.php');
    $csrf = new Csrf(); 
    define('CSRF_TOKEN', $csrf->get_token()); //token
  }

  /**
   * Método para filtrar y descomponer los elementos de nuestra url y uri
   *
   * @return void
   */
  private function filter_url() {
    // echo $_SERVER["REQUEST_URI"];
    if(isset($_GET['uri'])) {
      $this->uri = $_GET['uri'];
      $this->uri = rtrim($this->uri, '/');
      $this->uri = filter_var($this->uri, FILTER_SANITIZE_URL);
      $this->uri = explode('/', strtolower($this->uri));
      return $this->uri;
    }
  }

  /**
   * Método para ejecutar y cargar de forma automática el controlador solicitado por el usuario
   * su método y pasar parametros a él.
   *
   * @return void
   */
  private function dispatch() {

    // Filtrar la URL y separar la URI
    $this->filter_url();

    /////////////////////////////////////////////////////////////////////////////////
    // Necesitamos saber si se está pasando el nombre de un controlador en nuestro URI
    // $this->uri[0] es el controlador en cuestión
    if(isset($this->uri[0])) {
      $current_controller = $this->uri[0]; // users Controller.php
      unset($this->uri[0]);
    } else {
      $current_controller = DEFAULT_CONTROLLER; // home Controler.php
    }
    // Ejecución del controlador
    // Verificamos si existe una clase con el controlador solicitado
    $controller = $current_controller.'_controller'; // homeController
    if(!class_exists($controller)) {
      $current_controller = DEFAULT_ERROR_CONTROLLER; // Para que el CONTROLLER sea error
      $controller = DEFAULT_ERROR_CONTROLLER.'_controller'; // errorController
    }
    /////////////////////////////////////////////////////////////////////////////////
    // Ejecución del método solicitado
    if(isset($this->uri[1])) {
      $method = str_replace('-', '_', $this->uri[1]);
      // Existe o no el método dentro de la clase a ejecutar (controllador)
      if(!method_exists($controller, $method)) {
        $controller         = DEFAULT_ERROR_CONTROLLER.'_controller'; // errorController
        $current_method     = DEFAULT_METHOD; // index
        $current_controller = DEFAULT_ERROR_CONTROLLER;
      } else {
        $current_method = $method;
      }

      unset($this->uri[1]);
    } else {
      $current_method = DEFAULT_METHOD; // index
    }

    /////////////////////////////////////////////////////////////////////////////////
    // Creando constantes para utilizar más adelante
    define('CONTROLLER', $current_controller);
    define('METHOD'    , $current_method);
    

    /////////////////////////////////////////////////////////////////////////////////
    // Ejecutando controlador y método según se haga la petición
    // $controller = new $controller;

    // Obteniendo los parametros de la URI
    $params = array_values(empty($this->uri) ? [] : $this->uri);
    // Llamada al método que solicita el usuario en curso
    if(empty($params)) {
      call_user_func([$controller, $current_method]);   /// or array($controller, $current_method)
    } else {
      call_user_func_array([$controller, $current_method], $params);
    }

    return; // Línea final todo sucede entre esta línea y el comienzo
  }

  /**
   * Correr nuestro framework
   *
   * @return void
   */
  public static function run() {
    $sireci = new self();
    return;
  }
}