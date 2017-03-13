<?php

include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/loginVerify.php");

$errors = array();

if (isset ( $_POST ['add_new_device'] )) {
	// include the configs / constants for the database connection and schema
	require_once ($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/set_mysql_server.php");
	require_once ($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/dbcontroller2.php");
	
	$cabid = (isset($_POST ['cab_name']) ? $_POST ['cab_name'] : "Empty");
	$masterid = $_POST ['dev_master_id'];
	$uLoc = $_POST ['dev_uloc'];
	$uHeight = $_POST ['dev_uheight'];
	$uLength = (isset($_POST ['dev_ulength']) ? $_POST ['dev_ulength'] : 1.0);
	$name = (isset($_POST ['dev_client_name']) ? $_POST ['dev_client_name'] : NULL);
	$typeid = $_POST ['dev_type'];
	$powerFeedType = $_POST['dev_power_feed_type'];
	$powerFeedAmount = $_POST['dev_power_feed_amount'];
	$activePorts = (isset($_POST['dev_ports']) ? $_POST['dev_ports'] : NULL);
	$installationType = (isset($_POST['dev_installation_type']) ? $_POST['dev_installation_type'] : "Empty");
	//$phase = $_POST['dev_phase'];
	//$arrivalDate = $_POST['dev_arrival_date'];
	$faceFront = $_POST['dev_facing_front'];
	$description = (isset($_POST ['dev_description']) ? $_POST ['dev_description'] : NULL);
	$userid = $_SESSION ['user_id'];
	
	if(!is_numeric($cabid))
		$errors[] = "Invalid Cabinet selection.";
	if(!is_numeric($uLoc))
		$errors[] = "Installed U is not a number.";
	if(!is_numeric($uHeight))
		$errors[] = "Device Height is not a number.";
	if((!( is_numeric($uLength) || is_float($uLength) ) 
		|| $uLength>1.0 
		|| $uLength<0.1 ) )
		$errors[] = "Device Width ratio is not a valid number between 0.1 to 1.";
	if(!is_numeric($typeid))
		$errors[] = "Invalid device model selection.";
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
			$db_handle->prepareAndRunQuery($query,DB_SCHEMA_MAP,'isiidsiiiiiis',$cabid,$masterid,$uLoc,$uHeight,$uLength,$name,$typeid,$powerFeedType,$powerFeedAmount,$activePorts,$installationType,$faceFront,$description);
			
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
	

