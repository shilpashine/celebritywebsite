
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
                                             <form action="" id="form_sample_2" method="post" enctype="multipart/form-data"> 
                                                 <?php $user_data= json_decode($user_data); ?>
                                           <input type="hidden" name="edit_user_id" value="<?php echo $user_data->id;?>"/>                  
                                            <div class="form-body">
                                                <div class="form-group form-md-line-input">
                                                    <input type="text" class="form-control" name="tax" required="" id="form_control_1" placeholder="Enter your Tax" value="<?php echo $user_data->tax_amout;?>">
                                                    <label for="form_control_1"> Tax(percentage)
                                                        <span class="required">*</span>
                                                    </label>
                                                    <span class="help-block">Enter Tax...</span>
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

              