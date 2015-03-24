<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Add target</h1>
    </div>                <!-- /.col-lg-12 -->
</div>
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Please Add current months target to the user 
            </div>
    		<div class="panel-body">
                <div class="row">
                	<div class="col-lg-6">
                        <?php   
                            echo $this->Form->create('Target');
                        ?>
                        <?php 
                            echo $this->Form->input('uid',array('type'=>'hidden',
                                                                'value'=>$uid
                                                            )

                            );
                        ?>
                        <div class="form-group">
                        <?php 
                            echo $this->Form->input('year',array('type'=>'text',
                                                                'class'=>'form-control',
                                                                'id'=>'month'
                                                    )
                            );
                        ?>
                        </div>
                        <div class="form-group">
                        <?php 
                            echo $this->Form->input('month',array('type'=>'text',
                                                                'class'=>'form-control',
                                                                'id'=>'month'
                                                    )
                            );
                        ?>
                        </div>
                        <div class="form-group">
                            <label>Gold</label>
                            <input name='data[Target][gold]' class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Diamond</label>
                            <input name='data[Target][diamond]' class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Platinum</label>
                            <input name='data[Target][platinum]' class="form-control">
                        </div>

                        <?php 
                            echo $this->Form->end('Add Target');
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php 
    echo $this->Html->script('jquery-ui/jquery-ui.js');
    echo $this->Html->script('custom/datepic.js');
?>