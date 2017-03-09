<?php
require_once("dbcontroller.php");
require_once("set_mysql_server.php");
$db_handle = new DBController(DB_SCHEMA_PROJECT);
if(!empty($_POST["sid"]) AND is_numeric($_POST["sid"])) {
	$query ="SELECT * FROM rooms WHERE sid = '" . $_POST["sid"] . "'";
	$results = $db_handle->runQuery($query,DB_SCHEMA_PROJECT);
?>
<?php
	foreach($results as $room) {
?>
	<option value="<?php echo $room["id"]; ?>"><?php echo $room["name"]; ?></option>
<?php
	}
}
?>