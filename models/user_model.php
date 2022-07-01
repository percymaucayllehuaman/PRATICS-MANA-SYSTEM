<?php

require_once './core/db_model.php';

class User extends DB_PDO{
    
    protected $table = "user";

    public function login($user, $password){
        try{
            $query = $this->connect()->prepare("SELECT * FROM user WHERE (user_username=:user or user_email=:user ) and user_password=:password and user_state = 1");
            $query->bindParam(":user",$user);
            $query->bindParam(":password",$password);
            $query->execute();
            return $query;
        }catch(Exception $e){
            throw $e;
        }
    }

    public function logout(){
        session_destroy();
        return;
    }

    public function insert($data){
        $sql=$this->connect()->prepare("INSERT INTO user(user_name,user_first_lastname,user_second_lastname,user_address,user_telephone,user_email,user_profile,user_log_date,user_is_admin,user_is_active,user_username,user_password,user_state) ".
        " VALUES(:user_name,:user_first_lastname,:user_second_lastname,:user_address,:user_telephone,:user_email,:user_profile,:user_log_date,:user_is_admin,:user_is_active,:user_:username,:user_password,:user_state)");
        $sql->bindParam(":user_name",$data['user_name']);
        $sql->bindParam(":user_first_lastname",$data['user_first_lastname']);
        $sql->bindParam(":user_second_lastname",$data['user_second_lastname']);
        $sql->bindParam(":user_address",$data['user_address']);
        $sql->bindParam(":user_telephone",$data['user_telephone']);
        $sql->bindParam(":user_email",$data['user_email']);
        $sql->bindParam(":user_profile",$data['user_profile']);
        $sql->bindParam(":user_log_date",$data['user_log_date']);
        $sql->bindParam(":user_is_admin",$data['user_is_admin']);
        $sql->bindParam(":user_is_active",$data['user_is_active']);
        $sql->bindParam(":user_username",$data['user_username']);
        $sql->bindParam(":user_password",$data['user_password']);
        $sql->execute();
        return $sql;
    }

    public function update($id){

    }
    public function disable($id){
        $query = $this->connect()->prepare("UPDATE user SET user_state = 0 WHERE user_id = :id");
        $query->bindParam(":id",$id);
        $query->execute();
        return $query;
    }

    public function exists($column, $search_text){
        $query = "SELECT * FROM user WHERE ".$column." =:search_text";
        try{
            $statement = $this->connect()->prepare($query);
            $statement->bindParam(":search_text",$search_text);
            $statement->execute();
            if($statement->rowCount()>0){
                return true;
            }else{
                return false;
            }
        }catch(Exception $e){
            throw $e;
        }  
    }
}
