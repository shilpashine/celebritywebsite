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
                                    <a href="#">Lead Management</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Lead Management</span>
                                </li>
                            </ul>
                            <!--<div class="page-toolbar">
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
                            </div>-->
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title">Lead Management
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
                                            <span class="caption-subject font-red sbold uppercase">Lead Management</span>
											<?php echo $this->Flash->render('flash'); ?>
                                        </div>
                                        <!--<div class="actions">
                                            <div class="btn-group btn-group-devided" data-toggle="buttons">
                                                <label class="btn btn-transparent red btn-outline btn-circle btn-sm active">
                                                    <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                                <label class="btn btn-transparent red btn-outline btn-circle btn-sm">
                                                    <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                                            </div>
                                        </div>-->
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
													<th> Client Name </th>
                                                    
													<th> Client Phone No.</th>
													<th>Client Address</th>
													<th> Ref Name </th>
                                                    
													<th> Ref Phone No.</th>
													<th > Remarks</th>
													<th> Created By </th>
													<th> Modified By </th>
                                                    <th> Action </th>
                                                </tr>
                                            </thead>
                                            <tbody>
											    <tr id="lead_add_row" name="lead_add_row" style="display:none;">
												<form method="post" action="#" id="leadAddForm" name="leadAddForm">
                                                    <td> <input type="text" id="client_name" name="client_name"/></td>
                                                    <td> <input type="text" id="client_phone_no" name="client_phone_no"/></td>
													<td> <input type="text" id="client_address" name="client_address"/></td>
                                                    <td> <input type="text" id="ref_name" name="ref_name"/></td>
													<td> <input type="text" id="ref_phone_no" name="ref_phone_no"/> </td>
                                                    <td> <input type="text" id="remarks" name="remarks"/> </td>
													<td> <input type="text" id="ref_phone_no" name="ref_phone_no"/> </td>
                                                    <td> <input type="text" id="remarks" name="remarks"/> </td>
													</form>
                                                    <td>
                                                        <a class="" href="#" onclick="add_lead();"> Save </a>
														<a class="" href="#" onclick="cancel_policy();"> Cancel </a>
                                                    </td>
                                                    
                                                </tr>
												<?php 
												$i=1;
												if(isset($lead_data)){
												$lead_data=json_decode($lead_data);
												foreach($lead_data as $lead_val){
												
												?>
                                                <tr>
                                                    <td> <?php echo strtoupper($lead_val->client_name);?></td>
                                                    <td><?php echo $lead_val->client_phone_no;?></td>
                                                    <td> <?php echo strtoupper($lead_val->client_address);?>  </td>
                                                    <td><?php echo strtoupper($lead_val->ref_name);?>  </td>
													<td> <?php echo $lead_val->ref_phone_no;?> </td>
                                                    <td><a class=""  href="#" onclick="open_view_modal(<?php echo $i;?>);"> View </a><input type="hidden" id="hidden_lead_id<?php echo $i;?>" name="hidden_lead_id<?php echo $i;?>" value="<?php echo $lead_val->id;?>"></td>
													<td><?php echo strtoupper($lead_val->creator_type);?>  </td>
													<td> <?php echo strtoupper($lead_val->modifier_type);?> </td>
                                                    <td>
                                                        <a class="" href="javascript:;"> Edit </a>
														<a class="" href="javascript:;"> Delete </a>
                                                    </td>
                                                    
                                                </tr>
												<?php $i++;}}?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
                        </div>
                    </div>
					  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Remarks</h4>
        </div>
		<div class="modal-body">
        <form action="addRemark" method="post" name="theForm" data-parsley-validate >
		<input type="hidden" id="lead_id" name="lead_id" />
										<div class="form-group">
											<label for="reminder">Reminder</label>
											<input type="text" name="reminder" parsley-trigger="reminder"  class="form-control" id="view_name" value="" />
										</div>
										<div class="form-group">
											<label for="reminder">Meet On</label>
											<input type="date" name="met_on" parsley-trigger="reminder"  class="form-control" id="met_on" value="" />
										</div>
										<div class="form-group">
											<label for="reminder">Remark</label>
											<textarea  name="remark" parsley-trigger="reminder"  class="form-control" id="remark" ></textarea>
										</div>
										<div class="form-group text-right m-b-0">
											<button type="submit"  class="btn btn-default waves-effect waves-light m-l-5">
												Submit
											</button>
										</div>
									</form>
									</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="myTableModal" role="dialog">
    <div class="modal-dialog" >
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">View Remarks</h4>
        </div>
		<div class="modal-body" id="show_remark_data" name="show_remark_data">
        
									</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
function add_new_lead(){
$('#lead_add_row').show();	
}
function add_lead(){
$('#leadAddForm').submit();	
}
function cancel_lead(){
window.location.reload();	
					}
function cal_gross_premium(){
var amount=$('#amount').val();
var gst=$('#gst').val();
if(gst){
var gst_amount=(amount*(gst/100));
var gross_premium=parseFloat(amount)+parseFloat(gst_amount);
$('#gross_premium').val(gross_premium);
}
else{
$('#gross_premium').val("");	
}
}
function open_add_modal(index){
var lead_id=$('#hidden_lead_id'+index).val();		
$('#lead_id').val(lead_id);	
//alert(lead_id);exit;
$('#myModal').modal('show');
}
function open_view_modal(index){
var lead_id=$('#hidden_lead_id'+index).val();
//alert(lead_id);				
$.ajax({
type: "POST",
evalScripts: true,
url: '<?php echo $this->Url->build('/admin/leads/view_remark', true);  ?>',
data: ({lead_id:lead_id}),
success: function (data){
//alert(data);exit;
$('#show_remark_data').html();
$('#show_remark_data').html(data);
$('#myTableModal').modal('show');
				
}
});
}
</script>