<?php

class Especialidad_model extends Model{
    
      /**
   * Método para agregar un nuevo usuario
   *
   * @return integer
   */
    public function add_especialidad($data){
        $sql = 'INSERT INTO especialidad (nombre, descripcion)'.
        ' VALUES (:nombre, :descripcion)';
        // | id_especialidad | int(11)      | NO   | PRI | NULL    | auto_increment |
        // | nombre          | varchar(150) | YES  |     | NULL    |                |
        // | descripcion     | varchar(150) | YES  |     | NULL

        try {
            $statement = parent::connect()->prepare($sql);
            $statement->bindParam(':nombre',$data['nombre']);
            $statement->bindParam(':descripcion',$data['descripcion']);            
            $statement->execute();
            return $statement;
        } catch (Exception $e) {
            throw $e;
        }
    }

    
}

?>