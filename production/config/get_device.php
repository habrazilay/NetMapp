<?php
/* 	This page collects a list of devices from the database. filtered by cabinet id.
 input: 	$_POST["cabid"] cabinet ID filter. if empty, returns all devices in the selected project.
 return: echos a JSON that contains all the devices in a specific cabinet or all devices in the project.
 */
require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/dbcontroller.php");
require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/set_mysql_server.php");
$db_handle = new DBController(DB_SCHEMA_MAP);
if(!empty($_POST["cabid"]) AND  is_numeric($_POST["cabid"])) {
	$query ="SELECT * FROM devices WHERE cabid = ?";
	$results = $db_handle->prepareAndRunQuery($query,DB_SCHEMA_MAP,"SELECT",'i',$_POST["cabid"]);
} elseif (empty($_POST["cabid"])){
	if(!isset($_SESSION))
	{
		session_start();
	}
	$query = "SELECT devCab.name as cabName, devMap.masterid, devBase.model, devMap.name, devBase.type, devMap.uLoc, devMap.uHeight, devMap.description FROM mapping.devices as devMap LEFT JOIN base.devices as devBase ON devMap.typeid = devBase.id LEFT JOIN mapping.cabinets as devCab ON devMap.cabid = devCab.id LEFT JOIN project.rooms as cabRoom ON devCab.rid = cabRoom.id LEFT JOIN project.sites as siteRoom ON cabRoom.sid = siteRoom.id WHERE siteRoom.pid =?";
	$results = $db_handle->prepareAndRunQuery($query,DB_MULTI_SCHEMA,"SELECT",'i',$_SESSION["project_id"]);
	//$results = $db_handle->prepareAndRunQuery($query,DB_SCHEMA_PROJECT,"SELECT",'i',$_SESSION["project_id"]);
}
echo json_encode($results);
