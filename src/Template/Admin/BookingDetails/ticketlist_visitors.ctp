
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                  
                    
                      
                        <div class="row">
                             
                            <div class="col-md-12">
                              
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet box green">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-globe"></i>Visitor Ticket Listing </div>
                                        <div class="tools"> </div>
                                    </div>
                                   
                                    <div class="portlet-body">
                                       
                                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_4">
                                            <thead>
                                                <tr>
                                                    <th class="desktop">User Name</th>
                                                    <th class="desktop">User Email</th>
                                                 <th class="desktop">Event Name</th>
                                                  <th class="desktop">Event Date</th>
                                                   <th class="desktop">Ticket Name</th>
                                                   <th class="none">Ticket Description</th>
                                                    <th class="desktop">Qty</th>
                                                   
                                                    
                                                        
                                                     <th class="desktop">Total Amount</th>
                                                      <th class="none">Total Amount(With Tax)</th>
                                                    <th class="none">Booking Date</th>
                                                    <th class="desktop">Action</th>
                                                   
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
												<?php 
												if(isset($data_all)){
												$celebrity_datas11=json_decode($data_all);
                                                                                              // pr($celebrity_datas11);exit;
												foreach($celebrity_datas11 as $celebrity_val_new){
												// pr($celebrity_val_new);exit;
                                                                                                    if(!empty($celebrity_val_new)){
                                                                                                         if(!empty($celebrity_val_new->event_ticket_code_details[0]->event_ticket_detail)){
                                                                                                     //      pr($celebrity_val_new);exit;
                                                                                                           $date1=explode('T',$celebrity_val_new->event_date); 
												?>
                                                <tr>
                                                    <td><?php echo  $celebrity_val_new->user->fname;?></td>
                                                    <td><?php echo  $celebrity_val_new->user->email;?></td>
                                                     <td><?php echo  $celebrity_val_new->event_name;?></td>
                                                    <td><?php echo  $date1[0];?></td>
                                                    <td><?php echo $celebrity_val_new->event_ticket_code_details[0]->event_ticket_detail->ticket_name;?> </td>
                                                 <td><?php echo $celebrity_val_new->event_ticket_code_details[0]->event_ticket_detail->ticket_desc;?> </td>
                                                 
                                                    <td><?php echo $celebrity_val_new->total_ticket_qty;?></td>
                                                   
                                                    
                                                   <td><?php echo  $celebrity_val_new->product_price;?></td>
                                                   <td><?php echo  $celebrity_val_new->total_price;?></td>
                                                 <td><?php $date=explode('T',$celebrity_val_new->created); echo $date[0]; ?></td>
                                               <td>
                                                       <a title="View"  href="<?php echo $this->Url->build('/admin/booking-details/booking_details/'.$celebrity_val_new->id, true); ?> ">
                                                            <i class="fa fa-edit"></i> View Details </a><br/>
                                                            
                                                              <?php if($celebrity_val_new->status=='1'){ ?>
                                                        <a href="<?php echo $this->Url->build('/admin/booking-details/change_statususer/'.$celebrity_val_new->id, true); ?>">
                                                            <i class="fa fa-check" style="color:green"></i> Status </a>
                                                            
                                                     <?php }else{  ?>
                                                         
                                                          <a href="<?php echo $this->Url->build('/admin/booking-details/change_statususer/'.$celebrity_val_new->id, true); ?> ">
                                                            <i class="fa fa-ban"  style="color:red"></i> Status </a>
                                                         
                                                         
                                                   <?php  } ?><br/>
                                                              <a title="View"  href="# ">
                                                            <i class="fa fa-trash"></i> Return </a>
                                                            <br/>
                                               <a title="View"  href="<?php echo $this->Url->build('/admin/booking-details/thankyou/'.$celebrity_val_new->id, true); ?> ">
                                                            <i class="fa fa-eye"></i> Generate Invoice </a>
                                                            <br/>
                                               </td>
                                                </tr>
                                                                                                <?php }}} }?>
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


