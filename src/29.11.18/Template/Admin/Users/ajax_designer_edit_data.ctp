                                <div class="col-lg-12" id="viewedit_show_data" name="viewedit_show_data">
								<div class="card-box">
									<h4 class="m-t-0 header-title"><b>Designer Edit</b></h4>
									<p class="text-muted font-13 m-b-30">
	                                </p>
									<form action="edit_designer_data" method="post" name="theEditForm" 
									id="theEditForm" data-parsley-validate enctype="multipart/form-data">
									    <?php 
										$designer_data= json_decode($designer_data);
										?>
										<input type="hidden" name="edit_user_id" parsley-trigger="change"  class="form-control" id="edit_user_id" value="<?php echo $designer_data->id;?>" />
										<div class="form-group">
											<label for="edit_fname">Designer First Name*</label>
											<input type="text" name="edit_fname" parsley-trigger="change"  class="form-control" id="edit_fname" value="<?php echo $designer_data->fname;?>" required="required" onkeypress='return ValidateAlpha(event)'/>
											<span id="error_edit_fname" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="edit_lname">Designer Last Name*</label>
											<input type="text" name="edit_lname" parsley-trigger="change" class="form-control" id="edit_lname" value="<?php echo $designer_data->lname;?>"  required="required" onkeypress='return ValidateAlpha(event)' />
											<span id="error_edit_lname" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="edit_username">Designer Email*</label>
											<input type="text" name="edit_username" parsley-trigger="change" class="form-control" id="edit_username" value="<?php echo $designer_data->username;?>"   onblur="validateEmail(this);" required="required"/>
											<span id="error_edit_username" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="edit_phone_number">Designer Phone Number*</label>
											<input type="text" name="edit_phone_number" parsley-trigger="change" class="form-control" id="edit_phone_number" value="<?php echo $designer_data->phone_number;?>" required="required" maxlength=10 onkeypress='return isNumberKey(event)' />
											<span id="error_edit_phone_number" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="edit_address">Designer Address*</label>
											<textarea  name="edit_address" parsley-trigger="change" class="form-control" id="edit_address" required="required"><?php echo $designer_data->address;?></textarea>
											<span id="error_edit_address" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="edit_pswd_token">Designer Password*</label>
											<input  name="edit_pswd_token" id="edit_pswd_token" type="text"  class="form-control" value="<?php echo $designer_data->pswd_token;?>" required="required">
											<span id="error_edit_pswd_token" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label >Designer Image</label>
											<input  name="edit_image" id="edit_image" type="file"  class="form-control" value="" required="required"/>
											<?php echo $this->Html->image("medium/".$designer_data->image, ['alt' => 'Shoe','class'=>'logo-default']);?>
											<span id="error_edit_image" style="color:#C00;"></span>
										</div>
										<div class="form-group text-right m-b-0">
										    <p>* Required Fields</p>
											<button class="btn btn-primary waves-effect waves-light" type="button" onclick="update_data()">
												Submit
											</button>
											<button type="reset" onclick="goBack()" class="btn btn-default waves-effect waves-light m-l-5">
												Cancel
											</button>
										</div>
									</form>
								    </div> 
							    </div>
								
<script>
function update_data(){
	var fname=$('#edit_fname').val();
	var lname=$('#edit_lname').val();
	var username=$('#edit_username').val();
    var phone_number=$('#edit_phone_number').val();
	var address=$('#edit_address').val();
	var pswd_token=$('#edit_pswd_token').val();
	//var image=$('#edit_image').val();
	if(fname=='' || fname==null){
		$("#error_edit_fname").html("Please Enter First Name");
		$("#edit_fname").focus();
	}
	else if(lname=='' || lname==null){
		$("#error_edit_fname").hide();
		$("#error_edit_lname").html("Please Enter Last Name");
		$("#edit_lname").focus();
	}
	else if(username=='' || username==null){
		$("#error_edit_lname").hide();
		$("#error_edit_uaername").html("Please Enter An Email Id");
		$("#edit_username").focus();
	}
	 else if(phone_number=='' || phone_number==null){
		$("#error_edit_username").hide();
		$("#error_edit_phone_number").html("Please Enter A  Phone Number");
		$("#edit_phone_number").focus();
	}
	else if(address=='' || address==null){
		$("#error_edit_phone_number").hide();
		$("#error_edit_address").html("Please Enter An Address");
		$("#edit_address").focus();
	}
	else if(pswd_token=='' || pswd_token==null){
		$("#error_edit_address").hide();
		$("#error_edit_pswd_token").html("Please Enter A Password");
		$("#edit_pswd_token").focus();
	}
	/*else if(image=='' || image==null){
		$("#error_edit_pswd_token").hide();
		$("#error_edit_image").html("Please Upload An Image");
		$("#edit_image").focus();
	}*/
	else{
		  $("#error_edit_pswd_token").hide();	
	   document.getElementById("theEditForm").submit();
	  }
	  }
function goBack() {
    window.history.back();
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
			$('#edit_username').val("");
            return false;
        }

        return true;

}	
</script>
<?php exit;?>