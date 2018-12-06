                                <div class="col-lg-6">
								<div class="card-box">
									<h4 class="m-t-0 header-title"><b>Basic Form</b></h4>
									<p class="text-muted font-13 m-b-30">
	                                    Your awesome text goes here.
	                                </p>
									<form action="#" method="post" name="theForm" data-parsley-validate >
									    <?php 
										$coupon_data= json_decode($coupon_data);
										//pr($coupon_data);exit
										?>
										<input type="hidden" name="ajax_coupon_id"  id="ajax_coupon_id" parsley-trigger="change" required class="form-control" id="ajax_coupon_id" value="<?php echo $coupon_data->id;?>"  />
										<div class="form-group">
											<label for="coupon_code">Coupon Code*</label>
											<input type="text" name="ajax_coupon_code" parsley-trigger="change" required class="form-control" id="ajax_coupon_code" value="<?php echo $coupon_data->coupon_code;?>"  />
										</div>
										<div class="form-group">
											<label for="valid_from">Valid From*</label>
											<input  name="ajax_valid_from" id="ajax_valid_from" type="date" required class="form-control" value="<?php echo(date("m/d/Y", strtotime($coupon_data->valid_from)));?>" required="required">
										</div>
										<div class="form-group">
											<label for="valid_to">Valid To*</label>
											<input  name="ajax_valid_to" id="ajax_valid_to" type="date" required class="form-control" value="<?php echo $coupon_data->valid_to;?>" required="required">
										</div>
										<div class="form-group">
											<label for="discount">Discount</label>
											<input  name="ajax_discount" id="ajax_discount" type="text" required class="form-control" value="<?php echo $coupon_data->discount;?>" required="required">
										</div>
										<div class="form-group">
											<label for="discount">Created</label>
											<input  name="ajax_created" id="ajax_created" type="text" required class="form-control" value="<?php echo $coupon_data->created;?>" required="required">
										</div>
										<div class="form-group">
											<label for="discount">Modified</label>
											<input  name="ajax_modified" id="ajax_modified" type="text" required class="form-control" value="<?php echo $coupon_data->modified;?>" required="required">
										</div>
										<div class="form-group text-right m-b-0">
											<button class="btn btn-primary waves-effect waves-light" type="submit" onclick="ajax_edit_data()">
												Submit
											</button>
										</div>
									</form>
								    </div> 
							    </div>
<script>					
function ajax_edit_data(){
	     var ajax_coupon_id=$('#ajax_coupon_id').val();
	     var ajax_coupon_code=$('#ajax_coupon_code').val();
		 var ajax_valid_to=$('#ajax_valid_to').val();
		 var ajax_valid_from=$('#ajax_valid_from').val();
		 var ajax_discount=$('#ajax_discount').val();
		 $.ajax({
				type: "POST",
				evalScripts: true,
				url: '<?php echo $this->Url->build('/admin/coupons/ajax_edit_data', true);  ?>',
				data: ({ajax_coupon_id:ajax_coupon_id,ajax_coupon_code:ajax_coupon_code,ajax_valid_to:ajax_valid_to,ajax_valid_from:ajax_valid_from,ajax_discount:ajax_discount}),
				success: function (data){
				    alert(data);
					window.location.href(<?php echo $this->Url->build('/admin/coupons/list_coupon', true);  ?>);
				}
		    });
	  }	
</script>
<?php exit;?>