<?php
require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/dbcontroller.php");
require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/set_mysql_server.php");
$db_handle = new DBController(DB_SCHEMA_PROJECT);

if(!empty($_POST["sid"]) AND is_numeric($_POST["sid"])) {
	$query ="SELECT * FROM rooms WHERE sid = ?";
	$results = $db_handle->prepareAndRunQuery($query,DB_SCHEMA_PROJECT,"SELECT",'i',$_POST["sid"]);
?>
<?php
	foreach($results as $room) {
?>
	<option value="<?php echo $room["id"]; ?>"><?php echo $room["name"]; ?></option>
<?php
	}
}
?>