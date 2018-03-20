<?php

include($_SERVER['DOCUMENT_ROOT']."/NetMapp/development/loginVerify.php");

$errors = array();

if (isset ( $_POST ['add_new_device'] )) {
	// include the configs / constants for the database connection and schema
	require_once ($_SERVER['DOCUMENT_ROOT']."/NetMapp/development/config/set_mysql_server.php");
	require_once ($_SERVER['DOCUMENT_ROOT']."/NetMapp/development/config/dbcontroller.php");
	
	$cabAid = (isset($_POST ['cab_name_A']) ? $_POST ['cab_name_A'] : "Empty");
	$cabBid = (isset($_POST ['cab_name_B']) ? $_POST ['cab_name_B'] : "Empty");
	$uLocA = $_POST ['pp_uloc_A'];
	$uLocB = $_POST ['pp_uloc_B'];
	$uHeightA = $_POST ['pp_uheight_A'];
	$uHeightB = $_POST ['pp_uheight_B'];
	$uLengthA = (isset($_POST ['pp_ulength_A']) ? $_POST ['pp_ulength_A'] : 1.0);
	$uLengthB = (isset($_POST ['pp_ulength_B']) ? $_POST ['pp_ulength_B'] : 1.0);
	
	$portTypeid = (isset($_POST ['port_type']) ? $_POST ['port_type'] : "Empty");
	$amount = (isset($_POST ['pp_ports_amount']) ? $_POST ['pp_ports_amount'] : "Empty");
	$name = (isset($_POST ['pp_name']) ? $_POST ['pp_name'] : NULL);
	$pattern = (isset($_POST ['pp_pattern']) ? $_POST ['pp_pattern'] : NULL);
	$patternFirst = (isset($_POST ['pp_pattern_first']) ? $_POST ['pp_pattern_first'] : NULL);
	$skip = (isset($_POST ['pp_skip']) ? $_POST ['pp_skip'] : "Empty");
	
	$userid = $_SESSION ['user_id'];
	
	if(!is_numeric($cabAid) || !is_numeric($cabBid))
		$errors[] = "Invalid Cabinet selection.";
	if(!is_numeric($uLocA) || !is_numeric($uLocB))
		$errors[] = "Installed U is not a number.";
	if(!is_numeric($uHeightA) || !is_numeric($uHeightB))
		$errors[] = "PP Height is not a number.";
	if(    (	!( is_numeric($uLengthA) || is_float($uLengthA) ) 
			|| 	$uLengthA>1.0 
			|| 	$uLengthA<0.1 )
		|| (	!( is_numeric($uLengthB) || is_float($uLengthB) ) 
			|| 	$uLengthB>1.0 
			|| 	$uLengthB<0.1 )
		)
		$errors[] = "Device Width ratio is not a valid number between 0.1 to 1.";
	if(!is_numeric($portTypeid))
		$errors[] = "Invalid port type selection.";
	if($name == NULL)
		$errors[] = "PP name is empty.";
	if( $pattern == NULL || $wildcardIndex === false)
		$erros[] = "Pattern is empty.";
	else{
		$wildcardIndex = strpos($pattern,"*");
		if($wildcardIndex === false)
			$erros[] = "Invalid pattern supplied.\n please use * for pattern location.";
	}
		
	
	
	if(!is_numeric($powerFeedType))
		$errors[] = "Invalid power feed type selection.";
	if(!is_numeric($powerFeedAmount))
		$errors[] = "Power feeds available is not a number.";
	if(!empty($activePorts) && !is_numeric($activePorts))
		$errors[] = "Active ports is not a number.";
	if(!is_numeric($installationType))
		$errors[] = "Invald installation type selection.";
	if($faceFront!=0 && $faceFront!=1) 	
		$errors[] = "Invalid data on is facing front.";
	
	if(empty($errors)){
		
		mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
		try {
			$db_handle = new DBController ( DB_SCHEMA_MAP );
			$query = "INSERT INTO devices (cabid,masterid,uLoc,uHeight,uLength,name,typeid,powerFeedType,powerFeedAmount,activePorts,installationType,faceFront,description) Values (?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$db_handle->prepareAndRunQuery($query,DB_SCHEMA_MAP,"INSERT",'isiidsiiiiiis',$cabid,$masterid,$uLoc,$uHeight,$uLength,$name,$typeid,$powerFeedType,$powerFeedAmount,$activePorts,$installationType,$faceFront,$description);
			
			if($db_handle->affectedRows() < 1)
				$errors[] = "Error failed to insert into the DB.";
		}
		catch (Exception $ex) {
			$errors[] = $ex->getMessage();	
		}
	}
}
else
	$errors[]="add_new_device is not set.";

if (empty($errors)){
	$errors["status"] = "Success";
	$errors["msg"] = "Device: " . $masterid . " successfully added to the database.";
}
else
	$errors["status"] = "Failed";

echo json_encode($errors);
	

