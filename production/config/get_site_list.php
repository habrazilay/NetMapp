<?php
/* 	This page collects a list of sitess from the database.
 input: 	$_POST["filter"] a string to be used as a filter.
 return: echos a JSON that contains all the sites in project.sites table matching filter.
 */
require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/dbcontroller.php");
require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/set_mysql_server.php");
$db_handle = new DBController(DB_SCHEMA_PROJECT);

/*
if(isset($_POST["filter"]) AND !empty($_POST["filter"])) {
	$query ="SELECT * FROM sites WHERE name LIKE CONCAT('%',?,'%')";
	$results = $db_handle->prepareAndRunQuery($query,DB_SCHEMA_PROJET,'s',$_POST["filter"]);
	echo json_encode($results);
}
*/
if(!isset($_SESSION))
{
	session_start();
}
$query ="SELECT * FROM sites WHERE pid = ? AND name LIKE CONCAT('%',?,'%')";
$results = $db_handle->prepareAndRunQuery($query,DB_SCHEMA_PROJECT,"SELECT",'is',$_SESSION["project_id"],$_POST["filter"]);
echo json_encode($results);