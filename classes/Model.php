<?php 

require_once(CLASSES.'Db_config.php');

class Model extends DB_PDO {
	
	protected static $table='';

	public function first_data($table){
		try {
			$answer=$this->connect()->prepare("select * from ".$table." limit 1");
			$answer->execute();
			return $answer;

		}catch(Exception $e){
			throw $e;
		}
		
	}
	public function last_data($table, $order_by){
		try {
			$answer=$this->connect()->prepare("select * from ".$table." order by ".$order_by." desc limit 1");
			$answer->execute();
			return $answer;

		}catch(Exception $e){
			throw $e;
		}
		
	}
	 
    public function exists($table,$column, $search_text){
        $query = "SELECT * FROM ".$table." WHERE ".$column." = :search_text";
        try{
            $statement = $this->connect()->prepare($query);
            $statement->bindParam(":search_text",$search_text);
            $statement->execute();

            return ($statement->rowCount()>0) ? true : false ;
            // if($statement->rowCount()>0){
            //     return true;
            // }else{
            //     return false;
            // }
        }catch(Exception $e){
            throw $e;
        }  
    }

	protected function save_binnacle($data){

		$sql=self::connect()->prepare("INSERT INTO bitacora(bitacora_codigo,bitacora_fecha,bitacora_horaInicio,bitacora_horaFin,bitacora_tipoUsuario,bitacora_ano,bitacora_id_usuario) VALUES(:Code,:Date,:StartTime,:EndTime,:Type,:Year,:AccountCode)");
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
	protected function update_binnacle($code,$time){

		$sql=self::connect()->prepare("UPDATE bitacora SET bitacora_horaFin=:EndTime WHERE  bitacora_codigo=:Code");
		$sql->bindParam(":EndTime",$time);
		$sql->bindParam(":Code",$code);
		$sql->execute();
		return $sql;

	}
	protected function delete_binnacle($code){
		$sql=self::connect()->prepare("DELETE FROM bitacora WHERE bitacora_id_usuario=:Code");
		$sql->bindParam(":Code",$code);
		$sql->execute();
		return $sql;

	}










  /**
   * Lista registros de la base de datos o un solo registro
   *
   * @param string $table
   * @param array $params
   * @param integer $limit
   * @return void
   */
	public static function list($table, $params = [], $limit = null)
	{	
		// It creates the col names and values to bind
		$cols_values = "";
		$limits      = "";
		if (!empty($params)) {
			$cols_values .= "WHERE";
			foreach ($params as $key => $value) {
				$cols_values .= " {$key} = :{$key} AND";
			}
			$cols_values = substr($cols_values, 0 , -3);
		}

		// If $limit is set, set a limit of data read
		if ($limit !== null) {
			$limits = " LIMIT {$limit}";
		}

		// run_simple_query creation
		$stmt = "SELECT * FROM $table {$cols_values}{$limits}";

		// Calling DB and run_simple_querying
		if (!$rows = parent::run_simple_query($stmt , $params)) {
      return false;
		}

    return $limit === 1 ? $rows[0] : $rows;
  }
  
  /**
	* Add a new record to DB
	* @access public
	* @var string | array
	* @return bool
	**/
	public static function add($table, $params)
	{	
		$cols = "";
		$placeholders = "";
		foreach ($params as $key => $value) {
			$cols .= "{$key} ,";
			$placeholders .= ":{$key} ,";
		}
		$cols = substr($cols, 0 , -1);
		$placeholders = substr($placeholders, 0 , -1);
		$stmt = 
		"INSERT INTO {$table}
		({$cols})
		VALUES
		({$placeholders})
		";
		
		// Manda el statement a query()
		if ($id = parent::run_simple_query($stmt , $params)) {
			return $id;
		}
		else {
			return false;
		}
  }
  
  /**
	* Add a new record to DB
	* @access public
	* @var string | array
	* @return bool
	**/
	public static function update($table, $haystack = [] , $params = [])
	{	
		$placeholders = "";
		$col          = "";

		foreach ($params as $key => $value) {
			$placeholders .= " {$key} = :{$key} ,";
		}
		$placeholders = substr($placeholders, 0 , -1);

		if(count($haystack) > 1){
			foreach ($haystack as $key => $value) {
				$col .= " $key = :$key AND";
			}
			$col = substr($col, 0, -3);
		} else {
			foreach ($haystack as $key => $value) {
				$col .= " $key = :$key";
			}
		}

		$stmt = 
		"UPDATE $table
		SET
		$placeholders
		WHERE
		$col
		";

		// Manda el statement a query()
		if (!parent::run_simple_query($stmt , array_merge($params,$haystack))) {
      return false;
		}
    
    return true;
  }
  
  /**
   * Borra un registro de la base de datos
   *
   * @param string $table
   * @param array $params
   * @param integer $limit
   * @return void
   */
  public static function remove($table, $params = [], $limit = 1)
	{	
		// It creates the col names and values to bind
		$cols_values = "";
		$limits = "";
		if (!empty($params)) {
			$cols_values .= "WHERE";
			foreach ($params as $key => $value) {
				$cols_values .= " {$key} = :{$key} AND";
			}
			$cols_values = substr($cols_values, 0 , -3);
		}

		// If $limit is set, set a limit of data read
		if ($limit !== null) {
			$limits = " LIMIT {$limit}";
		}

		// Query creation
		$stmt = "DELETE FROM $table {$cols_values}{$limits}";

		// Calling DB and querying
		if (!$row = parent::run_simple_query($stmt , $params)) {
      return false;
		}
    
    return $row;
	}
}