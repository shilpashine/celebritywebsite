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
                                    <a href="#">Task Management</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Task Management</span>
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
                        <h1 class="page-title">Task Management
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
                                            <span class="caption-subject font-red sbold uppercase">Task Management</span>
											<?php echo $this->Flash->render('flash'); ?>
                                        </div>
                                        <?php /*?><div class="actions">
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
													<th> Company Name </th>
                                                    <th> First Name</th>
													<th> Middle Name</th>
													<th> Sur Name</th>
													</th>
													<th>Work Name</th>
                                                    <th> Phone No </th>
													<th> Email</th>
													<th> Through </th>
													<th> Created By </th>
													<th> Modified By </th>
													<th> Created </th>
                                                    <th> Action</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
											    <tr id="policy_add_row" name="policy_add_row" style="display:none;">
												<form method="post" action="#" id="policyAddForm" name="policyAddForm">
                                                    
                                                    <td> <input type="text" id="company_name" name="company_name"/> </td>
                                                    <td> <input type="text" id="fname" name="fname"/></td>
                                                    <td> <input type="text" id="lname" name="lname"/></td>
													<td> <input type="text" id="mname" name="mname"/></td>
                                                    <td> <input type="text" id="work_name" name="work_name"/> </td>
                                                    <td> <input type="text" id="phone" name="phone"/></td>
                                                    <td> <input type="text" id="email_id" name="email_id"/> </td>
													<td> <input type="text" id="email_id" name="email_id"/> </td>
													<td> <input type="text" id="email_id" name="email_id"/> </td>
													<td> <input type="text" id="email_id" name="email_id"/> </td>
													<td> <input type="text" id="email_id" name="email_id"/> </td>
													</form>
                                                    <td>
                                                        <a class="" href="#" onclick="add_policy();"> Save </a>
														<a class="" href="#" onclick="cancel_policy();"> Cancel </a>
                                                    </td>
                                                    
                                                </tr>
												<?php 
												if(isset($task_data)){
												$task_data=json_decode($task_data);
												foreach($task_data as $task_val){
												
												?>
                                                <tr>
                                                    <td> <?php echo strtoupper($task_val->company_name);?></td>
                                                    <td><?php echo strtoupper($task_val->fname);?></td>
                                                    <td> <?php echo strtoupper($task_val->mname);?>  </td>
                                                    <td> <?php echo $task_val->lname;?>  </td>
                                                    <td> <?php echo strtoupper($task_val->work_name);?> </td>
                                                    <td> <?php echo $task_val->phone;?> </td>
                                                    <td> <?php echo $task_val->email_id;?> </td>
													<td> <?php if(!empty($task_val->user)){echo strtoupper($task_val->user->fname." ".$task_val->user->lname);}?> </td>
													<td> <?php echo strtoupper($task_val->creator_type);?>  </td>
                                                    <td> <?php echo strtoupper($task_val->modifier_type);?> </td>
													<td> <?php echo (date("d/m/Y", strtotime($task_val->created)));?> </td>
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