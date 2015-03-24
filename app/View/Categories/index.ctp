<?php  echo $this->Html->css('users/add');?>
<div class="row">
    <div class="col-lg-12">
        <h2 class="page-header">Categories</h2>
    </div>                <!-- /.col-lg-12 -->
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Add New Category</h4>
      </div>
      <div class="modal-body">
      	<?php
					echo $this->Form->create($model=false, 
						array(
						'controller' => 'categories',
						'action' => 'add',
						'type'=>'file',
						'role'=>'form',
						'id'=>'categoryform',
						)
					);
		?>
	          <div class="form-group col-sm">
		            <label for="category_img" class="control-label">Category Image:</label>
		            <input type="file" name="data[photo][category_img]" id="category_img" required>
					<input type="hidden" name="data[data][category_img]" id="category_img_path" class="form-control">
				<div>
					<div id="category_img_loader" class="loader">
	                </div>
	                <div id="category_img_output" class="loader"></div>
	                <div class='loader ml-0'>
                        <a id="category_img_remove" style="display:none" >Remove Image
                             </a>
                         <a class="test-popup-link thumbnail" id="category_img_link" style="display:none">
                             <img id="category_img_display">
                             
                            </a>
                    </div>
	            </div>
	          </div>
	          <div class="form-group">
		            <label for="cat_name" class="control-label">Category Name:</label>
		            <input name="data[data][category_name]" id="cat_name" class="form-control" required>
      				<p class="text-danger" id="error" style="display:none">This Category Is already present</p>
	          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="add_cat" >Add</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>
<div class="row">
	<div class ="col-md-8">

		<?php echo $this->Session->flash(); ?>
	</div>
	<div class ="col-md-4">	
	</div>
</div>
<div class="row">
	<div class="pull-right" style="margin-right:18px;">
		<a href="javascript:;" class="btn btn-primary" id="add">Add New Category</a>
	</div>
	<div class="clearfix"></div>
    <div class="col-lg-12 all-cat">
		<div class="panel panel-default">
            <div class="panel-heading">
                    All Categories
            </div>
            <div class="panel-body">
                <div id="no-more-tables" class="dataTable_wrapper">
               		<table class="table table-striped table-bordered table-hover" id="catTable">
               			<thead>
               				<tr>
								<th>Category Name</th>
								<?php if($curr_user['role'] == 'admin'): ?>
								<th>Actions</th>
								<?php endif; ?>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach($category as $cat):
							?>	
							<tr>
								<td data-title="Category Name"><?php echo $cat['category_name']; ?></td>
								<?php if($curr_user['role'] == 'admin'): ?>
											<td data-title="Actions">
												<?php
													echo $this->Html->link(
															'<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit',
															array(
																'controller' =>'categories',
																'action' => 'edit',
																$cat['category_id']
																),
															array(
																'class'=>'btn-primary btn-sm',
																'div'=>false,
																'escape' => false
															) 
														);
												?>
												<?php 
													echo $this->Html->link(
														'<span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete ',
														array(
															'controller' =>'	categories',
																'action' => 'delete',
																$cat['category_id']
																),
														array('class'=>'btn-danger btn-sm',
															'div'=>false,
															'escape' => false,
															'confirm' =>'Are you sure you want to delete category '.$cat['category_name']
															)
														);

												?>
											</td>
								<?php endif; ?>
							</tr>
							<?php endforeach; ?>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
	echo $this->Html->script(array('custom/ajax/addcategory',
									'custom/image-upload',
									'jquery.dataTables',
									'dataTables.bootstrap',
									'dataTables.responsive',
									'custom/usertable'
		)
	);
 ?>