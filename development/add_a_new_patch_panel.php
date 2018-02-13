<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/loginVerify.php"); ?>

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
				<h3>Add a new patch panel</h3>
			</div>
		</div>

		<div class="clearfix"></div>

		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">

					<form id="add-device" class="form-horizontal form-label-left" method="post"
						action="data/insert_patch_panel.php">
						<span class="section">Patch Panel Side A</span>

												<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="room_site">Select a site <span class="required">*</span>
							</label>
								<div class="col-md-3 col-sm-3 col-xs-6">
								<select required name="site_list_A" id="site_list_A" class="form-control"
									onChange="getroom($('#room_name_A'),this.value);selectValue($('#site_list_B'),this.value);">
									<option disabled selected>Please Select...</option>									
                            </select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="room_name_A">Select the room <span class="required">*</span>
							</label>

							<div class="col-md-3 col-sm-3 col-xs-6">
	                          <select required name="room_name_A" id="room_name_A" class="form-control"
									onChange="	getcabinet($('#cab_name_A'),this.value);selectValue($('#room_name_B'),this.value);">
							  </select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="cab_name_A">Select the cabinet <span class="required">*</span>
							</label>
							<div class="col-md-3 col-sm-3 col-xs-6">
								<select required name="cab_name_A" id="cab_name_A" class="form-control"
										onChange="setPPName($('#cab_name_A option:selected').text(), $('#cab_name_B option:selected').text());">
								</select>
							</div>
						</div>
						<div class="form-group">
							 <label for="pp_uloc_A" class="control-label col-md-3 col-sm-3 col-xs-3">PP installed at U</label>
							 <div class="col-md-1 col-sm-1 col-xs-1">
								<input name="pp_uloc_A" id="pp_uloc_A" class="date-picker form-control" type="number" style="width: 100px;" value="1">
							 </div>
					 	</div>
						<div class="form-group">
							 <label for="pp_uheight_A" class="control-label col-md-3 col-sm-3 col-xs-6">PP Height</label>
							 <div class="col-md-1 col-sm-1 col-xs-1">
								<input required="required" name="pp_uheight_A" id="pp_uheight_A" class="date-picker form-control" type="number" style="width: 100px;" value="1">
							 </div>
							 <label for="pp_ulength_A" class="control-label col-md-1 col-sm-1 col-xs-1">U Width Ratio</label>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input required="required" name="pp_ulength_A" id="pp_ulength_A" class="date-picker form-control"	type="number" step=0.1 min=0 max=1 style="width: 100px;" value="1">
							 </div>	 
						</div>
						<span class="section">Patch Panel Side B</span>
						
												<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="room_site">Select a site <span class="required">*</span>
							</label>
							<div class="col-md-3 col-sm-3 col-xs-6">
								<select required name="site_list_B" id="site_list_B" class="form-control"
									onChange="getroom($('#room_name_B'),this.value);">
									<option disabled selected>Please Select...</option>
                            </select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="room_name_B">Select the room <span class="required">*</span>
							</label>

							<div class="col-md-3 col-sm-3 col-xs-6">
	                          <select required name="room_name_B" id="room_name_B" class="form-control"
									onChange="getcabinet($('#cab_name_B'),this.value);">
							  </select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="cab_name_B">Select the cabinet <span class="required">*</span>
							</label>
							<div class="col-md-3 col-sm-3 col-xs-6">
								<select required name="cab_name_B" id="cab_name_B" class="form-control"
										onChange="setPPName($('#cab_name_A option:selected').text(), $('#cab_name_B option:selected').text());" >
								</select>
							</div>
						</div>
						<div class="form-group">
							 <label for="pp_uloc_B" class="control-label col-md-3 col-sm-3 col-xs-3">PP installed at U</label>
							 <div class="col-md-1 col-sm-1 col-xs-1">
								<input name="pp_uloc_B" id="pp_uloc_B" class="date-picker form-control" type="number" style="width: 100px;" value="1">
							 </div>
					 	</div>
						<div class="form-group">
							 <label for="pp_uheight_B" class="control-label col-md-3 col-sm-3 col-xs-6">PP Height</label>
							 <div class="col-md-1 col-sm-1 col-xs-1">
								<input required="required" name="pp_uheight_B" id="pp_uheight_B" class="date-picker form-control" type="number" style="width: 100px;" value="1">
							 </div>
							 <label for="pp_ulength_B" class="control-label col-md-1 col-sm-1 col-xs-1">U Width Ratio</label>
							<div class="col-md-1 col-sm-1 col-xs-1">
								<input required="required" name="pp_ulength_B" id="pp_ulength_B" class="date-picker form-control"	type="number" step=0.1 min=0 max=1 style="width: 100px;" value="1">
							 </div>	 
						</div>
							<span class="section">Patch Panel Details</span>
						
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12"
								for="port_type">Port type <span class="required">*</span>
							</label>
							<div class="col-md-3 col-sm-3 col-xs-6">
								<select required name="port_type" id="port_type" class="form-control" >
									<?php
										$db_handle = new DBController ( DB_SCHEMA_BASE );
										$query = "SELECT * FROM plugtypes";
										$results = $db_handle->runQuery ( $query, DB_SCHEMA_BASE );
											
										foreach ( $results as $site ) {
										?>
										<option value="<?php echo $site["id"]; ?>" type="<?php echo $site["type"]?>"><?php echo $site["connector"]; ?></option>
										<?php
										}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							 <label for="pp_ports_amount" class="control-label col-md-3 col-sm-3 col-xs-3">Amount of ports</label>
							 <div class="col-md-1 col-sm-1 col-xs-1">
							 	<input required="required" name="pp_ports_amount" id="pp_ports_amount" class="date-picker form-control" type="number" style="width: 100px;" value="1" min=1>
							 </div>
						</div>	
						<div class="form-group">
							<label for="pp_name"
								class="control-label col-md-3 col-sm-3 col-xs-12">Name </label>
							<div class="col-md-3 col-sm-3 col-xs-6">
								<input type="text" name="pp_name" id="pp_name"
									class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label for="pp_pattern"
								class="control-label col-md-3 col-sm-3 col-xs-12">Pattern </label>
							<div class="col-md-3 col-sm-3 col-xs-6">
								<input type="text" name="pp_pattern" value="/P**"
									class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							<label for="pp_pattern_first"
								class="control-label col-md-3 col-sm-3 col-xs-12">First pattern</label>
							<div class="col-md-3 col-sm-3 col-xs-6">
								<input type="text" name="pp_pattern_first" value="01" id="pp_pattern_first"
									class="form-control col-md-7 col-xs-12">
							</div>
						</div>
						<div class="form-group">
							 <label for="pp_skip" class="control-label col-md-3 col-sm-3 col-xs-3">Pattern Hop</label>
							 <div class="col-md-1 col-sm-1 col-xs-1">
							 	<input required="required" name="pp_skip" id="pp_skip" class="date-picker form-control" type="number" style="width: 100px;" value="1" min=1>
							 </div>
						</div>	
						<div class="x_title"></div>
						<button type="submit" class="btn btn-primary"
							name="add_new_patch_panel" style="float: right">Submit</button>
						<button type="button" class="btn btn-danger" name="cancel"
							style="float: right">Cancel</button>
				
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
<!-- /page content -->
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script>

	window.onload = function (){
		getsites("").success(function(data){
			$.each(data, function(key, value) {   
				 $("#site_list_A")
					  .append($("<option></option>")
							  .val(value["id"])
							  .text(value["name"])
							  ); 
				$("#site_list_B")
				  .append($("<option></option>")
						  .val(value["id"])
						  .text(value["name"])
						  ); 
				});
		});
	}

	function getroom(roomElement,val) {
		$.ajax({
			type: "POST",
			url: "config/get_room.php",
			data:'sid='+val,
			success: function(data){
				//$("#room_name").html(data);
				//$("#room_name").trigger('change');
				roomElement.html(data);
				roomElement.trigger('change');
			}
		});
	}
	
	function getcabinet(cabElement,val) {
		$.ajax({
		type: "POST",
		url: "config/get_cabinet.php",
		data:'rid='+val,
		success: function(data){
			//$("#cab_name").html(data);
			cabElement.html(data);
			cabElement.trigger('change');
		}
		});
	}
	
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

	function getsites(filter) {
		return $.ajax({
			type:"POST",
			url: "config/get_site_list.php",
			data:'filter='+filter,
			dataType: 'json',
		});
	}

	function selectValue(selectObj,val) {
		if (selectObj.find('option[value="'+val +'"]').length > 0){
			selectObj.val(val);
			selectObj.trigger('change');
		} 
	}

	function setPPName(cabA,cabB)
	{
		roomA = $('#room_name_A');
		roomB = $('#room_name_B');
		if ( roomA.val() != roomB.val() )
		{
			roomNameA = $('#room_name_A option:selected').text();
			roomNameB = $('#room_name_B option:selected').text();
			$('#pp_name').val(roomNameA + "(" + cabA + ")-" + roomNameB + "("+ cabB + ")");
		} 
		else
			$('#pp_name').val(cabA + "-" + cabB);
		
	}
	function getBasePlugType(selectElement,val) {
		$.ajax({
		type: "POST",
		url: "config/get_base_plug_type.php",
		data:'id='+val,
		dataType: 'json',
		success: 
			function(data){
				selectElement.html("");
				$.each(data, function(key, value) {   
					selectElement
					  .append($("<option></option>")
							  .val(value["id"])
							  .text(value["connector"])
							  .attr("type", value["type"])
							  ); 
				});
			  }
		 });
	}
	
	function setDeviceDetails() {
		var option = $("#dev_type option:selected");
		$("#dev_uheight").val(option.attr("uheight"));
		$("#dev_ulength").val(option.attr("ulength"));
		$("#dev_power_feed_type").val(option.attr("builtInPowerFeedType"));
		$("#dev_power_feed_amount").val(option.attr("builtinpowerfeedamount"));
	}
	
	var frm = $('#add-device');
	
	frm.submit(function(e) {
		$.ajax({
			   type: frm.attr('method'),
			   url: frm.attr('action'),
			   data: frm.serialize() + '&add_new_patch_panel=TRUE', // serializes the form's elements.
			   dataType: 'json',
			   success: function(data) {
				   if(data.status == "Success"){
						new PNotify({
							title: 'Success',
							text: data["msg"],
							type: 'success',
							styling: 'bootstrap3'
						});   
				   } 
				   else if (data.status == "Failed") {
					   $.each(data, function(key, value) {   
							if(key != "status") {							
								new PNotify({
								title: 'Error',
								text: value,
								type: 'error',
								styling: 'bootstrap3'
								}); 	
							}
						});
			 	   }
				   else{
					   alert(data); // show response from the php script.
				   }
				},
				error: function(jqXHR, exception){
					new PNotify({
						title: 'error',
						text: "Status: " + jqXHR.status + " Error: " + exception,
						type: 'error',
						styling: 'bootstrap3'
						}); 
                }
			 });

		e.preventDefault(); // avoid to execute the actual submit of the form.
	});
	</script>
<script src="../vendors/pnotify/dist/pnotify.js"></script>
<script src="../vendors/pnotify/dist/pnotify.buttons.js"></script>
<script src="../vendors/pnotify/dist/pnotify.nonblock.js"></script>
<?php include($_SERVER['DOCUMENT_ROOT']."/NetMapp/production/footer.html"); ?>