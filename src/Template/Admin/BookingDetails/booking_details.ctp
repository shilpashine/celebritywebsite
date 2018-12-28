
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                  
                    
                      
                        <div class="row">
                             
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet box green">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-globe"></i>Booking Details </div>
                                        <div class="tools"> </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_4">
                                            <thead>
                                                <tr>
                                                    <th class="all"> Ticket Title</th>
                                                    <th class="min-phone-l">Ticket Description</th>
                                                    <th class="min-tablet">Ticket Price </th>
                                                    <th class="desktop">Qty</th>
                                                   
                                                    <th class="desktop">Ticket Code</th>
                                                     
                                                    
                                                  
                                                   
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
												<?php 
												if(isset($data_all)){
												$celebrity_datas=json_decode($data_all);
                                                                                                if(!empty($celebrity_datas->event_ticket_code_details)){
												foreach($celebrity_datas->event_ticket_code_details as $celebrity_val){
												if(!empty($celebrity_val->event_ticket_detail)){
												?>
                                                <tr>
                                                    <td><?php echo $celebrity_val->event_ticket_detail->ticket_name;?> </td>
                                                    <td><?php echo $celebrity_val->event_ticket_detail->ticket_desc;?></td>
                                                    <td><?php echo $celebrity_val->event_ticket_detail->ticket_price;?></td>
                                                    <td><?php echo $celebrity_val->qty;?></td>
                                                   
                                                   <td><?php echo  $celebrity_val->ticket_code;?></td>
                                                
                                             
                                                </tr>
                                                                                                <?php }}}} ?>
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
                                             <button type="button" class="btn default" onclick="save_celebrity()">submit</button>
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
                   $("#url_ticket").append('<div id="id_url'+div_new_count+'">   <label> ADD Ticket Type </label><input type="text" class="form-control" name="ticket_name[]" id="form_control_1"  placeholder=" Enter Ticket Name"><input type="text" class="form-control" name="ticket_color[]" id="form_control_1"  value="" placeholder=" Enter Ticket Color"><input type="text" class="form-control" name="ticket_desc[]" id="form_control_1"  placeholder=" Enter Ticket Description"><input type="text" class="form-control" name="ticket_qty[]" id="form_control_1"  placeholder=" Enter Ticket Qty"> <input type="text" class="form-control" name="ticket_price[]" id="form_control_1"  placeholder=" Enter Ticket Price"> <input type="button" class="btn green" name="submit" value="Delete" onclick="delete_url11('+div_new_count+')"/> </div>')
                    
                    
		
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
                  
