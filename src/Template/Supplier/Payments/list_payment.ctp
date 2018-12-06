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
									<h4 class="m-t-0 header-title"><b>Payment/Billing View</b></h4>
									<p class="text-muted font-13 m-b-30">
	                                </p>
									<form action="add_data" method="post" name="theForm" data-parsley-validate enctype="multipart/form-data" >
										<div class="form-group">
											<label for="view_customer_name">Customer Name</label>
											<input type="text" name="view_customer_name" parsley-trigger="change"  class="form-control" id="view_customer_name" value=""  />
										</div>
										<div class="form-group">
											<label for="view_customer_phone_number">Customer Phone Number</label>
											<input type="text" name="view_customer_phone_number" parsley-trigger="change"  class="form-control" id="view_customer_phone_number" value=""  />
										</div>
										<div class="form-group">
											<label for="view_customer_address">Customer Address</label>
											<input type="text" name="view_customer_address" parsley-trigger="change"  class="form-control" id="view_customer_address" value=""   />
										</div>
										<div class="form-group">
											<label for="view_customer_email">Customer Email</label>
											<input type="text" name="view_customer_email" parsley-trigger="change"  class="form-control" id="view_customer_email" value=""  />
										</div>
										<div class="form-group">
											<label for="view_product_name">Product Name</label>
											<input type="text" name="view_product_name" parsley-trigger="change"  class="form-control" id="view_product_name" value=""  />
										</div>
										<div class="form-group">
											<label for="view_amount">Amount</label>
											<input  name="view_amount" id="view_amount" type="text"  class="form-control" value=""  />
										</div>
										<div class="form-group">
											<label for="view_stripe_id">Transaction Id</label>
											<input  name="view_stripe_id" id="view_stripe_id" type="text"  class="form-control" value=""  />
										</div>
										<div class="form-group">
											<label for="view_payment_date">Payment Date</label>
											<input  name="view_payment_date" id="view_payment_date" type="text"  class="form-control" value=""  />
										</div>
										<div class="form-group">
											<label for="view_created">Created</label>
											<input  name="view_created" id="view_created" type="text"  class="form-control" value=""  />
										</div>
										<div class="form-group">
											<label for="view_modified">Modified</label>
											<input  name="view_modified" id="view_modified" type="text"  class="form-control" value=""  />
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
                                    <h4 class="m-t-0 header-title"><b>Payment/Billing List</b></h4>
                                    <p class="text-muted font-13 m-b-30">
                                        List Payment/Billing
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
												$payment_data= json_decode($payment_data);
												//pr($payment_data);exit;
												if(!empty($payment_data)){
												foreach($payment_data as $payment_data_val){
												?>
                                            <tr>
												<td><?php echo $payment_data_val->order_code;?></td>
												<td><?php echo $payment_data_val->user->fname." ".$payment_data_val->user->lname;?></td>
                                                <td><?php echo $payment_data_val->user->email;?></td>
												<td><a title="View" onclick="view_data(<?php echo $payment_data_val->id;?>)" href="#"><i class="fa fa-eye"></i></a>
												<a title="Invoice" href="<?php echo $this->Url->build('/admin/payments/invoice_data/', true).base64_encode($payment_data_val->id); ?>" target="_blank"><i class="fa fa-file"></i></a>
												<a title="Delete" href="<?php echo $this->Url->build('/admin/payments/delete_data/', true).$payment_data_val->id ; ?>"><i class="fa fa-trash-o"></i></a>
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
				url: '<?php echo $this->Url->build('/admin/payments/view_data', true);  ?>',
				data: ({id:order_id}),
				success: function (data){
				$('#show_data').html(data);
				}
		    });
	}
</script>
  