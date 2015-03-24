<?php echo $this->Html->css('custom/dashboard'); ?>
<div style="margin-bottom:20px"></div>
<div class="row">
	<div class="col-lg-5">
   		<div class="panel panel-info">
   			<div class="panel-heading">
            	<b>App Users</b>                           
       		</div>
        	<div class="panel-body">
                <div class="dataTable_wrapper" id="appUser">
                	<center>
                        <?php 
                        echo $this->Html->image('ajax-loader.gif',array('id'=>'appUserloader')
                        ); 
                        ?> 
                    </center>
        		</div>
        	</div>
   		</div>
	</div>
	<div class="col-lg-5">
		<div class="panel panel-info">
   			<div class="panel-heading">
            	<b>Events</b>                           
       		</div>
        	<div class="panel-body">
                <div class="dataTable_wrapper" id="events">
                	<center>
                        <?php 
                        echo $this->Html->image('ajax-loader.gif',array('id'=>'eventsloader')
                        ); 
                        ?> 
                    </center>
        		</div>
        	</div>
   		</div>
	</div>
</div>
<div class="row">
	<div class="col-lg-5">
		<div class="panel panel-info">
			<div class="panel-heading">
            	<b>Offers & Promotions</b>                           
       		</div>
        	<div class="panel-body">
                <div class="dataTable_wrapper" id="offers">
                	<center>
                        <?php 
                        echo $this->Html->image('ajax-loader.gif',array('id'=>'offersloader')
                        ); 
                        ?> 
                    </center>
        		</div>
       		</div>
		</div>
	</div>
</div>
<?php 
	echo $this->Html->script(array('jquery.dataTables',
									'custom/ajax/dashboard/getAllAppUsers',
									'custom/ajax/dashboard/getAllEvents',
									'custom/ajax/dashboard/getAllOffers'
								)
	);
?>