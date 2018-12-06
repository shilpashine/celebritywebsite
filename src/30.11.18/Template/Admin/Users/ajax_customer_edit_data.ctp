                                <div class="col-lg-12" id="viewedit_show_data" name="viewedit_show_data">
								<div class="portlet light portlet-fit portlet-form bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class=" icon-layers font-green "></i>
                                            <span class="caption-subject font-green sbold uppercase">Add Event Organizer</span>
                                        </div>
                                       
                                    </div>
                                    <div class="portlet-body">
									
                                        
                                        
                                        
                                            <form action="update_data11" id="form_sample_2" method="post" enctype="multipart/form-data">
                                            <div class="form-body">
                                                <?php 
										$staff_data= json_decode($staff_data);
                                                                                
                                                                                $dob=explode('T',$staff_data->dob);
                                                                              //  pr($staff_data);exit;
										?>
										<input type="hidden" name="edit_user_id" parsley-trigger="change"  class="form-control" id="edit_user_id" value="<?php echo $staff_data->id;?>" />
										
                                                <div class="form-group form-md-line-input">
                                                    <input type="text" class="form-control" name="fname" id="form_control_1" placeholder="Enter your fname"  value="<?php echo $staff_data->fname;?>" required="required" onkeypress='return ValidateAlpha(event)'>
                                                    <label for="form_control_1">First Name
                                                        <span class="required">*</span>
                                                    </label>
                                                    <span class="help-block">Enter your First Name...</span>
                                                </div>
                                                <div class="form-group form-md-line-input">
                                                    <input type="text" class="form-control" name="lname" id="form_control_1" placeholder="Enter your lname" value="<?php echo $staff_data->lname;?>"  required="required" onkeypress='return ValidateAlpha(event)'>
                                                    <label for="form_control_1">Last Name
                                                        <span class="required">*</span>
                                                    </label>
                                                    <span class="help-block">Enter your Last name...</span>
                                                </div>
                                                <div class="form-group form-md-line-input">
                                                    <input type="email" class="form-control" id="form_control_1" name="email" placeholder="Enter your email" value="<?php echo $staff_data->email;?>"   required="required">
                                                    <label for="form_control_1">Email
                                                        <span class="required">*</span>
                                                    </label>
                                                    <span class="help-block">Please enter your email...</span>
                                                </div>
                                                                                  <div class="form-group form-md-line-input">
                                                    <input type="email" class="form-control" id="form_control_1" name="username" placeholder="Enter your username" value="<?php echo $staff_data->username;?>"   onblur="validateEmail(this);" required="required">
                                                    <label for="form_control_1">Username
                                                        <span class="required">*</span>
                                                    </label>
                                                    <span class="help-block">Please enter your Username...</span>
                                                </div>
                                                
                                                
                                                  <div class="form-group form-md-line-input">
                                                    <input type="password" class="form-control" id="form_control_1" name="password" placeholder="Enter your password" value="<?php echo $staff_data->pswd_token;?>">
                                                    <label for="form_control_1">Password
                                                        <span class="required">*</span>
                                                    </label>
                                                    <span class="help-block">Please enter your password...</span>
                                                </div>
                                                
                                                <div class="form-group form-md-line-input">
                                                    <input type="number" class="form-control" id="form_control_1" name="phone_no" placeholder="Enter phone number" value="<?php echo $staff_data->phone_number;?>">
                                                    <label for="form_control_1">Phone No</label>
                                                </div>
                                                <div class="form-group form-md-line-input">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                        <input type="text" class="form-control form-control-inline input-medium date-picker" name="dob11" placeholder="Enter Dob" value="<?php if(!empty($dob[0])) { echo $dob[0]; }?>" >
                                                        <label for="form_control_1">Date OF Birth</label>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group form-md-line-input">
                                                    <div class="input-group">
                                                        <select name="gendar" class="form-control">
                                                            <option value="1" <?php if($staff_data->gender=='1'){ echo 'selected';  }?>>MALE</option>
                                                               <option value="2" <?php if($staff_data->gender=='2'){ echo 'selected';  }?>>FEMALE</option>
                                                        </select>
                                                        <br/>
                                                          <label for="form_control_1"> Gender</label>
                                                        
                                                    </div>
                                                </div>
                                                <div class="form-group form-md-line-input">
                                                    <textarea class="form-control" id="form_control_1" name="description"> <?php echo $staff_data->description;?></textarea>
                                                      <label for="form_control_1">Description</label>
                                                    
                                                </div>
                                                <div class="form-group form-md-line-input">
                                                    <textarea class="form-control" id="form_control_1" name="address"> <?php echo $staff_data->address;?></textarea>
                                                      <label for="form_control_1">Enter Address</label>
                                                    
                                                </div>
                                                  <div class="form-group form-md-line-input">
                                                      <input class="form-control" id="form_control_1" name="image" type="file">
                                                      <?php if(!empty($staff_data->image)){ ?>
                                                      <?php echo $this->Html->image("medium/".$staff_data->image, ['alt' => 'event','class'=>'logo-default']);?>
                                                      <?php } ?>
                                                      <label for="form_control_1"> Photo</label>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="submit" class="btn green" name="submit" value="Submit"/>
                                                        <button type="reset" class="btn default" onclick="cancel_policy()">Reset</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        
                                        
								    </div> 
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

 $(document).ready(function(){
    $('.date-picker').datepicker({
              endDate: '+0d',
    format: 'yyyy-mm-dd'
    
});
  } );
  
</script>
<?php exit;?>