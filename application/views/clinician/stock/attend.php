<?php
   $url = $this->config->item('base_url');
   $theDate = getCalendarDateTodayFull();
?>
<div id="client-id"></div>

<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-calendar fa-fw"></i>Attending to Client: <h3><div id="client-name"></div></h3></div>
</div>

<div class="panel-body">

   <ul class="nav nav-tabs" data-tabs="tabs" id="clinician-tabs">
    <li class="active" id="records-tab"><a href="#records" data-toggle="tab">Patient File</a></li>
    <li><a href="#packages" data-toggle="tab">Packages</a></li>
    <li id="questionaire-tab"><a href="#questionaire" data-toggle="tab">Questionaire</a></li>
    <li id="tests-tab"><a href="#tests" data-toggle="tab">Tests</a></li>      
    <li id="results-tab"><a href="#results" data-toggle="tab">Results</a></li>        
  </ul>

  <div id="tab-content" class="tab-content">
    <div class="tab-pane active" id="records">

    </div>
    <div class="tab-pane" id="packages">
    	<?php include_once('packages.php');?>
    </div>
    <div class="tab-pane" id="questionaire">
        <?php include_once('questionaire.php');?>
    </div>
    <div class="tab-pane" id="tests">

    </div>
    <div class="tab-pane" id="results">
    <br/><br/>
    <p align="center"><a class="btn btn-lg btn-success" href="<?php echo $url?>dashboard/testsResults/<?php echo $this->session->userdata('attend');?>/<?php echo $theDate;?>">View Results for Client 
        <?php echo $this->session->userdata('attend');?></a></p>

      <table class="table small">
        <tr>
            <th>Test</th><th>Results</th>
        </tr>
        <tbody id="items-results"></tbody>
        
        </table>
    </div>
</div>

</div>
