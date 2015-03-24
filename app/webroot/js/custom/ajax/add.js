var warnMessage = "You have unsaved changes on this page!";

$(document).ready(function() {
    $('input:not(:button,:submit),textarea,select').change(function () {
        window.onbeforeunload = function () {
            if (warnMessage != null) return warnMessage;
        }
    });
    $('#submit').click(function(e) {
        warnMessage = null;
    });
});  

$("[required='required']").click(function() {
    var ff = $(this).attr('id');
    var i = 0;
    var c = 0;
    var labels = [];
    var focuses = [];

    $("[required='required']").each(function(){
        if(ff != $(this).attr('id') && i == 0){
            var input = $(this).attr('id');
            var value = $('#'+input).val();
            var category = $("input[name='data[cat][category_id][]']:checked").val();
            if(!value){
                $('#'+input).closest('.form-group').addClass('has-error');
                var label = $('#'+input).closest('.form-group')[0]['children'][0]['innerText'];
                console.log(label);
                if(label!=""){
                    labels.push(label);
                    focuses.push(input);
                }
                
                /*if(c==0){
                    setTimeout(function(){
                    $('#'+input).focus();
                    }, 1);
                }
                c++;*/
            } else {
                //$('#'+input).closest('.form-group').addClass('has-error');
                $(this).closest(".form-group").removeClass("has-error"); 
            }
        }
        if(ff == $(this).attr('id')){
            i++;
        }
    });
    if(labels.length!==0){
        alert("Please Enter the following fields first\n"+labels.join("\n"));
        $('#'+focuses[0]).focus();

    }
}).change(function(){
    var input = $(this);
    var val = input.val();
    if(val){
        $(this).closest(".form-group").removeClass("has-error"); 
    }
});

$("#organizer_website").focus(function() {
  var input = $(this);
  var val = input.val();
  if (!val) {
        setTimeout(function() {
            input.val('http://');
        }, 0);
    }
}).blur(function(){
    var input = $(this);
    var val = input.val();
    if(val==='http://'){
        input.val('');
    }
});
var url = config.globalpath+"/getCats";
$.get(url , function(resp){    
    $('#catloader').hide();    
    var data = $.parseJSON(resp);
    $.each(data, function(key, element) {
        $("#getcategory").append('<label class="checkbox-inline col-sm-4" style="margin-left: 0px;"><input type="checkbox" name="data[cat][category_id][]" tabindex ="7" value="'+element.category_id+'" class="require-one" id="data[cat][category_id]">'+ element.category_name + '</label>');
    });
});

function add_sec(time){
    var ret = time;
    var check = time.match(/:/);
    if(!check){
        var hours = Number(time.match(/^(\d+)/)[1]);
        var AMPM = time.match(/\s(.*)$/)[1];
        ret = hours+":00 "+AMPM;
    }
    return ret;
}
function convert_time(time){
    var time = time;
    var hours = Number(time.match(/^(\d+)/)[1]);

    var minutes = Number(time.match(/:(\d+)/)[1]);
    var AMPM = time.match(/\s(.*)$/)[1];
    if(AMPM == "PM" && hours<12) hours = hours+12;
    if(AMPM == "AM" && hours==12) hours = hours-12;
    var sHours = hours.toString();
    var sMinutes = minutes.toString();
    if(hours<10) sHours = "0" + sHours;
    if(minutes<10) sMinutes = "0" + sMinutes;
    return (sHours+sMinutes);    
}

function check_time(sdate,edate,stime,etime){
    console.log('check');
    console.log(stime.indexOf(':'));
    if(stime.indexOf(':') == -1)
    {
        stime = stime.slice(0,2) + ":00 " + stime.slice(3);
        console.log(stime);
    }
    if(etime != "")
    {
        if(etime.indexOf(':') == -1)
        {
            etime = etime.slice(0,2) + ":00 "+ etime.slice(3);
            console.log(etime);
        }
    }
    var ret = true;
    if(!edate){
        edate = sdate;
    }
    var conv_stime = convert_time(stime);
    var conv_etime = convert_time(etime);
    console.log('on return');
    console.log(conv_stime +'-'+ conv_etime );

    console.log('date');
    console.log(sdate+'='+edate);
    if(sdate==edate && conv_stime>conv_etime){
    
        ret = false;
    }
    return ret;
}

$('#end_time').focus(function(){
    console.log("end time");
});
$('#venue').focus(function(){
    console.log('here');
    var sdate = $('#start_date').val();
    var stime = $('#start_time').val();
    var edate = $('#end_date').val();
    var etime = $('#end_time').val();

    if(!check_time(sdate,edate,stime,etime)){
       alert('End time Should be Greater than Start Time');

        $('#end_time').focus();
        // exit;

    }
});

$('#submit').click(function(){
    var category = $("input[name='data[cat][category_id][]']:checked").val();
    var offer = $('#offer').val();
    var plan = $('#plan').val();
    var ename = $('#event_name').val();
    var sdate = $('#start_date').val();
    var stime = $('#start_time').val();
    var amount = $('#amount').val();
    var edate = $('#end_date').val();
    var etime = $('#end_time').val();
    console.log("Start Date - "+sdate + "End Date -"+edate);
    console.log("Start Time- "+stime + "End Time" +etime);
    var venue = $('#event_address').val();
    var audience = $('#audience').val();
    var oneline_description = $('#oneline_description').val();
    var event_description = $('#event_description').val();
    var organizer_name = $('#organizer_name').val();
    var organizer_contact = $('#organizer_contact').val();
    var hphoto = $('#event_photo').val();
    var hphoto_path = $('#event_photo_path').val();
    var photo1 = $('#photo_1').val();
    var photo1_path = $('#photo_1_path').val();
    var photo2 = $('#photo_2').val();
    var photo2_path = $('#photo_2_path').val();    
    var photo3 = $('#photo_3').val();
    var photo3_path = $('#photo_3_path').val();    
    var photo4 = $('#photo_4').val();
    var photo4_path = $('#photo_4_path').val();
    var ologo = $('#organizer_logo').val();
    var ologo_path = $('#organizer_logo_path').val();
    var notif = $("input[name='data[data][notif]']:checked").val();
    var notif_date = $('#notif_date').val();
    var notif_time = $('#notif_time').val();
    var notif_msg = $('#notif_msg').val();
    if(etime){
       etime = add_sec($('#end_time').val());
    }
    if(stime){
       stime = add_sec($('#start_time').val());
    }
    if(!offer)
    {
        alert("Please select an offer");
        return false;
    }
    if(!plan)
    {
        alert("Please select a plan");
        return false;
    }
    if(!ename)
    {
        alert("Please enter the event Name");
        return false;
    }
    if(!oneline_description)
    {
        alert("Please enter the one line description");
        return false;
    }
    if(!event_description)
    {
        alert("Please enter the event description");
        return false;
    }
    if(!category){
        alert("Please Select at least One category");
        return false;
    }
    if(!sdate){
        alert("Please Select Start Date");
        return false;
    }
    if(!stime){
        alert("Please Select Start Time");
        return false;
    }
    if(!etime){
        alert("Please Select End Time");
        return false;
    }
    if(!check_time(sdate,edate,stime,etime)){
        alert('End time Should be Greater than Start Time');
        return false;
    }
    if(notif=='y'){
        if(!notif_date){
            alert('Please Enter Notification Date');
            return false;
        }
        if(!notif_time){
            alert('Please Enter Notification Time');
            return false;
        }
        if(!notif_msg){
            alert('Please Enter Message to be Sent in Notification ');
            return false;
        }
    }

  //Validation for numbers - amount
     var numbers = /^[0-9]+$/; 
     if(amount){
         if(!amount.match(numbers))
         {
            alert("Invalid characters in Amount. Kindly enter numbers only.");
            return false;
         }
     }
     if(organizer_contact){
        if(!organizer_contact.match(numbers))
         {
            alert("Invalid characters in Contact No. Kindly enter numbers only.");
            return false;
         }
         if(organizer_contact.length!=10){
            alert("Please Enter 10 digit Mobile No.");
            return false;
         }
     }
     if(hphoto&&hphoto_path==""||photo1&&photo1_path==""||photo2&&photo2_path==""||photo3&&photo3_path==""||photo4&&photo4_path==""||ologo&&ologo_path==""){
        alert('Please wait till the image gets uploading');
        return false;
    }

     // return false;
    if(offer&&plan&&ename&&sdate&&stime&&etime&&venue&&audience&&oneline_description&&event_description&&organizer_name){
        $('#eventform').submit(function(ev){
            ev.preventDefault();
            var url = config.globalpath+'/ajax_add';
            var formData = new FormData(this);
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
                    $('#process').fadeIn("fast");
                    $('#loading').html(loading);
                },
                success:function(resp){
                    console.log(resp);
                    var ret = jQuery.parseJSON(resp);
                    if(ret != '_err'){
                        var returns = ret.path.match(/offer/);
                        mailToadmin(config.globalpath+'/'+ret.path,ret.ename);
                        $('#process').show();
                        if(returns){
                            $('#loading').html("<div class='alert alert-success' role='alert'>Offer Successfully Created</div>");
                        }
                        else{
                            $('#loading').html("<div class='alert alert-success' role='alert'>Event Successfully Created</div>");
                        }
                        location.href = config.globalpath+'/'+ret.path;
                    }
                    else if(ret == '_err'){
                        $('#loading').html("<div class='alert alert-danger' role='alert'>Cannot Create Event Please Try Again</div>");
                        $('#process').fadeOut('slow');                        
                    }
                },
                error:function(resp){

                }
            });
        });
    } 
    else{
    } 
});

function mailToadmin(ret,ename){
    var data = {'ret': ret,'ename':ename};

    console.log(data);
    var url = config.user+'/email';
    $.ajax({
        url: url,
        type: 'POST',
        async: true,
        data: data,
        dataType:'text',
        beforeSend:function(){
        },
        success:function(resp){
            return true;
        },
        error:function(resp){

        }
    });
    return false;
}