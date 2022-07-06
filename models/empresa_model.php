<?php

class Empresa_model extends Model{
    
      /**
   * Método para agregar un nuevo usuario
   *
   * @return integer
   */
    public function add_emp($data){
        $sql = 'INSERT INTO empresa (RUC_codigo_ident, Estudiantes_DNI, nombre, rubro, departamento, provincia, distrito, direccion, nom_ape_encargado, sexo_encargado, celular, correo, fecha_hora_registro, fecha_hora_validacion, doc_convenio)'.
        ' VALUES (:RUC_codigo_ident, :Estudiantes_DNI, :nombre, :rubro, :departamento, :provincia, :distrito, :direccion, :nom_ape_encargado, :sexo_encargado, :celular, :correo, :fecha_hora_registro, :fecha_hora_validacion, :doc_convenio)';
        // | RUC_codigo_ident      | int(11)      | NO   | PRI | NULL    |       |
        // | Estudiantes_DNI       | int(11)      | NO   |     | NULL    |       |
        // | nombre                | varchar(200) | YES  |     | NULL    |       |
        // | rubro                 | varchar(80)  | YES  |     | NULL    |       |
        // | departamento          | varchar(45)  | YES  |     | NULL    |       |
        // | provincia             | varchar(45)  | YES  |     | NULL    |       |
        // | distrito              | varchar(45)  | YES  |     | NULL    |       |
        // | direccion             | varchar(45)  | YES  |     | NULL    |       |
        // | nom_ape_encargado     | varchar(55)  | YES  |     | NULL    |       |
        // | sexo_encargado        | varchar(12)  | YES  |     | NULL    |       |
        // | celular               | varchar(9)   | YES  |     | NULL    |       |
        // | correo                | varchar(60)  | YES  |     | NULL    |       |
        // | fecha_hora_registro   | datetime     | YES  |     | NULL    |       |
        // | fecha_hora_validacion | datetime     | YES  |     | NULL    |       |
        // | doc_convenio          | varchar(150) | YES  |     | NULL

        try {
            return ($this->id = parent::query($sql, $data)) ? $data['ruc'] : false;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function delete_emp_by_dni($ruc){
        $sql = 'delete from empresa where RUC_codigo_ident = :ruc';
        $data = ['ruc' => $ruc];

        try {
            return (parent::query($sql, $data)) ? true : false; ;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function update_emp($data){
        $sql = 'UPDATE empresa SET Estudiantes_DNI = :Estudiantes_DNI, nombre = :nombre, rubro = :rubro, departamento = :departamento, provincia = :provincia, distrito = :distrito, direccion = :direccion, nom_ape_encargado = :nom_ape_encargado, sexo_encargado = :sexo_encargado, celular = :celular, correo = :correo, fecha_hora_registro = :fecha_hora_registro, fecha_hora_validacion = :fecha_hora_validacion, doc_convenio = :doc_convenio WHERE RUC_codigo_ident = :RUC_codigo_ident';
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