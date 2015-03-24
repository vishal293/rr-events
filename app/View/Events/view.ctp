<?php  
  echo $this->Html->css('events/view');
?>
<?php
    echo $this->Form->create($model=false, 
                            array('controller' => 'events',
                                'action' => 'approve',
                                'role'=>'form',
                                'id'=>'eventform'              
                            )
    );
?>
<div class="users form" style="display:none;">
    <?php
    
    echo $this->Form->input('data.user',array('label'=>'Added By',
                                            'value'=>$event['user']                             
                                        )
    );  
    echo $this->Form->input('data.id',array('type'=>'hidden','value'=>$event['event_id']));
    if($event['approved']=='0'){
        echo $this->Form->input('data.approved',array('value'=>'1'
                                            )
         );    
    }
    else{
     echo $this->Form->input('data.approved',array('value'=>'0'
                                            )
         );   
    }

    echo $this->Form->input('data.plan',array('label' => 'Plan',
                                             'id' =>'plan',
                                            'options' => 
                                            array('Gold'=>'Gold',
                                                'Diamond'=>'Diamond'
                                            ),
                                            'value' =>$event['plan']
                                        )
    );
    echo $this->Form->input(
        'data.amount',
        array('label' =>'Amount Recieved',
            'type'=>'number',
            'value' =>$event['amount']
        )
    );
    echo $this->Form->input('data.notif',array('id'=>'notif',
                                            'value' => $event['notif']
        )
    );
    
    echo $this->Form->input('data.notif_date',
                            array('label'=>'Date',
                                'value'=>$event['notif_date']
                                )
    );
    echo $this->Form->input('data.notif_time',
                            array('label'=>'Time',
                                'value'=>$event['notif_time']
                                )
    );
    echo $this->Form->input('data.notif_msg',
                            array('label'=>'Message',
                                'type'=>'textarea',
                                'rows'=>'2',
                                'value'=>$event['notif_msg']
                            )
    );
    echo $this->Form->input('data.event_name',array('value'=>$event['event_name']));
    echo $this->Form->input('data.oneline_description',array('value'=>$event['oneline_description']                                             )
    );
    echo $this->Form->input('data.event_description',array('value'=>$event['event_description']));
    echo $this->Form->input('data.event_address',array('label'=>'Venue',
                                                    'value'=>$event['event_address']
                                                )
    );
    echo $this->Form->input('data.event_longitude',array('value'=>$event['event_longitude']));
    echo $this->Form->input('data.event_latitude',array('value'=>$event['event_latitude']));
    echo $this->Form->input('data.start_date',array('value'=>$event['start_date']
                                        )
    );
    echo $this->Form->input('data.end_date',array('value'=>($event['end_date'])
                                        )
    );
    echo $this->Form->input('data.start_time',array('value'=>$event['start_time']
                                        )
    );
    echo $this->Form->input('data.end_time',array('value'=>$event['end_time']));
    echo $this->Form->input('data.event_photo',array('value'=>$event['event_photo']
                                                )
    );
    echo $this->Form->input('data.photo_1',array('value'=>$event['photo_1']));
    echo $this->Form->input('data.photo_2',array('value'=>$event['photo_2']));
    echo $this->Form->input('data.photo_3',array('value'=>$event['photo_3']));
    echo $this->Form->input('data.photo_4',array('value'=>$event['photo_4']));
    echo $this->Form->input('data.photo_5',array('value'=>$event['photo_5']));
    echo $this->Form->input('data.photo_6',array('value'=>$event['photo_6']));
    echo $this->Form->input('data.photo_7',array('value'=>$event['photo_7']));
    echo $this->Form->input('data.photo_8',array('value'=>$event['photo_8']));
    echo $this->Form->input('data.photo_9',array('value'=>$event['photo_9']));
    echo $this->Form->input('data.photo_10',array('value'=>$event['photo_10']));
    echo $this->Form->input('data.organizer_name',array('value'=>$event['organizer_name']));
        
    echo $this->Form->input('data.organizer_logo',array('value'=>$event['organizer_logo']));    
    echo $this->Form->input('data.organizer_contact',array('value'=>$event['organizer_contact']));
    echo $this->Form->input('data.organizer_website',array('type'=>'url',
                                                        'value'=>$event['organizer_website']
                                                    )
    );
    
    $selected_cat = $event['category_id'];
    foreach($cat as $c):
    $options = array(
                    $c['category_id'] =>$c['category_name']
    );
    echo$this->Form->select('data.category_id',
                            $options,
                            array('label'=>$c['category_name'],
                            'multiple'=>'checkbox',
                            'class'=>'checkbox-inline col-sm-3',
                            'id'=>'category_id',
                            'hiddenField' => false,
                            'style'=>'margin-left: 0px;',
                            'value'=>$selected_cat
                            )
    );endforeach;
   
    echo $this->Form->input('data.offer',array('value' =>$event['offer']
            )
    );
    echo $this->Form->input('data.audience',array('value' =>$event['audience']
            )
    );
    echo $this->Form->input('data.organizer_about',array('value' =>$event['organizer_about']
            )
    );
    echo $this->Form->input('data.venue',array('value' =>$event['venue']
            )
    );
        
    ?>  
</div>
<div class="col-md-8">
<div class="row">
    <div class="col-md-7"></div>
     <div class="col-md-5" style="margin:8px 0;">
        <?php if($curr_user['role'] == 'admin') :?>
        <div class="pull-right">    
            <?php 
                echo $this->Html->link(
                                    '<span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit',
                                    array('controller' => 'events',
                                        'action' => 'edit' , $event['event_id']
                                        ) ,
                                    array('class' => 'btn btn-primary',
                                        'style'=>'margin-right:3px;margin-bottom:0px;height:auto;',
                                        'div'=>false,
                                        'escape' => false
                                        )
                ); 
            if($event['approved']=='0'):                
            ?>
                <a href="javascript:;" class="btn btn-success" id='approve'>
                    <span class="glyphicon glyphicon-check"></span> Approve
                </a>

            <?php endif;
            if($event['approved']=='1'):
            ?>
                <a href="javascript:;" class="btn btn-danger" id='unapprove'>
                    <span class="glyphicon glyphicon-ban-circle"></span> Unapprove
                </a>
            <?php endif; ?>
            
    </div>

   <?php endif; ?>
   </div>
 </div>
</div>
<div class="col-md-8">
<div class="form-body">
        <div class="panel panel-info" id="comercial">
            <div class="panel-heading">
                Commercial
            </div>
            <div class="panel-body" style="margin-bottom: -20px;">
                <div class="row">
                   <div class="col-md-12 first-row" >
                     <div class="form-group col-md-6 first-row" style="margin-bottom: 0px;">
                            <label class="control-label col-md-8">Event Type:</label>
                            <div class="col-md-4">
                                <p>
                                    <?php echo $event['offer']; ?>
                                </p>
                            </div>
                     </div>                     
                     <div class="form-group col-md-6 first-row" style="margin-bottom: 0px;">
                        <label class="control-label col-md-6">Plan:
                        </label>
                            <div class="col-md-6">
                                    <p>
                                        <?php echo $event['plan']; ?>
                                    </p>
                            </div>
                     </div>
                   </div>
                </div>
                
                <div class="row">
                  <div class="col-md-12 first-row" style="padding-bottom:12px;">
                    <div class="form-group col-md-6 first-row">
                        <label class="control-label col-md-8">Amount Received:</label>
                        <div class="col-md-4">
                                <p>                                    
                                    <?php 
                                        if(!$event['amount']):
                                            echo"-";
                                    endif;?>
                                    <span class="rupee">
                                        <?php echo $this->Html->image('rupee.png',array('style'=>'width:14px; height:10px')); ?>    
                                    </span>
                                        <?php echo $event['amount']; ?>  
                                </p>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        <!--/row-->
        <div class="panel panel-info" id="event_details">
            <div class="panel-heading">
                Event Details
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Event Name:</label>
                        <div class="col-md-7">
                            <p>
                                <?php echo $event['event_name']; ?> 
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                            <label class="control-label col-md-4">Oneline Description:</label>
                            <div class="col-md-5">
                                <p>
                                    <?php echo $event['oneline_description']; ?>
                                </p>
                            </div>
                    </div>
                </div>
            <!-- </div> xtra-->
                <div class="row">
                   <div class="form-group">
                        <label class="control-label col-md-4">Event Details:</label>
                        <div class="col-md-5">
                            <p>
                                <?php echo $event['event_description']; ?>              
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Category:</label>
                        <div class="col-md-5">
                            <p>
                                <?php echo $event['category_name_str']; ?>                      
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Date:</label>
                        <div class="col-md-5">
                            <p>
                                <?php echo $event['start_date']; 
                                    if(isset($event['end_date']) && $event['start_date']!=$event['end_date']):
                                echo " To ".$event['end_date'];
                                endif;
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Time:</label>
                        <div class="col-md-5">
                            <p>
                                <?php echo $event['start_time']." - ".$event['end_time']; ?>                     
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Venue:</label>
                        <div class="col-md-5">
                            <p>
                                <?php 
                                    if(!$event['venue']){
                                        echo"-";
                                    }
                                    echo $event['venue']; 
                                ?>                          
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Address:</label>
                        <div class="col-md-5">
                            <p>
                                <?php echo $event['event_address']; ?>                          
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Who can join:</label>
                        <div class="col-md-5">
                            <p>
                                <?php echo $event['audience']; ?>                           
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6 col-md-4">
                    </div>
                    <div class="col-xs-6 col-md-3">
                        <a href="<?php echo $event['event_photo']; ?>" class="test-popup-link thumbnail">
                          <img src="<?php echo $event['event_photo']; ?>" alt="...">
                        </a>
                        <!-- <img src="<?php echo $event['event_photo']; ?>" height="200" width="300"> -->
                    </div>
                </div>
                <div class="row"><hr></div>
                <div class="row">
                    <div class="col-md-12" style="margin-bottom:20px;">
                        
                        <?php 
                        
for ($i = 1; $i <= 10; $i++) {
    $image_id = 'photo_'.$i;    
    $image = $event[$image_id];
    if($image!=""): ?>
    <div class="col-xs-6 col-md-3" >
    <a href="<?php echo $image; ?>" class="test-popup-link thumbnail">
                              <img src="<?php echo $image; ?>" alt="...">
                            </a>
                            </div>
    <?php endif;                        
} 

?>                 <?php     /* $image = $event[$image_id];
                        if($image!=""): ?>
                            <a href="<?php echo $image; ?>" class="test-popup-link thumbnail">
                              <img src="<?php echo $image; ?>" alt="...">
                            </a>
                            
                        <?php endif;*/?>
                        
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-info" id="organizer_details">
            <div class="panel-heading">
                Organizer Details
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Organizer Name:</label>
                        <div class="col-md-5">
                            <p>
                                <?php echo $event['organizer_name']; ?>                             
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Contact No:</label>
                        <div class="col-md-5">
                            <p>
                                <?php
                                    if(!$event['organizer_contact']){
                                        echo"-";
                                    } 
                                echo $event['organizer_contact'];
                                ?>          
                                
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">About Organizer:</label>
                        <div class="col-md-5">
                            <p>                                 
                                <?php 
                                    if(!$event['organizer_about']){
                                            echo"-";
                                    }
                                    echo $event['organizer_about']; 
                                ?>
                            </p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4" style="clear: both;">Organizer Website:</label>
                        <div class="col-md-8">
                            <p>
                                <?php
                                if(!$event['organizer_website']){
                                            echo"-";
                                }
                                ?>          
                                <a href="<?php echo $event['organizer_website'];?>"><?php echo $event['organizer_website'];?></a>
                            </p>
                            <p> 
                            <?php 
                                $image = $event['organizer_logo'];
                                if($image!=""): ?>
                                <div class='col-xs-6 col-md-3 loader'>
                                   <a href="<?php echo $image; ?>" class="test-popup-link thumbnail">
                                      <img src="<?php echo $image; ?>" alt="...">
                                    </a>
                                </div>
                            <?php endif;?>                                 
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-info" id="notification">
            <div class="panel-heading">
                Notification Details
            </div>
            <div class="panel-body">
                <div class="row">
                     <div class="form-group">
                            <label class="control-label col-md-4">Send Notification:</label>
                            <div class="col-md-5">
                                <p>
                                    <?php if(isset($event['notif']) && $event['notif']=='y') echo "Yes";else echo "No"; ?>
                                </p>
                            </div>
                        </div>
                </div>
                <div class="row">
                     <div class="form-group">
                            <label class="control-label col-md-4">Date:</label>
                            <div class="col-md-5">
                                <p>
                                    <?php echo $event['notif_date']; ?>                         
                                </p>
                            </div>
                        </div>
                 </div>
                 <div class="row">      
                        <div class="form-group">
                            <label class="control-label col-md-4">Time:</label>
                            <div class="col-md-5">
                                <p>
                                    <?php echo $event['notif_time']; ?>                         
                                </p>
                            </div>
                        </div>
                </div>
                <div class="row">
                   <div class="form-group">
                            <label class="control-label col-md-4">Message:</label>
                            <div class="col-md-5">
                                <p>
                                    <?php echo $event['notif_msg']; ?>                          
                                </p>
                            </div>
                        </div>
                    </div>
            
            </div>
        </div>
</div>
</div>
<div id="process" style="display:none;">
    <div class="mask">
    </div>
    <div id="loading" >
            <?php echo $this->Html->image('ajax-white.gif'); ?>
    </div>
</div>
<?php echo $this->Html->script('custom/ajax/approve.js'); ?>
<?php echo $this->Html->script('jquery.magnific-popup.js'); ?>
<script>
    $('.test-popup-link').magnificPopup({ 
  type: 'image'
    // other options
    });
</script>

    



        