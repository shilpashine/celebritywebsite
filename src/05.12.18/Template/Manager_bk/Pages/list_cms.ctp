                    <div class="container">
        						<!-- Page-Title -->
        						<div class="row">
        							<div class="col-sm-12">
                                        <div class="btn-group pull-right m-t-15">
                                            <button type="button" class="btn btn-white dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i class="fa fa-cog"></i></span></button>
                                            <ul class="dropdown-menu drop-menu-right dropdown-menu-animate" role="menu">
                                                <li><a href="#">Action</a></li>
                                                <li><a href="#">Another action</a></li>
                                                <li><a href="#">Something else here</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Separated link</a></li>
                                            </ul>
                                        </div>
        								<h4 class="page-title">Datatable</h4>
        								<ol class="breadcrumb">
        									<li>
        										<a href="#">Ubold</a>
        									</li>
        									<li>
        										<a href="#">Tables</a>
        									</li>
        									<li class="active">
        										Datatable
        									</li>
        								</ol>
        							</div>
        						</div>
						<div class="row">
							<div class="col-lg-6" id="show_data" name="show_data">
								<div class="card-box">
									<h4 class="m-t-0 header-title"><b>Cms Add</b></h4>
									<p class="text-muted font-13 m-b-30">
	                                </p>
									<form action="add_data" method="post" name="theAddForm" id="theAddForm" data-parsley-validate enctype="multipart/form-data" >
									   <div class="form-group">
											<label for="inplace">In Place</label>
											<select  name="inplace" parsley-trigger="change"  class="form-control" id="inplace">
											<option value="0">--Select A Position--</option>
											<option value="1">header</option>
											<option value="2">footer</option>
											</select>
										</div>
										<div class="form-group">
											<label for="name">Name*</label>
											<input type="text" name="name" parsley-trigger="change"  class="form-control" id="name"  required="required" />
											<span id="error_name" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="page_title">Page Title*</label>
											<input  name="page_title" id="page_title" type="text" class="form-control" value=""  required="required" />
											<span id="error_page_title" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="image">Image*</label>
											<input  name="image" id="image" type="file" class="form-control" value=""  required="required" />
											<span id="error_image" style="color:#C00;"></span>
										</div>
										<div class="form-group">
											<label for="elm1">Description*</label>
											<textarea id="elm1" name="area" class="form-control"  required="required" ></textarea>
											<span id="error_elm1" style="color:#C00;"></span>
										</div>
										<div class="form-group text-right m-b-0">
										    <p>* Required Fields</p>
											<button class="btn btn-primary waves-effect waves-light" type="button" onclick="save_data()">
												Submit
											</button>
										</div>
									</form>
								</div> 
							</div>
						<!--</div>-->		
                        <!--<div class="row">-->
                            <div class="col-sm-6">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b> List Cms</b></h4>
                                    <p class="text-muted font-13 m-b-30">
									<button class="btn btn-default waves-effect waves-light" type="button" onclick="add_data()">
											Add Cms
									</button>
                                    </p>
									<?php echo $this->Flash->render();?>
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Page Name</th>
                                                <th>Page Title</th>
                                                <th>Page Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
										       <?php 
												$cms_data= json_decode($cms_data);
												//pr($coupon_data);
												if(!empty($cms_data)){
												foreach($cms_data as $cms_data_val){
												?>
                                            <tr>
                                                <td><?php echo $cms_data_val->name;?></td>
                                                <td><?php echo $cms_data_val->page_title;?></td>
                                                <td><?php echo strip_tags(substr($cms_data_val->meta_description,0,10))."...";?></td>
                                                <td>
												<a title="View" onclick="view_data(<?php echo $cms_data_val->id;?>)" href="#"><i class="fa fa-eye"></i></a>
												<a title="Edit" onclick="edit_data(<?php echo $cms_data_val->id;?>)" href="#"><i class="fa fa-edit"></i></a>
												<a title="Delete" href="<?php echo $this->Url->build('/admin/pages/delete_data/', true).$cms_data_val->id ; ?>"><i class="fa fa-trash-o"></i></a>
												<a title="Status" href="<?php echo $this->Url->build('/admin/pages/change_status/', true).$cms_data_val->id; ?>"> <?php if($cms_data_val->status==1){echo $this->Html->image("/img/test-pass-icon.png"); } else{ echo $this->Html->image("/img/warning.png");}?></a>
												</td>
                                            </tr>
												<?php }}?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
function add_data(){
	   window.location.reload();
	  }
function save_data(){
	var name=$('#name').val();
	var page_title=$('#page_title').val();
	var image=$('#image').val();
	//var elm1=CKEDITOR.instances.['elm1'].getData();
	/*var textarea = document.getElementById('elm1');
    var textareaNode = new CKEDITOR.dom.element(textarea);
    var  elm1=textareaNode.getValue();*/
	//var elm1=$('#elm1').val();
	//alert(elm1);exit;
	if(name=='' || name==null){
		$("#error_name").html("Please Enter A Name");
		$("#name").focus();
	}
	else if(page_title=='' || page_title==null){
		$("#error_fname").hide();
		$("#error_page_title").html("Please Enter Page Title");
		$("#page_title").focus();
	}
	else if(image=='' || image==null){
		$("#error_page_title").hide();
		$("#error_image").html("Please Upload An Image");
		$("#image").focus();
	}
	 /*else if(elm1=='' || elm1==null){
		$("#error_image").hide();
		$("#error_elm1").html("Please Enter Description");
		$("#elm1").focus();
	}*/
	else{
		  $("#error_image").hide();	
		  document.getElementById("theAddForm").submit();
	  }
	  }	
function edit_data(page_id){
		 $.ajax({
				type: "POST",
				evalScripts: true,
				url: '<?php echo $this->Url->build('/admin/pages/ajax_edit_data', true);  ?>',
				data: ({id:page_id}),
				success: function (data){
					//alert(data);exit;
				$('#show_data').html(data);
				}
		    });
	  }
function view_data(page_id){
		 $.ajax({
				type: "POST",
				evalScripts: true,
				url: '<?php echo $this->Url->build('/admin/pages/view_data', true);  ?>',
				data: ({id:page_id}),
				success: function (data){
					//alert(data);
				$('#show_data').html(data);
				}
		    });
	  }	
</script>
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