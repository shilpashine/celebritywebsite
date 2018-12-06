                                <div class="col-lg-12">
								<div class="card-box">
									<h4 class="m-t-0 header-title"><b>Category Edit</b></h4>
									<p class="text-muted font-13 m-b-30">
	                                </p>
									<form action="edit_data" method="post" name="myEditForm" data-parsley-validate enctype="multipart/form-data">
									    <?php 
										$category_data= json_decode($category_data);
										$parent_data= json_decode($parent_data);
										//pr($parent_data);
										//echo($parent_data[0]->parent_id);exit;
										?>
										<input type="hidden" name="edit_category_id" parsley-trigger="change"  class="form-control" id="edit_category_id" value="<?php echo $category_data->id;?>" />
										<div class="form-group">
											<label for="view_category_name">Parent Category</label>
											<select name="edit_parent_id" parsley-trigger="change"  class="form-control" id="edit_parent_id">
											<option value="">--Select An Option--</option>
											<?php for($i=0;$i<count(parent_data);$i++) 
											{?>
											<option value="<?php echo $parent_data[$i]->id;?>" <?php if($parent_data[$i]->id==$category_data->parent_id){echo "selected";}?>><?php echo $parent_data[$i]->category_name;?></option>
										<?php $i++;}?>
											</select>
										</div>
										<div class="form-group">
											<label for="edit_category_name">Category Name</label>
											<input type="text" name="edit_category_name" parsley-trigger="change"  class="form-control" id="edit_category_name" value="<?php echo $category_data->category_name;?>" />
										</div>
										<div class="form-group">
											<label for="edit_description">Category Description</label>
											<textarea id="edit_description" name="edit_description" class="form-control"><?php echo(strip_tags($category_data->description));?></textarea>
										</div>
										<div class="form-group">
											<label >Category Image</label>
											<input type="file" name="edit_image" name="edit_image" />
											<?php echo $this->Html->image("medium/".$category_data->image, ['alt' => 'Shoe','class'=>'logo-default']);?>
										</div>
										<div class="form-group">
											<label for="edit_created">Created</label>
											<input  name="edit_created" id="edit_created" type="date"  class="form-control" value="<?php echo $category_data->created;?>" >
										</div>
										<div class="form-group">
											<label for="edit_modified">Modified</label>
											<input  name="edit_modified" id="edit_modified" type="date"  class="form-control" value="<?php echo $category_data->modified;?>" >
										</div>
										<div class="form-group text-right m-b-0">
											<button class="btn btn-primary waves-effect waves-light" type="submit" onclick="update_data()">
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
function save_data(){
	     //var redirect_url="<?php echo $this->Url->build('/admin/coupons/list_coupon', true);?>"
	     /*var coupon_code=$('#coupon_code').val();
		 var valid_to=$('#valid_to').val();
		 var valid_from=$('#valid_from').val();
		 var discount=$('#discount').val();
		 $.ajax({
				type: "POST",
				evalScripts: true,
				url: '<?php echo $this->Url->build('/admin/coupons/add_data', true);  ?>',
				data: ({coupon_code:coupon_code,valid_to:valid_to,valid_from:valid_from,discount:discount}),
				success: function (data){
				    alert(data);
					//window.location(redirect_url);
					window.location.reload();
				}
		    });*/
			document.getElementById("myEditForm").submit();
	  }	
	function goBack() {
    window.history.back();
}
</script>
<?php exit;?>