
<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-calendar fa-fw"></i>Calendar</div>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">

    <p align="center">
    	<?php
    	if(isset($bookings)){
    		echo $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4),$bookings);
    	}else{
    		echo $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4));
    	}
							
    	?>
    </p>
    <label id="dates"><?php echo $dates;?></label>
    </div>
<!-- /.panel -->