<?php
/* 	This page collects a list of devices from the database.
 input: 	$_POST["filter"] a string to be used as a filter.
 return: echos a JSON that contains all the devices in base.devices table matching filter.
 */
require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/dbcontroller.php");
require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/set_mysql_server.php");
$db_handle = new DBController(DB_SCHEMA_BASE);

if(isset($_POST["filter"]) AND !empty($_POST["filter"])) {
	$filter = str_replace('*', '%', $_POST["filter"]);
	$query ="SELECT * FROM devices WHERE model LIKE CONCAT('%',?,'%')";
	$results = $db_handle->prepareAndRunQuery($query,DB_SCHEMA_BASE,"SELECT",'s',$filter);
	echo json_encode($results);
}