
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                  
                     <div class="portlet light form-fit">
                                    
                                       
                                        <div class="actions">
                                            <div class="btn-group btn-group-devided" data-toggle="buttons">
                                               
                                                <button type="button" class="btn green" onclick="cancel_policy()">ADD NEW</button>
                                                <?php echo $this->Flash->render('flash'); ?>
                                                
                                            </div>
                                        </div>
                                  
                                  
                                </div>
                      
                        <div class="row">
                            <div class="col-md-6" id="show_data">
                                <!-- BEGIN VALIDATION STATES-->
                                <div class="portlet light portlet-fit portlet-form bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class=" icon-layers font-green "></i>
                                            <span class="caption-subject font-green sbold uppercase">Add Celebrity</span>
                                        </div>
                                       
                                    </div>
                                    <div class="portlet-body">
                                        <!-- BEGIN FORM-->
                                        <form action="#" id="form_sample_2" method="post" enctype="multipart/form-data"> 
                                            <div class="form-body">
                                                <div class="form-group form-md-line-input">
                                                    <input type="text" class="form-control" name="name" required="" id="form_control_1" placeholder="Enter your Name">
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
                                                        <input type="text" class="form-control date-picker" name="dob" placeholder="Enter Dob" >
                                                        <label for="form_control_1">Date OF Birth</label>
                                                    </div>
                                                </div>
                                                <div class="form-group form-md-line-input">
                                                    <div class="input-group">
                                                        <select name="gendar" class="form-control">
                                                            <option value="1">MALE</option>
                                                               <option value="2">FEMALE</option>
                                                        </select>
                                                        <br/>
                                                          <label for="form_control_1"> Gender</label>
                                                        
                                                    </div>
                                                </div>
                                                <div class="form-group form-md-line-input">
                                                    <textarea class="form-control" id="form_control_1" name="best_at" required=""> Best In</textarea>
                                                    
                                                </div>
                                                <div class="form-group form-md-line-input">
                                                    <textarea class="form-control" id="form_control_1" name="description" required=""> Enter Description</textarea>
                                                    
                                                </div>
                                                <div class="form-group form-md-line-input">
                                                    <textarea class="form-control" id="form_control_1" name="home_address" required=""> Enter Home Location</textarea>
                                                    
                                                </div>
                                                 <div class="form-group form-md-line-input">
                                                    <textarea class="form-control" id="form_control_1" name="curr_address" required=""> Enter Current Location</textarea>
                                                    
                                                </div>
                                                 <div class="form-group">
                                                    <label class="control-label col-md-4">Select Category
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="form-group form-md-line-input">
                                                       
                                                        <select class="form-control" name="category_id[]" multiple>
                                                            
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
                                                        <input type="text" class="form-control" name="url[]" id="form_control_1"  placeholder=" Enter Video Url">
                                                        <div id="url"></div>
                                                    <button type="button" class="btn default" onclick="video_url()">Add More Url</button>
                                                </div>
                                                
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="submit" class="btn green" name="submit" value="Submit"/>
                                                        <button type="reset" class="btn default" onclick="cancel_policy()">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- END FORM-->
                                    </div>
                                </div>
                                <!-- END VALIDATION STATES-->
                            </div>
                            <div class="col-md-6">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet box green">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-globe"></i>Celebrity Listing </div>
                                        <div class="tools"> </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_4">
                                            <thead>
                                                <tr>
                                                     <th class="all"> Id</th>
                                                    <th class="all"> Name</th>
                                                    <th class="min-phone-l">Best_at</th>
                                                    <th class="min-tablet">Gender</th>
                                                    <th class="desktop">Dob</th>
                                                    <th class="none">Home location</th>
                                                    <th class="none">Current location</th>
                                                     <th class="none">Description</th>
                                                   
                                                   
                                                  
                                                    <th class="desktop">Action</th>
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
												<?php 
												if(isset($celebrity_datas)){
												$celebrity_datas=json_decode($celebrity_datas);
												foreach($celebrity_datas as $celebrity_val){
													//pr($celebrity_val);exit;
												$dob=explode('T',$celebrity_val->dob);
												?>
                                                <tr>
                                                     <td><?php echo $celebrity_val->id;?> </td>
                                                    <td><?php echo $celebrity_val->name;?> </td>
                                                    <td><?php echo $celebrity_val->best_at;?></td>
                                                    <td><?php if($celebrity_val->gendar=='1'){ echo 'Male'; ?> <?php }else{  echo 'Female';?>  <?php }?></td>
                                                    <td><?php echo $dob[0];?></td>
                                                    <td><?php echo $celebrity_val->home_location;?></td>
                                                    <td><?php echo $celebrity_val->current_location;?></td>
                                                    <td><?php echo $celebrity_val->description;?></td>
                                                   
                                                
                                                <td>
                                                       <a title="View" onclick="edit_data(<?php echo $celebrity_val->id;?>)" href="#">
                                                            <i class="fa fa-edit"></i> Edit </a>
                                                   <br/>
                                                       <a href="deleteData/<?php echo $celebrity_val->id;?> ">
                                                            <i class="fa fa-trash"></i> Delete </a>
                                                     <br/>
                                                     <?php if($celebrity_val->status=='1'){ ?>
                                                        <a href="change_status/<?php echo $celebrity_val->id;?> ">
                                                            <i class="fa fa-check" style="color:green"></i> Status </a>
                                                            
                                                     <?php }else{  ?>
                                                         
                                                          <a href="change_status/<?php echo $celebrity_val->id;?> ">
                                                            <i class="fa fa-ban"  style="color:red"></i> Status </a>
                                                         
                                                         
                                                   <?php  } ?>
                                                  
                                                 </td>
                                                </tr>
                                                                                                <?php }} ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
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