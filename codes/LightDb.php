<?php
namespace franckycodes\database;

use PDO;
class LightDb  {
	//protected $db;
	protected $query;
	public function __construct() {
		//$this->db = new Database ();
		// echo 'table created';
		$this->query = ''; 
	}
	
	public function newColumn($tableName, $cols){
		Database::connect()->exec('ALTER TABLE '.$tableName.' ADD ('.$cols.')');
		 
	}
	//show all cols in a specific table in database
	public function showCols($table)
	{
		$db = Database::connect();
		$result = $db->query('SELECT * FROM '.$table);
		// $result = $db->query('SHOW TABLES');
		echo 'table '.$table.' columns are :<br>';
		$counter=0;
		$data=0;
		foreach($result->fetchAll(PDO::FETCH_ASSOC) as $key=>$val)
		{
			// var_dump($smt);
			
			$data=$val;
			$counter++;
			if($counter==1)
			{
				echo '<pre>';
				var_dump($data);
				echo '</pre>';
				break;
			}	
			
			// var_dump($val); 
		}
		
	}
	//show all tables in database
	public function showAll(){
		$db = Database::connect();
		$result = $db->query('SHOW TABLES');
		// $result = $db->query('SHOW TABLES');
		echo 'all tables in your current databases<br>';
		foreach($result->fetchAll(PDO::FETCH_ASSOC) as $key=>$val)
		{
			// var_dump($smt);
			echo $val['Tables_in_'.strtolower(DB_NAME)].'<br>';
			// var_dump($val); 
		}
		
	}
	
	public function showColumns($table){
		//select * from tables;
	}
	//GET DB 
	public function getDb()
	{
		return Database::connect();
	}
	public function getAll(){
		$db = Database::connect();
		$result = $db->query('SHOW TABLES');
		 
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}
	
	/*maka donnees 
	parametres: 6 $fields='id', $table='user', $condition=0, $arr=0, $order=0, $limit=0
	*/

	public function select($fields='id', $table='user', $condition=0, $arr=0, $order=0, $limit=0){ 
		if($condition AND $arr AND $order AND $limit){
			$all = $this->query('SELECT '.$fields.' FROM '.$table.' WHERE '.$condition.' ORDER BY '.$order.' LIMIT '.$limit, true, $arr, true); 
		}else if($order AND $limit){ 
			$all = $this->query('SELECT '.$fields.' FROM '.$table.' ORDER BY '.$order.' LIMIT '.$limit, true, [], true); 
		}else if(!$order AND !$limit){
			//echo 'no order no limit';
			$all = $this->query('SELECT '.$fields.' FROM '.$table.' WHERE '.$condition  , true, $arr, true, true); 
		}else{
			$all = $this->query('SELECT '.$fields.' FROM '.$table.' WHERE '.$condition.' ORDER BY '.$order.' LIMIT '.$limit, true, $arr, true); 
		}
		return $all; 
	}
	public function changeField($newName){
		//$this->query('ALTER TABLE '.$oldName.' CHANGE '.)
	}
	/* method that updates fields of a given table in a database*/
	public function update($nomTable, $set, $condition, $arr){ 
		$this->query('UPDATE '.$nomTable.' SET '.$set.' WHERE '.$condition,
			true, $arr);
	}
	public function getTotal($table='visitor', $condition=0, $arr=[]){
		if($condition)
		{
			$total = (int) $this->query('SELECT count(id) total FROM '.$table.' WHERE '.$condition, true, $arr, true, true)['total'];
		}
		else
		{
			$total = (int) $this->query('SELECT count(id) total FROM '.$table, false, [], true, true)['total'];
		}
		return $total;
	}
	public function getCurrentDate() {
		return $this->query ( 'SELECT DATE_FORMAT(NOW(), "%d/%m/%Y %h:%i%:%s %p") currentDate', false, [ ], true, true ) ['currentDate'];
	}
	public function get($query){
		$result= Database::connect()->query ( $query );
	    return $result->fetch ();
	}
	/*
	 * query()
	 * parameters: 5
	 * return void
	 */
	public function query($query, $prepared = false, $array = [], $returnValue = false, $single = false) {
		try {
			
			if ($prepared) {
				$text = $query . ' ,';
				foreach ( $array as $key => $val ) {
					$text .= $key . ' <=  \'' . $val . '\'';
				}
				$this->query = $text;
			} else {
				$this->query = $query;
			}
			$connect = Database::connect ();
			 
			if (! $returnValue) {
				if ($prepared) {
					// echo '<pre>';
					// var_dump ( $array );
					// echo '</pre>';
					// echo '<br>';
					// echo $query;
					// echo '<br>';
					$query = $connect->prepare ( $query );
					$query->execute ( $array );
					$query->closeCursor();
				} else {
					
					$query = $connect->query ( $query );
				}
			} else {
				// code if query must return values
				if ($single and $prepared) {
					// do some complex stuff
					$query = $connect->prepare ( $query );
					$query->execute ( $array );
					$data = $query->fetch ();
					$query->closeCursor();
					return $data;
				} else if ($single and ! $prepared) {
					$query = $connect->query ( $query );
					$data=$query->fetch ();
					return $data;
				} else if ($prepared and ! $single) {
					// echo 'prepared and not single';
					$query = $connect->prepare ( $query );
					$query->execute ( $array );
					$all = $query->fetchAll ( PDO::FETCH_ASSOC );
					$query->closeCursor();
					return $all;
				} else {
					// echo 'what the heck?';
					$query = $connect->query ( $query );
					$all = $query->fetchAll ( PDO::FETCH_ASSOC );
					$query->closeCursor();
					return $all;
				}
			} 
		} catch ( PDOException $e ) {
			// mampiseho ny tsy nety
			//echo '<p>misy diso ny requete sql nao: ' . $e->getMessage () . '</p>';
		}
	}
	public function getQuery() {
		return $this->query;
	}
	public function getEmail($idUser) {
		$email = $this->query ( 'select email from user where id=:user', true, [ 
				'user' => $idUser 
		], true, true ) ['email'];
		return $email ? $email : false;
	}
	public function changeName($table, $newName) {
	}
	// public function create($name) {
	// }
	public function delete($name) {
	}
	public function dropColumn($tableName,$col)
	{
		try{
			$db=new LightDb();
			$db->query('ALTER TABLE '.$tableName.' DROP COLUMN '.$col);
		}catch(PDOException $e)
		{

		}
	}
	public function alterTable($table='users', $attributes='user_lang VARCHAR, user_hp int')
	{
		try{

			$db=new LightDb();
	 		$db->query('ALTER TABLE '.$table.' ADD('.$attributes.')');
		}catch(PDOException $e)
		{

		}
	}
}
