                    <div class="container">
        						<!-- Page-Title -->
        						<div class="row">
        							<div class="col-sm-12">
                                        <div class="btn-group pull-right m-t-15">
                                            <button type="button" class="btn btn-white dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i class="fa fa-cog"></i></span></button>
                                            <ul class="dropdown-menu drop-menu-right dropdown-menu-animate" role="menu">
                                                <li><a href="#">Action</a></li>
                                                <li><a href="#">Another action</a></li>
                                                <li><a href="#">Something else here</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Separated link</a></li>
                                            </ul>
                                        </div>
        								<h4 class="page-title">Datatable</h4>
        								<ol class="breadcrumb">
        									<li>
        										<a href="#">Ubold</a>
        									</li>
        									<li>
        										<a href="#">Tables</a>
        									</li>
        									<li class="active">
        										Datatable
        									</li>
        								</ol>
        							</div>
        						</div>
						<div class="row">
							<div class="col-lg-6" id="show_data" name="show_data">
								<div class="card-box">
									<h4 class="m-t-0 header-title"><b>Message Add</b></h4>
									<p class="text-muted font-13 m-b-30">
	                                </p>
									<form action="add_data" method="post" name="theAddForm" data-parsley-validate enctype="multipart/form-data" >
										<div class="form-group">
											<label for="subject">Message Subject</label>
											<input type="input" id="subject" name="subject" class="form-control" />
											<span id="error_subject" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="message">Message Content</label>
											<textarea id="message" name="message" class="form-control"></textarea>
											<span id="error_message" style="color:#C00;"></span>
										</div>
										<div class="form-group text-right m-b-0">
											<button class="btn btn-primary waves-effect waves-light" type="button" onclick="save_data()">
												Submit
											</button>
										</div>
									</form>
								</div> 
							</div>
						<!--</div>-->		
                        <!--<div class="row">-->
                            <div class="col-sm-6">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>Message List</b></h4>
                                    <p class="text-muted font-13 m-b-30">
                                        List Messages
                                    </p>
									<?php echo $this->Flash->render();?>
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Subject</th>
                                                <th>Message</th>
												<th>User Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										       <?php 
												$message_data= json_decode($message_data);
												if(!empty($message_data)){
												foreach($message_data as $message_data_val){
												?>
                                            <tr>
                                                <td><?php echo $message_data_val->subject;?></td>
                                                <td><?php echo strip_tags(substr($message_data_val->message,0,10))."...";?></td>
												<td><?php if($message_data_val->user_type==0){echo "Admin";}
												elseif($message_data_val->user_type==1){echo "Customer";}
												elseif($message_data_val->user_type==2){echo "Designer";}
												elseif($message_data_val->user_type==3){echo "Supplier";}
												elseif($message_data_val->user_type==3){echo "Supplier";}
												else{echo "Franchise";}?>
												</td>
                                                <td>
												<a title="View" onclick="view_data(<?php echo $message_data_val->id;?>)" href="#"><i class="fa fa-eye"></i></a>
												<a title="Delete" href="<?php echo $this->Url->build('/admin/messages/delete_data/', true).$message_data_val->id ; ?>"><i class="fa fa-trash-o"></i></a>
												<a title="Status" href="<?php echo $this->Url->build('/admin/messages/change_status/', true).$message_data_val->id; ?>"> <?php if($message_data_val->status==1){echo $this->Html->image("/img/test-pass-icon.png"); } else{ echo $this->Html->image("/img/warning.png");}?></a>
												</td>
                                            </tr>
												<?php }}?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
function save_data(){
		var subject=$('#subject').val();
		var message=$('#message').val();
		if(subject=='' || subject==null){
			$("#error_subject").html("Please Enter A Message Subject");
			$("#subject").focus();
		}
		else if(message=='' || message==null){
			$("#error_subject").hide();
			$("#error_message").html("Please Enter Message");
			$("#message").focus();
		}
		else{
			  $("#error_message").hide();	
			  document.getElementById("theAddForm").submit();
		  }
	  }	
function view_data(message_id){
		 $.ajax({
				type: "POST",
				evalScripts: true,
				url: '<?php echo $this->Url->build('/admin/messages/ajax_edit_data', true);  ?>',
				data: ({id:message_id}),
				success: function (data){
					//alert(data);exit;
				$('#show_data').html(data);
				}
		    });
	}
</script>
  