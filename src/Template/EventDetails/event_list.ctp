<main id="main" class="site-main">
			<div class="page-title background-cart">
				<div class="container">
					<h1>Event-Listing</h1>
					<div class="breadcrumbs">
						<ul>
							<li><a href="index.html">Home</a><span>/</span></li>
							<li>Event-Listing</li>
						</ul>
					</div><!-- .breadcrumbs -->
				</div>
			</div><!-- .page-title -->
			<div class="container">
				<div class="main-content">

								<div class="latest">
				<div class="container">
					<!-- <h2 class="title">Discover Events</h2> -->
					<div class="campaign-tabs filter-theme">
						<button class="button is-checked" data-filter=".filterinteresting">Interesting</button>
						<button class="button" data-filter=".filtersuccessful" onclick="swap_type(1)">Organised</button>
						<button class="button" data-filter=".filterpopular">Popular</button>
						<button class="button" data-filter=".filterlatest">Latest</button>
					</div>
					 <div id="org_data">
                                             <div  class="campaign-content grid"  style="height:auto !important;">
                                            <div class="row" >
                                                    
                                                 <?php  foreach($data_all_event as $valnw){ //pr($valnw);exit; ?>
							<div class="col-lg-4 col-md-6 col-sm-6 col-6 filterinteresting filterpopular filterlatest">
								<div class="campaign-item">
									<a class="overlay" href="event_detail/<?php echo $valnw->id;?>">
										<?php if(!empty($valnw->event_photos[0]->image)){ echo $this->Html->image("medium/".$valnw->event_photos[0]->image, ['alt' => 'event']); }?>
										<span class="ion-ios-search-strong"></span>
									</a>
									<div class="campaign-box">
                                                                           
                                                                            <a href="#" class="category"> <?php foreach($valnw->event_categories as $val){  ?><?php echo $val->category->category_name;?> , <?php } ?></a>
                                                                          
										<h3><a href="event_detail/<?php echo $valnw->id;?>"><?php echo $valnw->event_title;?></a></h3>
										<div class="campaign-description"><?php echo $valnw->event_description;?></div>
                                                                                <div class="campaign-author"><a class="author-icon" href="#"><?php if(!empty($valnw->event_organizers)) { foreach($valnw->event_organizers as $new1){ echo $this->Html->image("medium/".$new1->users[0]->image, ['alt' => 'event']); ?></a>by <a class="author-name" href="#"><?php echo $new1->users[0]->fname.' '. $new1->users[0]->lname;?>, <?php }} ?></a></div>
										<div class="process">
											<div class="raised"><span></span></div>
											<div class="process-info">
												<div class="process-pledged"><span><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $valnw->event_amount;?></span>pledged</div>
												<div class="process-funded"><span><?php if(!empty( $valnw->event_amount)&& !empty( $valnw->target_amount) ) {  $new_amount=($valnw->target_amount/$valnw->event_amount)*100 ; echo round($new_amount);}?>%</span>funded</div>
												<?php if(!empty($valnw->approx_start_date)){
                                                                                                                                                 $curr_date=date_create(date("Y-m-d"));
                                                                                                                                                $upcomming_date=date_create(date("Y-m-d",strtotime($valnw->approx_start_date)));
                                                                                                                                                
                                                                                                                                                $diff=date_diff($curr_date,$upcomming_date);
                                                                                                                                                ?>
																		<div class="process-time"><span><?php echo  $diff->format("%R%a days");?></span>days ago</div>
                                                                                                                                                <?php }?>
											</div>
										</div>
									</div>
								</div>
							</div>
                                                    
                                                 <?php } ?>

                                            </div></div>
					</div>
					<!-- <div class="latest-button"><a href="#" class="btn-primary">View all Events</a></div> -->
				</div>
			</div><!-- .latest -->
				</div> 
			</div>	
		</main><!-- .site-main -->
                <script>
                   function swap_type(type_id){
                    
                   //  $("#loder_div").show();
                         $.ajax({
				type: "POST",
				evalScripts: true,
				url: '<?php echo $this->Url->build('/Pages/swap_tab', true);  ?>',
				data: ({cat_id:type_id}),
				success: function (data){
                               //  alert(data)
                                
                                   $("#org_data").html(data);
                                   
                             
				}
		    });
                    } 
                    </script>