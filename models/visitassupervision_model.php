<?php

class Visitassupervision_model extends Model{



    public function get_visitassu_estudiante($esp, $modulo, $anio, $periodo, $estudianteDNI){
        try {
            $query = "select id_visitas_supervicion, Practicas_id_practicas,  Practicas_Estudiantes_DNI, fecha,
            asistencia_ent_sal, actividad_trabajo, no_se_encontro, hora_fin, hora_fin, validacion          
            from practicas p inner join visitas_supervicion v on p.id_practicas = v.Practicas_id_practicas  
            where p.Especialidad_id_especialidad = :espcialidad and p.Modulo_id_modulo = :modulo and p.anio = :anio and p.periodo = :periodo and p.Estudiantes_DNI = :dni";
            $statement = parent::connect()->prepare($query);
            $statement->bindParam(':espcialidad',$esp) ;
            $statement->bindParam(':modulo',$modulo) ;
            $statement->bindParam(':anio',$anio) ;
            $statement->bindParam(':periodo',$periodo) ;
            $statement->bindParam(':dni',$estudianteDNI) ;
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
            //code...
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function get_visitassu_estudiante_ayax($esp, $modulo, $anio, $periodo, $estudianteDNI){
        try {
            $query = "select * from visitas_supervicion v inner join practicas p on v.Practicas_id_practicas = p.id_practicas 
            where p.Especialidad_id_especialidad = :espcialidad and p.Modulo_id_modulo = :modulo and p.anio = :anio and p.periodo = :periodo and p.Estudiantes_DNI = :dni";
            $statement = parent::connect()->prepare($query);
            $statement->bindParam(':espcialidad',$esp) ;
            $statement->bindParam(':modulo',$modulo) ;
            $statement->bindParam(':anio',$anio) ;
            $statement->bindParam(':periodo',$periodo) ;
            $statement->bindParam(':dni', $estudianteDNI);
            $statement->execute();
            // return $statement->fetchAll();
            return $statement;
            //code...
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function get_visitassu_to_teacher($esp, $modulo, $estudianteDNI){
        try {
            $query = "select * from visitas_supervicion v inner join practicas p on v.Practicas_id_practicas = p.id_practicas 
            where p.Especialidad_id_especialidad = :espcialidad and p.Modulo_id_modulo = :modulo and p.Estudiantes_DNI = :dni limit 1";
            $statement = parent::connect()->prepare($query);
            $statement->bindParam(':espcialidad',$esp) ;
            $statement->bindParam(':modulo',$modulo) ;
            $statement->bindParam(':dni',$estudianteDNI) ;
            $statement->execute();
            return ($statement->rowCount() > 0) ? $statement->fetchObject():false;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function get_visitassu_by_EspModDNIPract($esp, $modulo, $estudianteDNI){
        try {
            $query = "select * from visitas_supervicion v inner join practicas p on v.Practicas_id_practicas = p.id_practicas 
            where p.Especialidad_id_especialidad = :espcialidad and p.Modulo_id_modulo = :modulo and p.Estudiantes_DNI = :dni limit 1";
            $statement = parent::connect()->prepare($query);
            $statement->bindParam(':espcialidad',$esp) ;
            $statement->bindParam(':modulo',$modulo) ;
            $statement->bindParam(':dni',$estudianteDNI) ;
            $statement->execute();
            return ($statement->rowCount() > 0) ? $statement->fetchObject():false;
        } catch (Exception $e) {
            throw $e;
        }
    }

}

?>