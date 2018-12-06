                                <div class="col-lg-12" id="viewedit_show_data" name="viewedit_show_data">
								<div class="card-box">
									<h4 class="m-t-0 header-title"><b>Payment/Billing View</b></h4>
									<p class="text-muted font-13 m-b-30">
	                                </p>
									<form action="#" method="" name="theViewForm" id="theViewForm"data-parsley-validate >
									    <?php 
										$paymentdata= json_decode($payment_data);
										?>
										<div class="form-group">
											<label for="view_customer_name">Customer Name</label>
											<input type="text" name="view_customer_name" parsley-trigger="change"  class="form-control" id="view_customer_name" value="<?php echo $paymentdata->user->fname." ".$paymentdata->user->lname;?>"  readonly />
										</div>
										<div class="form-group">
											<label for="view_customer_phone_number">Customer Phone Number</label>
											<input type="text" name="view_customer_phone_number" parsley-trigger="change"  class="form-control" id="view_customer_phone_number" value="<?php echo $paymentdata->user->phone_number;?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_customer_address">Customer Address</label>
											<input type="text" name="view_customer_address" parsley-trigger="change"  class="form-control" id="view_customer_address" value="<?php echo $paymentdata->user->address;?>"  readonly />
										</div>
										<div class="form-group">
											<label for="view_customer_email">Customer Email</label>
											<input type="text" name="view_customer_email" parsley-trigger="change"  class="form-control" id="view_customer_email" value="<?php echo $paymentdata->user->email;?>"  readonly />
										</div>
										<div class="form-group">
											<label for="view_amount">Amount</label>
											<input  name="view_amount" id="view_amount" type="text"  class="form-control" value="<?php if(!empty($paymentdata->payment_details)){echo $paymentdata->payment_details[0]->amount;}?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_stripe_id">Transaction Id</label>
											<input  name="view_stripe_id" id="view_stripe_id" type="text"  class="form-control" value="<?php if(!empty($paymentdata->payment_details)){echo $paymentdata->payment_details[0]->stripe_id;}?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_payment_date">Payment Date</label>
											<input  name="view_payment_date" id="view_payment_date" type="text"  class="form-control" value="<?php if(!empty($paymentdata->payment_details)){ echo $paymentdata->payment_details[0]->payment_date;}?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_created">Created</label>
											<input  name="view_created" id="view_created" type="text"  class="form-control" value="<?php echo $paymentdata->created;?>"  readonly />
										</div>
										<div class="form-group">
											<label for="view_modified">Modified</label>
											<input  name="view_modified" id="view_modified" type="text"  class="form-control" value="<?php echo $paymentdata->modified;?>" readonly />
										</div>
										<div class="form-group text-right m-b-0">
											<button type="reset" onclick="goBack()" class="btn btn-default waves-effect waves-light m-l-5">
												Back
											</button>
										</div>
									</form>
									<div id="reply_div">
                                    <h4 class="m-t-0 header-title"><b>Product List</b></h4>
                                    <p class="text-muted font-13 m-b-30">
                                        List Products
                                    </p>
									<?php echo $this->Flash->render();?>
                                    <table  class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Category</th>
												<th>Product Name</th>
												<th>Product Image</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										<?php 
										$payment_data= json_decode($payment_data);
										?>
									    <?php 
										if(!empty($payment_data) && !empty($payment_data->order_items)){
										foreach($payment_data->order_items as $order_item_val){ 
									    ?>
                                            <tr>
                                               <td><?php echo $order_item_val->category->category_name;?></td>
											   <td><?php if(!empty($order_item_val->product)){echo $order_item_val->product->name;}?></td>
											   <td style=""><?php if(!empty($order_item_val->product)){ echo $this->Html->image("small/".$order_item_val->product->image, ['alt' => 'Shoe','class'=>'logo-default']);}?></td>
											   <td><?php echo $order_item_val->price;?></td>
                                            </tr>
										<?php }}?>
                                        </tbody>
                                    </table>
									</div>
								    </div> 
							    </div>
<script>
function goBack() {
    window.history.back();
}	  
</script>
<?php exit;?>