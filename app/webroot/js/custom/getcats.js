$(document).ready(function() {
	var url = config.globalpath+"/getCats";
	$.get(url , function(page)
	{    
		console.log(page);
    var data = $.parseJSON(page);

    // add checkboxes to the div
    for (var item in data){
        $("#queue_options").append("<input type=\"checkbox\" value=\"" + item + "\" />" + item + "<br />");
    }
	});
});