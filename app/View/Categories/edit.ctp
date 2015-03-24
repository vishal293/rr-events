<?php echo $this->Html->css('users/add');?>
<div style="margin-bottom:20px"></div>
<div class="col-md-9 form-container mobile-top-margin">
    <div class="panel panel-info">
        <div class="panel-heading">
            <b>Update Category</b>
        </div>
		<div class="panel-body">
     		<?php
				echo $this->Form->create($model=false, 
									array('controller' => 'categories',
												'action' => 'edit',
 											'type'=>'file',
 											'id'=>'categoryform',
                                            'class'=>'form-horizontal'
										)
				);
				echo $this->Form->input('id',array('type'=>'hidden','value'=>$category['category_id']));
			?>
			<div class="row">
				<div class="form-group col-sm-12">
					<label class="control-label col-sm-3 ml-0">Category Name</label>
					<div class="col-sm-7 pad-left-11 pl-15">
						<input name="data[data][category_name]" class="form-control input-sm" value="<?php echo $category['category_name']; ?>">
					</div>
				</div>	
			</div>
			<div class="row">
				<div class="form-group col-sm-12">
					<div class="">
						<label class="control-label col-sm-3 ml-0">Category Image</label>
						<div class="col-sm-4" style="padding-left: 10px;">
							<input type="file" name="data[photo][category_img]" id="category_img">
							<input type="hidden" name="data[data][category_img]" id="category_img_path" value="<?php echo $category['category_img'] ?>" class="form-control">
						</div>
						<div class="col-sm-5">				
					<div id="category_img_loader" class="cloader"></div>
        			<div id="category_img_output" class="cloader"></div>	
	        		<?php 
	                    $image = $category['category_img'];
	                    if($image!=""): ?>
	                    <div class='col-xs-6 col-md-4 cloader'>
	                       <a href="<?php echo $image; ?>" id="category_img_link" class="test-popup-link thumbnail">
	                          <img id="category_img_display" src="<?php echo $image; ?>" alt="...">
	                        </a>
	                    </div>
	        		<?php endif;?>                                     
				</div>
					</div>
				</div>
		<!-- 		<div class="col-sm-6">				
					<div id="category_img_loader" class="cloader"></div>
        			<div id="category_img_output" class="cloader"></div>	
	        		<?php 
	                    $image = $category['category_img'];
	                    if($image!=""): ?>
	                    <div class='col-xs-6 col-md-3 cloader'>
	                       <a href="<?php echo $image; ?>" id="category_img_link" class="test-popup-link thumbnail">
	                          <img id="category_img_display" src="<?php echo $image; ?>" alt="...">
	                        </a>
	                    </div>
	        		<?php endif;?>                                     
				</div> -->
			</div>
         	<center>
				<?php 							
					echo $this->Form->button('Update Category',
											array('type'=>'submit',
												'class'=>'btn btn-success'
											)								
					);

				?>
			</center>
			<br>
		</div>
	</div>
</div>
<?php 
	echo $this->Form->end();
	echo $this->Html->script(array('custom/image-upload',
									'jquery.magnific-popup'
								)
	);
?>
<script>
    $('.test-popup-link').magnificPopup({ 
  type: 'image'
    // other options
    });
</script>          