<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["sid"])) {
	$query ="SELECT * FROM rooms WHERE sid = '" . $_POST["sid"] . "'";
	$results = $db_handle->runQuery($query);
?>
<?php
	foreach($results as $room) {
?>
	<option value="<?php echo $room["id"]; ?>"><?php echo $room["name"]; ?></option>
<?php
	}
}
?>