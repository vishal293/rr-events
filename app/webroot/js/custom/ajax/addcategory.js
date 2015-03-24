$('#add').click(function(){
        $('#myModal').modal({
            backdrop:true
        });
});

$('#cat_name').change(function(){
	$('#cat_name').closest('.form-group').removeClass('has-error');
	$('#error').hide();
});

$('#cat_name').focusout(function(){
	check_cat();
});

function check_cat(){
	var cat = $('#cat_name').val().toUpperCase();
	var sentStatus = true;
	if(cat!=""){
		var data =  jsVars.myvariable;
		$.each(data, function(key, element) {
        	if (cat === element.category_name.toUpperCase()){
              $('#cat_name').closest('.form-group').addClass('has-error');
 			  $('#error').show();
 			  sentStatus = false;
			}
		});	
	}
	return sentStatus;
}

$('#add_cat').click(function(){
	var pic = $('#category_img').val();
    var img_upload_path = $('#category_img_path').val();
    var cat_name = $('#cat_name').val();
    if(!cat_name){
        alert("Please Enter Category Name");
        return false;
    }
    if(!pic){
        alert("Please Upload Category Image");
        return false;
    }

    if(pic&&img_upload_path == '')
    {
        alert("wait till image is uploaded");
        return false;
    }

	if(pic && check_cat()){
        var url = config.category+'/ajax_add';
        var formData = new FormData($('#categoryform')[0]);
        var loading = '<img src="'+baseUrl+'img/ajax-white.gif">';
        $.ajax({
            url:url,
            crossDomain: true,
            type: 'POST',
            async: true,
            data: formData,
            mimeType: "multipart/form-data",
            contentType: false,
            processData:false,
            beforeSend:function(){
                /*$('#process').fadeIn("fast");
                $('#loading').html(loading);*/
            },
            success:function(resp){
                var ret = jQuery.parseJSON(resp);
                if(ret != '_err'){
                    location.href = config.category+'/index';
                }
                else if(ret == '_err'){
                    $('#loading').html("<div class='alert alert-danger' role='alert'>Cannot Create Event Please Try Again</div>");
                    $('#process').fadeOut('slow');                        
                }
            },
            error:function(resp){

            }
        });
        

	}	
});