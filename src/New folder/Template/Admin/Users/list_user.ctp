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
									<h4 class="m-t-0 header-title"><b>User Add</b></h4>
									<p class="text-muted font-13 m-b-30">
	                                </p>
									<form action="#" method="post" name="theForm" data-parsley-validate >
									          <?php 
												//$user_data= json_decode($user_data);
												//pr($user_data);
												?>
										<div class="form-group">
											<label for="username">User Name</label>
											<input type="text" name="username" parsley-trigger="change" required class="form-control" id="username" value=""  />
										</div>
										<div class="form-group">
											<label for="pswd_token">Password</label>
											<input  name="pswd_token" id="pswd_token" type="text" required class="form-control" value="" />
										</div>
										<div class="form-group">
											<label for="image">User Image</label>
											<input  name="image" id="image" type="file"  class="form-control" value="" />
										</div>
										<div class="form-group">
											<label for="created">Created</label>
											<input  name="created" id="created" type="date" required class="form-control" value="" />
										</div>
										<div class="form-group">
											<label for="modified">Password*</label>
											<input  name="modified" id="modified" type="date" required class="form-control" value="" />
										</div>
									</form>
								</div> 
							</div>
						<!--</div>-->		
                        <!--<div class="row">-->
                            <div class="col-sm-6">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>User List</b></h4>
                                    <p class="text-muted font-13 m-b-30">
                                    </p>
									<?php echo $this->Flash->render();?>
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>User Name</th>
                                                <th>Email</th>
                                                <th>Created</th>
                                                <th>Modified</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										       <?php 
												$user_data= json_decode($user_data);
												if(!empty($user_data)){
												foreach($user_data as $user_data_val){
												?>
                                            <tr>
                                                <td><?php echo $user_data_val->username;?></td>
                                                <td><?php echo $user_data_val->email;?></td>
                                                <td><?php echo $user_data_val->created;?></td>
                                                <td><?php echo $user_data_val->modified;?></td>
                                                <td>
												<a title="View" onclick="view_data(<?php echo $user_data_val->id;?>)" href="#"><i class="fa fa-eye"></i></a>
												<a title="Delete" href="<?php echo $this->Url->build('/admin/users/delete_data/', true).$user_data_val->id ; ?>"><i class="fa fa-trash-o"></i></a>
												<a title="Status" href="<?php echo $this->Url->build('/admin/users/change_status/', true).$user_data_val->id; ?>"> <?php if($user_data_val->status==1){echo $this->Html->image("/img/test-pass-icon.png"); } else{ echo $this->Html->image("/img/warning.png");}?></a>
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
function view_data(user_id){
		 $.ajax({
        type: "POST",
        evalScripts: true,
        url: '<?php echo $this->Url->build('/admin/users/view_data', true);  ?>',
        data: ({id:user_id}),
        success: function (data){
		$('#show_data').html(data);
		}
		});
	  }	
</script>
