<?php
/* 	This page collects a list of data from the database depending on request.
 input: 	$_POST["filter"] a string to be used as a filter.
 return: echos a JSON that contains all the data in project.table_name table matching filter.
 */
function getData($action, $object_name, $table_name, $condition_parameter, $condition){
    
    require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/development/config/dbcontroller.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/development/config/set_mysql_server.php");
    $db_handle = new DBController(DB_SCHEMA_PROJECT);
    
    $query ="$action $object_name FROM $table_name $condition $condition_parameter LIKE CONCAT('%',?,'%')";
    $results = $db_handle->prepareAndRunQuery($query,DB_SCHEMA_PROJECT,$action,'s',$_POST["filter"]);
    echo json_encode($results);
    
}
?>