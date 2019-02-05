
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                  
                     
                      
                        <div class="row">
                        
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet box green">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-globe"></i>Private Party Listing </div>
                                        <div class="tools"> </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_4">
                                            <thead>
                                                <tr>
                                                   
                                                    <th class="all"> Celebrity Name</th>
                                                      <th class="all"> Celebrity Best at</th>
                                                       <th class="all"> User Full Name</th>
                                                       <th class="all"> Name</th>
                                                       <th class="all"> Phone No</th>
                                                       <th class="all"> Email</th>
                                                       
                                                    <th class="desktop">Location City</th>
                                                  
                                                    <th class="desktop">Requested From(Country)</th>
                                                     <th class="desktop">Requested From(City)</th>
                                                     <th class="desktop">Requested Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
												<?php 
												if(isset($data_all)){
												$celebrity_datas=json_decode($data_all);
												foreach($celebrity_datas as $celebrity_val){
                                                                                                   // pr($celebrity_val);exit;
                                                                                                    $date=explode('T',$celebrity_val->created);
												?>
                                                <tr>
                                                  
                                                    <td><?php echo $celebrity_val->celebrity_detail->name;?> </td>
                                                     <td><?php echo $celebrity_val->celebrity_detail->best_at;?> </td>
                                                      <td><?php echo $celebrity_val->user->fname.''.$celebrity_val->user->lname;?> </td>
                                                    <td><?php echo $celebrity_val->name;?></td>
                                                     <td><?php echo $celebrity_val->phno;?></td>
                                                    <td><?php echo $celebrity_val->email;?></td>
                                                        <td><?php echo $celebrity_val->location_city;?></td>
                                                        
                                                        
                                                     <td><?php echo $celebrity_val->user_country;?></td>
                                                     <td><?php echo $celebrity_val->user_city;?></td>
                                                   
                                                      
                                                    
                                                   <td><?php echo $date[0];?></td>
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