<?php
require_once("config/dbcontroller.php");
$db_handle = new DBController();
$query ="SELECT * FROM sites";
$results = $db_handle->runQuery($query);
?>
<html>
<head>
<TITLE>jQuery Dependent DropDown List - Countries and rooms</TITLE>
<head>
<style>
body{width:610px;}
.frmDronpDown {border: 1px solid #F0F0F0;background-color:#C8EEFD;margin: 2px 0px;padding:40px;}
.demoInputBox {padding: 10px;border: #F0F0F0 1px solid;border-radius: 4px;background-color: #FFF;width: 50%;}
.row{padding-bottom:15px;}
</style>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function getroom(val) {
	$.ajax({
	type: "POST",
	url: "get_room.php",
	data:'sid='+val,
	success: function(data){
		$("#room_name").html(data);
	}
	});
}
</script>
</head>
<body>
<div class="frmDronpDown">
<div class="row">
<label>site:</label><br/>
                          <select name="site" id="site-list" class="demoInputBox" onChange="getroom(this.value);">
<option value="">Select site</option>
<?php
foreach($results as $site) {
?>
<option value="<?php echo $site["id"]; ?>"><?php echo $site["name"]; ?></option>
<?php
}
?>
</select>
</div>
<label>room:</label><br/>
<select name="room_name" id="room_name" class="demoInputBox">
</select>
</div>
</div>
</body>
</html>