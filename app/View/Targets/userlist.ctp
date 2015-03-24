<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Manage Targets</h1>
                </div>
                <!-- /.col-lg-12 -->
</div>
<div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Please Select User to assign Current months target
                </div>
                <div class="panel-body">
                    <div  class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i='1'; 
                            foreach($users as $k): ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><a href="<?php echo Router::url(array('controller'=>'targets','action'=>'add',$k['User']['id'])); ?>"><?php echo $k['User']['name']; ?></a>
                                    </td>                       
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



        