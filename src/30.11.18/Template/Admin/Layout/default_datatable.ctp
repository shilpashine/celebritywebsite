<!DOCTYPE html>
<html lang="en">
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
       <title><?php echo $page_title; ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
       <meta content="<?php echo $meta_content;?>" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
       	<?php
		//echo $this->Html->css('admin-css/assets/global/plugins/font-awesome/css/font-awesome.min.css');
		echo $this->Html->css('admin-css/assets/global/plugins/simple-line-icons/simple-line-icons.min.css');
		echo $this->Html->css('admin-css/assets/global/plugins/bootstrap/css/bootstrap.min.css');
		echo $this->Html->css('admin-css/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css');
		
		echo $this->Html->css('admin-css/assets/global/plugins/datatables/datatables.min.css');
		
		echo $this->Html->css('admin-css/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css');
		
		echo $this->Html->css('admin-css/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css');
		
		echo $this->Html->css('admin-css/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css');
                
                
                echo $this->Html->css('admin-css/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css');
                
                
                
                
                
                echo $this->Html->css('admin-css/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css');
                
                
		echo $this->Html->css('admin-css/assets/global/plugins/morris/morris.css');
		//echo $this->Html->css('admin-css/assets/global/plugins/fullcalendar/fullcalendar.min.css');
		echo $this->Html->css('admin-css/assets/global/plugins/jqvmap/jqvmap/jqvmap.css');
		echo $this->Html->css('admin-css/assets/global/css/components.min.css');
		echo $this->Html->css('admin-css/assets/global/css/plugins.min.css');
		echo $this->Html->css('admin-css/assets/layouts/layout/css/layout.min.css');
		echo $this->Html->css('admin-css/assets/layouts/layout/css/themes/darkblue.min.css');
		echo $this->Html->css('admin-css/assets/layouts/layout/css/custom.min.css');
		?>
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
            <!-- BEGIN HEADER -->
             <?php echo $this->element('header'); ?>
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN SIDEBAR -->
                
				<?php echo $this->element('left_side_bar'); ?>
				
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <?php echo $this->fetch('content'); ?>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
                <!-- BEGIN QUICK SIDEBAR -->
                <?php echo $this->element('right_side_bar'); ?>
                <!-- END QUICK SIDEBAR -->
            </div>
            <!-- END CONTAINER -->
            <!-- BEGIN FOOTER -->
             <?php echo $this->element('footer'); ?>
            <!-- END FOOTER -->
        </div>
        <!-- BEGIN QUICK NAV -->
        <?php /*?><nav class="quick-nav">
            <a class="quick-nav-trigger" href="#0">
                <span aria-hidden="true"></span>
            </a>
            <ul>
                <li>
                    <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" target="_blank" class="active">
                        <span>Purchase Metronic</span>
                        <i class="icon-basket"></i>
                    </a>
                </li>
                <li>
                    <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/reviews/4021469?ref=keenthemes" target="_blank">
                        <span>Customer Reviews</span>
                        <i class="icon-users"></i>
                    </a>
                </li>
                <li>
                    <a href="http://keenthemes.com/showcast/" target="_blank">
                        <span>Showcase</span>
                        <i class="icon-user"></i>
                    </a>
                </li>
                <li>
                    <a href="http://keenthemes.com/metronic-theme/changelog/" target="_blank">
                        <span>Changelog</span>
                        <i class="icon-graph"></i>
                    </a>
                </li>
            </ul>
            <span aria-hidden="true" class="quick-nav-bg"></span>
        </nav><?php */?>
        <div class="quick-nav-overlay"></div>
        <!-- END QUICK NAV -->
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<script src="../assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
		<?php 
		echo $this->Html->script("admin-js/assets/global/plugins/jquery.min.js");
		echo $this->Html->script("admin-js/assets/global/plugins/bootstrap/js/bootstrap.min.js");
		echo $this->Html->script("admin-js/assets/global/plugins/js.cookie.min.js");
		echo $this->Html->script("admin-js/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js");
		echo $this->Html->script("admin-js/assets/global/plugins/jquery.blockui.min.js");
		echo $this->Html->script("admin-js/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js");
		
		echo $this->Html->script("admin-js/assets/global/scripts/datatable.js");
		
		echo $this->Html->script("admin-js/assets/global/plugins/datatables/datatables.min.js");
		
		
		echo $this->Html->script("admin-js/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js");
		echo $this->Html->script("admin-js/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js");
		echo $this->Html->script("admin-js/assets/global/plugins/moment.min.js");
		echo $this->Html->script("admin-js/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js");
                
               echo $this->Html->script("admin-js/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js");
               echo $this->Html->script("admin-js/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js");
                echo $this->Html->script("admin-js/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js");
                 
		echo $this->Html->script("admin-js/assets/global/plugins/morris/morris.min.js");
		echo $this->Html->script("admin-js/assets/global/plugins/morris/raphael-min.js");
		echo $this->Html->script("admin-js/assets/global/plugins/counterup/jquery.waypoints.min.js");
		echo $this->Html->script("admin-js/assets/global/plugins/counterup/jquery.counterup.min.js");
		echo $this->Html->script("admin-js/assets/global/plugins/amcharts/amcharts/amcharts.js");
		echo $this->Html->script("admin-js/assets/global/plugins/amcharts/amcharts/serial.js");
		echo $this->Html->script("admin-js/assets/global/plugins/amcharts/amcharts/pie.js");
		echo $this->Html->script("admin-js/assets/global/plugins/amcharts/amcharts/radar.js");
		echo $this->Html->script("admin-js/assets/global/plugins/amcharts/amcharts/themes/light.js");
		echo $this->Html->script("admin-js/assets/global/plugins/amcharts/amcharts/themes/patterns.js");
		echo $this->Html->script("admin-js/assets/global/plugins/amcharts/amcharts/themes/chalk.js");
		echo $this->Html->script("admin-js/assets/global/plugins/amcharts/ammap/ammap.js");
		echo $this->Html->script("admin-js/assets/global/plugins/amcharts/ammap/maps/js/worldLow.js");
		echo $this->Html->script("admin-js/assets/global/plugins/amcharts/amstockcharts/amstock.js");
		echo $this->Html->script("admin-js/assets/global/plugins/fullcalendar/fullcalendar.min.js");
		echo $this->Html->script("admin-js/assets/global/plugins/horizontal-timeline/horizontal-timeline.js");
		echo $this->Html->script("admin-js/assets/global/plugins/flot/jquery.flot.min.js");
		echo $this->Html->script("admin-js/assets/global/plugins/flot/jquery.flot.resize.min.js");
		echo $this->Html->script("admin-js/assets/global/plugins/flot/jquery.flot.categories.min.js");
		echo $this->Html->script("admin-js/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js");
		echo $this->Html->script("admin-js/assets/global/plugins/jquery.sparkline.min.js");
		echo $this->Html->script("admin-js/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js");
		echo $this->Html->script("admin-js/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js");
		echo $this->Html->script("admin-js/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js");
		
		echo $this->Html->script("admin-js/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js");
		echo $this->Html->script("admin-js/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js");
		echo $this->Html->script("admin-js/assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js");
		echo $this->Html->script("admin-js/assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js");
		
		echo $this->Html->script("admin-js/assets/pages/scripts/table-datatables-editable1.js");
		echo $this->Html->script("admin-js/assets/global/scripts/table-datatables-responsive.min");
		echo $this->Html->script("admin-js/assets/pages/scripts/components-date-time-pickers.min.js");
		
		//echo $this->Html->script("admin-js/assets/pages/scripts/dashboard.min.js");
		echo $this->Html->script("admin-js/assets/global/scripts/app.min.js");
		echo $this->Html->script("admin-js/assets/layouts/layout/scripts/layout.min.js");
		echo $this->Html->script("admin-js/assets/layouts/layout/scripts/demo.min.js");
		echo $this->Html->script("admin-js/assets/layouts/global/scripts/quick-sidebar.min.js");
		echo $this->Html->script("admin-js/assets/layouts/global/scripts/quick-nav.min.js");
		?>
        <!-- END THEME LAYOUT SCRIPTS -->
        <script>
            $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });
            })
            
            
            $('.date-picker').datepicker({
              endDate: '+0d',
    format: 'yyyy-mm-dd'
    
});
        </script>
    </body>

</html>