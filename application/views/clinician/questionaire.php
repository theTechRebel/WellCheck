
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

        	<div class='col-lg-12'>
        		<h3 align='center'>Corporate Package</h3>
        	<div class='table-responsive'>
        	<form name='package' method='post' action='<?php echo $url?>dashboard/stage/' class='form-packages'>
        		<table class='table small'>
												<td>Description</td><td>Amount</td>
        			<tbody>
        				<tr><td><input type='checkbox' name='corporate[]' value='visualtest_5'>Visual Test</td><td>$5.00</td></tr>
        			</tbody>
        		</table>
        		<input type='submit' name='submit' class='bill' value='Bill Corporate'/>
        	</form>
        	</div>
        	</div>

		       <br/>


        	<h3 align='center'>Well Living</h3>
        	<div class='col-lg-4'>
        		<h3 align='center'>Basic</h3>
        	<div class='table-responsive'>
        	<form name='package' method='post' action='<?php echo $url?>dashboard/stage/' class='form-packages'>
        		<table class='table small'>
        			<td>Description</td><td>Amount</td>
        			<tbody>
        				<tr><td><input type='checkbox' name='basic[]' value='bp_5'>Blood Pressure</td><td>$5.00</td></tr>
        				<tr><td><input type='checkbox' name='basic[]' value='bloodsugar_5'>Blood Sugar</td><td>$5.00</td></tr>
        				<tr><td><input type='checkbox' name='basic[]' value='bmi_5'>Body Mass Index</td><td>$5.00</td></tr>
        				<tr><td><input type='checkbox' name='basic[]' value='bloodtest_5'>Blood Test</td><td>$5.00</td></tr>
        				<tr><td><input type='checkbox' name='basic[]' value='bloodtype_5'>Blood Type</td><td>$5.00</td></tr>
        				<tr><td><input type='checkbox' name='basic[]' value='urine_5'>Urine Test</td><td>$5.00</td></tr>
        			</tbody>
        		</table>
        		<input type='submit' name='submit' class='bill' value='Bill Basic'/>
        	</form>
        	</div>
        	</div>
        	<div class='col-lg-4'>
        		<h3 align='center'>Standard</h3>
        	<div class='table-responsive'>
        	<form name='package' method='post' action='<?php echo $url?>dashboard/stage/' class='form-packages'>
        		<table class='table small'>
											<td>Description</td><td>Amount</td>
        			<tbody>
        				<tr><td><input type='checkbox' name='standard[]' value='hiv_5'/>HIV AIDS test</td><td>$5.00</td></tr>
        				<tr><td><input type='checkbox' name='standard[]' value='hdl_5'/>HDL test</td><td>$5.00</td></tr>
        				<tr><td><input type='checkbox' name='standard[]' value='totalcholesterol_5'/>Total Cholesterol test</td><td>$5.00</td></tr>
        				<tr><td><input type='checkbox' name='standard[]' value='viac_5'/>VIAC test</td><td>$5.00</td></tr>
        			</tbody>
        		</table>
        		<input type='submit' name='submit' class='bill' value='Bill Standard'/>
        	</form>
        	</div>
        	</div>
        	<div class='col-lg-4'>
        		<h3 align='center'>Comprehensive</h3>
        	<div class='table-responsive'>
        	<form name='package' method='post' action='<?php echo $url?>dashboard/stage/' class='form-packages'>
        		<table class='table small'>
												<td>Description</td><td>Amount</td>
        			<tbody>
        				<tr><td><input type='checkbox' name='comprehensive[]' value='ldl_5'>LDL Cholesterol</td><td>$5.00</td></tr>
        				<tr><td><input type='checkbox' name='comprehensive[]' value='trigs_5'>TRIGS</td><td>$5.00</td></tr>
        				<tr><td><input type='checkbox' name='comprehensive[]' value='hba1c_5'>HBA1c</td><td>$5.00</td></tr>
        				<tr><td><input type='checkbox' name='comprehensive[]' value='ecg_5'>ECG</td><td>$5.00</td></tr>
        				<tr><td><input type='checkbox' name='comprehensive[]' value='hepatitis_5'>Hepatitis Screen</td><td>$5.00</td></tr>
        				<tr><td><input type='checkbox' name='comprehensive[]' value='cea_5'>CEA</td><td>$5.00</td></tr>
        				<tr><td><input type='checkbox' name='comprehensive[]' value='ca125_5'>CA-125</td><td>$5.00</td></tr>
        				<tr><td><input type='checkbox' name='comprehensive[]' value='psa_5'>PSA</td><td>$5.00</td></tr>
        				<tr><td><input type='checkbox' name='comprehensive[]' value='alphafetoprotein_5'>Alpha Feto Protein</td><td>$5.00</td></tr>
        			</tbody>
        		</table>
        		<input type='submit' name='submit' class='bill' value='Bill Comprehensive'/>
        	</form>
        	</div>
        	</div>

        
        </div>
        <div class="tab-pane" id="questionaire">
            
        </div>
        <div class="tab-pane" id="tests">
            
        </div>
        <div class="tab-pane" id="results">
            
        </div>
    </div>
</div>
