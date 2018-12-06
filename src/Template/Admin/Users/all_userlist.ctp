
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                  
                     <div class="portlet light form-fit">
                                    
                                       
                                        <div class="actions">
                                            <div class="btn-group btn-group-devided" data-toggle="buttons">
                                               
                                                <label>Change User Type :</label>
                                                <select name="change_status" id="change_status" onchange="user_change()">
                                                    
                                                    <option value="1">Active User</option>
                                                    <option value="0">InActive User</option>
                                                </select>
                                                <?php echo $this->Flash->render('flash'); ?>
                                                
                                            </div>
                                        </div>
                                  
                                  
                                </div>
                      
                        <div class="row">
                         
                            <div class="col-md-12" id="show_data">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet box green">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-globe"></i>User Listing </div>
                                        <div class="tools"> </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_4">
                                            <thead>
                                                <tr>
                                                    <th class="all">First name</th>
                                                    <th class="min-phone-l">Last name</th>
                                                    <th class="min-tablet">Gendar</th>
                                                     <th class="min-tablet">User type</th>
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
                                                    <td><?php if($celebrity_val->user_type==1){ echo 'Visitors' ; }elseif($celebrity_val->user_type==4){ echo 'Org Manager' ; };?></td>
                                                    <td><?php echo $dob[0];?></td>

                                                    <td><?php echo $celebrity_val->phone_number;?></td>
                                                    <td><?php echo $celebrity_val->description;?></td>
                                                    <td><?php echo $celebrity_val->email;?></td>
                                                   <td><?php echo $celebrity_val->address;?></td> 
                                                
                                               <td>
                                                       
                                                         
                                                     <?php if($celebrity_val->status=='1'){ ?>
                                                        <a href="change_status_all/<?php echo $celebrity_val->id;?> ">
                                                            <i class="fa fa-check" style="color:green"></i> Status </a>
                                                            
                                                            
                                                     <?php }else{  ?>
                                                         
                                                          <a href="change_status_all/<?php echo $celebrity_val->id;?> ">
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
                    
       
        
                        
   function user_change(){
  var curr_status= $("#change_status").val();
   
    $.ajax({
				type: "POST",
				evalScripts: true,
				url: '<?php echo $this->Url->build('/admin/users/ajax_status_change', true);  ?>',
				data: ({curr_status:curr_status}),
				success: function (data){
                                   //  alert(data);
				$('#show_data').html(data);
				}
		    });
                    
                    
    }
                    </script>