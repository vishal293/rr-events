  
$(':file').change(function(ev) {
    console.log('on file upload');
    var ipname = $(this)[0]['id'];
    if( $('#'+ipname).val()){
      ajax_pic_upload(ipname);                  
    }    
});


$(document).on('change',':file',function(){
     var ipname = $(this)[0]['id'];
    if( $('#'+ipname).val()){
      ajax_pic_upload(ipname);                  
    }  
});

$("a[id$='_remove'").click(function(){
    var ipname = $(this).attr('id');
    ipname = ipname.replace('_remove','');
                    $('#'+ipname+'_display').attr('src','');
                    $('#'+ipname+'').val('');
                    $('#'+ipname+'_path').val('');
                    $('#'+ipname+'_output').val('');
                    $('#'+ipname+'_link').attr('style','display:none');
                    $('#'+ipname+'_remove').attr('style','display:none');
                }); 


function ajax_pic_upload(ipname) {
	
    mainURL = document.URL;
    var url = mainURL.split("/");
    var module = url[3];
    console.log(module);
    if(module == "categories")
    {
        var url = config.category+'/ajax_upload_image';
        var formData = new FormData($('#categoryform')[0]);
        formData.append('inputfield',ipname);
        console.log(formData);
    }
    else if(module == "events")
    {
      var url = config.globalpath+'/ajax_upload_image';
      console.log(url);
      var formData = new FormData($('#eventform')[0]);
        formData.append('inputfield',ipname);
    }
	$.ajax({
        url: url,
        type: 'POST',
        async: true,
        data: formData,
        mimeType: "multipart/form-data",
        contentType: false,
		processData: false,
		beforeSend: function(){
            $('#'+ipname+'_link').attr("style","display:block");
			$('#'+ipname+'_output').hide();
            $('#'+ipname+'_display').attr("src",baseUrl+"img/ajax-loader.gif");    

            $('#'+ipname+'_loader').show();

            console.log('end up here');
            beforeSubmit(ipname);
		},			
        success: function(resp){
            // console.log(resp);
            var ret = jQuery.parseJSON(resp);
            
            if(ret._error == "error"){
                $('#'+ipname+'_loader').hide();
                $('#'+ipname+'_output').show();
                $('#'+ipname+'_output').html("<p class='text-danger'>Cannot Upload image.</p>");
             }
            else{   
                console.log(ret);
                $('#'+ipname+'_link').attr("style","display:block");
                $('#'+ipname+'_path').val(ret._path);
                $('#'+ipname+'_link').attr("href",ret._path);   
                $('#'+ipname+'_display').attr("src",ret._path);  
                 // $('#'+ipname+'_loader').html("<img src='"+baseUrl+"img/tick.png' alt='sucess'>");        
                $('#'+ipname+'_opt').attr({src :resp._path,
                                        style: 'height:150px; width:220px;'
                                        });    
                $('#'+ipname+'_remove').attr("style","display:block");  
                                         
            }
		},
        error: function(resp) {
        }
	});    	
}

function beforeSubmit(ipname){
    var maxsize = 2097152;
    var fsize = $('#'+ipname)[0].files[0].size; //get file size
    var ftype = $('#'+ipname)[0].files[0].type; // get file type
    if(ftype =='image/png'||ftype =='image/gif'||ftype =='image/jpeg'||ftype=='image/pjpeg'){
        if(fsize<=maxsize){
            return true;                        
        }
        else{
            $('#'+ipname+'_loader').hide();
            $('#'+ipname+'_output').show();                        
            $('#'+ipname+'_output').html("<p class='text-danger'>Image should be less than "+bytesToSize(maxsize)+"</p>");
              $('#'+ipname+'_link').attr("style","display:none");
                       
            return false;
        }
    }
    else{
        $('#'+ipname+'_loader').hide();
        $('#'+ipname+'_output').show();
        $('#'+ipname+'_output').html("<p class='text-danger'>Unsupported file type!</p>");
                      $('#'+ipname+'_link').attr("style","display:none");

        return false;
    }           
}

function bytesToSize(bytes) {
    var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
    if (bytes == 0) return '0 Bytes';
    var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
    return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
}