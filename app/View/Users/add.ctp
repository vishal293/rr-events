<?php  
  echo $this->Html->css('users/add');
?>
<p></p>

<div class="col-md-6">
   
	    <div id="greengreen" class="col-md-8" >
			<?php echo $this->Session->flash(); ?>
		</div>
		<br />
		<br />

        <div class="panel panel-info">
            <div class="panel-heading">
              Create User
            </div>
    		<div class="panel-body">
	    		<div>
					<?php
						echo $this->Form->create('User');
					?>
					<div class="form-group col-md-12">
						<label class="col-md-3">Name </label>
						  <div class="col-md-8">
						     <input name = "data[User][name]" class="form-control" required>
						  </div>			
					</div>
					<div class="form-group col-md-12">
						<label class="col-md-3">Email ID </label>
					      <div class="col-md-8">
						    <input name="data[User][email]" class="form-control" type="email" required>
						  </div>							
					</div>
					<div class="form-group col-md-12">
						<label class="col-md-3">Password </label>
							<div class="col-md-8">
								<?php  
									echo $this->Form->input('password',array(
																'class'=>'form-control col-md-2',
																'required'=>true,
																'label'=>false
																)
									);
								?>
							</div>										
					</div> 
					<div class="form-group col-md-12">
						<label class="col-md-3">Confirm Password </label>
							<div class="col-md-8">
								<?php 						
								echo $this->Form->input(
									'cnf_password',
									array(
										'type'=> 'password',
										'required' => true,
										'label' =>'Confirm Password',
										'class'=>'form-control',
										'label'=>false
									)
								);
								?>
							</div>
					</div>
					<?php //Don't ever do this. Seriously remove this. But in projects like this, it is needed. 

					echo $this->Form->input(
							'added_count',
							array(
								'type'=> 'hidden',
								'value' => '0',
							)
						);
					echo $this->Form->input(
							'added_event',
							array(
								'type'=> 'hidden',
								'value' => '0',
							)
						);
					?>
					<div class="form-group col-md-12">
					  <label class="col-md-3">Role </label>
						<div class="col-md-8">
							<?php 
							echo $this->Form->input(
											'role',
											array(
												'class'=>'form-control',
													'label'=>false,
												'options'=>array(
																'admin'=>'Admin',
																'manager'=>'Manager',
																'basic_user'=>'Basic User'
																
												),
												'default'=>'basic_user'
											)
							);
							?>
						</div>

						
				    </div>
		           	<center>
						<?php 
							echo $this->Form->button('Create User',array('type'=>'submit',
								'class'=>'btn btn-success',
								 'tabindex'=>'27',
	                                        'style'=>'width:25%;margin-bottom:10px;',
	                                        'id'=>'submit'
															)
							);
						?>
				    </center>
					<br / >
					
				</div>
	     	</div>
	  	</div>
	
</div>

<!-- <div class="col-md-1"></div> -->

<!-- User details -->

<div class="col-md-5">
    
    	<br />
		<br />
	    <div class="panel panel-info">
            <div class="panel-heading">
              Roles for admin
            </div>
    		<div class="panel-body">
	    		<div>
					<?php
						echo $this->Form->create('User');
					?>
					
					<ul class="form-group col-md-12" >
	        			<li class="col-md-12" style="padding:5px;">
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
					
				
					<br / >
					
				</div>
	     	</div>
	  	</div>
	
</div>

<?php  echo $this->Html->script('custom/usercheck'); ?>