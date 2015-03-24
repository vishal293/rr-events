
var pathArray = [];
    pathArray = $(location).attr('pathname').split('/'); 
var id = pathArray[4];    
var data = {id:id};
$.getJSON(config.globalpath+'/get_dataByid',data,function(data){
        construct_data(data);
}); 

function construct_data(data){
    // var parseddata = JSON.parse(data);
    $.each(data,function(key,value){
        switch(key){
            case 'event_name':
                $('#view_heading').html(data[key]);
                $('#'+key).html(data[key]);
            break;
            case 'start_date':
                if(data['start_date']==data['end_date']){
                    $('#date').html(data['start_date']);
                }
                else{
                    $('#date').html(data['start_date']+' To '+data['end_date']);                    
                }
            break;
            case 'start_time':
                $('#time').html(data['start_time']+' - '+data['end_time']);
            break;
            case 'event_photo':
                $('#event_photo').html('<img src="'+data["event_photo"]+'" height="200" width="300">');
            break;    
            default:
                $('#'+key).html(data[key]);
        }
        
    });

    /*$('#loader').html(data['event_name']);
    $('#event_type').html(data['offer']);
    $('#plan').html(data['plan']);        */
}