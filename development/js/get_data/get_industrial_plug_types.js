// 	get industrial plug types from db
// 	parameters:
// 		isExtended - False(default) get only basic plug types, True get full list.
function getIndustrialPlugTypes($dropboxElement, $value) {
	if ($value != "extend" && $value != "less")
		return;
	isExtended = ($value == "extend");
	$.ajax({
	type: "POST",
	url: "config/get_industrial_plug_types.php",
	data:'extended='+isExtended,
	dataType: 'json',
	success: function(data){
				//delete dropbox content
				$($dropboxElement).msDropdown().data("dd").destroy();
				$dropboxElement.html("");
				
				//add unselected option
				$dropboxElement.append($("<option data-description='Choose a power feed socket' disabled selected>Power feed socket...</option>"));
				
				//add each option from json
				$.each(data, function(key, value) {   
				 $dropboxElement
					  .append($("<option></option>")
							  .val(value["id"])
							  .text(value["type"] + " <B>" + value["current"] + "</B> (" + value["phases"] + ", " + value["voltRange"] + ")")
							  .attr("type", value["type"])
							  .attr("Phases", value["phases"])
							  .attr("Current", value["current"])
							  .attr("voltRange", value["voltRange"])
							  .attr("data-image", value["picLoc"])
							  .attr("data-description", "Phases: " + value["phases"] + ", Supply: " + value["current"] + ", Volt Range: " + value["voltRange"])
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

//  This funciton Extends/Shrinks the drop box element, in case the user selected to do so.
//	Note:	trigged upon onChange of powerfeed select element.
//	parameters:
//		dropBoxElement - The changed dropbox element.
function editedFeed($dropBoxElement)
{
	value = $dropBoxElement.value
	if (value == "extend" || value == "less") {
		getIndustrialPlugTypes($($dropBoxElement), value);
	}
}
