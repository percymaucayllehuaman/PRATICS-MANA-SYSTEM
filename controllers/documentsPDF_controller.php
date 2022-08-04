<?php 
class DocumentsPDF_controller extends Controller {
  function __construct()
  {
    
  }
  
  static function index() {
    
    View::render('index');
  }  
}