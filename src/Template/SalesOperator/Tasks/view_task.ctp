										<?php 
												
												if(isset($task_view_data)){
												$task_view_data=json_decode($task_view_data);
												}
												?>
										<form action="" method="post" name="theViewForm" >
										<div class="form-group">
											<label for="view_company_name">Company Name</label>
											<input type="text" name="view_company_name" parsley-trigger="reminder"  class="form-control" id="view_company_name" value="<?php echo strtoupper($task_view_data->company_name);?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_fname">First Name</label>
											<input type="text" name="view_fname" parsley-trigger="reminder"  class="form-control" id="view_fname" value="<?php echo strtoupper($task_view_data->fname);?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_mname">Middle Name</label>
											<textarea  name="view_mname" parsley-trigger="reminder"  class="form-control" id="view_mname" readonly ><?php echo strtoupper($task_view_data->mname);?></textarea>
										</div>
										<div class="form-group">
											<label for="view_lname">Last Name</label>
											<input type="text" name="view_lname" parsley-trigger="reminder"  class="form-control" id="view_lname" value="<?php echo strtoupper($task_view_data->lname);?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_work_name">Work Name</label>
											<input type="text" name="view_work_name" parsley-trigger="reminder"  class="form-control" id="view_work_name" value="<?php echo strtoupper($task_view_data->work_name);?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_phone"> Phone No.</label>
											<input type="text" name="view_phone" parsley-trigger="reminder"  class="form-control" id="view_phone" value="<?php echo strtoupper($task_view_data->phone);?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_email_id">Email </label>
											<input type="email" name="view_email_id" parsley-trigger="reminder"  class="form-control" id="view_email_id" value="<?php echo $task_view_data->email_id;?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_created">Created</label>
											<input type="text" name="view_created" parsley-trigger="reminder"  class="form-control" id="view_created" value="<?php echo(date("d/m/Y", strtotime($task_view_data->created)));?>"  readonly />
										</div>
										<div class="form-group">
											<label for="view_modified">Modified</label>
											<input type="text" name="view_modified" parsley-trigger="reminder"  class="form-control" id="view_modified" value="<?php echo(date("d/m/Y", strtotime($task_view_data->modified)));?>" readonly />
										</div>
									</form>
<?php exit();?>