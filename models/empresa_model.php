<?php

class Empresa_model extends Model{
    
      /**
   * Método para agregar un nuevo usuario
   *
   * @return integer
   */
    public function add_emp($data){
        $query = 'INSERT INTO empresa (RUC_codigo_ident, Estudiantes_DNI, nombre, rubro, departamento, provincia, distrito, direccion, nom_ape_encargado, sexo_encargado, celular, correo, fecha_hora_registro, fecha_hora_validacion, doc_convenio)'.
        ' VALUES (:RUC_codigo_ident, :Estudiantes_DNI, :nombre, :rubro, :departamento, :provincia, :distrito, :direccion, :nom_ape_encargado, :sexo_encargado, :celular, :correo, :fecha_hora_registro, :fecha_hora_validacion, :doc_convenio)';

        try {
            $statement = parent::connect()->prepare($query);
            $statement->bindParam('RUC_codigo_ident', $data['RUC_codigo_ident']);
            $statement->bindParam('Estudiantes_DNI', $data['Estudiantes_DNI']);
            $statement->bindParam('nombre', $data['nombre']);
            $statement->bindParam('rubro', $data['rubro']);
            $statement->bindParam('departamento', $data['departamento']);
            $statement->bindParam('provincia', $data['provincia']);
            $statement->bindParam('distrito', $data['distrito']);
            $statement->bindParam('direccion', $data['direccion']);
            $statement->bindParam('nom_ape_encargado', $data['nom_ape_encargado']);
            $statement->bindParam('sexo_encargado', $data['sexo_encargado']);
            $statement->bindParam('celular', $data['celular']);
            $statement->bindParam('correo', $data['correo']);
            $statement->bindParam('fecha_hora_registro', $data['fecha_hora_registro']);
            $statement->bindParam('fecha_hora_validacion', $data['fecha_hora_validacion']);
            $statement->bindParam('doc_convenio', $data['doc_convenio']);
            $statement->execute();
            return $statement;
            // return ($this->id = parent::query($sql, $data)) ? $data['ruc'] : false;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function delete_emp_by_ruc($ruc){
        $sql = 'delete from empresa where RUC_codigo_ident = :ruc';
        try {
            $statement = parent::connect()->prepare($sql);
            $statement->bindParam(':ruc','$ruc');
            $statement->execute();
            return $statement;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function get_empresas_by_estudent($dni){
		$query = "select * from  empresa where Estudiantes_DNI = :dni";
		try {
			$statement = parent::connect()->prepare($query);
            $statement->bindParam(':dni',$dni);
			$statement->execute();
			return $statement;
		} catch (Exception $e) {
			throw $e;
		}
	}
    public function update_emp($data){
        $sql = 'UPDATE empresa SET Estudiantes_DNI = :Estudiantes_DNI, nombre = :nombre, rubro = :rubro, departamento = :departamento, provincia = :provincia, distrito = :distrito, direccion = :direccion, nom_ape_encargado = :nom_ape_encargado, sexo_encargado = :sexo_encargado, celular = :celular, correo = :correo, fecha_hora_registro = :fecha_hora_registro, fecha_hora_validacion = :fecha_hora_validacion, doc_convenio = :doc_convenio WHERE RUC_codigo_ident = :RUC_codigo_ident';
        // $data = 
        // [
        //     
        // ]

        try {
            $statement = parent::connect()->prepare($sql);
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

    function get_empresa_by_id($id){
        try {
            $statement = $this->connect()->prepare("select * from empresa where RUC_codigo_ident = :id");
            $statement->bindParam(':id',$id);
            $statement->execute();
            return ($statement->rowCount()==1)? $statement->fetchObject() : false;
        } catch (Exception $e) {
            throw $e;
        }
    }
    
}

?>