function getsites(filter) {
		return $.ajax({
			type:"POST",
			url: "config/get_site_list.php",
			data:'filter='+filter,
			dataType: 'json',
		});
}