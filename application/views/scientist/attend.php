
<div id="client-id"></div>

<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-calendar fa-fw"></i>Attending to Client: <h3><div id="client-name"></div></h3></div>
</div>

<div class="panel-body">

   <ul class="nav nav-tabs" data-tabs="tabs" id="clinician-tabs">
    <li class="active"><a href="#records" data-toggle="tab">Patient File</a></li>
    <li id="tests-tab"><a href="#tests" data-toggle="tab">Tests</a></li>
    <li id="results-tab"><a href="#results" data-toggle="tab">Results</a></li>      
  </ul>

  <div id="tab-content" class="tab-content">
    <div class="tab-pane active" id="records">

    </div>
    <div class="tab-pane" id="tests">
        <ul class="nav nav-tabs" data-tabs="tabs" id="scientist-test-tabs">
            <li id="basic-tab"><a href="#basic" data-toggle="tab">Basic</a></li>
            <li id="standard-tab"><a href="#standard" data-toggle="tab">Standard</a></li>
            <li id="comprehensive-tab"><a href="#comprehensive" data-toggle="tab">Comprehensive</a></li>  
            <li id="once-tab"><a href="#once" data-toggle="tab">Once Off Tests</a></li>   
        </ul>
        <div id="tab-content-tests" class="tab-content">
            <div class="tab-pane" id="basic">
              <form class="form-horizontal form-tests" role="form">
                  <fieldset id="hemoglobin">
                    <legend>Hemoglobin Test</legend>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Hemoglobin</label>
                      <div class="col-sm-9">
                      <input type="text" name="hemoglobin" value=""/>
                      </div>
                    </div>
                   </fieldset>
                <input type="submit" class="btn btn-success btn-lg col-sm-12" value="Save Test" name="save-basic">
              </form>
            </div>
            <div class="tab-pane" id="standard">
                  <form class="form-horizontal form-tests" role="form">

                    <fieldset id="hiv">
                    <legend>HIV/ AIDS Test</legend>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">HIV / AIDS Test</label>
                      <div class="col-sm-9">
                         <select class="form-control" name="hiv">
                         <option value="">Select Test Result</option>
                          <option value="positive">Positive</option>
                          <option value="negetive">Negative</option>
                        </select> 

                      </div>
                    </div>
                   </fieldset>

                    <fieldset id="hdltcholesterol">
                    <legend>HDL & T-Cholesterol Test</legend>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">HDL Cholesterol</label>
                      <div class="col-sm-3">
                        <input class="form-control" name="hdl" type="text">
                      </div>

                      <label class="col-sm-3 control-label">T-Cholesterol</label>
                      <div class="col-sm-3">
                        <input class="form-control" name="tcholesterol" type="text">
                      </div>
                    </div>
                    </fieldset>

                    <fieldset id="urine">
                    <legend>Urine Test</legend>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Blood</label>
                      <div class="col-sm-3">
                        <input class="form-control" type="text" name="blood">
                      </div>

                      <label class="col-sm-3 control-label">Bilirubin</label>
                      <div class="col-sm-3">
                        <input class="form-control" type="text" name="bilirubin">
                      </div>

                      <label class="col-sm-3 control-label">Urobilinogen</label>
                      <div class="col-sm-3">
                        <input class="form-control" type="text" name="urobilinogen">
                      </div>

                      <label class="col-sm-3 control-label">Ketones</label>
                      <div class="col-sm-3">
                        <input class="form-control" type="text" name="ketones">
                      </div>

                      <label class="col-sm-3 control-label">Glucose</label>
                      <div class="col-sm-3">
                        <input class="form-control" type="text" name="glucose">
                      </div>

                      <label class="col-sm-3 control-label">Protein</label>
                      <div class="col-sm-3">
                        <input class="form-control" type="text" name="protein">
                      </div>
                      
                      <label class="col-sm-3 control-label">Nitrite</label>
                      <div class="col-sm-3">
                        <input class="form-control" type="text" name="nitrite">
                      </div>

                      <label class="col-sm-3 control-label">Leukocytes</label>
                      <div class="col-sm-3">
                        <input class="form-control" type="text" name="leukocytes">
                      </div>

                      <label class="col-sm-3 control-label">pH</label>
                      <div class="col-sm-3">
                        <input class="form-control" type="text" name="ph">
                      </div>

                      <label class="col-sm-3 control-label">S.G</label>
                      <div class="col-sm-3">
                        <input class="form-control" type="text" name="sg">
                      </div>

                      <label class="col-sm-3 control-label">Ascorbic Acid</label>
                      <div class="col-sm-3">
                        <input class="form-control" type="text" name="ascorbic_acid">
                      </div>

                    </div>
                    </fieldset>
                    <input type="submit" class="btn btn-success btn-lg col-sm-12" value="Save Test" name="save-standard">
                  </form>
            </div>

            <div class="tab-pane" id="comprehensive">
                  <form class="form-horizontal form-tests" role="form">

                    <fieldset id="hiv">
                    <legend>HIV/ AIDS Test</legend>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">HIV / AIDS Test</label>
                      <div class="col-sm-9">
                         <select class="form-control" name="hiv">
                         <option value="">Select Test Result</option>
                          <option value="positive">Positive</option>
                          <option value="negetive">Negative</option>
                        </select> 

                      </div>
                    </div>
                   </fieldset>

                    <fieldset id="hdltcholesterol">
<legend>Lipid Profile</legend>
<div class="form-group">
<div class="col-lg-12">
<table class="table">
  <tr><th>Test</th><th>Result</th><th>Normal Ranges</th></tr>
  <tr><td>T.Cholesterol</td><td><input class="" type="text" name="t_cholesterol"></td><td>2.5 - 5.2 mMol/L</td></tr>
  <tr><td>Tryglycerides</td><td><input class="" type="text" name="triglycerides"></td><td>0.2 - 2.0 mMol/L</td></tr>
  <tr><td>HDL Cholesterol</td><td><input class="" type="text" name="hdl_cholesterol"></td><td>1.0 - 1.6 mMol/L</td></tr>
  <tr><td>LDL Cholesterol</td><td><input class="" type="text" name="ldl_cholesterol"></td><td>2.2 - 3.2 mMol/L</td></tr>
  <tr><td>Non HDL</td><td><input class="" type="text" name="non_hdl"></td><td></td></tr>
  <tr><td>TC/HDL ratio</td><td><input class="" type="text" name="tc_hdl_ratio"></td><td>< 0.87 mMol/L</td></tr>
  <tr><td>Glucose</td><td><input class="" type="text" name="glucose"></td><td> 3.9 - 5.8 mMol/L</td></tr>
</table>
</div>
</div>
                    </fieldset>

<fieldset id="urine">
                    <legend>Urine Test</legend>

 <table class="table">
  <tr><th>Test</th><th>Result</th></tr>
  <tr><td> <label>Blood</label></td><td><input type="text" name="blood"></td></tr>
  <tr><td><label>Bilirubin</label></td><td><input type="text" name="bilirubin"></td></tr>
  <tr><td><label>Urobilinogen</label></td><td><input type="text" name="urobilinogen"></td></tr>
  <tr><td><label>Ketones</label></td><td><input type="text" name="ketones"></td></tr>
  <tr><td><label>Glucose</label></td><td>   
  <select class="" name="urine_glucose">
   <option value="">Select A result</option>
    <option value="+">+</option>
    <option value="++">++</option>
    <option value="+++">+++</option>
    <option value="++++">++++</option>
  </select>
  </td></tr>
  <tr><td><label>Protein</label></td><td><input type="text" name="protein"></td></tr>
  <tr><td><label>Nitrite</label></td><td><input type="text" name="nitrite"></td></tr>
  <tr><td><label>Leukocytes</label></td><td><input type="text" name="leukocytes"></td></tr>
  <tr><td><label>pH</label></td><td><input type="text" name="ph"></td></tr>
  <tr><td><label>S.G</label></td><td><input type="text" name="sg"></td></tr>
  <tr><td><label>Ascorbic Acid</label></td><td><input type="text" name="ascorbic_acid"></td></tr>
 </table>
                    </fieldset>

                    <fieldset id="trigs">
                    <legend>TRIGS Test</legend>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">TRIGs</label>
                      <div class="col-sm-9">
                        <input class="form-control" name="trigs" type="text">
                      </div>
                    </div>
                    </fieldset>  
                    Negetive 
                    

                    <fieldset id="hba1c">
                    <legend>HBA1c Test</legend>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">HBA1c</label>
                      <div class="col-sm-9">
                        <input class="form-control" name="hba1c" type="text">
                      </div>
                    </div>
                    </fieldset>    

                    <fieldset id="hepatitisscreen">
                    <legend>Hepatitis Screen</legend>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Hepatitis A</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="hepatitis_A">
                         <option value="">Select Test Result</option>
                          <option value="positive">Positive</option>
                          <option value="negetive">Negative</option>
                        </select>
                      </div>
                      <label class="col-sm-3 control-label">Hepatitis B</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="hepatitis_B">
                         <option value="">Select Test Result</option>
                          <option value="positive">Positive</option>
                          <option value="negetive">Negative</option>
                        </select>
                      </div>
                      <label class="col-sm-3 control-label">Hepatitis C</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="hepatitis_C">
                         <option value="">Select Test Result</option>
                          <option value="positive">Positive</option>
                          <option value="negetive">Negative</option>
                        </select>
                      </div>
                    </div>
                    </fieldset>  

                    <fieldset id="psaviac">
                    <legend>PSA / VIAC Test</legend>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">PSA/VIAC</label>
                      <div class="col-sm-9">
                        <input class="form-control" name="psaviac" type="text">
                      </div>
                    </div>
                    </fieldset> 

                    <fieldset id="bloodgroup">
                    <legend>Blood Group Test</legend>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Blood Group</label>
                      <div class="col-sm-9">
                        <select class="form-control" name="hepatitis_C">
                         <option value="">Select A Blood Group</option>
                          <option value="A_Positive">A Positive</option>
                          <option value="B_Positive">B Positive</option>
                          <option value="AB_Positive">AB Positive</option>
                          <option value="O_Positive">O Positive</option>
                          <option value="A_Negative">A Negative</option>
                          <option value="B_Negative">B Negative</option>
                          <option value="AB_Negative">AB Negative</option>
                          <option value="O_Negative">O Negative</option>

                        </select>
                      </div>
                    </div>
                    </fieldset>                                               
                    <input type="submit" class="btn btn-success btn-lg col-sm-12" value="Save Test" name="save-comprehensive">
                  </form>          

            </div>
            <div class="tab-pane" id="once">
              <form class="form-horizontal form-tests" role="form">

                <div id="once-off">
                </div>
                
                <input type="submit" class="btn btn-success btn-lg col-sm-12" value="Save Tests" name="save-once-off">
              </form>
            </div>
        </div>
    </div>
    <div class="tab-pane" id="results">
      <table class="table small">
        <tr>
            <th>Test</th><th>Results</th>
        </tr>
        <tbody id="items"></tbody>

        </table>
    </div>
</div>

</div>
