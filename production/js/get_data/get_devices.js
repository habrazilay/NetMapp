/* 	This function returns a JSON that contains the device list , filtered by cabinet id.

Parameters:
	cabId - cabinet id filter. leave empty for all devices in the selected project.
*/
function getdevices(cabinetId) {
	return $.ajax({
		type:"POST",
		url: "config/get_device.php",
		data:'cabid='+cabinetId,
		dataType: 'json',
	});
}

/* 	This function imports the devices list to  a select element, filtered by cabinet id.

Parameters:
	elementId - select element id to import items.
	cabId - cabinet id filter. leave empty for all devices in the selected project.
*/
function getDevicesToSelect(elementId, cabId) {
	getdevices(cabId).success(function(data){
		$("#"+elementId).empty();
		if (!data || data.length === 0)
			$("#"+elementId).append("<option disabled selected>No devices found</option>");
		else
			$("#"+elementId).append("<option disabled selected>Please Select...</option>");
		$.each(data, function(key, value) {   
			 $("#"+elementId)
				  .append($("<option></option>")
						  .val(value["id"])
						  .text(value["masterid"])
						  ); 
			});
		$("#"+elementId).trigger('change');
	});
}