                                <div class="container">
        						<!-- Page-Title -->
        						<div class="row">
        							<div class="col-sm-12">
                                        <!--<div class="btn-group pull-right m-t-15">
                                            <button type="button" class="btn btn-white dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i class="fa fa-cog"></i></span></button>
                                            <ul class="dropdown-menu drop-menu-right dropdown-menu-animate" role="menu">
                                                <li><a href="#">Action</a></li>
                                                <li><a href="#">Another action</a></li>
                                                <li><a href="#">Something else here</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Separated link</a></li>
                                            </ul>
                                        </div>-->
        								<h4 class="page-title">Product</h4>
        								<!--<ol class="breadcrumb">
        									<li>
        										<a href="#">Ubold</a>
        									</li>
        									<li>
        										<a href="#">Tables</a>
        									</li>
        									<li class="active">
        										Datatable
        									</li>
        								</ol>-->
        							</div>
        						</div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <h4 class="m-t-0 header-title"><b>Product List</b></h4>
                                    <p class="text-muted font-13 m-b-30">
                                        <button class="btn btn-default waves-effect waves-light" type="button" onclick="add_data()">
											Add Product
											</button>
                                    </p>
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Product Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
												$product_data= json_decode($product_data);
												//pr($category_data);exit;
												if(!empty($product_data)){
												foreach($product_data as $product_data_val){
												?>
                                            <tr>
                                                <td><?php echo $product_data_val->name;?></td>
                                                <td><?php echo strip_tags(substr($product_data_val->description,0,10))."...";?></td>
                                                <td>
												<!--<a title="View" onclick="view_data(<?php echo $product_data_val->id;?>)" href="#"><i class="fa fa-eye"></i></a>
												<a title="Edit" onclick="edit_data(<?php echo $product_data_val->id;?>)" href="#"><i class="fa fa-edit"></i></a>-->
												<a title="Delete" href="<?php echo $this->Url->build('/admin/products/delete_data/', true).$product_data_val->id ; ?>"><i class="fa fa-trash-o"></i></a>
												<a title="Status" href="<?php echo $this->Url->build('/admin/products/change_status/', true).$product_data_val->id; ?>"> <?php if($product_data_val->active==1){echo $this->Html->image("/img/test-pass-icon.png"); } else{ echo $this->Html->image("/img/warning.png");}?></a>
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
function save_data(){
	/*var category_id=$('#category_id').val();
	var product_code=$('#product_code').val();
	var name=$('#name').val();
	var price=$('#price').val();
	var description=$('#description').val();
	var image=$('#image').val();
	if(category_id==0){
		$("#error_category_id").html("Please Select A Category");
		$("#category_id").focus();
	}
	if(name=='' || name==null){
		$("#error_category_id").hide();
		$("#error_name").html("Please Enter A Product Name");
		$("#name").focus();
	}
	else if(price=='' || price==null){
		$("#error_name").hide();
		$("#error_price").html("Please Enter Product Price");
		$("#price").focus();
	}
	else if(description=='' || description==null){
		$("#error_price").hide();
		$("#error_description").html("Please Enter Category Description");
		$("#description").focus();
	}
	else if(image=='' || image==null){
		$("#error_description").hide();
		$("#error_image").html("Please Upload An Image");
		$("#image").focus();
	}
	else{
		  $("#error_image").hide();	
		  document.getElementById("theAddForm").submit();
	  }*/
	  document.getElementById("theAddForm").submit();
	}
function edit_data(product_id){
		 $.ajax({
				type: "POST",
				evalScripts: true,
				url: '<?php echo $this->Url->build('/designer/products/ajax_edit_data', true);  ?>',
				data: ({id:product_id}),
				success: function (data){
				$('#show_data').html(data);
				}
		    });
	  }
function view_data(product_id){
		 $.ajax({
				type: "POST",
				evalScripts: true,
				url: '<?php echo $this->Url->build('/designer/products/view_data', true);  ?>',
				data: ({id:product_id}),
				success: function (data){
					//alert(data);
				$('#show_data').html(data);
				}
		    });
	    }
function add_data(){
	   window.location.href="<?php echo $this->Url->build('/franchise/products/add_product', true); ?>";
	  }
</script>					