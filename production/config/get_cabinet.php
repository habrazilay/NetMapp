<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["cabid"])) {
    $query ="SELECT * FROM cabinets WHERE rid = '" . $_POST["sid"] . "'";
    $results = $db_handle->runQuery($query);
?>
<?php
    foreach($results as $cabinet) {
?>
    <option value="<?php echo $cabinet["cabid"]; ?>"><?php echo $cabinet["name"]; ?></option>
<?php
    }
}
?>