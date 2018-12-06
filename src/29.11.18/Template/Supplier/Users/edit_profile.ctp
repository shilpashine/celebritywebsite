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
                                <h4 class="page-title">Supplier Profile</h4>
                                <!--<ol class="breadcrumb">
                                    <li><a href="#">Ubold</a></li>
                                    <li><a href="#">Forms</a></li>
                                    <li class="active">Form Validation</li>
                                </ol>-->
                            </div>
                        </div>
                        <div class="row">
							<div class="col-lg-12">
								<div class="card-box">
									<h4 class="m-t-0 header-title"><b>Profile Edit</b></h4>
									<p class="text-muted font-13 m-b-30">
	                                </p>
									<form action="#" method="post" name="theEditForm" id="theEditForm" data-parsley-validate enctype="multipart/form-data" >
									          <?php 
												$user_data= json_decode($user_data);
												//pr($user_data);
												?>
										<input type="hidden" name="edit_user_id" parsley-trigger="change"  class="form-control" id="user_id" value="<?php echo $user_data->id;?>" />		
										<div class="form-group">
											<label for="fname">First Name*</label>
											<input type="text" name="fname" parsley-trigger="change"  class="form-control" id="fname" value="<?php echo $user_data->fname ;?>" required="required"  onkeypress='return ValidateAlpha(event)'/>
											<span id="error_fname" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="lname">Last Name*</label>
											<input type="text" name="lname" parsley-trigger="change"  class="form-control" id="lname" value="<?php echo $user_data->lname ;?>" required="required" onkeypress='return ValidateAlpha(event)'/>
											<span id="error_lname" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="username">Email Id*</label>
											<input type="text" name="username" parsley-trigger="change"  class="form-control" id="username" value="<?php echo $user_data->username ;?>" required="required" onblur="validateEmail(this);"/>
											<span id="error_username" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="phone_number">Phone Number*</label>
											<input type="text" name="phone_number" parsley-trigger="change" class="form-control" id="phone_number" value="<?php echo $user_data->phone_number;?>" required="required" maxlength=10 onkeypress='return isNumberKey(event)' />
											<span id="error_phone_number" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="address">Address*</label>
											<textarea  name="address" parsley-trigger="change" class="form-control" id="address" required="required"><?php echo $user_data->address;?></textarea>
											<span id="error_address" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="pswd_token">Password*</label>
											<input  name="pswd_token" id="pswd_token" type="text"  class="form-control" value="<?php echo $user_data->pswd_token ;?>" required="required">
											<span id="error_pswd_token" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="image">Image</label>
											<input  name="image" id="image" type="file"  class="form-control" />
											<?php echo $this->Html->image("medium/".$user_data->image, ['alt' => 'Shoe','class'=>'logo-default']);?>
										</div>
										<div class="form-group text-right m-b-0">
											<button class="btn btn-primary waves-effect waves-light" type="button" onclick="save_profile_data()">
												Submit
											</button>
										</div>
									</form>
								</div> 
							</div>
						</div>
            		</div>
<script>
function save_profile_data(){
    var fname=$('#fname').val();
	var lname=$('#lname').val();
	var username=$('#username').val();
    var phone_number=$('#phone_number').val();
	var address=$('#address').val();
	var pswd_token=$('#pswd_token').val();
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
		$("#error_uaername").html("Please Enter An Email Id");
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
	else{
		  $("#error_pswd_token").hide();	
	   document.getElementById("theEditForm").submit();
	  }	
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
					