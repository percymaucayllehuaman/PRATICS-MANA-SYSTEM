<?php

class Estudiantes_model extends Model{
    
    public function add_docu($data){
        $sql = 'INSERT INTO documentos (Practicas_id_practicas, Practicas_Estudiantes_DNI, fecha, Tipo, ruta_archivo, validacion, observacion)'.
        ' VALUES ( :Practicas_id_practicas, :Practicas_Estudiantes_DNI, :fecha, :Tipo, :ruta_archivo, :validacion, :observacion)';
    
        // | id_documentos             | int(11)      | NO   | PRI | NULL    | auto_increment |
        // | Practicas_id_practicas    | int(11)      | NO   |     | NULL    |                |
        // | Practicas_Estudiantes_DNI | int(11)      | NO   |     | NULL    |                |
        // | fecha                     | date         | YES  |     | NULL    |                |
        // | Tipo                      | varchar(45)  | YES  |     | NULL    |                |
        // | ruta_archivo              | varchar(200) | YES  |     | NULL    |                |
        // | validacion                | datetime     | YES  |     | NULL    |                |
        // | observacion

        try {
            return ($this->id = parent::query($sql, $data)) ? $data['DNI'] : false;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function delete_docu_by_id($id){
        $sql = 'delete from documentos where id_documentos = :id';
        $data = ['id' => $id];

        try {
            return (parent::query($sql, $data)) ? true : false; ;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function update_docu($data){
        $sql = 'UPDATE documentos SET DNI = :DNI, apellido_paterno = :apellido_paterno, apellido_materno = :apellido_materno, nombres = :nombres, fecha_nac = :fecha_nac, sexo = :sexo, departamento = :departamento, provincia = :provincia, distrito = :distrito, correo = :correo, celular = :celular, direccion = :direccion, grado_instruccion = :grado_instruccion, estado_civil = :estado_civil WHERE DNI=:DNI';
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

    public function exist_docu_DNI($dni){
        $sql = 'select * from documentos where DNI = :DNI';
        $dni = ['DNI' =>$dni];
        try {
            return (parent::query($sql,$dni)) ? true : false;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function search_docu_nombres($nombres){
        $sql = "SELECT * from documentos where nombres like '%:nombres%'";
        $nombres = ['nombres' => $nombres];
        try {
            return ($rows = parent::query($sql,$nombres)) ? $rows : false;
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function all_docu_dni($dni){
        $sql = "SELECT * from documentos where Practicas_Estudiantes_DNI = :dni";
        $dni = ['dni' => $dni];
        try {
            return ($rows = parent::query($sql,$dni)) ? $rows : false;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function get_docu_by_id($id){
        $sql = "SELECT * from documentos where id_documentos = :id";
        $dni = ['id' => $id];
        try {
            return ($rows = parent::query($sql,$dni)) ? $rows : false;
        } catch (Exception $e) {
            throw $e;
        }
    }
    
}

?>