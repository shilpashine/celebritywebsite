
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                  
                     <div class="portlet light form-fit">
                                    
                                       
                                        <div class="actions">
                                            <div class="btn-group btn-group-devided" data-toggle="buttons">
                                               
                                                  <button type="button" class="btn green" onclick="cancel_policy()">ADD NEW</button>
                                                <?php echo $this->Flash->render('flash'); ?>
                                                
                                            </div>
                                        </div>
                                  
                                  
                                </div>
                      
                        <div class="row">
                           <div class="col-md-6" id="show_data">
                                <!-- BEGIN VALIDATION STATES-->
                                <div class="portlet light portlet-fit portlet-form bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class=" icon-layers font-green "></i>
                                            <span class="caption-subject font-green sbold uppercase">Add Event Organizer </span>
                                        </div>
                                       
                                    </div>
                                    <div class="portlet-body">
                                        <!-- BEGIN FORM-->
                                        <form action="#" id="form_sample_2" method="post" enctype="multipart/form-data">
                                            <div class="form-body">
                                                <div class="form-group form-md-line-input">
                                                    <input type="text" class="form-control" name="fname" id="form_control_1" placeholder="Enter your fname" value="">
                                                    <label for="form_control_1">First Name
                                                        <span class="required">*</span>
                                                    </label>
                                                    <span class="help-block">Enter your First Name...</span>
                                                </div>
                                                <div class="form-group form-md-line-input">
                                                    <input type="text" class="form-control" name="lname" id="form_control_1" placeholder="Enter your lname">
                                                    <label for="form_control_1">Last Name
                                                        <span class="required">*</span>
                                                    </label>
                                                    <span class="help-block">Enter your Last name...</span>
                                                </div>
                                                <div class="form-group form-md-line-input">
                                                    <input type="email" class="form-control" id="form_control_1" name="email" placeholder="Enter your email">
                                                    <label for="form_control_1">Email
                                                        <span class="required">*</span>
                                                    </label>
                                                    <span class="help-block">Please enter your email...</span>
                                                </div>
                                                
                                                  <div class="form-group form-md-line-input">
                                                    <input type="password" class="form-control" id="form_control_1" name="password" placeholder="Enter your password">
                                                    <label for="form_control_1">Password
                                                        <span class="required">*</span>
                                                    </label>
                                                    <span class="help-block">Please enter your password...</span>
                                                </div>
                                                
                                                <div class="form-group form-md-line-input">
                                                    <input type="number" class="form-control" id="form_control_1" name="phone_no" placeholder="Enter phone number">
                                                    <label for="form_control_1">Phone No</label>
                                                </div>
                                                <div class="form-group form-md-line-input">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                        <input type="text" class="form-control form-control-inline input-medium date-picker" name="dob" placeholder="Enter Dob">
                                                        <label for="form_control_1">Date OF Birth</label>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group form-md-line-input">
                                                    <div class="input-group">
                                                        <select name="gendar" class="form-control">
                                                            <option value="1">MALE</option>
                                                               <option value="2">FEMALE</option>
                                                        </select>
                                                        <br/>
                                                          <label for="form_control_1"> Gender</label>
                                                        
                                                    </div>
                                                </div>
                                                <div class="form-group form-md-line-input">
                                                    <textarea class="form-control" id="form_control_1" name="description"> </textarea>
                                                      <label for="form_control_1">Description</label>
                                                    
                                                </div>
                                                <div class="form-group form-md-line-input">
                                                    <textarea class="form-control" id="form_control_1" name="address"> </textarea>
                                                      <label for="form_control_1">Enter Address</label>
                                                    
                                                </div>
                                                  <div class="form-group form-md-line-input">
                                                      <input class="form-control" id="form_control_1" name="image" type="file">
                                                     <label for="form_control_1"> Photo</label>
                                                </div>
                                                
<!--                                                <div class="form-group form-md-line-input">
                                                    <div class="input-group">
                                                        <div class="input-group-control">
                                                            <input type="text" class="form-control" name="number2" placeholder="Placeholder">
                                                            <label for="form_control_1">Enter your number</label>
                                                        </div>
                                                        <span class="input-group-btn btn-right">
                                                            <button type="button" class="btn green-haze dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action
                                                                <i class="fa fa-angle-down"></i>
                                                            </button>
                                                            <ul class="dropdown-menu pull-right" role="menu">
                                                                <li>
                                                                    <a href="javascript:;">Action</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">Another action</a>
                                                                </li>
                                                                <li>
                                                                    <a href="javascript:;">Something else here</a>
                                                                </li>
                                                                <li class="divider"> </li>
                                                                <li>
                                                                    <a href="javascript:;">Separated link</a>
                                                                </li>
                                                            </ul>
                                                        </span>
                                                    </div>
                                                </div>-->
<!--                                                <div class="form-group form-md-line-input">
                                                    <select class="form-control" name="delivery">
                                                        <option value="">Select</option>
                                                        <option value="1">Option 1</option>
                                                        <option value="2">Option 2</option>
                                                        <option value="3">Option 3</option>
                                                    </select>
                                                    <label for="form_control_1">Warning State</label>
                                                    <span class="help-block">Some help goes here...</span>
                                                </div>
                                                <div class="form-group form-md-line-input">
                                                    <textarea class="form-control" name="memo" rows="3"></textarea>
                                                    <label for="form_control_1">Memo</label>
                                                    <span class="help-block">Some help goes here...</span>
                                                </div>
                                                <div class="form-group form-md-checkboxes">
                                                    <label for="form_control_1">Checkboxes</label>
                                                    <div class="md-checkbox-list">
                                                        <div class="md-checkbox">
                                                            <input type="checkbox" id="checkbox2_1" name="checkboxes1[]" value="1" class="md-check">
                                                            <label for="checkbox2_1">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> Option 1 </label>
                                                        </div>
                                                        <div class="md-checkbox">
                                                            <input type="checkbox" id="checkbox2_2" name="checkboxes1[]" value="1" class="md-check">
                                                            <label for="checkbox2_2">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> Option 2 </label>
                                                        </div>
                                                        <div class="md-checkbox">
                                                            <input type="checkbox" id="checkbox2_3" name="checkboxes1[]" value="1" class="md-check">
                                                            <label for="checkbox2_3">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> Option 3 </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group form-md-checkboxes">
                                                    <label for="form_control_1">Checkboxes</label>
                                                    <div class="md-checkbox-inline">
                                                        <div class="md-checkbox">
                                                            <input type="checkbox" id="checkbox2_4" name="checkboxes2[]" value="1" class="md-check">
                                                            <label for="checkbox2_4">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> Option 1 </label>
                                                        </div>
                                                        <div class="md-checkbox">
                                                            <input type="checkbox" id="checkbox2_5" name="checkboxes2[]" value="1" class="md-check">
                                                            <label for="checkbox2_5">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> Option 2 </label>
                                                        </div>
                                                        <div class="md-checkbox">
                                                            <input type="checkbox" id="checkbox2_6" name="checkboxes2[]" value="1" class="md-check">
                                                            <label for="checkbox2_6">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> Option 3 </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group form-md-radios">
                                                    <label for="form_control_1">Radios</label>
                                                    <div class="md-radio-list">
                                                        <div class="md-radio">
                                                            <input type="radio" id="checkbox112_6" name="radio1" value="1" class="md-radiobtn">
                                                            <label for="checkbox112_6">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> Option 1 </label>
                                                        </div>
                                                        <div class="md-radio">
                                                            <input type="radio" id="checkbox112_7" name="radio1" value="2" class="md-radiobtn">
                                                            <label for="checkbox112_7">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> Option 2 </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group form-md-radios">
                                                    <label for="form_control_1">Radios</label>
                                                    <div class="md-radio-inline">
                                                        <div class="md-radio">
                                                            <input type="radio" id="checkbox2_8" name="radio2" value="121" class="md-radiobtn">
                                                            <label for="checkbox2_8">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> Option 1 </label>
                                                        </div>
                                                        <div class="md-radio">
                                                            <input type="radio" id="checkbox2_9" name="radio2" value="112" class="md-radiobtn">
                                                            <label for="checkbox2_9">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> Option 2 </label>
                                                        </div>
                                                        <div class="md-radio">
                                                            <input type="radio" id="checkbox2_10" name="radio2" value="112" class="md-radiobtn">
                                                            <label for="checkbox2_10">
                                                                <span></span>
                                                                <span class="check"></span>
                                                                <span class="box"></span> Option 3 </label>
                                                        </div>
                                                    </div>
                                                </div>-->
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="submit" class="btn green" name="submit" value="Submit"/>
                                                        <button type="reset" class="btn default" onclick="cancel_policy()">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!-- END FORM-->
                                    </div>
                                </div>
                                <!-- END VALIDATION STATES-->
                            </div>
                            <div class="col-md-6">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet box green">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-globe"></i>Event Organizer Listing </div>
                                        <div class="tools"> </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_4">
                                            <thead>
                                                <tr>
                                                    <th class="all">First name</th>
                                                    <th class="min-phone-l">Last name</th>
                                                    <th class="min-tablet">Gendar</th>
                                                    <th class="desktop">Dob</th>
                                                    <th class="none">Phone No</th>
                                                    <th class="none">Description</th>
                                                     <th class="none">Email</th>
                                                   
                                                    <th class="none">Address</th>
                                                  
                                                     <th class="desktop">Action</th>
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
												<?php 
												if(isset($celebrity_datas)){
												$celebrity_datas=json_decode($celebrity_datas);
												foreach($celebrity_datas as $celebrity_val){
													//pr($policy_val);exit;
												$dob=explode('T',$celebrity_val->dob);
												?>
                                                <tr>
                                                    <td><?php echo $celebrity_val->fname;?> </td>
                                                    <td><?php echo $celebrity_val->lname;?></td>
                                                    <td><?php if($celebrity_val->gender=='1'){ echo 'Male'; ?> <?php }else{  echo 'Female';?>  <?php }?></td>
                                                    <td><?php echo $dob[0];?></td>
                                                    <td><?php echo $celebrity_val->phone_number;?></td>
                                                    <td><?php echo $celebrity_val->description;?></td>
                                                    <td><?php echo $celebrity_val->email;?></td>
                                                   <td><?php echo $celebrity_val->address;?></td> 
                                                
                                               <td>
                                                       
                                                            <a title="View" onclick="edit_data(<?php echo $celebrity_val->id;?>)" href="#"><i class="fa fa-eye">Edit</i></a>
                                                          
                                                   <br/>
                                                        <a href="javascript:;">
                                                           <a href="delete_data/<?php echo $celebrity_val->id;?> ">  <i class="fa fa-trash"></i> Delete </a>
                                                     <br/>
                                                     <?php if($celebrity_val->status=='1'){ ?>
                                                        <a href="change_status/<?php echo $celebrity_val->id;?> ">
                                                            <i class="fa fa-check" style="color:green"></i> Status </a>
                                                            
                                                            
                                                     <?php }else{  ?>
                                                         
                                                          <a href="change_status/<?php echo $celebrity_val->id;?> ">
                                                            <i class="fa fa-ban"  style="color:red"></i> Status </a>
                                                         
                                                         
                                                   <?php  } ?>
                                                  
                                                 </td>
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
                <!-- END CONTENT -->
                <!-- BEGIN QUICK SIDEBAR -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

                <script type="text/javascript">
                    function edit_data(user_id){
                   // alert(user_id);
                    $.ajax({
				type: "POST",
				evalScripts: true,
				url: '<?php echo $this->Url->build('/admin/users/ajax_customer_edit_data', true);  ?>',
				data: ({id:user_id}),
				success: function (data){
                                   //  alert(data);
				$('#show_data').html(data);
				}
		    });
                    
                    
		
	  }	
         $(document).ready(function(){
    $('.date-picker').datepicker({
              endDate: '+0d',
    format: 'yyyy-mm-dd'
    
});
  } );
         function cancel_policy(){
		window.location.reload();	
			}           
                    </script>