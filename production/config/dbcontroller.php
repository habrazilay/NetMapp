<?php
class DBController {   
	
	function __construct($db) {
		$conn = $this->connectDB($db);
		if(!empty($conn)) {
			$this->selectDB($conn, $db);
		}
	}
	
	function connectDB($db) {
	    require_once("set_mysql_server.php");
		$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,$db);
		return $conn;
	}
	
	function selectDB($conn, $db) {
	    require_once("set_mysql_server.php");
		mysqli_select_db($conn, $db)or die("cannot select DB");
	}

	function runQuery($query, $db) {
	    $conn = new mysqli(DB_HOST,DB_USER,DB_PASS,$db);
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