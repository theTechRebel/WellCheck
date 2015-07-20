<!-- /.panel -->
<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-gear fa-fw"></i>Stocks</div>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">

    <div class="table-responsive">
        <h3>Transactions for month <?php echo date("F", mktime(0, 0, 0, $month, 10));?></h3>
    <table class="table table-condensed table-striped table-bordered table-hover">
    <tr><th>Record Number</th><th>WellCheck ID</th><th>Date</th><th>Salutation</th><th>Names</th><th>Surname</th><th>Gender</th><th>View Test Results</th></tr>
            <?php $iterator = $currentOffset;?>
            <?php foreach ($records->result() as $row): ?>
                <tr>
                    <td>
                        <?php echo $iterator += 1;?>
                    </td>
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

            <p align="center">There are a total of <?php echo $actualTotal ?> records for this month. Showig 10 records per page. Click the numbered buttons to show more records.</p>
            <p align="center">
            <?php
                $pages = $recordsPerPage / $perPage;

                for ($i=0; $i < $pages; $i++) { 
                    $tenItems = $i * $perPage;
                    if($currentOffset == $tenItems){
                    echo "<a class='btn btn-success disabled' href='$paginationURL$tenItems'>".$i * $perPage.' to '.($i +1) * $perPage."</a>&nbsp;";
                    }else{
                    echo "<a class='btn btn-success' href='$paginationURL$tenItems'>".$i * $perPage.' to '.($i +1) * $perPage."</a>&nbsp;";                       
                    }

                }
            ?>
            </p>
    </div><p align="center">
    <a href="<?php echo base_url('dashboard/testHistory/'.$year.'/'.$prev); ?>" class="btn btn-lg btn-success">Previous Month</a>
    <a href="<?php echo base_url('dashboard/testHistory/'.$year.'/'.$next); ?>" class="btn btn-lg btn-success">Next month</a>
    <a href="<?php echo base_url('dashboard/testHistory/'); ?>" class="btn btn-lg btn-success">Back to Current Month</a></p>
    </div>
<!-- /.panel -->