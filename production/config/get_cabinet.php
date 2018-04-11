<?php
/* 	This page collects a list of cabinets from the database. filtered by room id.
 input: 	$_POST["rid"] room ID filter. if empty, returns all cabinets in the selected project.
 return: echos a JSON that contains all the cabinets in a specific room or all cabinets.
 */
require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/dbcontroller.php");
require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/set_mysql_server.php");
$db_handle = new DBController(DB_SCHEMA_MAP);
if(!empty($_POST["rid"]) AND  is_numeric($_POST["rid"])) {
	$query ="SELECT * FROM cabinets WHERE rid = ?";
	$results = $db_handle->prepareAndRunQuery($query,DB_SCHEMA_MAP,"SELECT",'i',$_POST["rid"]);
} else {
	if(!isset($_SESSION))
	{
		session_start();
	}
	$query ="SELECT cabinets.id, cabinets.name FROM mapping.cabinets as cabinets LEFT JOIN project.rooms as rooms ON cabinets.rid = rooms.id LEFT JOIN project.sites as sites ON rooms.sid = sites.id WHERE sites.pid = ?";
	$results = $db_handle->prepareAndRunQuery($query,DB_SCHEMA_PROJECT,"SELECT",'i',$_SESSION["project_id"]);
}
echo json_encode($results);
