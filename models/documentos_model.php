<?php

class Documentos_model extends Model{
    
    public function add_document($data){
        $sql = 'INSERT INTO documentos (Practicas_id_practicas, Practicas_Estudiantes_DNI, fecha, tipo, ruta_archivo, validacion, observacion)'.
        ' VALUES (:Practicas_id_practicas, :Practicas_Estudiantes_DNI, :fecha, :tipo, :ruta_archivo, :validacion, :observacion)';
        try {
            $statement = parent::connect()->prepare($sql);
            $statement->bindParam(':Practicas_id_practicas', $data['Practicas_id_practicas']);
            $statement->bindParam(':Practicas_Estudiantes_DNI', $data['Practicas_Estudiantes_DNI']);
            $statement->bindParam(':fecha', $data['fecha']);
            $statement->bindParam(':tipo', $data['tipo']);
            $statement->bindParam(':ruta_archivo', $data['ruta_archivo']);
            $statement->bindParam(':validacion', $data['validacion']);
            $statement->bindParam(':observacion', $data['observacion']);
            var_dump($statement);
            $statement->execute();
            return $statement;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function get_document_by_EstudianteDNI($dni){
        $query = 'select * from documentos where Practicas_Estudiantes_DNI = :DNI';
        try {
            $statement = parent::connect()->prepare($query);
            $statement->bindParam(':DNI',$dni);
            $statement->execute();
            return $statement->fetchAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function get_list_estudiantes_by_EspAndMod($especialidad, $modulo){
        $query = 'select * from documentos d inner join Practicas p on d.Practicas_id_practicas = p.id_practicas
         inner join Estudiantes e on e.DNI = d.Practicas_Estudiantes_DNI where p.Especialidad_id_especialidad = :especialidad and p.Modulo_id_modulo = :modulo';
        try{
            $statement = parent::connect()->prepare($query);
            $statement->bindParam(':especialidad',$especialidad);
            $statement->bindParam(':modulo',$modulo);
            $statement->execute();
            return $statement->fetchAll();
            // return ($statement->rowCount()>0) ? $statement->fetchAll():false;
            // return $statement;
        }catch(Exception $e){
            throw $e;
        }
    }

    public function update_validate_document($id, $date){
        $query = 'update documentos set validacion = :validacion  where id_documentos = :id';
       try{
           $statement = parent::connect()->prepare($query);
           $statement->bindParam(':validacion',$date);
           $statement->bindParam(':id',$id);
           $statement->execute();
           return $statement;
       }catch(Exception $e){
           throw $e;
       } 
    }
    


                //         id_documentos             | int(11)      | NO   | PRI | NULL    | auto_increment |
            // | Practicas_id_practicas    | int(11)      | NO   |     | NULL    |                |
            // | Practicas_Estudiantes_DNI | int(11)      | NO   |     | NULL    |                |
            // | fecha                     | date         | YES  |     | NULL    |                |
            // | tipo                      | varchar(45)  | YES  |     | NULL    |                |
            // | ruta_archivo              | varchar(255) | YES  |     | NULL    |                |
            // | validacion                | datetime     | YES  |     | NULL    |                |
            // | observacion
}

?>