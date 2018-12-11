<?php
$this->layout = 'default';
?>
		
                                                     <?php 
                                                        if(isset($data_all)){
							$i=0;
                                                       // pr($data_all);exit;
                                                        foreach($data_all as $category_datas){
                                                           
                                                      ?>
                                                        <?php //echo $category_datas->id;?>
						  <div class="tab-pane <?php if($i==0){ ?>active<?php } ?>" id="pills-<?php echo $category_datas->id;?>" role="tabpanel" aria-labelledby="pills-home-tab">
 
							  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
								
                                                              <div class="carousel-inner">
                                                                
                                                                 <?php   $k=0;
                                                        
                                         foreach($category_datas['event_categories'] as $val){
                                             
                                             ?>
                                     				<div class="carousel-item<?php if($k==0){ ?> active <?php } ?>">
										<div class="row">
										<div class="col-md-4">
											<div class="popular-project">
												<div class="project-content">
                                                                                                    
                                                                                                    <?php $m=0; foreach($val->event_detail->event_celebrities as $valnew){ ?>
             <?php   echo $this->Html->image("medium/".$valnew->celebrity_details[0]->celebrity_photos[0]->image, ['alt' => 'event','class'=>'logo-default','height'=>'40px','width'=>'80px']); ?>
                                         <?php $m++; } ?> <h4>290+ Events</h4>
													</div>
                                                                                        <p><?php if(!empty($val->event_detail->event_description)){ echo substr($val->event_detail->event_description,0,150) ; }?>..</p>
                                                                                        <a href="event_details.html" class="btn-primary">Event Description</a>
										</div>
										</div>
										<div class="col-md-8 pls-col">
												<div>
														<div class="project-love-item clearfix">
															<a class="project-love-image" href="event_details.html"> <?php if(!empty($val->event_detail->event_photos[0]->image)){ echo $this->Html->image("medium/".$val->event_detail->event_photos[0]->image, ['alt' => 'event']); }?>
</a>
															<div class="project-love-item-content project-love-box">
                                                                                                                                <a href="#" class="category"><?php if(!empty($category_datas->category_name)){ echo $category_datas->category_name; }?></a>
                                                                                                                                <?php if(!empty($val->event_detail->event_celebrities)){ foreach($val->event_detail->event_celebrities as $cat_details){ ?><p> <?php if(!empty($cat_details->celebrity_details[0]->name)){ echo $cat_details->celebrity_details[0]->name; }?></p>
																<h3><a href="event_details.html">The Best <?php if(!empty($cat_details->celebrity_details[0]->best_at)){ echo $cat_details->celebrity_details[0]->best_at; }?></a></h3>
																<div class="project-love-description"><?php if(!empty($cat_details->celebrity_details->description)){ echo substr($cat_details->celebrity_details->description,0,150); }?>..</div>
                                                                                                                                <?php }} ?>
                                                                                                                                <div class="project-love-author">
                                                                                                                                    <?php  if(!empty($val->event_detail->event_organizers)){
                                                                                                                                        foreach($val->event_detail->event_organizers as $event_tool){
                                                                                                                                         //   pr($event_tool);exit;
                                                                                                                                        ?>
																	<div class="author-profile">
																		<a class="author-avatar" href="#"><img src="images/author-01.png" alt=""></a>by <a class="author-name" href="#"><?php echo $event_tool->users[0]->fname.' '.$event_tool->users[0]->lname;?></a>
																	</div>
                                                                                                                                    <?php }} ?>
                                                                                                                                        <div class="author-address"><span class="ion-location"></span><?php if(!empty( $val->event_detail->event_location)) { echo $val->event_detail->event_location ; }?></div>
																</div>
																<div class="process">
																	<div class="raised"><span></span></div>
																	<div class="process-info">
																		<div class="process-pledged"><i class="fa fa-inr" aria-hidden="true"></i> <?php if(!empty( $val->event_detail->event_amount)) { echo $val->event_detail->event_amount ; }?></span>pledged</div>
																		<div class="process-funded"><span><?php if(!empty( $val->event_detail->event_amount)&& !empty( $val->event_detail->target_amount) ) {  $new_amount=($val->event_detail->target_amount/$val->event_detail->event_amount)*100 ; echo round($new_amount);}?>%</span>funded</div>
																		<div class="process-time"><span>37</span>backers</div>
                                                                                                                                                <?php if(!empty($val->event_detail->approx_start_date)){
                                                                                                                                                 $curr_date=date_create(date("Y-m-d"));
                                                                                                                                                $upcomming_date=date_create(date("Y-m-d",strtotime($val->event_detail->approx_start_date)));
                                                                                                                                                
                                                                                                                                                $diff=date_diff($curr_date,$upcomming_date);
                                                                                                                                                ?>
																		<div class="process-time"><span><?php echo  $diff->format("%R%a days");?></span>days ago</div>
                                                                                                                                                <?php }?>
																		<div class="process-time"><span>100</span>Likes</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
											</div>
										</div>
                                                                  </div>   <?php $k++;}  ?>

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
                                       
<!--						
                                                    
                                                        <?php $i++; }}?>
						</div>
					  </div>
				
			<!-- .project-love --
                        
                        <?php exit;?>