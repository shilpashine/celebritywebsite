<div class="page-content-wrapper">
                    <div class="page-content">
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="#">Home</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Form Stuff</span>
                                </li>
                            </ul>
                            <div class="page-toolbar">
                                <div class="btn-group pull-right">
                                    <button type="button" class="btn green btn-sm btn-outline dropdown-toggle" data-toggle="dropdown"> Actions
                                        <i class="fa fa-angle-down"></i>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li>
                                            <a href="#">
                                                <i class="icon-bell"></i> Action</a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-shield"></i> Another action</a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-user"></i> Something else here</a>
                                        </li>
                                        <li class="divider"> </li>
                                        <li>
                                            <a href="#">
                                                <i class="icon-bag"></i> Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <h1 class="page-title"> Edit Payment Method
                        </h1>
						 <?php echo $this->Flash->render('flash'); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="tabbable-line boxless tabbable-reversed">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="tab_0">
                                            <div class="portlet box green">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-gift"></i>Form Actions On Bottom </div>
                                                    <div class="tools">
                                                        <a href="javascript:;" class="collapse"> </a>
                                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                                        <a href="javascript:;" class="reload"> </a>
                                                        <a href="javascript:;" class="remove"> </a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body form">
												<?php 
												$payment_method_data= json_decode($payment_method_data);
												//pr($user_data);
												?>
                                                    <form action="" class="form-horizontal" method="post">
                                                        <div class="form-body">
															<div class="form-group">
                                                                <label class="col-md-3 control-label">Method Name</label>
                                                                <div class="col-md-4">
                                                                    <input type="text" name="method_name" id="method_name"class="form-control input-circle" value="<?php if(!empty($payment_method_data)){echo $payment_method_data->method_name;}?>">
																	<input type="hidden" name="payment_method_id" id="payment_method_id"class="form-control input-circle" value="<?php if(!empty($payment_method_data)){echo $payment_method_data->id;}?>">
                                                                </div>
                                                            </div>
															<div class="form-group">
                                                                <label class="col-md-3 control-label">Payment Gateway</label>
                                                                <div class="col-md-4">
                                                                    <input type="text" name="payment_gateway" id="payment_gateway"class="form-control input-circle" value="<?php if(!empty($payment_method_data)){echo $payment_method_data->payment_gateway;}?>">
                                                                </div>
                                                            </div>
															<div class="form-group">
                                                                <label class="col-md-3 control-label">Description</label>
                                                                <div class="col-md-4">
                                                                    <input type="text" name="description" id="description"class="form-control input-circle" value="<?php if(!empty($payment_method_data)){echo $payment_method_data->description;}?>">
                                                                </div>
                                                            </div>
															<div class="form-group">
																<label class="col-md-3 control-label">Select Status</label>
																<div class="col-md-4">
																<select id="is_active" name="is_active" class="form-control input-circle">
																<option value="">--Select A Status--</option>
																<option value="0" <?php if(!empty($payment_method_data)){if( $payment_method_data->is_active==0){echo "selected";}}?>>In Active</option>
																<option value="1" <?php if(!empty($payment_method_data)){if( $payment_method_data->is_active==1){echo "selected";}}?>>Active</option>
																</select>
																</div>
                                                            </div>
                                                        </div>
                                                        <div class="form-actions">
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-9">
																    <button type="submit" class="btn btn-circle green">Update</button>
                                                                    <button type="button" class="btn btn-circle grey-salsa btn-outline" onclick="go_back()">Back</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <!-- END FORM-->
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
<script>
function go_back(){
		window.location.href='<?php echo $this->Url->build('/', true);  ?>'+ 'admin/payment-methods/index';
	  }				
</script>