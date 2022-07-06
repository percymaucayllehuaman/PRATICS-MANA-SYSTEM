<?php

class Docentes_model extends Model{
    
      /**
   * Método para agregar un nuevo usuario
   *
   * @return integer
   */
    public function add_doc($data){
        $sql = 'INSERT INTO docentes (DNI, apellido_paterno, apellido_materno, nombres, fecha_nac, sexo, especialidad, celular, correo, direccion)'.
        ' VALUES (:DNI, :apellido_paterno, :apellido_materno, :nombres, :fecha_nac, :sexo, :especialidad, :celular, :correo, :direccion)';
       
        // | DNI              | int(11)     | NO   | PRI | NULL    |       |
        // | apellido_paterno | varchar(25) | YES  |     | NULL    |       |
        // | apellido_materno | varchar(25) | YES  |     | NULL    |       |
        // | nombres          | varchar(25) | YES  |     | NULL    |       |
        // | fecha_nac        | date        | YES  |     | NULL    |       |
        // | sexo             | varchar(12) | YES  |     | NULL    |       |
        // | especialidad     | varchar(45) | YES  |     | NULL    |       |
        // | celular          | varchar(9)  | YES  |     | NULL    |       |
        // | correo           | varchar(60) | YES  |     | NULL    |       |
        // | direccion        | varchar(80) | YES  |     | NULL    |

        try {
            return ($this->id = parent::query($sql, $data)) ? $data['DNI'] : false;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function delete_doc_by_dni($dni){
        $sql = 'delete from docentes where DNI = :DNI';
        $data = ['DNI' => $dni];

        try {
            return (parent::query($sql, $data)) ? true : false; ;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function update_doc($data){
        $sql = 'UPDATE docentes SET DNI = :DNI, apellido_paterno = :apellido_paterno, apellido_materno = :apellido_materno, nomnombresres = :nombres, fecha_nac = :fecha_nac, sexo = :sexo, especialidad = :especialidad, celular = :celular, correo = :correo, direccion = :direccion WHERE DNI=:DNI';
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

    public function exist_doc_DNI($dni){
        $sql = 'select * from docentes where DNI = :DNI';
        $dni = ['DNI' =>$dni];
        try {
            return (parent::query($sql,$dni)) ? true : false;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function search_doc_nombres($nombres){
        $sql = "SELECT * from docentes where nombres like '%:nombres%'";
        $nombres = ['nombres' => $nombres];
        try {
            return ($rows = parent::query($sql,$nombres)) ? $rows : false;
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function search_doc_DNI($dni){
        $sql = "SELECT * from docentes where DNI like '%:DNI%'";
        $dni = ['DNI' => $dni];
        try {
            return ($rows = parent::query($sql,$dni)) ? $rows : false;
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function get_doc_by_DNI($dni){
        $sql = "SELECT * from docentes where DNI = :DNI";
        $dni = ['DNI' => $dni];
        try {
            return ($rows = parent::query($sql,$dni)) ? $rows : false;
        } catch (Exception $e) {
            throw $e;
        }
    }
    
}

?>