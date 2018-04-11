/* 	This function returns a JSON that contains site list , filtered by site name.

Parameters:
	filter - site name filter. leave empty for all sites in the selected project.
*/
function getsites(filter) {
		return $.ajax({
			type:"POST",
			url: "config/get_site_list.php",
			data:'filter='+filter,
			dataType: 'json',
		});
}

/* 	This function imports site list to  a select element, filtered by site name.

Parameters:
	elementId - select element id to import items.
	filter - site name filter. leave empty for all sites.
*/
function getSitesToSelect(elementId, filter) {
	getsites(filter).success(function(data){
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