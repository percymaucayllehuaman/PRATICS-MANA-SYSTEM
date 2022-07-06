<?php

class Especialidad_model extends Model{
    
      /**
   * Método para agregar un nuevo usuario
   *
   * @return integer
   */
    public function add_esp($data){
        $sql = 'INSERT INTO empresa (nombre, descripcion)'.
        ' VALUES (:nombre, :descripcion)';
        // | id_especialidad | int(11)      | NO   | PRI | NULL    | auto_increment |
        // | nombre          | varchar(150) | YES  |     | NULL    |                |
        // | descripcion     | varchar(150) | YES  |     | NULL

        try {
            return ($this->id = parent::query($sql, $data)) ? $data['ruc'] : false;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function delete_esp_by_id($id){
        $sql = 'delete from especialidad where id_especialidad = :especialidad';
        $data = ['especialidad' => $id];

        try {
            return (parent::query($sql, $data)) ? true : false; ;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function update_esp($data){
        $sql = 'UPDATE especialidad SET nombre = :nombre, descripcion = :descripcion WHERE id_especialidad = :id_especialidad';
        // $data = 
        // [
        //     'DNI' => $_POST['DNI'],
        //     'apellido_paterno' => $_POST['apellido_paterno'],
        //     'apellido_materno' => $_POST['apellido_materno'],
        //     'nombres' => $_POST['nombres'],
        //     'fecha_nac' => $_POST['fecha_nac'],
        //     'sexo' => $_POST['sexo'],
        //     'departamento' => $_POST['departamento'],
        //     'provincia' => $_POST['provincia'],
        //     'distrito' => $_POST['distrito'],
        //     'correo' => $_POST['correo'],
        //     'celular' => $_POST['celular'],
        //     'direccion' => $_POST['direccion'],
        //     'grado_instruccion' => $_POST['grado_instruccion'],
        //     'estado_civil' => $_POST['estado_civil']
        // ]

        try {
            return (parent::query($sql, $data)) ? true : false;
        } catch (Exception $e) {
            throw $e;
        }
    
    }

    public function exist_emp_DNI($dni){
        $sql = 'select * from estudiantes where DNI = :DNI';
        $dni = ['DNI' =>$dni];
        try {
            return (parent::query($sql,$dni)) ? true : false;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function search_emp_nombres($nombres){
        $sql = "SELECT * from estudiantes where nombres like '%:nombres%'";
        $nombres = ['nombres' => $nombres];
        try {
            return ($rows = parent::query($sql,$nombres)) ? $rows : false;
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function search_emp_DNI($dni){
        $sql = "SELECT * from estudiantes where DNI like '%:DNI%'";
        $dni = ['DNI' => $dni];
        try {
            return ($rows = parent::query($sql,$dni)) ? $rows : false;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function get_emp_by_DNI($dni){
        $sql = "SELECT * from estudiantes where DNI = :DNI";
        $dni = ['DNI' => $dni];
        try {
            return ($rows = parent::query($sql,$dni)) ? $rows : false;
        } catch (Exception $e) {
            throw $e;
        }
    }
    
}

?>