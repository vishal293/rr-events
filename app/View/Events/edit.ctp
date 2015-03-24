  <?php  echo $this->Html->css('users/add');  ?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Choose Location</h4>
      </div>
      <div class="modal-body">
        <div id="map-canvas" class="box box-primary" style="height: 400px; width: 100%;"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Done</button>
      </div>
    </div>
  </div>
</div>
<!-- /Modal -->
    <?php   
        echo $this->Form->create($model=false,
                                     array('type'=>'file',
                                            'role'=>'form',
                                            'id'=>'eventform',
                                            'class'=>'form-horizontal'
                                    )
        );
        echo $this->Form->input('id',
                                array('value'=>$uid,
                                    'type'=>'hidden'
                                )
        );       

        echo $this->Form->input('data.user',
                                array('label'=>'Added By',
                                    'value'=>$event['user'],
                                    'type'=>'hidden'
                                )
        );
        echo $this->Form->input('data.approved',
                                    array('label'=>'Status',
                                        'options' =>array(
                                            '0'=>'Unapproved',
                                            '1'=>'Approved',
                                            '2'=>'Rejected'
                                        ),
                                        'value'=>$event['approved'],
                                        'type'=>'hidden'
                                    )
        );
    ?>
<br />
<div class="col-md-9 form-container edit-page">
    <div class="panel panel-info" id="commercial">
        <div class="panel-heading">
            <b>Commercial</b>                           
        </div>
        <div class="panel-body">
            <div class="row">
                <div class='form-group col-md-6'>
                    <label class="control-label col-sm-6 margin_left" style="" >Event Type</label>
                    <div class="col-sm-6">
                        <?php 
                        echo $this->Form->input(
                            'data.offer',
                            array('label' => false,
                                'class'=>'form-control input-sm',
                                'required'=>true,
                                'id'=>'offer',
                                'tabindex'=>'1',
                                'value' =>$event['offer'],
                                'readonly'=>true
                            )
                        );
                        ?>
                    </div>
                </div>
                <div class='form-group col-md-6'>
                    <label class="control-label col-sm-4 margin_left">Plan</label>
                    <div class="col-sm-6">
                        <?php 
                        echo $this->Form->input(
                            'data.plan',
                            array('label' => false,
                                'class'=>'form-control input-sm',
                                'required'=>true,
                                'id'=>'plan',
                                'tabindex'=>'2',
                                'options' => array('Gold'=>'Gold',
                                            'Diamond'=>'Diamond'
                                            ),
                                'empty' =>"Choose One",
                                'style'=>'padding-left:4px;',
                                'value' =>$event['plan']
                            )
                        );
                        ?>
                    </div>
                </div>
            </div>
            <div class="row">                                   
                <div class="form-group col-md-6">
                    <label class="control-label col-sm-6 margin_left" style="">Amount Received</label>
                    <div class="col-sm-6">
                        <div class="input-group">
                            <span class="input-group-addon rupee">
                                <?php echo $this->Html->image('rupee.png',array('style'=>'width:15px; height:15px')); ?>    
                            </span>
                            <input name="data[data][amount]" id="amount" type="text" class="form-control input-sm" value="<?php echo $event['amount']; ?>" tabindex ='3'>
                        </div>                          
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="event-det" class="panel panel-info">
        <div class="panel-heading">
            <b>Event Details</b>
        </div>
        <div class="panel-body">
            <div id="add-child" >
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label class="control-label col-sm-3 ml-0">Event Name</label>
                        <div class="col-sm-7 pad-left-11 pl-15" style="padding-right:12px;">
                            <input name="data[data][event_name]" type="text" class="form-control input-sm"  value="<?php echo $event['event_name']; ?>" tabindex ='4' maxlength="50" autocomplete="off" id="event_name" required>
                        </div>
                        <div class="col-sm-3 charDisp" id="event_name_char_disp">
                            <small>
                                <span id="event_name_char">50</span>
                                <span>&nbsp;Characters Remaining</span>
                            </small> 
                        </div>                               
                    </div>                        
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label ml-0 col-sm-3">Online Description</label>
                            <div class="col-sm-7 pad-left-4" style="width: 55%;">
                                <input name="data[data][oneline_description]" type="text" class="form-control input-sm" title="Enter oneline description" maxlength="62" value="<?php echo $event['oneline_description']; ?>" id="oneline_description" required>
                            </div>
                            <div class="col-sm-3 charDisp" id="oneline_description_char_disp" style="right:-7px">
                                <small>
                                    <span id="oneline_description_char">62</span>
                                    <span>&nbsp;Characters Remaining</span>
                                </small> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label ml-0 col-sm-3">Detail Description</label>
                            <div class="col-sm-7 pad-left-4" style="width: 55%;">
                                <textarea class="form-control input-sm" id="event_description" title="Enter event description" name="data[data][event_description]" tabindex ='12' style="resize: vertical; margin-top: 0px; margin-bottom: 5px; height: 68px;" rows="3" required><?php echo $event['event_description'];?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label class="control-label col-sm-3 margin_left">Category</label>
                        <div class="col-sm-9" id='getcategory' style='padding: 0 0 0 6px;'>
                            <?php   
                                $selected_cat = $event['category_id'];
                            foreach($cat as $c):
                                $options = array(
                                    $c['category_id'] =>$c['category_name']
                                );
                            ?>
                          <label class="checkbox-inline col-sm-4" style="margin-left: 0px;">
                            <?php
                                echo $this->Form->select(
                                    'cat.category_id',
                                    $options,
                                    array(
                                        'label'=>false,
                                        'class'=>'pl-0 edit_category',
                                        'multiple'=>'checkbox',
                                        'hiddenField' => false,
                                        'value'=>$selected_cat
                                    )
                                ); ?>
                            </label>
                            <?php
                            endforeach;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12"> 
                        <div class="form-group col-sm-6">
                            <label class="control-label col-sm-6 ml-0 p-0">Start Date</label>
                            <div class="input-group date col-sm-6" id="start" style="padding-left: 11px;">
                                <input name="data[data][start_date]" type="text"  class="form-control input-sm" tabindex ='6' value="<?php echo $event['start_date']; ?>" required id="start_date" aria-describedby="start_date_btn">
                                <span class="input-group-btn" id="start_date_btn">
                                    <button class="btn default btn-sm picker" type="button">
                                        <i class="fa fa-calendar" ></i>
                                    </button>
                                </span> 
                            </div>
                        </div>
                        <div class="form-group col-sm-6">
                            <label class="control-label col-sm-5 ml-0 p-0">Start Time</label>
                            <div class="input-group time col-sm-6" style="padding-left: 12px;">
                                <input name="data[data][start_time]" readonly type="text" class="form-control input-sm disTime" tabindex ='7' id="start_time" value="<?php echo $event['start_time']; ?>" required aria-describedby="start_time_btn">
                                 <span class="input-group-btn">
                                        <button class="btn default btn-sm picker" type="button" id="end_time_btn">
                                            <i class="fa fa-clock-o"></i>
                                        </button>
                                    </span>
                                                        
                            </div>                              
                        </div> 
                    </div>
                    <div class="col-sm-12"></div> 
                </div>
                <div class="row">
                    <div class="col-sm-12">                        
                        <div class="form-group col-sm-6">
                            <label class="control-label col-sm-6 ml-0 p-0">End Date</label>
                            <div class="input-group date col-sm-6" id="end" style="padding-left: 11px;"> 
                                <input name="data[data][end_date]" type="text" class="form-control input-sm" id="end_date" tabindex ='7' value="<?php echo $event['end_date']; ?>" aria-describedby="end_date_btn">
                                <span class="input-group-btn" id="end_date_btn">
                                    <button class="btn default btn-sm picker" type="button">
                                        <i class="fa fa-calendar"></i>
                                    </button>
                                </span>
                            </div>
                        </div>                   
                        <div class="form-group col-sm-6">
                            <label class="control-label col-sm-5 ml-0 p-0">End Time</label>
                            <div class="input-group time col-sm-6" style="padding-left: 12px;">
                                <input name="data[data][end_time]" readonly type="text" class="input-sm form-control disTime" tabindex ='8' id="end_time"
                                 value="<?php echo $event['end_time']; ?>" required>   
                                  <span class="input-group-btn">
                                        <button class="btn default btn-sm picker" type="button" id="end_time_btn">
                                            <i class="fa fa-clock-o"></i>
                                        </button>
                                    </span>                      
                            </div>                              
                        </div> 
                    </div>
                    <div class="col-sm-12"></div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label class="control-label col-sm-3 ml-0">Venue</label> 
                        <div class="col-sm-7 pad-left-11">
                            <input name="data[data][venue]" type="text" id="venue" class="form-control input-sm" autocomplete="off" maxlength="32" value="<?php echo $event['venue']; ?>" required>
                        </div>
                        <div class="col-sm-3 charDisp" id="venue_char_disp">
                            <small>
                                <span id="venue_char">32</span>
                                <span>&nbsp;Characters Remaining</span>
                            </small> 
                        </div>                          
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label class="control-label col-sm-3 ml-0">Location</label> 
                        <div class="col-sm-7 pad-left-11">
                             <input name="data[data][event_address]" type="text" tabindex ='9' id="event_address" class="form-control input-sm" onclick="initialize()" onfocusout="codeAddress()" autocomplete='off' value="<?php echo $event['event_address']; ?>" required>                
                        </div>                          
                        <div style="margin-top: 5px;">
                            <a href="javascript:;" class="button" id='map' style="color:#dd4e4e;"><i class="fa fa-map-marker"></i> Point On map</a>
                        </div>
                        <?php 
                            echo $this->Form->input(
                                'data.event_latitude',
                                array('label'=>'Event Latitude',
                                    'id'=>'lat',
                                    'type'=>'hidden',
                                    'value'=>$event['event_latitude']
                                )
                            );
                            
                            echo $this->Form->input(
                                'data.event_longitude',
                                array('label'=>'Event Longitude',
                                    'id'=>'lng',
                                    'type'=>'hidden',
                                    'value'=>$event['event_longitude']
                                )
                            );
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group ml-0" style="margin-left:-25px;">
                            <label class="control-label col-sm-3 ml-0 p-0">Who Can Attend</label>
                            <div class="col-sm-3 ml-0 pl-0" style="margin-left:-4px;">
                                <?php 
                                    echo $this->Form->input(
                                        'data.audience',
                                    array('label' => false,
                                        'id'=>'audience',
                                        'class'=>'form-control input-sm',
                                        'required'=>true,
                                        'options' => array(
                                           'Everyone'=>'Everyone',
                                         'Members Only'=>'Members Only',
                                         'Invitation Only'=>'Invitation Only'
                                            ),
                                            'value' =>$event['audience'] 
                                        )
                                    );
                                ?> 
                            </div>
                        </div>
                    </div>
                </div>
            
            
                <p class="bg-primary" style="width: 104%; margin-left: -13px; padding-left: 13px;">Photos For Gallery</p> 
                 <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="control-label ml-0 col-sm-6">Header Photo</label>
                            <div class="col-sm-4 file-top">
                                <input type="file" name="data[photo][event_photo]" title="Upload a Photo Max. 2MB" id="event_photo" tabindex ='13'>
                                <input type="hidden" name="data[data][event_photo]" id="event_photo_path" value="<?php echo $event['event_photo']; ?>" class="form-control">    
                            </div>
                        </div>  
                    </div>
                    <div class="col-sm-6">                    
                        <div id="event_photo_loader" class="loader">
                        </div>
                        <div id="event_photo_output" class="loader">
                        </div> 
                        <?php 
                            $image = $event['event_photo'];

                            $display = "style='display:block'";
                            if($image==""): 
                              $display="style='display:none'";
                            endif;
                        ?>
                            <div class='loader ml-0'>
                                <a href="<?php echo $image; ?>" 
                                id="event_photo_link" <?php echo $display; ?> class="test-popup-link thumbnail">
                                  <img id="event_photo_display" src="<?php echo $image; ?>" alt="...">
                                </a>
                            </div>
                       
                    </div>                  
                </div>
 <?php
for ($i = 1; $i <= 10; $i++) {
    $image_id = 'photo_'.$i;    
    $image = $event[$image_id];
    if($image!=""){ ?>
        <div class="row">    
            <div class="col-sm-6">
                <div class="form-group pl-15 pr-15">
                    <label class="control-label ml-0 col-sm-6"><?php echo $image_id;?></label>
                    <div class="col-sm-4 file-top">
                        <input type="file" name="data[photo]<?php echo $image_id;?>" id="<?php echo $image_id;?>" title="Upload a Photo Max. 2MB (optional)">
                        <input type="hidden" name="data[data]<?php echo $image_id;?>" id="<?php echo $image_id;?>_path" class="form-control" value="<?php echo $image; ?>">
                    </div>
                </div>
            </div>
         
           <div class="col-sm-6">
                <div id="<?php echo $image_id;?>_loader" class="loader"></div>
                <div id="<?php echo $image_id;?>_output" class="loader"></div>
                <?php 
                    $display = "style='display:block'";
                    if($image==""): 
                        $display="style='display:none'";
                    endif;
                ?>
                <div class="col-xs-6 col-md-3 loader" >
                    <a id="<?php echo $image_id; ?>_remove" <?php echo $display; ?> >Remove Image
                                        </a>
                    <a href="<?php echo $image_id; ?>" <?php echo $display; ?>  id="<?php echo $image_id; ?>_link"  class="test-popup-link thumbnail">
                         <img id="<?php echo $image_id; ?>_display" src="<?php echo $image; ?>" alt="...">
                    </a>
                </div>
            </div>
        </div>      
    <?php } else{
        echo "Not present";
        echo $image_id; ?>
       
<?php    }

} 

 ?>               
            <!--    <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group pl-15 pr-15">
                            <label class="control-label ml-0 col-sm-6">Photo 1</label>
                            <div class="col-sm-4 file-top">
                                <input type="file" name="data[photo][photo_1]" id="photo_1" title="Upload a Photo Max. 2MB (optional)">
                                <input type="hidden" name="data[data][photo_1]" id="photo_1_path" class="form-control" value="<?php echo $event['photo_1']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div id="photo_1_loader" class="loader">
                        </div>
                        <div id="photo_1_output" class="loader"></div>
                        <?php 
                            $image = $event['photo_1'];

                            $display = "style='display:block'";
                            if($image==""): 
                                $display="style='display:none'";
                            endif;
                        ?>
                        <div class='col-xs-6 col-md-3 loader'>
                            <a id="photo_1_remove" <?php echo $display; ?> >Remove Image
                            </a>
                            <a href="<?php echo $image; ?>" <?php echo $display; ?> 
                               id="photo_1_link" class="test-popup-link thumbnail">
                                  <img id="photo_1_display" src="<?php echo $image; ?>" >
                            </a>
                        </div>                                  
                    </div>                                  
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group pl-15 pr-15">
                            <label class="control-label ml-0 col-sm-6">Photo 2</label>
                            <div class="col-sm-4 file-top">
                                <input type="file" name="data[photo][photo_2]" id="photo_2" title="Upload a Photo Max. 2MB (optional)">
                                <input type="hidden" name="data[data][photo_2]" id="photo_2_path" class="form-control" value="<?php echo $event['photo_2']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div id="photo_2_loader" class="loader">
                        </div>
                        <div id="photo_2_output" class="loader"></div>
                        <?php 
                            $image = $event['photo_2'];

                            $display = "style='display:block'";
                            if($image==""): 
                                $display="style='display:none'";
                            endif;
                        ?>
                        <div class='col-xs-6 col-md-3 loader'>
                            <a id="photo_2_remove" <?php echo $display; ?> >Remove Image
                            </a>
                            <a href="<?php echo $image; ?>" <?php echo $display; ?> 
                               id="photo_2_link" class="test-popup-link thumbnail">
                                  <img id="photo_2_display" src="<?php echo $image; ?>" >
                            </a>
                        </div>                                  
                    </div>                                  
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group pl-15 pr-15">
                            <label class="control-label ml-0 col-sm-6">Photo 3</label>
                            <div class="col-sm-4 file-top">
                                <input type="file" name="data[photo][photo_3]" id="photo_3" title="Upload a Photo Max. 2MB (optional)">
                                <input type="hidden" name="data[data][photo_3]" id="photo_3_path" class="form-control" value="<?php echo $event['photo_3']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div id="photo_3_loader" class="loader">
                        </div>
                        <div id="photo_3_output" class="loader"></div>
                        <?php 
                            $image = $event['photo_3'];

                            $display = "style='display:block'";
                            if($image==""):
                                 $display="style='display:none'";
                            endif;
                             ?>
                            <div class='col-xs-6 col-md-3 loader'>
                            <a id="photo_3_remove" <?php echo $display; ?>  >Remove Image
                                 </a>

                                <a href="<?php echo $image; ?>" <?php echo $display; ?> id="photo_3_link" class="test-popup-link thumbnail">
                                  <img id="photo_3_display" src="<?php echo $image; ?>" alt="...">
                                </a>
                            </div>                                   
                    </div>                              
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group pl-15 pr-15">
                            <label class="control-label ml-0 col-sm-6 ">Photo 4</label>
                            <div class="col-sm-4 file-top">
                                <input type="file" name="data[photo][photo_4]" id="photo_4" title="Upload a Photo Max. 2MB (optional)">
                                <input type="hidden" name="data[data][photo_4]" id="photo_4_path" class="form-control" value="<?php echo $event['photo_4']; ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div id="photo_4_loader" class="loader">
                        </div>
                        <div id="photo_4_output" class="loader"></div>
                        <?php 
                            $image = $event['photo_4'];

                            $display = "style='display:block'";
                            if($image==""):
                                 $display="style='display:none'";
                            endif;
                        ?>
                        <div class='col-xs-6 col-md-3 loader'>
                            <a id="photo_4_remove" <?php echo $display; ?>  >Remove Image
                            </a>
                            <a href="<?php echo $image; ?>" <?php echo $display; ?> id="photo_4_link" class="test-popup-link thumbnail">
                                  <img id="photo_4_display" src="<?php echo $image; ?>" alt="...">
                            </a>
                        </div>                                   
                    </div> 
                </div>-->
            </div>    <!-- add-child -->
        </div><!-- panel-body -->
        <?php 
         $image = $event[$image_id];
        for ($i = 1; $i <= 10; $i++) {
    $image_id = 'photo_'.$i;   
   
}
    if($image!=""){ ?>
    
   <?php } else{
        //echo "Not present";
        //echo $image_id;
    ?>
        <center><a href="javascript:;" onClick="addInput('dynamicInput');">Add more photos</a></center> 
       
<?php    }
?>
        
    </div>
    <!-- </div>  -->

    
    <div id="org" class="panel panel-info">
        <div class="panel-heading">
            <b>Organizer Details</b>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label col-sm-5 left-24">Organizer Logo</label>
                        <div class="col-sm-6 file-top">
                            <input type="file" name="data[photo][organizer_logo]" title="Upload a Photo Max. 2MB" id="organizer_logo">
                            <div class="form-group">
                                <input type="hidden" name="data[data][organizer_logo]" id="organizer_logo_path" class="form-control" value="<?php echo $event['organizer_logo']; ?>">   
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="col-sm-6">
                    <div id="organizer_logo_loader" class="loader">
                    </div>
                    <div id="organizer_logo_output" class="loader"></div>
                    <?php 
                        $image = $event['organizer_logo'];
                        $display = "style='display:block'";
                        if($image==""):
                             $display="style='display:none'";
                        endif;

                         ?>
                        <div class='col-xs-6 col-md-3 loader'>
                        <a id="organizer_logo_remove" <?php echo $display; ?>  >Remove Image
                             </a>
                           <a href="<?php echo $image; ?>" <?php echo $display; ?> id="organizer_logo_link" class="test-popup-link thumbnail">
                              <img id="organizer_logo_display" src="<?php echo $image; ?>" alt="...">
                            </a>
                        </div>                                
                </div>                   
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label col-sm-5 pl-15 left-24" style="padding-left: 0px;">Organizer Name</label>
                        <div class="col-sm-6 pad-left-4">
                            <input name="data[data][organizer_name]" class="form-control input-sm" id="organizer_name" value="<?php echo $event['organizer_name']; ?>" title="Enter Organizer Name" maxlength="32" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label ml-0 col-sm-4">Contact No.</label>
                        <div class="col-sm-7" style="padding-right:0;">
                            <input name="data[data][organizer_contact]" class="form-control input-sm" value="<?php echo $event['organizer_contact']; ?>" title="Enter Organizer Contact No." id="organizer_contact" maxlength="10" tabindex ='19' type="text">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">                
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label pl-15 col-sm-5 left-24" style="padding-left: 0px;">About Organizer</label>
                        <div class="col-md-6 pad-left-4">
                            <textarea tabindex="20" class="form-control input-sm" title="Enter Short Description about Organizer" name="data[data][organizer_about]" style="resize: vertical; margin-top: 0px; margin-bottom: 5px; height: 68px;" rows="3" id="organizer_about"><?php echo $event['organizer_about']; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label class="control-label ml-0 col-sm-4">Website</label>
                        <div class="col-sm-7" style="padding-right:0;">
                            <input name="data[data][organizer_website]" value="<?php echo $event['organizer_website']; ?>" class="form-control input-sm" title="Enter Organizer Website" tabindex ='21' id="organizer_website" type="url" >
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div> 
    <div class="panel panel-info" id="notification">
        <div class="panel-heading">
            <b>Notifications</b>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6">                  
                    <div class='form-group'>
                        <label class="control-label col-md-5 left-24" tabindex ='23'>Notify?</label>
                        <div class="col-md-6 pad-left-4">
                            <label class="radio-inline" style="margin-left:0;">
                                <input type="radio" name="data[data][notif]" id="optionsRadiosInline1" value="y" <?php if($event['notif']=='y'){echo 'checked';} ?>>Yes
                            </label>
                            <label class="radio-inline" style="margin-left:0;">
                                <input type="radio" name="data[data][notif]" id="optionsRadiosInline2" value="n" <?php if($event['notif']=='n'){echo 'checked';} ?> >No
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group col-sm-6">
                        <label class="control-label ml-0 p-0 col-sm-6">Date</label>
                        <div class="input-group p-0 date col-sm-6" id="notif" style="padding-left: 12px;">  
                            <input name="data[data][notif_date]" type="text"  class="form-control input-sm" value="<?php echo $event['notif_date']; ?>" id="notif_date" aria-describedby="notif_date_btn" readonly>
                            <span class="input-group-btn">
                                <button class="btn default btn-sm picker" type="button" id="notif_date_btn">
                                    <i class="fa fa-calendar" ></i>
                                    </button>
                            </span>                             
                        </div>
                    </div>
                    <div class="form-group col-sm-6">
                        <label class="control-label ml-0 p-0 col-sm-5"> Time</label>
                        <div class="input-group time p-0 col-sm-6" style="padding-left: 12px;">
                            <input name="data[data][notif_time]" readonly type="text" class="form-control input-sm" value="<?php echo $event['notif_time']; ?>" id="notif_time" aria-describedby="notif_time_btn">
                                <span class="input-group-btn">
                                    <button class="btn default btn-sm picker" type="button" id="notif_time_btn">
                                        <i class="fa fa-clock-o"></i>
                                    </button>
                                </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">                        
                </div>              
            </div>  
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label ml-0 col-md-3">Message</label>
                        <div class="col-sm-9 pad-left-4" >
                            <textarea tabindex="26"  class="form-control input-sm" title="Message to be sent in Notification" name="data[data][notif_msg]" value="" style="resize: vertical; margin-top: 0px; margin-bottom: 5px; height: 68px;width:66%;float:left" rows="3" maxlength="140" id="notif_msg"><?php echo $event['notif_msg']; ?></textarea>   
                            <span class="help-block" style="float:right;">Characters Remaining &nbsp;<div id="notif_msg_char" style="float:right;">140</div></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="process" style="display:none;">
        <div class="mask">
        </div>
        <div id="loading" >input-sm
                <?php echo $this->Html->image('ajax-white.gif'); ?>
        </div>
    </div>    
    <center>
        <?php  
            echo $this->Form->button('Update Event',array('class'=>'btn btn-success',
                                                    'tabindex'=>'27',
                                                'style'=>'width:25%;margin-bottom:10px;',
                                                    'id'=>'submit'
                                            )
            );
        ?>
    </center>
</div>
    <?php echo $this->Form->end(); 
        echo $this->Html->script(array('bootstrap-datepicker',
                                        'custom/datepic',
                                        'clockface',
                                        'main_maps_file',
                                        'gmaps',
                                        'custom/plan',
                                        'custom/image-upload',
                                        'custom/ajax/edit',
                                        'jquery.magnific-popup'
                                )
        );  
    ?>
<script>
    $('#map').click(function(){
        $('#myModal').modal({
            backdrop:true
        });
    });
    $('#myModal').on("shown.bs.modal", function () {
        var lat = parseFloat($('#lat').val());
        var lng = parseFloat($('#lng').val());
          google.maps.event.trigger(map, 'resize');
        if(lat&&lng){
          map.setCenter(new google.maps.LatLng(lat, lng));
        }else{
            map.setCenter(new google.maps.LatLng(21.1610859, 79.0725101));
        }

    });
</script> 
<script>
    $('.test-popup-link').magnificPopup({ 
  type: 'image'
    // other options
    });
</script>          


<script >
var counter = 4;
var limit = 10;
function addInput(divName){ 
     if (counter == limit)  {
          alert("Maximum upload limit " + counter);
     }
     else {
          var rowdiv = document.createElement('div');
          rowdiv.setAttribute("class", "row");

          var colfirstdiv = document.createElement('div');
          colfirstdiv.setAttribute("class", "col-sm-6 1");

          var colseconddiv = document.createElement('div');
          colseconddiv.setAttribute("class", "col-sm-6 2");

          var colthirddiv = document.createElement('div');
          colthirddiv.setAttribute("class", "form-group");

var photoloader ="photo_"+(counter+1)+"_loader";
var photooutput ="photo_"+(counter+1)+"_output";

          var colfifthdiv = document.createElement('div');
          colfifthdiv.setAttribute("id", photoloader);
          colfifthdiv.setAttribute("class", "loader");

          var colsixthdiv = document.createElement('div');
          colsixthdiv.setAttribute("id", photooutput);
          colsixthdiv.setAttribute("class", "loader");

          var colseventhdiv = document.createElement('div');
          colseventhdiv.setAttribute("class", "col-xs-6 col-md-3 loader");

          rowdiv.appendChild(colfirstdiv);
          rowdiv.appendChild(colseconddiv);
          colfirstdiv.appendChild(colthirddiv);
          colseconddiv.appendChild(colfifthdiv);   
          colseconddiv.appendChild(colsixthdiv);
          colseconddiv.appendChild(colseventhdiv);
         
          colthirddiv.innerHTML += "<label class='control-label col-sm-6 desc'>Photo " + (counter + 1) + " </label>";

          var colforthdiv = document.createElement('div');
          colforthdiv.setAttribute("class", "col-sm-4 file-top");

          colthirddiv.appendChild(colforthdiv);

          colforthdiv.innerHTML = '<input type="file" name="data[photo][photo_'+ (counter + 1) +']" id="photo_'+ (counter + 1) +'" tabindex ="19" title="Upload a Photo Max. 2MB (optional)">';
          colforthdiv.innerHTML += '<input type="hidden" name="data[data][photo_'+ (counter + 1) +']" id="photo_'+ (counter + 1) +'_path" class="form-control">';
          

        colseventhdiv.innerHTML =" <a id='photo_"+(counter+1)+"_remove' <?php echo $display; ?>  >Remove Image</a>";

        var alink = document.createElement('a');
        alink.setAttribute('class','test-popup-link thumbnail');
        alink.setAttribute('id','photo_'+(counter+1)+'_link');
        alink.setAttribute('href','<?php echo $image; ?>');
        alink.setAttribute('style',<?php echo $display; ?>);

        colseventhdiv.appendChild(alink);

        alink.innerHTML = "<img id='photo_"+(counter+1)+"_display' src='<?php echo $image; ?>' alt='...'>";

        
                            

          document.getElementById('add-child').appendChild(rowdiv);
          counter++;
     }
}
</script>
