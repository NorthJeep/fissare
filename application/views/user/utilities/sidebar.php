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
                            <a href="<?php echo base_url('C_user/index');?>">
                                <i class="livicon" data-name="home" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="livicon" data-name="gear" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Library Management</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="<?php echo base_url('C_user/Supported_System');?>">
                                        <i class="fa fa-angle-double-right"></i>
                                        Supported System
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('C_user/Error');?>">
                                        <i class="fa fa-angle-double-right"></i>
                                        Error
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('C_user/Instruction');?>">
                                        <i class="fa fa-angle-double-right"></i>
                                        Instruction
                                    </a>
                                </li>     
                                <li>
                                    <a href="<?php echo base_url('C_user/Attachment');?>">
                                        <i class="fa fa-angle-double-right"></i>
                                        Attachment
                                    </a>
                                </li>
                            </ul>
                        </li>     
                        <li>
                            <a href="<?php echo base_url('C_user/Request');?>">
                                <i class="livicon" data-name="user-flag" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Request</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('C_user/migrate');?>">
                                <i class="livicon" data-name="upload" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Import</span>
                            </a>
                        </li>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
            </section>
            <!-- /.sidebar -->
        </aside>