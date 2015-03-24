<?php  echo $this->Html->css('users/add');?>
<div class="row">
    <div class="col-lg-12">
            <h1 class="page-header">Users</h1>
    </div>                <!-- /.col-lg-12 -->
</div>
<div class="row">
	<div class="col-md-4">
		<?php echo $this->Session->flash(); ?></div>
	<div class="col-md-4">
	</div>
</div>
<div class="row">
	<div class="pull-right" style="margin-right:18px;">
		<?php 
			echo $this->Html->link('Add New User',
									array('controller'=>'users',
										'action'=>'add'
									),
									array('class'=>'btn btn-primary')
			);
	 	?>
	</div>
	<div class="clearfix"></div>
    <div class="col-lg-12">
		<div class="panel panel-info">
            <div class="panel-heading">
                All Users
            </div>
            <div class="panel-body">
                <div id="no-more-tables" class="dataTable_wrapper">
               		<table class="table table-striped table-bordered table-hover" id="usertable">
               			<thead>
                       		<tr>								
								<th>Name</th>
								<th>Email</th>
								<th>Role</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
						
						foreach($users as $k): ?>
							<tr>
								<td data-title= "Name"><?php echo $k['User']['name']; ?></td>	
								<td data-title= "Email"><?php echo $k['User']['email']; ?></td>
								<td data-title= "Role"><?php 
										if($k['User']['role']=='admin'){
											echo"Admin";
										}elseif($k['User']['role']=='manager'){
											echo "Manager";
										}else{
										 echo "Basic User";	
										}
									?>
								</td>
								<td data-title= "Action">
								<?php if($curr_user['role'] == 'admin'): ?>
										<?php
											$id = $k['User']['id'];
											echo $this->Html->link(
												'<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit',
												array(
													'controller' =>'users',
													'action' => 'edit',
													$id
													),
												array(
													'class'=>'btn-primary btn-sm',
													'div'=>false,
													'escape' => false
												)
											);
										?>
										<?php
											$id = $k['User']['id'];
											echo $this->Html->link(
												'<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete',
												array(
													'controller' =>'users',
													'action' => 'delete',
													$id
													),
												array(
													'class'=>'btn-danger btn-sm',
													'div'=>false,
													'escape' => false,
													'confirm'=>'Are you sure you want to delete this user'
													)
											);
										?>
								<?php endif; ?>
								</td>
							</tr>
						<?php  endforeach; ?>
						</tbody>
               		</table>
               	</div>
            </div>
		</div>
	</div>
</div>
<?php 
	echo $this->Html->script('jquery.dataTables');
    echo $this->Html->script('dataTables.bootstrap');        
    echo $this->Html->script('dataTables.responsive');
    echo $this->Html->script('custom/usertable');     
?>

<script>
	$('#add').click(function(){
        $('#myModal').modal({
            backdrop:true
        });
	});

</script>



		