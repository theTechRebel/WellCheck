<!-- /.panel -->
<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-gear fa-fw"></i>Stocks</div>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">

    <div class="table-responsive">
    <table class="table table-condensed table-striped table-bordered table-hover">
    	<tr><th>Item Code</th><th>Item Name</th><th>Description</th><th>Ammount Currently in Stock</th><th>Measurement</th><th>Add</th><th>Deduct</th></tr>
			<?php foreach ($stocks->result() as $row): ?>
				<tr>
					<td>
						<?php echo $row->code;?>
					</td>
					<td>
						<?php echo $row->title;?>
					</td>
					<td>
						<?php echo $row->description;?>
					</td>
					<td>
						<?php echo $row->instock;?>
					</td>
					<td>
						<?php echo $row->measurement;?>
					</td>
					<td>
						<a class='addStock' href="<?php echo base_url('stocks/update/'.$row->code); ?>" >Add to stock</a>
					</td>
						<td>
						<a class='deductStock' href="<?php echo base_url('stocks/deduct/'.$row->code); ?>">Deduct from stock</a>
					</td>
				</tr>
			<?php endforeach;?>
		  </table>
			<?php echo $this->pagination->create_links(); ?>
    </div>
    <a href="<?php echo base_url("stocks/add/");?>" class="btn btn-success btn-lg">Add New Stock Item</a>
    <a href="<?php echo base_url("stocks/transactions/");?>" class="btn btn-success btn-lg">View Transactions</a>
    </div>
<!-- /.panel -->