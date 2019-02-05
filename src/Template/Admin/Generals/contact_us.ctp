
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                  
                     <div class="portlet light form-fit">
                                    
                                       
                                       
                                  
                                </div>
                      
                        <div class="row">
                                <div class="col-md-6" id="show_data">
                                    <!-- BEGIN VALIDATION STATES-->
                                    <div class="portlet light portlet-fit portlet-form bordered">
                                        
                                        <div class="portlet-body">
                                              <?php echo $this->Flash->render('flash'); ?>
                                            <!-- BEGIN FORM-->
                                            <h4 style="text-align: center;">  Contact Us Details</h4>
                                             <form action="" id="form_sample_2" method="post" enctype="multipart/form-data"> 
                                                 <?php $user_data= json_decode($user_data); ?>
                                           <input type="hidden" name="edit_user_id" value="<?php echo $user_data->id;?>"/>                  
                                            <div class="form-body">
                                                <div class="form-group form-md-line-input">
                                                    <input type="text" class="form-control" name="address" required="" id="form_control_1"  value="<?php echo $user_data->address;?>">
                                                  
                                                    <label for="form_control_1">Address
                                                            <span class="required">*</span>
                                                        </label>
                                                </div>
                                                
                                               
                                                
                                                
                                                
                                            </div>
                                           
                                           <div class="form-body">
                                                <div class="form-group form-md-line-input">
                                                    <input type="text" class="form-control" name="phone" required="" id="form_control_1"  value="<?php echo $user_data->phone;?>">
                                                  
                                                    <label for="form_control_1">Phone No
                                                            <span class="required">*</span>
                                                        </label>
                                                </div>
                                                
                                               
                                                
                                                
                                                
                                            </div>
                                           
                                           <div class="form-body">
                                                <div class="form-group form-md-line-input">
                                                    <input type="text" class="form-control" name="alt_ph"  id="form_control_1"  value="<?php echo $user_data->alt_ph;?>">
                                                  
                                                    <label for="form_control_1">Alternate No
                                                            <span class="required">*</span>
                                                        </label>
                                                </div>
                                                
                                               
                                                
                                                
                                                
                                            </div>
                                           
                                           <div class="form-body">
                                                <div class="form-group form-md-line-input">
                                                    <input type="text" class="form-control" name="email" required="" id="form_control_1"  value="<?php echo $user_data->email;?>">
                                                  
                                                    <label for="form_control_1">Email Id
                                                            <span class="required">*</span>
                                                        </label>
                                                </div>
                                                
                                               
                                                
                                                
                                                
                                            </div>
                                           
                                           <div class="form-body">
                                                <div class="form-group form-md-line-input">
                                                    <input type="text" class="form-control" name="fb_link"  id="form_control_1"  value="<?php echo $user_data->fb_link;?>">
                                                  
                                                    <label for="form_control_1">Facebook Link
                                                            <span class="required">*</span>
                                                        </label>
                                                </div>
                                                
                                               
                                                
                                                
                                                
                                            </div>
                                           <div class="form-body">
                                                <div class="form-group form-md-line-input">
                                                    <input type="text" class="form-control" name="tw_link" id="form_control_1"  value="<?php echo $user_data->tw_link;?>">
                                                  
                                                    <label for="form_control_1">Twitter Link 
                                                            <span class="required">*</span>
                                                        </label>
                                                </div>
                                                
                                               
                                                
                                                
                                                
                                            </div>
                                           <div class="form-body">
                                                <div class="form-group form-md-line-input">
                                                    <input type="text" class="form-control" name="ins_link"  id="form_control_1"  value="<?php echo $user_data->ins_link;?>">
                                                  
                                                    <label for="form_control_1">Instagram LInk
                                                            <span class="required">*</span>
                                                        </label>
                                                </div>
                                                
                                               
                                                
                                                
                                                
                                            </div>
                                             <div class="form-body">
                                                <div class="form-group form-md-line-input">
                                                    <input type="text" class="form-control" name="gm_link"  id="form_control_1"  value="<?php echo $user_data->gm_link;?>">
                                                  
                                                    <label for="form_control_1">Gmail LInk
                                                            <span class="required">*</span>
                                                        </label>
                                                </div>
                                                
                                               
                                                
                                                
                                                
                                            </div>
                                             <div class="form-body">
                                                <div class="form-group form-md-line-input">
                                                    <input type="text" class="form-control" name="yu_link"  id="form_control_1"  value="<?php echo $user_data->yu_link;?>">
                                                  
                                                    <label for="form_control_1">Youtube LInk
                                                            <span class="required">*</span>
                                                        </label>
                                                </div>
                                                
                                               
                                                
                                                
                                                
                                            </div>
                                           
                                            <div class="form-actions">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <input type="submit" class="btn green" name="submit" value="Submit"/>
                                                           
                                                        </div>
                                                    </div>
                                                </div>
<!--                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="submit" class="btn green" name="submit" value="Submit"/>
                                                        <button type="reset" class="btn default" onclick="cancel_policy()">Reset</button>
                                                    </div>
                                                </div>
                                            </div>-->
                                        </form>
                                            <!-- END FORM-->
                                        </div>
                                    </div>
                                    <!-- END VALIDATION STATES-->
                                </div>
                         
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>


<!-- Modal -->

                <!-- END CONTENT -->
                <!-- BEGIN QUICK SIDEBAR -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

              