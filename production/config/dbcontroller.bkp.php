<?php
class DBController {   
	
	function __construct($db) {
		$conn = $this->connectDB($db);
		if(!empty($conn)) {
			$this->selectDB($conn,$db);
		}
	}
	
	function connectDB($db) {
	    require_once("set_mysql_server.php");
		$conn = new mysqli(DB_HOST,DB_USER,DB_PASS, $db);
		return $conn;
	}
	
	function selectDB($conn, $db) {
	    require_once("set_mysql_server.php");
		mysqli_select_db($conn, $db)or die("cannot select DB");
	}

	function runQuery($query,$db) {
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
	
	/* This function executes a sql query safely using prepared statements and bind parameterssafe sql execution.
	 * use: prepareAndRunQuery($Prepared_Query,$db,$format_string,$arg1,$arg2,...);
	 */
	function prepareAndRunQuery($query,$db,$formatStr,...$args) {
		$errors = array();
		$countArgs = count($args);
		if ( (substr_count($query, '?') != $countArgs) || (strlen($formatStr) != $countArgs) )
			$errors[] = "Mismatching number of args: amount of '?' in query, count of format string and count of args must be equal."; 
		
		require_once("set_mysql_server.php");
		$conn = new mysqli(DB_HOST,DB_USER,DB_PASS,$db);
		if(!$stmt = $conn->prepare($query))
			$errors[] = "Failed to prepare query.";
		if(!$stmt->bind_param($formatStr, ...$args))
			$errors[] = "Failed to bind parameters into query.";
		if(!$stmt->execute()){
			$errors[] = "Failed to execute query.";
			$errors[] = mysqli_stmt_error($stmt);
		}
		
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
			
}
?>