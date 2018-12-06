                                <div class="col-lg-12" id="viewedit_show_data" name="viewedit_show_data">
								<div class="portlet light portlet-fit portlet-form bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class=" icon-layers font-green "></i>
                                            <span class="caption-subject font-green sbold uppercase">Edit Category</span>
                                        </div>
                                       
                                    </div>
                                    <div class="portlet-body">
									
                                        
                                        
                                        
                                            <form action="update_data" id="form_sample_2" method="post" enctype="multipart/form-data">
                                            <div class="form-body">
                                                <?php 
										$staff_data= json_decode($staff_data);
                                                                               // $category_datas11= json_decode($category_datas11);
                                                                                
                                                                              
										?>
										<input type="hidden" name="edit_user_id" parsley-trigger="change"  class="form-control" id="edit_user_id" value="<?php echo $staff_data->id;?>" />
										
                                                <div class="form-group form-md-line-input">
                                                    <input type="text" class="form-control" name="category_name" id="form_control_1" placeholder="Enter Category Name" value="<?php echo $staff_data->category_name;?>">
                                                    <label for="form_control_1">Category Name
                                                        <span class="required">*</span>
                                                    </label>
                                                    <span class="help-block"> Category Name...</span>
                                                </div>
                                                <div class="form-group form-md-line-input">
                                                    <input type="text" class="form-control" name="slug" id="form_control_1" placeholder="Enter Slug" value="<?php echo $staff_data->slug;?>"  required="required" onkeypress='return ValidateAlpha(event)'>
                                                    <label for="form_control_1">Category Slug
                                                        <span class="required">*</span>
                                                    </label>
                                                    <span class="help-block">Enter Category Slug...</span>
                                                </div>
                                                                                
                                                                                
                                                                                 <div class="form-group form-md-line-input">
                                                    <select class="form-control" name="parent_id">
                                                         <option value="0">Select</option>
                                                        <?php 
                                                        if(isset($category_datas11)){
							$category_datas11=json_decode($category_datas11);
                                                        
                                                        foreach($category_datas11 as $category_datas){ ?>
                                                       
                                                        <option value="<?php echo $category_datas->id;?>" <?php if($staff_data->parent_id==$category_datas->id){ echo 'selected'; } ?>><?php echo $category_datas->category_name;?></option>
                                                        <?php }} ?>
                                                        
                                                    </select>
                                                    <label for="form_control_1">Select Parent Category</label>
                                                  
                                                </div>
                                                                           
                                                <div class="form-group form-md-line-input">
                                                    <textarea class="form-control" id="form_control_1" name="description"><?php echo $staff_data->description;?> </textarea>  
                                                    <label for="form_control_1">Description
                                                        <span class="required">*</span>
                                                    </label>
                                                    <span class="help-block">Please enter Description...</span>
                                                </div>
                                                
                                                  
                                            <div class="form-actions">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <input type="submit" class="btn green" name="submit" value="Submit"/>
                                                        <button type="reset" class="btn default">Reset</button>
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
    $(".date-picker").datepicker();
  });
  
</script>
<?php exit;?>