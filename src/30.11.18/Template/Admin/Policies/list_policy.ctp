<div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN THEME PANEL -->
                        <!-- END THEME PANEL -->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="<?php echo $this->Url->build('/admin/dashboards/index', true); ?>">Home</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <a href="#">Policy Management</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Policy Management</span>
                                </li>
                            </ul>
                            <?php /*?><div class="page-toolbar">
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
                            </div><?php */?>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title">Policy Management
                             <!--<small>editable datatable samples</small>-->
                        </h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet light portlet-fit bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="icon-settings font-red"></i>
                                            <span class="caption-subject font-red sbold uppercase">Policy Management</span>
											<?php echo $this->Flash->render('flash'); ?>
                                        </div>
                                       <?php /*?> <div class="actions">
                                            <div class="btn-group btn-group-devided" data-toggle="buttons">
                                                <label class="btn btn-transparent red btn-outline btn-circle btn-sm active">
                                                    <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                                <label class="btn btn-transparent red btn-outline btn-circle btn-sm">
                                                    <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                                            </div>
                                        </div><?php */?>
                                    </div>
                                    <div class="portlet-body">
                                        <div class="table-toolbar">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="btn-group">
                                                        <!--<button id="sample_editable_1_new" class="btn green"> Add New
                                                            <i class="fa fa-plus"></i>
                                                        </button>
														<button  class="btn green" onclick="add_new_policy();"> Add New
                                                            <i class="fa fa-plus"></i>
                                                        </button>-->
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="btn-group pull-right">
                                                        <button class="btn green btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                            <i class="fa fa-angle-down"></i>
                                                        </button>
                                                        <ul class="dropdown-menu pull-right">
                                                            <li>
                                                                <a href="javascript:;"> Print </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"> Save as PDF </a>
                                                            </li>
                                                            <li>
                                                                <a href="javascript:;"> Export to Excel </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                            <thead>
                                                <tr>
                                                    <th> Policy Date </th>
													<th> Company Name </th>
                                                    <th> First Name</th>
													<th> Sur Name</th>
													<th> Address1</th>
													<th> Address2</th>
													<th> City</th>
													<th> Pin</th>
                                                    <th> Sum Assured </th>
													<th>Amount</th>
                                                    <th> GST </th>
                                                    <th> Gross Premium </th>
													<th> Through </th>
													<th> Created By </th>
													<th> Modified By </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
											    <tr id="policy_add_row" name="policy_add_row" style="display:none;">
												<form method="post" action="#" id="policyAddForm" name="policyAddForm">
                                                    <td> <input type="date" id="policy_date" name="policy_date"/> </td>
                                                    <td> <input type="text" id="company_name" name="company_name"/> </td>
                                                    <td> <input type="text" id="fname" name="fname"/></td>
                                                    <td> <input type="text" id="lname" name="lname"/></td>
                                                    <td> <input type="text" id="address1" name="address1"/></td>
													<td> <input type="text" id="address2" name="address2"/> </td>
                                                    <td> <input type="text" id="city" name="city"/> </td>
                                                    <td> <input type="text" id="pin" name="pin"/> </td>
                                                    <td> <input type="text" id="sum_assured" name="sum_assured"/> </td>
                                                    <td> <input type="text" id="amount" name="amount"/></td>
                                                    <td> <input type="text" id="gst" name="gst"/> </td>
                                                    <td> <input type="text" id="gross_premium" name="gross_premium"/></td>
													<td> <input type="text" id="gross_premium" name="gross_premium"/></td>
													<td> <input type="text" id="gross_premium" name="gross_premium"/></td>
													<td> <input type="text" id="gross_premium" name="gross_premium"/></td>
													</form>
                                                    <td>
                                                        <a class="" href="#" onclick="add_policy();"> Save </a>
														<a class="" href="#" onclick="cancel_policy();"> Cancel </a>
                                                    </td>
                                                </tr>
												<?php 
												if(isset($policy_data)){
												$policy_data=json_decode($policy_data);
												foreach($policy_data as $policy_val){
													//pr($policy_val);exit;
												
												?>
                                                <tr>
                                                    <td> <?php echo (date("d/m/Y", strtotime($policy_val->policy_date)));?></td>
                                                    <td> <?php echo strtoupper($policy_val->company_name);?></td>
                                                    <td><?php echo strtoupper($policy_val->fname);?></td>
                                                    <td> <?php echo strtoupper($policy_val->lname);?>  </td>
                                                    <td><?php echo strtoupper($policy_val->address1);?>  </td>
													<td> <?php echo strtoupper($policy_val->address2);?> </td>
                                                    <td> <?php echo strtoupper($policy_val->city);?></td>
                                                    <td> <?php echo $policy_val->pin;?></td>
                                                    <td> <?php echo $policy_val->sum_assured;?> </td>
                                                    <td> <?php echo $policy_val->amount;?> </td>
                                                    <td> <?php echo $policy_val->gst;?> </td>
                                                    <td> <?php echo $policy_val->gross_premium;?></td>
													<td> <?php if(!empty($policy_val->user)){echo $policy_val->user->fname." ".$policy_val->user->lname;}?></td>
													<td><?php echo $policy_val->creator_type;?>  </td>
													<td> <?php echo $policy_val->modifier_type;?> </td>
                                                    <td>
                                                        <a class="" href="javascript:;"> Edit </a>
														<a class="" href="javascript:;"> Delete </a>
                                                    </td>
                                                </tr>
												<?php }}?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
                        </div>
                    </div>
					<script>
					function add_new_policy(){
					$('#policy_add_row').show();	
					}
					function add_policy(){
					$('#policyAddForm').submit();	
					}
					function cancel_policy(){
					window.location.reload();	
					}
					</script>