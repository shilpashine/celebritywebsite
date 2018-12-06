<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
		<meta name="author" content="Coderthemes">
		<link rel="shortcut icon" href="assets/images/favicon_1.ico">
		<title>LRDEN</title>
		<!-- DataTables -->
		<?php
		echo $this->Html->css('admin-css/assets/plugins/datatables/jquery.dataTables.min.css'); 
		echo $this->Html->css('admin-css/assets/plugins/datatables/buttons.bootstrap.min.css');
		echo $this->Html->css('admin-css/assets/plugins/datatables/fixedHeader.bootstrap.min.css');
		echo $this->Html->css('admin-css/assets/plugins/datatables/responsive.bootstrap.min.css');
		echo $this->Html->css('admin-css/assets/plugins/datatables/scroller.bootstrap.min.css');
		echo $this->Html->css('admin-css/assets/plugins/datatables/dataTables.colVis.css');
		echo $this->Html->css('admin-css/assets/css/bootstrap.min.css');
		echo $this->Html->css('admin-css/assets/css/core.css');
		
		echo $this->Html->css('admin-css/assets/css/components.css');
		echo $this->Html->css('admin-css/assets/css/icons.css');
		echo $this->Html->css('admin-css/assets/css/pages.css');
		echo $this->Html->css('admin-css/assets/css/responsive.css');
		//echo $this->Html->css('admin-css/assets/plugins/multiselect/css/multi-select.css');
		//echo $this->Html->css('admin-css/assets/plugins/select2/select2.css');
		//echo $this->Html->css('admin-css/assets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css');
		echo $this->Html->css('admin-css/assets/css/bootstrap.css.css');
		echo $this->Html->css('admin-css/assets/css/multiple-select.css');
		?>
        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <?php
	    echo $this->Html->script("admin-js/assets/js/modernizr.min.js");
		?>
	</head>
	<body class="fixed-left">
		<!-- Begin page -->
		<div id="wrapper">
            <!-- Top Bar Start -->
            <?php echo $this->element('header'); ?>
            <!-- Top Bar End -->
            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
            <?php echo $this->element('left_side_bar'); ?>   
            <!-- Left Sidebar End -->
        			<!-- ============================================================== -->
        			<!-- Start right Content here -->
        			<!-- ============================================================== -->
        			<div class="content-page">
        				<!-- Start content -->
        				<div class="content">
						<?php echo $this->fetch('content'); ?>
        					<!-- container -->
                        </div> <!-- content -->
                <footer class="footer">
                   <?php echo date('Y');?> © LRDEN.
                </footer>
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
            <!-- Right Sidebar -->
            <?php echo $this->element('right_side_bar');?>
            <!-- /Right-bar -->
        </div>
        <!-- END wrapper -->
        <script>
            var resizefunc = [];
        </script>
        <!-- jQuery  -->
		<?php
	    echo $this->Html->script("admin-js/assets/js/jquery.min.js");
		echo $this->Html->script("admin-js/assets/js/bootstrap.min.js");
		echo $this->Html->script("admin-js/assets/js/detect.js");
		echo $this->Html->script("admin-js/assets/js/fastclick.js");
		echo $this->Html->script("admin-js/assets/js/jquery.slimscroll.js");
		echo $this->Html->script("admin-js/assets/js/jquery.blockUI.js");
		echo $this->Html->script("admin-js/assets/js/waves.js");
		echo $this->Html->script("admin-js/assets/js/wow.min.js");
		echo $this->Html->script("admin-js/assets/js/jquery.nicescroll.js");
		echo $this->Html->script("admin-js/assets/js/jquery.scrollTo.min.js");
		echo $this->Html->script("admin-js/assets/plugins/datatables/jquery.dataTables.min.js");
		echo $this->Html->script("admin-js/assets/plugins/datatables/dataTables.bootstrap.js");
		echo $this->Html->script("admin-js/assets/plugins/datatables/dataTables.buttons.min.js");
		echo $this->Html->script("admin-js/assets/plugins/datatables/buttons.bootstrap.min.js");
		echo $this->Html->script("admin-js/assets/plugins/datatables/jszip.min.js");
		echo $this->Html->script("admin-js/assets/plugins/datatables/pdfmake.min.js");
		echo $this->Html->script("admin-js/assets/plugins/datatables/vfs_fonts.js");
		echo $this->Html->script("admin-js/assets/plugins/datatables/buttons.html5.min.js");
		echo $this->Html->script("admin-js/assets/plugins/datatables/buttons.print.min.js");
		echo $this->Html->script("admin-js/assets/plugins/datatables/dataTables.fixedHeader.min.js");
		
		
		echo $this->Html->script("admin-js/assets/plugins/datatables/dataTables.keyTable.min.js");
		echo $this->Html->script("admin-js/assets/plugins/datatables/dataTables.responsive.min.js");
		echo $this->Html->script("admin-js/assets/plugins/datatables/responsive.bootstrap.min.js");
		echo $this->Html->script("admin-js/assets/plugins/datatables/dataTables.scroller.min.js");
		echo $this->Html->script("admin-js/assets/plugins/datatables/dataTables.colVis.js");
		echo $this->Html->script("admin-js/assets/pages/datatables.init.js");
		echo $this->Html->script("admin-js/assets/js/jquery.core.js");
		echo $this->Html->script("admin-js/assets/js/jquery.app.js");
		echo $this->Html->script("admin-js/assets/plugins/parsleyjs/dist/parsley.min.js");
		//echo $this->Html->script("admin-js/assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js");
		//echo $this->Html->script("admin-js/assets/plugins/clockpicker/dist/jquery-clockpicker.min.js");
		//echo $this->Html->script("admin-js/assets/plugins/bootstrap-daterangepicker/daterangepicker.js");
		/*echo $this->Html->script("admin-js/assets/plugins/multiselect/js/jquery.multi-select.js");
		echo $this->Html->script("admin-js/assets/plugins/select2/select2.min.js");
		echo $this->Html->script("admin-js/assets/plugins/bootstrap-select/dist/js/bootstrap-select.min.js");*/
		echo $this->Html->script("admin-js/assets/js/multiple-select.js");
	    ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
                $('#datatable-keytable').DataTable( { keys: true } );
                $('#datatable-responsive').DataTable();
                $('#datatable-colvid').DataTable({
                    "dom": 'C<"clear">lfrtip',
                    "colVis": {
                        "buttonText": "Change columns"
                    }
                });
                $('#datatable-scroller').DataTable( { ajax: "assets/plugins/datatables/json/scroller-demo.json", deferRender: true, scrollY: 380, scrollCollapse: true, scroller: true } );
                var table = $('#datatable-fixed-header').DataTable( { fixedHeader: true } );
            } );
            TableManageButtons.init();
        </script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('form').parsley();
			});
		</script>
	</body>
</html>