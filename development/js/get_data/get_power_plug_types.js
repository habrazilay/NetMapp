// 	get industrial plug types from db
// 	parameters:
// 		isExtended - False(default) get only basic plug types, True get full list.

function getPowerPlugTypes($dropboxElement, $value) {
		if ($value != "extend" && $value != "less")
			return;
		isExtended = ($value == "extend");
		$.ajax({
		type: "POST",
		url: "config/get_power_plug_types.php",
		data:'extended='+isExtended,
		dataType: 'json',
		success: function(data){
					//delete dropbox content
					$($dropboxElement).msDropdown().data("dd").destroy();
					$dropboxElement.html("");
					
					//add unselected option
					$dropboxElement.append($("<option data-description='Choose a power socket' disabled selected>Power socket...</option>"));
					
					//add each option from json
					$.each(data, function(key, value) {   
					 $dropboxElement
						  .append($("<option></option>")
								  .val(value["id"])
								  .text(value["type"])
								  .attr("type", value["type"])
								  .attr("maxCurrent", value["maxCurrent"])
								  .attr("data-image", value["picLoc"])
								  .attr("data-description", "Max Current: " + value["maxCurrent"] )
								  ); 
					});
					//add option to extend/show less.
					if(isExtended){
						$dropboxElement
						  .append($("<option></option>")
								  .val("less")
								  .text("Return to basic list...")
								  );
					} else {
						$dropboxElement
						  .append($("<option></option>")
								  .val("extend")
								  .text("Show full list...")
								  );
					}	
					$($dropboxElement).msDropDown();
				  }
		 });
	}

//This funciton Extends/Shrinks the drop box element, in case the user selected to do so.
//Note:	trigged upon onChange of powerfeed select element.
//parameters:
//	dropBoxElement - The changed dropbox element.
function editedSocket($dropBoxElement)
{
	value = $dropBoxElement.value
	if (value == "extend" || value == "less") {
		getPowerPlugTypes($($dropBoxElement), value);
	}
}