
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                  
                     <div class="portlet light form-fit">
                                    
                                       
                                        <div class="actions">
                                            <div class="btn-group btn-group-devided" data-toggle="buttons">
                                               
                                                 <button type="button" class="btn green" onclick="cancel_policy()">ADD NEW</button>
                                                <?php echo $this->Flash->render('flash'); ?>
                                            </div>
                                        </div>
                                  
                                  
                                </div>
                      
                        <div class="row">
                           <div class="col-md-6" id="show_data">
                                <!-- BEGIN VALIDATION STATES-->
                                <div class="portlet light portlet-fit portlet-form bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class=" icon-layers font-green "></i>
                                            <span class="caption-subject font-green sbold uppercase">Add Category</span>
                                        </div>
                                       
                                    </div>
                                    <div class="portlet-body">
                                        <!-- BEGIN FORM-->
                                        <form action="#" id="form_sample_2" method="post" enctype="multipart/form-data">
                                            <div class="form-body">
                                                <div class="form-group form-md-line-input">
                                                    <input type="text" class="form-control" name="category_name" id="form_control_1" placeholder="Enter Category Name" value="">
                                                    <label for="form_control_1">Category Name
                                                        <span class="required">*</span>
                                                    </label>
                                                    <span class="help-block">Enter Category Name...</span>
                                                </div>
                                               
                                                 <div class="form-group form-md-line-input">
                                                    <select class="form-control" name="parent_id">
                                                         <option value="0">Select</option>
                                                        <?php 
                                                        if(isset($category_datas11)){
							$category_datas11=json_decode($category_datas11);
                                                        foreach($category_datas11 as $category_datas){ ?>
                                                       
                                                        <option value="<?php echo $category_datas->id;?>"><?php echo $category_datas->category_name;?></option>
                                                        <?php }} ?>
                                                        
                                                    </select>
                                                    <label for="form_control_1">Select Parent Id</label>
                                                    <span class="help-block">Some help goes here...</span>
                                                </div>
                                                
                                                  <div class="form-group form-md-line-input">
                                                    <input type="text" class="form-control" name="slug" id="form_control_1" placeholder="Enter Category Name" value="">
                                                    <label for="form_control_1">Category Slug
                                                        <span class="required">*</span>
                                                    </label>
                                                    <span class="help-block">Enter Category Slug...</span>
                                                </div>
                                                  <div class="form-group form-md-line-input">
                                                    <textarea class="form-control" id="form_control_1" name="description"> </textarea>
                                                      <label for="form_control_1">Category Description</label>
                                                    
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
                                <!-- END VALIDATION STATES-->
                            </div>
                            <div class="col-md-6">
                                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                <div class="portlet box green">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-globe"></i>Category Listing </div>
                                        <div class="tools"> </div>
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_4">
                                            <thead>
                                                <tr>
                                                    <th class="all">Category name</th>
                                                     <th class="min-phone-l">Category Slug</th>
                                                  <th class="min-phone-l">Category Description</th>
                                                   <th class="min-phone-l">Category ParentID</th>
                                                     <th class="desktop">Action</th>
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
												<?php 
												if(isset($data_all)){
                                                                                                  
												$data_all=json_decode($data_all);
                                                                                                
                                                                                                     
                                                                                              
												foreach($data_all as $category_datas){
												
												?>
                                                <tr>
                                                    <td><?php echo $category_datas->category_name;?> </td>
                                                    
                                                    <td><?php echo $category_datas->slug;?></td>
                                                    <td><?php echo $category_datas->description;?></td>
                                                    <td>  <?php  echo $parent_id = json_decode($this->requestAction('admin/categories/parent_index/'.$category_datas->parent_id));
                                                  //echo json_decode($parent_id);
                                                  
                                                    ?>
                                                    </td>
                                               <td>
                                                       
                                                            <a title="View" onclick="edit_data(<?php echo $category_datas->id;?>)" href="#"><i class="fa fa-eye">Edit</i></a>
                                                          
                                                   <br/>
                                                        <a href="javascript:;">
                                                           <a href="delete_data/<?php echo $category_datas->id;?> ">  <i class="fa fa-trash"></i> Delete </a>
                                                     <br/>
                                                     <?php if($category_datas->status=='1'){ ?>
                                                        <a href="change_status/<?php echo $category_datas->id;?> ">
                                                            <i class="fa fa-check" style="color:green"></i> Status </a>
                                                            
                                                            
                                                     <?php }else{  ?>
                                                         
                                                          <a href="visitors/change_status/<?php echo $category_datas->id;?> ">
                                                            <i class="fa fa-ban"  style="color:red"></i> Status </a>
                                                         
                                                         
                                                   <?php  } ?>
                                                  
                                                 </td>
                                                </tr>
                                                                                                <?php }} ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
                        </div>
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
                <!-- BEGIN QUICK SIDEBAR -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

                <script type="text/javascript">
                    function edit_data(user_id){
                    //alert(user_id);
                    $.ajax({
				type: "POST",
				evalScripts: true,
				url: '<?php echo $this->Url->build('/admin/categories/ajax_customer_edit_data', true);  ?>',
				data: ({id:user_id}),
				success: function (data){
                                   //  alert(data);
				$('#show_data').html(data);
				}
		    });
                    
                    
		
	  }	
          $(document).ready(function(){
    $('.date-picker').datepicker({
              endDate: '+0d',
    format: 'yyyy-mm-dd'
    
});
  } );
      function cancel_policy(){
		window.location.reload();	
			}              
  function add_new_cat(){
     window.location.reload();
    }
                    
                    </script>