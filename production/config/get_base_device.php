<?php
require_once("dbcontroller.php");
require_once("set_mysql_server.php");
$db_handle = new DBController(DB_SCHEMA_PROJECT);

if(isset($_POST["filter"]) AND !empty($_POST["filter"])) {
	//$query ="SELECT * FROM devices WHERE model LIKE '%" . $_POST["filter"] . "%'";
	//$results = $db_handle->runQuery($query,DB_SCHEMA_BASE);
	$query ="SELECT * FROM devices WHERE model LIKE CONCAT('%',?,'%')";
	$results = $db_handle->prepareAndRunQuery($query,DB_SCHEMA_BASE,'s',$_POST["filter"]);
	echo json_encode($results);
}