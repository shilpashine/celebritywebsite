
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                  
                     <div class="portlet light form-fit">
                                    
                                       
                                       
                                  
                                </div>
                      
                        <div class="row">
                                <div class="col-md-6" id="show_data">
                                    <!-- BEGIN VALIDATION STATES-->
                                    <div class="portlet light portlet-fit portlet-form bordered">
                                        
                                        <div class="portlet-body">
                                            <!-- BEGIN FORM-->
                                             <form action="updateData" id="form_sample_2" method="post" enctype="multipart/form-data"> 
                                                 <?php $event_data= json_decode($data_all_event); ?>
                                           <input type="hidden" name="edit_user_id" value="<?php echo $event_data->id;?>"/>                  
                                            <div class="form-body">
                                                <div class="form-group form-md-line-input">
                                                    <input type="text" class="form-control" name="event_title" required="" id="form_control_1" placeholder="Enter your Name" value="<?php echo $event_data->event_title;?>">
                                                    <label for="form_control_1"> Event Title
                                                        <span class="required">*</span>
                                                    </label>
                                                    <span class="help-block">Enter Event Title...</span>
                                                </div>
                                                
                                                
                                                  <div class="form-group">
                                                    <label class="control-label col-md-6">Select Event Celebrity
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="form-group form-md-line-input">
                                                       <?php // pr($event_data->event_celebrities);exit; 
                                                       $arr1=array();
                                                       ?>
                                                        
                                                          <?php    foreach($event_data->event_celebrities as $val){
                                                                                    
                                                                          array_push($arr1, $val->celebrity_id);
                                                                                    
                                                                                }  
                                                                                
                                                                            //  pr($arr1);exit;
                                                                                ?>
                                                        <select class="form-control" name="event_celebrity[]" multiple>
                                                            
                                                       <?php      if(isset($cel_datas)){
                                                         
                                                                    $cel_datas11=json_decode($cel_datas);
                                                                  
                                                                    foreach($cel_datas11 as $cel_datas11){
                                                                                                    
                                                                                                    ?>
                                                                                               
                                                                                                
                                                            <option value="<?php echo $cel_datas11->id;?>"  <?php if(in_array($cel_datas11->id,$arr1)){ echo 'selected'; } else{ } ?>><?php echo $cel_datas11->name;?></option>
                                                            <?php  }  }
                                                                                                ?>
                                                            
                                                        </select>
                                                        <button type="button" class="btn green" data-toggle="modal" data-target="#myModal">Add More Celebrity</button>
                                                    </div>
                                                </div>
                                                
                                                
                                               <div class="form-group form-md-line-input">
                                                    <textarea class="form-control" id="form_control_1" name="description" required=""> <?php if(isset($event_data->event_description)){ echo $event_data->event_description; }?></textarea>
                                                    
                                                </div>
                                              
                                                  <div class="form-group form-md-line-input">
                                                      <input type="text" class="form-control" name="event_location" required="" id="autocomplete" placeholder="Enter your Name" value=" <?php  if(isset($event_data->event_location)){ echo $event_data->event_location; }?>">
                                                    <label for="form_control_1"> Event Location
                                                        <span class="required">*</span>
                                                    </label>
                                                    <span class="help-block">Enter Event Location...</span>
                                                </div>
                                                <div class="form-group form-md-line-input">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-map"></i>
                                                        </span>
                                                        <input type="text" class="form-control" name="event_country" id="country" autocomplete="on" placeholder="Enter Country" value="<?php   if(isset($event_data->event_country)){ echo $event_data->event_country; } ?>" >
                                                        <label for="form_control_1">Event Country</label>
                                                    </div>
                                                </div>
                                                
                                                
                                                 <div class="form-group form-md-line-input">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-map"></i>
                                                        </span>
                                                        <input type="text" class="form-control" name="event_city" id="locality" placeholder="Enter City"  value="<?php   if(isset($event_data->event_city)){ echo $event_data->event_city; } ?>">
                                                        <label for="form_control_1">Event City</label>
                                                    </div>
                                                </div>
                                                  
                                                 <div class="form-group form-md-line-input">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-map"></i>
                                                        </span>
                                                        <input type="text" class="form-control" name="event_pincode" id="postal_code" autocomplete="on" placeholder="Enter Pincode"  value="<?php   if(isset($event_data->event_pincode)){ echo $event_data->event_pincode; } ?>">
                                                        <label for="form_control_1">Event Pincode</label>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group form-md-line-input">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-flag"></i>
                                                        </span>
                                                        <input type="text" class="form-control" name="event_lat" id="lat" autocomplete="on" placeholder="Enter latitude" value="<?php   if(isset($event_data->lat)){ echo $event_data->lat; } ?>" >
                                                        <label for="form_control_1">Event latitude</label>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group form-md-line-input">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-flag"></i>
                                                        </span>
                                                        <input type="text" class="form-control " name="event_long" id="lng" autocomplete="on" placeholder="Enter longitude" value="<?php   if(isset($event_data->lang)){ echo $event_data->lang; } ?>" >
                                                        <label for="form_control_1">Event longitude</label>
                                                    </div>
                                                </div>
                                                
                                                 <div class="form-group form-md-line-input">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                        <input type="text" class="form-control date-picker11" name="event_startdate" placeholder="Enter Startdate" value="<?php   if(isset($event_data->approx_start_date)){  $st_date=explode('T',$event_data->approx_start_date); echo $st_date[0]; } ?>">
                                                        <label for="form_control_1">Event Start Date</label>
                                                    </div>
                                                </div>
                                                
                                                
                                                 <div class="form-group form-md-line-input">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                        <input type="text" class="form-control date-picker11" name="event_enddate" placeholder="Enter Enddate" value="<?php   if(isset($event_data->approx_end_date)){  $event_data->approx_end_date; $st_date=explode('T',$event_data->approx_end_date); echo $st_date[0]; } ?>">
                                                        <label for="form_control_1">Event End Date</label>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group form-md-line-input">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                        <input type="text" class="form-control" name="event_starttime" placeholder="Enter Starttime"  value="<?php   if(isset($event_data->start_time)){ echo $event_data->start_time; } ?>">
                                                        <label for="form_control_1">Event Start Time</label>
                                                    </div>
                                                </div>
                                                
                                                
                                                 <div class="form-group form-md-line-input">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                        <input type="text" class="form-control " name="event_endtime" placeholder="Enter Endtime"  value="<?php   if(isset($event_data->end_time)){ echo $event_data->end_time; } ?>">
                                                        <label for="form_control_1">Event End Time</label>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="form-group ">
                                                    <div class="input-group">
                                                        
                                                          <label for="form_control"> Event Type</label>
                                                          
                                                           <br/>
                                                          
                                                        <select name="event_type" name="event_type" class="form-control">
                                                            <option value="1" <?php if($event_data->event_type==1){ echo "selected"; }?>>Public</option>
                                                               <option value="2" <?php if($event_data->event_type==2){ echo "selected"; }?>>Private</option>
                                                        </select>
                                                       
                                                        
                                                        
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                                <div class="form-group form-md-line-input">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-tag"></i>
                                                        </span>
                                                        <input type="text" class="form-control" name="event_amount" placeholder="Enter Amount" value="<?php   if(isset($event_data->event_amount)){ echo $event_data->event_amount; } ?>">
                                                        <label for="form_control_1">Event Amount</label>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="form-group form-md-line-input">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-tag"></i>
                                                        </span>
                                                        <input type="text" class="form-control" name="event_target_amount" placeholder="Enter Target Amount"  value="<?php   if(isset($event_data->target_amount)){ echo $event_data->target_amount; } ?>">
                                                        <label for="form_control_1">Event Target Amount</label>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                              
                                                 <div class="form-group">
                                                      <label for="form_control">Is Seats Count</label>
                                                        
                                                      <input type="checkbox"  name="is_seats" value="1" id="is_seats" value="seats" onclick="seats_details()" <?php if($event_data->is_seat==1) { echo "checked"; }?>>
                                                      
                                                    
                                                </div>
                                                
                                                <div class="form-group form-md-line-input" id="payment_check" name="no_seat" <?php if($event_data->is_seat!=1) { ?> style="display: none; " <?php } ?>>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-tag"></i>
                                                        </span>
                                                        <input type="text" class="form-control " name="event_seats" placeholder="Enter Seats" value="<?php   if(isset($event_data->seats)){ echo $event_data->seats; } ?>" >
                                                        <label for="form_control_1">Event No Seats</label>
                                                    </div>
                                                </div>
                                                <div class="form-group form-md-line-input">
                                                    <textarea class="form-control" id="form_control_1" name="terms" required=""> <?php   if(isset($event_data->terms)){ echo $event_data->terms; } ?> </textarea>
                                                    
                                                </div>
                                               
                                                 <div class="form-group">
                                                    <label class="control-label col-md-6">Select Event Category
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="form-group form-md-line-input">
                                                       
                                                        
                                                        
                                                         <?php  //pr($event_data->event_categories);exit; 
                                                       $arr2=array();
                                                        foreach($event_data->event_categories as $val2){
                                                                                    
                                                                          array_push($arr2, $val2->category_id);
                                                                                    
                                                                                }  
                                                                                
                                                                         //     pr($arr2);exit;
                                                                                ?>
                                                        <select class="form-control" name="category_id[]" multiple>
                                                            
                                                       <?php      if(isset($data_all)){
                                                         
                                                                    $data_all11=json_decode($data_all);
                                                                    foreach($data_all11 as $category_datas){
                                                                                                    
                                                                                                    ?>
                                                                                               
                                                                                                
                                                            <option value="<?php echo $category_datas->id;?>"  <?php if(in_array($category_datas->id,$arr2)){ echo 'selected'; } else{ } ?>><?php echo $category_datas->category_name;?></option>
                                                            <?php  }  }
                                                                                                ?>
                                                            
                                                        </select>
                                                       
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="form-group">
                                                    <label class="control-label col-md-6">Select Event Organizer
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="form-group form-md-line-input">
                                                        
                                                          <?php  //pr($event_data->event_categories);exit; 
                                                       $arr3=array();
                                                        foreach($event_data->event_organizers as $val3){
                                                                                    
                                                                          array_push($arr3, $val3->organizer_id);
                                                                                    
                                                                                }  
                                                                                
                                                                         //     pr($arr2);exit;
                                                                                ?>
                                                        
                                                        
                                                       <?php  //pr($celebrity_datas);exit; ?>
                                                        <select class="form-control" name="event_org_id[]" multiple>
                                                            
                                                       <?php      if(isset($celebrity_datas12)){
                                                         
                                                                    $data_all11=json_decode($celebrity_datas12);
                                                                  
                                                                    foreach($data_all11 as $category_datas){
                                                                                                    
                                                                                                    ?>
                                                                                               
                                                                                                
                                                            <option value="<?php echo $category_datas->id;?>"  <?php if(in_array($category_datas->id,$arr3)){ echo 'selected'; } else{ } ?>><?php echo $category_datas->fname;?></option>
                                                            <?php  }  }
                                                                                                ?>
                                                            
                                                        </select>
                                                       
                                                    </div>
                                                </div>
                                                
                                               
                                                
                                                 <div class="form-group">
                                                    <label class="control-label col-md-6">Select Event Images
                                                        <span class="required"> * </span>
                                                    </label>
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="input-group input-large">
                                                               
                                                                <span class="">
                                                                 
                                                                   
                                                                    <input type="file" name="image[]" multiple="" >
                                                                   <input type="hidden" name="count_image" id="count_image" value="<?php echo  count($event_data->event_photos);?>"/>
                                                                    <?php     foreach($event_data->event_photos as $val){
                                                                                    
                                                                          
                                                                                ?>
                                                                    <div id="image_id<?php echo $val->id;?>">
                                                                    <div class="col-md-4">
                                                                      
                                                                    <?php  echo $this->Html->image("medium/".$val->image, ['alt' => 'event','class'=>'logo-default','height'=>'40px','width'=>'80px']);?>
                                                                        <i class="fa fa-window-close" aria-hidden="true" onclick="delete_div('<?php echo $val->id;?>')"></i>
                                                                    </div>
                                                                    </div>
                                                                <?php  }  
                                                                                
                                                                           //     pr($arr1);exit;
                                                                               
                                                                ?>
                                                                
                                                                
                                                                
                                                                
                                                                </span>
                                                                   </div>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="form-group form-md-line-input">
                                    <input type="hidden" id="div_url_count" value="<?php echo count($event_data->event_videos);?>"/>
                                 <?php    foreach($event_data->event_videos as $val){ ?>
                                                           <div id="id_url<?php echo $val->id;?>">
                                                        <input type="text" class="form-control" name="video_url[]" id="form_control_1" value="<?php echo $val->video_url;?>"  placeholder=" Enter Video Url">
                                                        <input type="button" class="btn green" name="submit" value="Delete" onclick="delete_url('<?php echo $val->id;?>')"/></div>
 <?php } ?>             
                                                        <div id="url"></div>
                                                    <button type="button" class="btn default" onclick="video_url1()">Add More Event Video Url</button>
                                                </div>
                                                
                                                
                                                <div class="form-group form-md-line-input">
                                                  <input type="hidden" id="div_url_count" value="<?php echo count($event_data->event_ticket_details);?>"/>
                                                   <?php   $i=0; foreach($event_data->event_ticket_details as $val){  ?>
                                                  <div id="ticket_url<?php echo $val->id;?>">
                                                  <label> ADD Ticket Type </label>
                                                        <input type="text" class="form-control" name="ticket_name[]" id="form_control_1"  value="<?php echo $val->ticket_name; ?>" placeholder=" Enter Ticket Name">
                                                         <input type="text" class="form-control" name="ticket_desc[]" id="form_control_1"  value="<?php echo $val->ticket_desc; ?>" placeholder=" Enter Ticket Description">
                           <input type="text" class="form-control" name="ticket_color[]" id="form_control_1"  value="<?php echo $val->ticket_color; ?>" placeholder=" Enter Ticket Color">

                                                         
                                                         <input type="text" class="form-control" name="ticket_qty[]" id="form_control_1" value="<?php echo $val->ticket_qty; ?>"  placeholder=" Enter Ticket Qty">
                                                              <input type="text" class="form-control" name="ticket_price[]" id="form_control_1" value="<?php echo $val->ticket_price; ?>"  placeholder=" Enter Ticket Price">
                                                              <?php if($i>0){?>
                                                   <input type="button" class="btn green" name="submit" value="Delete" onclick="delete_url_ticket('<?php echo $val->id;?>')"/>
                                                              <?php } ?>
                                                </div>

 <?php $i++;} ?>
                                                        <div id="url_ticket"></div>
                                                    <button type="button" class="btn default" onclick="video_url()">Add More Ticket Type</button>
                                                </div>
                                                
                                                
                                            </div>
<!--                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="submit" class="btn green" name="submit" value="Submit"/>
                                                        <button type="reset" class="btn default" onclick="cancel_policy()">Reset</button>
                                                    </div>
                                                </div>
                                            </div>-->
                                        </form>
                                            <!-- END FORM-->
                                        </div>
                                    </div>
                                    <!-- END VALIDATION STATES-->
                                </div>
                         
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>


<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Celebrity</h4>
        </div>
        <div class="modal-body">
         <form action="list_celebrity_add" id="form_sampl_cel" method="post" enctype="multipart/form-data"> 
                                            <div class="form-body">
                                                <div class="form-group form-md-line-input">
                                                    <input type="text" class="form-control" name="name" required="" id="name" placeholder="Enter your Name">
                                                    <label for="form_control_1"> Name
                                                        <span class="required">*</span>
                                                    </label>
                                                    <div id="error_edit_fname"></div>
                                                    <span class="help-block">Enter your  Name...</span>
                                                </div>
                                                
                                               
                                              
                                                <div class="form-group form-md-line-input">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                        <input type="text" class="form-control date-picker" name="dob" id="dob" placeholder="Enter Dob" >
                                                        <label for="form_control_1">Date OF Birth</label>
                                                        <div id="error_edit_lname"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group form-md-line-input">
                                                    <div class="input-group">
                                                        <select name="gendar" id="gendar" class="form-control">
                                                            <option value="1">MALE</option>
                                                               <option value="2">FEMALE</option>
                                                        </select>
                                                        <br/>
                                                          <label for="form_control_1"> Gender</label>
                                                        
                                                    </div>
                                                </div>
                                                <div class="form-group form-md-line-input">
                                                    <textarea class="form-control" id="best_at" name="best_at" required=""> Best In</textarea>
                                                    <div id="error_edit_phone_number"></div>
                                                    
                                                </div>
                                                <div class="form-group form-md-line-input">
                                                    <textarea class="form-control" id="description" name="description" required=""> Enter Description</textarea>
                                                   <div id="error_edit_pswd_token"></div>
                                                </div>
                                                <div class="form-group form-md-line-input">
                                                    <textarea class="form-control" id="form_control_1" name="home_address" required=""> Enter Home Location</textarea>
                                                   <div id="error_edit_address"></div>
                                                    
                                                    
                                                </div>
                                                 <div class="form-group form-md-line-input">
                                                    <textarea class="form-control" id="form_control_1" name="curr_address" required=""> Enter Current Location</textarea>
                                                    
                                                </div>
                                                 <div class="form-group">
                                                    <label class="control-label col-md-4">Select Category
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="form-group form-md-line-input">
                                                       
                                                        <select class="form-control" name="category_id[]" id="category_id" multiple>
                                                            
                                                       <?php      if(isset($data_all)){
                                                         
                                                                    $data_all11=json_decode($data_all);
                                                                    foreach($data_all11 as $category_datas){
                                                                                                    
                                                                                                    ?>
                                                                                               
                                                                                                
                                                            <option value="<?php echo $category_datas->id;?>"><?php echo $category_datas->category_name;?></option>
                                                            <?php  }  }
                                                                                                ?>
                                                            
                                                        </select>
                                                       
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                    <label class="control-label col-md-6">Select Celebrity Images
                                                        <span class="required"> * </span>
                                                    </label>
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="input-group input-large">
                                                               
                                                                <span class="input-group-addon btn default btn-file">
                                                                 
                                                                   
                                                                    <input type="file" name="image[]" multiple="" > </span>
                                                                   </div>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="form-group form-md-line-input">
                                                        <input type="hidden" id="div_url_count" value="1"/>
                                                        <input type="text" class="form-control" id="video1" name="video_url[]"   placeholder=" Enter Video Url">
                                                        <div id="url_cel"></div>
                                                    <button type="button" class="btn default" onclick="celebrity_video_url()">Add More Url</button>
                                                </div>
                                                <div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                      
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
<!--                                             <button type="button" class="btn default" onclick="save_celebrity()">submit</button>-->
                                        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
                <!-- END CONTENT -->
                <!-- BEGIN QUICK SIDEBAR -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

                <script type="text/javascript">
                    
                    
                    function save_celebrity(){
//                        alert('hii')
	var name=$('#name').val();
	//alert(name)
  if(name=='' || name==null){
		$("#error_edit_fname").html("Please Enter Celebrity Name");
		$("#name").focus();
	}
	else{
        
      
          $("#form_sampl_cel").submit();
          
//          $(document).on('submit','#form_sampl_cel',function(){
//              
//          });
	   //document.getElementById("form_sampl_cel").submit();
//           $("#form_sampl_cel").on('submit',function(){
//               alert('success');
//           });
           

	  
        }
	  }
                    
                         function video_url1(){
                  var div_url_count=$("#div_url_count").val();
                  var div_new_count=parseInt(div_url_count)+1;
                  $("#div_url_count").val(div_new_count);
                   $("#url").append('<div id="id_url'+div_new_count+'"><input type="text" class="form-control" name="video_url[]" id="form_control_1"  placeholder=" Enter Video Url"/> <input type="button" class="btn green" name="submit" value="Delete" onclick="delete_url11('+div_new_count+')"/> </div>')
                    
                    
		
	  }	 
                    
                    
                    
                    function video_url(){
                  var div_url_count=$("#div_ticket_url_count").val();
                  var div_new_count=parseInt(div_url_count)+1;
                  $("#div_ticket_url_count").val(div_new_count);
                   $("#url_ticket").append('<div id="id_url'+div_new_count+'">   <label> ADD Ticket Type </label><input type="text" class="form-control" name="ticket_name[]" id="form_control_1"  placeholder=" Enter Ticket Name">  <input type="text" class="form-control" name="ticket_desc[]" id="form_control_1"  placeholder=" Enter Ticket Description"><input type="text" class="form-control" name="ticket_qty[]" id="form_control_1"  placeholder=" Enter Ticket Qty"> <input type="text" class="form-control" name="ticket_price[]" id="form_control_1"  placeholder=" Enter Ticket Price"> <input type="button" class="btn green" name="submit" value="Delete" onclick="delete_url11('+div_new_count+')"/> </div>')
                    
                    
		
	  }	
            function edit_data(user_id){
                 // alert(user_id);
                    $.ajax({
				type: "POST",
				evalScripts: true,
				url: '<?php echo $this->Url->build('/admin/eventDetails/ajax_customer_edit_data', true);  ?>',
				data: ({id:user_id}),
				success: function (data){
                               //     alert(data);
				$('#show_data').html(data);
				}
		    });
                    
                    
		
	  }	
          
          
          function delete_url11(el){
              var x = confirm("Are you sure you want to delete?");
                if (x){
                   
                                      $("#id_url"+el).remove();
                              
				}
		   
                    
                    
              
             }
            function delete_ur_vel(el){
              var x = confirm("Are you sure you want to delete?");
                if (x){
                   
                                      $("#id_url_cel"+el).remove();
                              
				}
		   
                    
                    
              
             } 
             
             function delete_url(el){
              var x = confirm("Are you sure you want to delete?");
                if (x){
                 //   alert('hii')
              $.ajax({
				type: "POST",
				evalScripts: true,
				url: '<?php echo $this->Url->build('/admin/eventDetails/delete_multivideo', true);  ?>',
				data: ({id:el}),
				success: function (data){
                                  //  alert(data);
                                   
                                      $("#id_url"+el).remove();
                              
				}
		    });
                    
                    } 
              
             }
             
             function delete_url_ticket(el){
              var x = confirm("Are you sure you want to delete?");
                if (x){
                 //   alert('hii')
              $.ajax({
				type: "POST",
				evalScripts: true,
				url: '<?php echo $this->Url->build('/admin/eventDetails/delete_ticket', true);  ?>',
				data: ({id:el}),
				success: function (data){
                                  //  alert(data);
                                   
                                      $("#ticket_url"+el).remove();
                              
				}
		    });
                    
                    } 
              
             }
             
             
              function delete_div(fgd){
                 var x = confirm("Are you sure you want to delete?");
                 var count_image=$("#count_image").val();
                 var new_count=parseInt(count_image)-1;
                if (x){
                   
                   $.ajax({
				type: "POST",
				evalScripts: true,
				url: '<?php echo $this->Url->build('/admin/eventDetails/delete_multiimage', true);  ?>',
				data: ({id:fgd}),
				success: function (data){
                                    if(data==1){
                                   $("#image_id"+fgd).remove();
                                   $("#count_image").val(new_count);
                                   
                               }
				}
		    });
                    
                    }
      
  
  }function cancel_policy(){
		window.location.reload();	
			}
                        
                         $(document).ready(function(){
    $('.date-picker11').datepicker({
            startDate: '+1d',
    format: 'yyyy-mm-dd'
    
});
  } );
  
  function seats_details(){
       
            if($("#is_seats").is(":checked")){
              $("#payment_check").show();
            }
            else {
               $("#payment_check").hide();
            }
        }
        
        
        function celebrity_video_url(){
                  var div_url_count=$("#div_url_count").val();
                  var div_new_count=parseInt(div_url_count)+1;
                  $("#div_url_count").val(div_new_count);
                   $("#url_cel").append('<div id="id_url_cel'+div_new_count+'"><input type="text" id="video'+div_new_count+'" class="form-control" name="video_url[]" /> <input type="button" class="btn green" name="submit" value="Delete" onclick="delete_ur_vel('+div_new_count+')"/> </div>');
                    
                    
		
	  }	
        
        
                    </script>
                    
                       
     <script>
var autocomplete,componentForm;
       componentForm = {
        locality: 'long_name',
      
      };
    
      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            (document.getElementById('autocomplete')),
            {types: ['geocode'],componentRestrictions:{country: 'in'}},);
    
        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
       
       }
      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();
    
        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }
        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
    
    var lat=place.geometry.location.lat();
    var lng=place.geometry.location.lng();
    //var newlat=console.log(lat);
    document.getElementById('lat').value = lat;
    document.getElementById('lng').value = lng;
    
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
         for (var j = 0; j < place.address_components[i].types.length; j++) {
        if (place.address_components[i].types[j] == "postal_code") {
          document.getElementById('postal_code').value = place.address_components[i].long_name;

        }
        
        if (place.address_components[i].types[j] == "country") {
          document.getElementById('country').value = place.address_components[i].long_name;

        }
        
        
      }
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
      }
      
       function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };
        
            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
      </script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMl4BZyXV1gkjUVWDBgY00Mss1aTUYUp0&libraries=places&callback=initAutocomplete" async defer></script>
                  