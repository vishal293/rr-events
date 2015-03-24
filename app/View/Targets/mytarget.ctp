
<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Your Targets</h1>
                </div>
                <!-- /.col-lg-12 -->
</div>
<div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Your current month target
                </div>
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Gold</th>
                                    <th>Diamond</th>
                                    <th>Platinum</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i='1'; 
                            foreach($u as $k): ?>
                                <tr>
                                    <td><?php echo $k['Target']['gold']; ?></td>                       
                                    <td><?php echo $k['Target']['diamond']; ?></td>                      
                                    <td><?php echo $k['Target']['platinum']; ?></td>                       
                                </tr>
                            <?php $i++; endforeach; ?>
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



        