<?php

class Modulo_model extends Model{


    public function add_modulo($data){
        $sql = "INSERT INTO modulo(Especialidad_id_especialidad, nombre, descripcion) 
        value(:Especialidad_id_especialidad, :nombre ,:descripcion)";
        try {
            $statement = parent::connect()->prepare($sql);
            $statement->bindParam('Especialidad_id_especialidad',$data['Especialidad_id_especialidad']);
            $statement->bindParam('nombre',$data['nombre']);
            $statement->bindParam('descripcion',$data['descripcion']);
            $statement->execute();
            return $statement;
        } catch (Exception $e) {
            throw $e;
        }
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

    function get_modulos_by_Id_especialidad($id){
        $sql = "select * from modulo where Especialidad_id_especialidad = :especialidad";
        try {
            $statement = parent::connect()->prepare($sql);
            $statement->bindParam(':especialidad', $id);
            $statement->execute();
            return $statement;
        } catch (Exception $e) {
            throw $e;
        }
    }
}

?>