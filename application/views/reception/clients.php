<div class="container-fluid">
<div class="row">
	<h5><font color="red"><?php if(isset($report)){echo $report;} ?></font></h5>
			<table class="table table-condensed table-bordered table-hover">
				<td>WellCheck ID</td><td>ID Number</td><td>Salutation</td><td>Name</td><td>Surname</td><td>Book Client</td><td>Book Another Date</td><td>Edit Records</td>
				<tbody>
				<?php foreach ($patientrecords->result() as $row): ?>
					<tr>
						<td><?php echo $row->clientnumber;?></td>
						<td><?php echo $row->idnumber;?></td>
						<td><?php echo $row->salutation;?></td>
						<td><?php echo $row->names;?></td>
						<td><?php echo $row->surname;?></td>
						<td><?php echo getCalendarDateTodayFull(); ?><br/><a href="<?php echo $url?>dashboard/booking/<?php echo $row->clientnumber;?>">Book today</a></td>
						<td><form action="http://localhost/wellness/dashboard/booking/<?php echo $row->clientnumber;?>" id="my_form" method="post">
						<input type="hidden" name="clientNumber" value="<?php echo $row->clientnumber;?>">
						<input type='text' name='booking' size='10' value='' class='bookDay' /><br/>
						<a href="javascript:{}" onclick="document.getElementById('my_form').submit(); return false;">Book Selected date</a></form></td>
						<td><a href="http://localhost/wellness/dashboard/edit/<?php echo $row->idnumber;?>">Edit Record</a></td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
			<?php echo $this->pagination->create_links(); ?>
</div>
</div>