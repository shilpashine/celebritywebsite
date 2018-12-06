                                <div class="col-lg-12">
								<div class="card-box">
									<h4 class="m-t-0 header-title"><b>Product Edit</b></h4>
									<p class="text-muted font-13 m-b-30">
	                                </p>
									<form action="edit_data" method="post" name="theEditForm" 
									id="theEditForm" data-parsley-validate enctype="multipart/form-data">
									    <?php 
										$category_data= json_decode($category_data);
										$product_data= json_decode($product_data);
										//pr($parent_data);
										//echo($parent_data[0]->parent_id);exit;
										?>
										<input type="hidden" name="edit_product_id" parsley-trigger="change"  class="form-control" id="edit_product_id" value="<?php echo $product_data->id;?>" />
										<div class="form-group">
											<label for="edit_category_id">Category</label>
											<select name="edit_category_id" parsley-trigger="change"  class="form-control" id="edit_category_id" required="required">
											<option value="0">--Select An Option--</option>
											<?php for($i=0;$i<count($category_data);$i++) {
											?>
											<option value="<?php echo $category_data[$i]->id;?>" <?php if($category_data[$i]->id==$product_data->category_id){echo "selected";}?>><?php echo $category_data[$i]->category_name;?></option>
										    <?php }?>
											</select>
											<span id="error_edit_category_id" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="edit_product_code">Product Code*</label>
											<input type="input" id="edit_product_code" name="edit_product_code" class="form-control" value="<?php echo $product_data->product_code;?>" readonly />
											<span id="error_product_code" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="edit_name">Product Name*</label>
											<input type="text" name="edit_name" parsley-trigger="change"  class="form-control" id="edit_name" value="<?php echo $product_data->name;?>" required="required" />
											<span id="error_edit_name" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="edit_price">Product Price*</label>
											<input type="input" id="edit_price" name="edit_price" class="form-control" value="<?php echo $product_data->price;?>" required="required" />
											<span id="error_edit_price" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="edit_description">Product Description*</label>
											<textarea id="edit_description" name="edit_description" class="form-control" required="required" ><?php echo $product_data->description;?></textarea>
											<span id="error_edit_description" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label >Category Image</label>
											<input type="file" name="edit_image" name="edit_image" />
											<?php echo $this->Html->image("medium/".$product_data->image, ['alt' => 'Shoe','class'=>'logo-default']);?>
										</div>
										<div class="form-group text-right m-b-0">
										    <p>* Required Fields</p>
											<button class="btn btn-primary waves-effect waves-light" type="button" onclick="update_data()">
												Submit
											</button>
											<button type="button" onclick="goBack()" class="btn btn-primary waves-effect waves-light">
												Cancel
											</button>
										</div>
									</form>
								    </div> 
							    </div>
								
<script>
function update_data(){
    var category_id=$('#edit_category_id').val();
	var product_code=$('#edit_product_code').val();
	var name=$('#edit_name').val();
	var price=$('#edit_price').val();
	var description=$('#edit_description').val();
	//var image=$('#image').val();
	if(category_id==0){
		$("#error_edit_category_id").html("Please Select A Category");
		$("#edit_category_id").focus();
	}
	if(name=='' || name==null){
		$("#error_edit_category_id").hide();
		$("#error_edit_name").html("Please Enter A Product Name");
		$("#edit_name").focus();
	}
	else if(price=='' || price==null){
		$("#error_edit_name").hide();
		$("#error_edit_price").html("Please Enter Product Price");
		$("#edit_price").focus();
	}
	else if(description=='' || description==null){
		$("#error_edit_price").hide();
		$("#error_edit_description").html("Please Enter Category Description");
		$("#edit_description").focus();
	}
	/*else if(image=='' || image==null){
		$("#error_description").hide();
		$("#error_image").html("Please Upload An Image");
		$("#image").focus();
	}*/
	else{
		  $("#error_edit_description").hide();	
		  document.getElementById("theEditForm").submit();
	  }
	}
function goBack() {
    window.history.back();
}	  
</script>
<?php exit;?>