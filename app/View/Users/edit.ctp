<?php  
  echo $this->Html->css('users/add');
?>
<div class="row">
    <div class="col-md-6">
        <div class="panel panel-info mobile-top-margin">
            <div class="panel-heading">
                Update User
            </div>
    		<div class="panel-body">
                     <?php
							echo $this->Form->create('User', array('controller' => 'users', 'action' => 'edit'));
							echo $this->Form->input('id');
						?>
						<div class="form-group col-md-12">
						<label class="col-md-2">Name</label>
							<div class="col-md-7">
							<?php  
							echo $this->Form->input('name',array(
															'class'=>"form-control",
															'label'=>false
															)
							);
							?>		
						</div>
						</div>
						<div class="form-group col-md-12">
						<label class="col-md-2">Email</label>
						<div class="col-md-7">
						<?php 		
							echo $this->Form->input('email',array(
															'class'=>"form-control",
															'label'=>false
															)
							);
						?>
						</div>
						</div>
						<div class="form-group col-md-12">
						<label class="col-md-2">Role</label>
						<div class="col-md-7">
						<?php 
						echo $this->Form->input('role',
												array(
													'class'=>"form-control",
													'label'=>false,
													'options'=>array(
															'admin'=>'Admin',
															'manager'=>'Manager',
															'basic_user'=>'Basic User',

													),
												)
						);
						?>
						</div>
						</div>
						<center>
						<?php 
							echo $this->Form->button('Update User',array('type'=>'submit',
																	'class'=>'btn btn-success'
															)
							);
						?>
						</center>
						<br />
			</div>
		</div>
	</div>

	<!-- <div class="col-md-1"></div> -->

<!-- User details -->

<div class="col-md-5">
    <div class="row">    	
	    <div class="panel panel-info">
            <div class="panel-heading">
              Roles for admin
            </div>
    		<div class="panel-body">
	    		<div>
					
					<ul class="col-md-12" >
	        			<li class="col-md-12" style="padding:3px 5px;">
	        				<label >Admin </label>
						    	<ul class="col-md-12">
					        		<li>Can Add Events</li>
					        		<li>Can Edit / Approve / Unapprove Events</li>
								</ul>
						</li>
						<li class="col-md-12" style="padding:5px;">
							<label >Manager </label>		      				
			    				<ul class="col-md-12">
					        		<li>Can Add Basic Events</li>
								</ul>			  				
			  			</li>					
						<li class="col-md-12" style="padding:5px;">
							<label >Basic User </label>
			    				<ul class="col-md-12">
					        		<li>Can Only View Events</li>
								</ul>	
			  			</li>							
									
        			</ul>			
					
				</div>
	     	</div>
	  	</div>
	</div>	
</div>

</div>

		
