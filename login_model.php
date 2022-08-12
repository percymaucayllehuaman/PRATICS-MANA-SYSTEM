<?php


class Login_model extends Model{

    public function add_login($data){     ////id_usuario is auto_increment
        try {
            $sql=parent::connect()->prepare('INSERT INTO Login(usuario, contrasenia, user_type) VALUES(:usuario, :contrasenia, :user_type)');
            $sql->bindParam(":usuario",$data['usuario']);
            $sql->bindParam(":contrasenia",$data['contrasenia']);
            $sql->bindParam(":user_type",$data['user_type']);
            $sql->execute();
            
            return $sql;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function exist_usuario($usuario){     ////id_usuario is auto_increment
    
        try {
            $sql=parent::connect()->prepare('select * from Login where usuario = :usuario');
            $sql->bindParam(":usuario",$usuario);
            $sql->execute();
            
            return $sql;
        } catch (Exception $e) {
            throw $e;
        } 
    }
    
    public function update_password($id , $contrasenia){     ////id_usuario is auto_increment
        try {
            $sql = parent::connect()->prepare('update Login set contrasenia = :contrasenia where id_usuario = :id_usuario') ;
            $sql->bindParam(":contrasenia",$contrasenia);
            $sql->bindParam(":id_usuario",$id);
            $sql->execute();
            return $sql;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static function log_in($usuario , $contrasenia){     ////id_usuario is auto_increment   
        try {
            $sql = parent::connect()->prepare('select * from Login where usuario = :usuario and contrasenia = :contrasenia limit 1');
            $sql->bindParam(':usuario',$usuario);
            $sql->bindParam(':contrasenia',$contrasenia);
            $sql->execute();
            if($sql->rowCount()>0){
                return $sql->fetchObject();
            }else{
                return false;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function get_login_id($id){     ////id_usuario is auto_increment
        try {
            $sql = parent::connect()->prepare('select * from Login where id_usuario = :id_usuario');
            $sql->bindParam(':id_usuario',$id);
            $sql->execute();
            return $sql;
        } catch (Exception $e) {
            throw $e;
        }
    }
   
}
