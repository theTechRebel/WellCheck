<div class="container-fluid">
    <div class="row">
    <div id="tab-content-packages" class="tab-content">
        <div class="col-lg-3">
            <ul class="nav nav-pills nav-stacked" data-tabs="tabs" id="packages-tabs">
                <li class="active" id="once1-tab"><a href="#once" data-toggle="tab">Once Off Tests</a></li> 
                <li id="quick-tab"><a href="#quick" data-toggle="tab">Quick Check</a></li> 
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
                <div class="tab-pane active" id="once">
                    <div class='table-responsive'>
                    <form name='package' method='post' action='<?php echo $url?>dashboard/stage/' class='form-once'>
                    <div class="col-lg-6">
                    <table class='table small'>
                    <td>Description</td><td>Amount</td>
                    <tbody>
                    <tr><td><input type='checkbox' name='once[]' value='haemoglobin_10'/>Haemoglobin</td><td>$10.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='hiv_10'/>HIV/AIDS</td><td>$10.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='lipidprofile_15'/>Lipid Profile</td><td>$15.00</td></tr>

                    <tr><td><input type='checkbox' name='once[]' value='bloodsugar_5'/>Blood Glucose</td><td>$5.00</td></tr>

                    <tr><td><input type='checkbox' name='once[]' value='urine_5'/>Urine</td><td>$5.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='hba1c_20'/>HBA1c</td><td>$20.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='ecg_40'/>ECG</td><td>$40.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='hepatitis_15'/>Hepatitis Screen</td><td>$15.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='psa_15'/>PSA</td><td>$15.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='viac_15'/>VIAC</td><td>$15.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='bloodgroup_10'/>Blood Group</td><td>$10.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='malaria_10'/>Malaria</td><td>$10.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='syphilis_10'/>Syphilis</td><td>$10.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='chlamydia_10'/>Chlamydia</td><td>$10.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='gonorrhea_10'/>Gonorrhea</td><td>$10.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='hsv_20'/>HSV</td><td>$20.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='typhoid_15'/>Typhoid</td><td>$15.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='torchscreen_30'/>Torch Screen</td><td>$30.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='pregnancytest_5'/>Pregnancy Test</td><td>$5.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='ovulation_2'/>Ovulation Test Kit</td><td>$2.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='counselling_10'/>Counselling</td><td>$10.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='menopause_'/>Menopause Test</td><td>TBA</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='premariatalindividual_60'/>Premarital Individual</td><td>$60.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='hpylori_'/>H.Pylori</td><td>TBA</td></tr>
                    </tbody>
                    </table>
                    </div>
                    <div class="col-lg-6">
                                        <table class='table small'>
                    <td>Description</td><td>Amount</td>
                    <tbody>
                    <tr><td><input type='checkbox' name='once[]' value='foodhandlers_50'/>Food Handlers Test</td><td>$50.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='pneumoconiosis_35'/>Pneumoconiosis Test</td><td>$35.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='drivers_30'/>Drivers VID medicals</td><td>$30.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='petrolhandlers_'/>Petrol Handlers Test</td><td>TBA</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='agrochem_35'/>Agrochem Tests</td><td>$35.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='visualscreen_15'/>Visual Screen</td><td>$15.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='audiometry_15'/>Audiometry Test</td><td>$15.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='spirometry_15'/>Spirometry Test</td><td>$15.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='stress_'/>Stress Test</td><td>TBA</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='lead_30'/>Lead Test</td><td>$30.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='vacyellowfever_60'/>Yellow Fever Vaccine</td><td>$60.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='vachepatitisa_40'/>Hepatitis A Vaccine</td><td>$40.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='vachepatitisb_30'/>Hepatitis B Vaccine</td><td>$30.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='vachepatitisc_30'/>Hepatitis C Vaccine</td><td>$30.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='vactyphoid_40'/>Typhoid Vaccine</td><td>$40.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='vacmantoux_25'/>Mantoux Vaccine</td><td>$25.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='vactetanus_15'/>Tetanus Vaccine</td><td>$15.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='vacmeningitis_30'/>Meningitist Vaccine</td><td>$30.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='vacroatavirus_60'/>Roatavirus Vaccine</td><td>$60.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='vacflushot_15'/>Flu Shot</td><td>$15.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='vaccervarix_50'/>Cervarix Vaccine</td><td>$50.00</td></tr>
                    <tr><td><input type='checkbox' name='once[]' value='vacrabis_35'/>Rabis Vaccine</td><td>$35.00</td></tr>
                    </tbody>
                    </table>
                    </div>
                    <input class="btn btn-success btn-lg" type='submit' name='submit' class='bill' value='Bill Tests and Or Vaccine'/>
                    </form>
                    </div>
                </div>

                <div class="tab-pane" id="quick">
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
                    <input class="btn btn-success" type='submit' name='submit' class='bill' value='Bill Comprehensive Check'/>
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
                <form name='package' method='post' action='<?php echo $url?>dashboard/stage/' class='form-packages'>
                    <table class='table small'>
                    <td>Description</td><td>Amount</td>
                    <tbody>
                    <tr>This package includes all basic tests & all infections tests (MAX 2 screens)+:</tr>
                    <tr><td><input type='checkbox' name='premarital[]' value='pregnancy_0'/>Pregnancy Test</td><td>$00.00</td></tr>
                    <tr><td><input type='checkbox' name='premarital[]' value='trigs_20'/>TRIGs</td><td>$20.00</td></tr>
                    <tr><td><input type='checkbox' name='premarital[]' value='ovulationkit_5'/>Ovulation Test Kit</td><td>$5.00</td></tr>
                    <tr><td><input type='checkbox' name='premarital[]' value='testosterone'/>Testosterone Test</td><td>TBA</td></tr>
                    <tr><td><input type='checkbox' name='premarital[]' value='semen'/>Semen Analysis</td><td>TBA</td></tr>
                    <tr><td><input type='checkbox' name='premarital[]' value='estrogen'/>Estrogen</td><td>TBA</td></tr>
                    <tr><td><input type='checkbox' name='premarital[]' value='familyplanning_0'/>Family Planning</td><td>$00.00</td></tr>
                    <tr><td><input type='checkbox' name='premarital[]' value='counselling_15'/>Counselling</td><td>$15.00</td></tr>
                    <tr><td><input type='checkbox' name='premarital[]' value='bloodgroup_5'/>Blood Group</td><td>$5.00</td></tr>
                        </tbody>
                    </table>
                    <input class="btn btn-success" type='submit' name='submit' class='bill' value='Bill Premarital Check'/>
                </form>
                </div>
                <div class="tab-pane" id="antinetal">
                <form name='package' method='post' action='<?php echo $url?>dashboard/stage/' class='form-packages'>
                    <table class='table small'>
                    <td>Description</td><td>Amount</td>
                    <tbody>
                    <tr>This package includes all basic tests +:</tr>
                    <tr><td><input type='checkbox' name='antinetal[]' value='torchscreen_03'/>TORCH screen</td><td>$30.00</td></tr>
                    <tr><td><input type='checkbox' name='antinetal[]' value='trigs_20'/>TRIGs</td><td>$20.00</td></tr>
                    <tr><td><input type='checkbox' name='antinetal[]' value='bloodgroup_5'/>Blood Group</td><td>$5.00</td></tr>
                    <tr><td><input type='checkbox' name='antinetal[]' value='pregnancy_5'/>Pregnancy Test</td><td>$05.00</td></tr>
                    <tr><td><input type='checkbox' name='antinetal[]' value='urine_5'/>Urine Test</td><td>$5.00</td></tr>
                        </tbody>
                    </table>
                    <input class="btn btn-success" type='submit' name='submit' class='bill' value='Bill Antinetal Check'/>

                </form>
                </div>
                <div class="tab-pane" id="cancer">

                <form name='package' method='post' action='<?php echo $url?>dashboard/stage/' class='form-packages'>
                    <table class='table small'>
                    <td>Description</td><td>Amount</td>
                    <tbody>
                    <tr>This package includes all basic tests +:</tr>
                    <tr><td><input type='checkbox' name='cancer[]' value='dre_15'/>PSA +Digital Rectal Examination (DRE)</td><td>$15.00</td></tr>
                    <tr><td><input type='checkbox' name='cancer[]' value='alphafetoprotein'/>Alpha Feto Protein</td><td>TBA</td></tr>
                    <tr><td><input type='checkbox' name='cancer[]' value='cea_30'/>CEA</td><td>$30.00</td></tr>
                    <tr><td><input type='checkbox' name='cancer[]' value='ca125_30'/>Ca-125</td><td>$30.00</td></tr>
                    <tr><td><input type='checkbox' name='cancer[]' value='viac_10'/>VIAC</td><td>$10.00</td></tr>
                    <tr><td><input type='checkbox' name='cancer[]' value='hpv'/>HPV</td><td>TBA</td></tr>
                    <tr><td><input type='checkbox' name='cancer[]' value='breastexam_5'/>Breast Exam</td><td>$5.00</td></tr>
                    <tr><td><input type='checkbox' name='cancer[]' value='mammography'/>Mammography</td><td>TBA</td></tr>
                    <tr><td><input type='checkbox' name='cancer[]' value='psa_5'/>PSA</td><td>$10.00</td></tr>
                        </tbody>
                    </table>
                    <input class="btn btn-success" type='submit' name='submit' class='bill' value='Bill Cancer Check'/>

                </form>
                </div>
                <div class="tab-pane" id="corporate">
                <form name='package' method='post' action='<?php echo $url?>dashboard/stage/' class='form-packages'>
                    <table class='table small'>
                    <td>Description</td><td>Amount</td>
                    <tbody>
                    <tr><td><input type='checkbox' name='corporate[]' value='foodhandlers_50'/>Food Handlers</td><td>$50.00</td></tr>
                    <tr><td><input type='checkbox' name='corporate[]' value='pneumoconiosis_35'/>Pneumoconiosis</td><td>$35.00</td></tr>
                    <tr><td><input type='checkbox' name='corporate[]' value='petrolhandlers'/>Petrol Handlers test</td><td>TBA</td></tr>
                    <tr><td><input type='checkbox' name='corporate[]' value='agrochem_35'/>Agro-Chem Tests</td><td>$35.00</td></tr>
                    <tr><td><input type='checkbox' name='corporate[]' value='visualscreen_15'/>Visual Screen</td><td>$15.00</td></tr>
                    <tr><td><input type='checkbox' name='corporate[]' value='audiometry_15'/>Audiometry Tests</td><td>$15.00</td></tr>
                    <tr><td><input type='checkbox' name='corporate[]' value='spirometry_15'/>Spirometry Tests</td><td>$15.00</td></tr>
                    <tr><td><input type='checkbox' name='corporate[]' value='stress'/>Stress Test</td><td>TBA</td></tr>
                    <tr><td><input type='checkbox' name='corporate[]' value='lead_30'/>Lead Test</td><td>$30.00</td></tr>
                        </tbody>
                    </table>
                    <input class="btn btn-success" type='submit' name='submit' class='bill' value='Bill corporate Check'/>

                </form>
                </div>
                <div class="tab-pane" id="vaccinations">

                <form name='package' method='post' action='<?php echo $url?>dashboard/stage/' class='form-packages'>
                    <table class='table small'>
                    <td>Description</td><td>Amount</td>
                    <tbody>
                    <tr><td><input type='checkbox' name='vaccinations[]' value='yellowfever_60'/>Yellow Fever</td><td>$60.00</td></tr>
                    <tr><td><input type='checkbox' name='vaccinations[]' value='hepatitisa_40'/>Hepatitis A</td><td>$40.00</td></tr>
                    <tr><td><input type='checkbox' name='vaccinations[]' value='hepatitisb_30'/>Hepatitis B</td><td>$30.00</td></tr>
                    <tr><td><input type='checkbox' name='vaccinations[]' value='typhoid_40'/>Typhoid</td><td>$40.00</td></tr>
                    <tr><td><input type='checkbox' name='vaccinations[]' value='mantoux_25'/>Mantoux</td><td>$25.00</td></tr>
                    <tr><td><input type='checkbox' name='vaccinations[]' value='tetanus_15'/>Tetanus</td><td>$15.00</td></tr>
                    <tr><td><input type='checkbox' name='vaccinations[]' value='meningitis_30'/>Meningitis</td><td>$30.00</td></tr>
                    <tr><td><input type='checkbox' name='vaccinations[]' value='roatavirus_60'/>Roatavirus</td><td>$60.00</td></tr>
                    <tr><td><input type='checkbox' name='vaccinations[]' value='flushot_15'/>Flu shot</td><td>$15.00</td></tr>
                    <tr><td><input type='checkbox' name='vaccinations[]' value='cervarix_150'/>Cervarix( 3 shots)</td><td>$150.00</td></tr>
                    <tr><td><input type='checkbox' name='vaccinations[]' value='rabis_35'/>Rabis</td><td>$35.00</td></tr>
                        </tbody>
                    </table>
                    <input class="btn btn-success" type='submit' name='submit' class='bill' value='Bill corporate Check'/>

                </form>
                </div>
                <div class="tab-pane" id="drugs">
                <form name='package' method='post' action='<?php echo $url?>dashboard/stage/' class='form-packages'>
                    <table class='table small'>
                    <td>Description</td><td>Amount</td>
                    <tbody>
                    <tr>This package includes all basic tests +:</tr>
                    <tr><td><input type='checkbox' name='drugs[]' value='cannabis_20'/>Cannabis</td><td>$20.00</td></tr>
                    <tr><td><input type='checkbox' name='drugs[]' value='heroin_20'/>Heroin</td><td>$20.00</td></tr>
                    <tr><td><input type='checkbox' name='drugs[]' value='amphetamines_20'/>Amphetamines</td><td>$20.00</td></tr>
                    <tr><td><input type='checkbox' name='drugs[]' value='coccaine_20'/>coccaine</td><td>$20.00</td></tr>
                        </tbody>
                    </table>
                    <input class="btn btn-success" type='submit' name='submit' class='bill' value='Bill Drugs Check'/>

                </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>