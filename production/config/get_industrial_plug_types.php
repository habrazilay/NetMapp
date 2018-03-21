<?php
/* 	This page collects a list of sitess from the database.
 input: 	$_POST["filter"] a string to be used as a filter.
 return: echos a JSON that contains all the sites in project.sites table matching filter.
 */
require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/dbcontroller.php");
require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/set_mysql_server.php");
$db_handle = new DBController(DB_SCHEMA_BASE);

if(isset($_POST["extended"])) {
	$query ="SELECT * FROM powerIndustrialPlugTypes";
	if($_POST["extended"]==FALSE OR strtolower($_POST["extended"])==="false")
		$query.=" WHERE isBasic=TRUE";
	$results = $db_handle->runQuery($query, DB_SCHEMA_BASE);
	echo json_encode($results);
}