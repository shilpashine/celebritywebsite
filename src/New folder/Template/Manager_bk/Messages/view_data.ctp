                                <div class="col-lg-12">
								<div class="card-box">
									<h4 class="m-t-0 header-title"><b>Category View</b></h4>
									<p class="text-muted font-13 m-b-30">
	                                </p>
									<form action="#" method="post" name="theForm" data-parsley-validate >
									    <?php 
										$category_data= json_decode($category_data);
										?>
										<div class="form-group">
											<label for="view_category_name">Category Name</label>
											<input type="text" name="view_category_name" parsley-trigger="change"  class="form-control" id="view_category_name" value="<?php echo $category_data->category_name;?>" readonly />
										</div>
										<?php if(isset($category_data->parent_name)) {?>
										<div class="form-group">
											<label for="view_category_name">Parent Category Name</label>
											<input type="text" name="view_parent_id" parsley-trigger="change"  class="form-control" id="view_parent_id" value="<?php echo $category_data->parent_name;?>" readonly />
										</div>
										<?php }?>
										<div class="form-group">
											<label for="view_description">Category Description</label>
											<textarea id="view_description" name="view_description" class="form-control"readonly><?php echo(strip_tags($category_data->description));?></textarea>
										</div>
										<div class="form-group">
											<label >Category Image</label>
											<?php echo $this->Html->image("medium/".$category_data->image, ['alt' => 'Shoe','class'=>'logo-default']);?>
										</div>
										<div class="form-group">
											<label for="view_created">Created</label>
											<input  name="view_created" id="view_created" type="text"  class="form-control" value="<?php echo $category_data->created;?>" readonly>
										</div>
										<div class="form-group">
											<label for="view_modified">Modified</label>
											<input  name="view_modified" id="view_modified" type="text"  class="form-control" value="<?php echo $category_data->modified;?>" readonly>
										</div>
										<div class="form-group text-right m-b-0">
											<button type="reset" onclick="goBack()" class="btn btn-default waves-effect waves-light m-l-5">
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