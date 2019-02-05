	<main id="main" class="site-main">
			<div class="page-title background-page">
				<div class="container">
					<h1>Dashboard</h1>
					<div class="breadcrumbs">
						<ul>
							<li>Home<span>/</span></li>
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
                                                                        <li><a href="<?php echo $this->Url->build('/users/current_booking', true); ?>">Current Booking</a></li>
                                                                        <li><a href="<?php echo $this->Url->build('/users/booking_history', true); ?>">Booking History</a></li>
<!--									<li><a href="account_my_campaigns.html">My Events</a></li>-->
									
								</ul>
							</nav>
						</div>
						<div class="col-lg-9">
							<div class="account-content dashboard">
								
								<div class="account-main">
									
									<div class="dashboard-latest">
										<h3>My Events History</h3>
										<ul>
                                                                                    <?php if(!empty($data_all)){  $data_all=json_decode($data_all); foreach($data_all as $val){ ?>
											<li>
                                                                                                <a href="<?php echo $this->Url->build('/users/edit_profile', true); ?>"><?php if(!empty($val->event_detail->event_photos[0])){ echo $this->Html->image("medium/".$val->event_detail->event_photos[0]->image, ['alt' => 'event','class'=>'logo-default']); }?></a>
												
                                                                                                <div class="dashboard-latest-box">
                                                                                                        <div class="category"> <span><?php  $date=explode('T',$val->event_date); echo $date[0];?></span> - <?php if(!empty($val->event_detail->event_categories[0])){  echo $val->event_detail->event_categories[0]->category->category_name;   } ?></div>
													<h4><a href="#"><?php echo $val->event_name;?></a></h4>
													<div class="category"><?php echo $val->event_desc;?></div>
													<p class="price">Price: <label for=""> <i class="fa fa-inr" aria-hidden="true"></i> <?php echo $val->total_price;?></label>  </p>
													<p class="price">Qty: <label for=""> <?php echo $val->total_ticket_qty;?> Tickets</label>  <span class="payment-successful">Payment Successful</span></p>
												</div>
											</li>
                                                                                    <?php } }else{ echo "No Booking Done"; }?>

<!--											<div class="">
												<a href="#" class="btn-primary">View All</a>													
											</div>-->
										</ul>
									</div>


								</div>
							</div>
						</div>
					</div>
				</div><!-- .container -->
			</div><!-- .account-content -->
		</main><!-- .site-main -->