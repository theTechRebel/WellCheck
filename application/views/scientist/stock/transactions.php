<!-- /.panel -->
<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-gear fa-fw"></i>Stocks</div>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">

    <div class="table-responsive">
        <h3>Transactions for month <?php echo date("F", mktime(0, 0, 0, $month, 10));?></h3>
    <table class="table table-condensed table-striped table-bordered table-hover">
        <tr><th>Item Code</th><th>Item Name</th><th>Date</th><th>Stock Activity</th></tr>
            <?php foreach ($transactions->result() as $row): ?>
                <tr>
                    <td>
                        <?php echo $row->code;?>
                    </td>
                    <td>
                        <?php echo $row->title;?>
                    </td>
                    <td>
                        <?php echo $row->date;?>
                    </td>
                    <td>
                        <?php echo $row->ammount;?>
                    </td>
                </tr>
            <?php endforeach;?>
          </table>
            <?php echo $this->pagination->create_links(); ?>
    </div>
    <a href="<?php echo base_url('stocks/transactions/'.$year.'/'.$prev); ?>" class="btn btn-lg btn-success">Previous Month</a>
    <a href="<?php echo base_url('stocks/transactions/'.$year.'/'.$next); ?>" class="btn btn-lg btn-success">Next month</a>
    <a href="<?php echo base_url('stocks/'); ?>" class="btn btn-lg btn-success">Stocks</a>
    </div>
<!-- /.panel -->