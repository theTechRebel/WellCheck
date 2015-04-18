<!-- 
    Reception
-->
<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?php echo $url?>dashboard/"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                        <a href="#"><i class="fa fa-calendar fa-fw"></i>Bookings<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo $url?>dashboard/walkInClient/">Walk in Client</a>   
                            </li>
                        </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Client Records<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $url?>dashboard/walkInClient/">Add New Client</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url?>dashboard/clients/">View All Clients</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                        <a href="<?php echo $url?>home/logout/"><i class="fa fa-sign-out fa-fw"></i>Log Out</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->