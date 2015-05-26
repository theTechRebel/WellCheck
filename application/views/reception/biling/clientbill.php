<!-- /.panel -->
<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-dollar fa-fw"></i>Billing</div>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">

    <div class="panel panel-default">
    <p align="center">Health & Wellness Center </p>
    <p align="center"><?php echo $client->names." ".$client->surname;?></p>
    <p align="center">Package Undertaken:</p>
    <p align="center"><?php echo $client->package;?></p>
    <p align="center">Tests Taken under package:</p>
    <p align="center"><?php echo $client->test;?></p>
    <p align="center">Time Session start:</p>
    <p align="center"><?php echo $client->timein;?></p>
    <p align="center">Time Session end:</p>
    <p align="center"><?php echo $client->timeout;?></p>
    <p align="center">Total Cost of session:</p>
    <p align="center">$<?php echo $client->charge;?>.00</p>
    </div>
    <p align="center"><a href="http://localhost//wellness/dashboard/printReciept/<?php echo $client->clientnumber;?>/<?php echo $client->checkupdate;?>" class="btn btn-lg btn-success">Print Reciept</a></p>
    </div>
<!-- /.panel -->