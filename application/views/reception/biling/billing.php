<!-- /.panel -->
<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-dollar fa-fw"></i>Billing</div>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">


    <div class="table-responsive">
    <table class="table table-condensed table-striped">
    <td>WellCheck ID</td><td>Salutation</td><td>Name</td><td>Surname</td><td>Date</td><td>View Reciept</td>
				<tbody>
				<?php foreach ($clients->result() as $row): ?>
					<tr>
						<td><?php echo $row->clientnumber;?></td>
						<td><?php echo $row->salutation;?></td>
						<td><?php echo $row->names;?></td>
						<td><?php echo $row->surname;?></td>
						<td><?php echo $row->checkupdate;?></td>
						<td><a href="http://192.168.100.2/wellness/dashboard/billing/<?php echo $row->clientnumber;?>/<?php echo $row->checkupdate;?>">View Reciept</a></td>
					</tr>
					<?php endforeach;?>
				</tbody>
			</table>
    </div>
    </div>
<!-- /.panel -->