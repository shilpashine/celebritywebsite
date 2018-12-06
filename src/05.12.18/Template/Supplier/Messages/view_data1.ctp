                            <?php echo "Hiiiiiiiiiiiiiii"; exit; ?>
							
							
							<div class="row" >
							<div class="col-lg-6">
								<div class="card-box">
									<h4 class="m-t-0 header-title"><b>Basic Form</b></h4>
									<p class="text-muted font-13 m-b-30">
	                                    Your awesome text goes here.
	                                </p>
									<form action="#" method="post" name="theForm" data-parsley-validate >
									<?php $category_data=json_decode($category_data)?>
										<div class="form-group">
											<label for="coupon_code">Category Name</label>
											<input type="text" name="view_category_name" parsley-trigger="change"  class="form-control" id="view_category_name" value="<?php echo $category_data->category_name;?>" readonly />
										</div>
										<div class="form-group">
											<label for="coupon_code">Category Parent Name</label>
											<input type="text" name="view_parent_id" parsley-trigger="change"  class="form-control" id="view_parent_id" value="<?php echo $category_data->category_name;?>" readonly />
										</div>
										<div class="form-group">
											<label for="valid_to">Category Image</label>
											<?php echo $this->Html->image($category_data->image, ['alt' => 'Category Name','class'=>'logo-default']);?>
										</div>
										<div class="form-group">
											<label for="discount">Category Description</label>
											<textarea id="elm1" name="area" class="form-control"readonly><?php echo(strip_tags($category_data->description;))?></textarea>
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
											<button class="btn btn-primary waves-effect waves-light" type="submit" onclick="save_data()">
												Submit
											</button>
											<button type="reset" class="btn btn-default waves-effect waves-light m-l-5">
												Cancel
											</button>
										</div>
									</form>
								</div> 
							</div>
                            <div class="col-sm-6">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>Buttons example</b></h4>
                                    <p class="text-muted font-13 m-b-30">
                                        List Users
                                    </p>
									<?php echo $this->Flash->render();?>
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Category Name</th>
                                                <th>Category Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										       <?php 
												$category_list= json_decode($category_list);
												if(!empty($category_list)){
												foreach($category_list as $category_list_val){
												?>
                                                <tr>
                                                <td><?php echo $category_list_val->category_name;?></td>
                                                <td><?php echo strip_tags(substr($category_list_val->description,0,10))."...";?></td>
                                                <td>
												<a title="View" onclick="view_data(<?php echo $category_list_val->id;?>)" href="#"><i class="fa fa-eye"></i></a>
												<a title="Edit" onclick="edit_data(<?php echo $category_list_val->id;?>)" href="#"><i class="fa fa-edit"></i></a>
												<a title="Delete" href="<?php echo $this->Url->build('/admin/categories/delete_data/', true).$category_list_val->id ; ?>"><i class="fa fa-trash-o"></i></a>
												<a title="Status" href="<?php echo $this->Url->build('/admin/categories/change_status/', true).$category_list_val->id; ?>"> <?php if($category_list_val->status==1){echo $this->Html->image("/img/test-pass-icon.png"); } else{ echo $this->Html->image("/img/warning.png");}?></a>
												</td>
                                            </tr>
												<?php }}?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
<script type="text/javascript">
        	$(document).ready(function () {
			    if($("#elm1").length > 0){
			        tinymce.init({
			            selector: "textarea#elm1",
			            theme: "modern",
			            height:300,
			            plugins: [
			                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
			                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
			                "save table contextmenu directionality emoticons template paste textcolor"
			            ],
			            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons", 
			            style_formats: [
			                {title: 'Bold text', inline: 'b'},
			                {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
			                {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
			                {title: 'Example 1', inline: 'span', classes: 'example1'},
			                {title: 'Example 2', inline: 'span', classes: 'example2'},
			                {title: 'Table styles'},
			                {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
			            ]
			        });    
			    }  
			});
</script>
        								
								<?php exit;?>