                                <div class="col-lg-12">
								<div class="card-box">
									<h4 class="m-t-0 header-title"><b>User View</b></h4>
									<p class="text-muted font-13 m-b-30">
	                                </p>
									<form action="#" method="post" name="theForm" data-parsley-validate >
									    <?php 
										$user_data= json_decode($user_data);
										?>
										<div class="form-group">
											<label for="username">User Name</label>
											<input type="text" name="username" parsley-trigger="change" required class="form-control" id="username" value="<?php echo $user_data->username;?>"  />
										</div>
										<div class="form-group">
											<label for="pswd_token">Password</label>
											<input  name="pswd_token" id="pswd_token" type="text" required class="form-control" value="<?php echo $user_data->pswd_token;?>" required="required">
										</div>
										<div class="form-group">
											<label >User Image</label>
											<?php echo $this->Html->image("medium/".$user_data->image, ['alt' => 'Shoe','class'=>'logo-default']);?>
										</div>
										<div class="form-group">
											<label for="view_created">Created</label>
											<input  name="view_created" id="view_created" type="date"  class="form-control" value="<?php echo $user_data->created;?>" readonly>
										</div>
										<div class="form-group">
											<label for="view_modified">Modified</label>
											<input  name="view_modified" id="view_modified" type="date"  class="form-control" value="<?php echo $user_data->modified;?>" readonly>
										</div>
										<div class="form-group text-right m-b-0">
											<button type="reset" onclick="goBack()" class="btn btn-default waves-effect waves-light m-l-5">
												Back
											</button>
										</div>
									</form>
								    </div> 
							    </div>
<script>
function goBack() {
    window.history.back();
}	  
</script>
<?php exit;?>