<?php 
class Api_controller extends Controller{
    
    protected $post_key;

    function __construct()
    {
        
    }
    public function setPostKey($post_key){
        $this->post_key = $post_key;
    }

    public static function index(){
        if (!Auth::validate()) {
            Flasher::new('Debes iniciar sesión primero.', 'danger');
            Redirect::to('login');
        }
        // View::render('index',['module' => 'admincontroller']);
    }

    public static function getModulo(){
        // $api = new Api_controller();
        // $api->setPostKey('hola como estas');
        // echo $api->post_key;
        

        if (!Auth::validate()) {
            Flasher::new('Debes iniciar sesión primero.', 'danger');
            Redirect::to('login');
        }
        if($_POST){
            
        }else{
            
        }
      
    }
}
?>