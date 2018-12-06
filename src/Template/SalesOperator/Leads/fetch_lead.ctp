										<?php 
												
												//pr($lead_remark_data);
												if(isset($lead_fetch_data)){
												$lead_fetch_data=json_decode($lead_fetch_data);
												}
												?>
										<form action="editLead" method="post" name="theEditForm" >
		                               <input type="hidden" id="edit_lead_id" name="edit_lead_id" value="<?php echo $lead_fetch_data->id;?>"/>
										<div class="form-group">
											<label for="reminder">Client Name</label>
											<input type="text" name="edit_client_name" parsley-trigger="reminder"  class="form-control" id="edit_client_name" value="<?php echo strtoupper($lead_fetch_data->client_name);?>" required="required"/>
										</div>
										<div class="form-group">
											<label for="reminder">Client Phone No.</label>
											<input type="text" name="edit_client_phone_no" parsley-trigger="reminder"  class="form-control" id="edit_client_phone_no" value="<?php echo $lead_fetch_data->client_phone_no;?>" required="required"/>
										</div>
										<div class="form-group">
											<label for="reminder">Client Address</label>
											<textarea  name="edit_client_address" parsley-trigger="reminder"  class="form-control" id="edit_client_address" required="required"><?php echo strtoupper($lead_fetch_data->client_address);?></textarea>
										</div>
										<div class="form-group">
											<label for="reminder">Ref Name</label>
											<input type="text" name="edit_ref_name" parsley-trigger="reminder"  class="form-control" id="edit_ref_name" value="<?php echo strtoupper($lead_fetch_data->ref_name);?>" required="required"/>
										</div>
										<div class="form-group">
											<label for="reminder">Ref Phone No.</label>
											<input type="text" name="edit_ref_phone_no" parsley-trigger="reminder"  class="form-control" id="edit_ref_phone_no" value="<?php echo $lead_fetch_data->ref_phone_no;?>" required="required"/>
										</div>
										<div class="form-group text-right m-b-0">
											<button type="submit"  class="btn btn-default waves-effect waves-light m-l-5">
												Update
											</button>
										</div>
									</form>
<?php exit();?>