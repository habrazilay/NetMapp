<?php

class DBController {   
	
	private $conn;
	private $db;
	private $affectedRows;
	
	function __construct($db) {
		$this->db = $db;
		$this->connectDB();
		if(!empty($this->conn)) {
			$this->selectDB();
		}
	}
	
	function connectDB() {
	    require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/set_mysql_server.php");
		$this->conn = new mysqli(DB_HOST,DB_USER,DB_PASS, $this->db);
	}
	
	function selectDB() {
	    require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/set_mysql_server.php");
		mysqli_select_db($this->conn, $this->db)or die("cannot select DB");
	}

	function runQuery($query,$db) {
	    //$this->conn = new mysqli(DB_HOST,DB_USER,DB_PASS,$this->db);
		$result = mysqli_query($this->conn, $query);
		while($row=$result->fetch_assoc()) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
	
	/* This function executes a sql query safely using prepared statements and bind parameterssafe sql execution.
	 * use: prepareAndRunQuery($Prepared_Query,$this->db,$format_string,$arg1,$arg2,...);
	 */
	function prepareAndRunQuery($query,$db,$formatStr,...$args) {
		$errors = array();
		$countArgs = count($args);
		if ( (substr_count($query, '?') != $countArgs) || (strlen($formatStr) != $countArgs) )
			$errors[] = "Mismatching number of args: amount of '?' in query, count of format string and count of args must be equal."; 
		
		//require_once("set_mysql_server.php");
		//$this->conn = new mysqli(DB_HOST,DB_USER,DB_PASS,$this->db);
		if(!$stmt = $this->conn->prepare($query))
			$errors[] = "Failed to prepare query.";
		if(!$stmt->bind_param($formatStr, ...$args))
			$errors[] = "Failed to bind parameters into query.";
		if(!$stmt->execute()){
			$errors[] = "Failed to execute query.";
			$errors[] = mysqli_stmt_error($stmt);
		}
		$this->affectedRows = mysqli_affected_rows($this->conn);
		
		if(!empty($errors)){
			echo print_r($errors);
			return false;
		}
			
		$result = $stmt->get_result();
		if($result) {
			while($row=$result->fetch_assoc()) {
				$resultset[] = $row;
			}
		if(!empty($resultset))
			return $resultset;
		}
		
	}
	
	function affectedRows() {
		return $this->affectedRows;
	}
			
}

?>