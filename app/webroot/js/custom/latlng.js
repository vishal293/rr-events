$('#add').change(function() {
	var addval = $('#add').val();
	var postData = {'value' : addval};
        var baseUrl= 'getadd';
        var result = requestPostAjax(baseUrl,postData, 'json');
        console.log(result);
        if(!result){
        	$('#lat').val('0');
        	$('#lng').val('0');
        }
        $('#lat').val(result.lat);
        $('#lng').val(result.lng);
}); 