var url = config.path+"/dashboards/getAllAppUsers";
$.get(url,function(resp){
	var data = $.parseJSON(resp);
	var student = 0;
	var pro = 0;
	var busi = 0;
	var hw = 0;
	var oth = 0;
	$.each(data, function(key, element) {
		var occ = element.Occupation;
		if($.isArray(occ)){
			$.each(occ, function(key, element) {
				if(element== "Student"){
			       	student++;
		  	    }
			    if(element == "Professional"){
			       	pro++;
			    }
			    if(element == "Business/Employed"){
			       	busi++;
			    }
			    if(element == "Housewife"){
			       	hw++;
			    }
			    if(element == "Others"){
			       	oth++;
			    }		
	       });
		}
		else{
			if(element.Occupation == "Student"){
       			student++;
       		}
	       	if(element.Occupation == "Professional"){
	       		pro++;
	       	}
	       	if(element.Occupation == "Business/Employed"){
	       		busi++;
	       	}
	       	if(element.Occupation == "Housewife"){
	       		hw++;
	       	}
	       	if(element.Occupation == "Others"){
	       		oth++;
	       	}
		}
    });
	var table = '<table class="table table-striped table-bordered table-hover" id="dataTables-example">'
		+'<thead>'
			+'<tr><th>Occupation</th><th>Users</th></tr>'
		+'</thead>'
		+'<tbody>'
			+'<tr><td>Students</td><td>'+student+'</td>'
			+'</tr>'
			+'<tr><td>Professionals</td><td>'+pro+'</td></tr>'
			+'<tr><td>Business</td><td>'+busi+'</td></tr>'
			+'<tr><td>Housewives</td><td>'+hw+'</td></tr>'
			+'<tr><td>Others</td><td>'+oth+'</td></tr>'
		+'</tbody>'
	+'</table>';
    $('#appUserloader').hide();    
	$('#appUser').append(table);
});
