<?php
// require_once('classes/Db_model.php');
class Login_controller extends DB_PDO {

    public function __construct(){
        if(empty($_SESSION['username'])){

        }
    }
    function index(){
        View::render('index');
    }
    public function login_user($username,$password){
        $new_user = new DB_PDO();
        $query = "SELECT * FROM user WHERE user_username ="."'$username'"." and user_password ="."'$password' and user_state = 1 limit 1";
        $user = $new_user->run_simple_query($query);
        return $user;
    }


}