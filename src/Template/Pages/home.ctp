<?php
$this->layout = 'default';
?>
		<main id="main" class="site-main">
                 <?php    if(!empty($data_all_event)){
                     
                                                     ?>
                                  <?php if(!empty($data_all_event[0]->event_photos[0]->image)){ ?>            
<!--                    <div class="sideshow" style="background-image: url('<?php echo "http://localhost/git_project/WebIdeasole/celebritycalling/img/medium/".$data_all_event[0]->event_photos[0]->image;?>');"> <?php }?>    
				<div class="container">
					<div class="sideshow-content">
						<h1 class="wow fadeInUp" data-wow-delay=".1s"><a href="eventDetails/event_detail/<?php echo $data_all_event[0]->id;?>"><?php echo $data_all_event[0]->event_title;?></a></h1>
						<div class="sideshow-description wow fadeInUp" data-wow-delay=".1s"><?php echo $data_all_event[0]->event_description;?>.</div>
						<div class="process wow fadeInUp" data-scroll-nav="1">
							<div class="raised"><span></span></div>
                                                   
                                         <div class="progress">
  <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar"
  aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php if(!empty( $data_all_event[0]->event_amount)&& !empty($data_all_event[0]->target_amount) ) {  $new_amount=($total/$data_all_event[0]->event_amount)*100 ; echo round($new_amount);}?>%">
   
  </div>
</div>                
							<div class="process-info">
								<div class="process-funded"><span><?php if(!empty( $data_all_event[0]->event_amount)&& !empty($data_all_event[0]->target_amount) ) {  $new_amount=($total/$data_all_event[0]->event_amount)*100 ; echo round($new_amount);}?>%</span>funded</div>
								<div class="process-pledged"><span><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $data_all_event[0]->event_amount;?></span>pledged</div>
								
							<?php if(!empty($data_all_event[0]->approx_start_date)){
                                                                                                                                                 $curr_date=date_create(date("Y-m-d"));
                                                                                                                                                $upcomming_date=date_create(date("Y-m-d",strtotime($data_all_event[0]->approx_start_date)));
                                                                                                                                                
                                                                                                                                                $diff=date_diff($curr_date,$upcomming_date);
                                                                                                                                                ?>
																		<div class="process-time"><span><?php echo  $diff->format("%R%a days");?></span>days ago</div>
							 <?php } ?></div>
						</div>
						<div class="button wow fadeInUp" data-wow-delay="0.1s">
							<a href="eventDetails/event_detail/<?php echo $data_all_event[0]->id;?>" class="btn-secondary">See Events</a>
							<a href="eventDetails/event_detail/<?php echo $data_all_event[0]->id;?>" class="btn-primary">Buy Now</a>
						</div>
					</div> .sideshow-content 
				</div>
			</div>-->
                             <?php }  ?> 
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner flexslider">
                                    <?php  if(!empty($data_event)){ $i=0;  foreach($data_event as $slider_image){ 
                                      //  pr($slider_image);exit;
                                          $total=0;
              
          foreach($slider_image->event_orders as $val){
           if(!empty($val->total_price)){
            
                $total=$total+$val->product_price;
                                           } } 
                                        
                                        ?>
                                        <div class="carousel-item slides <?php if($i==0){ echo "active"; } ?>">
				       <div class="sideshow" style="background-image: url('<?php echo "img/medium/".$slider_image->event_photos[0]->image;?>');"> 
		
						<div class="container">
							<div class="sideshow-content">
								<h1 class="wow fadeInUp" data-wow-delay=".1s"><?php echo $slider_image->event_title;?></h1>
								<div class="sideshow-description wow fadeInUp" data-wow-delay=".1s"><?php echo $slider_image->event_description;?></div>
								<div class="process wow fadeInUp" data-scroll-nav="1">
									  <div class="progress">
  <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar"
  aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php if(!empty( $slider_image->event_amount)&& !empty($slider_image->target_amount) ) {  $new_amount=($total/$slider_image->event_amount)*100 ; echo round($new_amount);}?>%">
   
  </div>
</div>                
									<div class="process-info">
										<div class="process-funded"><span><?php if(!empty($slider_image->event_amount)&& !empty($slider_image->target_amount) ) {  $new_amount=($total/$slider_image->event_amount)*100 ; echo round($new_amount);}?>%</span>funded</div>
<div class="process-pledged"><span><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $slider_image->event_amount;?></span>pledged</div>
								<!--							<div class="process-backers"><span>32</span>backers</div>-->
                                                                                <?php if(!empty($slider_image->approx_start_date)){
                                                                                                                                                 $curr_date=date_create(date("Y-m-d"));
                                                                                                                                                $upcomming_date=date_create(date("Y-m-d",strtotime($slider_image->approx_start_date)));
                                                                                                                                                
                                                                                                                                                $diff=date_diff($curr_date,$upcomming_date);
                                                                               
                                                                                                                                                ?>
										<div class="process-time"><span><?php echo  $diff->format("%R%a days");?></span> ago</div>
                                                                                <?php } ?>
									</div>
								</div>
								<div class="button wow fadeInUp" data-wow-delay="0.1s">
									<a href="eventDetails/event_detail/<?php echo $slider_image->id;?>" class="btn-secondary">See Events</a>
							<a href="eventDetails/event_detail/<?php echo $slider_image->id;?>" class="btn-primary">Buy Now</a>
						
								</div>
							</div><!-- .sideshow-content -->
						</div>
					</div><!-- .sideshow -->
					</div>
                                    <?php $i++;}} ?>
<!--					<div class="carousel-item slides">
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
							</div> .sideshow-content 
						</div>
					</div> .sideshow 
					</div>-->

					
					</div>

					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" >
									<span class="carousel-control-prev-icon" aria-hidden="true"> <img src="images/left-arrow.png" alt="" class="arrow-left"> </span>
									<span class="sr-only">Previous</span>
								  </a>
								  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"> <img src="images/right-arrow.png" alt="" class="arrow-right"> </span>
									<span class="sr-only">Next</span>
								  </a>
					</div>
                    
                    <!-- .sideshow -->
			  <?php //if(isset($data_all)){
				
                              //  pr($data_all);exit;
                                  //      }
                                                          ?>
<!--			<div class="project-love">
				<div class="container">
					<h2 class="title">Projects We Love</h2>
					<div class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</div>
                                      
					<div class="col-md-8 mx-auto photo-tabs">
						<ul class="nav nav-pills mb-3 nav-justified red" id="pills-tab" role="tablist">
                                                    <?php 
                                                        if(isset($data_all)){
							$i=0;
                                                        foreach($data_all as $category_datas){
                                                          
                                                            ?>
							<li class="nav-item">
                                                            <a class="nav-link <?php if($i==0){ ?> active <?php } ?>" id="pills-tab-<?php echo $category_datas->id;?>" data-toggle="pill" href="#pills-<?php echo $category_datas->id;?>" role="tab" aria-controls="pills-<?php echo $category_datas->id;?>" aria-selected=<?php if($i==0){ echo "true" ; }else{ ?> <?php echo "false"; } ?> onclick="category_change(<?php echo $category_datas->id;?>)"><?php echo $category_datas->category_name;?></a>
							</li>
                                                        <?php $i++;}} ?>
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
                                                    <div id="loder_div" style="display:none;"><img src="images/ajax-loader.gif" alt=""></div>
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
                                                                                
                                                                                            
                                                                                        <p><?php if(!empty($val->event_detail->event_description)){ echo $val->event_detail->event_description ; }?></p>
                                                                                        
										</div>
										</div>
										<div class="col-md-8 pls-col">
												<div>
														<div class="project-love-item clearfix">
															<a class="project-love-image" href="eventDetails/event_detail/<?php echo $val->event_detail->id;?>"> <?php if(!empty($val->event_detail->event_photos[0]->image)){ echo $this->Html->image("medium/".$val->event_detail->event_photos[0]->image, ['alt' => 'event']); }?>
</a>
															<div class="project-love-item-content project-love-box">
                                                                                                                                <a href="#" class="category"><?php if(!empty($category_datas->category_name)){ echo $category_datas->category_name; }?></a>
                                                                                                                                <?php if(!empty($val->event_detail->event_celebrities)){ foreach($val->event_detail->event_celebrities as $cat_details){ ?><p> <?php if(!empty($cat_details->celebrity_details[0]->name)){ echo $cat_details->celebrity_details[0]->name; }?></p>
																<h3><a href="#">The Best <?php if(!empty($cat_details->celebrity_details[0]->best_at)){ echo substr($cat_details->celebrity_details[0]->best_at, 0, 30); }?></a></h3>
																<div class="project-love-description"><?php if(!empty($cat_details->celebrity_details->description)){ echo substr($cat_details->celebrity_details->description, 0, 30); }?></div>
                                                                                                                                 <?php }} ?>
                                                                                                                                <div class="project-love-author">
                                                                                                                                    <?php  if(!empty($val->event_detail->event_organizers)){
                                                                                                                                        foreach($val->event_detail->event_organizers as $event_tool){
                                                                                                                                         //   pr($event_tool);exit;
                                                                                                                                        ?>
																	<div class="author-profile">
																		<a class="author-avatar" href="#"><?php echo $this->Html->image("medium/".$event_tool->users[0]->image, ['alt' => 'event']); ?></a>by <a class="author-name" href="#"><?php echo $event_tool->users[0]->fname.' '.$event_tool->users[0]->lname;?></a>
																	</div>
                                                                                                                                    <?php }} ?>
                                                                                                                                        <div class="author-address"><span class="ion-location"></span><?php if(!empty( $val->event_detail->event_location)) { echo $val->event_detail->event_location ; }?></div>
																</div>
																<div class="process">
                                                                                                                                     <?php     $amount=0;   if(!empty($val->event_detail->event_orders)){ foreach($val->event_detail->event_orders as $val_amount){
                                                                                                  if(!empty($val_amount->total_price)){
            
                                                                                                     $amount=$amount+$val_amount->product_price;
                                                                                 } }   }  ?>
																	  <div class="progress">
                                                                                                                                              
  <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar"
  aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php if(!empty( $val->event_detail->event_amount)&& !empty( $amount) ) {  $new_amount=($amount/$val->event_detail->event_amount)*100 ; echo round($new_amount);}?>%">
   
  </div>
</div>                
																	<div class="process-info">
																		<div class="process-pledged"><span><i class="fa fa-inr" aria-hidden="true"></i> <?php if(!empty( $val->event_detail->event_amount)) { echo $val->event_detail->event_amount ; }?></span>pledged</div>
																		<div class="process-funded"><span><?php if(!empty( $val->event_detail->event_amount)&& !empty( $val->event_detail->target_amount) ) {  $new_amount=($amount/$val->event_detail->event_amount)*100 ; echo round($new_amount);}?>%</span>funded</div>
																		<div class="process-time"><span></span></div>
																		 <?php if(!empty($val->event_detail->approx_start_date)){
                                                                                                                                                 $curr_date=date_create(date("Y-m-d"));
                                                                                                                                                $upcomming_date=date_create(date("Y-m-d",strtotime($val->event_detail->approx_start_date)));
                                                                                                                                                
                                                                                                                                                $diff=date_diff($curr_date,$upcomming_date);
                                                                                                                                                ?>
																		<div class="process-time"><span><?php echo  $diff->format("%R%a days");?></span>days ago</div>
                                                                                                                                                <?php }?>
																		<div class="process-time"><span></span></div>
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
                                       
						
                                                    
                                                        <?php $i++; }}?>
						</div>
					  </div>
				
			<!-- .project-love </div>
					  </div></div>
			</div>-->
                        <div class="project-love">
				<div class="container">
					<h2 class="title">Projects We Love</h2>
					<!-- <div class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</div> -->
                                        <form class="example" method="post" action="#" style="margin:auto;max-width:500px">
					  <input type="text" placeholder="Search.." name="search2">
                                          <input type="submit" name="submit" value="submit" class="new-src" />
					</form>

<!--					<div class="partners">
				<div class="container">

					<div class="partners-slider owl-carousel">
                                            <?php   if(!empty($AuthUser)) { 
//                                                                                                  $count=0;
//                                                                                                 // pr($val_category->celebrity_detail->event_follows);exit;
//                                                                                                  foreach($staff_data->celebrity_detail->event_follows as $follow){
//                                                                                                      if($follow->user_id==$AuthUser['id']){
//                                                                                                  
//                                                                                                      $count=$count+1;
//                                                                                                      }
//                                                                                                  }
                                                                                                  
                                                                                               ?>
                                                                                           	
                                                                                          
                                                                                              <?php } ?>
                                            <?php 
                                            if(isset($staff_data)){
				$event_data=json_decode($staff_data);
                                            }  
                                           
                                            foreach($event_data as $val ){  //pr($val->celebrity_photos[0]->image);exit;
                                          ?>
                                            
                                            
                             <div class="row filter-celeb">
					<div class="col-lg-12 main-content">
						 
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						  <div class="carousel-inner flexslider">
                                                   
                                                      
                                                         <div class="carousel-item slides active">
								<div class="row">
                                                                     <?php $i=0; foreach($event_data as $val ){ ?>
										<div class="col-md-3 celeb">
                                                                                        <a href="celebrities/celebrity_detail/<?php echo $val->id;?>"><?php if(!empty($val->celebrity_photos[0]->image)){ ?> <img src="img/medium/<?php echo $val->celebrity_photos[0]->image;?>" alt=""> <?php } ?></a>
											<div class="product-info">
												
												<h3 class="product-title"><a href="celebrities/celebrity_detail/<?php echo $val->id;?>">celebrities/celebrity_detail/<?php echo $val->name;?></a></h3>
												<p class="product-price"><?php echo $val->best_at;?></p>
										 <?php        if(!empty($AuthUser)) { 
                                                                                                  $count=0;
                                                                                                 // pr($val_category->celebrity_detail->event_follows);exit;
                                                                                                  foreach($val->event_follows as $follow){
                                                                                                      if($follow->user_id==$AuthUser['id']){
                                                                                                  
                                                                                                      $count=$count+1;
                                                                                                      }
                                                                                                  } ?>		
                        <p class="product-like"> <a href="#"><i class="far fa-thumbs-up"></i> Like</a> <span class="follow"><a href="<?php if($count==0){?><?php echo $this->Url->build('/celebrities/follow/'.$val->id, true);  }else { echo "#"; }?>"><?php  if($count>0){echo 'Followed'; } else {echo 'Follow'; } ?></a> <?php if(!empty($val->event_follows)) { echo count($val->event_follows); }else { echo '0'; }?></span>
						 <?php } ?>						</p>
												 
											</div>
										</div>
                                                                     <?php $i++;} ?>
										
									</div>
								</div>
								
                                                  
								  </div>
								  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" >
									<span class="carousel-control-prev-icon" aria-hidden="true"> <img src="images/left-arrow.png" alt="" class="arrow-left"> </span>
									<span class="sr-only">Previous</span>
								  </a>
								  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"> <img src="images/right-arrow.png" alt="" class="arrow-right"> </span>
									<span class="sr-only">Next</span>
								  </a>
								</div>
						
						
					</div>
				</div>               
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                           
						
                                            <?php } ?>	
                                            
<!--						<div><a href="celebrity_details.html"><img src="images/celibrity1.png" alt=""></a><p>Follow: 2,200</p></div>
						<div><a href="celebrity_details.html"><img src="images/celibrity2.png" alt=""></a><p>Follow: 2,200</p></div>
						<div><a href="celebrity_details.html"><img src="images/celibrity3.png" alt=""></a><p>Follow: 2,200</p></div>
						<div><a href="celebrity_details.html"><img src="images/celibrity4.png" alt=""></a><p>Follow: 2,200</p></div>
						<div><a href="celebrity_details.html"><img src="images/celibrity5.png" alt=""></a><p>Follow: 2,200</p></div>
						<div><a href="celebrity_details.html"><img src="images/celibrity7.png" alt=""></a><p>Follow: 2,200</p></div>
						<div><a href="celebrity_details.html"><img src="images/celibrity8.png" alt=""></a><p>Follow: 2,200</p></div>
					</div>
				</div>
			</div> .partners -->

                                                 
                                                 
                                      <div class="row filter-celeb">
					<div class="col-lg-12 main-content">
						 
						<div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
						  <div class="carousel-inner flexslider">
							 <div class="carousel-item slides active">
								<div class="row">
                                                                     <?php 
                                            if(isset($array2)){
				$event_data=json_decode($array2);
                               // pr($event_data);exit;
                                            }  
                                           
                                            foreach($event_data as $val ){ 
                                          ?>
										<div class="col-md-3 celeb">
											    <a href="celebrities/celebrity_detail/<?php echo $val[0]->id;?>"><?php if(!empty($val[0]->celebrity_photos[0]->image)){ ?> <img src="img/medium/<?php echo $val[0]->celebrity_photos[0]->image;?>" alt=""> <?php } ?></a>
										
											<div class="product-info">
												
												<h3 class="product-title"><a href="celebrities/celebrity_detail/<?php echo $val[0]->id;?>"><?php echo $val[0]->name;?></a></h3>
												<p class="product-price"><?php echo $val[0]->best_at;?></p>
												 <?php        if(!empty($AuthUser)) { 
                                                                                                  $count=0;
                                                                                                 // pr($val_category->celebrity_detail->event_follows);exit;
                                                                                                  foreach($val[0]->event_follows as $follow){
                                                                                                      if($follow->user_id==$AuthUser['id']){
                                                                                                  
                                                                                                      $count=$count+1;
                                                                                                      }
                                                                                                  } ?>		
                        <p class="product-like"> <a href="#"><i class="far fa-thumbs-up"></i> Like</a> <span class="follow"><a href="<?php if($count==0){?><?php echo $this->Url->build('/celebrities/follow/'.$val[0]->id, true);  }else { echo "#"; }?>"><?php  if($count>0){echo 'Followed'; } else {echo 'Follow'; } ?></a> <?php if(!empty($val[0]->event_follows)) { echo count($val[0]->event_follows); }else { echo '0'; }?></span>
						 <?php } ?>			</p>
												 
											</div>
										</div>
                                            <?php } ?>		
										
									</div>
								</div>
								
								  </div>
								  <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev" >
									<span class="carousel-control-prev-icon" aria-hidden="true"> <img src="images/left-arrow.png" alt="" class="arrow-left"> </span>
									<span class="sr-only">Previous</span>
								  </a>
								  <a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"> <img src="images/right-arrow.png" alt="" class="arrow-right"> </span>
									<span class="sr-only">Next</span>
								  </a>
								</div>
						
						
					</div>
				</div>           
                                                 
                                                 
                                                 
                                                 
                                                 
				<!-- 	<div class="col-md-8 mx-auto photo-tabs">
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
					</div> -->

					<!-- <div class="col-md-12 pt-3 pb-5">
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
					  </div> -->
				</div>
			</div>
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
						<button class="button is-checked" data-filter=".filterinteresting" onclick="swap_type(0)">Interesting</button>
                                                <button class="button" data-filter=".filtersuccessful" onclick="swap_type(1)">Organised</button>
						<button class="button" data-filter=".filterpopular" onclick="swap_type(2)">Popular</button>
						<button class="button" data-filter=".filterlatest" onclick="swap_type(3)">Latest</button>
					</div>
                                        <div id="org_data">
                                             <div  class="campaign-content grid"  style="height:auto !important;">
                                            <div class="row" >
                                                    
                                                 <?php  if(!empty($data_all_event)){
                                                     foreach($data_all_event as $valnw){ //pr($valnw);exit; ?>
							<div class="col-lg-4 col-md-6 col-sm-6 col-6 filterinteresting filterpopular filterlatest">
								<div class="campaign-item">
									<a class="overlay" href="eventDetails/event_detail/<?php echo $valnw->id;?>">
										<?php if(!empty($valnw->event_photos[0]->image)){ echo $this->Html->image("medium/".$valnw->event_photos[0]->image, ['alt' => 'event']); }?>
										<span class="ion-ios-search-strong"></span>
									</a>
									<div class="campaign-box">
                                                                           
                                                                            <a href="#" class="category"> <?php foreach($valnw->event_categories as $val){  ?><?php echo $val->category->category_name;?> , <?php } ?></a>
                                                                          
										<h3><a href="eventDetails/event_detail/<?php echo $valnw->id;?>"><?php echo $valnw->event_title;?></a></h3>
										<div class="campaign-description"><?php echo $valnw->event_description;?></div>
                                                                                <div class="campaign-author"><a class="author-icon" href="#"><?php if(!empty($valnw->event_organizers)) { foreach($valnw->event_organizers as $new1){ ?><?php echo $this->Html->image("medium/".$new1->users[0]->image, ['alt' => 'event']); ?></a>by <a class="author-name" href="#"><?php echo $new1->users[0]->fname.' '. $new1->users[0]->lname;?>, <?php }} ?></a></div>
										<div class="process">
<!--											<div class="raised"><span></span></div>-->
                                                                                         <?php     $amount11=0;   if(!empty($valnw->event_orders)){ foreach($valnw->event_orders as $val_amount){
                                                                                                  if(!empty($val_amount->total_price)){
            
                                                                                                     $amount11=$amount11+$val_amount->product_price;
                                                                                 } }   }  ?>
                                                                                       <div class="progress">
  <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar"
  aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php if(!empty( $valnw->event_amount)&& !empty( $valnw->target_amount) ) {  $new_amount=($amount11/$valnw->event_amount)*100 ; echo round($new_amount);}?>%">
   
  </div>
</div>                
											<div class="process-info">
												<div class="process-pledged"><span><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $valnw->event_amount;?></span>pledged</div>
												<div class="process-funded"><span><?php if(!empty( $valnw->event_amount)&& !empty( $valnw->target_amount) ) {  $new_amount=($amount11/$valnw->event_amount)*100 ; echo round($new_amount);}?>%</span>funded</div>
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
                                                    
                                                 <?php }} ?>

                                            </div></div>
					</div>
					<div class="latest-button"><a href="eventDetails/eventList" class="btn-primary">View all Events</a></div>
				</div>
			</div><!-- .latest -->

<!--			<div class="blognews">
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
										<div class="blognews-content"><p>Waking up is hard to do. That�s why this company is making sleep a priority by giving the classic face mask an upgrade.</p></div>
									</div>
								</article>
							</div>
						</div>
					</div>
				</div>
				<div class="latest-button text-center m-5"><a href="blog.html" class="btn-primary">View all Blogs</a></div>
			</div> .story -->
			<div class="partners">
				<div class="container">
					<div class="partners-slider owl-carousel">
                                            
                                            <?php 
                                            if(isset($array2)){
				$event_data=json_decode($array2);
                                            }
                                            foreach($event_data as $val ){  //pr($val->celebrity_photos[0]->image);exit;?>
                                            
                                            <div><a href="celebrities/celebrity_detail/<?php echo $val[0]->id;?>"><?php if(!empty($val[0]->celebrity_photos[0]->image)){ ?> <img src="img/medium/<?php echo $val[0]->celebrity_photos[0]->image;?>" class="img-circle" style="height:70px; "/>
<?php } ?></a></div>
					
						
                                            <?php } ?>	
					</div>
				</div>
			</div><!-- .partners -->
		</main><!-- .site-main -->

                <script>
                    function category_change(cat_id){
                     //   alert(cat_id);
                   //  $("#loder_div").show();
                         $.ajax({
				type: "POST",
				evalScripts: true,
				url: '<?php echo $this->Url->build('/Pages/replace_tab', true);  ?>',
				data: ({cat_id:cat_id}),
				success: function (data){
                                // alert(data)
                                
                                   $("#pills-tabContent").html(data);
                                    $('.carousel').carousel({
                                        interval: 2000
                                        })
                                   //      $("#loder_div").hide();
                               
				}
		    });
                    }
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
                        