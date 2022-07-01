
<?php

require_once 'core/db_model.php';

class Person extends DB_PDO{

    public $table = "birth_certificate";

    public function insert(){
        return;    
    }
    public function update(){
        return;
    }
    public function delete(){
        
    }

    public function find($birth_id){
        try{
            $query = "SELECT * FROM ".$this->table." WHERE (birth_id = :birth_id and birth_state = 1 )";
            $statement = $this->connect()->prepare($query);
            $statement->bindParam(":birth_id",$birth_id);
            $statement->execute();
            return $statement;
        }catch(Exception $e){
            throw $e;
        }
    }
    public function find_by_person_id($person_id){
        try{
            $statement = $this->connect()->prepare("SELECT * FROM  ".$this->table." WHERE ( person_per_id = :person_id and birth_state = 1)");
            $statement->bindParam(":person_id",$person_id);
            $statement->execute();
            return $statement;
        }catch(Exception $e){
            throw $e;
        }
    }
    public function exists($column,$text_found){
        $r = false;
        try{
            $query = "select * from ".$this->table." where :column = :text_found";
            $statement = $this->connect()->prepare($query);
            $statement->bindParam(":column",$column);
            $statement->bindParam(":text_found",$text_found);
            $statement->execute();
            if($statement->rowCount()>0){
                $r = true;
            }
            return $r;
        }catch(Exception $e){
            throw $e;
        }
    }

}

