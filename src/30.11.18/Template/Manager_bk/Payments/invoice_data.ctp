                       <?php $payment_data= json_decode($payment_data);?>
					   <div class="container" id="printableArea">
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

                                <h4 class="page-title">Invoice</h4>
                                <ol class="breadcrumb">
                                    <li><a href="#">Ubold</a></li>
                                    <li><a href="#">Extras</a></li>
                                    <li class="active">Invoice</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <!-- <div class="panel-heading">
                                        <h4>Invoice</h4>
                                    </div> -->
                                    <div class="panel-body">
                                        <div class="clearfix">
                                            <div class="pull-left">
                                                <h4 class="text-right"><img src="assets/images/logo_dark.png" alt="velonic"></h4>
                                                
                                            </div>
                                            <div class="pull-right">
                                                <h4>Invoice # <br>
                                                    <strong><?php echo $payment_data->invoice_no;?></strong>
                                                </h4>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                
                                                <div class="pull-left m-t-30">
                                                    <address>
                                                      <strong><?php echo $payment_data->first_name." ".$payment_data->last_name;?></strong><br>
                                                      <?php echo $payment_data->billing_address;?><br>
                                                      <?php echo $payment_data->billing_city."-".$payment_data->billing_zip;?><br>
                                                      <abbr title="Phone">P:</abbr><?php echo $payment_data->phone;?>
                                                      </address>
                                                </div>
                                                <div class="pull-right m-t-30">
                                                    <p><strong>Order Date: </strong> <?php echo $payment_data->created;?></p>
                                                    <!--<p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p>-->
                                                    <p class="m-t-10"><strong>Order ID: </strong> <?php echo $payment_data->id;?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-h-50"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table m-t-30">
                                                        <thead>
                                                            <tr><th>#</th>
                                                            <th>Item</th>
                                                            <th>Description</th>
                                                            <th>Quantity</th>
                                                            <th>Unit Cost</th>
                                                        </tr></thead>
                                                        <tbody>
														    <?php
                                                            $i=1;															
															foreach($payment_data->order_items as $order_item_val){ 
										                     ?>
                                                            <tr> 
															    <td><?php echo $i;?></td>
                                                                <td><?php echo $order_item_val->product->name;?></td>
                                                                <td><?php echo $order_item_val->product->description;?></td>
                                                                <td><?php echo $order_item_val->quantity;?></td>
                                                                <td><?php echo $order_item_val->price;?></td>
                                                            </tr>
															<?php $i++;}?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="border-radius: 0px;">
                                            <div class="col-md-3 col-md-offset-9">
                                                <p class="text-right"><b>Sub-total:</b> <?php echo $payment_data->subtotal;?></p>
                                                <!--<p class="text-right">Discout: 12.9%</p>
                                                <p class="text-right">VAT: 12.9%</p>-->
                                                <hr>
                                                <h3 class="text-right">USD <?php echo $payment_data->subtotal;?></h3>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="hidden-print">
                                            <div class="pull-right">
                                                <button class="btn btn-inverse waves-effect waves-light" onclick="printDiv('printableArea')"><i class="fa fa-print"></i></button>
                                                <!--<a href="#" class="btn btn-primary waves-effect waves-light">Submit</a>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- container -->
<script>
	 function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     document.body.innerHTML = printContents;
     window.print();
     document.body.innerHTML = originalContents;
}
</script>