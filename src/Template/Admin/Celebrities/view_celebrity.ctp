
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                  
                     <div class="portlet light form-fit">
                                    
                                       
                                     
                                  
                                </div>
                      
                        <div class="row">
                            <div class="col-md-6" id="show_data">
                                <!-- BEGIN VALIDATION STATES-->
                                <div class="portlet light portlet-fit portlet-form bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class=" icon-layers font-green "></i>
                                            <span class="caption-subject font-green sbold uppercase">View Celebrity</span>
                                        </div>
                                       
                                    </div>
                                    <div class="portlet-body">
                                        <!-- BEGIN FORM-->
                                           <form action="updateData" id="form_sample_2" method="post" enctype="multipart/form-data"> 
                                             <?php 
										$staff_data= json_decode($staff_data);
                                                                                
                                                                                $dob=explode('T',$staff_data->dob);
                                                                              //  pr($staff_data);exit;
                                                                                $arr1=array();
                                                                               
                                                                             
										?>
                     <input type="hidden" name="edit_user_id" parsley-trigger="change"  class="form-control" id="edit_user_id" value="<?php echo $staff_data->id;?>" />

                                            <div class="form-body">
                                                <div class="form-group form-md-line-input">
                                                    <input type="text" class="form-control" name="name" id="form_control_1" placeholder="Enter your Name" value="<?php echo $staff_data->name;?>" readonly="">
                                                    <label for="form_control_1"> Name
                                                        <span class="required">*</span>
                                                    </label>
                                                    <span class="help-block">Enter your  Name...</span>
                                                </div>
                                                
                                               
                                              
                                                <div class="form-group form-md-line-input">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                        <input type="text" class="form-control date-picker" name="dob" placeholder="Enter Dob" value="<?php echo $dob[0];?>" readonly=""> 
                                                        <label for="form_control_1">Date OF Birth</label>
                                                    </div>
                                                </div>
                                                <div class="form-group form-md-line-input">
                                                    <div class="input-group">
                                                        <select name="gendar" class="form-control" readonly="">
                                                             <option value="1" <?php if($staff_data->gendar=='1'){ echo 'selected';  }?>>MALE</option>
                                                               <option value="2" <?php if($staff_data->gendar=='2'){ echo 'selected';  }?>>FEMALE</option>
                                                        </select>
                                                        <br/>
                                                          <label for="form_control_1"> Gender</label>
                                                        
                                                    </div>
                                                </div>
                                                <div class="form-group form-md-line-input">
                                                    <textarea class="form-control" id="form_control_1" name="best_at" readonly=""> <?php echo $staff_data->best_at;?></textarea>
                                                      <label for="form_control_1"> Best At</label>
                                                </div>
                                                <div class="form-group form-md-line-input">
                                                    <textarea class="form-control" id="form_control_1" name="description" readonly=""> <?php echo $staff_data->description;?></textarea>
                                                      <label for="form_control_1"> Description</label>
                                                </div>
                                                <div class="form-group form-md-line-input">
                                                    <textarea class="form-control" id="form_control_1" name="home_address" readonly=""> <?php echo $staff_data->home_location;?></textarea>
                                                      <label for="form_control_1"> Home Address</label>
                                                </div>
                                                 <div class="form-group form-md-line-input">
                                                    <textarea class="form-control" id="form_control_1" name="curr_address" readonly=""><?php echo $staff_data->current_location;?></textarea>
                                                      <label for="form_control_1"> Current Address</label>
                                                </div>
                                                 <div class="form-group">
                                                    <label class="control-label col-md-4">Select Category
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="form-group form-md-line-input">
                                                         <?php    foreach($staff_data->celebrity_categories as $val){
                                                                                    
                                                                          array_push($arr1, $val->category_id);
                                                                                    
                                                                                }  
                                                                                
                                                                           //     pr($arr1);exit;
                                                                                ?>
                                                       
                                                        <select class="form-control" name="category_id[]" multiple readonly="">
                                                            
                                                      <?php
                                                                                if(isset($data_all)){
                                                         
                                                                    $data_all11=json_decode($data_all);
                                                                    foreach($data_all11 as $category_datas){
                                                                                                    
                                                                                                    ?>
                                                                                               
                                                                                                
                                                            <option value="<?php echo $category_datas->id;?>" <?php if(in_array($category_datas->id,$arr1)){ echo 'selected'; } else{ } ?>><?php echo $category_datas->category_name;?></option>
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
                                                               
                                                                <span class="">
                                                                 
                                                                   
                                                                    <input type="file" name="image[]" multiple="" >
                                                                    
<!--                                                                    <input type="hidden" name="count_image" id="count_image" value="<?php echo  count($staff_data->celebrity_photos);?>"-->
                                                                    <?php     foreach($staff_data->celebrity_photos as $val){
                                                                                    
                                                                          
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
                                                        <input type="hidden" id="div_url_count" value="<?php echo count($staff_data->celebrity_videos);?>"/>
                                                          <?php    foreach($staff_data->celebrity_videos as $val){ ?>
                                                           <div id="id_url<?php echo $val->id;?>">
                                                        <input type="text" class="form-control" name="url[]" id="form_control_1" value="<?php echo $val->video_url;?>"  placeholder=" Enter Video Url">
                                                        <input type="button" class="btn green" name="submit" value="Delete" onclick="delete_url('<?php echo $val->id;?>')"/></div>
 <?php } ?>             
                                                        <div id="url"></div>
                                                   
                                                </div>
                                                
                                            </div>
                                           
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
                <!-- END CONTENT -->
                <!-- BEGIN QUICK SIDEBAR -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

                <script type="text/javascript">
                    function video_url(){
                  var div_url_count=$("#div_url_count").val();
                  var div_new_count=parseInt(div_url_count)+1;
                  $("#div_url_count").val(div_new_count);
                   $("#url").append('<div id="id_url'+div_new_count+'"><input type="text" class="form-control" name="url[]" id="form_control_1"  placeholder=" Enter Video Url"/> <input type="button" class="btn green" name="submit" value="Delete" onclick="delete_url11('+div_new_count+')"/> </div>')
                    
                    
		
	  }	
            function edit_data(user_id){
                   // alert(user_id);
                    $.ajax({
				type: "POST",
				evalScripts: true,
				url: '<?php echo $this->Url->build('/admin/celebrities/ajax_customer_edit_data', true);  ?>',
				data: ({id:user_id}),
				success: function (data){
                                   //  alert(data);
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
             
             
             function delete_url(el){
              var x = confirm("Are you sure you want to delete?");
                if (x){
                 //   alert('hii')
              $.ajax({
				type: "POST",
				evalScripts: true,
				url: '<?php echo $this->Url->build('/admin/celebrities/delete_multivideo', true);  ?>',
				data: ({id:el}),
				success: function (data){
                                  //  alert(data);
                                   
                                      $("#id_url"+el).remove();
                              
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
				url: '<?php echo $this->Url->build('/admin/celebrities/delete_multiimage', true);  ?>',
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
    $('.date-picker').datepicker({
              endDate: '+0d',
    format: 'yyyy-mm-dd'
    
});
  } );
                    </script>