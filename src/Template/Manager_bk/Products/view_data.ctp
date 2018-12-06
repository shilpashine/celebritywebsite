                                <div class="col-lg-12" id="viewedit_show_data" name="viewedit_show_data">
								<div class="card-box">
									<h4 class="m-t-0 header-title"><b>Product View</b></h4>
									<p class="text-muted font-13 m-b-30">
	                                </p>
									<form action="#" method="post" name="theForm" data-parsley-validate >
									    <?php 
										$category_data= json_decode($category_data);
										$product_data= json_decode($product_data);
										?>
										<div class="form-group">
											<label for="view_category_id">Category</label>
											<select name="view_category_id" parsley-trigger="change"  class="form-control" id="view_category_id" required="required" disabled>
											<option value="0">--Select An Option--</option>
											<?php for($i=0;$i<count($category_data);$i++) {
											?>
											<option value="<?php echo $category_data[$i]->id;?>" <?php if($category_data[$i]->id==$product_data->category_id){echo "selected";}?>><?php echo $category_data[$i]->category_name;?></option>
										    <?php }?>
											</select>
										</div>
										<div class="form-group">
											<label for="view_product_code">Product Code*</label>
											<input type="input" id="view_product_code" name="view_product_code" class="form-control" value="<?php echo $product_data->product_code;?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_name">Product Name*</label>
											<input type="text" name="view_name" parsley-trigger="change"  class="form-control" id="view_name" value="<?php echo $product_data->name;?>" required="required" readonly />
										</div>
										<div class="form-group">
											<label for="view_price">Product Price*</label>
											<input type="input" id="view_price" name="view_price" class="form-control" value="<?php echo $product_data->price;?>" required="required" readonly />
										</div>
										<div class="form-group">
											<label for="view_description">Product Description*</label>
											<textarea id="view_description" name="view_description" class="form-control" required="required" readonly><?php echo $product_data->description;?></textarea>
										</div>
										<div class="form-group">
											<label >Category Image</label>
											<?php echo $this->Html->image("medium/".$product_data->image, ['alt' => 'Shoe','class'=>'logo-default']);?>
										</div>
										<div class="form-group">
											<label for="view_created">Created</label>
											<input  name="view_created" id="view_created" type="text"  class="form-control" value="<?php echo(date("m/d/Y", strtotime($product_data->created)));?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_modified">Modified</label>
											<input  name="view_modified" id="view_modified" type="text"  class="form-control" value="<?php echo(date("m/d/Y", strtotime($product_data->modified)));?>" readonly>
										</div>
										<div class="form-group text-right m-b-0">
											<button type="button" onclick="goBack()" class="btn btn-primary waves-effect waves-light">
												Back
											</button>
										</div>
									</form>
								    </div> 
							    </div>
<script>
function goBack() {
    window.history.back();
}	  
</script>
<?php exit;?>