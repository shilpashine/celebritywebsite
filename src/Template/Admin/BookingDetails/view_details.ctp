
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                  
                    
                      
                        <div class="row">
                             
                            <div class="col-md-12">
                                <?php 
												if(isset($data_all)){
												$celebrity_datas=json_decode($data_all);
                                                                                                $qty=0;$total=0;
                                                                                                foreach($celebrity_datas->event_orders as $celebrity_datas11){
                                                                                                    if($celebrity_datas11->status==1){
												//pr($celebrity_datas11);exit;
                                                                                                    if(!empty($celebrity_datas11)){
                                                                                                         if(!empty($celebrity_datas11->event_ticket_code_details)){
                                                                                                             
                                                                                                           
                                                                                                             $qty=$qty+$celebrity_datas11->total_ticket_qty;
                                                                                                            $total=$total+($celebrity_datas11->product_price);
                                                                                                             
                                                                                                         }
                                                                                                         }
                                                                                                    }
                                                                                                         }
												//foreach($celebrity_datas as $celebrity_val){
												//pr($celebrity_datas);exit
												?>
                                               
                                <b>         Event Name:  </b> <?php echo $celebrity_datas->event_title;?> <br/>
                                           <b>        Event Description:    </b>     <?php echo $celebrity_datas->event_description;?> <br/>
                                           <b>          Event Location:  </b>    <?php echo $celebrity_datas->event_location; ?><br/>
                                           <b> Ticket QTY:  </b>    <?php echo $qty; ?>
                                              <b> Ticket Price:  </b>    <?php echo $total; ?>
                                
                                                                                                <?php }//} ?>
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet box green">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-globe"></i>Booking Listing </div>
                                        <div class="tools"> </div>
                                    </div>
                                   
                                    <div class="portlet-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                         <form  method="post" name="">
                                             
                                                  <div class="col-md-5">
                                            <label>Order Date1 :</label>
                                            <input class="form-control form-control-inline input-medium date-picker" size="16"  name="date1" type="text" value="" />
                                            <br/>
                                                  </div>
                                                  <div class="col-md-12">
                                            <label>Order Date2 :</label>
                                              <input class="form-control form-control-inline input-medium date-picker" size="16" name="date2" type="text" value="" />
                                                  </div>
                                                  <div class="col-md-2"><input type="submit" name="submit" value="Search" class="btn btn-primary"/>
                                             </div>  
                                         </form> </div></div>
                                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_4">
                                            <thead>
                                                <tr>
                                                   <th class="desktop">Ticket Name</th>
                                                   <th class="desktop">Ticket Description</th>
                                                    <th class="desktop">Qty</th>
                                                   
                                                    <th class="none">User Name</th>
                                                      <th class="desktop">User Email</th>
                                                     <th class="desktop">Total Amount</th>
                                                      <th class="desktop">Total Amount(With Tax)</th>
                                                    <th class="desktop">Booking Date</th>
                                                    <th class="desktop">Action</th>
                                                   
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
												<?php 
												if(isset($data_all)){
												$celebrity_datas11=json_decode($data_all);
                                                                                            //    pr($celebrity_datas11);exit;
												foreach($celebrity_datas11->event_orders as $celebrity_val_new){
												// pr($celebrity_val_new);exit;
                                                                                                    if(!empty($celebrity_val_new)){
                                                                                                         if(!empty($celebrity_val_new->event_ticket_code_details[0]->event_ticket_detail)){
                                                                                                     //      pr($celebrity_val_new);exit;
                                                                                                             
												?>
                                                <tr>
                                                    <td><?php echo $celebrity_val_new->event_ticket_code_details[0]->event_ticket_detail->ticket_name;?> </td>
                                                 <td><?php echo $celebrity_val_new->event_ticket_code_details[0]->event_ticket_detail->ticket_desc;?> </td>
                                                 
                                                    <td><?php echo $celebrity_val_new->total_ticket_qty;?></td>
                                                   
                                                    <td><?php echo  $celebrity_val_new->user->fname;?></td>
                                                    <td><?php echo  $celebrity_val_new->user->email;?></td>
                                                   <td><?php echo  $celebrity_val_new->product_price;?></td>
                                                   <td><?php echo  $celebrity_val_new->total_price;?></td>
                                                 <td><?php $date=explode('T',$celebrity_val_new->created); echo $date[0]; ?></td>
                                               <td>
                                                       <a title="View"  href="<?php echo $this->Url->build('/admin/booking-details/booking_details/'.$celebrity_val_new->id, true); ?> ">
                                                            <i class="fa fa-edit"></i> View Details </a><br/>
                                                            
                                                              <?php if($celebrity_val_new->status=='1'){ ?>
                                                        <a href="<?php echo $this->Url->build('/admin/booking-details/change_status/'.$celebrity_val_new->id, true); ?>">
                                                            <i class="fa fa-check" style="color:green"></i> Status </a>
                                                            
                                                     <?php }else{  ?>
                                                         
                                                          <a href="<?php echo $this->Url->build('/admin/booking-details/change_status/'.$celebrity_val_new->id, true); ?> ">
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


