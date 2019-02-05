	<main id="main" class="site-main">
			<div class="page-title background-cart">
				<div class="container">
					<h1>Celebrity List</h1>
					<div class="breadcrumbs">
						<ul>
							<li>Home<span>/</span></li>
							<li>Celebrity List</li>
						</ul>
					</div><!-- .breadcrumbs -->
				</div>
			</div>
			<!-- .page-title -->
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
                                       <div class="input-group-append filler-sub">
                                           <input class="btn srch" name="submit" type="submit" value="submit"/>
						     </div>                                                                                                                                                                                                                                                      
   </form>
						  
						  </div>
					</div>
				</div>
			</div>
			<div class="container">
                            <?php echo $this->Flash->render('flash'); ?>
                            <?php $k=0;foreach($data_all as $val_category ){ ?>
				<div class="row">
					<div class="col-lg-12 main-content">
						 <div class="shop-grid-fillter celeb-title clearfix">
							<p><?php echo $val_category->category_name; ?></p></div>
							 

						<div id="carouselExampleIndicators<?php echo $k;?>" class="carousel slide" data-ride="carousel">
						  <div class="carousel-inner flexslider">
                                                         <div class="carousel-item slides active">
								                      <div class="row">
                                                                     
                                                                      <?php foreach($val_category->celebrity_categories as $val_category ){ 
                                                                     if(!empty($val_category->celebrity_detail)){?>
										<div class="col-md-3 celeb">
											<a href="../celebrities/celebrity_detail/<?php echo $val_category->celebrity_detail->id;?>"> <?php   echo $this->Html->image("medium/".$val_category->celebrity_detail->celebrity_photos[0]->image,array('height'=>'70px')); ?></a>
											<div class="product-info row">
												<h3 class="product-title"><a href="celebrities/celebrity_detail/<?php echo $val_category->celebrity_detail->id;?>"><?php echo $val_category->category_name; ?></a></h3>
                                                                                                <div class="col-md-6"><p class="product-price"><?php echo $val_category->celebrity_detail->name; ?></p></div>
                                                                                              <?php  if(!empty($AuthUser)) { 
                                                                                                  $count=0;
                                                                                                 // pr($val_category->celebrity_detail->event_follows);exit;
                                                                                                  foreach($val_category->celebrity_detail->event_follows as $follow){
                                                                                                      if($follow->user_id==$AuthUser['id']){
                                                                                                  
                                                                                                      $count=$count+1;
                                                                                                      }
                                                                                                  }
                                                                                                  
                                                                                               ?>
                                                                                                <div class="col-md-6"><p class="product-like" style="text-align:right;"><span class="follow"><a href="<?php if($count==0){?><?php echo $this->Url->build('/celebrities/follow/'.$val_category->celebrity_detail->id, true);  }else { echo "#"; }?>"><?php  if($count>0){echo 'Followed'; } else {echo 'Follow'; } ?></a> <?php if(!empty($val_category->celebrity_detail->event_follows)) { echo count($val_category->celebrity_detail->event_follows); }else { echo '0'; }?></span>
												
                                                                                                    </p></div>
                                                                                              <?php } ?>
											</div>
										</div>  <?php }} ?>
										

									
									</div>
								</div>
								

								

								  </div>
								  <a class="carousel-control-prev" href="#carouselExampleIndicators<?php echo $k;?>" role="button" data-slide="prev" >
									<span class="carousel-control-prev-icon" aria-hidden="true"> <img src="http://localhost/git_project/WebIdeasole/celebritycalling/webroot/images/left-arrow.png" alt="" class="arrow-left"> </span>
									<span class="sr-only">Previous</span>
								  </a>
								  <a class="carousel-control-next" href="#carouselExampleIndicators<?php echo $k;?>" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"> <img src="http://localhost/git_project/WebIdeasole/celebritycalling/webroot/images/right-arrow.png" alt="" class="arrow-right"> </span>
									<span class="sr-only">Next</span>
								  </a>
								</div>
                                                          
						<!-- <div class="page-navigation">
							<span class="page-numbers current">1</span>
							<a href="#" class="page-numbers">2</a>
							<a href="#" class="page-numbers">3</a>
						</div> -->
					</div>
                                    
                            </div><?php $k++;} ?>
			
<!--				<div class="row">
					<div class="col-lg-12 main-content">
						 <div class="shop-grid-fillter celeb-title2 clearfix">
						 	
						 	
							<p>Tollywood celebrity</p></div>
							 <div class="col-lg-3 form-group">
  							  <input type="text" class="form-control" id="usr" placeholder="Name">
							</div>
							<div class="col-lg-3 form-group">
							  
							  <select class="form-control" id="sel1">
							    <option>Select location:</option>
							    <option>Mumbai</option>
							    <option>Kolkata</option>
							    <option>Delhi</option>
							  </select>
							</div>

							<div class="col-lg-3 search-container">
							    <form>
								  <div class="input-group">
								    <input type="text" class="form-control" placeholder="Search">
								    <div class="input-group-btn">
								      <button class="btn btn-default" type="submit">
								        <i class="ion-ios-search-strong"></i>
								      </button>
								    </div>
								  </div>
								</form>
							  </div></div> 



							 <div class="field-select">
								<select name="s">
									<option value="">Default sorting</option>
									<option value="">Name</option>
								</select>
							</div> 
					

						<div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
						  <div class="carousel-inner flexslider">
							 <div class="carousel-item slides active">
								<div class="row">
									
										<div class="col-md-3 celeb">
											<a href="celebrity_details.html"><img src="images/celebrity/1.jpg" alt=""></a>
											<div class="product-info">
												<h3 class="product-title"><a href="celebrity_details.html">Sonu Nigam</a></h3>
												<p class="product-price">Bollywood</p>
												<p class="product-like"><a href="#"><i class="far fa-thumbs-up"></i> Like</a><span class="follow">Follow 29,210</span>
												</p>
												 
											</div>
										</div>
									
										<div class="col-md-3 celeb">
											<a href="celebrity_details.html"><img src="images/celebrity/2.jpg" alt=""></a>
											<div class="product-info">
												<h3 class="product-title"><a href="celebrity_details.html">Amitabh Bachchan</a></h3>
												<p class="product-price">Bollywood</p>
												<p class="product-like"><a href="#"><i class="far fa-thumbs-up"></i> Like</a><span class="follow">Follow 29,210</span>
												</p>
											</div>
										</div>

										<div class="col-md-3 celeb">
											<a href="celebrity_details.html"><img src="images/celebrity/3.jpg" alt=""></a>
											<div class="product-info">
												<h3 class="product-title"><a href="celebrity_details.html">Honey singh</a></h3>
												<p class="product-price">Bollywood</p>
												<p class="product-like"><a href="#"><i class="far fa-thumbs-up"></i> Like</a><span class="follow">Follow 29,210</span>
												</p>
											</div>
										</div>
										<div class="col-md-3 celeb">
											<a href="celebrity_details.html"><img src="images/celebrity/4.jpg" alt=""></a>
											<div class="product-info">
												<h3 class="product-title"><a href="celebrity_details.html">Aishwarya Rai</a></h3>
												<p class="product-price">Bollywood</p>
												<p class="product-like"><a href="#"><i class="far fa-thumbs-up"></i> Like</a><span class="follow">Follow 29,210</span>
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="carousel-item slides">
									<div class="row">
										<div class="col-md-3 celeb">
											<a href="celebrity_details.html"><img src="images/celebrity/5.jpg" alt=""></a>
											<div class="product-info">
												<h3 class="product-title"><a href="celebrity_details.html">Shahrukh khan</a></h3>
												<p class="product-price">Bollywood</p>
												<p class="product-like"><a href="#"><i class="far fa-thumbs-up"></i> Like</a><span class="follow">Follow 29,210</span>
												</p>
											</div>
										</div>
										<div class="col-md-3 celeb">
											<a href="celebrity_details.html"><img src="images/celebrity/6.jpg" alt=""></a>
											<div class="product-info">
												<h3 class="product-title"><a href="celebrity_details.html">katrina kaif</a></h3>
												<p class="product-price">Bollywood</p>
												<p class="product-like"><a href="#"><i class="far fa-thumbs-up"></i> Like</a><span class="follow">Follow 29,210</span>
												</p>
											</div>
										</div>
										<div class="col-md-3 celeb">
											<a href="celebrity_details.html"><img src="images/celebrity/7.jpg" alt=""></a>
											<div class="product-info">
												<h3 class="product-title"><a href="celebrity_details.html">Amir khan</a></h3>
												<p class="product-price">Bollywood</p>
												<p class="product-like"><a href="#"><i class="far fa-thumbs-up"></i> Like</a><span class="follow">Follow 29,210</span>
												</p>
											</div>
										</div>
										<div class="col-md-3 celeb">
											<a href="celebrity_details.html"><img src="images/celebrity/8.jpg" alt=""></a>
											<div class="product-info">
												<h3 class="product-title"><a href="celebrity_details.html">Deepika padukone</a></h3>
												<p class="product-price">Bollywood</p>
												<p class="product-like"><a href="#"><i class="far fa-thumbs-up"></i> Like</a><span class="follow">Follow 29,210</span>
												</p>
											</div>
										</div>
							         </div>
									</div>
									<div class="carousel-item slides">
									 <div class="row">
										<div class="col-md-3 celeb">
											<a href="celebrity_details.html"><img src="images/celebrity/9.jpg" alt=""></a>
											<div class="product-info">
												<h3 class="product-title"><a href="celebrity_details.html">priyanka chopra</a></h3>
												<p class="product-price">Bollywood</p>
												<p class="product-like"><a href="#"><i class="far fa-thumbs-up"></i> Like</a><span class="follow">Follow 29,210</span>
												</p>
											</div>
										</div>
										<div class="col-md-3 celeb">
											<a href="celebrity_details.html"><img src="images/celebrity/10.jpg" alt=""></a>
											<div class="product-info">
												<h3 class="product-title"><a href="celebrity_details.html">Alia bhatt</a></h3>
												<p class="product-price">Bollywood</p>
												<p class="product-like"><a href="#"><i class="far fa-thumbs-up"></i> Like</a><span class="follow">Follow 29,210</span>
												</p>
											</div>
										</div>	
										<div class="col-md-3 celeb">
											<a href="celebrity_details.html"><img src="images/celebrity/11.jpg" alt=""></a>
											<div class="product-info">
												<h3 class="product-title"><a href="celebrity_details.html">anushka sharma</a></h3>
												<p class="product-price">Bollywood</p>
												<p class="product-like"><a href="#"><i class="far fa-thumbs-up"></i> Like</a><span class="follow">Follow 29,210</span>
												</p>
											</div>
										</div>	
										<div class="col-md-3 celeb">
											<a href="celebrity_details.html"><img src="images/celebrity/12.jpg" alt=""></a>
											<div class="product-info">
												<h3 class="product-title"><a href="celebrity_details.html">kumar sanu</a></h3>
												<p class="product-price">Bollywood</p>
												<p class="product-like"><a href="#"><i class="far fa-thumbs-up"></i> Like</a><span class="follow">Follow 29,210</span>
												</p>
											</div>
										</div>
							         </div>
									</div>
								  </div>
								  <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button" data-slide="prev" >
									<span class="carousel-control-prev-icon" aria-hidden="true"> <img src="images/left-arrow.png" alt="" class="arrow-left"> </span>
									<span class="sr-only">Previous</span>
								  </a>
								  <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"> <img src="images/right-arrow.png" alt="" class="arrow-right"> </span>
									<span class="sr-only">Next</span>
								  </a>
								</div>
						
						
					</div>
				</div>
			
				<div class="row">
					<div class="col-lg-12 main-content">
						 <div class="shop-grid-fillter celeb-title2 clearfix">
						 	
						 	
							<p>Music Brand</p></div>
							 <div class="col-lg-3 form-group">
  							  <input type="text" class="form-control" id="usr" placeholder="Name">
							</div>
							<div class="col-lg-3 form-group">
							  
							  <select class="form-control" id="sel1">
							    <option>Select location:</option>
							    <option>Mumbai</option>
							    <option>Kolkata</option>
							    <option>Delhi</option>
							  </select>
							</div>

							<div class="col-lg-3 search-container">
							    <form>
								  <div class="input-group">
								    <input type="text" class="form-control" placeholder="Search">
								    <div class="input-group-btn">
								      <button class="btn btn-default" type="submit">
								        <i class="ion-ios-search-strong"></i>
								      </button>
								    </div>
								  </div>
								</form>
							  </div></div> 



							 <div class="field-select">
								<select name="s">
									<option value="">Default sorting</option>
									<option value="">Name</option>
								</select>
							</div> 
					

						<div id="carouselExampleIndicators3" class="carousel slide" data-ride="carousel">
						  <div class="carousel-inner flexslider">
							 <div class="carousel-item slides active">
								<div class="row">
									
										<div class="col-md-3 celeb">
											<a href="celebrity_details.html"><img src="images/celebrity/1.jpg" alt=""></a>
											<div class="product-info">
												<h3 class="product-title"><a href="celebrity_details.html">Sonu Nigam</a></h3>
												<p class="product-price">Bollywood</p>
												<p class="product-like"><a href="#"><i class="far fa-thumbs-up"></i> Like</a><span class="follow">Follow 29,210</span>
												</p>
												 
											</div>
										</div>
									
										<div class="col-md-3 celeb">
											<a href="celebrity_details.html"><img src="images/celebrity/2.jpg" alt=""></a>
											<div class="product-info">
												<h3 class="product-title"><a href="celebrity_details.html">Amitabh Bachchan</a></h3>
												<p class="product-price">Bollywood</p>
												<p class="product-like"><a href="#"><i class="far fa-thumbs-up"></i> Like</a><span class="follow">Follow 29,210</span>
												</p>
											</div>
										</div>

										<div class="col-md-3 celeb">
											<a href="celebrity_details.html"><img src="images/celebrity/3.jpg" alt=""></a>
											<div class="product-info">
												<h3 class="product-title"><a href="celebrity_details.html">Honey singh</a></h3>
												<p class="product-price">Bollywood</p>
												<p class="product-like"><a href="#"><i class="far fa-thumbs-up"></i> Like</a><span class="follow">Follow 29,210</span>
												</p>
											</div>
										</div>
										<div class="col-md-3 celeb">
											<a href="celebrity_details.html"><img src="images/celebrity/4.jpg" alt=""></a>
											<div class="product-info">
												<h3 class="product-title"><a href="celebrity_details.html">Aishwarya Rai</a></h3>
												<p class="product-price">Bollywood</p>
												<p class="product-like"><a href="#"><i class="far fa-thumbs-up"></i> Like</a><span class="follow">Follow 29,210</span>
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="carousel-item slides">
									<div class="row">
										<div class="col-md-3 celeb">
											<a href="celebrity_details.html"><img src="images/celebrity/5.jpg" alt=""></a>
											<div class="product-info">
												<h3 class="product-title"><a href="celebrity_details.html">Shahrukh khan</a></h3>
												<p class="product-price">Bollywood</p>
												<p class="product-like"><a href="#"><i class="far fa-thumbs-up"></i> Like</a><span class="follow">Follow 29,210</span>
												</p>
											</div>
										</div>
										<div class="col-md-3 celeb">
											<a href="celebrity_details.html"><img src="images/celebrity/6.jpg" alt=""></a>
											<div class="product-info">
												<h3 class="product-title"><a href="celebrity_details.html">katrina kaif</a></h3>
												<p class="product-price">Bollywood</p>
												<p class="product-like"><a href="#"><i class="far fa-thumbs-up"></i> Like</a><span class="follow">Follow 29,210</span>
												</p>
											</div>
										</div>
										<div class="col-md-3 celeb">
											<a href="celebrity_details.html"><img src="images/celebrity/7.jpg" alt=""></a>
											<div class="product-info">
												<h3 class="product-title"><a href="celebrity_details.html">Amir khan</a></h3>
												<p class="product-price">Bollywood</p>
												<p class="product-like"><a href="#"><i class="far fa-thumbs-up"></i> Like</a><span class="follow">Follow 29,210</span>
												</p>
											</div>
										</div>
										<div class="col-md-3 celeb">
											<a href="celebrity_details.html"><img src="images/celebrity/8.jpg" alt=""></a>
											<div class="product-info">
												<h3 class="product-title"><a href="celebrity_details.html">Deepika padukone</a></h3>
												<p class="product-price">Bollywood</p>
												<p class="product-like"><a href="#"><i class="far fa-thumbs-up"></i> Like</a><span class="follow">Follow 29,210</span>
												</p>
											</div>
										</div>
							         </div>
									</div>
									<div class="carousel-item slides">
									 <div class="row">
										<div class="col-md-3 celeb">
											<a href="celebrity_details.html"><img src="images/celebrity/9.jpg" alt=""></a>
											<div class="product-info">
												<h3 class="product-title"><a href="celebrity_details.html">priyanka chopra</a></h3>
												<p class="product-price">Bollywood</p>
												<p class="product-like"><a href="#"><i class="far fa-thumbs-up"></i> Like</a><span class="follow">Follow 29,210</span>
												</p>
											</div>
										</div>
										<div class="col-md-3 celeb">
											<a href="celebrity_details.html"><img src="images/celebrity/10.jpg" alt=""></a>
											<div class="product-info">
												<h3 class="product-title"><a href="celebrity_details.html">Alia bhatt</a></h3>
												<p class="product-price">Bollywood</p>
												<p class="product-like"><a href="#"><i class="far fa-thumbs-up"></i> Like</a><span class="follow">Follow 29,210</span>
												</p>
											</div>
										</div>	
										<div class="col-md-3 celeb">
											<a href="celebrity_details.html"><img src="images/celebrity/11.jpg" alt=""></a>
											<div class="product-info">
												<h3 class="product-title"><a href="celebrity_details.html">anushka sharma</a></h3>
												<p class="product-price">Bollywood</p>
												<p class="product-like"><a href="#"><i class="far fa-thumbs-up"></i> Like</a><span class="follow">Follow 29,210</span>
												</p>
											</div>
										</div>	
										<div class="col-md-3 celeb">
											<a href="celebrity_details.html"><img src="images/celebrity/12.jpg" alt=""></a>
											<div class="product-info">
												<h3 class="product-title"><a href="celebrity_details.html">kumar sanu</a></h3>
												<p class="product-price">Bollywood</p>
												<p class="product-like"><a href="#"><i class="far fa-thumbs-up"></i> Like</a><span class="follow">Follow 29,210</span>
												</p>
											</div>
										</div>
							         </div>
									</div>
								  </div>
								  <a class="carousel-control-prev" href="#carouselExampleIndicators3" role="button" data-slide="prev" >
									<span class="carousel-control-prev-icon" aria-hidden="true"> <img src="images/left-arrow.png" alt="" class="arrow-left"> </span>
									<span class="sr-only">Previous</span>
								  </a>
								  <a class="carousel-control-next" href="#carouselExampleIndicators3" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"> <img src="images/right-arrow.png" alt="" class="arrow-right"> </span>
									<span class="sr-only">Next</span>
								  </a>
								</div>
						
						 <div class="page-navigation">
							<span class="page-numbers current">1</span>
							<a href="#" class="page-numbers">2</a>
							<a href="#" class="page-numbers">3</a>
						</div> 
					</div>
				</div>-->
			</div>





			<!-- .container -->
		</main><!-- .site-main -->
                           
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
                  