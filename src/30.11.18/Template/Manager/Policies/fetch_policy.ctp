										<?php 
												
												//pr($lead_remark_data);
												if(isset($policy_fetch_data)){
												$policy_fetch_data=json_decode($policy_fetch_data);
												}
												?>
										<form action="editPolicy" method="post" name="theEditForm" >
										<input type="hidden" id="edit_policy_id" name="edit_policy_id" value="<?php echo $policy_fetch_data->id;?>"/>
										<div class="form-group">
											<label for="edit_policy_date">Policy Date</label>
											<input type="date" name="edit_policy_date" parsley-trigger="reminder"  class="form-control" id="edit_policy_date" value="<?php echo(date("m/d/Y", strtotime($policy_fetch_data->policy_date)));?>" required="required" />
										</div>
										<div class="form-group">
											<label for="edit_company_name">Company Name</label>
											<input type="text" name="edit_company_name" parsley-trigger="reminder"  class="form-control" id="edit_company_name" value="<?php echo strtoupper($policy_fetch_data->company_name);?>" required="required" />
										</div>
										<div class="form-group">
											<label for="edit_fname">First Name</label>
											<input type="text" name="edit_fname" parsley-trigger="reminder"  class="form-control" id="edit_fname" value="<?php echo strtoupper($policy_fetch_data->fname);?>" required="required" />
										</div>
										<div class="form-group">
											<label for="edit_lname">Last Name</label>
											<input type="text" name="edit_lname" parsley-trigger="reminder"  class="form-control" id="edit_lname" value="<?php echo strtoupper($policy_fetch_data->lname);?>" required="required" />
										</div>
										<div class="form-group">
											<label for="edit_address1">Address1</label>
											<textarea  name="edit_address1" parsley-trigger="reminder"  class="form-control" id="edit_address1" required="required" ><?php echo strtoupper($policy_fetch_data->address1);?></textarea>
										</div>
										<div class="form-group">
											<label for="edit_address2">Address2</label>
											<textarea  name="edit_address2" parsley-trigger="reminder"  class="form-control" id="edit_address2" required="required" ><?php echo strtoupper($policy_fetch_data->address2);?></textarea>
										</div>
										<div class="form-group">
											<label for="edit_city">City</label>
											<input type="text" name="edit_city" parsley-trigger="reminder"  class="form-control" id="edit_city" value="<?php echo strtoupper($policy_fetch_data->city);?>" required="required" />
										</div>
										<div class="form-group">
											<label for="edit_pin">PIN</label>
											<input type="text" name="edit_pin" parsley-trigger="reminder"  class="form-control" id="edit_pin" value="<?php echo $policy_fetch_data->pin;?>" required="required" />
										</div>
										<div class="form-group">
											<label for="edit_sum_assured">Sum Assured</label>
											<input type="text" name="edit_sum_assured" parsley-trigger="reminder"  class="form-control" id="edit_sum_assured" value="<?php echo $policy_fetch_data->sum_assured;?>" required="required" />
										</div>
										<div class="form-group">
											<label for="edit_amount">Amount</label>
											<input type="text" name="edit_amount" parsley-trigger="reminder"  class="form-control" id="edit_amount" value="<?php echo $policy_fetch_data->amount;?>" required="required" onkeyup="edit_cal_gross_premium();" />
										</div>
										<div class="form-group">
											<label for="edit_gst">GST</label>
											<input type="text" name="edit_gst" parsley-trigger="reminder"  class="form-control" id="edit_gst" value="<?php echo $policy_fetch_data->gst;?>" required="required" onkeyup="edit_cal_gross_premium();" />
										</div>
										<div class="form-group">
											<label for="edit_gross_premium">Gross Premium</label>
											<input type="text" name="edit_gross_premium" parsley-trigger="reminder"  class="form-control" id="edit_gross_premium" value="<?php echo $policy_fetch_data->gross_premium;?>" required="required" />
										</div>
										<div class="form-group text-right m-b-0">
											<button type="submit"  class="btn btn-default waves-effect waves-light m-l-5">
												Update
											</button>
										</div>
									</form>

<script>
					
					function edit_cal_gross_premium(){
						//alert("hhhh");exit;
					var amount=$('#edit_amount').val();
                    var gst=$('#edit_gst').val();
					if(amount && gst){
					var gst_amount=(amount*(gst/100));
					var gross_premium=parseFloat(amount)+parseFloat(gst_amount);
					$('#edit_gross_premium').val(gross_premium);
					}
					else{
					$('#edit_gross_premium').val("");	
					}
					}
</script>					
<?php exit();?>