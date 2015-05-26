<?php
   $url = $this->config->item('base_url');
?>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $url?>">Wellness Application: <?php echo $this->session->userdata('rights');?> dashboard</a>
            </div>
            <!-- /.navbar-header -->

            <?php include_once('toplinks.php');?>

            <?php include_once('sidebar.php');?>

        </nav>

        <div id="page-wrapper">
<!-- Top Page Row -->

<!-- -->
<!-- Middle Page Row -->
            <div class="row">
                <div class="col-lg-8" id="attend">
                <?php include_once('questionaire.php');?>  
                </div>
                <div class="col-lg-4">
                <?php include_once('rightpatientstable.php');?>
                </div>
            </div>
<!-- -->
<!-- Bottom Page Row -->
            <?php //include_once('appsegments.php');?>
<!-- -->
        </div>
        <!-- /#page-wrapper -->
    </div>