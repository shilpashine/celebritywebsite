										<?php 
												
												//pr($lead_remark_data);
												if(isset($lead_view_data)){
												$lead_view_data=json_decode($lead_view_data);
												}
												?>
										<form action="" method="post" name="theViewForm" >
										<div class="form-group">
											<label for="view_client_name">Client Name</label>
											<input type="text" name="view_client_name" parsley-trigger="reminder"  class="form-control" id="view_client_name" value="<?php echo strtoupper($lead_view_data->client_name);?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_client_phone_no">Client Phone No.</label>
											<input type="text" name="view_client_phone_no" parsley-trigger="reminder"  class="form-control" id="view_client_phone_no" value="<?php echo $lead_view_data->client_phone_no;?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_client_address">Client Address</label>
											<textarea  name="view_client_address" parsley-trigger="reminder"  class="form-control" id="view_client_address" readonly ><?php echo strtoupper($lead_view_data->client_address);?></textarea>
										</div>
										<div class="form-group">
											<label for="view_ref_name">Ref Name</label>
											<input type="text" name="view_ref_name" parsley-trigger="reminder"  class="form-control" id="view_ref_name" value="<?php echo strtoupper($lead_view_data->ref_name);?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_ref_phone_no">Ref Phone No.</label>
											<input type="text" name="view_ref_phone_no" parsley-trigger="reminder"  class="form-control" id="view_ref_phone_no" value="<?php echo $lead_view_data->ref_phone_no;?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_created">Created</label>
											<input type="text" name="view_created" parsley-trigger="reminder"  class="form-control" id="view_created" value="<?php echo(date("d/m/Y", strtotime($lead_view_data->created)));?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_modified">Modified</label>
											<input type="text" name="view_modified" parsley-trigger="reminder"  class="form-control" id="view_modified" value="<?php echo(date("d/m/Y", strtotime($lead_view_data->modified)));?>" readonly />
										</div>
									</form>
<?php exit();?>