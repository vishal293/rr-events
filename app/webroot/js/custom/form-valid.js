$("form").validate({ 
        debug: true,       
        errorElement: "span",
        //errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input

        invalidHandler: function (event, validator) { //display error alert on form submit   
                    $('.alert-success','form').hide();
                    $('.alert-danger', 'form').show();
                    //$('form').scrollTo($('.alert-danger', 'form'), -200);                    
        },

        highlight: function (element, errorClass, validClass) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).parents(".has-error").removeClass("has-error");             

            //$(element).closest('.form-group').removeClass('has-error');
        },
        success: function (label) {
            label.closest('.form-group').removeClass('has-error'); // set success class to the control group
        },
        submitHandler: function (form) {
                    $('.alert-success', 'form').show();
                    $('.alert-danger', 'form').hide();
                    //form[0].submit(); // submit the form
        },
        errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.parent(".input-group").size() > 0) {
                        error.insertAfter(element.parent(".input-group"));
                    } else if (element.attr("data-error-container")) { 
                        error.appendTo(element.attr("data-error-container"));
                    } else if (element.parents('.radio-list').size() > 0) { 
                        error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                    } else if (element.parents('.radio-inline').size() > 0) { 
                        error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                    } else if (element.parents('.checkbox-list').size() > 0) {
                        error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                    } else if (element.parents('.checkbox-inline').size() > 0) { 
                      $(this).parent('div').addClass('has-error');//error.insertAfter(element.parent().parent()); //error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));                        
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
        },
                            
        rules: {
            "data[data][offer]": {
                required: true               
            },  
            "data[data][plan]": {
                required: true,                
            },
            "data[data][amount]": {
                required: true,
                number:true                
            },
            "data[data][event_name]": {
                required: true,
                maxlength : 50
            },
            /*"data[cat][category_id][]": { 
                required:true,
                minlength:1
            },*/      
            "data[data][oneline_description]":{
                required:true,
                maxlength:50
            },
            "data[data][event_description]":{
                required:true,
                maxlength:500
            },
            "data[data][organizer_contact]":{
                required:true,
                number:true,
                minlength:10
            },
            "data[data][organizer_website]":{
                url:true
            }
        },
        messages: {
            "data[data][offer]": {
                required: "This field must be selected"                
            }, 
            "data[data][plan]": {
                required: "This field must be selected"                
            },
            "data[data][amount]": {
                required: "Amount Should be entered",
                number:"Amount Must be number"                
            },           

            "data[data][event_name]": {
                required: "You must enter event name",
                maxlength: "Event name can be 50 characters long"
            },  
            "data[data][oneline_description]": {
                required: "You must enter online description",
                maxlength : "oneline description can be 50 characters long"
            },
            "data[data][event_description]":{
                required:"You must enter event description",
                maxlength:"event description can be 500 characters long"
            },
            "data[data][organizer_contact]":{
                required:"You must enter Organizer Mobile No",
                number:"Mobile no must be Number",
                minlength:"Mobile no must be 10 characters long"
            },
            /*"data[cat][category_id][]":{
                required:"You must Select at least one category",
                minlength: jQuery.validator.format("Please select at least {1} checkbox")                
            },*/
            "data[data][organizer_website]":{
                url:"Organizer Website Must be URL"
            }
        }
              
});
    
            
    $('.date .form-control').change(function() {
        $('form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input 
    });

    $('.time .form-control').change(function() {
        $('form').validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input 
    }); 

    

    

    