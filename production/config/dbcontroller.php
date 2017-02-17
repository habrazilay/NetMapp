<?php
class DBController {   
	
	function __construct() {
		$conn = $this->connectDB();
		if(!empty($conn)) {
			$this->selectDB($conn);
		}
	}
	
	function connectDB() {
	    require_once("set_mysql_server.php");
		$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_SCHEMA_PROJECT);
		return $conn;
	}
	
	function selectDB($conn) {
	    require_once("set_mysql_server.php");
		mysqli_select_db($conn, DB_SCHEMA_PROJECT)or die("cannot select DB");
	}

	function runQuery($query) {
	    $conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_SCHEMA_PROJECT);
		$result = mysqli_query($conn, $query);
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
}
?>