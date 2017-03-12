<!--<?php include("./loginVerify.php"); ?>-->

<!-- post to db -->
<?php

// include the configs / constants for the database connection and schema
require_once ("config/set_mysql_server.php");
require_once ("config/dbcontroller.php");
$db_handle = new DBController ( DB_SCHEMA_PROJECT );

if (isset ( $_POST ['add_new_device'] )) {
	// Create connection
	$conn = new mysqli ( DB_HOST, DB_USER, DB_PASS, DB_SCHEMA_MAP );
	// Check connection
	if ($conn->connect_error) {
		die ( "Connection failed: " . $conn->connect_error );
	}
	$cabid = $_POST ['cab_name'];
	$masterid = $_POST ['dev_master_id'];
	$uLoc = $_POST ['dev_uloc'];
	$uHeight = $_POST ['dev_uheight'];
	$uLength = $_POST ['dev_ulength'];
	$name = $_POST ['dev_client_name'];
	$typeid = $_POST ['dev_type'];
	$powerFeedType = $_POST['dev_power_feed_type'];
	$powerFeedAmount = $_POST['dev_power_feed_amount'];
	$activePorts = $_POST['dev_ports'];
	$installationType = $_POST['dev_installation_type'];
	//$phase = $_POST['dev_phase'];
	//$arrivalDate = $_POST['dev_arrival_date'];
	$faceFront = $_POST['dev_facing_front'];
	$description = $_POST ['dev_description'];
	$userid = $_SESSION ['user_id'];
	
	$errors = array();
	
	if(!isset($cabid) || !is_numeric($cabid))
		$errors[] = "Cabinet selection is required.";
	if(!isset($masterid))
		$errors[] = "Master ID selection is required.";
	if(isset($uLoc) && !is_numeric($uLoc))
		$errors[] = "Installed U is not a number.";
	if(isset($uHeight) && !is_numeric($uHeight))
		$errors[] = "Device Height is not a number.";
	if(isset($uLength) && 	(!( is_numeric($uLength) || is_float($uLength) ) 
							|| $uLength>1.0 
							|| $uLength<0.1 ) )
		$errors[] = "Device Width ratio is not a valid number between 0.1 to 1.";
	if(!isset($typeid) || !is_numeric($typeid))
		$errors[] = "Device model selection is required.";
	if(!isset($powerFeedType) || !is_numeric($powerFeedType))
		$errors[] = "Power feed type selection is required.";
	if(isset($powerFeedAmount) && !is_numeric($powerFeedAmount))
		$errors[] = "Power feeds available is not a number.";
	if(isset($activePorts) && !is_numeric($activePorts))
		$errors[] = "Active ports is not a number.";
	if(!isset($installationType) || !is_numeric($installationType))
		$errors[] = "Installation type selection is required.";
	if(isset($faceFront) && $faceFront!=0 && $faceFront!=1) 	
		$errors[] = "invalid data on is facing front.";
	
	if(!empty($errors)) {
		 echo'<pre>';
		 print_r($errors);
		 echo'</pre>';
	}
	else {
		$query = "INSERT INTO devices (cabid,masterid,uLoc,uHeight,uLength,name,typeid,powerFeedType,powerFeedAmount,activePorts,installationType,faceFront,description) Values (?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$db_handle->prepareAndRunQuery($query,DB_SCHEMA_MAP,'isiidsiiiiiis',$cabid,$masterid,$uLoc,$uHeight,$uLength,$name,$typeid,$powerFeedType,$powerFeedAmount,$activePorts,$installationType,$faceFront,$description);  
	}	
	$conn->close ();
}
?>
<!-- /post to db -->

<?php include("./header.html"); ?>
<?php include("./sidebar_menu.html"); ?>
<?php include("./menu_footer.html"); ?>
<?php include("./top_navigation.html"); ?>


<!-- /page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Add a new device</h3>
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">

					<form class="form-horizontal form-label-left" method="post"
						action="<?php $_PHP_SELF ?> ">


						<span class="section">Device details</span>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="room_site">Select a site <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select name="site_list" id="site_list" class="form-control"
									onChange="getroom(this.value);">
									<option disabled selected>Please Select...</option>
									<?php
									$query = "SELECT * FROM sites";
									$results = $db_handle->runQuery ( $query, DB_SCHEMA_PROJECT );
										
									foreach ( $results as $site ) {
									?>
									<option value="<?php echo $site["id"]; ?>"><?php echo $site["name"]; ?></option>
									<?php
									}
									?>
                            </select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="room_name">Select the room <span class="required">*</span>
							</label>

							<div class="col-md-6 col-sm-6 col-xs-12">
								<script src="https://code.jquery.com/jquery-2.1.1.min.js"
									type="text/javascript"></script>
									<script>
	                            function getroom(val) {
	                                $.ajax({
		                                type: "POST",
		                                url: "config/get_room.php",
		                                data:'sid='+val,
		                                success: function(data){
		                                    $("#room_name").html(data);
		                                    $("#room_name").trigger('change');
		                                }
	                                });
	                            }
	                          </script>
	                          <select name="room_name" id="room_name" class="form-control"
									onChange="getcabinet(this.value);">
							  </select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="cab_name">Select the cabinet <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<script src="https://code.jquery.com/jquery-2.1.1.min.js"
									type="text/javascript"></script>
								<select name="cab_name" id="cab_name" class="form-control">
								<script>
                            function getcabinet(val) {
                                $.ajax({
                                type: "POST",
                                url: "config/get_cabinet.php",
                                data:'rid='+val,
                                success: function(data){
                                    $("#cab_name").html(data);
                                }
                                });
                            }
                            </script>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="cabinet-name"
								class="control-label col-md-3 col-sm-3 col-xs-12">Device ID <span
								class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name="dev_master_id" id="dev_master_id" required="required"
									class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label for="cabinet-name"
								class="control-label col-md-3 col-sm-3 col-xs-12">Device type filter:<span
								class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name="dev_type_filter" id="dev_type_filter" required="required"
									class="form-control col-md-7 col-xs-12" onChange="getbasedevice(this.value);">
								<script>
								
		                            function getbasedevice(val) {
		                                $.ajax({
		                                type: "POST",
		                                url: "config/get_base_device.php",
		                                data:'filter='+val,
		                                dataType: 'json',
		                                success: function(data){
			                                		var dropboxElement = $("#dev_type");
			                                		dropboxElement.html("");
			                                		$.each(data, function(key, value) {   
			       								     dropboxElement
			       								          .append($("<option></option>")
					       								          .val(value["id"])
					       								          .text(value["model"])
					       								          .attr("uHeight", value["uHeight"])
					       								          .attr("uLength", value["uLength"])
					       								          .attr("builtInPowerFeedType", value["builtInPowerFeedType"])
					       								          .attr("builtInPowerFeedAmount", value["builtInPowerFeedAmount"])
					       								          ); 
			       									});
		                               			  }
                               			 });
                            		}
                            	</script>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="dev_type">Select the device type<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<script src="https://code.jquery.com/jquery-2.1.1.min.js"
									type="text/javascript"></script>
								<select name="dev_type" id="dev_type" class="form-control" onChange="setDeviceDetails();">
								</select>
								<script>
								
		                            function setDeviceDetails() {
		                            	var option = $("#dev_type option:selected");
		                            	$("#dev_uheight").val(option.attr("uheight"));
		                            	$("#dev_ulength").val(option.attr("ulength"));
		                            	$("#dev_power_feed_type").val(option.attr("builtInPowerFeedType"));
		                            	$("#dev_power_feed_amount").val(option.attr("builtinpowerfeedamount"));
                            		}
                            	</script>
							</div>
						</div>
						<div class="form-group">
							<label for="cabinet-client-name"
								class="control-label col-md-3 col-sm-3 col-xs-12">Device's
								client name </label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name="dev_client_name" required="required"
									class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="dev_type">Installed by<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select name="dev_installation_type" id="dev_installation_type" class="form-control">
									<option disabled selected>Please Select...</option>
									<option value="0">Ears</option>
									<option value="1">Rails</option>
									<option value="2">Shelf</option>
									<option value="3">Ears and shelf</option>
									<option value="4">Uninstalled (placed over another device)</option>
									<option value="5">On top of the cabinent</option>
									<option value="6">Nearby the cabinet</option> 
								</select>
							</div>
						</div>
						<div class="form-group">
							 <label for="dev-u-location" class="control-label col-md-3 col-sm-3 col-xs-3">Device installed at U</label>
							 <div class="col-md-2 col-sm-3 col-xs-3">
							 	<input name="dev_uloc" id="dev_uloc" class="date-picker form-control col-md-3" type="number" style="width: 100px;" value="1">
							 </div>
							 <label for="dev-u-height" class="control-label col-md-2 col-sm-3 col-xs-3">Device Height</label>
							 <div class="col-md-2 col-sm-3 col-xs-3">
							 	<input name="dev_uheight" id="dev_uheight" class="date-picker form-control col-md-3" type="number" style="width: 100px;" value="1">
							 </div>
						</div>
						<div class="form-group">
							<label for="dev-u-length" class="control-label col-md-3 col-sm-3 col-xs-3">Device U Width Ratio</label>
							<div class="col-md-2 col-sm-3 col-xs-3">
								<input name="dev_ulength" id="dev_ulength" class="date-picker form-control"	type="number" step=0.1 min=0 max=1 style="width: 100px;" value="1">
							</div>	
							<label for="dev-facing-front" class="control-label col-md-2 col-sm-3 col-xs-3">Facing front?</label>
							<div class="col-md-2 col-sm-3 col-xs-3">
								<label class="radio-inline"><input type="radio" name="dev_facing_front" value="1" checked="checked">Yes</label>
								<label class="radio-inline"><input type="radio" name="dev_facing_front" value="0">No</label>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-3"
								for="room_name">Power Feed Type</label>
							<div class="col-md-2 col-sm-2 col-xs-12">
							  <select name="dev_power_feed_type" id="dev_power_feed_type" class="form-control">
								  <?php
								  	$db_handle = new DBController ( DB_SCHEMA_BASE );
								  	$query = "SELECT * FROM powersocketandplugtypes";
								  	$results = $db_handle->runQuery ( $query, DB_SCHEMA_BASE );
								  	foreach ( $results as $plugType ) {
									?>
										<option value="<?php echo $plugType["id"]; ?>" maxCurrent="<?php echo $plugType["maxCurrent"]; ?>"><?php echo $plugType["type"]; ?></option>
									<?php
									}
									?>
								  	
							  </select>
							</div>
							<label class="control-label col-md-2 col-sm-3 col-xs-12">Feeds available</span>
							</label>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<input name="dev_power_feed_amount" id="dev_power_feed_amount"
									class="date-picker form-control col-md-7 col-xs-12"
									type="number" style="width: 100px;" min="1" value="2">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Active ports</label> 
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input name="dev_ports"
										class="date-picker form-control col-md-7 col-xs-12"
										type="number" style="width: 100px;" min="1" value="24">
							</div>
						</div>
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="description">Device description </label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<textarea name="dev_description" required="required"
									name="room-description" class="form-control col-md-7 col-xs-12"></textarea>
							</div>
						</div>
						<div class="x_title"></div>
						<button type="submit" class="btn btn-primary"
							name="add_new_device" style="float: right">Submit</button>
						<button type="button" class="btn btn-danger" name="cancel"
							style="float: right">Cancel</button>
				
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- /page content -->

<?php include("./footer.html"); ?>
