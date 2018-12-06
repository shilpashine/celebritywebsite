                                <div class="col-lg-12" id="viewedit_show_data" name="viewedit_show_data">
								 <div class="portlet light portlet-fit portlet-form bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class=" icon-layers font-green "></i>
                                            <span class="caption-subject font-green sbold uppercase">Edit Celebrity</span>
                                        </div>
                                       
                                    </div>
                                    <div class="portlet-body">
                                        <!-- BEGIN FORM-->
                                        <form action="updateData" id="form_sample_2" method="post" enctype="multipart/form-data"> 
                                             <?php 
										$staff_data= json_decode($data_all_event);
                                                                                
                                                                                $dob=explode('T',$staff_data->publish_date);
                                                                              //  pr($staff_data);exit;
                                                                                $arr1=array();
                                                                               
                                                                             
										?>
                     <input type="hidden" name="edit_user_id" parsley-trigger="change"  class="form-control" id="edit_user_id" value="<?php echo $staff_data->id;?>" />

                                            <div class="form-body">
                                                <div class="form-group form-md-line-input">
                                                    <input type="text" class="form-control" name="news_title" required=""  value="<?php echo $staff_data->news_title;?>" id="form_control_1" placeholder="Enter your Name">
                                                    <label for="form_control_1"> News Title
                                                        <span class="required">*</span>
                                                    </label>
                                                    <span class="help-block">Enter your News Title...</span>
                                                </div>
                                                <div class="form-group form-md-line-input">
                                                    <textarea class="form-control" id="form_control_1" name="news_description" required=""><?php echo $staff_data->news_description;?></textarea>
                                                    
                                                </div>
                                               
                                              
                                                <div class="form-group form-md-line-input">
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                        <input type="text" class="form-control date-picker" value="<?php echo $dob[0];?>" name="publish_date" placeholder="Enter publish Date" >
                                                        <label for="form_control_1">Publish Date</label>
                                                    </div>
                                                </div>
                                               <div class="form-group">
                                                        <label class="control-label col-md-6">Select  Celebrity
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="form-group form-md-line-input">
                                                            
                                                              <?php $arr1=array();   foreach($staff_data->news_celebrities as $val){
                                                                                    
                                                                          array_push($arr1, $val->celebrity_id);
                                                                                    
                                                                                }  
                                                                                
                                                                          //     pr($arr1);exit;
                                                                                ?>
                                                            
                                                            
                                                            
                                                           <?php  //pr($celebrity_datas);exit; ?>
                                                            <select class="form-control" name="event_celebrity[]" multiple required="" >

                                                           <?php      if(isset($celebrity_datas)){

                                                                        $cel_datas11=json_decode($celebrity_datas);
                                                                     // pr($cel_datas11);exit;
                                                                        foreach($cel_datas11 as $cel_datas11){

                                                                                                        ?>


                                                                <option value="<?php echo $cel_datas11->celebrity_detail->id;?>" <?php if(in_array($cel_datas11->celebrity_detail->id,$arr1)){ echo 'selected'; } else{ } ?>><?php echo $cel_datas11->celebrity_detail->name;?></option>
                                                                <?php  }  }
                                                                                                    ?>

                                                            </select>
                                                             </div>
                                                    </div>
                                               
                                               
                                                 <div class="form-group">
                                                    <label class="control-label col-md-6">Select News Images
                                                        <span class="required"> * </span>
                                                    </label>
                                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="input-group input-large">
                                                               
                                                                <span class="input-group-addon btn default btn-file">
                                                                 
                                                                   
                                                                    <input type="file" name="image[]" multiple="" >  <?php     foreach($staff_data->news_photos as $val){
                                                                                    
                                                                          
                                                                                ?>
                                                                    <div id="image_id<?php echo $val->id;?>">
                                                                    <div class="col-md-4">
                                                                      
                                                                    <?php  echo $this->Html->image("medium/".$val->image, ['alt' => 'event','class'=>'logo-default','height'=>'40px','width'=>'80px']);?>
                                                                        <i class="fa fa-window-close" aria-hidden="true" onclick="delete_div('<?php echo $val->id;?>')"></i>
                                                                    </div>
                                                                    </div>
                                                                <?php  }  
                                                                                
                                                                           //     pr($arr1);exit;
                                                                               
                                                                ?></span>
                                                                   </div>
                                                        </div>
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
                                        <!-- END FORM-->
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
  });
 
</script>
<?php exit;?>