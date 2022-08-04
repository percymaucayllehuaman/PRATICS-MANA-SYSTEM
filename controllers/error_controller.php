<?php 
class Error_controller extends Controller {
  function __construct()
  {
    
  }
  
  static function index() {
    $data =
    [
      'message' => 'Página no encontrada',
      'error-type' =>"Error 404",
      'bg'    => 'dark'
    ];
    View::render('404', $data);
  }  
}