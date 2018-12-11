<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;


?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        PartyWithStar
    </title>

   
    <link href="https://fonts.googleapis.com/css?family=Raleway:500i|Roboto:300,400,700|Roboto+Mono" rel="stylesheet">
     <?php    
        
echo $this->Html->css('style.css');
echo $this->Html->css('responsive.css');
                ?>
   
    <link rel="shortcut icon" href="favicon.ico" />
   
</head>
<body class="home">
    

	<div class="preloading">
		<div class="preloader loading">
		  <span class="slice"></span>
		  <span class="slice"></span>
		  <span class="slice"></span>
		  <span class="slice"></span>
		  <span class="slice"></span>
		  <span class="slice"></span>
		</div>
	</div>
	<div id="wrapper">
		<header id="header" class="site-header">
			<div class="top-header clearfix">
				<div class="container">
					<ul class="socials-top">
						<li><a target="_Blank" href="http://www.facebook.com"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
			  			<li><a target="_Blank" href="http://www.twitter.com"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
			  			<li><a target="_Blank" href="http://www.google.com"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
			  			<li><a target="_Blank" href="http://www.linkedin.com"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
			  			<li><a target="_Blank" href="http://www.youtube.com"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
					</ul>
					<div class="phone">Call Now +1 123 456 789</div>
				</div>
			</div>
			<div class="content-header">
				<div class="container">
					<div class="site-brand">
						<a href="index.html">
							<h2 class="logo-name">Celebrity</h2>
						</a>
					</div><!-- .site-brand -->
					<div class="right-header">					
						<nav class="main-menu">
							<button class="c-hamburger c-hamburger--htx"><span></span></button>
							<ul>
								<li>
									<a href="index.html">Home<i class="fa fa-caret-down" aria-hidden="true"></i></a>
									<!-- <ul class="sub-menu">
										<li><a href="index.html">Home v1</a></li>
										<li><a href="index_2.html">Home v2</a></li>
										<li><a href="index_3.html">Home v3</a></li>
										<li><a href="index_gradient.html">Home Gradient</a></li>
									</ul> -->
								</li>
								<!-- <li>
									<a href="#">Explore<i class="fa fa-caret-down" aria-hidden="true"></i></a>
									<ul class="sub-menu">
										<li><a href="explore_layout_one.html">Explore Layout One</a></li>
										<li><a href="explore_layout_two.html">Explore Layout Two</a></li>
										<li><a href="explore_layout_three.html">Explore Layout Three</a></li>
									</ul>
								</li> -->
								<li>
								<a href="event_listing.html">Events<i class="fa fa-caret-down" aria-hidden="true"></i></a>
								<!-- <ul class="sub-menu">
									<li><a href="event_details.html">Create a campaign</a></li>
									<li><a href="update_a_campaign.html">Update a campaign</a></li>
								</ul> -->
							</li>
							<li>
									<a href="celebrity_list.html">Celebrities<i class="fa fa-caret-down" aria-hidden="true"></i></a>
									<!-- <ul class="sub-menu">
										<li><a href="event_details.html">Create a campaign</a></li>
										<li><a href="update_a_campaign.html">Update a campaign</a></li>
									</ul> -->
								</li>
							<li>
								<a href="about_us.html">About Us</a>
								<!-- <ul class="sub-menu">
									<li><a href="coming_soon.html">Coming Soon</a></li>
									<li><a href="about_us.html">About Us</a></li>
									<li><a href="404.html">404</a></li>
									<li><a href="login.html">Login</a></li>
									<li><a href="register.html">Register</a></li>
									<li><a href="faq.html">Faq</a></li>
									<li><a href="event_details.html">Campaign details</a></li>
								</ul> -->
							</li>
								<li>
									<a href="blog.html">Blog</a>
									<!-- <ul class="sub-menu">
										<li><a href="blog_grid.html">Blog Grid</a></li>
										<li><a href="blog_list.html">Blog List</a></li>
										<li><a href="blog_list_sidebar.html">Blog Grid Sidebar</a></li>
										<li><a href="blog_details.html">Blog Details</a></li>
									</ul> -->
								</li>
								<!-- <li>
									<a href="#">Shop<i class="fa fa-caret-down" aria-hidden="true"></i></a>
									<ul class="sub-menu">
										<li><a href="shop-grid.html">Shop Grid</a></li>
										<li><a href="event_details.html">Shop Details</a></li>
										<li><a href="cart.html">Cart</a></li>
										<li><a href="checkout.html">Checkout</a></li>
									</ul>
								</li> -->
								<li><a href="contact_us.html">Contact</a></li>
								<!-- <li>
									<a href="#">Account<i class="fa fa-caret-down" aria-hidden="true"></i></a>
									<ul class="sub-menu">
										<li><a href="dashboard.html">Dashboard</a></li>
										<li><a href="profile.html">Profile</a></li>
										<li><a href="account_my_campaigns.html">My Campaigns</a></li>
										<li><a href="account_pledges_received.html">Pledges Received</a></li>
										<li><a href="account_backed_campaigns.html">Backed Campaigns</a></li>
										<li><a href="account_rewards.html">Rewards</a></li>
										<li><a href="account_payments.html">Payments</a></li>
									</ul>
								</li> -->
								<li><a href="faq.html">Faq</a></li>
							</ul>
						</nav><!-- .main-menu -->
						<div class="search-icon">
							<a href="#" class="ion-ios-search-strong"></a>
							<div class="form-search"></div>
							<form action="#" method="POST" id="searchForm">
						  		<input type="text" value="" name="search" placeholder="Search..." />
						    	<button type="submit" value=""><span class="ion-ios-search-strong"></span></button>
						  	</form>
						</div>	

						<div class="login login-button">
							<a href="login.html" class="btn-primary">Login</a>
						</div><!-- .login -->
					</div><!--. right-header -->
				</div><!-- .container -->
			</div>
		</header><!-- .site-header -->

		<main id="main" class="site-main">
			<div class="sideshow">
				<div class="container">
					<div class="sideshow-content">
						<h1 class="wow fadeInUp" data-wow-delay=".1s">Bring new ideas to life, anywhere</h1>
						<div class="sideshow-description wow fadeInUp" data-wow-delay=".1s">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
						<div class="process wow fadeInUp" data-scroll-nav="1">
							<div class="raised"><span></span></div>
							<div class="process-info">
								<div class="process-funded"><span>46%</span>funded</div>
								<div class="process-pledged"><span><i class="fa fa-inr" aria-hidden="true"></i> 46,000</span>pledged</div>
								<div class="process-backers"><span>32</span>backers</div>
								<div class="process-time"><span>21</span>days ago</div>
							</div>
						</div>
						<div class="button wow fadeInUp" data-wow-delay="0.1s">
							<a href="event_listing.html" class="btn-secondary">See Events</a>
							<a href="event_details.html" class="btn-primary">Buy Now</a>
						</div>
					</div><!-- .sideshow-content -->
				</div>
			</div><!-- .sideshow -->
			
			<div class="project-love">
				<div class="container">
					<h2 class="title">Projects We Love</h2>
					<div class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</div>
					<div class="col-md-8 mx-auto photo-tabs">
						<ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">
							<li class="nav-item">
							  <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Bollywood</a>
							</li>
							<li class="nav-item">
							  <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Hollywood</a>
							</li>
							<li class="nav-item">
							  <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Tollywood</a>
							</li>
							<li class="nav-item">
							  <a class="nav-link" id="pills-about-tab" data-toggle="pill" href="#pills-about" role="tab" aria-controls="pills-about" aria-selected="false">Music Brand</a>
							</li>
						  </ul>
					</div>

					<div class="col-md-12 pt-3 pb-5">
						<div class="tab-content" id="pills-tabContent">
						  <div class="tab-pane active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

							  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
								  <div class="carousel-inner">
									<div class="carousel-item active">
										<div class="row">
										<div class="col-md-4">
											<div class="popular-project">
												<div class="project-content">
														<img src="images/dashboard-avatar.png" alt="">
														<h4>290+ Events</h4>
													</div>
											<p>Discover projects just for you and get great recommendations when you select your interests.</p>
											<a href="event_details.html" class="btn-primary">Event Details</a>
										</div>
										</div>
										<div class="col-md-8 pls-col">
												<div>
														<div class="project-love-item clearfix">
															<a class="project-love-image" href="event_details.html"><img src="images/bollywood.jpg" alt=""></a>
															<div class="project-love-item-content project-love-box">
																<a href="#" class="category">Bollywood</a>
																<h3><a href="event_details.html">The Best Celebrity</a></h3>
																<div class="project-love-description">One smart, reusable notebook to last the rest of your life? That's not magic, that's the Everlast.</div>
																<div class="project-love-author">
																	<div class="author-profile">
																		<a class="author-avatar" href="#"><img src="images/author-01.png" alt=""></a>by <a class="author-name" href="#">John Doe</a>
																	</div>
																	<div class="author-address"><span class="ion-location"></span>Mumbai, Maharashtra, India</div>
																</div>
																<div class="process">
																	<div class="raised"><span></span></div>
																	<div class="process-info">
																		<div class="process-pledged"><span><i class="fa fa-inr" aria-hidden="true"></i> 5000</span>pledged</div>
																		<div class="process-funded"><span>41%</span>funded</div>
																		<div class="process-time"><span>37</span>backers</div>
																		<div class="process-time"><span>23</span>days ago</div>
																		<div class="process-time"><span>100</span>Likes</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
											</div>
										</div>
									</div>
									<div class="carousel-item">
											<div class="row">
													<div class="col-md-4">
														<div class="popular-project ">
														<div class="project-content">
															<img src="images/dashboard-avatar.png" alt="">
															<h4>290+ Events</h4>
														</div>
														<p>Discover projects just for you and get great recommendations when you select your interests.</p>
														<a href="event_details.html" class="btn-primary">Event Details</a>
														</div>
													</div>
													<div class="col-md-8 pls-col">
															<div>
																	<div class="project-love-item clearfix">
																		<a class="project-love-image" href="event_details.html"><img src="images/bollywood.jpg" alt=""></a>
																		<div class="project-love-item-content project-love-box">
																			<a href="#" class="category">Bollywood</a>
																			<h3><a href="event_details.html">The Best Celebrity</a></h3>
																			<div class="project-love-description">One smart, reusable notebook to last the rest of your life? That's not magic, that's the Everlast.</div>
																			<div class="project-love-author">
																				<div class="author-profile">
																					<a class="author-avatar" href="#"><img src="images/author-01.png" alt=""></a>by <a class="author-name" href="#">John Doe</a>
																				</div>
																				<div class="author-address"><span class="ion-location"></span>Mumbai, Maharashtra, India</div>
																			</div>
																			<div class="process">
																				<div class="raised"><span></span></div>
																				<div class="process-info">
																					<div class="process-pledged"><span><i class="fa fa-inr" aria-hidden="true"></i> 5000</span>pledged</div>
																					<div class="process-funded"><span>41%</span>funded</div>
																					<div class="process-time"><span>37</span>backers</div>
																					<div class="process-time"><span>23</span>days ago</div>
																					<div class="process-time"><span>100</span>Likes</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
														</div>
													</div>
									</div>
									<div class="carousel-item">
											<div class="row">
													<div class="col-md-4">
															<div class="popular-project ">
															<div class="project-content">
																	<img src="images/dashboard-avatar.png" alt="">
																	<h4>290+ Events</h4>
																</div>
																<p>Discover projects just for you and get great recommendations when you select your interests.</p>
																<a href="event_details.html" class="btn-primary">Event Details</a>
													</div>
												</div>
													<div class="col-md-8 pls-col">
															<div>
																	<div class="project-love-item clearfix">
																		<a class="project-love-image" href="event_details.html"><img src="images/bollywood.jpg" alt=""></a>
																		<div class="project-love-item-content project-love-box">
																			<a href="#" class="category">Bollywood</a>
																			<h3><a href="event_details.html">The Best Celebrity</a></h3>
																			<div class="project-love-description">One smart, reusable notebook to last the rest of your life? That's not magic, that's the Everlast.</div>
																			<div class="project-love-author">
																				<div class="author-profile">
																					<a class="author-avatar" href="#"><img src="images/author-01.png" alt=""></a>by <a class="author-name" href="#">John Doe</a>
																				</div>
																				<div class="author-address"><span class="ion-location"></span>Mumbai, Maharashtra, India</div>
																			</div>
																			<div class="process">
																				<div class="raised"><span></span></div>
																				<div class="process-info">
																					<div class="process-pledged"><span><i class="fa fa-inr" aria-hidden="true"></i> 5000</span>pledged</div>
																					<div class="process-funded"><span>41%</span>funded</div>
																					<div class="process-time"><span>37</span>backers</div>
																					<div class="process-time"><span>23</span>days ago</div>
																					<div class="process-time"><span>100</span>Likes</div>
																				</div>
																			</div>
																		</div>
																	</div>
																</div>
														</div>
													</div>
									</div>
								  </div>
								  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"> <img src="images/left-arrow.png" alt=""> </span>
									<span class="sr-only">Previous</span>
								  </a>
								  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"> <img src="images/right-arrow.png" alt=""> </span>
									<span class="sr-only">Next</span>
								  </a>
								</div>
						  </div>
						  <div class="tab-pane" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

							  <div id="carouselExampleIndicators-two" class="carousel slide" data-ride="carousel">
									<div class="carousel-inner">
											<div class="carousel-item active">
												<div class="row">
												<div class="col-md-4">
													<div class="popular-project ">
														<div class="project-content">
																<img src="images/dashboard-avatar.png" alt="">
																<h4>290+ Events</h4>
															</div>
													<p>Discover projects just for you and get great recommendations when you select your interests.</p>
													<a href="event_details.html" class="btn-primary">Event Details</a>
												</div>
												</div>
												<div class="col-md-8 pls-col">
														<div>
																<div class="project-love-item clearfix">
																	<a class="project-love-image" href="event_details.html"><img src="images/hollywood.jpg" alt=""></a>
										s							<div class="project-love-item-content project-love-box">
																		<a href="#" class="category">HollyWood</a>
																		<h3><a href="event_details.html">The Best Celebrity</a></h3>
																		<div class="project-love-description">One smart, reusable notebook to last the rest of your life? That's not magic, that's the Everlast.</div>
																		<div class="project-love-author">
																			<div class="author-profile">
																				<a class="author-avatar" href="#"><img src="images/placeholder/40x40.png" alt=""></a>by <a class="author-name" href="#">John Doe</a>
																			</div>
																			<div class="author-address"><span class="ion-location"></span>Mumbai, Maharashtra, India</div>
																		</div>
																		<div class="process">
																			<div class="raised"><span></span></div>
																			<div class="process-info">
																				<div class="process-pledged"><span><i class="fa fa-inr" aria-hidden="true"></i> 5000</span>pledged</div>
																				<div class="process-funded"><span>41%</span>funded</div>
																				<div class="process-time"><span>37</span>backers</div>
																				<div class="process-time"><span>23</span>days ago</div>
																				<div class="process-time"><span>100</span>Likes</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
													</div>
												</div>
											</div>
											<div class="carousel-item">
													<div class="row">
															<div class="col-md-4">
															<div class="popular-project">
																<div class="project-content">
																	<img src="images/dashboard-avatar.png" alt="">
																	<h4>290+ Events</h4>
																</div>
																<p>Discover projects just for you and get great recommendations when you select your interests.</p>
																<a href="event_details.html" class="btn-primary">Event Details</a>
															</div>
															</div>
															<div class="col-md-8 pls-col">
																	<div>
																			<div class="project-love-item clearfix">
																				<a class="project-love-image" href="event_details.html"><img src="images/hollywood.jpg" alt=""></a>
																				<div class="project-love-item-content project-love-box">
																					<a href="#" class="category">HollyWood</a>
																					<h3><a href="event_details.html">The Best Celebrity</a></h3>
																					<div class="project-love-description">One smart, reusable notebook to last the rest of your life? That's not magic, that's the Everlast.</div>
																					<div class="project-love-author">
																						<div class="author-profile">
																							<a class="author-avatar" href="#"><img src="images/placeholder/40x40.png" alt=""></a>by <a class="author-name" href="#">John Doe</a>
																						</div>
																						<div class="author-address"><span class="ion-location"></span>Mumbai, Maharashtra, India</div>
																					</div>
																					<div class="process">
																						<div class="raised"><span></span></div>
																						<div class="process-info">
																							<div class="process-pledged"><span><i class="fa fa-inr" aria-hidden="true"></i> 5000</span>pledged</div>
																							<div class="process-funded"><span>41%</span>funded</div>
																							<div class="process-time"><span>37</span>backers</div>
																							<div class="process-time"><span>23</span>days ago</div>
																							<div class="process-time"><span>100</span>Likes</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																</div>
															</div>
											</div>
											<div class="carousel-item">
													<div class="row">
															<div class="col-md-4">
															<div class="popular-project">
																	<div class="project-content">
																			<img src="images/dashboard-avatar.png" alt="">
																			<h4>290+ Events</h4>
																		</div>
																		<p>Discover projects just for you and get great recommendations when you select your interests.</p>
																<a href="event_details.html" class="btn-primary">Event Details</a>
															</div>
															</div>
															<div class="col-md-8 pls-col">
																	<div>
																			<div class="project-love-item clearfix">
																				<a class="project-love-image" href="event_details.html"><img src="images/hollywood.jpg" alt=""></a>
																				<div class="project-love-item-content project-love-box">
																					<a href="#" class="category">HollyWood</a>
																					<h3><a href="event_details.html">The Best Celebrity</a></h3>
																					<div class="project-love-description">One smart, reusable notebook to last the rest of your life? That's not magic, that's the Everlast.</div>
																					<div class="project-love-author">
																						<div class="author-profile">
																							<a class="author-avatar" href="#"><img src="images/placeholder/40x40.png" alt=""></a>by <a class="author-name" href="#">John Doe</a>
																						</div>
																						<div class="author-address"><span class="ion-location"></span>Mumbai, Maharashtra, India</div>
																					</div>
																					<div class="process">
																						<div class="raised"><span></span></div>
																						<div class="process-info">
																							<div class="process-pledged"><span><i class="fa fa-inr" aria-hidden="true"></i> 5000</span>pledged</div>
																							<div class="process-funded"><span>41%</span>funded</div>
																							<div class="process-time"><span>37</span>backers</div>
																							<div class="process-time"><span>23</span>days ago</div>
																							<div class="process-time"><span>100</span>Likes</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																</div>
															</div>
											</div>
										  </div>
										  <a class="carousel-control-prev" href="#carouselExampleIndicators-two" role="button" data-slide="prev">
											<span class="carousel-control-prev-icon" aria-hidden="true"> <img src="images/left-arrow.png" alt=""> </span>
											<span class="sr-only">Previous</span>
										  </a>
										  <a class="carousel-control-next" href="#carouselExampleIndicators-two" role="button" data-slide="next">
											<span class="carousel-control-next-icon" aria-hidden="true"> <img src="images/right-arrow.png" alt=""> </span>
											<span class="sr-only">Next</span>
										  </a>
								</div>
						  </div>
						  <div class="tab-pane" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

							  <div id="carouselExampleIndicators-three" class="carousel slide" data-ride="carousel">
									<div class="carousel-inner">
											<div class="carousel-item active">
												<div class="row">
												<div class="col-md-4">
												<div class="popular-project">
														<div class="project-content">
																<img src="images/dashboard-avatar.png" alt="">
																<h4>290+ Events</h4>
															</div>
													<p>Discover projects just for you and get great recommendations when you select your interests.</p>
													<a href="event_details.html" class="btn-primary">Event Details</a>
												</div>
												</div>
												<div class="col-md-8 pls-col">
														<div>
																<div class="project-love-item clearfix">
																	<a class="project-love-image" href="event_details.html"><img src="images/bollywood.jpg" alt=""></a>
																	<div class="project-love-item-content project-love-box">
																		<a href="#" class="category">Tollywood</a>
																		<h3><a href="event_details.html">The Best Celebrity</a></h3>
																		<div class="project-love-description">One smart, reusable notebook to last the rest of your life? That's not magic, that's the Everlast.</div>
																		<div class="project-love-author">
																			<div class="author-profile">
																				<a class="author-avatar" href="#"><img src="images/placeholder/40x40.png" alt=""></a>by <a class="author-name" href="#">John Doe</a>
																			</div>
																			<div class="author-address"><span class="ion-location"></span>Mumbai, Maharashtra, India</div>
																		</div>
																		<div class="process">
																			<div class="raised"><span></span></div>
																			<div class="process-info">
																				<div class="process-pledged"><span><i class="fa fa-inr" aria-hidden="true"></i> 5000</span>pledged</div>
																				<div class="process-funded"><span>41%</span>funded</div>
																				<div class="process-time"><span>37</span>backers</div>
																				<div class="process-time"><span>23</span>days ago</div>
																				<div class="process-time"><span>100</span>Likes</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
													</div>
												</div>
											</div>
											<div class="carousel-item">
													<div class="row">
															<div class="col-md-4">
															<div class="popular-project">
																<div class="project-content">
																	<img src="images/dashboard-avatar.png" alt="">
																	<h4>290+ Events</h4>
																</div>
																<p>Discover projects just for you and get great recommendations when you select your interests.</p>
																<a href="event_details.html" class="btn-primary">Event Details</a>
															</div>
															</div>
															<div class="col-md-8 pls-col">
																	<div>
																			<div class="project-love-item clearfix">
																				<a class="project-love-image" href="event_details.html"><img src="images/bollywood.jpg" alt=""></a>
																				<div class="project-love-item-content project-love-box">
																					<a href="#" class="category">Tollywood</a>
																					<h3><a href="event_details.html">The Best Celebrity</a></h3>
																					<div class="project-love-description">One smart, reusable notebook to last the rest of your life? That's not magic, that's the Everlast.</div>
																					<div class="project-love-author">
																						<div class="author-profile">
																							<a class="author-avatar" href="#"><img src="images/placeholder/40x40.png" alt=""></a>by <a class="author-name" href="#">John Doe</a>
																						</div>
																						<div class="author-address"><span class="ion-location"></span>Mumbai, Maharashtra, India</div>
																					</div>
																					<div class="process">
																						<div class="raised"><span></span></div>
																						<div class="process-info">
																							<div class="process-pledged"><span><i class="fa fa-inr" aria-hidden="true"></i> 5000</span>pledged</div>
																							<div class="process-funded"><span>41%</span>funded</div>
																							<div class="process-time"><span>37</span>backers</div>
																							<div class="process-time"><span>23</span>days ago</div>
																							<div class="process-time"><span>100</span>Likes</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																</div>
															</div>
											</div>
											<div class="carousel-item">
													<div class="row">
															<div class="col-md-4">
															<div class="popular-project">
																	<div class="project-content">
																			<img src="images/dashboard-avatar.png" alt="">
																			<h4>290+ Events</h4>
																		</div>
																		<p>Discover projects just for you and get great recommendations when you select your interests.</p>
																		<a href="event_details.html" class="btn-primary">Event Details</a>
															</div>
															</div>
															<div class="col-md-8 pls-col">
																	<div>
																			<div class="project-love-item clearfix">
																				<a class="project-love-image" href="event_details.html"><img src="images/bollywood.jpg" alt=""></a>
																				<div class="project-love-item-content project-love-box">
																					<a href="#" class="category">Tollywood</a>
																					<h3><a href="event_details.html">The Best Celebrity</a></h3>
																					<div class="project-love-description">One smart, reusable notebook to last the rest of your life? That's not magic, that's the Everlast.</div>
																					<div class="project-love-author">
																						<div class="author-profile">
																							<a class="author-avatar" href="#"><img src="images/placeholder/40x40.png" alt=""></a>by <a class="author-name" href="#">John Doe</a>
																						</div>
																						<div class="author-address"><span class="ion-location"></span>Mumbai, Maharashtra, India</div>
																					</div>
																					<div class="process">
																						<div class="raised"><span></span></div>
																						<div class="process-info">
																							<div class="process-pledged"><span><i class="fa fa-inr" aria-hidden="true"></i> 5000</span>pledged</div>
																							<div class="process-funded"><span>41%</span>funded</div>
																							<div class="process-time"><span>37</span>backers</div>
																							<div class="process-time"><span>23</span>days ago</div>
																							<div class="process-time"><span>100</span>Likes</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																</div>
															</div>
											</div>
										  </div>
										  <a class="carousel-control-prev" href="#carouselExampleIndicators-three" role="button" data-slide="prev">
											<span class="carousel-control-prev-icon" aria-hidden="true"> <img src="images/left-arrow.png" alt=""> </span>
											<span class="sr-only">Previous</span>
										  </a>
										  <a class="carousel-control-next" href="#carouselExampleIndicators-three" role="button" data-slide="next">
											<span class="carousel-control-next-icon" aria-hidden="true"> <img src="images/right-arrow.png" alt=""> </span>
											<span class="sr-only">Next</span>
										  </a>
								</div> 
						  </div>
						  <div class="tab-pane" id="pills-about" role="tabpanel" aria-labelledby="pills-about-tab">

							  <div id="carouselExampleIndicators-four" class="carousel slide" data-ride="carousel">
									<div class="carousel-inner">
											<div class="carousel-item active">
												<div class="row">
												<div class="col-md-4">
												<div class="popular-project">
														<div class="project-content">
																<img src="images/dashboard-avatar.png" alt="">
																<h4>290+ Events</h4>
															</div>
													<p>Discover projects just for you and get great recommendations when you select your interests.</p>
													<a href="event_details.html" class="btn-primary">Event Details</a>
												</div>
												</div>
												<div class="col-md-8 pls-col">
														<div>
																<div class="project-love-item clearfix">
																	<a class="project-love-image" href="event_details.html"><img src="images/musical.jpg" alt=""></a>
																	<div class="project-love-item-content project-love-box">
																		<a href="#" class="category">Music</a>
																		<h3><a href="event_details.html">The Best Celebrity</a></h3>
																		<div class="project-love-description">One smart, reusable notebook to last the rest of your life? That's not magic, that's the Everlast.</div>
																		<div class="project-love-author">
																			<div class="author-profile">
																				<a class="author-avatar" href="#"><img src="images/placeholder/40x40.png" alt=""></a>by <a class="author-name" href="#">John Doe</a>
																			</div>
																			<div class="author-address"><span class="ion-location"></span>Mumbai, Maharashtra, India</div>
																		</div>
																		<div class="process">
																			<div class="raised"><span></span></div>
																			<div class="process-info">
																				<div class="process-pledged"><span><i class="fa fa-inr" aria-hidden="true"></i> 5000</span>pledged</div>
																				<div class="process-funded"><span>41%</span>funded</div>
																				<div class="process-time"><span>37</span>backers</div>
																				<div class="process-time"><span>23</span>days ago</div>
																				<div class="process-time"><span>100</span>Likes</div>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
													</div>
												</div>
											</div>
											<div class="carousel-item">
													<div class="row">
															<div class="col-md-4">
															<div class="popular-project">
																<div class="project-content">
																	<img src="images/dashboard-avatar.png" alt="">
																	<h4>290+ Events</h4>
																</div>
																<p>Discover projects just for you and get great recommendations when you select your interests.</p>
																<a href="event_details.html" class="btn-primary">Event Details</a>
															</div>
															</div>
															<div class="col-md-8 pls-col">
																	<div>
																			<div class="project-love-item clearfix">
																				<a class="project-love-image" href="event_details.html"><img src="images/musical.jpg" alt=""></a>
																				<div class="project-love-item-content project-love-box">
																					<a href="#" class="category">Music</a>
																					<h3><a href="event_details.html">The Best Celebrity</a></h3>
																					<div class="project-love-description">One smart, reusable notebook to last the rest of your life? That's not magic, that's the Everlast.</div>
																					<div class="project-love-author">
																						<div class="author-profile">
																							<a class="author-avatar" href="#"><img src="images/placeholder/40x40.png" alt=""></a>by <a class="author-name" href="#">John Doe</a>
																						</div>
																						<div class="author-address"><span class="ion-location"></span>Mumbai, Maharashtra, India</div>
																					</div>
																					<div class="process">
																						<div class="raised"><span></span></div>
																						<div class="process-info">
																							<div class="process-pledged"><span><i class="fa fa-inr" aria-hidden="true"></i> 5000</span>pledged</div>
																							<div class="process-funded"><span>41%</span>funded</div>
																							<div class="process-time"><span>37</span>backers</div>
																							<div class="process-time"><span>23</span>days ago</div>
																							<div class="process-time"><span>100</span>Likes</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																</div>
															</div>
											</div>
											<div class="carousel-item">
													<div class="row">
															<div class="col-md-4">
															<div class="popular-project">
																	<div class="project-content">
																			<img src="images/dashboard-avatar.png" alt="">
																			<h4>290+ Events</h4>
																		</div>
																		<p>Discover projects just for you and get great recommendations when you select your interests.</p>
																		<a href="event_details.html" class="btn-primary">Event Details</a>
															</div>
															</div>
															<div class="col-md-8 pls-col">
																	<div>
																			<div class="project-love-item clearfix">
																				<a class="project-love-image" href="event_details.html"><img src="images/musical.jpg" alt=""></a>
																				<div class="project-love-item-content project-love-box">
																					<a href="#" class="category">Music</a>
																					<h3><a href="event_details.html">The Best Celebrity</a></h3>
																					<div class="project-love-description">One smart, reusable notebook to last the rest of your life? That's not magic, that's the Everlast.</div>
																					<div class="project-love-author">
																						<div class="author-profile">
																							<a class="author-avatar" href="#"><img src="images/placeholder/40x40.png" alt=""></a>by <a class="author-name" href="#">John Doe</a>
																						</div>
																						<div class="author-address"><span class="ion-location"></span>Mumbai, Maharashtra, India</div>
																					</div>
																					<div class="process">
																						<div class="raised"><span></span></div>
																						<div class="process-info">
																							<div class="process-pledged"><span><i class="fa fa-inr" aria-hidden="true"></i> 5000</span>pledged</div>
																							<div class="process-funded"><span>41%</span>funded</div>
																							<div class="process-time"><span>37</span>backers</div>
																							<div class="process-time"><span>23</span>days ago</div>
																							<div class="process-time"><span>100</span>Likes</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																</div>
															</div>
											</div>
										  </div>
										  <a class="carousel-control-prev" href="#carouselExampleIndicators-four" role="button" data-slide="prev">
											<span class="carousel-control-prev-icon" aria-hidden="true"> <img src="images/left-arrow.png" alt=""> </span>
											<span class="sr-only">Previous</span>
										  </a>
										  <a class="carousel-control-next" href="#carouselExampleIndicators-four" role="button" data-slide="next">
											<span class="carousel-control-next-icon" aria-hidden="true"> <img src="images/right-arrow.png" alt=""> </span>
											<span class="sr-only">Next</span>
										  </a>
								</div>
						  </div>
						</div>
					  </div>
				</div>
			</div>
			<!-- .project-love -->
			<div class="how-it-work">
				<div class="container">
					<h2 class="title">See How It Work</h2>
					<div class="description" style="color:#fff;">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</div>
					<div class="row">
						<div class="col-lg-4">
							<div class="item-work">
								<div class="item-icon"><span>01</span><i class="fa fa-flask" aria-hidden="true"></i></div>
								<div class="item-content">
									<h3 class="item-title">Discover Ideas</h3>
									<div class="item-desc"><p>A un Angleso it va semblar un simplificat Angles, quam un skeptic Cambridge amico dit me que Occidental es.</p></div>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="item-work">
								<div class="item-icon"><span>02</span><i class="fa fa-leaf" aria-hidden="true"></i></div>
								<div class="item-content">
									<h3 class="item-title">Create a Campaigns</h3>
									<div class="item-desc"><p>Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues.</p></div>
								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="item-work">
								<div class="item-icon"><span>03</span><i class="fa fa-money" aria-hidden="true"></i></div>
								<div class="item-content">
									<h3 class="item-title">Get Funded</h3>
									<div class="item-desc"><p>Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules.</p></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- .how-it-work -->

			<div class="latest campaign">
				<div class="container">
					<h2 class="title">Discover Events</h2>
					<div class="campaign-tabs filter-theme">
						<button class="button is-checked" data-filter=".filterinteresting">Interesting</button>
						<button class="button" data-filter=".filtersuccessful">Organised</button>
						<button class="button" data-filter=".filterpopular">Popular</button>
						<button class="button" data-filter=".filterlatest">Latest</button>
					</div>
					<div class="campaign-content grid">
						<div class="row">
							<div class="col-lg-4 col-md-6 col-sm-6 col-6 filterinteresting filterpopular filterlatest">
								<div class="campaign-item">
									<a class="overlay" href="event_details.html">
										<img src="images/event_1.jpg" alt="">
										<span class="ion-ios-search-strong"></span>
									</a>
									<div class="campaign-box">
										<a href="#" class="category">Crafts</a>
										<h3><a href="event_details.html">The Oreous Pillow</a></h3>
										<div class="campaign-description">A watch designed to be an heirloom to be passed down to the next generation.</div>
										<div class="campaign-author"><a class="author-icon" href="#"><img src="images/author-01.png" alt=""></a>by <a class="author-name" href="#">Sabato Alterio</a></div>
										<div class="process">
											<div class="raised"><span></span></div>
											<div class="process-info">
												<div class="process-pledged"><span><i class="fa fa-inr" aria-hidden="true"></i> 630</span>pledged</div>
												<div class="process-funded"><span>26%</span>funded</div>
												<div class="process-time"><span>2</span>days ago</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-6 col-6 filterinteresting filterlatest">
								<div class="campaign-item">
									<a class="overlay" href="event_details.html">
										<img src="images/event_2.jpg" alt="">
										<span class="ion-ios-search-strong"></span>
									</a>
									<div class="campaign-box">
										<a href="#" class="category">Bollywood</a>
										<h3><a href="event_details.html">The Everlast Notebook</a></h3>
										<div class="campaign-description">One smart, reusable notebook to last the rest of your life? That's not magic, that's the Everlast.</div>
										<div class="campaign-author"><a class="author-icon" href="#"><img src="images/author-02.png" alt=""></a>by <a class="author-name" href="#">Samino</a></div>
										<div class="process">
											<div class="raised"><span></span></div>
											<div class="process-info">
												<div class="process-pledged"><span><i class="fa fa-inr" aria-hidden="true"></i> 370</span>pledged</div>
												<div class="process-funded"><span>9%</span>funded</div>
												<div class="process-time"><span>9</span>days ago</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-6 col-6 filterinteresting filterpopular filtersuccessful">
								<div class="campaign-item">
									<a class="overlay" href="event_details.html">
										<img src="images/event_3.jpg" alt="">
										<span class="ion-ios-search-strong"></span>
									</a>
									<div class="campaign-box">
										<a href="#" class="category">Tollywood</a>
										<h3><a href="event_details.html">Uncompromising Ski Gear</a></h3>
										<div class="campaign-description">The Orsden Slope Pants don't compromise delivering performance, fit, and value directly to you</div>
										<div class="campaign-author"><a class="author-icon" href="#"><img src="images/author-01.png" alt=""></a>by <a class="author-name" href="#">Andrew Noah</a></div>
										<div class="process">
											<div class="raised"><span></span></div>
											<div class="process-info">
												<div class="process-pledged"><span><i class="fa fa-inr" aria-hidden="true"></i>610</span>pledged</div>
												<div class="process-funded"><span>73%</span>funded</div>
												<div class="process-time"><span>14</span>days ago</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-6 col-6 filterinteresting filterlatest ">
								<div class="campaign-item">
									<a class="overlay" href="event_details.html">
										<img src="images/event_4.jpg" alt="">
										<span class="ion-ios-search-strong"></span>
									</a>
									<div class="campaign-box">
										<a href="#" class="category">HollyWood</a>
										<h3><a href="event_details.html">Smart Wallet with Solar Charge</a></h3>
										<div class="campaign-description">A wonderful serenity has taken possession of my entire soul, like these sweet mornings.</div>
										<div class="campaign-author"><a class="author-icon" href="#"><img src="images/author-03.png" alt=""></a>by <a class="author-name" href="#">Andrew Noah</a></div>
										<div class="process">
											<div class="raised"><span></span></div>
											<div class="process-info">
												<div class="process-pledged"><span><i class="fa fa-inr" aria-hidden="true"></i> 3670</span>pledged</div>
												<div class="process-funded"><span>58%</span>funded</div>
												<div class="process-time"><span>21</span>days ago</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-6 col-6 filterinteresting filtersuccessful">
								<div class="campaign-item">
									<a class="overlay" href="event_details.html">
										<img src="images/event_1.jpg" alt="">
										<span class="ion-ios-search-strong"></span>
									</a>
									<div class="campaign-box">
										<a href="#" class="category">Music Brand</a>
										<h3><a href="event_details.html">Redefine Your VR Experience</a></h3>
										<div class="campaign-description">I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot.</div>
										<div class="campaign-author"><a class="author-icon" href="#"><img src="images/author-02.png" alt=""></a>by <a class="author-name" href="#">Sabato Alterio</a></div>
										<div class="process">
											<div class="raised"><span></span></div>
											<div class="process-info">
												<div class="process-pledged"><span><i class="fa fa-inr" aria-hidden="true"></i> 1950</span>pledged</div>
												<div class="process-funded"><span>70%</span>funded</div>
												<div class="process-time"><span>23</span>days ago</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-6 col-sm-6 col-6 filterinteresting filterpopular filtersuccessful">
								<div class="campaign-item">
									<a class="overlay" href="event_details.html">
										<img src="images/event_2.jpg" alt="">
										<span class="ion-ios-search-strong"></span>
									</a>
									<div class="campaign-box">
										<a href="#" class="category">Music Brand</a>
										<h3><a href="event_details.html">Bring back Fun House</a></h3>
										<div class="campaign-description">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</div>
										<div class="campaign-author"><a class="author-icon" href="#"><img src="images/author-01.png" alt=""></a>by <a class="author-name" href="#">Samino</a></div>
										<div class="process">
											<div class="raised"><span></span></div>
											<div class="process-info">
												<div class="process-pledged"><span><i class="fa fa-inr" aria-hidden="true"></i> 3900</span>pledged</div>
												<div class="process-funded"><span>69%</span>funded</div>
												<div class="process-time"><span>33</span>days ago</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="latest-button"><a href="event_listing.html" class="btn-primary">View all Events</a></div>
				</div>
			</div><!-- .latest -->

			<div class="blognews">
				<div class="container">
					<h2 class="title">Our Blog</h2>
					<div class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</div>
					<div class="blognews-content">
						<div class="row">
							<div class="col-lg-4">
								<article class="post">
									<div class="blognews-thumb">
										<a class="overlay" href="blog_details.html">
											<img src="images/blog-img-02.jpg" alt="">
											<span class="ion-ios-search-strong"></span>
										</a>
									</div>
									<div class="blognews-info">
										<a href="#" class="blognews-cat">Tips & Insights</a>
										<h3 class="blognews-title"><a href="#">Blog One</a></h3>
										<div class="blognews-content"><p>Always strive for better work. Never stop learning. Have fun a clear plan for a new project or just an idea on a napkin?</p></div>
									</div>
								</article>
							</div>
							<div class="col-lg-4">
								<article class="post">
									<div class="blognews-thumb">
										<a class="overlay" href="blog_details.html">
											<img src="images/blog-img-03.jpg" alt="">
											<span class="ion-ios-search-strong"></span>
										</a>
									</div>
									<div class="blognews-info">
										<a href="#" class="blognews-cat">Case Studies</a>
										<h3 class="blognews-title"><a href="#">Blog Two</a></h3>
										<div class="blognews-content"><p>TouchPoints are neuroscientific wearables that are worn on either side of the body for 15 minutes to reduce stress and anxiety.</p></div>
									</div>
								</article>
							</div>
							<div class="col-lg-4">
								<article class="post">
									<div class="blognews-thumb">
										<a class="overlay" href="blog_details.html">
											<img src="images/blog-img-04.jpg" alt="">
											<span class="ion-ios-search-strong"></span>
										</a>
									</div>
									<div class="blognews-info">
										<a href="#" class="blognews-cat">Products</a>
										<h3 class="blognews-title"><a href="#">Blog Three</a></h3>
										<div class="blognews-content"><p>Waking up is hard to do. That’s why this company is making sleep a priority by giving the classic face mask an upgrade.</p></div>
									</div>
								</article>
							</div>
						</div>
					</div>
				</div>
				<div class="latest-button text-center m-5"><a href="blog.html" class="btn-primary">View all Blogs</a></div>
			</div><!-- .story -->
			<div class="partners">
				<div class="container">
					<div class="partners-slider owl-carousel">
						<div><a href="celebrity_details.html"><img src="images/celibrity1.png" alt=""></a></div>
						<div><a href="celebrity_details.html"><img src="images/celibrity2.png" alt=""></a></div>
						<div><a href="celebrity_details.html"><img src="images/celibrity3.png" alt=""></a></div>
						<div><a href="celebrity_details.html"><img src="images/celibrity4.png" alt=""></a></div>
						<div><a href="celebrity_details.html"><img src="images/celibrity5.png" alt=""></a></div>
						<div><a href="celebrity_details.html"><img src="images/celibrity7.png" alt=""></a></div>
						<div><a href="celebrity_details.html"><img src="images/celibrity8.png" alt=""></a></div>
					</div>
				</div>
			</div><!-- .partners -->
		</main><!-- .site-main -->

		<footer id="footer" class="site-footer">
			<div class="footer-menu">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-sm-4 col-4">
							<div class="footer-menu-item">
								<h3>Our company</h3>
								<ul>
									<li><a href="#">What is Startup Idea</a></li>
									<li><a href="#">About us</a></li>
									<li><a href="#">How It Works</a></li>
									<li><a href="#">What Is This</a></li>
									<!-- <li><a href="#">Jobs</a></li>
									<li><a href="#">Press</a></li>
									<li><a href="#">Starts</a></li> -->
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-sm-4 col-4">
							<div class="footer-menu-item">
								<h3>Events</h3>
								<ul>
									<!-- <li><a href="#">Start Your Campaign</a></li>
									<li><a href="#">Pricing Campaign</a></li>
									<li><a href="#">Campaign Support</a></li> -->
									<li><a href="#">Trust &amp; Safety</a></li>
									<li><a href="#">Support</a></li>
									<li><a href="#">Terms of Use</a></li>
									<li><a href="#">Privacy Policy</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-sm-4 col-4">
							<div class="footer-menu-item">
								<h3>Explore</h3>
								<ul>
									<li><a href="#">Design &amp; Art</a></li>
									<li><a href="#">Crafts</a></li>
									<li><a href="#">Film &amp; Video</a></li>
									<li><a href="#">Food</a></li>
									<!-- <li><a href="#">Book</a></li>
									<li><a href="#">Games</a></li>
									<li><a href="#">Technology</a></li> -->
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-sm-12 col-12">
							<div class="footer-menu-item newsletter">
								<!-- <h3>Newsletter</h3>
								<div class="newsletter-description">Private, secure, spam-free</div>
								<form action="s" method="POST" id="newsletterForm">
							  		<input type="text" value="" name="s" placeholder="Enter your email..." />
							    	<button type="submit" value=""><span class="ion-android-drafts"></span></button>
							  	</form> -->
							  	<div class="follow">
							  		<h3>Follow us</h3>
							  		<ul>
							  			<li class="facebook"><a target="_Blank" href="http://www.facebook.com"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							  			<li class="twitter"><a target="_Blank" href="http://www.twitter.com"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							  			<li class="instagram"><a target="_Blank" href="http://www.instagram.com"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							  			<li class="google"><a target="_Blank" href="http://www.google.com"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
							  			<li class="youtube"><a target="_Blank" href="http://www.youtube.com"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
							  		</ul>
							  	</div>
							</div>
						</div>
					</div>
					<!-- <div class="footer-top">
						<p class="payment-img"><img src="images/assets/payment-methods.png" alt=""></p>
						<div class="footer-top-right">
						  	<div class="dropdow field-select">
						  		<select name="s">
						  			<option value="">$ US Dollar (USD)</option>
						  			<option value="">£ Pound Sterling (GBP)</option>
						  			<option value="">€ Euro (EUR)</option>
						  		</select>
						  	</div>
						  	<div class="dropdow field-select">
						  		<select name="s">
						  			<option value="">English</option>
						  			<option value="">Greek (????????)</option>
						  			<option value="">Deutsch (German)</option>
						  			<option value="">??????? (Arabic)</option>
						  		</select>
						  	</div>
						</div>
					</div> -->
				</div>
			</div><!-- .footer-menu -->
			<div class="footer-copyright">
				<div class="container">
					<p class="copyright">2018 by Celebrity Event Management. All Rights Reserved.</p>
					<a href="#" class="back-top">Back to top<span class="ion-android-arrow-up"></span></a>
				</div>
			</div>
		</footer><!-- site-footer -->
	</div><!-- #wrapper --> 
      <?php  
          echo $this->Html->script("jquery-1.12.4.min.js");
      
          echo $this->Html->script("popper/popper.js");
          echo $this->Html->script("bootstrap/js/bootstrap.min.js");
          echo $this->Html->script("owl-carousel/owl.carousel.min.js");
          echo $this->Html->script("jquery.countdown/jquery.countdown.min.js");
          echo $this->Html->script("wow/wow.min.js");
          echo $this->Html->script("isotope/isotope.pkgd.min.js");
          echo $this->Html->script("bxslider/jquery.bxslider.min.js");
          echo $this->Html->script("magicsuggest/magicsuggest-min.js");
          
          echo $this->Html->script("quilljs/js/quill.core.js");
          echo $this->Html->script("quilljs/js/quill.js");
           echo $this->Html->script("main.js");
          ?>
          
<!--    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="libs/popper/popper.js"></script>
    <script src="libs/bootstrap/js/bootstrap.min.js"></script>
    <script src="libs/owl-carousel/owl.carousel.min.js"></script>
    <script src="libs/jquery.countdown/jquery.countdown.min.js"></script>
    <script src="libs/wow/wow.min.js"></script>
    <script src="libs/isotope/isotope.pkgd.min.js"></script>
    <script src="libs/bxslider/jquery.bxslider.min.js"></script>
    <script src="libs/magicsuggest/magicsuggest-min.js"></script>
    <script src="libs/quilljs/js/quill.core.js"></script>
    <script src="libs/quilljs/js/quill.js"></script>
     orther script 
    <script src="js/main.js"></script>-->
    <script>
    	function validate(evt) {
		  var theEvent = evt || window.event;
		  var key = theEvent.keyCode || theEvent.which;
		  key = String.fromCharCode( key );
		  var regex = /[0-9]|\./;
		  if( !regex.test(key) ) {
		    theEvent.returnValue = false;
		    if(theEvent.preventDefault) theEvent.preventDefault();
		  }
		}
	</script>

</body>
</html>

