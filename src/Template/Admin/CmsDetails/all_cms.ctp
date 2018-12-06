
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
                                                <span class="caption-subject font-green sbold uppercase">Add Cms</span>
                                            </div>

                                        </div>
                                        <div class="portlet-body">
                                            <!-- BEGIN FORM-->
                                            <form action="#" id="form_sample_2" method="post" enctype="multipart/form-data"> 
                                                <div class="form-body">
                                                    <div class="form-group form-md-line-input">
                                                        <input type="text" class="form-control" name="title11" required="" id="form_control_1" placeholder="Enter your Name">
                                                        <label for="form_control_1"> Page Title
                                                            <span class="required">*</span>
                                                        </label>
                                                        <span class="help-block">Enter Page Title...</span>
                                                    </div>


                                                     

                                                   <div class="form-group form-md-line-input">
                                                        <textarea class="form-control" id="form_control_1" name="description" required=""> Page Description</textarea>

                                                    </div>

                                                     
 <div class="form-group form-md-line-input">
                                                        <input type="text" class="form-control" name="meta_title" required="" id="form_control_1" placeholder="Enter your Name">
                                                        <label for="form_control_1"> Meta Title
                                                            <span class="required">*</span>
                                                        </label>
                                                       
                                                    </div>
                                                    
                                                     <div class="form-group form-md-line-input">
                                                        <input type="text" class="form-control" name="meta_key" required="" id="form_control_1" placeholder="Enter your Name">
                                                        <label for="form_control_1">Meta Key
                                                            <span class="required">*</span>
                                                        </label>
                                                       
                                                    </div>
                                                    
                                                     <div class="form-group form-md-line-input">
                                                         <textarea class="form-control" name="meta_desc" required="" id="form_control_1"></textarea>
                                                        <label for="form_control_1"> Meta Description
                                                            <span class="required">*</span>
                                                        </label>
                                                       
                                                    </div>
                                                   


                                                     <div class="form-group">
                                                        <label class="control-label col-md-6">Select  Image
                                                      
                                                        </label>
                                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                <div class="input-group input-large">

                                                                    <span class="input-group-addon btn default btn-file">


                                                                        <input type="file" name="image"> </span>
                                                                       </div>
                                                            </div>
                                                        </div>

                                                       

                                                    <div class="form-group form-md-line-input">
                                                        <input type="hidden" id="div_url_count_new" name="div_ticket_url_count" value="1"/>
                                                            <label> ADD Post </label>
                                                            <input type="text" class="form-control" name="post_name[]" id="form_control_1"  placeholder=" Enter Post Name">
                                                            <textarea class="form-control" name="post_desc[]"></textarea>
                                                             
                                                            <input type="file" class="form-control" name="post_image[]" id="form_control_1"/>
                                                            <div id="url_ticket"></div>
                                                        <button type="button" class="btn default" onclick="video_url1()">Add More Post</button>
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
                                            <i class="fa fa-globe"></i>Cms Listing </div>
                                        <div class="tools"> </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_4">
                                            <thead>
                                                <tr>
                                                    <th class="all"> Page Title</th>
                                                    <th class="min-phone-l">Description</th>
                                                    <th class="min-tablet">Meta Title</th>
                                                    <th class="desktop">Meta Key</th>
                                                    <th class="none">Meta Description</th>
                                                  
                                                   
                                                   
                                                  
                                                    <th class="desktop">Action</th>
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
												<?php 
												if(isset($data_all)){
												$celebrity_datas=json_decode($data_all);
												foreach($celebrity_datas as $celebrity_val){
													//pr($celebrity_val);exit;
												
												?>
                                                <tr>
                                                    <td><?php echo $celebrity_val->page_title;?> </td>
                                                    <td><?php echo $celebrity_val->description;?></td>
                                                    <td><?php echo $celebrity_val->meta_title;?></td>
                                                    <td><?php echo $celebrity_val->meta_key;?></td>
                                                      <td><?php echo $celebrity_val->meta_description;?></td>
                                                   
                                                  
                                                
                                                <td>
                                                       <a title="View" onclick="edit_data(<?php echo $celebrity_val->id;?>)" href="#">
                                                            <i class="fa fa-edit"></i> Edit </a>
                                                   <br/>
                                                       <a href="deleteData/<?php echo $celebrity_val->id;?> ">
                                                            <i class="fa fa-trash"></i> Delete </a>
                                                     <br/>
                                                     <?php if($celebrity_val->status==1){ ?>
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



                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

                <script type="text/javascript">
                    
                    
                    function save_celebrity(){
	var name=$('#name').val();
	
  if(name=='' || name==null){
		$("#error_edit_fname").html("Please Enter Celebrity Name");
		$("#name").focus();
	}
	else{
        
      
          
	   //document.getElementById("form_sampl_cel").submit();
           $("#form_sampl_cel").submit();

	  
        }
	  }
                    
                         function video_url1(){
                  var div_url_count=$("#div_url_count_new").val();
                  var div_new_count=parseInt(div_url_count)+1;
                  $("#div_url_count_new").val(div_new_count);
                   $("#url_ticket").append('<div id="id_url'+div_new_count+'"><input type="text" class="form-control" name="post_name[]" id="form_control_1"  placeholder=" Enter Post Name"><textarea class="form-control" name="post_desc[]"></textarea><input type="file" class="form-control" name="post_image[]" id="form_control_1"/><input type="button" class="btn green" name="submit" value="Delete" onclick="delete_url11('+div_new_count+')"/></div>')
                                                  
                    
		
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
				url: '<?php echo $this->Url->build('/admin/CmsDetails/ajax_customer_edit_data', true);  ?>',
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
                   $("#url_cel").append('<div id="id_url_cel'+div_new_count+'"><input type="text" class="form-control" name="video_url[]" value="" /> <input type="button" class="btn green" name="submit" value="Delete" onclick="delete_ur_vel('+div_new_count+')"/> </div>');
                    
                    
		
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
                  