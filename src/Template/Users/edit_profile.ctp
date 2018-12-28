<main id="main" class="site-main">
			<div class="page-title background-campaign">
				<div class="container">
					<h1>Edit Profile</h1>
					<div class="breadcrumbs">
						<ul>
							<li><a href="index.html">Home</a><span>/</span></li>
							<li><a href="profile.html">Profile</a><span>/</span></li>
							<li>Edit Profile</li>
						</ul>
					</div><!-- .breadcrumbs -->
				</div>
			</div><!-- .page-title -->
			<div class="campaign-form form-update ">
				<h4 class="edit">Edit Profile</h4>
				<div class="container profile ">

					<div class="col-md-8 mx-auto photo-tabs ">
						<ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
							<li class="nav-item">
							  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Settings</a>
							</li>
							<li class="nav-item">
							  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Uplodad Image</a>
							</li>
							<li class="nav-item">
							  <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Change Password</a>
							</li>
							
						  </ul>

					<div class="tab-content edit-tab" id="pills-tabContent">
						  <div class="tab-pane active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                                      <?php //pr($user_data);exit; ?>
						  	<form action="#">
						  		<div class="field settings">
                                                                    <input type="hidden" name="edit_user_id" parsley-trigger="change"  class="form-control" id="user_id" value="<?php echo $user_data[0]['id'];?>" />		
				  					<input type="text" value="" id="fname" name="title" placeholder="First Name" />
				  				</div>

				  				<div class="field settings">
									
				  					<input type="text" value="" id="lname" name="title" placeholder="Last Name" />
				  				</div>
                                                            

				  				<div class="field settings clearfix">
		  					<label for="clocation">Address *</label>
							<span class="label-desc">You can Change your locaton</span>
			  				<div class="field align-left">
			  					<input type="text" value="" id="autocomplete" placeholder="address" />
			  				</div>
			  				<div class="field align-right ">
			  					<input type="text" value="" id="locality" placeholder="city" />
                                                                <input type="hidden" class="form-control" name="event_lat" id="lat" required=""  autocomplete="on" placeholder="Enter latitude" readonly="" >
              <input type="hidden" class="form-control " name="event_long" id="lng" required=""  autocomplete="on" placeholder="Enter longitude" readonly=""  >

			  				</div>
						</div> 
                                                            <div id="count_image"></div>
<div class="field settings">
    <input type="button" name="submit" value="Submit" onclick="edit_detail()"/>
                                                            </div>
						  	</form>
						  </div>
						  <div class="tab-pane container" id="pills-profile" >
						  	<div class="field">
							<!-- <label for="uploadfile">Edit Image *</label>
							<span class="label-desc pad"> Upload a square image that represents your Profile. 570 x 350 recommended resolution.</span> -->

							<div class="account-content profile">
								<h3 class="account-title">My Profiles</h3>
								<div class="account-main">
<!--									<div class="author clearfix">
										<a class="author-avatar" href="#"><img src="images/dashboard-avatar.png" alt=""></a>
										<div class="author-content">
											<div class="author-title"><h3><a href="#">You can change your profile</a></h3></div>
											<div class="author-info">
												<input type="file" value="" id="image" placeholder="Uplode Image" />
											</div>
											<div id="boxchoice" class="">
                                                                                            <a href="#" class="choicefile up-pic" onclick="upload_image()"><i class="fa fa-cloud-upload" aria-hidden="true"></i> Upload Image</a>
									  		<p></p>
									 	</div>
										</div>
									</div>-->

 <div class="author clearfix"><form method="post"  enctype="multipart/form-data" action="photo_upload">  
           <input type="hidden" name="user_id" parsley-trigger="change"   value="<?php echo $user_data[0]['id'];?>" />		
				  				
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"> </div>
                                                              <div>
                                                                <span class="btn red btn-outline btn-file">
                                                                    <span class="fileinput-new"> Select image </span>
                                                                    <span class="fileinput-exists"> Change </span>
                                                                    <input type="file" name="image"> </span>
                                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                </div>
                                                        </div>
                                                         <input type="submit" name="submit" value="Submit" />
                                                         </form>
                                                </div>
                                              
									</div>
									</div>


							
		  				</div>
		  			</div>
		  				<div class="field clearfix">
						  </div>
						  <div class="tab-pane container" id="pills-contact">
						  	<div class="field Edit-password">

								  <div class="card">
								    <div class="card-header">
								      <a class="card-link" data-toggle="collapse" href="#collapseOne">
								        You can change your password *
								      </a>
								    </div>
								    
								      <div class="card-body">
								        <input type="text" value="" id="password" name="password" placeholder="Type old password" /><br><br>
								        <input type="text" value="" id="new_password" name="new_password" placeholder="Type a new password" /><br><br>
								        <input type="text" value="" id="c_password" name="c_password" placeholder="Conform new password" />
                                                                        <input type="button" name="submit" value="Submit" onclick="password_change()" />
								      </div>
                                                                      <div id="password_new"></div>
								  </div>

								
		  				</div>
						  </div>
						</div>
					</div>
					
				</div>
			</div><!-- .campaign-form -->
		</main><!-- .site-main --> <script>
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
//        if (place.address_components[i].types[j] == "postal_code") {
//          document.getElementById('postal_code').value = place.address_components[i].long_name;
//
//        }
//        
//        if (place.address_components[i].types[j] == "country") {
//          document.getElementById('country').value = place.address_components[i].long_name;
//
//        }
        
        
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
<script>
//    function upload_image(){
//       
//        $.ajax({
//            type:'POST',
//            url: $(this).attr('action'),
//            data:formData,
//            cache:false,
//            contentType: false,
//            processData: false,
//            success:function(data){
//                console.log("success");
//                console.log(data);
//            },
//            
//            error: function(data){
//                console.log("error");
//                console.log(data);
//            }
//        });
// 
//
//    }
//    
    
    function edit_detail(){
        var fname=$("#fname").val();
        var lname=$("#lname").val();
        var location=$("#autocomplete").val();
        var locality=$("#locality").val();
      
          var user_id=$("#user_id").val();
            $.ajax({
				type: "POST",
				evalScripts: true,
				url: '<?php echo $this->Url->build('/users/edit_profile_fpart', true);  ?>',
				data: ({fname:fname,lname:lname,location:location,locality:locality,user_id:user_id}),
				success: function (data){
                                    alert(data);
                                    if(data==1){
                                 
                                   $("#count_image").html("Sucessfully Save Details.");
                                   
                               }
				}
		    });
        
    }
    
    function password_change(){
    alert('hii')
     var password=$("#password").val();
        var new_password=$("#new_password").val();
        var c_password=$("#c_password").val();
       
            $.ajax({
				type: "POST",
				evalScripts: true,
				url: '<?php echo $this->Url->build('/users/edit_password', true);  ?>',
				data: ({password:password,new_password:new_password,c_password:c_password}),
				success: function (data){
                                    alert(data);
//                                    if(data==1){
//                                 
//                                   $("#password_new").html("Sucessfully change password.");
//                                   
//                               }else if(data==2){
//                                     $("#password_new").html("Password and confirm password must be same");
//				}else{
//                                     $("#password_new").html("Try Again.");
//                                    
//        }
                                }
		    });
        
    
    
    }
    </script>