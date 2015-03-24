$('#submit').click(function(){ 
	var cname = $('#cat_name').val();
	var img_upload_path = $('#category_img_path').val();

    if(img_upload_path == 'null')
    {
        alert("wait till image is uploaded");
    }
});