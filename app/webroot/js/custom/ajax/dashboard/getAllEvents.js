var url = config.path+"/dashboards/getAllEvents";
$.get(url,function(resp){
	var data = $.parseJSON(resp);
	var gapproved = 0;
	var gunapproved = 0;
	var gactive = 0;
	var ginactive = 0;
	var dapproved = 0;
	var dunapproved = 0;
	var dactive = 0;
	var dinactive = 0;
	$.each(data, function(key, element) {
		if(element.plan=='Gold'){
			if(element.approved==1){
			end_date = Date.parse(element.end_date.substring(0, 10));
			if(end_date>$.now()){
				gactive++;
			}
			if(end_date<$.now()){
				ginactive++;
			}	
			gapproved++;
		}
			if(element.approved==0){
				gunapproved++;
			}		
		}
		if(element.plan=='Diamond'){
			if(element.approved==1){
			end_date = Date.parse(element.end_date.substring(0, 10));
			if(end_date>$.now()){
				dactive++;
			}
			if(end_date<$.now()){
				dinactive++;
			}	
			dapproved++;
		}
			if(element.approved==0){
				dunapproved++;
			}		
		}
		
	});
	var table = '<table class="table table-striped table-bordered table-hover">'
		+'<thead>'
			+'<tr><th>#</th><th>Gold</th><th>Diamond</th></tr>'
		+'</thead>'
		+'<tbody>'
			+'<tr><td>No of Active Events</td><td>'+gactive+'</td><td>'+dactive+'</td>'
			+'</tr>'
			+'<tr><td>No of Inactive Events</td><td>'+ginactive+'</td><td>'+dinactive+'</td></tr>'
			+'<tr><td>No of Approved Events</td><td>'+gapproved+'</td><td>'+dapproved+'</td></tr>'
			+'<tr><td>No of Unapproved Events</td><td>'+gunapproved+'</td><td>'+dunapproved+'</td></tr>'
		+'</tbody>'
	+'</table>';
	$('#eventsloader').hide();    
	$('#events').append(table);
});



