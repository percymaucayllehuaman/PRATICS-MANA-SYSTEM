<?php
require_once './core/db_model.php';

class Session_controller extends DB_PDO{

   public function login($user,$password){
      return;
   }

   public function loguot(){
      return;
   }

   public function save_binnacle($data){
      $sql=$this->connect()->prepare("INSERT INTO bitacora(bitacora_codigo,bitacora_fecha,bitacora_horaInicio,bitacora_horaFin,bitacora_tipoUsuario,bitacora_ano,bitacora_id_usuario) VALUES(:Code,:Date,:StartTime,:EndTime,:Type,:Year,:AccountCode)");
      $sql->bindParam(":Code",$data['Code']);
      $sql->bindParam(":Date",$data['Date']);
      $sql->bindParam(":StartTime",$data['StartTime']);
      $sql->bindParam(":EndTime",$data['EndTime']); 
      $sql->bindParam(":Type",$data['Type']);
      $sql->bindParam(":Year",$data['Year']);
      $sql->bindParam(":AccountCode",$data['AccountCode']);
      $sql->execute();
      return $sql;
  }

  public function update_binnacle($code,$time){
      $sql=$this->connect()->prepare("UPDATE bitacora SET bitacora_horaFin=:EndTime WHERE  bitacora_codigo=:Code");
      $sql->bindParam(":EndTime",$time);
      $sql->bindParam(":Code",$code);
      $sql->execute();
      return $sql;

  }

  public function delete_binnacle($code){
      $sql=$this->connect()->prepare("DELETE FROM bitacora WHERE bitacora_id_usuario=:Code");
      $sql->bindParam(":Code",$code);
      $sql->execute();
      return $sql;

  }


}

?>