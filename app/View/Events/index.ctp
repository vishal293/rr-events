<br />
<div class="row">
    <div class="col-lg-12">
	 	<?php $this->Session->Flash(); ?>            	

        <h2 class="page-header">Approved Events</h2>
    </div>      <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-12">
		<div class="panel panel-info app-events">
            <div class="panel-heading">
                    Approved Events
            </div>
            <div class="panel-body">
                <div id="no-more-tables" class="dataTable_wrapper">
               		<table class="table table-striped table-bordered table-hover" id="dataTables-example">
               			<thead>
               				<tr>
								<th>Event Name</th>
								<th>Event Address</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Organizer Name</th>
								<th>Category</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								foreach($event as $eve):

									// echo date('Y-m-d',);
			$ymd = 
		DateTime::createFromFormat('d-m-Y', $eve['end_date'])->format('Y-m-d');

		$today = date('Y-m-d');

		if($ymd >= $today)
		{

		
							?>
							<tr>
								<td data-title="+"><a href="<?php echo Router::url(array('controller'=>'events','action'=>'view',$eve['event_id'])); ?>"><?php echo $eve['event_name']; ?></a></td>
								<td data-title="Event Address"><?php echo $eve['event_address']; ?></td>
								<td data-title="Start Date"><?php echo $eve['start_date']; ?></td>
								<td data-title="End Date"><?php echo $eve['end_date']; ?></td>
								<td data-title="Organizer Name"><?php echo $eve['organizer_name']; ?></td>
								<td data-title="Category Name"><?php echo $eve['category_name']; ?></td>
							</tr>
							<?php } endforeach; ?>
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









