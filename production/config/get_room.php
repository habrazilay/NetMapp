<?php
/* 	This page collects a list of rooms from the database.
 input: 	$_POST["sid"] site ID filter. if empty, returns all rooms in the selected project.
 return: echos a JSON that contains all the rooms in a specific site or all sites.
 */
require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/dbcontroller.php");
require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/set_mysql_server.php");
$db_handle = new DBController(DB_SCHEMA_PROJECT);

if(!empty($_POST["sid"]) AND is_numeric($_POST["sid"])) {
	$query ="SELECT * FROM rooms WHERE sid = ?";
	$results = $db_handle->prepareAndRunQuery($query,DB_SCHEMA_PROJECT,"SELECT",'i',$_POST["sid"]);
} elseif (empty($_POST["sid"])) { //get all rooms in current project.
	if(!isset($_SESSION))
	{
		session_start();
	}
	$query ="SELECT rooms.id, rooms.name FROM project.rooms as rooms LEFT JOIN project.sites as sites ON rooms.sid = sites.id WHERE sites.pid = ?";
	$results = $db_handle->prepareAndRunQuery($query,DB_SCHEMA_PROJECT,"SELECT",'i',$_SESSION["project_id"]);
}
echo json_encode($results);