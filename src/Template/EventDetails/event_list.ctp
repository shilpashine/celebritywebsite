<main id="main" class="site-main">
			<div class="page-title background-cart">
				<div class="container">
					<h1>Event-Listing</h1>
					<div class="breadcrumbs">
						<ul>
							<li>Home<span>/</span></li>
							<li>Event-Listing</li>
						</ul>
					</div><!-- .breadcrumbs -->
				</div>
			</div><!-- .page-title -->
                        <div class="container">
				<div class="row">
					<div class=" col-lg-2"></div>
					<div class=" col-lg-8 main-content2">
						<div class="input-group  mb-3">
                                                    <form method="post" action="" class="filler"/>
                         <input type="text" class="form-control" name="event_location" required="" id="autocomplete" placeholder="Enter your Location"/>
<input type="hidden" class="form-control" name="event_city" required=""  id="locality" placeholder="Enter City"/> 
<input type="hidden" class="form-control" name="event_lat" id="lat" required=""  autocomplete="on" placeholder="Enter latitude" />
    <input type="hidden" class="form-control " name="event_long" id="lng" required=""  autocomplete="on" placeholder="Enter longitude" />
   <input type="hidden" class="form-control" name="event_pincode"  required="" id="postal_code" autocomplete="on" placeholder="Enter Pincode"  value=""/>
   <input type="hidden" class="form-control" name="event_country" required=""  id="country" autocomplete="on" placeholder="Enter Country" />
                                       <div class="input-group-append">
                                           <input class="btn srch" name="submit" type="submit" value="submit"/>
						     </div>                                                                                                                                                                                                                                                      
   </form>
						  
						  </div>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="main-content">

								<div class="latest">
				<div class="container">
					<!-- <h2 class="title">Discover Events</h2> -->
					<div class="campaign-tabs filter-theme">
						<button class="button is-checked" data-filter=".filterinteresting" onclick="swap_type(0)">Interesting</button>
						<button class="button" data-filter=".filtersuccessful" onclick="swap_type(1)">Organised</button>
						<button class="button" data-filter=".filterpopular" onclick="swap_type(2)">Popular</button>
						<button class="button" data-filter=".filterlatest" onclick="swap_type(3)">Latest</button>
					</div>
					 <div id="org_data">
                                             <div  class="campaign-content grid"  style="height:auto !important;">
                                            <div class="row" >
                                                    
                                                 <?php if(!empty($data_all_event)){ foreach($data_all_event as $valnw){ //pr($valnw);exit; ?>
							<div class="col-lg-4 col-md-6 col-sm-6 col-6 filterinteresting filterpopular filterlatest">
								<div class="campaign-item">
									<a class="overlay" href="event_detail/<?php echo $valnw->id;?>">
										<?php if(!empty($valnw->event_photos[0]->image)){ echo $this->Html->image("medium/".$valnw->event_photos[0]->image, ['alt' => 'event']); }?>
										<span class="ion-ios-search-strong"></span>
									</a>
									<div class="campaign-box">
                                                                           
                                                                            <a href="#" class="category"> <?php foreach($valnw->event_categories as $val){  ?><?php echo $val->category->category_name;?> , <?php } ?></a>
                                                                          
										<h3><a href="event_detail/<?php echo $valnw->id;?>"><?php echo $valnw->event_title;?></a></h3>
										<div class="campaign-description"><?php echo $valnw->event_description;?></div>
                                                                                <div class="campaign-author"><a class="author-icon" href="#"><?php if(!empty($valnw->event_organizers)) { foreach($valnw->event_organizers as $new1){ echo $this->Html->image("medium/".$new1->users[0]->image, ['alt' => 'event']); ?></a>by <a class="author-name" href="#"><?php echo $new1->users[0]->fname.' '. $new1->users[0]->lname;?>, <?php }} ?></a></div>
										<?php     $amount11=0;  if(!empty($valnw->event_orders)){ foreach($valnw->event_orders as $val_amount){
                                                                                                  if(!empty($val_amount->total_price)){
            
                                                                                                  $amount11=$amount11+$val_amount->product_price;
                                                                                                      
                                                                                                      
                                                                                                      
                                                                                                  }
                                                                                                  }
                                                                                                  }?>
                                                                                
                                                                                <div class="process">
												 <div class="progress">
  <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar"
  aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php if(!empty( $valnw->event_amount)&& !empty( $valnw->target_amount) ) {  $new_amount=($amount11/$valnw->event_amount)*100 ; echo round($new_amount);}?>%">
   
  </div>
</div>  
											<div class="process-info">
												<div class="process-pledged"><span><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $valnw->event_amount;?></span>pledged</div>
												<div class="process-funded"><span><?php if(!empty( $valnw->event_amount)&& !empty( $valnw->target_amount) ) {  $new_amount=($amount11/$valnw->event_amount)*100 ; echo round($new_amount);}?>%</span>funded</div>
												<?php if(!empty($valnw->approx_start_date)){
                                                                                                                                                 $curr_date=date_create(date("Y-m-d"));
                                                                                                                                                $upcomming_date=date_create(date("Y-m-d",strtotime($valnw->approx_start_date)));
                                                                                                                                                
                                                                                                                                                $diff=date_diff($curr_date,$upcomming_date);
                                                                                                                                                ?>
																		<div class="process-time"><span><?php echo  $diff->format("%R%a days");?></span>days ago</div>
                                                                                                                                                <?php }?>
											</div>
										</div>
									</div>
								</div>
							</div>
                                                    
                                                 <?php }} ?>

                                            </div></div>
					</div>
					<!-- <div class="latest-button"><a href="#" class="btn-primary">View all Events</a></div> -->
				</div>
			</div><!-- .latest -->
				</div> 
			</div>	
		</main><!-- .site-main -->
                <script>
                   function swap_type(type_id){
                    
                   //  $("#loder_div").show();
                         $.ajax({
				type: "POST",
				evalScripts: true,
				url: '<?php echo $this->Url->build('/Pages/swap_tab', true);  ?>',
				data: ({cat_id:type_id}),
				success: function (data){
                               //  alert(data)
                                
                                   $("#org_data").html(data);
                                   
                             
				}
		    });
                    } 
                    </script> <script>
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
                  