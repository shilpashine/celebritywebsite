                                <div class="container">
        						<!-- Page-Title -->
        						<div class="row">
        							<div class="col-sm-12">
                                        <!--<div class="btn-group pull-right m-t-15">
                                            <button type="button" class="btn btn-white dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i class="fa fa-cog"></i></span></button>
                                            <ul class="dropdown-menu drop-menu-right dropdown-menu-animate" role="menu">
                                                <li><a href="#">Action</a></li>
                                                <li><a href="#">Another action</a></li>
                                                <li><a href="#">Something else here</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Separated link</a></li>
                                            </ul>
                                        </div>-->

        								<h4 class="page-title">Supplier</h4>
        								<!--<ol class="breadcrumb">
        									<li>
        										<a href="#">Ubold</a>
        									</li>
        									<li>
        										<a href="#">Tables</a>
        									</li>
        									<li class="active">
        										Datatable
        									</li>
        								</ol>-->
        							</div>
        						</div>
						    <div class="row">
							<div class="col-lg-6" id="show_data" name="show_data">
								<div class="card-box">
									<h4 class="m-t-0 header-title"><b>Supplier Add</b></h4>
									<p class="text-muted font-13 m-b-30">
	                                </p>
									<form action="add_supplier_data" method="post" name="theAddForm" id="theAddForm"data-parsley-validate enctype="multipart/form-data" >
									    <div class="form-group">
											<label for="fname">Supplier First Name*</label>
											<input type="text" name="fname" parsley-trigger="change" required class="form-control" id="fname" value="" onkeypress='return ValidateAlpha(event)' />
											<span id="error_fname" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="lname">Supplier Last Name*</label>
											<input type="text" name="lname" parsley-trigger="change" required class="form-control" id="lname" value="" onkeypress='return ValidateAlpha(event)' />
											<span id="error_lname" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="username">Supplier Email*</label>
											<input type="text" name="username" parsley-trigger="change" required class="form-control" id="username" value="" onblur="validateEmail(this);" />
											<span id="error_username" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="phone_number">Supplier Phone Number*</label>
											<input type="text" name="phone_number" parsley-trigger="change" required class="form-control" id="phone_number" value="" maxlength=10 onkeypress='return isNumberKey(event)' />
											<span id="error_phone_number" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="address">Supplier Address*</label>
											<textarea  name="address" parsley-trigger="change" required class="form-control" id="address" value=""></textarea>
											<span id="error_address" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="pswd_token">Supplier Password*</label>
											<input  name="pswd_token" id="pswd_token" type="text" required class="form-control" value="" required="required">
											<span id="error_pswd_token" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="image">Supplier Image*</label>
											<input  name="image" id="image" type="file"  class="form-control" value="" />
											<span id="error_image" style="color:#C00;"></span>
										</div>
										<div class="form-group text-right m-b-0">
										   <p>* Required Fields</p>
											<button class="btn btn-primary waves-effect waves-light" type="button" onclick="save_data()">
												Submit
											</button>
										</div>
									</form>
								</div> 
							</div>
						<!--</div>-->		
                        <!--<div class="row">-->
                            <div class="col-sm-6">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>Supplier List</b></h4>
                                    <p class="text-muted font-13 m-b-30">
									<button class="btn btn-default waves-effect waves-light" type="button" onclick="add_data()">
									Add Supplier
									</button>
                                    </p>
									<?php echo $this->Flash->render();?>
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Supplier Name</th>
                                                <th>Supplier Email</th>
                                                <th>Created</th>
                                                <th>Modified</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										       <?php 
												$supplier_data= json_decode($supplier_data);
												if(!empty($supplier_data)){
												foreach($supplier_data as $supplier_data_val){
												?>
                                            <tr>
                                                <td><?php echo $supplier_data_val->fname." ".$supplier_data_val->lname;?></td>
                                                <td><?php echo $supplier_data_val->username;?></td>
                                                <td><?php echo $supplier_data_val->created;?></td>
                                                <td><?php echo $supplier_data_val->modified;?></td>
                                                <td>
												<a title="View" onclick="view_data(<?php echo $supplier_data_val->id;?>)" href="#"><i class="fa fa-eye"></i></a>
												<a title="Edit" onclick="edit_data(<?php echo $supplier_data_val->id;?>)" href="#"><i class="fa fa-edit"></i></a>
												<a title="Delete" href="<?php echo $this->Url->build('/admin/users/delete_data/', true).$supplier_data_val->id ; ?>"><i class="fa fa-trash-o"></i></a>
												<a title="Status" href="<?php echo $this->Url->build('/admin/users/change_status/', true).$supplier_data_val->id; ?>"> <?php if($supplier_data_val->status==1){echo $this->Html->image("/img/test-pass-icon.png"); } else{ echo $this->Html->image("/img/warning.png");}?></a>
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
function save_data(){
	var fname=$('#fname').val();
	var lname=$('#lname').val();
	var username=$('#username').val();
    var phone_number=$('#phone_number').val();
	var address=$('#address').val();
	var pswd_token=$('#pswd_token').val();
	var image=$('#image').val();
	if(fname=='' || fname==null){
		$("#error_fname").html("Please Enter First Name");
		$("#fname").focus();
	}
	else if(lname=='' || lname==null){
		$("#error_fname").hide();
		$("#error_lname").html("Please Enter Last Name");
		$("#lname").focus();
	}
	else if(username=='' || username==null){
		$("#error_lname").hide();
		$("#error_username").html("Please Enter An Email Id");
		$("#username").focus();
	}
	 else if(phone_number=='' || phone_number==null){
		$("#error_username").hide();
		$("#error_phone_number").html("Please Enter A  Phone Number");
		$("#phone_number").focus();
	}
	else if(address=='' || address==null){
		$("#error_phone_number").hide();
		$("#error_address").html("Please Enter An Address");
		$("#address").focus();
	}
	else if(pswd_token=='' || pswd_token==null){
		$("#error_address").hide();
		$("#error_pswd_token").html("Please Enter A Password");
		$("#pswd_token").focus();
	}
	else if(image=='' || image==null){
		$("#error_pswd_token").hide();
		$("#error_image").html("Please Upload An Image");
		$("#image").focus();
	}
	else{
		  $("#error_image").hide();	
		  document.getElementById("theAddForm").submit();
	  }
	}					
function view_data(user_id){
		 $.ajax({
        type: "POST",
        evalScripts: true,
        url: '<?php echo $this->Url->build('/admin/users/view_supplier_data', true);  ?>',
        data: ({id:user_id}),
        success: function (data){
		$('#show_data').html(data);
		}
		});
	  }	
function edit_data(user_id){
		 $.ajax({
				type: "POST",
				evalScripts: true,
				url: '<?php echo $this->Url->build('/admin/users/ajax_supplier_edit_data', true);  ?>',
				data: ({id:user_id}),
				success: function (data){
				$('#show_data').html(data);
				}
		    });
	  }	
function add_data(){
	   window.location.reload();
	  }
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
function ValidateAlpha(evt)
    {
        var keyCode = (evt.which) ? evt.which : evt.keyCode
        if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)
         
        return false;
            return true;
    }
function validateEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        if (reg.test(emailField.value) == false) 
        {
            alert('Invalid Email Address');
			$('#username').val("");
            return false;
        }
        return true;
}	  
</script>	  