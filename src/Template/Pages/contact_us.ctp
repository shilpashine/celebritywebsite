<?php
$this->layout = 'default';
?>
		<main id="main" class="site-main">
			<div class="google-maps">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4487.003462924365!2d72.81919229806742!3d18.97096405633121!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7ce6ea1b17137%3A0xfe198eb13bcbf5e3!2sMumbai+Central%2C+Mumbai%2C+Maharashtra!5e0!3m2!1sen!2sin!4v1542953466034" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>

			<div class="page-content contact-content pb-5">
				<div class="container">
					<div class="row no-gutters">
						<div class="col-lg-12 main-content">
							<div class="entry-content">
								<div class="row no-gutters">
									<div class="col-lg-8">
										<div class="form-contact">
											<h2>Drop US a line</h2>
											<form action="s" method="POST" id="contactForm" class="clearfix">
												<div class="clearfix">
									  				<div class="field align-left">
									  					<input type="text" value="" name="s" placeholder="Your Name" />
									  				</div>
									  				<div class="field align-right">
									  					<input type="text" value="" name="s" placeholder="Your Email" />
									  				</div>
								  				</div>
												<div class="clearfix">
									  				<div class="field align-left">
									  					<input type="text" value="" name="s" placeholder="Your Phone" />
									  				</div>
									  				<div class="field align-right">
									  					<input type="text" value="" name="s" placeholder="Your Subjet" />
									  				</div>
								  				</div>
								  				
								  				<div class="field-textarea">
								  					<textarea rows="8" placeholder="Message"></textarea>
								  				</div>
											  	<button type="submit" value="Send Messager" class="btn btn-default">Submit Message</button>
										  	</form>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="contact-info">
											<h3>Contact Infomation</h3>
											<ul>
                                                                                                <li><i class="fa fa-map-marker" aria-hidden="true"></i> <?php if(!empty($user_data['address'])){ echo $user_data['address'];  } ?></li>
												<li><i class="fa fa-phone" aria-hidden="true"></i><?php if(!empty($user_data['phone'])){ echo $user_data['phone'];  } ?></li>
												<li><i class="fa fa-mobile" aria-hidden="true"></i><?php if(!empty($user_data['alt_ph'])){ echo $user_data['alt_ph'];  } ?></li>
												<li><i class="fa fa-envelope-o" aria-hidden="true"></i><?php if(!empty($user_data['email'])){ echo $user_data['email'];  } ?></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!-- .container -->
			</div><!-- .page-content -->
		
		</main><!-- .site-main -->

              