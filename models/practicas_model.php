<?php 

    class Practicas_model extends Model{
        

        function add_practica($data){
            $query = "INSERT INTO practicas (Estudiantes_DNI, Especialidad_id_especialidad, 
            Modulo_id_modulo, seccion, anio, periodo, Empresa_RUC, Docentes_DNI, tipo, fecha_inicio, 
            fecha_fin, turno, hora_inicio, hora_fin, validacion) value(:Estudiantes_DNI, :Especialidad_id_especialidad, 
            :Modulo_id_modulo, :seccion, :anio, :periodo, :Empresa_RUC, :Docentes_DNI, :tipo, :fecha_inicio, 
            :fecha_fin, :turno, :hora_inicio, :hora_fin, :validacion)";
            try {
                $statement = parent::connect()->prepare($query);
                $statement->bindParam(':Estudiantes_DNI',$data['Estudiantes_DNI']); 
                $statement->bindParam(':Especialidad_id_especialidad',$data['Especialidad_id_especialidad']); 
                $statement->bindParam(':Modulo_id_modulo',$data['Modulo_id_modulo']); 
                $statement->bindParam(':seccion',$data['seccion']); 
                $statement->bindParam(':anio',$data['anio']); 
                $statement->bindParam(':periodo',$data['periodo']); 
                $statement->bindParam(':Empresa_RUC',$data['Empresa_RUC']); 
                $statement->bindParam(':Docentes_DNI',$data['Docentes_DNI']); 
                $statement->bindParam(':tipo',$data['tipo']); 
                $statement->bindParam(':fecha_inicio',$data['fecha_inicio']); 
                $statement->bindParam(':fecha_fin',$data['fecha_fin']); 
                $statement->bindParam(':turno',$data['turno']); 
                $statement->bindParam(':hora_inicio',$data['hora_inicio']); 
                $statement->bindParam(':hora_fin',$data['hora_fin']); 
                $statement->bindParam(':validacion',$data['validacion']); 
                $statement->execute();
                return $statement;
            } catch (Exception $e) {
                throw $e;
            }
            
        }
        public function get_practicas_by_estudiante($dni){
            $query = "SELECT * FROM practicas where Estudiantes_DNI = :dni";
            try{
                $statement = $this->connect()->prepare($query);
                $statement->bindParam(":dni",$dni);
                $statement->execute();
                return $statement;
                // return ($statement->rowCount()>0) ? true : false ;
            }catch(Exception $e){
                throw $e;
            }  
        }
    }


?>