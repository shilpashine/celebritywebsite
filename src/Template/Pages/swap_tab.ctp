<?php
$this->layout = 'default';
if($id==1){
?>  <div  class="campaign-content grid"  style="height:auto !important;"> <div class="row" ><?php if(!empty($data_all_event)){ foreach($data_all_event as $valnw){ //pr($valnw);exit; 
if(!empty($valnw->event_organizers)) {?>
							<div class="col-lg-4 col-md-6 col-sm-6 col-6 filterinteresting filterpopular filterlatest">
								<div class="campaign-item">
									<a class="overlay" href="event_details.html">
										<?php if(!empty($valnw->event_photos[0]->image)){ echo $this->Html->image("medium/".$valnw->event_photos[0]->image, ['alt' => 'event']); }?>
										<span class="ion-ios-search-strong"></span>
									</a>
									<div class="campaign-box">
                                                                           
                                                                            <a href="#" class="category"> <?php foreach($valnw->event_categories as $val){  ?><?php echo $val->category->category_name;?> , <?php } ?></a>
                                                                          
										<h3><a href="event_details.html"><?php echo $valnw->event_title;?></a></h3>
										<div class="campaign-description"><?php echo $valnw->event_description;?></div>
                                                                                <div class="campaign-author"><?php if(!empty($valnw->event_organizers)) { foreach($valnw->event_organizers as $new1){ ?><a class="author-icon" href="#"><?php echo $this->Html->image("medium/".$new1->users[0]->image, ['alt' => 'event']); ?></a>by <a class="author-name" href="#"><?php echo $new1->users[0]->fname.' '. $new1->users[0]->lname;?>, <?php }} ?></a></div>
								 <?php     $amount11=0;   if(!empty($valnw->event_orders)){ foreach($valnw->event_orders as $val_amount){
                                                                                                  if(!empty($val_amount->total_price)){
            
                                                                                                     $amount11=$amount11+$val_amount->product_price;
                                                                                 } }   }  ?>		<div class="process">
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
                                                    
<?php }}} ?></div></div>
<?php }  if($id==0){?> 
 <div  class="campaign-content grid"  style="height:auto !important;"> <div class="row" ><?php if(!empty($data_all_event)){ foreach($data_all_event as $valnw){ //pr($valnw);exit; 
?>
							<div class="col-lg-4 col-md-6 col-sm-6 col-6 filterinteresting filterpopular filterlatest">
								<div class="campaign-item">
									<a class="overlay" href="#">
										<?php if(!empty($valnw->event_photos[0]->image)){ echo $this->Html->image("medium/".$valnw->event_photos[0]->image, ['alt' => 'event']); }?>
										<span class="ion-ios-search-strong"></span>
									</a>
									<div class="campaign-box">
                                                                           
                                                                            <a href="#" class="category"> <?php foreach($valnw->event_categories as $val){  ?><?php echo $val->category->category_name;?> , <?php } ?></a>
                                                                          
										<h3><a href="event_details.html"><?php echo $valnw->event_title;?></a></h3>
										<div class="campaign-description"><?php echo $valnw->event_description;?></div>
                                                                                <div class="campaign-author"><?php if(!empty($valnw->event_organizers)) { foreach($valnw->event_organizers as $new1){ ?><a class="author-icon" href="#"><?php echo $this->Html->image("medium/".$new1->users[0]->image, ['alt' => 'event']); ?></a>by <a class="author-name" href="#"><?php echo $new1->users[0]->fname.' '. $new1->users[0]->lname;?>, <?php }} ?></a></div>
										 <?php     $amount11=0;   if(!empty($valnw->event_orders)){ foreach($valnw->event_orders as $val_amount){
                                                                                                  if(!empty($val_amount->total_price)){
            
                                                                                                     $amount11=$amount11+$val_amount->product_price;
                                                                                 } }   }  ?>
                                                                                
                                                                                <div class="process">
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
                                                    
<?php }} ?></div></div>
<?php }

 if($id==2){?> 
 <div  class="campaign-content grid"  style="height:auto !important;"> <div class="row" ><?php if(!empty($data_all_event)){ foreach($data_all_event as $valnw){ //pr($valnw);exit; 
?>
							<div class="col-lg-4 col-md-6 col-sm-6 col-6 filterinteresting filterpopular filterlatest">
								<div class="campaign-item">
									<a class="overlay" href="#">
										<?php if(!empty($valnw->event_photos[0]->image)){ echo $this->Html->image("medium/".$valnw->event_photos[0]->image, ['alt' => 'event']); }?>
										<span class="ion-ios-search-strong"></span>
									</a>
									<div class="campaign-box">
                                                                           
                                                                            <a href="#" class="category"> <?php foreach($valnw->event_categories as $val){  ?><?php echo $val->category->category_name;?> , <?php } ?></a>
                                                                          
										<h3><a href="event_details.html"><?php echo $valnw->event_title;?></a></h3>
										<div class="campaign-description"><?php echo $valnw->event_description;?></div>
                                                                                <div class="campaign-author"><?php if(!empty($valnw->event_organizers)) { foreach($valnw->event_organizers as $new1){ ?><a class="author-icon" href="#"><?php echo $this->Html->image("medium/".$new1->users[0]->image, ['alt' => 'event']); ?></a>by <a class="author-name" href="#"><?php echo $new1->users[0]->fname.' '. $new1->users[0]->lname;?>, <?php }} ?></a></div>
										 <?php     $amount11=0;   if(!empty($valnw->event_orders)){ foreach($valnw->event_orders as $val_amount){
                                                                                                  if(!empty($val_amount->total_price)){
            
                                                                                                     $amount11=$amount11+$val_amount->product_price;
                                                                                 } }   }  ?>
                                                                                
                                                                                <div class="process">
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
                                                    
<?php }} ?></div></div>
<?php }

if($id==3){?> 
 <div  class="campaign-content grid"  style="height:auto !important;"> <div class="row" ><?php if(!empty($data_all_event)){ foreach($data_all_event as $valnw){ //pr($valnw);exit; 
?>
							<div class="col-lg-4 col-md-6 col-sm-6 col-6 filterinteresting filterpopular filterlatest">
								<div class="campaign-item">
									<a class="overlay" href="#">
										<?php if(!empty($valnw->event_photos[0]->image)){ echo $this->Html->image("medium/".$valnw->event_photos[0]->image, ['alt' => 'event']); }?>
										<span class="ion-ios-search-strong"></span>
									</a>
									<div class="campaign-box">
                                                                           
                                                                            <a href="#" class="category"> <?php foreach($valnw->event_categories as $val){  ?><?php echo $val->category->category_name;?> , <?php } ?></a>
                                                                          
										<h3><a href="event_details.html"><?php echo $valnw->event_title;?></a></h3>
										<div class="campaign-description"><?php echo $valnw->event_description;?></div>
                                                                                <div class="campaign-author"><?php if(!empty($valnw->event_organizers)) { foreach($valnw->event_organizers as $new1){ ?><a class="author-icon" href="#"><?php echo $this->Html->image("medium/".$new1->users[0]->image, ['alt' => 'event']); ?></a>by <a class="author-name" href="#"><?php echo $new1->users[0]->fname.' '. $new1->users[0]->lname;?>, <?php }} ?></a></div>
										 <?php     $amount11=0;   if(!empty($valnw->event_orders)){ foreach($valnw->event_orders as $val_amount){
                                                                                                  if(!empty($val_amount->total_price)){
            
                                                                                                     $amount11=$amount11+$val_amount->product_price;
                                                                                 } }   }  ?>
                                                                                
                                                                                <div class="process">
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
                                                    
<?php }} ?></div></div>
<?php }?>

                        <?php exit;?>