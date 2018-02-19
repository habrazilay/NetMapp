<?php
require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/development/config/dbcontroller.php");
require_once($_SERVER['DOCUMENT_ROOT']."/NetMapp/development/config/set_mysql_server.php");
$db_handle = new DBController(DB_SCHEMA_PROJECT);

if(!empty($_POST["sid"]) AND is_numeric($_POST["sid"])) {
	$query ="SELECT * FROM rooms WHERE sid = ?";
	$results = $db_handle->prepareAndRunQuery($query,DB_SCHEMA_PROJECT,'i',$_POST["sid"]);
?>
<?php
	foreach($results as $room) {
?>
	<option value="<?php echo $room["id"]; ?>"><?php echo $room["name"]; echo $room["id"]; ?></option>
<?php
	}
}
?>