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
            $query = "SELECT * FROM practicas where Estudiantes_DNI = :dni  order by id_practicas desc";    //limit 1
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
        
        public function get_practicas_by_Es_Mod_Anio_Periodo($es, $modulo, $anio, $periodo, $dni_docente){
            $query = "SELECT * FROM practicas p inner join estudiantes e on p.Estudiantes_DNI = e.DNI inner join empresa em on em.RUC_codigo_ident = p.Empresa_RUC where Especialidad_id_especialidad = :especialidad and Modulo_id_modulo = :modulo and anio = :anio and periodo = :periodo and Docentes_DNI = :dnidoc order by id_practicas desc";            // by Especialidad_id_especialidad
            try{
                $statement = $this->connect()->prepare($query);
                $statement->bindParam(':especialidad',$es);
                $statement->bindParam(':modulo',$modulo);
                $statement->bindParam(':anio',$anio);
                $statement->bindParam(":periodo",$periodo);
                $statement->bindParam(':dnidoc',$dni_docente);
                $statement->execute();
                return $statement;
                // return ($statement->rowCount()>0) ? true : false ;
            }catch(Exception $e){
                throw $e;
            }  
        }
        public function get_practicas_by_Esp_Mod_Empresa($esp, $modulo){
            // $query = "SELECT * FROM practicas p inner join empresa em on em.RUC_codigo_ident = p.Empresa_RUC 
            // where Especialidad_id_especialidad = :especialidad and Modulo_id_modulo = :modulo order by id_practicas desc";            
            $query = "SELECT * FROM practicas p inner join empresa em on em.RUC_codigo_ident = p.Empresa_RUC 
            where Especialidad_id_especialidad = :especialidad and Modulo_id_modulo = :modulo order by id_practicas desc";    //group by em.RUC_codigo 
            try{
                $statement = $this->connect()->prepare($query);
                $statement->bindParam(':especialidad',$esp);
                $statement->bindParam(':modulo',$modulo);
                // $statement->bindParam(':dnidoc',$dni_docente);
                $statement->execute();
                return $statement;
                // return ($statement->rowCount()>0) ? true : false ;
            }catch(Exception $e){
                throw $e;
            }  
        }
        public function get_last_practica_by_estudentDNI($dni){
            $query = "SELECT * FROM practicas where Estudiantes_DNI = :dni order by id_practicas desc limit 1";            
            try{
                $statement = $this->connect()->prepare($query);
                $statement->bindParam(':dni',$dni);
                $statement->execute();
                return ($statement->rowCount()>0) ? $statement->fetchObject() : false;
            }catch(Exception $e){
                throw $e;
            }  
        }
        public function get_practica_by_id($id){
            $query = "SELECT * FROM practicas where id_practicas = :id";            
            try{
                $statement = $this->connect()->prepare($query);
                $statement->bindParam(':id',$id);
                $statement->execute();
                return ($statement->rowCount()>0) ? $statement->fetchObject() : false;
            }catch(Exception $e){
                throw $e;
            }  
        }

        public function update_validacion_practica($id_practica, $date_validacion){
            $query = "update practicas set validacion = :date_validation where id_practicas = :id_practica";            
            try{
                $statement = $this::connect()->prepare($query);
                $statement->bindParam(':date_validation',$date_validacion);
                $statement->bindParam(':id_practica',$id_practica);
                $statement->execute();
                return $statement;
            }catch(Exception $e){
                throw $e;
            } 
            
        }

        public function get_practicas_by_estudiante_esp_mod_anio_period($dni,$especialidad,$modulo,$anio,$periodo){
            $query = "SELECT * FROM practicas where Estudiantes_DNI = :dni and Especialidad_id_especialidad =:especialidad and Modulo_id_modulo =:modulo and anio =:anio and periodo =:periodo order by id_practicas desc";
            try{
                $statement = $this->connect()->prepare($query);
                $statement->bindParam(":dni",$dni);
                $statement->bindParam(':especialidad',$especialidad);
                $statement->bindParam(':modulo',$modulo);
                $statement->bindParam(':anio',$anio);
                $statement->bindParam(':periodo',$periodo);
                $statement->execute();
                return $statement;
                // return ($statement->rowCount()>0) ? true : false 
            }catch(Exception $e){
                throw $e;
            }  
        }

        public function lastId(){
            try {
                $query = "select * from practicas order by id_practicas desc limit 1";
                $statement = parent::connect()->prepare($query);
                $statement->execute();
                return $statement;
            } catch (Exception $e) {
                throw $e;
            }
        }

    }


?>