
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                  
                    
                      
                        <div class="row">
                             
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet box green">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-globe"></i>Event Booking Listing </div>
                                        <div class="tools"> </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_4">
                                            <thead>
                                                <tr>
                                                    <th class="all"> Event Title</th>
                                                    <th class="none">Description</th>
                                                    <th class="min-tablet">Location</th>
                                                    <th class="desktop">Event Target Amount</th>
                                                     <th class="desktop">Event Total Amount</th>
                                                    <th class="min-phone-l"> Date</th>
                                                    
                                                     <th class="desktop">Total Ticket Amount</th>
                                                    
                                                    <th class="desktop">Action</th>
                                                   
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
												<?php 
												if(isset($data_all)){
                                                                                                
												$celebrity_datas=json_decode($data_all);
                                                                                              
												foreach($celebrity_datas as $celebrity_val){
											//	pr($celebrity_val);exit;
                                                                                                        $total=0;
                                                                                                    if(!empty($celebrity_val->event_orders)){
                                                                                                foreach($celebrity_val->event_orders as $val){
                                                                                                    if(!empty($val->total_price)){
                                                                                                        
                                                                                                   
                                                                                            //   pr($val->total_price);
                                                                                                    $total=$total+$val->product_price;
                                                                                                    } }}
												?>
                                                <tr>
                                                    <td><?php echo $celebrity_val->event_title;?> </td>
                                                    <td><?php echo $celebrity_val->event_description;?></td>
                                                    <td><?php echo $celebrity_val->event_location;?></td>
                                                    <td><?php echo $celebrity_val->target_amount;?></td>
                                                        <td><?php echo $celebrity_val->event_amount;?></td>
                                                    <td><?php $date=explode('T',$celebrity_val->approx_start_date); $date1=explode('T',$celebrity_val->approx_end_date); echo $date[0].' to '.$date1[0];?></td>
                                                   <td><?php  echo  $total;?></td>
                                                
                                               <td>
                                                       <a title="View"  href=" <?php echo $this->Url->build('/admin/booking-details/view_details/'.$celebrity_val->id, true); ?> ">
                                                            <i class="fa fa-edit"></i> View Details </a>
                                                            <br/></td>
                                                </tr>
                                                                                                <?php }} ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>


