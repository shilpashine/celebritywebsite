<div class="page-content-wrapper">
                    <div class="page-content">
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="index.html">Home</a>
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
                        <h1 class="page-title">Payment Request
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
                                                    <form action="" class="form-horizontal" method="post">
													<?php $payment_request_data=json_decode(      $payment_request_data);
													//echo($payment_request_data->order_amount);exit;
													      $user_data=json_decode($user_data);
														  //echo($user_data->username);?>
                                                        <div class="form-body">
															<div class="form-group">
                                                                <label class="col-md-3 control-label">Payment Amount </label>
                                                                <div class="col-md-4">
                                                                    <input type="text" name="order_amount" id="order_amount"class="form-control input-circle" value="<?php echo $payment_request_data->order_amount;?>" readonly>
                                                                </div>
                                                            </div>
															<div class="form-group">
                                                                <label class="col-md-3 control-label">User</label>
                                                                <div class="col-md-4">
                                                                    <input type="text" name="user" id="user"class="form-control input-circle" value="<?php echo $user_data->username;?>" readonly>
																	<input type="hidden" name="user_id" id="user_id"class="form-control input-circle" value="<?php echo $user_data->id;?>">
																	<input type="hidden" name="order_sells_user_details_id" id="order_sells_user_details_id"class="form-control input-circle" value="<?php echo $payment_request_data->id;?>">
                                                                </div>
                                                            </div>
															<div class="form-group">
                                                                <label class="col-md-3 control-label">Bank Name</label>
                                                                <div class="col-md-4">
                                                                    <input type="text" name="bank_name" id="bank_name"class="form-control input-circle" value="<?php echo $payment_request_data->bank_name ;?>" readonly>
                                                                </div>
                                                            </div>
															<div class="form-group">
                                                                <label class="col-md-3 control-label">Bank Branch Name</label>
                                                                <div class="col-md-4">
                                                                    <input type="text" name="bank_branch_name" id="bank_branch_name"class="form-control input-circle" value="<?php echo $payment_request_data->bank_branch_name ;?>" readonly>
                                                                </div>
                                                            </div>
															<div class="form-group">
                                                                <label class="col-md-3 control-label">IFC Code</label>
                                                                <div class="col-md-4">
                                                                    <input type="text" name="ifc_code" id="ifc_code"class="form-control input-circle" value="<?php echo $payment_request_data->ifc_code ;?>" readonly>
                                                                </div>
                                                            </div>
															<div class="form-group">
                                                                <label class="col-md-3 control-label">Bank Tranction Code</label>
                                                                <div class="col-md-4">
                                                                    <input type="text" name="bank_tranction_code" id="bank_tranction_code"class="form-control input-circle" value="">
                                                                </div>
                                                            </div>
															<div class="form-group">
                                                                <label class="col-md-3 control-label">Cheque No</label>
                                                                <div class="col-md-4">
                                                                    <input type="text" name="cheque_no" id="cheque_no"class="form-control input-circle" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-actions">
                                                            <div class="row">
                                                                <div class="col-md-offset-3 col-md-9">
																    <button type="submit" class="btn btn-circle green">Add</button>
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
		window.location.href='<?php echo $this->Url->build('/', true);  ?>'+ 'admin/payment-requests/index';
	  }				
</script>