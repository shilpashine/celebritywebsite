                                <div class="col-lg-12" id="viewedit_show_data" name="viewedit_show_data">
								<div class="card-box">
									<h4 class="m-t-0 header-title"><b>Cms Edit</b></h4>
									<p class="text-muted font-13 m-b-30">
	                                </p>
									<form action="edit_data" method="post" name="theEditForm" id="theEditForm" data-parsley-validate enctype="multipart/form-data">
									    <?php 
										$cms_data= json_decode($cms_data);
										?>
										<input type="hidden" name="edit_page_id" parsley-trigger="change"  class="form-control" id="edit_page_id" value="<?php echo $cms_data->id;?>" />
										<div class="form-group">
											<label for="edit_inplace">In Place</label>
											<select  name="edit_inplace" parsley-trigger="change"  class="form-control" id="edit_inplace" >
											<option value="0">--Select A Position--</option>
											<option value="1" <?php if($cms_data->inplace==1) {echo "selected";}?>>header</option>
											<option value="2"  <?php if($cms_data->inplace==2) {echo "selected";}?>>footer</option>
											</select>
										</div>
										<div class="form-group">
											<label for="edit_name">Name*</label>
											<input type="text" name="edit_name" parsley-trigger="change"  class="form-control" id="edit_name" value="<?php echo $cms_data->name;?>" required="required"/>
											<span id="error_edit_name" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="edit_page_title">Page Title*</label>
											<input  name="edit_page_title" id="edit_page_title" type="text" class="form-control" value="<?php echo(strip_tags($cms_data->page_title));?>" required="required"/>
											<span id="error_edit_page_title" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="edit_image">Image</label>
											<input type="file" name="edit_image" name="edit_image" />
											<?php echo $this->Html->image("medium/".$cms_data->image, ['alt' => 'Shoe','class'=>'logo-default']);?>
										</div>
										<div class="form-group">
											<label for="elm1">Description*</label>
											<textarea id="elm1" name="area" class="form-control" required="required"><?php echo $cms_data->description;?></textarea>
											<span id="error_edit_area" style="color:#C00;"></span>
										</div>
										<div class="form-group text-right m-b-0">
											<button class="btn btn-primary waves-effect waves-light" type="button" onclick="update_data()">
												Submit
											</button>
											<button type="reset" onclick="goBack()" class="btn btn-default waves-effect waves-light m-l-5">
												Cancel
											</button>
										</div>
									</form>
								    </div> 
							    </div>
								

       <?php
		echo $this->Html->script("admin-js/assets/plugins/tinymce/tinymce.min.js");
	    ?>
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
function update_data(){
	var name=$('#edit_name').val();
	var page_title=$('#edit_page_title').val();
	//var elm1=CKEDITOR.instances.['elm1'].getData();
	/*var textarea = document.getElementById('elm1');
    var textareaNode = new CKEDITOR.dom.element(textarea);
    var  elm1=textareaNode.getValue();*/
	//var elm1=$('#elm1').val();
	//alert(elm1);exit;
	if(name=='' || name==null){
		$("#error_edit_name").html("Please Enter A Name");
		$("#edit_name").focus();
	}
	else if(page_title=='' || page_title==null){
		$("#error_edit_name").hide();
		$("#error_edit_page_title").html("Please Enter Page Title");
		$("#edit_page_title").focus();
	}
	/*
	 else if(elm1=='' || elm1==null){
		$("#error_image").hide();
		$("#error_elm1").html("Please Enter Description");
		$("#elm1").focus();
	}*/
	else{
		  $("#error_edit_page_title").hide();	
		  document.getElementById("theEditForm").submit();
	}
	}
function goBack() {
    window.history.back();
}	  
</script>
<?php exit;?>