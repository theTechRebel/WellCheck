<!DOCTYPE html>
<?php
   $url = $this->config->item('base_url');
?>
<html>
  <head>
  <link rel="icon" 
      type="image/png" 
      href="<?php echo $url;?>uiux/img/favicon.png">
    <title>Wellnes Center</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $url?>uiux/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $url?>uiux/bootstrap/css/bootstrap-theme.min.css">

    <!-- Full Calendar -->
    <link href="<?php echo $url?>uiux/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">

    <!-- JQuery UI -->
    <link href="<?php echo $url?>uiux/jqueryui/jquery-ui.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo $url?>uiux/bootstrap/dashboard/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo $url?>uiux/bootstrap/dashboard/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $url?>uiux/bootstrap/dashboard/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo $url?>uiux/bootstrap/dashboard/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo $url?>uiux/bootstrap/dashboard/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
.calendar {
  font-family: Arial, Verdana, Sans-serif;
  width: auto;
  border-collapse: collapse;
}

.calendar tbody tr:first-child th {
  color: #505050;
  margin: 0 0 10px 0;
}

.day_header {
  font-weight: normal;
  text-align: center;
  color: #757575;
  font-size: 10px;
}

.calendar td {
  width: 14%; /* Force all cells to be about the same width regardless of content */
  border:1px solid #CCC;
  height: 70px;
  vertical-align: top;
  font-size: 10px;
  padding: 0;
}

.day_listing {
  display: block;
  height: 100%;
  width: 100%;
  text-align: right;
  font-size: 12px;
  color: #2C2C2C;
  padding: 0 0 0 0;
}

div.today {
  background: #E9EFF7;
  height: 70%;
}

.selected{
  background: #8FBC8F;
}


.this-day{
  height: 90%;
}

.disabled{
  pointer-events: none;
}
.panel {
    margin-bottom: 0px;
    }
body{
  font-size: 12px;
  font-style: sans-serif;
}
.table{
  font-size: 12px;
  font-style: sans-serif;
}
.form-control{
  height:40px;
}
</style>
  </head>