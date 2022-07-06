<?php

class Estudiantes_model extends Model{
    
      /**
   * Método para agregar un nuevo usuario
   *
   * @return integer
   */
    public function add_est($data){
        $sql = 'INSERT INTO estudiantes (DNI, apellido_paterno, apellido_materno, nombres, fecha_nac, sexo, departamento, provincia, distrito, correo, celular, direccion, grado_instruccion, estado_civil)'.
        ' VALUES (:DNI, :apellido_paterno, :apellido_materno, :nombres, :fecha_nac, :sexo, :departamento, :provincia, :distrito, :correo, :celular, :direccion, :grado_instruccion, :estado_civil)';
        // $data = 
        // [
        //   'DNI'       => $this->$_POST['user-dni'],
        //   'apellido_paterno'   => $_POST['user-apellido-p'],
        //   'apellido_materno'      => $_POST['user-apellido-mat'],
        //   'nombres' => $_POST['user-nombres'],
        // ];

        try {
            return ($this->id = parent::query($sql, $data)) ? $data['DNI'] : false;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function delete_est_by_dni($dni){
        $sql = 'delete from estudiantes where DNI = :DNI';
        $data = ['DNI' => $dni];

        try {
            return (parent::query($sql, $data)) ? true : false; ;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function update_est($data){
        $sql = 'UPDATE estudiantes SET DNI = :DNI, apellido_paterno = :apellido_paterno, apellido_materno = :apellido_materno, nombres = :nombres, fecha_nac = :fecha_nac, sexo = :sexo, departamento = :departamento, provincia = :provincia, distrito = :distrito, correo = :correo, celular = :celular, direccion = :direccion, grado_instruccion = :grado_instruccion, estado_civil = :estado_civil WHERE DNI=:DNI';
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

    public function exist_est_DNI($dni){
        $sql = 'select * from estudiantes where DNI = :DNI';
        $dni = ['DNI' =>$dni];
        try {
            return (parent::query($sql,$dni)) ? true : false;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function search_est_nombres($nombres){
        $sql = "SELECT * from estudiantes where nombres like '%:nombres%'";
        $nombres = ['nombres' => $nombres];
        try {
            return ($rows = parent::query($sql,$nombres)) ? $rows : false;
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function search_est_DNI($dni){
        $sql = "SELECT * from estudiantes where DNI like '%:DNI%'";
        $dni = ['DNI' => $dni];
        try {
            return ($rows = parent::query($sql,$dni)) ? $rows : false;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function get_est_by_DNI($dni){
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