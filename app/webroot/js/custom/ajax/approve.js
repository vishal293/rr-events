$("#notification").hide();
$("#plan").ready(function(){
    var planval = $("#plan").val();
    var notif = $("#notif").val();
    if(planval == 'Diamond' && notif=='y'){
        $("#notification").show();          
    }
    else{
        $("#notification").hide();
        
    }
});

$('#approve').click(function(){
    var ret = confirm('Do You Really Want To Approve');
    if(ret == true){
        approve();
    }
});

$('#unapprove').click(function(){
    var ret = confirm('Do You Really Want To Unapprove');
    console.log(ret);
    if(ret == true){
        approve();
    }
});

function approve(){
    var url = config.globalpath+'/approve';
    var formData = new FormData($('#eventform')[0]);
    //var formData = new FormData('eventform');
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
            $('#process').fadeIn("fast");
        },
        success:function(resp){
            console.log(resp);
            var ret = jQuery.parseJSON(resp);
            if(ret != "_err"){
                console.log(ret);
                location.href = config.globalpath+'/'+ret;
            }
            else{

            }
            
        },
        error:function(resp){

        }
    });
}