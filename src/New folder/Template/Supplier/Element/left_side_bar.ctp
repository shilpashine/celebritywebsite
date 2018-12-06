                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                        	<!--<li class="text-muted menu-title">Navigation</li>-->
                            <li class="has_sub">
                                <a href="#" class="waves-effect waves-light active"><i class="md md-home"></i> <span> Dashboard </span> </a>
                                <ul class="list-unstyled">
                                    <li class="active"><a href="<?php echo $this->Url->build('/supplier/dashboards/index', true); ?>">Home</a></li>
                                </ul>
                            </li>
							<li class="has_sub">
                                <a href="#" class="waves-effect waves-light"><i class="md-payment"></i> <span>Product Management</span></a>
                                <ul class="list-unstyled">
                                    <!--<li><a href="<?php echo $this->Url->build('/supplier/products/list_product', true); ?>">List Orders</a></li>-->
									<li><a href="#">List Products</a></li>
                                </ul>
                            </li>
							<li class="has_sub">
                                <a href="#" class="waves-effect waves-light"><i class="md-payment"></i> <span>Order Management</span></a>
                                <ul class="list-unstyled">
                                    <!--<li><a href="<?php echo $this->Url->build('/supplier/orders/list_order', true); ?>">List Orders</a></li>-->
									<li><a href="#">List Orders</a></li>
                                </ul>
                            </li>
							<li class="has_sub">
                                <a href="#" class="waves-effect waves-light"><i class=" md-message"></i> <span>Message Management</span></a>
                                <ul class="list-unstyled">
                                    <!--<li><a href="<?php echo $this->Url->build('/supplier/messages/list_message', true); ?>">List Messages</a></li>-->
									<li><a href="#">List Messages</a></li>
                                </ul>
                            </li>
							<li class="has_sub">
                                <a href="#" class="waves-effect waves-light"><i class="md-report"></i> <span>Report Management</span></a>
                                <ul class="list-unstyled">
                                    <li><a href="#">List Reports</a></li>
                                </ul>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>