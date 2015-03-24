$(document).ready(function() { 
 /*====================================
   =            Time-Pickers            =
   ====================================*/
   $('#start_time').clockface({
        format:'hh:mm A',
        trigger:'manual'
    });

    $('#start_time_btn').click(function(e){   
        e.stopPropagation();
        $('#start_time').clockface('toggle');
    });

    $('#end_time').clockface({
        format:'hh:mm A',
        trigger:'manual'
    });

    $('#end_time_btn').click(function(e){   
        e.stopPropagation();
        $('#end_time').clockface('toggle');
    });

    $('#notif_time').clockface({
        format:'hh:mm A',
        trigger:'manual'
    });

    $('#notif_time_btn').click(function(e){   
        e.stopPropagation();
        $('#notif_time').clockface('toggle');
    });
   
   
   /*-----  End of Time-Pickers  ------*/

   /*===================================
   =            Date-Picker            =
   ===================================*/
    $('#start.date').datepicker({
        startDate: "0d", endDate: "+12m",
        format: "dd-mm-yyyy",
        autoclose:true      
    }).on('changeDate', function(ev) {
     $("#end.date").datepicker("setStartDate",ev.date);
    });

    $('#end.date').datepicker({
        startDate: "0d", endDate: "+12m",       
        format: "dd-mm-yyyy",
        autoclose: true     
    }).on('changeDate', function(ev) {
     $("#start.date").datepicker("setEndDate",ev.date);
     $("#notif.date").datepicker("setEndDate",ev.date);
    });

    $('#notif.date').datepicker({
        startDate: "0d", endDate: "+12m",       
        format: "dd-mm-yyyy",
        autoclose:true
    }); 
   /*-----  End of Date-Picker  ------*/
});