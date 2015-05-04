<!-- /.panel -->
<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-gear fa-fw"></i>Stocks</div>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">

    <div class="table-responsive">
        <h3>Transactions for month <?php echo date("F", mktime(0, 0, 0, $month, 10));?></h3>
    <table class="table table-condensed table-striped table-bordered table-hover">
        <tr><th>WellCheck ID</th><th>Date</th><th>Salutation</th><th>Names</th><th>Surname</th><th>Gender</th><th>View Test Results</th></tr>
            <?php foreach ($records->result() as $row): ?>
                <tr>
                    <td>
                        <?php echo $row->clientnumber;?>
                    </td>
                    <td>
                        <?php echo $row->date;?>
                    </td>                     
                    <td>
                        <?php echo $row->salutation;?>
                    </td>
                    <td>
                        <?php echo $row->names;?>
                    </td>
                    <td>
                        <?php echo $row->surname;?>
                    </td>
                    <td>
                        <?php echo $row->gender;?>
                    </td>
                    <td>
                        <a href="<?php echo base_url('dashboard/testsResults/'.$row->clientnumber.'/'.$row->date);?>">View Results</a>
                    </td>
                </tr>
            <?php endforeach;?>
          </table>
            <?php echo $this->pagination->create_links(); ?>
    </div>
    <a href="<?php echo base_url('dashboard/testHistory/'.$year.'/'.$prev); ?>" class="btn btn-lg btn-success">Previous Month</a>
    <a href="<?php echo base_url('dashboard/testHistory/'.$year.'/'.$next); ?>" class="btn btn-lg btn-success">Next month</a>
    <a href="<?php echo base_url('dashboard/testHistory/'); ?>" class="btn btn-lg btn-success">Reset</a>
    </div>
<!-- /.panel -->