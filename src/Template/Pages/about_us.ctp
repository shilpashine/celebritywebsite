<?php
$this->layout = 'default';
?>
		<main id="main" class="site-main">
			<section class="top-site">
				<div class="container">
					<h1><?php if(!empty($data_head)){ 
                                                        $data_header=json_decode($data_head);  echo $data_header[0]->page_title; ?></h1>
					
				</div>
			</section><!-- .top-site -->
			<div class="container">
				<div class="video">
					<div class="video-wrapper">
						<iframe height="315" src="<?php echo $data_header[0]->description;  }?>" allowfullscreen></iframe>
					</div>
				</div><!-- .video -->
				<section class="statics section">
					<h2 class="title"><?php if(!empty($data_all)){ 
                                                        $data_all11=json_decode($data_all); echo $data_all11[0]->page_title; ?></h2>
					<div class="description"><p> <?php echo $data_all11[0]->description;  }?></p></div>
					<div class="statics-content">
						<div class="row">
							<?php if(!empty($data_all)){ 
                                                        $data_all11=json_decode($data_all); 
                                                        foreach($data_all11[0]->cms_posts as $val){
                                                        ?>
							<div class="col-lg-3 col-sm-6 col-6">
								<div class="statics-item">
									<h3><?php echo $val->post_title;?></h3>
									<div class="statics-item-desc"><p><?php echo $val->post_description;?></p></div>
								</div>
							</div>
                                                    
                                                        <?php }} ?>
						</div>
					</div>
				</section><!-- .statics -->
				<!-- <section class="team section">
					<h2 class="title">Meet Our super Heros</h2>
					<div class="description"><p>At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles.</p></div>
					<div class="team-content">
						<div class="row">
							<div class="col-lg-3 col-sm-6 col-6">
								<div class="team-item">
									<div class="avatar"><img src="images/placeholder/270x340.png" alt=""></div>
									<div class="team-info">
										<ul class="socials">
											<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
										</ul>
										<h3 class="team-name">Marie J. Smith</h3>
										<span class="team-job">Web Developer</span>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6 col-6">
								<div class="team-item">
									<div class="avatar"><img src="images/placeholder/270x340.png" alt=""></div>
									<div class="team-info">
										<ul class="socials">
											<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
										</ul>
										<h3 class="team-name">Billy S. Tietjen</h3>
										<span class="team-job">Web Designer</span>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6 col-6">
								<div class="team-item">
									<div class="avatar"><img src="images/placeholder/270x340.png" alt=""></div>
									<div class="team-info">
										<ul class="socials">
											<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
										</ul>
										<h3 class="team-name">Edward S. Agosto</h3>
										<span class="team-job">Digital Marketer</span>
									</div>
								</div>
							</div>
							<div class="col-lg-3 col-sm-6 col-6">
								<div class="team-item">
									<div class="avatar"><img src="images/placeholder/270x340.png" alt=""></div>
									<div class="team-info">
										<ul class="socials">
											<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
										</ul>
										<h3 class="team-name">Clara C. Vinson</h3>
										<span class="team-job">Account Manager</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section> -->
				<section class="partners partners-about">
					<h2 class="title">Celebrities Partners</h2>
					<div class="description"><p>Over 30,000 Charities, Events, and Brands</p></div>
					<ul>
                                            <?php if(!empty($data_paertnere)){ 
                                                        $data_partner=json_decode($data_paertnere); 
                                                        //pr($data_partner);exit;
                                                        foreach($data_partner[0]->cms_posts as $val){ //pr($val);exit; ?>
                                            <li> <?php   echo $this->Html->image("medium/".$val->image, ['alt' => 'partner',]); ?></li>
            
                                                  
                                            <?php }} ?>
                                        </ul>
				</section><!-- .partners -->
			</div><!-- .container -->
		</main><!-- .site-main -->

              