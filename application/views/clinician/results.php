<div class="container-fluid">
<div class="row">
<div id="tab-content-results" class="tab-content">

  <div class="col-lg-3">
      <ul class="nav nav-pills nav-stacked" data-tabs="tabs" id="packages-tabs">
          <li class="active" id="questionaire-result-tab"><a href="#questionaire" data-toggle="tab">Questionaire</a></li> 
          <li id="clinician-results-tab"><a href="#clinician" data-toggle="tab">Clinician Results</a></li>
          <li id="blood-results-tab"><a href="#bloods" data-toggle="tab">Blood Results</a></li>
          <li id="comments-results-tab"><a href="#comments" data-toggle="tab">Clinician Assesment</a></li>
      </ul>
  </div>

  <div class="col-lg-9">
  <div id="tab-content-results" class="tab-content">
     <div class="tab-pane active" id="questionaire">
      <?php
        if($questionaire != ""){
        	$a = json_decode($questionaire, true);?>
        <table class="table">
        	<tr><th>Detail</th><th>Result</th></tr>
      		<?php foreach ($a as $key => $value) {
      			 if($value != ""){
      			?>
      		<tr><td><?php echo str_replace("_"," ",$key);?></td><td><?php echo $value?></td></tr>
        <?php }}?>
       </table>
        <?php }?>
     </div>
     <div class="tab-pane" id="clinician">
       <?php
        if($clinicianresults != ""){
        	$b = json_decode($clinicianresults, true);?>
        <table class="table">
        	<tr><th>Detail</th><th>Result</th></tr>
      		<?php foreach ($b as $key => $value) {
      			 if($value != ""){
      			?>
      		<tr><td><?php echo str_replace("_"," ",$key);?></td><td><?php echo $value?></td></tr>
        <?php }}?>
       </table>
        <?php }?>
     </div>
     <div class="tab-pane" id="bloods">
       <?php
        if($scientisttests != ""){
        	$c = json_decode($scientisttests, true);?>
        <table class="table">
        	<tr><th>Detail</th><th>Result</th></tr>
      		<?php foreach ($c as $key => $value) {
      			 if($value != ""){
      			?>
      		<tr><td><?php echo str_replace("_"," ",$key);?></td><td><?php echo $value?></td></tr>
        <?php }}?>
       </table>
        <?php }?>
     </div>
     <div class="tab-pane" id="comments">
					<textarea name="clinician_comments" rows="10" cols="50"></textarea><br/><br/>
					<input type="submit" name="save_comments" value="Save Comments" class="btn btn-lg btn-success"/>
					<input type="submit" name="print" value="Print Out Report" class="btn btn-lg btn-success">
     </div>
   </div>
  </div>
</div>
</div>
</div>