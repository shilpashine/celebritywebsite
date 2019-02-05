
	<main id="main" class="site-main">
			<div class="page-title background-page">
				<div class="container">
					<h1>Faq</h1>
					<div class="breadcrumbs">
						<ul>
							<li>Home<span>/</span></li>
							<li>Faq</li>
						</ul>
					</div><!-- .breadcrumbs -->
				</div>
			</div><!-- .page-title -->
			<div class="faq-content">
				<div class="container">
					<div class="faq-section">
						<div class="border-title">
							<h2 class="title left-title"><?php if(!empty($data_all)){ 
                                                        $data_all11=json_decode($data_all); echo $data_all11[0]->page_title; }?></h2>
							<div class="description left-description"><!-- Lorem Ipsum is simply dummy text of the printing and typesetting industry. --></div>
						</div>
						<ul class="list-faq">
							
                                                    <?php  if(!empty($data_all)){ 
                                                       $data_all=json_decode($data_all);
                                                      // pr($data_all);exit;
                                                       foreach($data_all[0]->cms_posts as $faq_val){ ?>
							<li>
								<span class="ion-plus"></span><a href="#"><?php echo $faq_val->post_title;?></a>
								<div class="faq-desc">
									<?php echo $faq_val->post_description;?></div>
							</li>
                                                    <?php }} ?>
                                                        
<!--							<li>
								<span class="ion-plus"></span><a href="#">Who can create projects?</a>
								<div class="faq-desc">
									<p>When logged in to your IdeaPress account, click on your name in the top right of the screen from where a drop down menu will appear. Select ‘Notifications’.</p>
									<p>In here you can choose to opt in/out of the weekly IdeaPress newsletter. You can also set up notification emails to let you know when a certain type of project or a project in a certain location has been published.</p>
									<p>In this tab you can also follow/unfollow projects or Hives that you’ve backed or liked by simply checking/unchecking the tick box.</p>
								</div>
							</li>
							<li>
								<span class="ion-plus"></span><a href="#">Where do funders come from?</a>
								<div class="faq-desc">
									<p>When logged in to your IdeaPress account, click on your name in the top right of the screen from where a drop down menu will appear. Select ‘Notifications’.</p>
									<p>In here you can choose to opt in/out of the weekly IdeaPress newsletter. You can also set up notification emails to let you know when a certain type of project or a project in a certain location has been published.</p>
									<p>In this tab you can also follow/unfollow projects or Hives that you’ve backed or liked by simply checking/unchecking the tick box.</p>
								</div>
							</li>
							<li>
								<span class="ion-plus"></span><a href="#">Is my project eligible for IdeaPress?</a>
								<div class="faq-desc">
									<p>When logged in to your IdeaPress account, click on your name in the top right of the screen from where a drop down menu will appear. Select ‘Notifications’.</p>
									<p>In here you can choose to opt in/out of the weekly IdeaPress newsletter. You can also set up notification emails to let you know when a certain type of project or a project in a certain location has been published.</p>
									<p>In this tab you can also follow/unfollow projects or Hives that you’ve backed or liked by simply checking/unchecking the tick box.</p>
								</div>
							</li>-->
						</ul>
					</div><!-- .faq-section -->

				</div>
			</div><!-- .faq-content -->
		</main><!-- .site-main -->

              