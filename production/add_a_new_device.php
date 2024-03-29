<!--<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/loginVerify.php"); ?>-->

<?php require_once ($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/set_mysql_server.php");?>
<?php require_once ($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/config/dbcontroller.php");?>

<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/header.html"); ?>
<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/sidebar_menu.html"); ?>
<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/menu_footer.html"); ?>
<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/top_navigation.html"); ?>
<!-- PNotify -->
    <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">


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

					<form id="add-device" class="form-horizontal form-label-left" method="post"
						action="data/insert_mapping_device.php">


						<span class="section">Device details</span>

						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="room_site">Select a site <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select required name="site_list" id="site_list" class="form-control"
									onChange='getRoomsToSelect("room_name",this.value);'>
									<option disabled selected>Please Select...</option>
                            </select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="room_name">Select the room <span class="required">*</span>
							</label>

							<div class="col-md-6 col-sm-6 col-xs-12">
	                          <select required name="room_name" id="room_name" class="form-control"
									onChange='getCabinetsToSelect("cab_name",this.value);'>
							  </select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="cab_name">Select the cabinet <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select required name="cab_name" id="cab_name" class="form-control" >
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
								<input type="text" name="dev_type_filter" id="dev_type_filter"
									class="form-control col-md-7 col-xs-12" onkeydown="getbasedevice.filterLastVal = this.value; preventSpecialKeys();" onkeyup="getbasedevice('dev_type',this.value);" autocomplete="off"	>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="dev_type">Select the device type<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select required name="dev_type" id="dev_type" class="form-control" onChange="setDeviceDetails();">
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="cabinet-client-name"
								class="control-label col-md-3 col-sm-3 col-xs-12">Device's
								client name </label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" name="dev_client_name"
									class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="dev_type">Held by<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select required name="dev_installation_type" id="dev_installation_type" class="form-control">
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
							 <label for="dev-u-location" class="control-label col-md-3 col-sm-3 col-xs-3">Device held at U</label>
							 <div class="col-md-2 col-sm-3 col-xs-3">
							 	<input name="dev_uloc" id="dev_uloc" class="date-picker form-control col-md-3" type="number" style="width: 100px;" value="1">
							 </div>
							 <label for="dev-u-height" class="control-label col-md-2 col-sm-3 col-xs-3">Device Height</label>
							 <div class="col-md-2 col-sm-3 col-xs-3">
							 	<input required="required" name="dev_uheight" id="dev_uheight" class="date-picker form-control col-md-3" type="number" style="width: 100px;" value="1">
							 </div>
						</div>
						<div class="form-group">
							<label for="dev-u-length" class="control-label col-md-3 col-sm-3 col-xs-3">Device U Width Ratio</label>
							<div class="col-md-2 col-sm-3 col-xs-3">
								<input required="required" name="dev_ulength" id="dev_ulength" class="date-picker form-control"	type="number" step=0.1 min=0 max=1 style="width: 100px;" value="1">
							</div>	
							<label for="dev-facing-front" class="control-label col-md-2 col-sm-3 col-xs-3">Facing front?</label>
							<div class="col-md-2 col-sm-3 col-xs-3">
								<label class="radio-inline"><input type="radio" name="dev_facing_front" value="1" checked="checked">Yes</label>
								<label class="radio-inline"><input type="radio" name="dev_facing_front" value="0">No</label>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Total available ports</label> 
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input name="dev_ports"
										class="date-picker form-control col-md-7 col-xs-12"
										type="number" style="width: 100px;" min="1" value="24">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-3"
								for="room_name">Power Feed Type</label>
							<div class="col-md-3 col-sm-3 col-xs-12">
								<select name='dev_power_feed_type' id='dev_power_feed_type' class='form-control col-md-4 col-sm-4 col-xs-12' onChange='editedSocket(this);'></select>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Feeds available</label> 
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input required="required" name="dev_power_feed_amount" id="dev_power_feed_amount"
									class="date-picker form-control col-md-7 col-xs-12"
									type="number" style="width: 100px;" min="1" value="2">
							</div>
						</div>
						
						
						<div class="item form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="description">Device description </label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<textarea name="dev_description" class="form-control col-md-7 col-xs-12"></textarea>
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
<script src="./js/get_data/get_power_plug_types.js"></script>
<script src="./js/get_data/get_sites.js"></script>
<script src="./js/get_data/get_rooms.js"></script>
<script src="./js/get_data/get_cabinets.js"></script>
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script>

	function preventSpecialKeys(){
		
		var DELETE = 8;
		var BACKSPACE = 46;
		var pressedKey = event.key;
		var keyString = String.fromCharCode(pressedKey);
		
		// checks if pressed key was NOT one of DELETE BACKSPACE space AlphaNumeric _ - *
		if ( (pressedKey !== 'Delete') && (pressedKey !== 'Backspace') &&  (!/[a-zA-Z0-9-_ \*]/.test(pressedKey)) ) {
			event.preventDefault();
			return;
		}

	}

	
	/* 	This function imports devices list to a select element, filtered by device name.
	
	Parameters:
		selectElementID - select element id to import items.
		val - device name filter.
		minimumLength- minimal length for filter.
	*/
	function getbasedevice(selectElementID, val, minLength = 3) {

		// checks if the filter value has not changed or is too short.
		if( (val == getbasedevice.filterLastVal) || (val.length < minLength) )
			return;
		
		$.ajax({
			type: "POST",
			url: "config/get_base_device.php",
			data:'filter='+val,
			dataType: 'json',
			success: function(data){
				var dropboxElement = $('#'+selectElementID);
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
				dropboxElement.change();
		  	}
		  
		 });
	}	
	getbasedevice.filterLastVal = "";

	//edit fields according to selected device.
	function setDeviceDetails() {
		var option = $("#dev_type option:selected");
		$("#dev_uheight").val(option.attr("uheight"));
		$("#dev_ulength").val(option.attr("ulength"));
		var oDropdown = $("#dev_power_feed_type").msDropdown().data("dd");
		oDropdown.setIndexByValue(option.attr("builtInPowerFeedType"));
		//$("#dev_power_feed_type").val(option.attr("builtInPowerFeedType"));
		$("#dev_power_feed_amount").val(option.attr("builtinpowerfeedamount"));
	}
	
	var frm = $('#add-device');
	
	frm.submit(function(e) {
		$.ajax({
			   type: frm.attr('method'),
			   url: frm.attr('action'),
			   data: frm.serialize() + '&add_new_device=TRUE', // serializes the form's elements.
			   dataType: 'json',
			   success: function(data) {
				   if(data.status == "Success"){
					   popNotify('Success',data["msg"],'success');
				   } else if (data.status == "Failed") {
					   $.each(data, function(key, value) {   
							if(key != "status")
								popNotify ('Error',value,'error');								
						});
				   }
				   else{
					   alert(data); // show response from the php script.
				   }
				},
				error: function(jqXHR, exception){
					popNotifty('error', ("Status: " + jqXHR.status + " Error: " + exception) ,'error');
                }
			 });

		e.preventDefault(); // avoid to execute the actual submit of the form.
	});
	
	window.onload = function (){
		getSitesToSelect("site_list","");
		getPowerPlugTypes($("#dev_power_feed_type"), "less");
	}
	</script>
<script src="../vendors/pnotify/dist/pnotify.js"></script>
<script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
<script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>
<script src="../vendors/pnotify/dist/pnotify.custom.js"></script>
<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/footer.html"); ?>
