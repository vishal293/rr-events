$(function(){

    /*==========================================
    =            Notifications-Hide            =
    ==========================================*/
    $("#notification").hide();
    $("#plan").ready(function(){
        var planval = $("#plan").val();
        var notif = $("#notif").val();
        if(planval == 'Diamond'){
            $("#notification").show();          
        }
        else{
            $("#notification").hide();
            
        }
    });
    $("#plan").change(function(){   
        var planval = $("#plan").val();
        if(planval == 'Diamond'){
            $("#notification").show();
        }
        else{
            $("#notification").hide();
        }
    });
    $('input:radio').change(function(){
        var notif = $("input[name='data[data][notif]']:checked").val();
        notifEnDis(notif);
    });
    $('input:radio').ready(function(){
        var notif = $("input[name='data[data][notif]']:checked").val();
        notifEnDis(notif);
    });
    
    /*-----  End of Notifications-Hide  ------*/
    /*============================================
    =            Characters Maxlenght            =
    ============================================*/
    $('#notif_msg').keyup(function(){
        $('#notif_msg_char_disp').show();
        countChar(this,140);
        $('#notif_msg').focusout(function(){
            $('#notif_msg_char_disp').hide();  
        });
    });
    $('#event_name').keyup(function(){
        $('#event_name_char_disp').show();        
        countChar(this,50);
        $('#event_name').focusout(function(){
            $('#event_name_char_disp').hide();  
        });
    });
    $('#venue').keyup(function(){
        $('#venue_char_disp').show();        
        countChar(this,32);
        $('#venue').focusout(function(){
            $('#venue_char_disp').hide();  
        });
    });
    $('#oneline_description').keyup(function(){
        $('#oneline_description_char_disp').show();        
        countChar(this,62);
        $('#oneline_description').focusout(function(){
            $('#oneline_description_char_disp').hide();  
        });
    });    
    
    /*-----  End of Characters Maxlenght  ------*/

    function notifEnDis(notif){
       if(notif=='y'){
            $('#notif_date').attr('required',true);
            $('#notif_time').attr('required',true);
            $('#notif_msg').attr('required',true);
            $('#notif_date_btn').attr('disabled',false);
            $('#notif_time_btn').attr('disabled',false);
            $('#notif_msg').attr('readonly',false);
            $('#notif_date').attr('readonly',false);
            $('#notif_time').addClass('disTime');
        }
        if(notif=='n'){
            $('#notif_date_btn').attr('disabled',true);
            $('#notif_time_btn').attr('disabled',true);
            $('#notif_msg').attr('readonly',true);
            $('#notif_date').attr('required',false);
            $('#notif_date').attr('readonly',true);
            $('#notif_time').attr('required',false);
            $('#notif_msg').attr('required',false);
            $('#notif_date').val('');
            $('#notif_time').val('');
            $('#notif_msg').val('');
            $('#notif_time').removeClass('disTime');
        } 
    }

    function countChar(val,chars) {
        var id = val.id;
        var len = val.value.length;
        if (len > chars) {
          val.value = val.value.substring(0, chars);
        }else if(len == chars){
          $('#'+id+'_char').text(0);                                
        } 
        else {
          $('#'+id+'_char').text(chars - len);
        }
    }

    function requestPostAjax(url, data, datatype){   
        var type='POST'; 
        var async = true;
        var result;
        if(datatype == '')
        {
            datatype = 'text';
        }
        $.ajax({
            url:url,
            type: type,
            async: async,
            data:data,
            dataType: datatype,
            success: function(data){
                 result = data;              
            },
            error: function(data){}
        });
        return result;
    }

});





