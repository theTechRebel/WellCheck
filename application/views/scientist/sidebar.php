<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
 
                        <li>
                            <a href="<?php echo $url?>dashboard/"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                        <a href="#"><i class="fa fa-gear fa-fw"></i>Stock Management<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo $url?>stocks/">Stocks</a>   
                            </li>
                        </ul>
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Client Records<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo $url?>dashboard/testHistory/">View Clients Test Records</a>
                            </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        </li>
                        <li>
                        </li>
                        <li>
                        <a href="<?php echo $url?>home/logout/"><i class="fa fa-sign-out fa-fw"></i>Log Out</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->