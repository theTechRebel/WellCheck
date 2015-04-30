
<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-calendar fa-fw"></i>Calendar</div>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">

				<div class="container-fluid" id="hidden-form">
						<form>
			    		<div class="dropdown">
								  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
								    Select a client to Book
								    <span class="caret"></span>
								  </button>
								  <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
								  <?php foreach($patients->result() as $patient): ?>	
								  <li role="presentation">
									  <a role="menuitem" tabindex="-1" class="clickBook" id="<?php echo $patient->idnumber;?>">
									  <?php echo $patient->names." ".$patient->surname." ".$patient->idnumber;?>
									  </a>
								  </li>
								  <?php endforeach; ?>
								  		<p align="center"><?php echo $this->pagination->create_links(); ?></p>
										  <p align="center"><a href="http://localhost/wellness/dashboard/walkInClient/2"><b>+</b> Add As New Client</a></p>
								  </ul>
	</div>
		    </form>
				</div>

    <div class="table-responsive">
    	<?php
    	if(isset($bookings)){
    		echo $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4),$bookings);
    	}else{
    		echo $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4));
    	}
							
    	?>
    </div>
    <label id="dates"><?php echo $dates;?></label>
    </div>
<!-- /.panel -->