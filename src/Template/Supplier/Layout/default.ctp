<!DOCTYPE html>
<html lang="en">
    <?php echo $this->element('header'); ?>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <div class="page-wrapper">
            <div class="page-header navbar navbar-fixed-top">
                <div class="page-header-inner ">
                    <div class="page-logo">
                        <a href="index.html">
                            <?php echo $this->Html->image("/img/logo.png",array("style"=>"width:115px;"));?> </a>
                        <div class="menu-toggler sidebar-toggler">
                            <span></span>
                        </div>
                    </div>
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                        <span></span>
                    </a>
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <?php echo $this->Html->image("/img/avater.png"); ?>
                                    <span class="username username-hide-on-mobile">Setting </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <?php echo $this->Html->link(
											'Log Out',
											['class'=>'icon-key','controller' =>'operators', 'action' => 'logout']);?>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
            </div>
            <div class="clearfix"> </div>
			<?php echo $this->element('side_bar'); ?>
            <?php echo $this->fetch('content'); ?>
            <?php echo $this->element('footer'); ?>
        </div>
        <div class="quick-nav-overlay"></div>
    </body>
</html>