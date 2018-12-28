        <?php if(!empty($data_all)){  $data_all= json_decode($data_all); } ?><main id="main" class="site-main">
			<div class="page-title background-cart">
				<div class="container">
					<h1><?php echo $data_all->name;?></h1>
					<div class="breadcrumbs">
						<ul>
							<li><a href="index.html">Home</a><span>/</span></li>
							<li><?php echo $data_all->name;?></li>
						</ul>
					</div><!-- .breadcrumbs -->
				</div>
			</div><!-- .page-title -->
			<div class="container">
				<div class="row">
					<div class="col-lg-8 main-content">
						<div class="shop-details-content">
							<article class="post">
								<span>Celebrity</span>
								<h2><?php echo $data_all->name;?></h2>
								<div class="shop-detail-img">
									<div id="owl-shop" class="shop-slider">
                                                                            <?php foreach($data_all->celebrity_photos as $val){ ?>
										<div class="item"><?php if(!empty($val->image)){ echo $this->Html->image("medium/".$val->image, ['alt' => 'event']); }?>
										</div>
                                                                            <?php } ?>
									</div>
								</div>
								<div class="follw-likes">
									<span> <i class="fa fa-film" aria-hidden="true"></i> <strong>5,000</strong> Shows</span> <span> <i class="fa fa-thumbs-up" aria-hidden="true"></i> <strong>1,20,000</strong> Likes </span>
								</div>
								<h3>Descriptions</h3>
                                                                <p><?php echo $data_all->description;?></p>
								<div class="widget-share">
										<h3 class="widget-title">Share this</h3>
										<div class="widget-content">
											<ul>
												<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
											</ul>
										</div>
									</div>
								<div class="reviews">
									<!-- <h3>Reviews (0)</h3> -->
									<form action="#" method="POST" id="shopdetailsForm" class="clearfix">
						  				<!-- <div class="field">
						  					<textarea rows="8" placeholder="Your review"></textarea>
						  				</div> -->
						  				<div class="field clearfix">
							  				<div class="align-left">
							  					<input type="text" value="" name="s" placeholder="Your Name" />
							  				</div>
							  				<div class="align-right">
							  					<input type="text" value="" name="s" placeholder="Your Email" />
							  				</div>
						  				</div>
						  				<div class="reviews-vote clearfix">
						  					<div class="vote">
							  					<span>Your Rating</span>
						  						<ul>
						  							<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
						  							<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
						  							<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
						  							<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
						  							<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
						  						</ul>
					  						</div>
									  		<button type="submit" value="Send Review" class="btn-primary">Submit Review</button>
									  	</div>
								  	</form>
								</div>
							</article>
						</div>
					</div><!-- .main-content -->
					<div class="col-lg-4 sidebar">
						<aside class="widget widget-action">
							<h3 class="widget-title">Video Gallery</h3>
							<!-- 21:9 aspect ratio -->
							<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
								  <div class="carousel-inner">
                                                                      <?php  $i=1; if(!empty($data_all->celebrity_videos)){ foreach($data_all->celebrity_videos as $val){ ?>
                                                                      
                                                                        <div class="carousel-item <?php if($i==1){ ?> active <?php } ?>">
																		
								      <iframe src="<?php echo $val->video_url;?>"></iframe>
								    </div>
                                                                      <?php $i++;} } ?>
								  
								  </div>
								  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"> <img src="images/left-arrow.png" alt="" class="arrow-left2"> </span>
									<span class="sr-only">Previous</span>
								  </a>
								  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"> <img src="images/right-arrow.png" alt="" class="arrow-right"> </span>
									<span class="sr-only">Next</span>
								  </a>
								</div>
						</aside><!-- .widget-search -->
						
						<aside class="widget widget-share">
								<h3 class="widget-title">Upcoming Events</h3>
							<div class="celebrity-details-event-listing">
                                                            
                                                                <?php if(!empty($data_event)){  $data_event= json_decode($data_event); } ?>
                                                            <?php if(!empty($data_event)){ foreach($data_event as $val){
                                                                if(!empty($val->event_detail)){
                                                                ?>
                                                            
								<div class="campaign-item">
									<a class="overlay" href="event_details.html">
										<?php if(!empty($val->image)){ echo $this->Html->image("medium/".$val->image, ['alt' => 'event']); }?>
										<span class="ion-ios-search-strong"></span>
									</a>
									<div class="campaign-box">
										<a href="#" class="category">Design &amp; Art</a>
										<h3><a href="event_details.html"><?php echo $val->event_detail->event_title;?></a></h3>
										<div class="campaign-description"><?php echo $val->event_detail->event_description;?></div>
										<div class="campaign-author"><a class="author-icon" href="#"><img src="images/author-01.png" alt=""></a>by <a class="author-name" href="#">Samino</a></div>
										<div class="process">
											<div class="raised"><span></span></div>
											<div class="process-info">
												<div class="process-pledged"><span><i class="fa fa-inr" aria-hidden="true"></i>3900</span>pledged</div>
												<div class="process-funded"><span>69%</span>funded</div>
												<div class="process-time"><span>33</span>days ago</div>
											</div>
										</div>
									</div>
								</div>
                                                            
                                                            <?php }}} ?>
<!--								<div class="campaign-item">
									<a class="overlay" href="event_details.html">
										<img src="images/3.jpg" alt="">
										<span class="ion-ios-search-strong"></span>
									</a>
									<div class="campaign-box">
										<a href="#" class="category">Design &amp; Art</a>
										<h3><a href="event_details.html">Bring back Fun House</a></h3>
										<div class="campaign-description">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</div>
										<div class="campaign-author"><a class="author-icon" href="#"><img src="images/author-01.png" alt=""></a>by <a class="author-name" href="#">Samino</a></div>
										<div class="process">
											<div class="raised"><span></span></div>
											<div class="process-info">
												<div class="process-pledged"><span><i class="fa fa-inr" aria-hidden="true"></i>3900</span>pledged</div>
												<div class="process-funded"><span>69%</span>funded</div>
												<div class="process-time"><span>33</span>days ago</div>
											</div>
										</div>
									</div>
								</div>
								<div class="campaign-item">
									<a class="overlay" href="event_details.html">
										<img src="images/4.jpg" alt="">
										<span class="ion-ios-search-strong"></span>
									</a>
									<div class="campaign-box">
										<a href="#" class="category">Technology</a>
										<h3><a href="event_details.html">Redefine Your VR Experience</a></h3>
										<div class="campaign-description">I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot.</div>
										<div class="campaign-author"><a class="author-icon" href="#"><img src="images/author-02.png" alt=""></a>by <a class="author-name" href="#">Sabato Alterio</a></div>
										<div class="process">
											<div class="raised"><span></span></div>
											<div class="process-info">
												<div class="process-pledged"><span><i class="fa fa-inr" aria-hidden="true"></i>1950</span>pledged</div>
												<div class="process-funded"><span>70%</span>funded</div>
												<div class="process-time"><span>23</span>days ago</div>
											</div>
										</div>
									</div>
								</div>
								<div class="campaign-item">
										<a class="overlay" href="event_details.html">
											<img src="images/5.jpg" alt="">
											<span class="ion-ios-search-strong"></span>
										</a>
										<div class="campaign-box">
											<a href="#" class="category">Technology</a>
											<h3><a href="event_details.html">Smart Wallet with Solar Charge</a></h3>
											<div class="campaign-description">A wonderful serenity has taken possession of my entire soul, like these sweet mornings.</div>
											<div class="campaign-author"><a class="author-icon" href="#"><img src="images/author-03.png" alt=""></a>by <a class="author-name" href="#">Andrew Noah</a></div>
											<div class="process">
												<div class="raised"><span></span></div>
												<div class="process-info">
													<div class="process-pledged"><span><i class="fa fa-inr" aria-hidden="true"></i>3670</span>pledged</div>
													<div class="process-funded"><span>58%</span>funded</div>
													<div class="process-time"><span>21</span>days ago</div>
												</div>
											</div>
										</div>
								</div>	
								<div class="campaign-item">
										<a class="overlay" href="event_details.html">
											<img src="images/6.jpg" alt="">
											<span class="ion-ios-search-strong"></span>
										</a>
										<div class="campaign-box">
											<a href="#" class="category">Technology</a>
											<h3><a href="event_details.html">Smart Wallet with Solar Charge</a></h3>
											<div class="campaign-description">A wonderful serenity has taken possession of my entire soul, like these sweet mornings.</div>
											<div class="campaign-author"><a class="author-icon" href="#"><img src="images/author-03.png" alt=""></a>by <a class="author-name" href="#">Andrew Noah</a></div>
											<div class="process">
												<div class="raised"><span></span></div>
												<div class="process-info">
													<div class="process-pledged"><span> <i class="fa fa-inr" aria-hidden="true"></i> 3670</span>pledged</div>
													<div class="process-funded"><span>58%</span>funded</div>
													<div class="process-time"><span>21</span>days ago</div>
												</div>
											</div>
										</div>
								</div>	-->


							</div>
						</aside>
						<aside class="widget widget-popular">
							<h3 class="widget-title">Previous Events</h3>
							<ul>
								<li>
									<a href="#"><img src="images/6.jpg" alt=""></a>
									<h4><a href="#">16 Productivity Tips Every</a></h4>
									<div class="campaign-box">
											<div class="process ml-5">
													<div class="process-info ml-5">
														<div class="process-funded"><span class="new-like">69,000</span>funded</div>
														<div class="process-time"><span class="new-like">33,000</span>Crowd</div>
													</div>
												</div>
												</div>
								</li>
								<li>
									<a href="#"><img src="images/6.jpg" alt=""></a>
									<h4><a href="#">Audio Post World of Education</a></h4>
									<div class="campaign-box">
											<div class="process ml-5">
													<div class="process-info ml-5">
														<div class="process-funded"><span class="new-like">69,000</span>funded</div>
														<div class="process-time"><span class="new-like">33,000</span>Crowd</div>
													</div>
												</div>
												</div>
								</li>
								<li>
									<a href="#"><img src="images/6.jpg" alt=""></a>
									<h4><a href="#">Quote Post World of Education</a></h4>
									<div class="campaign-box">
											<div class="process ml-5">
													<div class="process-info ml-5">
														<div class="process-funded"><span class="new-like">69,000</span>funded</div>
														<div class="process-time"><span class="new-like">33,000</span>Crowd</div>
													</div>
												</div>
												</div>
								</li>
							</ul>
						</aside>
					</div>
				</div>
			</div>	
		</main><!-- .site-main -->

	