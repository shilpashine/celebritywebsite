
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
                                            <span class="caption-subject font-green sbold uppercase">Add Event</span>
                                        </div>
                                       
                                    </div>
                                    <div class="portlet-body">
                                        <!-- BEGIN FORM-->
                                        <form action="#" id="form_sample_2" method="post" enctype="multipart/form-data"> 
                                            <div class="form-body">
                                                <div class="form-group form-md-line-input">
                                                    <input type="text" class="form-control" name="event_title" required="" id="form_control_1" placeholder="Enter your Name">
                                                    <label for="form_control_1"> Event Title
                                                        <span class="required">*</span>
                                                    </label>
                                                    <span class="help-block">Enter Event Title...</span>
                                                </div>
                                                
                                               <div class="form-group form-md-line-input">
                                                    <textarea class="form-control" id="form_control_1" name="description" required=""> Event Description</textarea>
                                                    
                                                </div>
                                              
                                                  <div class="form-group form-md-line-input">
                                                    <input type="text" class="form-control" name="event_location" required="" id="autocomplete" placeholder="Enter your Name">
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
                                                        <input type="text" class="form-control" name="event_country" id="country" autocomplete="on" placeholder="Enter Country" >
                                                        <label for="form_control_1">Event Country</label>
                                                    </div>
                                                </div>
                                                
                                                
                                                 <div class="form-group form-md-line-input">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-map"></i>
                                                        </span>
                                                        <input type="text" class="form-control" name="event_city" id="locality" placeholder="Enter City" >
                                                        <label for="form_control_1">Event City</label>
                                                    </div>
                                                </div>
                                                  
                                                 <div class="form-group form-md-line-input">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-map"></i>
                                                        </span>
                                                        <input type="text" class="form-control" name="event_pincode" id="postal_code" autocomplete="on" placeholder="Enter Pincode"  value="">
                                                        <label for="form_control_1">Event Pincode</label>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group form-md-line-input">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-flag"></i>
                                                        </span>
                                                        <input type="text" class="form-control" name="event_lat" id="lat" autocomplete="on" placeholder="Enter latitude" >
                                                        <label for="form_control_1">Event latitude</label>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group form-md-line-input">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-flag"></i>
                                                        </span>
                                                        <input type="text" class="form-control " name="event_long" id="lng" autocomplete="on" placeholder="Enter longitude" >
                                                        <label for="form_control_1">Event longitude</label>
                                                    </div>
                                                </div>
                                                
                                                 <div class="form-group form-md-line-input">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                        <input type="text" class="form-control date-picker11" name="event_startdate" placeholder="Enter Startdate" >
                                                        <label for="form_control_1">Event Start Date</label>
                                                    </div>
                                                </div>
                                                
                                                
                                                 <div class="form-group form-md-line-input">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                        <input type="text" class="form-control date-picker11" name="event_enddate" placeholder="Enter Enddate" >
                                                        <label for="form_control_1">Event End Date</label>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group form-md-line-input">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                        <input type="text" class="form-control" name="event_starttime" placeholder="Enter Starttime" >
                                                        <label for="form_control_1">Event Start Time</label>
                                                    </div>
                                                </div>
                                                
                                                
                                                 <div class="form-group form-md-line-input">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                        <input type="text" class="form-control " name="event_endtime" placeholder="Enter Endtime" >
                                                        <label for="form_control_1">Event End Time</label>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="form-group ">
                                                    <div class="input-group">
                                                        
                                                          <label for="form_control"> Event Type</label>
                                                          
                                                           <br/>
                                                          
                                                        <select name="event_type" name="event_type" class="form-control">
                                                            <option value="1">Public</option>
                                                               <option value="2">Private</option>
                                                        </select>
                                                       
                                                        
                                                        
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                                <div class="form-group form-md-line-input">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-tag"></i>
                                                        </span>
                                                        <input type="text" class="form-control" name="event_amount" placeholder="Enter Amount" >
                                                        <label for="form_control_1">Event Amount</label>
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="form-group form-md-line-input">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-tag"></i>
                                                        </span>
                                                        <input type="text" class="form-control" name="event_target_amount" placeholder="Enter Target Amount" >
                                                        <label for="form_control_1">Event Target Amount</label>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                                <div class="form-group form-md-line-input">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-tag"></i>
                                                        </span>
                                                        <input type="text" class="form-control " name="event_ticket_price" placeholder="Enter Ticket Price" >
                                                        <label for="form_control_1">Event Ticket Price</label>
                                                    </div>
                                                </div>
                                                 <div class="form-group">
                                                      <label for="form_control">Is Seats Count</label>
                                                        
                                                      <input type="checkbox"  name="is_seats" value="1" id="is_seats" value="seats" onclick="seats_details()">
                                                      
                                                    
                                                </div>
                                                
                                                <div class="form-group form-md-line-input" id="payment_check" name="no_seat" style="display: none;">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-tag"></i>
                                                        </span>
                                                        <input type="text" class="form-control " name="event_seats" placeholder="Enter Seats" >
                                                        <label for="form_control_1">Event No Seats</label>
                                                    </div>
                                                </div>
                                                <div class="form-group form-md-line-input">
                                                    <textarea class="form-control" id="form_control_1" name="terms" required=""> Terms & Condition </textarea>
                                                    
                                                </div>
                                               
                                                 <div class="form-group">
                                                    <label class="control-label col-md-6">Select Event Category
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
                                                    <label class="control-label col-md-6">Select Event Organizer
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="form-group form-md-line-input">
                                                       <?php  //pr($celebrity_datas);exit; ?>
                                                        <select class="form-control" name="event_org_id[]" multiple>
                                                            
                                                       <?php      if(isset($celebrity_datas12)){
                                                         
                                                                    $data_all11=json_decode($celebrity_datas12);
                                                                  
                                                                    foreach($data_all11 as $category_datas){
                                                                                                    
                                                                                                    ?>
                                                                                               
                                                                                                
                                                            <option value="<?php echo $category_datas->id;?>"><?php echo $category_datas->fname;?></option>
                                                            <?php  }  }
                                                                                                ?>
                                                            
                                                        </select>
                                                       
                                                    </div>
                                                </div>
                                                
                                                 <div class="form-group">
                                                    <label class="control-label col-md-6">Select Event Celebrity
                                                        <span class="required"> * </span>
                                                    </label>
                                                    <div class="form-group form-md-line-input">
                                                       <?php  //pr($celebrity_datas);exit; ?>
                                                        <select class="form-control" name="event_celebrity[]" multiple>
                                                            
                                                       <?php      if(isset($cel_datas)){
                                                         
                                                                    $cel_datas11=json_decode($cel_datas);
                                                                  
                                                                    foreach($cel_datas11 as $cel_datas11){
                                                                                                    
                                                                                                    ?>
                                                                                               
                                                                                                
                                                            <option value="<?php echo $cel_datas11->id;?>"><?php echo $cel_datas11->name;?></option>
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
                                                               
                                                                <span class="input-group-addon btn default btn-file">
                                                                 
                                                                   
                                                                    <input type="file" name="image[]" multiple="" > </span>
                                                                   </div>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="form-group form-md-line-input">
                                                        <input type="hidden" id="div_url_count" value="1"/>
                                                        <input type="text" class="form-control" name="url[]" id="form_control_1"  placeholder=" Enter Video Url">
                                                        <div id="url"></div>
                                                    <button type="button" class="btn default" onclick="video_url()">Add More Event Video Url</button>
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
                                            <i class="fa fa-globe"></i>Event Listing </div>
                                        <div class="tools"> </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_4">
                                            <thead>
                                                <tr>
                                                    <th class="all"> Event Title</th>
                                                    <th class="min-phone-l">Description</th>
                                                    <th class="min-tablet">Location</th>
                                                    <th class="desktop">Country</th>
                                                    <th class="none">Start Date</th>
                                                    <th class="none">End Date</th>
                                                     <th class="none">Amount</th>
                                                     <th class="none">Ticket Price</th>
                                                   
                                                   
                                                  
                                                    <th class="desktop">Action</th>
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
												<?php 
												if(isset($data_all_event)){
												$celebrity_datas=json_decode($data_all_event);
												foreach($celebrity_datas as $celebrity_val){
													//pr($celebrity_val);exit;
												$start_date=explode('T',$celebrity_val->approx_start_date);
                                                                                                $end_date=explode('T',$celebrity_val->approx_end_date);
												?>
                                                <tr>
                                                    <td><?php echo $celebrity_val->event_title;?> </td>
                                                    <td><?php echo $celebrity_val->event_description;?></td>
                                                    <td><?php echo $celebrity_val->event_location;?></td>
                                                    <td><?php echo $celebrity_val->event_country;?></td>
                                                    <td><?php echo $start_date[0];?></td>
                                                    <td><?php echo $end_date[0];;?></td>
                                                    <td><?php echo $celebrity_val->event_amount;?></td>
                                                   <td><?php echo $celebrity_val->ticket_per_person_price;?></td>
                                                
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
                  