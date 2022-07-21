<?php

class Modulo_model extends Model{


    public function addd(){
        return;
    }

    function get_modulo_by_id($id){
        try {
            $statement = $this->connect()->prepare("select * from modulo where id_modulo = :id");
            $statement->bindParam(':id',$id);
            $statement->execute();
            return ($statement->rowCount()==1)? $statement->fetchObject() : false;
        } catch (Exception $e) {
            throw $e;
        }
    }
}

?>