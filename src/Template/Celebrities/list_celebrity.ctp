	<main id="main" class="site-main">
			<div class="page-title background-cart">
				<div class="container">
					<h1>Celebrity List</h1>
					<div class="breadcrumbs">
						<ul>
							<li><a href="index.html">Home</a><span>/</span></li>
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
						    <input type="text" class="form-control " placeholder="Name">
						    <div class="input-group-append"> 
								<select class="form-control location" id="sel1">
								<option>Select location</option>
								<option>Mumbai</option>
								<option>Kolkata</option>
								<option>Delhi</option>
								</select>
							</div>
						    <div class="input-group-append">
						      <button class="btn srch" type="submit">Search</button>  
						     </div>
						  </div>
					</div>
				</div>
			</div>
			<div class="container">
                            
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
											<div class="product-info">
												<h3 class="product-title"><a href="celebrities/celebrity_detail/<?php echo $val_category->celebrity_detail->id;?>"><?php echo $val_category->category_name; ?></a></h3>
												<p class="product-price"><?php echo $val_category->celebrity_detail->name; ?></p>
												<p class="product-like"><span class="follow">Follow 29,210</span>
												</p>
												 
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
               