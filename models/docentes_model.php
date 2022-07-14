<?php

class Docentes_model extends Model{
    
    public function add_doc($data){
        try {
            $query = 'INSERT INTO docentes (DNI, apellido_paterno, apellido_materno, nombres, fecha_nac, sexo, especialidad, celular, correo, direccion)'.
            ' VALUES (:DNI, :apellido_paterno, :apellido_materno, :nombres, :fecha_nac, :sexo, :especialidad, :celular, :correo, :direccion)';
            $statement = parent::connect()->prepare($query);
            $statement->bindParam(':DNI',$data['DNI']);
            $statement->bindParam(':apellido_paterno',$data['apellido_paterno']);
            $statement->bindParam(':apellido_materno',$data['apellido_materno']);
            $statement->bindParam(':nombres',$data['nombres']);
            $statement->bindParam(':fecha_nac',$data['fecha_nac']);
            $statement->bindParam(':sexo',$data['sexo']);
            $statement->bindParam(':especialidad',$data['especialidad']);
            $statement->bindParam(':celular',$data['celular']);
            $statement->bindParam(':correo',$data['correo']);
            $statement->bindParam(':direccion',$data['direccion']);
            $statement->execute();
            return $statement;
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