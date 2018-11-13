<div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <section class="sidebar ">
                <div class="page-sidebar  sidebar-nav">
                    <div class="nav_icons">
						</div>
                    <div class="clearfix"></div>
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul id="menu" class="page-sidebar-menu">
                        <li>
                            <a href="<?php echo base_url('C_admin/index');?>">
                                <i class="livicon" data-name="home" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="livicon" data-name="users" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">User Management</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="<?php echo base_url('C_admin/Role');?>">
                                        <i class="fa fa-angle-double-right"></i>
                                        Add Role
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('C_admin/User');?>">
                                        <i class="fa fa-angle-double-right"></i>
                                        Add User
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('C_admin/Agency');?>">
                                        <i class="fa fa-angle-double-right"></i>
                                        Add Agencies
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="livicon" data-name="gear" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Library Management</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="<?php echo base_url('C_admin/Supported_System');?>">
                                        <i class="fa fa-angle-double-right"></i>
                                        Supported System
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('C_admin/Error');?>">
                                        <i class="fa fa-angle-double-right"></i>
                                        Error
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('C_admin/Instruction');?>">
                                        <i class="fa fa-angle-double-right"></i>
                                        Instruction
                                    </a>
                                </li>     
                                <li>
                                    <a href="<?php echo base_url('C_admin/Attachment');?>">
                                        <i class="fa fa-angle-double-right"></i>
                                        Attachment
                                    </a>
                                </li>     
                                <li>
                                    <a href="<?php echo base_url('C_admin/Request');?>">
                                        <i class="fa fa-angle-double-right"></i>
                                        Request
                                    </a>
                                </li>     
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url('C_admin/Migrate');?>">
                                <i class="livicon" data-name="search" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Import Data</span>
                            </a>
                        </li>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
            </section>
            <!-- /.sidebar -->
        </aside>