<?php

class Docentes_model extends Model{
    
    public function add_doc($data){
        try {
            $query = 'INSERT INTO docentes (DNI, apellido_paterno, apellido_materno, nombres, fecha_nac, sexo, especialidad, celular, correo, direccion)'.
            ' VALUES (:DNI, :apellido_paterno, :apellido_materno, :nombres, :fecha_nac, :sexo, :especialidad, :celular, :correo, :direccion)';
            $statement = parent::connect()->prepare($query);
            $statement->bindParam(':DNI',$data['DNI']);
            $statement->bindParam(':apellido_paterno',$data['apellido_paterno']);
            $statement->bindParam(':apellido_materno',$data['apellido_materno']);
            $statement->bindParam(':nombres',$data['nombres']);
            $statement->bindParam(':fecha_nac',$data['fecha_nac']);
            $statement->bindParam(':sexo',$data['sexo']);
            $statement->bindParam(':especialidad',$data['especialidad']);
            $statement->bindParam(':celular',$data['celular']);
            $statement->bindParam(':correo',$data['correo']);
            $statement->bindParam(':direccion',$data['direccion']);
            $statement->execute();
            return $statement;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static  function get_by_ID($id){
        $query = 'SELECT * FROM docentes where DNI = :id_docente';
        try {
            $statement = parent::connect()->prepare($query);
            $statement->bindParam(':id_docente',$id);
            $statement->execute();

            if($statement->rowCount()==1){
                return $statement->fetchObject();
            }else{
                return false;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static  function get_by_DNI($dni){
        $query = 'SELECT * FROM docentes where DNI = :DNI limit 1';
        try {
            $statement = parent::connect()->prepare($query);
            $statement->bindParam(':DNI',$dni);
            $statement->execute();

            if($statement->rowCount()==1){
                return $statement->fetchObject();
            }else{
                return false;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function delete_doc_by_dni($dni){
        $query = 'delete from docentes where DNI = :DNI';
        try {
            $statement = parent::connect()->prepare($query);
            $statement->bindParam(':DNI', $dni);
            $statement->execute();
            return $statement;
        } catch (Exception $e) {
            throw $e;
        }
    }  
}

?>