
<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />

<link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-flat.css" />
<style>
@import url(http://fonts.googleapis.com/css?family=Roboto:500,100,300,700,400);

* {
  margin: 0;
  padding: 0;
  font-family: roboto;
}





hr {
  margin: 20px;
  border: none;
  border-bottom: thin solid rgba(255,255,255,.1);
}

div.title { font-size: 2em; }

h1 span {
  font-weight: 300;
  color: #Fd4;
}

div.stars {
  width: 270px;
  display: inline-block;
}

input.star { display: none; }

label.star {
  float: right;
  padding: 10px;
  font-size: 36px;
  color: #444;
  transition: all .2s;
}

input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
  transition: all .25s;
}

input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 20px #952;
}

input.star-1:checked ~ label.star:before { color: #F62; }

label.star:hover { transform: rotate(-15deg) scale(1.3); }

label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}
</style>
<link href="http://www.cssscript.com/wp-includes/css/sticky.css" rel="stylesheet" type="text/css">

      <?php if(!empty($data_all)){  $data_all= json_decode($data_all); } ?><main id="main" class="site-main">
			<div class="page-title background-cart">
				<div class="container">
					<h1><?php echo $data_all->name;?></h1>
					<div class="breadcrumbs">
						<ul>
							<li>Home<span>/</span></li>
							<li><?php echo $data_all->name;?></li>
						</ul>
					</div><!-- .breadcrumbs -->
				</div>
			</div><!-- .page-title -->
			<div class="container">
				<div class="row">
					<div class="col-lg-8 main-content">
						<div class="shop-details-content">
							<article class="post">
								<span>Celebrity</span>
								<h2><?php echo $data_all->name;?></h2>
								<div class="shop-detail-img">
									<div id="owl-shop" class="shop-slider">
                                                                            <?php foreach($data_all->celebrity_photos as $val){ ?>
										<div class="item"><?php if(!empty($val->image)){ echo $this->Html->image("medium/".$val->image, ['alt' => 'event']); }?>
										</div>
                                                                            <?php } ?>
									</div>
								</div>
                                                                 <?php  if(!empty($AuthUser)) { 
                                                                                                  $count=0;
                                                                                                 // pr($val_category->celebrity_detail->event_follows);exit;
                                                                                                  foreach($data_all->event_follows as $follow){
                                                                                                      if($follow->user_id==$AuthUser['id']){
                                                                                                  
                                                                                                      $count=$count+1;
                                                                                                      }
                                                                                                  }
                                                                                                  
                                                                                               ?>
								<div class="follw-likes">
									<span> <i class="fa fa-film" aria-hidden="true"></i> <strong><?php echo $celebrity_count;?> </strong> Shows</span> <span><a href="<?php if($count==0){?><?php echo $this->Url->build('/celebrities/follow/'.$data_all->id, true);  }else { echo "#"; }?>"><?php  if($count>0){echo 'Followed'; } else {echo 'Follow'; } ?></a> <?php if(!empty($data_all->event_follows)) { echo count($data_all->event_follows); }else { echo '0'; }?></span>
								</div>
                                                                 <?php } ?>
								<h3>Descriptions</h3>
                                                                <p><?php echo $data_all->description;?></p>
                                                                  <?php  if(!empty($AuthUser)){ ?>
                                                                <button type="button" class="btn-primary" data-toggle="modal" data-target="#myModal_private">Request For Private Party</button>
											  	
                                                                                            <?php } ?>
<!--								<div class="widget-share">
										<h3 class="widget-title">Share this</h3>
										<div class="widget-content">
											<ul>
												<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
												<li><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
											</ul>
										</div>
									</div>-->
 <div id="share"></div>
 
								<div class="reviews">
									<!-- <h3>Reviews (0)</h3> -->
									<form action="<?php echo $this->Url->build('/celebrities/submit_rating', true); ?>" method="POST" id="shopdetailsForm" class="clearfix">
						  				<!-- <div class="field">
						  					<textarea rows="8" placeholder="Your review"></textarea>
						  				</div> -->
						  				<div class="field clearfix">
							  				<div class="align-left">
							  					<input type="text" value="" name="name" placeholder="Your Name" />
                                                                                                <input type="hidden" value="<?php if(!empty($AuthUser)){ echo $AuthUser['id'];?> <?php } ?>" name="user_id" />
                                                                                                  <input type="hidden" value="<?php if(!empty( $data_all->id)){ echo $data_all->id;?> <?php } ?>" name="cel_id" />
							  				</div>
							  				<div class="align-right">
							  					<input type="text" value="" name="email" placeholder="Your Email" />
							  				</div>
						  				</div>
						  				<div class="reviews-vote clearfix">
						  					<div class="vote">
							  					<span >Your Rating</span>
<!--						  						<ul class="rate-area">
						  							<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
						  							<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
						  							<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
						  							<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
						  							<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
						  						</ul>-->
<div class="cont">
  <div class="stars"><?php $celbrity_count11_rows=count($data_all->celebrity_rattings);
$total_ratting=0;  if(!empty($data_all->celebrity_rattings)){ 
   
      foreach($data_all->celebrity_rattings as $val){
          $total_ratting=$total_ratting+$val->rating;
      
      
  }
  }  if($total_ratting!=0){ $celbrity_count=$total_ratting/$celbrity_count11_rows;} else{ $celbrity_count=0; }?>
   
      <input class="star star-5" id="star-5-2" type="radio" name="star" value="5" <?php  if($celbrity_count==5){ echo "checked";} ?>/>
      <label class="star star-5" for="star-5-2"></label>
      <input class="star star-4" id="star-4-2" type="radio" name="star" value="4" <?php  if($celbrity_count==4){ echo "checked";} ?> />
      <label class="star star-4" for="star-4-2"></label>
      <input class="star star-3" id="star-3-2" type="radio" name="star" value="3" <?php  if($celbrity_count==3){ echo "checked";} ?>/>
      <label class="star star-3" for="star-3-2"></label>
      <input class="star star-2" id="star-2-2" type="radio" name="star" value="2" <?php  if($celbrity_count==2){ echo "checked";} ?>/>
      <label class="star star-2" for="star-2-2"></label>
      <input class="star star-1" id="star-1-2" type="radio" name="star" value="1" <?php  if($celbrity_count==1){ echo "checked";} ?>/>
      <label class="star star-1" for="star-1-2"></label>
   
  </div>
</div>

<!--<ul class="rate-area">

  <input type="radio" id="5-star" name="rating" value="5" /><label for="5-star" title="Amazing">5 stars</label>

  <input type="radio" id="4-star" name="rating" value="4" /><label for="4-star" title="Good">4 stars</label>

  <input type="radio" id="3-star" name="rating" value="3" /><label for="3-star" title="Average">3 stars</label>

  <input type="radio" id="2-star" name="rating" value="2" /><label for="2-star" title="Not Good">2 stars</label>

  <input type="radio" id="1-star" name="rating" value="1" /><label for="1-star" title="Bad">1 star</label>

</ul>-->

					  						</div>
                                                                                       <?php  if(!empty($AuthUser)) {
                                                                                         
                                                                                        $curr_id=$data_all->id;
                                                                                           if(!empty($data_all->celebrity_rattings)){
                                                                                           foreach($data_all->celebrity_rattings as $val){
                                                                                               
                                                                                               if(($val->user_id != $AuthUser['id'] )&&($val->celebrity_detail_id!=$curr_id)){
                                                                                           
                                                                                           ?><input type="submit" value="Send Review" class="btn-primary" value="Submit Review">
									  		
                                                                                       <?php }else{ ?>
                                                                                           
                                                                                           
                                                                               <?php        } }}else{   ?>
                                                                                   
                                                                                   
                                                                                     <input type="submit" value="Send Review" class="btn-primary" value="Submit Review">
                                                                                   
                                                                            <?php    } }?>
                                                                                </div>
								  	</form>
								</div>
							</article>
						</div>
					</div><!-- .main-content -->
					<div class="col-lg-4 sidebar">
						<aside class="widget widget-action">
							<h3 class="widget-title">Video Gallery</h3>
							<!-- 21:9 aspect ratio -->
							<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
								  <div class="carousel-inner">
                                                                      <?php  $i=1; if(!empty($data_all->celebrity_videos)){ foreach($data_all->celebrity_videos as $val){ ?>
                                                                      
                                                                        <div class="carousel-item <?php if($i==1){ ?> active <?php } ?>">
																		
								      <iframe src="<?php echo $val->video_url;?>"></iframe>
								    </div>
                                                                      <?php $i++;} } ?>
								  
								  </div>
								  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
									<span class="carousel-control-prev-icon" aria-hidden="true"> <img src="images/left-arrow.png" alt="" class="arrow-left2"> </span>
									<span class="sr-only">Previous</span>
								  </a>
								  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
									<span class="carousel-control-next-icon" aria-hidden="true"> <img src="images/right-arrow.png" alt="" class="arrow-right"> </span>
									<span class="sr-only">Next</span>
								  </a>
								</div>
						</aside><!-- .widget-search -->
						
						<aside class="widget widget-share">
								<h3 class="widget-title">Upcoming Events</h3>
							<div class="celebrity-details-event-listing">
                                                            
                                                                <?php if(!empty($data_event)){  $data_event= json_decode($data_event); } ?>
                                                            <?php if(!empty($data_event)){  foreach($data_event as $val){
                                                                if(!empty($val->event_detail)){
                                                                    $date_urr=date("Y-m-d");
                                                                    if($val->event_detail->approx_start_date >$date_urr){
                                                                ?>
                                                            
								<div class="campaign-item">
									<a class="overlay" href="eventDetails/event_detail/<?php echo $val->event_detail->id;?>">
										<?php if(!empty($val->image)){ echo $this->Html->image("medium/".$val->image, ['alt' => 'event']); }?>
										<span class="ion-ios-search-strong"></span>
									</a>
									<div class="campaign-box">
                                                                                <a href="#" class="category"><?php if(!empty( $val->event_detail->event_categories)) { echo $val->event_detail->event_categories[0]->category->category_name; }?></a>
                                                                                <h3><a href="<?php echo $this->Url->build('/eventDetails/event_detail/'.$val->event_detail->id, true); ?>"><?php echo $val->event_detail->event_title;?></a></h3>
										<div class="campaign-description"><?php echo $val->event_detail->event_description;?></div>
                                                                                <div class="campaign-description"><?php echo $val->event_detail->event_location;?></div>
                                                                                <?php if(!empty($val->event_detail->event_organizers)){  ?>
										<div class="campaign-author"><a class="author-icon" href="#"><?php if(!empty($val->event_detail->event_organizers[0]->users)){ echo $this->Html->image("medium/".$val->event_detail->event_organizers[0]->users[0]->image, ['alt' => 'event']); }?></a>by <a class="author-name" href="#"><?php echo $val->event_detail->event_organizers[0]->users[0]->fname;?></a></div>
                                                                                <?php } ?>
                                                                                 <?php   $total=0; if(!empty($val->event_detail)){
                                                                                                                    
              
                                                                                                        foreach($val->event_detail->event_orders as $val11){
                                                                                                        if(!empty($val11->total_price)){
            
                                                                                                           $total=$total+$val11->product_price;
                                                                                 } } }      
                                                                                                                              ?>
                                                                                <div class="process">
											<div class="progress">
  <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar"
  aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:<?php if(!empty( $val->event_detail->event_amount)&& !empty($val->event_detail->target_amount) ) {  $new_amount=($total/$val->event_detail->event_amount)*100 ; echo round($new_amount);}?>%">
   
  </div>
</div>                
											<div class="process-info">
												<div class="process-pledged"><span><i class="fa fa-inr" aria-hidden="true"></i><?php echo $val->event_detail->event_amount;?></span>pledged</div>
											<div class="process-funded"><span><?php if(!empty( $val->event_detail->event_amount)&& !empty($val->event_detail->target_amount) ) {  $new_amount=($total/$val->event_detail->event_amount)*100 ; echo round($new_amount);}?>%</span>funded</div>
								<div class="process-time"><span><?php if(!empty($val->event_detail->approx_start_date)){
                                                                                                                                                 $curr_date=date_create(date("Y-m-d"));
                                                                                                                                                $upcomming_date=date_create(date("Y-m-d",strtotime($val->event_detail->approx_start_date)));
                                                                                                                                                
                                                                                                                                                $diff=date_diff($curr_date,$upcomming_date);
                                                                                                                                                ?>
																		<div class="process-time"><span><?php echo  $diff->format("%R%a days");?></span>days </div>
							 <?php } ?></div>
											</div>
										</div>
									</div>
								</div>
                                                            
                                                            <?php }else{ echo "No Event Available"; }}}} ?>
<!--								<div class="campaign-item">
									<a class="overlay" href="event_details.html">
										<img src="images/3.jpg" alt="">
										<span class="ion-ios-search-strong"></span>
									</a>
									<div class="campaign-box">
										<a href="#" class="category">Design &amp; Art</a>
										<h3><a href="event_details.html">Bring back Fun House</a></h3>
										<div class="campaign-description">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia.</div>
										<div class="campaign-author"><a class="author-icon" href="#"><img src="images/author-01.png" alt=""></a>by <a class="author-name" href="#">Samino</a></div>
										<div class="process">
											<div class="raised"><span></span></div>
											<div class="process-info">
												<div class="process-pledged"><span><i class="fa fa-inr" aria-hidden="true"></i>3900</span>pledged</div>
												<div class="process-funded"><span>69%</span>funded</div>
												<div class="process-time"><span>33</span>days ago</div>
											</div>
										</div>
									</div>
								</div>
								<div class="campaign-item">
									<a class="overlay" href="event_details.html">
										<img src="images/4.jpg" alt="">
										<span class="ion-ios-search-strong"></span>
									</a>
									<div class="campaign-box">
										<a href="#" class="category">Technology</a>
										<h3><a href="event_details.html">Redefine Your VR Experience</a></h3>
										<div class="campaign-description">I enjoy with my whole heart. I am alone, and feel the charm of existence in this spot.</div>
										<div class="campaign-author"><a class="author-icon" href="#"><img src="images/author-02.png" alt=""></a>by <a class="author-name" href="#">Sabato Alterio</a></div>
										<div class="process">
											<div class="raised"><span></span></div>
											<div class="process-info">
												<div class="process-pledged"><span><i class="fa fa-inr" aria-hidden="true"></i>1950</span>pledged</div>
												<div class="process-funded"><span>70%</span>funded</div>
												<div class="process-time"><span>23</span>days ago</div>
											</div>
										</div>
									</div>
								</div>
								<div class="campaign-item">
										<a class="overlay" href="event_details.html">
											<img src="images/5.jpg" alt="">
											<span class="ion-ios-search-strong"></span>
										</a>
										<div class="campaign-box">
											<a href="#" class="category">Technology</a>
											<h3><a href="event_details.html">Smart Wallet with Solar Charge</a></h3>
											<div class="campaign-description">A wonderful serenity has taken possession of my entire soul, like these sweet mornings.</div>
											<div class="campaign-author"><a class="author-icon" href="#"><img src="images/author-03.png" alt=""></a>by <a class="author-name" href="#">Andrew Noah</a></div>
											<div class="process">
												<div class="raised"><span></span></div>
												<div class="process-info">
													<div class="process-pledged"><span><i class="fa fa-inr" aria-hidden="true"></i>3670</span>pledged</div>
													<div class="process-funded"><span>58%</span>funded</div>
													<div class="process-time"><span>21</span>days ago</div>
												</div>
											</div>
										</div>
								</div>	
								<div class="campaign-item">
										<a class="overlay" href="event_details.html">
											<img src="images/6.jpg" alt="">
											<span class="ion-ios-search-strong"></span>
										</a>
										<div class="campaign-box">
											<a href="#" class="category">Technology</a>
											<h3><a href="event_details.html">Smart Wallet with Solar Charge</a></h3>
											<div class="campaign-description">A wonderful serenity has taken possession of my entire soul, like these sweet mornings.</div>
											<div class="campaign-author"><a class="author-icon" href="#"><img src="images/author-03.png" alt=""></a>by <a class="author-name" href="#">Andrew Noah</a></div>
											<div class="process">
												<div class="raised"><span></span></div>
												<div class="process-info">
													<div class="process-pledged"><span> <i class="fa fa-inr" aria-hidden="true"></i> 3670</span>pledged</div>
													<div class="process-funded"><span>58%</span>funded</div>
													<div class="process-time"><span>21</span>days ago</div>
												</div>
											</div>
										</div>
								</div>	-->


							</div>
						</aside>
						<aside class="widget widget-popular">
							<h3 class="widget-title">Previous Events</h3>
							<ul> 
                                                            <?php if(!empty($data_event)){  foreach($data_event as $val){
                                                                if(!empty($val->event_detail)){
                                                                    $date_urr=date("Y-m-d");
                                                                    if($val->event_detail->approx_start_date < $date_urr){
                                                                ?>
                                                            
                                                            
								<li>
									<?php if(!empty($val->image)){ echo $this->Html->image("medium/".$val->image, ['alt' => 'event']); }?>
									  <?php   $total=0; if(!empty($val->event_detail)){
                                                                                                                    
              
                                                                                                        foreach($val->event_detail->event_orders as $val11){
                                                                                                        if(!empty($val11->total_price)){
            
                                                                                                           $total=$total+$val11->product_price;
                                                                                 } } }      
                                                                                                                              ?>
									<div class="campaign-box">
											<div class="process ml-5">
                                                                                             <h5><a href="#"><?php echo $val->event_detail->event_title;?></a></h5>
													<div class="process-info ml-5">
                                                                                                           
										<div class="campaign-description"><?php echo $val->event_detail->event_description;?></div>
                                                                                <div class="campaign-description"><?php echo $val->event_detail->event_location;?></div>
														<div class="process-funded"><span class="new-like"><?php echo $val->event_detail->target_amount;?></span>Amount Target</div>
														<div class="process-time"><span class="new-like"><?php echo $total;?></span>Funded</div>
													</div>
												</div>
												</div>
								</li>
                                                            <?php }else{ echo "No Event Available"; }  } } } ?>
<!--                                                                <li>
									<a href="#"><img src="images/6.jpg" alt=""></a>
									<h4><a href="#">Audio Post World of Education</a></h4>
									<div class="campaign-box">
											<div class="process ml-5">
													<div class="process-info ml-5">
														<div class="process-funded"><span class="new-like">69,000</span>funded</div>
														<div class="process-time"><span class="new-like">33,000</span>Crowd</div>
													</div>
												</div>
												</div>
								</li>
								<li>
									<a href="#"><img src="images/6.jpg" alt=""></a>
									<h4><a href="#">Quote Post World of Education</a></h4>
									<div class="campaign-box">
											<div class="process ml-5">
													<div class="process-info ml-5">
														<div class="process-funded"><span class="new-like">69,000</span>funded</div>
														<div class="process-time"><span class="new-like">33,000</span>Crowd</div>
													</div>
												</div>
												</div>
								</li>-->
							</ul>
						</aside>
                                                <aside class="widget widget-popular">
							<h3 class="widget-title">News Details</h3>
							<ul> 
                                                            <?php  if(!empty($data_all)){  foreach($data_all as $val){
                                                                if(!empty($val->news_celebrities)){
                                                                    $date_urr=date("Y-m-d");
                                                                    if($val->news_celebrities->news_details){
                                                                ?>
                                                            
                                                            
								<li>
									<?php if(!empty($val->image)){ echo $this->Html->image("medium/".$val->image, ['alt' => 'event']); }?>
									  <?php   $total=0; if(!empty($val->event_detail)){
                                                                                                                    
              
                                                                                                        foreach($val->event_detail->event_orders as $val11){
                                                                                                        if(!empty($val11->total_price)){
            
                                                                                                           $total=$total+$val11->product_price;
                                                                                 } } }      
                                                                                                                              ?>
									<div class="campaign-box">
											<div class="process ml-5">
                                                                                             <h5><a href="#"><?php echo $val->event_detail->event_title;?></a></h5>
													<div class="process-info ml-5">
                                                                                                           
										<div class="campaign-description"><?php echo $val->event_detail->event_description;?></div>
                                                                                <div class="campaign-description"><?php echo $val->event_detail->event_location;?></div>
														<div class="process-funded"><span class="new-like"><?php echo $val->event_detail->target_amount;?></span>Amount Target</div>
														<div class="process-time"><span class="new-like"><?php echo $total;?></span>Funded</div>
													</div>
												</div>
												</div>
								</li>
                                                            <?php }else{ echo "No News Available"; }  } } } ?>
<!--                                                                <li>
									<a href="#"><img src="images/6.jpg" alt=""></a>
									<h4><a href="#">Audio Post World of Education</a></h4>
									<div class="campaign-box">
											<div class="process ml-5">
													<div class="process-info ml-5">
														<div class="process-funded"><span class="new-like">69,000</span>funded</div>
														<div class="process-time"><span class="new-like">33,000</span>Crowd</div>
													</div>
												</div>
												</div>
								</li>
								<li>
									<a href="#"><img src="images/6.jpg" alt=""></a>
									<h4><a href="#">Quote Post World of Education</a></h4>
									<div class="campaign-box">
											<div class="process ml-5">
													<div class="process-info ml-5">
														<div class="process-funded"><span class="new-like">69,000</span>funded</div>
														<div class="process-time"><span class="new-like">33,000</span>Crowd</div>
													</div>
												</div>
												</div>
								</li>-->
							</ul>
						</aside>
					</div>
				</div>
			</div>	
                        <div id="myModal_private" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      
        <h4 class="modal-title">Request For Private Party</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
            <form method="post" action="<?php echo $this->Url->build('/celebrities/private_request', true); ?>">
              <input type="text" name="cel_id" value="<?php echo $id ?>"/>
          <label>Name</label>
          <input type="text" name="name" value="" class="form-control" required=""/>
           <label>Email</label>
          <input type="text" name="email" value="" class="form-control" required=""/>
           <label>Phone</label>
          <input type="text" name="phno" value="" class="form-control" required=""/>
           <label>Location City</label>
          <input type="text" name="city" value="" class="form-control" required=""/>
            <input type="submit" class="btn btn-default" name="submit" value="Submit" />
                </div>
    
        </form>

    </div>

  </div>
</div>
		</main><!-- .site-main -->

	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46156385-1', 'cssscript.com');
  ga('send', 'pageview');

</script>