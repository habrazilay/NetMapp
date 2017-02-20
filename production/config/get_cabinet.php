<?php
require_once("dbcontroller.php");
require_once("set_mysql_server.php");
$db_handle = new DBController(DB_SCHEMA_PROJECT);
if(!empty($_POST["id"])) {
    $query ="SELECT * FROM cabinets WHERE cabid = '" . $_POST["id"] . "'";
    $results = $db_handle->runQuery($query, DB_SCHEMA_PROJECT);
?>
<?php
    foreach($results as $cabinet) {
?>
    <option value="<?php echo $cabinet["id"]; ?>"><?php echo $cabinet["name"]; ?></option>
<?php
    }
}
?>