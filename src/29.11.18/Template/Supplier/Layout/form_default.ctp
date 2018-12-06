               <?php echo $this->element('form_header');?>
                <!-- BEGIN SIDEBAR -->
               <?php echo $this->element('form_sidebar');?>
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
               <?php echo $this->fetch('content');?>
                <!-- END CONTENT -->
                <!-- BEGIN QUICK SIDEBAR -->
                <?php echo $this->element('form_footer');?>