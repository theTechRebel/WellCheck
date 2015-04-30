<?php
   $url = $this->config->item('base_url');
?>

<script type="text/javascript" src="<?php echo $url?>uiux/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $url?>uiux/bootstrap/js/bootstrap.min.js"></script>
   <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo $url?>uiux/bootstrap/dashboard/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo $url?>uiux/bootstrap/dashboard/bower_components/raphael/raphael-min.js"></script>
    <script src="<?php echo $url?>uiux/bootstrap/dashboard/bower_components/morrisjs/morris.min.js"></script>
    <script src="<?php echo $url?>uiux/bootstrap/dashboard/js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo $url?>uiux/bootstrap/dashboard/dist/js/sb-admin-2.js"></script>
    <script src="<?php echo $url?>uiux/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
    <script src="<?php echo $url?>uiux/jqueryui/jquery-ui.min.js"></script>
<?php if(isset($js_files)){
 foreach($js_files as $file){?>
    <script src="<?php echo $file; ?>"></script>
<?php }} ?>