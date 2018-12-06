						<div class="container">
						<!-- Page-Title -->
                        <div class="row">
							<div class="col-lg-12">
								<div class="card-box">
									<h4 class="m-t-0 header-title"><b>Product Add</b></h4>
									<p class="text-muted font-13 m-b-30">
	                                    
	                                </p>
									<form action="add_data" method="post" name="theAddForm" id="theAddForm" data-parsley-validate enctype="multipart/form-data" class="clearfix">
									    <?php 
										$category_data= json_decode($category_data);
										//pr($parent_data);exit;
										?>
										<div class="col-md-6" id="single_product">
										<div class="form-group">
											<label for="product_type">Product Type</label>
											<select name="product_type"   class="form-control" id="product_type" onchange="choose_product_type()">
											<option value="0">--Select An Option--</option>
											<option value="1">Single Product</option>
											<option value="2">Variant Product</option>
											</select>
											<span id="error_product_type" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="single_category_id">Category</label>
											<select name="single_category_id[]" id="single_category_id" multiple="multiple" >
											<?php for($i=0;$i<count($category_data);$i++) 
											{?>
											<option value="<?php echo $category_data[$i]->id;?>"><?php echo $category_data[$i]->category_name;?></option>
										    <?php }?>
											</select>
											<span id="error_category_id" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="product_code">Product Code*</label>
											<input type="input" id="product_code" name="product_code" class="form-control" required="required" value="<?php $randNum = rand(10,10000); echo "prod_".(dechex($randNum)); ?>" readonly />
											<span id="error_product_code" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="name">Product Name*</label>
											<input type="input" id="name" name="name" class="form-control" required="required" />
											<span id="error_name" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="price">Product Price*</label>
											<input type="input" id="price" name="price" class="form-control" required="required" />
											<span id="error_price" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="edit_description">Product Description*</label>
											<textarea id="description" name="description" class="form-control" required="required" ></textarea>
											<span id="error_description" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label >Product Image*</label>
											<input type="file" name="image" id="image" required="required" />
											<span id="error_image" style="color:#C00;"></span>
										</div>
										<div class="form-group text-right m-b-0">
										</div>
										    <!--<p>* Required Fields</p>
											<button class="btn btn-primary waves-effect waves-light" type="button" onclick="save_data()">
												Submit
											</button>-->
										</div>
										<div class="col-md-6" id="variant_product" style="display:none">
										<div class="form-group">
											<label for="variant_category_id">Category</label>
											<select name="variant_category_id[]" id="variant_category_id" multiple="multiple" >
											<?php for($i=0;$i<count($category_data);$i++) 
											{?>
											<option value="<?php echo $category_data[$i]->id;?>"><?php echo $category_data[$i]->category_name;?></option>
										    <?php }?>
											</select>
											<span id="error_category_id" style="color:#C00;"></span>
										</div>
										
										<div class="form-group">
											<label for="product_code">Product Code*</label>
											<input type="input" id="product_code" name="product_code" class="form-control" required="required" value="<?php $randNum = rand(10,10000); echo "prod_".(dechex($randNum)); ?>" readonly />
											<span id="error_product_code" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="name">Product Name*</label>
											<input type="input" id="name" name="name" class="form-control" required="required" />
											<span id="error_name" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="price">Product Price*</label>
											<input type="input" id="price" name="price" class="form-control" required="required" />
											<span id="error_price" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="edit_description">Product Description*</label>
											<textarea id="description" name="description" class="form-control" required="required" ></textarea>
											<span id="error_description" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label >Product Image*</label>
											<input type="file" name="image" id="image" required="required" />
											<span id="error_image" style="color:#C00;"></span>
										</div>
										<div class="form-group text-right m-b-0">
										</div>
										    <!--<p>* Required Fields</p>
											<button class="btn btn-primary waves-effect waves-light" type="button" onclick="save_data()">
												Submit
											</button>-->
										</div>
										<div class="clearfix">
										</div>
										<div>
										<p>* Required Fields</p>
											<button class="btn btn-primary waves-effect waves-light" type="button" >
												Submit
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>
            		    </div> <!-- container -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
function choose_product_type() {
   var product_type=$('#product_type').val();
   if(product_type==2){
     $('#variant_product').show();	 
   }
   if(product_type==1){
	 $('#variant_product').hide();  
   }
  }
  $(function() {
        $('#single_category_id').change(function() {
            console.log($(this).val());
        }).multipleSelect({
            width: '100%'
        });
    });
	$(function() {
        $('#variant_category_id').change(function() {
            console.log($(this).val());
        }).multipleSelect({
            width: '100%'
        });
    });
</script>		