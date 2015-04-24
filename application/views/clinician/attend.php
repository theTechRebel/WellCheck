
<div id="client-id"></div>

<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-calendar fa-fw"></i>Attending to Client: <h3><div id="client-name"></div></h3></div>
    </div>
    <!-- /.panel-heading -->
    <div class="panel-body">
					<ul class="nav nav-tabs" data-tabs="tabs" id="clinician-tabs">
        <li class="active"><a href="#records" data-toggle="tab">Patient File</a></li>
        <li><a href="#packages" data-toggle="tab">Packages</a></li>
        <li id="questionaire-tab"><a href="#questionaire" data-toggle="tab">Questionaire</a></li>
        <li id="tests-tab"><a href="#tests" data-toggle="tab">Tests</a></li>      
        <li id="results-tab"><a href="#results" data-toggle="tab">Results</a></li>        
      </ul>
          <div id="tab-content" class="tab-content">
        <div class="tab-pane active" id="records">
            <div id="client-records">
            </div>
        </div>
        <div class="tab-pane" id="packages">

        	<?php include_once('packages.php');?>

        
        </div>
        <div class="tab-pane" id="questionaire">
            
        </div>
        <div class="tab-pane" id="tests">
            
        </div>
        <div class="tab-pane" id="results">
            
        </div>
    </div>
</div>
