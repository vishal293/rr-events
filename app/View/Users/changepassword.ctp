<?php  
  echo $this->Html->css('users/add');
?>
<style type="text/css">
.error-message{
  font-size:14px;color:red;text-decoration:none
}
</style>
<div class="row">
    <div class="col-md-8">
	<div class="panel panel-info mobile-top-margin">
		<div class="panel-heading">
			Change Password
		</div>
		<div class="panel-body">
			<?php
				echo $this->Form->create('User', array('controller' => 'users', 'action' => 'changepassword'));
				echo $this->Form->input('id');
			?>
			<div class="form-group col-md-12">
				<label class="col-md-4">Password</label>
				<div class="col-md-8">
				<?php  
					echo $this->Form->input('password',array(
							'class'=>"form-control",
							'label'=>false,
							'value'=> ''
						)
					);
				if(isset($password_error)){
					?>
					<div class="error-message"><?php echo $password_error; ?></div>
				<?php	
				}
				?>		
				</div>
			</div>
			<div class="form-group col-md-12">
				<label class="col-md-4">Re enter password</label>
				<div class="col-md-8">
					<?php 		
						echo $this->Form->input('cnf_password',array(
								'class'=>"form-control",
								'label'=>false,
								'type'=>'password'
							)
						);
					if(isset($cnf_password_error)){
						?>
					<div class="error-message"><?php echo $cnf_password_error; ?></div>
					<?php	
					}
					?>
				</div>
			</div>
			<center>
			<?php 
				echo $this->Form->button('Update Password',array(
						'type'=>'submit',
						'class'=>'btn btn-success'
					)
				);
				echo $this->Form->end();
			?>
			</center>
			<br />
		</div>
	</div>
</div>



</div>

		
