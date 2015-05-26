<!-- 
    Reception
-->
<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
 
                        <li>
                            <a href="<?php echo $url?>dashboard/"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                        <a href="#"><i class="fa fa-dollar fa-fw"></i>Billing<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo $url?>dashboard/billing/">View Billing</a>   
                            </li>
                        </ul>
                        </li>
                        <li>
                        <a href="#"><i class="fa fa-calendar fa-fw"></i>Bookings<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo $url?>dashboard/walkInClient/1">Walk in Client</a>   
                            </li>
                        </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Client Records<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $url?>dashboard/walkInClient/2">Add New Client</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url?>dashboard/clients/">View All Clients</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url?>dashboard/editClient/">Edit All Clients</a>
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