<div id="wrapper">
		<main id="main" class="login-align-center">
			<div class="container">
				<div class="main-content-login">
					<div class="form-login form-register">
						<h2>Register for Free</h2>
                                                  <?php echo $this->Flash->render('flash'); ?>
						<form  method="POST" id="registerForm" class="clearfix">
			  				<div class="field">
			  					<input type="text" value="" name="fname" placeholder="First Name" required=""/>
			  				</div>
			  				<div class="field">
			  					<input type="text" value="" name="lname" placeholder="Last Name" required=""/>
			  				</div>
			  				<div class="field">
			  					<input type="email" value="" name="email" placeholder="E-mail Address" />
			  				</div>
                                                    <div class="field">
                                                        <input type="text" value="" name="phno"  required="" placeholder="Enter Phone No" required=""/>
			  				</div>
                                                    <div class="field">
                                                        <input type="text" value="" name="address" id="autocomplete" required="" placeholder="Enter Location" required=""/>
			  				</div>
                                                    <div class="field">
                                                        <input type="text" value="" name="country" id="country" autocomplete="on"  required="" placeholder="Enter Country" />
			  				</div>
                                                    <div class="field">
                                                        <input type="text" value="" name="city" id="locality" required="" placeholder="Enter City" required=""/>
                                                         <input type="hidden" class="form-control" name="event_lat" id="lat" required=""  autocomplete="on" placeholder="Enter latitude" >
                                                           <input type="hidden" class="form-control " name="event_long" id="lng" required=""  autocomplete="on" placeholder="Enter longitude" >
			  				</div>
                                                    <div class="field">
                                                        <input type="text" value="" name="zip" id="postal_code" autocomplete="on" required="" placeholder="Enter Postal Code" />
			  				</div>
                                                    
			  				<div class="field">
			  					<input type="text" value="" name="password" placeholder="Password" />
			  				</div>
			  				<div class="inline clearfix">
						  		<button type="submit" value="Send Messager" class="btn-primary">Register Account</button>
						  		<p>Not a member yet? <a href="login">Login Now</a></p>
						  	</div>
					  	</form>
					</div>
					<i class="icon-lock"></i>
				</div>
			</div>	
		</main><!-- .site-main -->
		
	</div>
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
                  