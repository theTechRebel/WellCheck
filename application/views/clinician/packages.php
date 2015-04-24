<div class="container-fluid">
    <div class="row">
    <div id="tab-content-packages" class="tab-content">
        <div class="col-lg-3">
            <ul class="nav nav-pills nav-stacked" data-tabs="tabs" id="packages-tabs">
                <li class="active" id="quick-tab"><a href="#quick" data-toggle="tab">Quick Check</a></li> 
                <li id="wellness-tab"><a href="#wellness" data-toggle="tab">Wellness Package</a></li>
                <li id="infections-tab"><a href="#infections" data-toggle="tab">Infections Check Pack</a></li>
                <li id="premarital-tab"><a href="#premarital" data-toggle="tab">Premarital Screen</a></li>
                <li id="antinetal-tab"><a href="#antinetal" data-toggle="tab">Anti Netal Check</a></li>      
                <li id="cancer-tab"><a href="#cancer" data-toggle="tab">Cancer Package</a></li> 
                <li id="corporate-tab"><a href="#corporate" data-toggle="tab">Corporate Medical Exams</a></li>
                <li id="vaccinations-tab"><a href="#vaccinations" data-toggle="tab">Vaccinations</a></li>
                <li id="drugs-tab"><a href="#drugs" data-toggle="tab">Drugs Check</a></li>
            </ul>
        </div>
        <div class="col-lg-9">
        <div id="tab-content-packages" class="tab-content">
                <div class="tab-pane active" id="quick">
                    <div class='table-responsive'>
                    <form name='package' method='post' action='<?php echo $url?>dashboard/stage/' class='form-packages'>
                    <table class='table small'>
                    <td>Description</td><td>Amount</td>
                    <tbody>
                    <tr><td><input type='checkbox' name='quick[]' value='bp_1'/>Blood Pressure Test</td><td>$1.00</td></tr>
                    <tr><td><input type='checkbox' name='quick[]' value='weight_1'/>Weight</td><td>$1.00</td></tr>
                    <tr><td><input type='checkbox' name='quick[]' value='bmi_1'/>Body Mass Index</td><td>$1.00</td></tr>
                    <tr><td><input type='checkbox' name='quick[]' value='O2saturation_2'/>O2 Saturation</td><td>$1.00</td></tr>
                    </tbody>
                    </table>
                    <input class="btn btn-success" type='submit' name='submit' class='bill' value='Bill Quick Check'/>
                    </form>
                    </div>
                </div>
                <div class="tab-pane" id="wellness">
                
                <div class="row">
                    <div class="col-lg-4">
                    <div class='table-responsive'>
                    <form name='package' method='post' action='<?php echo $url?>dashboard/stage/' class='form-packages'>
                    <table class='table small'>
                    <td>Description</td><td>Amount</td>
                    <tbody>
                    <tr><h3 align="center">Basic</h3></tr>
                    <tr><td><input type='checkbox' name='basic[]' value='height_0'/>Height</td><td>$00.00</td></tr>
                    <tr><td><input type='checkbox' name='basic[]' value='bmi_5'/>Body Mass Index</td><td>$5.00</td></tr>
                    <tr><td><input type='checkbox' name='basic[]' value='sugar_5'/>Sugar Test</td><td>$5.00</td></tr>
                    <tr><td><input type='checkbox' name='basic[]' value='hemoglobin_5'/>Hemoglobin</td><td>$5.00</td></tr>
                    </tbody>
                    </table>
                    <input class="btn btn-success" type='submit' name='submit' class='bill' value='Bill Basic Check'/>
                    </form>
                    </div>  
                    </div>
                    <div class="col-lg-4">
                    <div class='table-responsive'>
                    <form name='package' method='post' action='<?php echo $url?>dashboard/stage/' class='form-packages'>
                    <table class='table small'>
                    <td>Description</td><td>Amount</td>
                    <tbody>
                    <tr><h3 align="center">Standard</h3></tr>
                    <tr>This package includes all basic tests +:</tr>
                    <tr><td><input type='checkbox' name='standard[]' value='hiv_8'/>H.I.V/AIDS Test</td><td>$8.00</td></tr>
                    <tr><td><input type='checkbox' name='standard[]' value='hdltcholesterol_12'/>HDL & T.Cholesterol</td><td>$12.00</td></tr>
                    <tr><td><input type='checkbox' name='standard[]' value='urine_5'/>Urine Test</td><td>$5.00</td></tr>
                    </tbody>
                    </table>
                    <input class="btn btn-success" type='submit' name='submit' class='bill' value='Bill Standard Check'/>
                    </form>
                    </div>
                    </div>
                    <div class="col-lg-4">
                    <div class='table-responsive'>
                    <form name='package' method='post' action='<?php echo $url?>dashboard/stage/' class='form-packages'>
                    <table class='table small'>
                    <td>Description</td><td>Amount</td>
                    <tbody>
                    <tr><h3 align="center">Comprehensive</h3></tr>
                    <tr>This package includes all basic & standard tests +:</tr>
                    <tr><td><input type='checkbox' name='comprehensive[]' value='ldl_20'/>LDL Cholesterol</td><td>$20.00</td></tr>
                    <tr><td><input type='checkbox' name='comprehensive[]' value='trigs_20'/>TRIGs</td><td>$20.00</td></tr>
                    <tr><td><input type='checkbox' name='comprehensive[]' value='hba1c_15'/>HBA1c</td><td>$15.00</td></tr>
                    <tr><td><input type='checkbox' name='comprehensive[]' value='ecg_20'/>ECG</td><td>$20.00</td></tr>
                    <tr><td><input type='checkbox' name='comprehensive[]' value='hepatitisscreen_10'/>Hepatitis Screen</td><td>$10.00</td></tr>
                    <tr><td><input type='checkbox' name='comprehensive[]' value='psaviac_10'/>PSA/VIAC</td><td>$10.00</td></tr>
                    <tr><td><input type='checkbox' name='comprehensive[]' value='bloodgroup_5'/>Blood Group</td><td>$5.00</td></tr>
                    </tbody>
                    </table>
                    <input class="btn btn-success" type='submit' name='submit' class='bill' value='Bill Quick Check'/>
                    </form>
                    </div>
                    </div>
                </div>



                </div>
                <div class="tab-pane" id="infections">
                    <div class='table-responsive'>
                    <form name='package' method='post' action='<?php echo $url?>dashboard/stage/' class='form-packages'>
                    <table class='table small'>
                    <td>Description</td><td>Amount</td>
                    <tbody>
                    <tr><td><input type='checkbox' name='infections[]' value='hiv,hepatitisscreen_10'/>HIV/AIDS, Hepatitis Screen</td><td>$19.00</td></tr>
                    <tr><td><input type='checkbox' name='infections[]' value='sphyillis,chlamydia_16'/>sphyillis, chlamydia</td><td>$16.00</td></tr>
                    <tr><td><input type='checkbox' name='infections[]' value='gonnorrhea_10'/>Gonnorrhea</td><td>$10.00</td></tr>
                    <tr><td><input type='checkbox' name='infections[]' value='hsv12_15'/>HSV 1+2</td><td>$15.00</td></tr>
                    <tr><td><input type='checkbox' name='infections[]' value='typhoid_10'/>Typhoid</td><td>$10.00</td></tr>
                    <tr><td><input type='checkbox' name='infections[]' value='malaria_10'/>Malaria </td><td>$10.00</td></tr>
                    </tbody>
                    </table>
                    <input class="btn btn-success" type='submit' name='submit' class='bill' value='Bill Infections Check'/>
                    </form>
                    </div>
                </div>
                <div class="tab-pane" id="premarital">
3
                </div>
                <div class="tab-pane" id="antinetal">
4
                </div>
                <div class="tab-pane" id="cancer">
5
                </div>
                <div class="tab-pane" id="corporate">
6
                </div>
                <div class="tab-pane" id="vaccinations">
7
                </div>
                <div class="tab-pane" id="drugs">
8
                </div>
            </div>
        </div>
    </div>
    </div>
</div>