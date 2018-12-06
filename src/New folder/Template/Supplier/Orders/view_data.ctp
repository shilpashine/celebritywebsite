                                <div class="col-lg-12" id="viewedit_show_data" name="viewedit_show_data">
								<div class="card-box">
									<h4 class="m-t-0 header-title"><b>Order View</b></h4>
									<p class="text-muted font-13 m-b-30">
	                                </p>
									<form action="#" method="" name="theViewForm" id="theViewForm"data-parsley-validate >
									    <?php 
										$order_data= json_decode($order_data);
										?>
										<div class="form-group">
											<label for="view_order_code">Order Code</label>
											<input type="text" name="view_order_code" parsley-trigger="change"  class="form-control" id="view_order_code" value="<?php echo $order_data->order_code;?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_invoice_no">Invoice No</label>
											<input type="text" name="view_invoice_no" parsley-trigger="change"  class="form-control" id="view_invoice_no" value="<?php echo $order_data->invoice_no;?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_customer_name">Customer Name</label>
											<input type="text" name="view_customer_name" parsley-trigger="change"  class="form-control" id="view_customer_name" value="<?php echo $order_data->first_name." ".$order_data->last_name;?>"  readonly />
										</div>
										<div class="form-group">
											<label for="view_email">Email</label>
											<input type="text" name="view_email" parsley-trigger="change"  class="form-control" id="view_email" value="<?php echo $order_data->email;?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_coupon_code">Coupon Code</label>
											<input type="text" name="view_coupon_code" parsley-trigger="change"  class="form-control" id="view_coupon_code" value="<?php echo $order_data->coupon_code;?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_shipping_cost">Shipping Cost</label>
											<input  name="view_shipping_cost" id="view_shipping_cost" type="text"  class="form-control" value="<?php echo $order_data->shipping_cost;?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_discount">Discount</label>
											<input  name="view_discount" id="view_discount" type="text"  class="form-control" value="<?php echo $order_data->discount;?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_billing_address">Billing Address</label>
											<input  name="view_billing_address" id="view_billing_address" type="text"  class="form-control" value="<?php echo $order_data->billing_address;?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_billing_city">Billing City</label>
											<input  name="view_billing_city" id="view_billing_city" type="text"  class="form-control" value="<?php echo $order_data->billing_city;?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_billing_state">Billing State</label>
											<input  name="view_billing_state" id="view_billing_state" type="text"  class="form-control" value="<?php echo $order_data->billing_state;?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_billing_zip">Billing Zip/Postal Code</label>
											<input  name="view_billing_zip" id="view_billing_zip" type="text"  class="form-control" value="<?php echo $order_data->billing_zip;?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_billing_country">Billing Country:</label>
											<input  name="view_billing_country" id="view_billing_country" type="text"  class="form-control" value="<?php echo $order_data->billing_country;?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_shipping_address">Shipping Address:</label>
											<input  name="view_shipping_address" id="view_shipping_address" type="text"  class="form-control" value="<?php echo $order_data->shipping_address;?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_shipping_city">Shipping City:</label>
											<input  name="view_shipping_city" id="view_shipping_city" type="text"  class="form-control" value="<?php echo $order_data->shipping_city;?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_shipping_state">Shipping State:</label>
											<input  name="view_shipping_state" id="view_shipping_state" type="text"  class="form-control" value="<?php echo $order_data->shipping_state;?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_shipping_zip">Shipping Zip/Postal Code:</label>
											<input  name="view_shipping_zip" id="view_shipping_zip" type="text"  class="form-control" value="<?php echo $order_data->shipping_zip;?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_shipping_country">Shipping Country:</label>
											<input  name="view_shipping_country" id="view_shipping_country" type="text"  class="form-control" value="<?php echo $order_data->shipping_country;?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_created">Created</label>
											<input  name="view_created" id="view_created" type="text"  class="form-control" value="<?php echo $order_data->created;?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_modified">Modified</label>
											<input  name="view_modified" id="view_modified" type="text"  class="form-control" value="<?php echo $order_data->modified;?>" readonly />
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