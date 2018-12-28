	<main id="main" class="site-main">
			<div class="page-title background-page">
				<div class="container">
					<h1>Dashboard</h1>
					<div class="breadcrumbs">
						<ul>
							<li><a href="#">Home</a><span>/</span></li>
							<li>Dashboard</li>
						</ul>
					</div><!-- .breadcrumbs -->
				</div>
			</div><!-- .page-title -->
			<div class="account-wrapper">
				<div class="container">
					<div class="row">
						<div class="col-lg-3">
							<nav class="account-bar">
								<ul>
									<li class="active"><a href="<?php echo $this->Url->build('/users/index', true); ?>">Dashboard</a></li>
									<li><a href="<?php echo $this->Url->build('/users/edit_profile', true); ?>">Profile</a></li>
<!--									<li><a href="account_my_campaigns.html">My Events</a></li>-->
									
								</ul>
							</nav>
						</div>
						<div class="col-lg-9">
							<div class="account-content dashboard">
								<h3 class="account-title">Dashboard</h3>
								<div class="account-main">
									<div class="author clearfix">
										<a class="author-avatar" href="<?php echo $this->Url->build('/users/edit_profile', true); ?>"><?php echo $this->Html->image("medium/".$user_data[0]['image'], ['alt' => 'event','class'=>'logo-default']);?></a>
										<div class="author-content">
											<div class="author-title"><h3><a href="#"><?php echo $user_data[0]['fname'].' '.$user_data[0]['lname']  ;?></a></h3><a class="edit-profile" href="<?php echo $this->Url->build('/users/editProfile', true); ?>">Edit Profile</a></div>
											<div class="author-info">
												<p><?php echo $user_data[0]['email'];?></p>
												<p>Celebrity Member since <?php echo $user_data[0]['created'];?></p>
											</div>
										</div>
									</div>
									<div class="dashboard-latest">
										<h3>My Latest Events</h3>
										<ul>
                                                                                    <?php if(!empty($data_all)){  $data_all=json_decode($data_all); foreach($data_all as $val){ ?>
											<li>
												<a href="<?php echo $this->Url->build('/users/edit_profile', true); ?>"><img src="images/5.jpg" alt=""></a>
												<div class="dashboard-latest-box">
													<div class="category"> <span><?php  $date=explode('T',$val->event_date); echo $date[0];?></span> - Bollywood Events</div>
													<h4><a href="#"><?php echo $val->event_name;?></a></h4>
													<div class="category"><?php echo $val->event_desc;?></div>
													<p class="price">Price: <label for=""> <i class="fa fa-inr" aria-hidden="true"></i> <?php echo $val->total_price;?></label>  </p>
													<p class="price">Qty: <label for=""> <?php echo $val->total_ticket_qty;?> Tickets</label>  <span class="payment-successful">Payment Successful</span></p>
												</div>
											</li>
                                                                                    <?php } }?>

											<div class="">
												<a href="#" class="btn-primary">View All</a>													
											</div>
										</ul>
									</div>


								</div>
							</div>
						</div>
					</div>
				</div><!-- .container -->
			</div><!-- .account-content -->
		</main><!-- .site-main -->