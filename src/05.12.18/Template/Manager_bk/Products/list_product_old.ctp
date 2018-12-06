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
									<h4 class="m-t-0 header-title"><b>Product Add</b></h4>
									<p class="text-muted font-13 m-b-30">
	                                </p>
									<form action="add_data" method="post" name="theAddForm" id="theAddForm" data-parsley-validate enctype="multipart/form-data" >
									    <?php 
										$category_data= json_decode($category_data);
										//pr($parent_data);exit;
										?>
										<div class="form-group">
											<label for="category_id">Category</label>
											<select name="category_id[]"   class="select2 select2-multiple" id="category_id[]" multiple="multiple" multiple data-placeholder="Choose ...">
											<option value="0">--Select An Option--</option>
											<?php for($i=0;$i<count($category_data);$i++) 
											{?>
											<option value="<?php echo $category_data[$i]->id;?>"><?php echo $category_data[$i]->category_name;?></option>
										    <?php }?>
											</select>
											<!--<select class="select2 select2-multiple" multiple="multiple" multiple data-placeholder="Choose ...">
		                                            <option value="DE">Delaware</option>
		                                            <option value="FL">Florida</option>
		                                            <option value="GA">Georgia</option>
		                                            <option value="IN">Indiana</option>
		                                            <option value="ME">Maine</option>
		                                            <option value="MD">Maryland</option>
		                                            <option value="MA">Massachusetts</option>
		                                    </select>-->
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
                                    <h4 class="m-t-0 header-title"><b>Product List</b></h4>
                                    <p class="text-muted font-13 m-b-30">
                                        <button class="btn btn-default waves-effect waves-light" type="button" onclick="add_data()">
											Add Product
											</button>
                                    </p>
									<?php echo $this->Flash->render();?>
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
												<a title="View" onclick="view_data(<?php echo $product_data_val->id;?>)" href="#"><i class="fa fa-eye"></i></a>
												<a title="Edit" onclick="edit_data(<?php echo $product_data_val->id;?>)" href="#"><i class="fa fa-edit"></i></a>
												<a title="Delete" href="<?php echo $this->Url->build('/designer/products/delete_data/', true).$product_data_val->id ; ?>"><i class="fa fa-trash-o"></i></a>
												<a title="Status" href="<?php echo $this->Url->build('/designer/products/change_status/', true).$product_data_val->id; ?>"> <?php if($product_data_val->active==1){echo $this->Html->image("/img/test-pass-icon.png"); } else{ echo $this->Html->image("/img/warning.png");}?></a>
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
<?php 
/*echo $this->Html->script("admin-js/assets/plugins/multiselect/js/jquery.multi-select.js");
echo $this->Html->script("admin-js/assets/plugins/select2/select2.min.js");
echo $this->Html->script("admin-js/assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js");*/
?>					
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
	   window.location.reload();
	  }
</script>
<script>
            jQuery(document).ready(function() {

                //advance multiselect start
                /*$('#my_multi_select3').multiSelect({
                    selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                    selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='search...'>",
                    afterInit: function (ms) {
                        var that = this,
                            $selectableSearch = that.$selectableUl.prev(),
                            $selectionSearch = that.$selectionUl.prev(),
                            selectableSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selectable:not(.ms-selected)',
                            selectionSearchString = '#' + that.$container.attr('id') + ' .ms-elem-selection.ms-selected';

                        that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                            .on('keydown', function (e) {
                                if (e.which === 40) {
                                    that.$selectableUl.focus();
                                    return false;
                                }
                            });

                        that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                            .on('keydown', function (e) {
                                if (e.which == 40) {
                                    that.$selectionUl.focus();
                                    return false;
                                }
                            });
                    },
                    afterSelect: function () {
                        this.qs1.cache();
                        this.qs2.cache();
                    },
                    afterDeselect: function () {
                        this.qs1.cache();
                        this.qs2.cache();
                    }
                });*/

                // Select2
                $(".select2").select2();
                
                $(".select2-limiting").select2({
				  maximumSelectionLength: 2
				});
				
			   $('.selectpicker').selectpicker();
	            $(":file").filestyle({input: false});
	            });
	            
	            //Bootstrap-TouchSpin
	           /* $(".vertical-spin").TouchSpin({
		            verticalbuttons: true,
		            verticalupclass: 'ion-plus-round',
		            verticaldownclass: 'ion-minus-round'
		        });
		        var vspinTrue = $(".vertical-spin").TouchSpin({
		            verticalbuttons: true
		        });
		        if (vspinTrue) {
		            $('.vertical-spin').prev('.bootstrap-touchspin-prefix').remove();
		        }
		
		        $("input[name='demo1']").TouchSpin({
		            min: 0,
		            max: 100,
		            step: 0.1,
		            decimals: 2,
		            boostat: 5,
		            maxboostedstep: 10,
		            postfix: '%'
		        });
		        $("input[name='demo2']").TouchSpin({
		            min: -1000000000,
		            max: 1000000000,
		            stepinterval: 50,
		            maxboostedstep: 10000000,
		            prefix: '$'
		        });
		        $("input[name='demo3']").TouchSpin();
		        $("input[name='demo3_21']").TouchSpin({
		            initval: 40
		        });
		        $("input[name='demo3_22']").TouchSpin({
		            initval: 40
		        });
		
		        $("input[name='demo5']").TouchSpin({
		            prefix: "pre",
		            postfix: "post"
		        });
		        $("input[name='demo0']").TouchSpin({});*/
		        
		        
		        //Bootstrap-MaxLength
		       /* $('input#defaultconfig').maxlength()
		        
		        $('input#thresholdconfig').maxlength({
                threshold: 20
            });

            $('input#moreoptions').maxlength({
                alwaysShow: true,
                warningClass: "label label-success",
                limitReachedClass: "label label-danger"
            });

            $('input#alloptions').maxlength({
                alwaysShow: true,
                warningClass: "label label-success",
                limitReachedClass: "label label-danger",
                separator: ' out of ',
                preText: 'You typed ',
                postText: ' chars available.',
                validate: true
            });

            $('textarea#textarea').maxlength({
                alwaysShow: true
            });

            $('input#placement') .maxlength({
                    alwaysShow: true,
                    placement: 'top-left'
                });*/
        </script>
  