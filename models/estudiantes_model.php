<?php 


class Estudiantes_model extends Model {

    public function add_prac($data){
        try {
            $query = 'INSERT INTO estudiantes (DNI, apellido_paterno, apellido_materno, nombres, fecha_nac, sexo, departamento, provincia, distrito, correo, celular, direccion, grado_instruccion, estado_civil)'.
            ' VALUES (:DNI, :apellido_paterno, :apellido_materno, :nombres, :fecha_nac, :sexo, :departamento, :provincia, :distrito, :correo, :celular, :direccion, :grado_instruccion, :estado_civil)';
            $statement = parent::connect()->prepare($query);
            $statement->bindParam(':DNI',$data['DNI']);
            $statement->bindParam(':apellido_paterno',$data['apellido_paterno']);
            $statement->bindParam(':apellido_materno',$data['apellido_materno']);
            $statement->bindParam(':nombres',$data['nombres']);
            $statement->bindParam(':fecha_nac',$data['fecha_nac']);
            $statement->bindParam(':sexo',$data['sexo']);
            $statement->bindParam(':departamento',$data['departamento']);
            $statement->bindParam(':provincia',$data['provincia']);
            $statement->bindParam(':distrito',$data['distrito']);
            $statement->bindParam(':correo',$data['correo']);
            $statement->bindParam(':celular',$data['celular']);
            $statement->bindParam(':direccion',$data['direccion']);
            $statement->bindParam(':grado_instruccion',$data['grado_instruccion']);
            $statement->bindParam(':estado_civil',$data['estado_civil']);
            $statement->execute();
            return $statement;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public static  function get_by_ID($id){
        $query = 'SELECT * FROM estudiantes where DNI = :id_estudiante';
        try {
            $statement = parent::connect()->prepare($query);
            $statement->bindParam(':id_estudiante',$id);
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
        $query = 'SELECT * FROM estudiantes where DNI = :DNI limit 1';
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

}