										<?php 
												
												//pr($lead_remark_data);
												if(isset($task_fetch_data)){
												$task_fetch_data=json_decode($task_fetch_data);
												}
												?>
										<form action="editTask" method="post" name="theEditForm" >
		                               <input type="hidden" id="edit_task_id" name="edit_task_id" value="<?php echo $task_fetch_data->id;?>"/>
										<div class="form-group">
											<label for="edit_company_name">Company Name</label>
											<input type="text" name="edit_company_name" parsley-trigger="reminder"  class="form-control" id="edit_company_name" value="<?php echo strtoupper($task_fetch_data->company_name);?>" required="required"/>
										</div>
										<div class="form-group">
											<label for="edit_fname">First Name</label>
											<input type="text" name="edit_fname" parsley-trigger="reminder"  class="form-control" id="edit_fname" value="<?php echo strtoupper($task_fetch_data->fname);?>" required="required"/>
										</div>
										<div class="form-group">
											<label for="edit_mname">Middle Name</label>
											<textarea  name="edit_mname" parsley-trigger="reminder"  class="form-control" id="edit_mname" required="required"><?php echo strtoupper($task_fetch_data->mname);?></textarea>
										</div>
										<div class="form-group">
											<label for="edit_lname">Sur Name</label>
											<input type="text" name="edit_lname" parsley-trigger="reminder"  class="form-control" id="edit_lname" value="<?php echo strtoupper($task_fetch_data->lname);?>" required="required"/>
										</div>
										<div class="form-group">
											<label for="edit_work_name">Work Name</label>
											<input type="text" name="edit_work_name" parsley-trigger="reminder"  class="form-control" id="edit_work_name" value="<?php echo strtoupper($task_fetch_data->work_name);?>" required="required"/>
										</div>
										<div class="form-group">
											<label for="edit_phone"> Phone No.</label>
											<input type="text" name="edit_phone" parsley-trigger="reminder"  class="form-control" id="edit_phone" value="<?php echo $task_fetch_data->phone;?>" required="required"/>
										</div>
										<div class="form-group">
											<label for="edit_email_id">Email </label>
											<input type="email" name="edit_email_id" parsley-trigger="reminder"  class="form-control" id="edit_email_id" value="<?php echo $task_fetch_data->email_id;?>" required="required"/>
										</div>
										<div class="form-group text-right m-b-0">
											<button type="submit"  class="btn btn-default waves-effect waves-light m-l-5">
												Update
											</button>
										</div>
									</form>
<?php exit();?>