    <link href="https://fonts.googleapis.com/css?family=Rubik:400,500,700&amp;subset=latin-ext"/>
     <?php    
        
echo $this->Html->css('style.css');
echo $this->Html->css('responsive.css');
echo $this->Html->css('wow/css/animate.css');
echo $this->Html->css('font-awesome/css/font-awesome.min.css');
echo $this->Html->css('ionicons/css/ionicons.min.css');
echo $this->Html->css('bootstrap/css/bootstrap.min.css');
echo $this->Html->css('owl-carousel/assets/owl.theme.default.css');
echo $this->Html->css('owl-carousel/assets/owl.theme.min.css');
echo $this->Html->css('owl-carousel/assets/owl.transitions.min.css');
echo $this->Html->css('owl-carousel/assets/carousel.min.css');

echo $this->Html->css('bxslider/jquery.bxslider.min.css');
echo $this->Html->css('magicsuggest/magicsuggest-min.css');
echo $this->Html->css('quilljs/css/quill.bubble.css');
echo $this->Html->css('quilljs/css/quill.core.css');
echo $this->Html->css('quilljs/css/quill.snow.css');

//
//@import url('https://fonts.googleapis.com/css?family=Rubik:400,500,700&amp;subset=latin-ext');
//@import url(libs/wow/css/animate.css);
//@import url(libs/font-awesome/css/font-awesome.min.css);
//@import url(libs/bootstrap/css/bootstrap.min.css);
//@import url(libs/ionicons/css/ionicons.min.css);
//@import url(libs/bootstrap/css/bootstrap.min.css);
//@import url(libs/owl-carousel/assets/owl.theme.default.css);
//@import url(libs/owl-carousel/assets/owl.theme.min.css);
//@import url(libs/owl-carousel/assets/owl.transitions.min.css);
//@import url(libs/owl-carousel/assets/carousel.min.css);
//@import url(libs/bxslider/jquery.bxslider.min.css);
//@import url(libs/magicsuggest/magicsuggest-min.css);
//@import url(libs/quilljs/css/quill.bubble.css);
//@import url(libs/quilljs/css/quill.core.css);
//@import url(libs/echo $this->Html->css('quilljs/css/quill.core.css'););


                ?>
   
    <link rel="shortcut icon" href="favicon.ico" />
   
</head>
<body class="campaign-detail">
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
						
							<h2 class="logo-name">     <?php echo  $this->Html->link(
    'Celebrity',
    ['controller' => 'Pages', 'action' => 'display', '_full' => true]
); ?></h2>
						
					</div><!-- .site-brand -->
					<div class="right-header">					
						<nav class="main-menu">
							<button class="c-hamburger c-hamburger--htx"><span></span></button>
							<ul>
                                                            <li>
                                                                  <?php echo  $this->Html->link(
    'Home',
    ['controller' => 'pages', 'action' => 'display', '_full' => true]
); ?>
								<!--<a href="eventDetails/eventList">Events<i class="fa fa-caret-down" aria-hidden="true"></i></a>-->
								<!-- <ul class="sub-menu">
									<li><a href="event_details.html">Create a campaign</a></li>
									<li><a href="update_a_campaign.html">Update a campaign</a></li>
								</ul> -->
							</li>
								<li>
                                                               
									
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
                                                                  <?php echo  $this->Html->link(
    'Events',
    ['controller' => 'eventDetails', 'action' => 'eventList', '_full' => true]
); ?>
								<!--<a href="eventDetails/eventList">Events<i class="fa fa-caret-down" aria-hidden="true"></i></a>-->
								<!-- <ul class="sub-menu">
									<li><a href="event_details.html">Create a campaign</a></li>
									<li><a href="update_a_campaign.html">Update a campaign</a></li>
								</ul> -->
							</li>
							<li>
                                                              <?php echo  $this->Html->link(
    'Celebrities',
    ['controller' => 'celebrities', 'action' => 'listCelebrity', '_full' => true]
); ?>
<!--									<a href="celebrities/listCelebrity">Celebrities<i class="fa fa-caret-down" aria-hidden="true"></i></a>
									 <ul class="sub-menu">
										<li><a href="event_details.html">Create a campaign</a></li>
										<li><a href="update_a_campaign.html">Update a campaign</a></li>
									</ul> -->
								</li>
							
								<li>   <?php echo  $this->Html->link(
    'About us',
    ['controller' => 'Pages', 'action' => 'about', '_full' => true]
); ?></li>	
								<!-- <ul class="sub-menu">
									<li><a href="coming_soon.html">Coming Soon</a></li>
									<li><a href="about_us.html">About Us</a></li>
									<li><a href="404.html">404</a></li>
									<li><a href="login.html">Login</a></li>
									<li><a href="register.html">Register</a></li>
									<li><a href="faq.html">Faq</a></li>
									<li><a href="event_details.html">Campaign details</a></li>
								</ul> -->
							
								
								<!-- <li>
									<a href="#">Shop<i class="fa fa-caret-down" aria-hidden="true"></i></a>
									<ul class="sub-menu">
										<li><a href="shop-grid.html">Shop Grid</a></li>
										<li><a href="event_details.html">Shop Details</a></li>
										<li><a href="cart.html">Cart</a></li>
										<li><a href="checkout.html">Checkout</a></li>
									</ul>
								</li> -->
								<li>   <?php echo  $this->Html->link(
    'Contact',
    ['controller' => 'Pages', 'action' => 'contact', '_full' => true]
); ?></li>
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
								<li>   <?php echo  $this->Html->link(
    'Faq',
    ['controller' => 'Pages', 'action' => 'faq', '_full' => true]
); ?></li>
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
						 <?php

if(!empty($AuthUser)) {  
  
    echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout')); 
   
     echo $this->Html->link('Myaccount', array('controller' => 'users', 'action' => 'index'));
} else {
    echo $this->Html->link('Login', array('controller' => 'users', 'action' => 'login')); 
    
  
}
?>
						</div><!-- .login -->
					</div><!--. right-header -->
				</div><!-- .container -->
			</div>
		</header><!-- .site-header -->