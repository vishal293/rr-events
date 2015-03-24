$(document).ready(function() {

$.fn.dataTable.moment('DD-MM-YYYY');

      var table =  $('#dataTables-example').DataTable({
                responsive: true,
               "fnDrawCallback":function(){
                 if (Math.ceil((this.fnSettings().fnRecordsDisplay()) / this.fnSettings()._iDisplayLength) > 1)  {
                        $('.dataTables_paginate').css("display", "block"); 
                        $('.dataTables_length').css("display", "block");
                        $('.dataTables_filter').css("display", "block");                       
                } else {
                        $('.dataTables_paginate').css("display", "none");
                        $('.dataTables_length').css("display", "none");
                        $('.dataTables_filter').css("display", "none");
                }
                              
              }
        });
		$('#usertable').DataTable({
               responsive: true,
               "bSort": false
        });  
        $('#catTable').DataTable({
               responsive: true,
               "bSort": false
        });   
             
});