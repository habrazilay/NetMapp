<?php

class DBController {   
	
	private $conn;
	private $db;
	private $affectedRows;
	private $sqlLogPath;
	
	function __construct($db) {
		$this->db = $db;
		$this->connectDB();
		if(!empty($this->conn)) {
			$this->selectDB($this->db);
		}
		// set logger path
		$this->sqlLogPath = "/";
		$pathsToTest = array("/var/log","/tmp","C:/Apache24/logs","C:/Apache/logs","C:/Windows/Temp");
		foreach ($pathsToTest as $path) {
			if(is_writable($path)) {
				$this->sqlLogPath = $path;
				break;
			} 
		}
	}
	
	function connectDB() {
	    require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/development/config/set_mysql_server.php");
		$this->conn = new mysqli(DB_HOST,DB_USER,DB_PASS, $this->db);
	}
	
	function selectDB($db) {
	    require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/development/config/set_mysql_server.php");
		mysqli_select_db($this->conn, $db)or die("cannot select DB");
	}

	function runQuery($query,$db,$type="SELECT") {
	    //$this->conn = new mysqli(DB_HOST,DB_USER,DB_PASS,$this->db);
		$this->write_log_sql("Starting to execute an SQL query.".PHP_EOL."\tQuery: '".$query."' , ".PHP_EOL."\tDB: '".$db."' ");
		
	    $this->selectDB($db);
		$result = mysqli_query($this->conn, $query);
		$this->affectedRows =  mysqli_affected_rows($this->conn);
		//case insertion query executed.
		if(strcasecmp($type,"INSERT") == 0 || strcasecmp($type,"UPDATE") == 0 || strcasecmp($type,"DELETE") == 0)
			return $result;
			
		if($result) {
			while($row=$result->fetch_assoc()) {
				$resultset[] = $row;
			}		
		}
		if(!empty($resultset))
			return $resultset;
		return FALSE;
	}
		
	function numRows($query) {
		$result  = mysqli_query($query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
	
	/* This function executes a sql query safely using prepared statements and bind parameterssafe sql execution.
	 * use: prepareAndRunQuery($Prepared_Query,$this->db,$format_string,$arg1,$arg2,...);
	 */
	function prepareAndRunQuery($query,$db,$type,$formatStr,...$args) {
		$errors = array();
		$this->write_log_sql("Starting to execute an SQL query.".PHP_EOL."\tQuery: '".$query."' , ".PHP_EOL."\tDB: '".$db."' , ".PHP_EOL."\tformatStr: '".$formatStr."', ".PHP_EOL."\tAgrs: '".print_r($args)."' ");
		
		$countArgs = count($args);
		if ( (substr_count($query, '?') != $countArgs) || (strlen($formatStr) != $countArgs) )
			$errors[] = "Mismatching number of args: amount of '?' in query, count of format string and count of args must be equal."; 
		
		//require_once("set_mysql_server.php");
		//$this->conn = new mysqli(DB_HOST,DB_USER,DB_PASS,$this->db);
		
		$this->selectDB($db);
		if(!$stmt = $this->conn->prepare($query))
			$errors[] = "Failed to prepare query.";
		if(!$stmt->bind_param($formatStr, ...$args))
			$errors[] = "Failed to bind parameters into query.";
		if(!$stmt->execute()){
			$errors[] = "Failed to execute query.";
			$errors[] = mysqli_stmt_error($stmt);
		}
		
		if(!empty($errors)){
			echo print_r($errors);
			$this->write_log_sql(print_r($errors,true));
			return false;
		}
		
		//check if executed an INSERT/UPDATE/DELETE Query
		if(strcasecmp($type,"INSERT") == 0 || strcasecmp($type,"UPDATE") == 0 || strcasecmp($type,"DELETE") == 0) {
			$this->affectedRows = $stmt->affected_rows;
			return TRUE;
		} else { //query returned a result set.
			$result = $stmt->get_result();
			if($result) {
				$this->affectedRows = $result->num_rows;
				while($row=$result->fetch_assoc()) {
					$resultset[] = $row;
				}
				if(!empty($resultset))
					return $resultset;
			}
		}
		
		
		
			
		
		
	}
	
	
	function getLastError() {
		return mysqli_error($this->conn);
	}
	
	function affectedRows() {
		return $this->affectedRows;
	}
	
	function insert_id() {
		return mysqli_insert_id($this->conn);
	}
	
	function write_log_sql($string){
		error_log(date('Y-m-d H:i:sO')." ".$string.PHP_EOL."\tLogged User: ".$_SESSION['user_name'].PHP_EOL,3,$this->sqlLogPath."/NM-sql.log");
	}
	
			
}

?>