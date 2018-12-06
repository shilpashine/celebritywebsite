                    <div class="container">
        						<!-- Page-Title -->
        						<div class="row">
        							<div class="col-sm-12">
                                        <div class="btn-group pull-right m-t-15">
                                            <button type="button" class="btn btn-white dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i class="fa fa-cog"></i></span></button>
                                            <ul class="dropdown-menu drop-menu-right dropdown-menu-animate" role="menu">
                                                <li><a href="#">Action</a></li>
                                                <li><a href="#">Another action</a></li>
                                                <li><a href="#">Something else here</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Separated link</a></li>
                                            </ul>
                                        </div>
        								<h4 class="page-title">Datatable</h4>
        								<ol class="breadcrumb">
        									<li>
        										<a href="#">Ubold</a>
        									</li>
        									<li>
        										<a href="#">Tables</a>
        									</li>
        									<li class="active">
        										Datatable
        									</li>
        								</ol>
        							</div>
        						</div>
						<div class="row">
							<div class="col-lg-6" id="show_data" name="show_data">
								<div class="card-box">
									<h4 class="m-t-0 header-title"><b>Order View</b></h4>
									<p class="text-muted font-13 m-b-30">
	                                </p>
									<form action="add_data" method="post" name="theForm" data-parsley-validate enctype="multipart/form-data" >
										<div class="form-group">
											<label for="view_order_code">Order Code</label>
											<input type="text" name="view_order_code" parsley-trigger="change"  class="form-control" id="view_order_code" value=""  />
										</div>
										<div class="form-group">
											<label for="view_invoice_no">Invoice No</label>
											<input type="text" name="view_invoice_no" parsley-trigger="change"  class="form-control" id="view_invoice_no" value=""  />
										</div>
										<div class="form-group">
											<label for="view_customer_name">Customer Name</label>
											<input type="text" name="view_customer_name" parsley-trigger="change"  class="form-control" id="view_customer_name" value=""   />
										</div>
										<div class="form-group">
											<label for="view_email">Email</label>
											<input type="text" name="view_email" parsley-trigger="change"  class="form-control" id="view_email" value=""  />
										</div>
										<div class="form-group">
											<label for="view_coupon_code">Coupon Code</label>
											<input type="text" name="view_coupon_code" parsley-trigger="change"  class="form-control" id="view_coupon_code" value=""  />
										</div>
										<div class="form-group">
											<label for="view_shipping_cost">Shipping Cost</label>
											<input  name="view_shipping_cost" id="view_shipping_cost" type="text"  class="form-control" value=""  />
										</div>
										<div class="form-group">
											<label for="view_discount">Discount</label>
											<input  name="view_discount" id="view_discount" type="text"  class="form-control" value=""  />
										</div>
										<div class="form-group">
											<label for="view_billing_address">Billing Address</label>
											<input  name="view_billing_address" id="view_billing_address" type="text"  class="form-control" value=""  />
										</div>
										<div class="form-group">
											<label for="view_billing_city">Billing City</label>
											<input  name="view_billing_city" id="view_billing_city" type="text"  class="form-control" value=""  />
										</div>
										<div class="form-group">
											<label for="view_billing_state">Billing State</label>
											<input  name="view_billing_state" id="view_billing_state" type="text"  class="form-control" value=""  />
										</div>
										<div class="form-group">
											<label for="view_billing_zip">Billing Zip/Postal Code</label>
											<input  name="view_billing_zip" id="view_billing_zip" type="text"  class="form-control" value=""  />
										</div>
										<div class="form-group">
											<label for="view_billing_country">Billing Country:</label>
											<input  name="view_billing_country" id="view_billing_country" type="text"  class="form-control" value=""  />
										</div>
										<div class="form-group">
											<label for="view_shipping_address">Shipping Address:</label>
											<input  name="view_shipping_address" id="view_shipping_address" type="text"  class="form-control" value=""  />
										</div>
										<div class="form-group">
											<label for="view_shipping_city">Shipping City:</label>
											<input  name="view_shipping_city" id="view_shipping_city" type="text"  class="form-control" value=""  />
										</div>
										<div class="form-group">
											<label for="view_shipping_state">Shipping State:</label>
											<input  name="view_shipping_state" id="view_shipping_state" type="text"  class="form-control" value=""  />
										</div>
										<div class="form-group">
											<label for="view_shipping_zip">Shipping Zip/Postal Code:</label>
											<input  name="view_shipping_zip" id="view_shipping_zip" type="text"  class="form-control" value=""  />
										</div>
										<div class="form-group">
											<label for="view_shipping_country">Shipping Country:</label>
											<input  name="view_shipping_country" id="view_shipping_country" type="text"  class="form-control" value="" />
										</div>
										<div class="form-group">
											<label for="view_created">Created</label>
											<input  name="view_created" id="view_created" type="date"  class="form-control" value=""  />
										</div>
										<div class="form-group">
											<label for="view_modified">Modified</label>
											<input  name="view_modified" id="view_modified" type="date"  class="form-control" value=""  />
										</div>
										<div class="form-group text-right m-b-0">
											<button type="reset" onclick="goBack()" class="btn btn-default waves-effect waves-light m-l-5">
												Back
											</button>
										</div>
									</form>
								</div> 
							</div>
						<!--</div>-->		
                        <!--<div class="row">-->
                            <div class="col-sm-6">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>Order List</b></h4>
                                    <p class="text-muted font-13 m-b-30">
                                        List Orders
                                    </p>
									<?php echo $this->Flash->render();?>
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Order Code</th>
                                                <th>Customer Name</th>
												<th>Customer Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										       <?php 
												$order_data= json_decode($order_data);
												if(!empty($order_data)){
												foreach($order_data as $order_data_val){
												?>
                                            <tr>
                                                <td><?php echo $order_data_val->order_code;?></td>
												<td><?php echo $order_data_val->first_name." ".$order_data_val->last_name;?></td>
												<td><?php echo $order_data_val->email;?></td>
                                                <td>
												<a title="View" onclick="view_data(<?php echo $order_data_val->id;?>)" href="#"><i class="fa fa-eye"></i></a>
												<a title="Delete" href="<?php echo $this->Url->build('/admin/orders/delete_data/', true).$order_data_val->id ; ?>"><i class="fa fa-trash-o"></i></a>
												<a title="Is Dispatched" href="<?php echo $this->Url->build('/admin/orders/change_status/', true).$order_data_val->id; ?>"> <?php if($order_data_val->status==1){echo $this->Html->image("/img/test-pass-icon.png"); } else{ echo $this->Html->image("/img/warning.png");}?></a>
												</td>
                                            </tr>
												<?php }}?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
function view_data(order_id){
		 $.ajax({
				type: "POST",
				evalScripts: true,
				url: '<?php echo $this->Url->build('/admin/orders/view_data', true);  ?>',
				data: ({id:order_id}),
				success: function (data){
				$('#show_data').html(data);
				}
		    });
	}
</script>
  