<?php

require_once 'core/db_model.php';

class Municipality_model extends DB_PDO{
    
    public function insert($data){
        $statemant = DB_PDO::connect()->prepare("INSERT INTO municipality(muni_name,muni_address,muni_logo,muni_ruc,muni_web_site)".
        " VALUES(:muni_name,:muni_address,:muni_logo,:muni_ruc,:muni_web_site)");
        $statemant->bindParam(":muni_name",$data['muni_name']);
        $statemant->bindParam(":muni_address",$data['muni_address']);
        $statemant->bindParam(":muni_logo",$data['muni_logo']);
        $statemant->bindParam(":muni_ruc",$data['muni_ruc']);
        $statemant->bindParam(":muni_web_site",$data['muni_web_site']);
        $statemant->execute();
        return $statemant;
    }

    public function getMunicipality(){
        return DB_PDO::run_simple_query("select * from municipality limit 1");
    }
}

