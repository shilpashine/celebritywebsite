										<?php 
												
												//pr($lead_remark_data);
												if(isset($policy_view_data)){
												$policy_view_data=json_decode($policy_view_data);
												}
												?>
										<form action="" method="post" name="theViewForm" >
										<div class="form-group">
											<label for="view_policy_date">Policy Date</label>
											<input type="text" name="view_policy_date" parsley-trigger="reminder"  class="form-control" id="view_policy_date" value="<?php echo(date("d/m/Y", strtotime($policy_view_data->policy_date)));?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_company_name">Company Name</label>
											<input type="text" name="view_company_name" parsley-trigger="reminder"  class="form-control" id="view_company_name" value="<?php echo strtoupper($policy_view_data->company_name);?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_fname">First Name</label>
											<input type="text" name="view_fname" parsley-trigger="reminder"  class="form-control" id="view_fname" value="<?php echo strtoupper($policy_view_data->fname);?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_lname">Last Name</label>
											<input type="text" name="view_lname" parsley-trigger="reminder"  class="form-control" id="view_lname" value="<?php echo strtoupper($policy_view_data->lname);?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_address1">Address1</label>
											<textarea  name="view_address1" parsley-trigger="reminder"  class="form-control" id="view_address1" readonly ><?php echo strtoupper($policy_view_data->address1);?></textarea>
										</div>
										<div class="form-group">
											<label for="view_address2">Address2</label>
											<textarea  name="view_address2" parsley-trigger="reminder"  class="form-control" id="view_address2" readonly ><?php echo strtoupper($policy_view_data->address2);?></textarea>
										</div>
										<div class="form-group">
											<label for="view_city">City</label>
											<input type="text" name="view_city" parsley-trigger="reminder"  class="form-control" id="view_city" value="<?php echo strtoupper($policy_view_data->city);?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_pin">PIN</label>
											<input type="text" name="view_pin" parsley-trigger="reminder"  class="form-control" id="view_pin" value="<?php echo strtoupper($policy_view_data->pin);?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_sum_assured">Sum Assured</label>
											<input type="text" name="view_sum_assured" parsley-trigger="reminder"  class="form-control" id="view_sum_assured" value="<?php echo $policy_view_data->sum_assured;?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_amount">Amount</label>
											<input type="text" name="view_amount" parsley-trigger="reminder"  class="form-control" id="view_amount" value="<?php echo $policy_view_data->amount;?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_gst">GST</label>
											<input type="text" name="view_gst" parsley-trigger="reminder"  class="form-control" id="view_gst" value="<?php echo $policy_view_data->gst;?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_gross_premium">Gross Premium</label>
											<input type="text" name="view_gross_premium" parsley-trigger="reminder"  class="form-control" id="view_gross_premium" value="<?php echo $policy_view_data->gross_premium;?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_created">Created</label>
											<input type="text" name="view_created" parsley-trigger="reminder"  class="form-control" id="view_created" value="<?php echo(date("d/m/Y", strtotime($policy_view_data->created)));?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_modified">Modified</label>
											<input type="text" name="view_modified" parsley-trigger="reminder"  class="form-control" id="view_modified" value="<?php echo(date("d/m/Y", strtotime($policy_view_data->modified)));?>" readonly />
										</div>
									</form>
<?php exit();?>