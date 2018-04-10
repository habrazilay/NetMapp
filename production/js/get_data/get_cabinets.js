/* 	This function returns a JSON that contains cabinet list , filtered by room id.

Parameters:
	roomId - room id filter. leave empty for all cabinets in the selected project.
*/
function getcabinets(roomId) {
	return $.ajax({
		type:"POST",
		url: "config/get_cabinet.php",
		data:'rid='+roomId,
		dataType: 'json',
	});
}

/* 	This function imports cabinet list to  a select element, filtered by room id.

Parameters:
	elementId - select element id to import items.
	roomId - room id filter. leave empty for all cabinets in the selected project.
*/
function getCabinetsToSelect(elementId, roomId) {
	getcabinets(roomId).success(function(data){
		$("#"+elementId).empty();
		$.each(data, function(key, value) {   
			 $("#"+elementId)
				  .append($("<option></option>")
						  .val(value["id"])
						  .text(value["name"])
						  ); 
			});
		$("#"+elementId).trigger('change');
	});
}