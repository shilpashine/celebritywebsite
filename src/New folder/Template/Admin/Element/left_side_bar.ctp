<div class="page-sidebar-wrapper">
                    <!-- BEGIN SIDEBAR -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <div class="page-sidebar navbar-collapse collapse">
                        <!-- BEGIN SIDEBAR MENU -->
                        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                            <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                            <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                            <li class="sidebar-search-wrapper">
                                <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                                <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                                <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                                <form class="sidebar-search  " action="#" method="POST">
                                    <a href="javascript:;" class="remove">
                                        <i class="icon-close"></i>
                                    </a>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <span class="input-group-btn">
                                            <a href="javascript:;" class="btn submit">
                                                <i class="icon-magnifier"></i>
                                            </a>
                                        </span>
                                    </div>
                                </form>
                                <!-- END RESPONSIVE QUICK SEARCH FORM -->
                            </li>
                            <li class="nav-item start active open">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">Dashboard</span>
                                    <span class="selected"></span>
                                    <span class="arrow open"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item start active open">
                                        <a href="<?php echo $this->Url->build('/admin/dashboards/index', true); ?>" class="nav-link ">
                                            <i class="icon-bar-chart"></i>
                                            <span class="title">Dashboard</span>
                                            <span class="selected"></span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
<!--                            <li class="nav-item  ">
                                <a href="#" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">Task Management</span>
                                    <span class="arrow"></span>
                                </a>
								<ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="<?php echo $this->Url->build('/admin/tasks/list_task', true); ?>" class="nav-link ">
                                            <span class="title">Task Management</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>-->
<!--                            <li class="nav-item  ">
                                <a href="#" class="nav-link nav-toggle">
                                    <i class="icon-briefcase"></i>
                                    <span class="title">Policy Management</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="#" class="nav-link ">
                                            <span class="title">Client Management</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="<?php echo $this->Url->build('/admin/policies/list_policy', true); ?>" class="nav-link ">
                                            <span class="title"> New Policy </span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="#" class="nav-link ">
                                            <span class="title">Assign Policy</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>-->
<!--							<li class="nav-item  ">
                                <a href="#" class="nav-link nav-toggle">
                                    <i class="icon-briefcase"></i>
                                    <span class="title">Lead Management</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="<?php echo $this->Url->build('/admin/leads/list_lead', true); ?>" class="nav-link ">
                                            <span class="title">New Lead</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>-->
                            
                            
                            <li class="nav-item  ">
                                <a href="#" class="nav-link nav-toggle">
                                    <i class="icon-briefcase"></i>
                                    <span class="title">Celebrity Management</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="<?php echo $this->Url->build('/admin/celebrities/list_celebrity', true); ?>" class="nav-link ">
                                            <span class="title">New celebrity</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                             <li class="nav-item  ">
                                <a href="#" class="nav-link nav-toggle">
                                    <i class="icon-briefcase"></i>
                                    <span class="title">Visitor Management</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="<?php echo $this->Url->build('/admin/visitors/list_visitor', true); ?>" class="nav-link ">
                                            <span class="title">New Visitor</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                              <li class="nav-item  ">
                                <a href="#" class="nav-link nav-toggle">
                                    <i class="icon-briefcase"></i>
                                    <span class="title">Category Management</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="<?php echo $this->Url->build('/admin/categories/list_category', true); ?>" class="nav-link ">
                                            <span class="title">New Category</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item  ">
                                <a href="#" class="nav-link nav-toggle">
                                    <i class="icon-briefcase"></i>
                                    <span class="title">Event Management</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="<?php echo $this->Url->build('/admin/eventDetails/event_list', true); ?>" class="nav-link ">
                                            <span class="title">Add Event Details</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            
                            <li class="nav-item  ">
                                <a href="#" class="nav-link nav-toggle">
                                    <i class="icon-briefcase"></i>
                                    <span class="title">Event Organizer Management</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="<?php echo $this->Url->build('/admin/users/list_eventmanager', true); ?>" class="nav-link ">
                                            <span class="title">Add Event Manager</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            
                            
                            <li class="nav-item  ">
                                <a href="#" class="nav-link nav-toggle">
                                    <i class="icon-briefcase"></i>
                                    <span class="title">User Status Management</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="<?php echo $this->Url->build('/admin/users/all_userlist', true); ?>" class="nav-link ">
                                            <span class="title">User Status Change</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            
                            
                            
                        </ul>
                        <!-- END SIDEBAR MENU -->
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>