<?php
require_once("dbcontroller.php");
require_once("set_mysql_server.php");
$db_handle = new DBController(DB_SCHEMA_MAP);
var_dump($_POST);
if(!empty($_POST["rid"])) {
	$query ="SELECT * FROM cabinets WHERE rid = ?";
	$results = $db_handle->prepareAndRunQuery($query,DB_SCHEMA_MAP,'i',$_POST["rid"]);
?>
<?php
	if(empty($results)) return;
    foreach($results as $cabinet) {
?>
    <option value="<?php echo $cabinet["id"]; ?>"><?php echo $cabinet["name"]; ?></option>
<?php
    }
}
?>