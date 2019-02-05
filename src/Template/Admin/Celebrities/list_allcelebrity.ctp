
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                  
                        <div class="row">
                        
                            <div class="col-md-12">
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
                                                   
                                                    <th class="all"> Name</th>
                                                    <th class="desktop">Best_at</th>
                                                    <th class="none">Gender</th>
                                                    <th class="none">Dob</th>
                                                    <th class="desktop">Category Name</th>
                                                    <th class="desktop">Home location</th>
                                                    <th class="desktop">Current location</th>
                                                     <th class="none">Description</th>
                                                   
                                                    <th class="desktop">Total No Follower</th>
                                                  
                                                   
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
												<?php 
												if(isset($celebrity_datas)){
												$celebrity_datas=json_decode($celebrity_datas);
												foreach($celebrity_datas as $celebrity_val){
                                                                                                    $total=0;
                                                                                                    
                                                                                              //    pr($celebrity_val);exit;
                                                                                                    if(!empty($celebrity_val->event_follows)){
                                                                                                        $total=$total+count($celebrity_val->event_follows);
                                                                                                    }
													//pr($celebrity_val);exit;
												$dob=explode('T',$celebrity_val->dob);
												?>
                                                <tr>
                                                  
                                                    <td><?php echo $celebrity_val->name;?> </td>
                                                    <td><?php echo $celebrity_val->best_at;?></td>
                                                    <td><?php if($celebrity_val->gendar=='1'){ echo 'Male'; ?> <?php }else{  echo 'Female';?>  <?php }?></td>
                                                    <td><?php echo $dob[0];?></td>
                                                     <td><?php echo $celebrity_val->celebrity_categories[0]->category->category_name;?></td>
                                                    <td><?php echo $celebrity_val->home_location;?></td>
                                                    <td><?php echo $celebrity_val->current_location;?></td>
                                                    <td><?php echo $celebrity_val->description;?></td>
                                                      <td><?php echo $total;?></td>
                                                
                                               
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