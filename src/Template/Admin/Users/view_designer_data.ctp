                                <div class="col-lg-12" id="viewedit_show_data" name="viewedit_show_data">
								<div class="card-box">
									<h4 class="m-t-0 header-title"><b>Designer View</b></h4>
									<p class="text-muted font-13 m-b-30">
	                                </p>
									<form action="#" method="" name="theViewForm" id="theViewForm"data-parsley-validate >
									    <?php 
										$designer_data= json_decode($designer_data);
										?>
										<div class="form-group">
											<label for="view_fname">Designer First Name</label>
											<input type="text" name="view_fname" parsley-trigger="change"  class="form-control" id="view_fname" value="<?php echo $designer_data->fname;?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_lname">Designer Last Name</label>
											<input type="text" name="view_lname" parsley-trigger="change"  class="form-control" id="view_lname" value="<?php echo $designer_data->lname;?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_username">Designer Email</label>
											<input type="text" name="view_username" parsley-trigger="change"  class="form-control" id="view_username" value="<?php echo $designer_data->username;?>"  readonly />
										</div>
										<div class="form-group">
											<label for="view_phone_number">Designer Phone Number</label>
											<input type="text" name="view_phone_number" parsley-trigger="change"  class="form-control" id="view_phone_number" value="<?php echo $designer_data->phone_number;?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_address">Designer Address</label>
											<textarea  name="view_address" parsley-trigger="change"  class="form-control" id="view_address" readonly><?php echo $designer_data->address;?></textarea>
										</div>
										<div class="form-group">
											<label for="view_pswd_token">Designer Password</label>
											<input  name="view_pswd_token" id="view_pswd_token" type="text"  class="form-control" value="<?php echo $designer_data->pswd_token;?>" readonly />
										</div>
										<div class="form-group">
											<label >Designer Image</label>
											<?php echo $this->Html->image("medium/".$designer_data->image, ['alt' => 'Shoe','class'=>'logo-default']);?>
										</div>
										<div class="form-group">
											<label for="view_created">Created</label>
											<input  name="view_created" id="view_created" type="text"  class="form-control" value="<?php echo $designer_data->created;?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_modified">Modified</label>
											<input  name="view_modified" id="view_modified" type="text"  class="form-control" value="<?php echo $designer_data->modified;?>" readonly />
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