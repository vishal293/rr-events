<div class="row">
    <div class="col-lg-12">
	 	<?php $this->Session->Flash(); ?>            	

        <h2 class="page-header">Unapproved Offers</h2>
    </div>      <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
		<div class="panel panel-info">
            <div class="panel-heading">
                    Unapproved Offers
            </div>
            <div class="panel-body">
                <div class="dataTable_wrapper">
               		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
               			<thead>
               				<tr>
								<th>Offer Name</th>
								<th>Offer Address</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Organizer Name</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($event as $eve):
							?>
							<tr>						
								<td><a href="<?php echo Router::url(array('controller'=>'events','action'=>'view_offer',$eve['event_id'])); ?>"><?php echo $eve['event_name']; ?></a></td>
								<td><?php echo $eve['event_address']; ?></td>
								<td><?php echo $eve['start_date']; ?></td>
								<td><?php echo $eve['end_date']; ?></td>
								<td><?php echo $eve['organizer_name']; ?></td>				
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
?>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.4/moment.min.js"></script>    
<script type="text/javascript" src="http://cdn.datatables.net/plug-ins/3cfcc339e89/sorting/datetime-moment.js"></script>
<?php  echo $this->Html->script('custom/usertable');  ?>








