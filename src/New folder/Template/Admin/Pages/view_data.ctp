                                <div class="col-lg-12" id="viewedit_show_data" name="viewedit_show_data">
								<div class="card-box">
									<h4 class="m-t-0 header-title"><b>Cms View</b></h4>
									<p class="text-muted font-13 m-b-30">
	                                </p>
									<form action="#" method="post" name="theForm" data-parsley-validate >
									    <?php 
										$cms_data= json_decode($cms_data);
										//pr($coupon_data);exit
										?>
										<div class="form-group">
											<label for="view_inplace">In Place</label>
											<select  name="view_inplace" parsley-trigger="change"  class="form-control" id="view_inplace" disabled>
											<option value="0" <?php if($cms_data->inplace==0) {echo "selected";}?>>home</option>
											<option value="1" <?php if($cms_data->inplace==1) {echo "selected";}?>>header</option>
											<option value="2"  <?php if($cms_data->inplace==2) {echo "selected";}?>>footer</option>
											</select>
										</div>
										<div class="form-group">
											<label for="coupon_code">Name</label>
											<input type="text" name="view_name" parsley-trigger="change"  class="form-control" id="view_name" value="<?php echo $cms_data->name;?>" readonly />
										</div>
										<div class="form-group">
											<label for="valid_from">Page Title</label>
											<input  name="view_page_title" id="view_page_title" type="text" class="form-control" value="<?php echo(strip_tags($cms_data->page_title));?>"  readonly />
										</div>
										<div class="form-group">
											<label for="valid_to">Image</label>
											<?php echo $this->Html->image("medium/".$cms_data->image, ['alt' => 'Shoe','class'=>'logo-default']);?>
										</div>
										<div class="form-group">
											<label for="elm1">Description</label>
											<?php echo $cms_data->description;?>
										</div>
										<div class="form-group">
											<label for="view_created">Created</label>
											<input  name="view_created" id="view_created" type="text"  class="form-control" value="<?php echo $cms_data->created;?>" readonly />
										</div>
										<div class="form-group">
											<label for="view_modified">Modified</label>
											<input  name="view_modified" id="view_modified" type="text"  class="form-control" value="<?php echo $cms_data->modified;?>" readonly />
										</div>
										<div class="form-group text-right m-b-0">
											<button type="reset" onclick="goBack()" class="btn btn-default waves-effect waves-light m-l-5">
												Back
											</button>
										</div>
									</form>
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
<script>
function goBack() {
    window.history.back();
}	  
</script>        								
<?php exit;?>