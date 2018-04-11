/* 	This function returns a JSON that contains room list , filtered by site id.

Parameters:
	siteId - site id filter. leave empty for all rooms in the selected project.
*/
function getrooms(siteId) {
	return $.ajax({
		type:"POST",
		url: "config/get_room.php",
		data:'sid='+siteId,
		dataType: 'json',
	});
}

/* 	This function imports room list to  a select element, filtered by site id.

Parameters:
	elementId - select element id to import items.
	siteId - site id filter.
*/
function getRoomsToSelect(elementId, siteId) {
	getrooms(siteId).success(function(data){
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