<div class="container-fluid">
    <div class="row">
    <div id="tab-content-packages" class="tab-content">
        <div class="col-lg-3">
            <ul class="nav nav-pills nav-stacked" data-tabs="tabs" id="packages-tabs">
                <li class="active" id="current-tab"><a href="#current" data-toggle="tab">Current Treatments</a></li> 
                <li id="family-tab"><a href="#family" data-toggle="tab">Family History</a></li>
                <li id="lifestyleinfections-tab"><a href="#lifestyle" data-toggle="tab">Lifestyle Questions</a></li>
            </ul>
        </div>
        <div class="col-lg-9">
<form name='form-questionaire' method='post' action='#' class='form-questionaire'>
        <div id="tab-content-packages" class="tab-content">
                <div class="tab-pane active" id="current">
                    <div class='table-responsive'>
                    
    <table class='table small'>
    <td>Question</td><td>Answer</td>
    <tbody>
        <tr>
        <td>Are you on any prolonged medication?</td>
        <td><input type="radio" name="prolonged_medication" value="yes">Yes
            <input type="radio" name="prolonged_medication" value="no">No</td>
        </tr>

        <tr>
        <td>If yes, please specify</td>
        <td> <textarea rows="3" cols="30" name="medication"></textarea></td>
        </tr>

        <tr><td>High Blood Pressure</td>
        <td><input type="radio" name="high_blood_pressure" value="yes">Yes
            <input type="radio" name="high_blood_pressure" value="no">No</td>        
        </tr>

        <tr><td>Heart Disease</td>
        <td><input type="radio" name="heart_disease" value="yes">Yes
            <input type="radio" name="heart_disease" value="no">No</td>        
        </tr>
                <tr><td>Tuberculosis</td>
        <td><input type="radio" name="tuberculosis" value="yes">Yes
            <input type="radio" name="tuberculosis" value="no">No</td>        
        </tr>
          <tr><td>HIV/Immunosuppression Disease</td>
        <td><input type="radio" name="hiv" value="yes">Yes
            <input type="radio" name="hiv" value="no">No</td>        
        </tr>
        <tr><td>If YES are you on ARVs?</td>
        <td><input type="radio" name="arv" value="yes">Yes
            <input type="radio" name="arv" value="no">No</td>        
        </tr>
        <tr><td>Stroke</td>
        <td><input type="radio" name="stroke" value="yes">Yes
            <input type="radio" name="stroke" value="no">No</td>        
        </tr>
        <tr><td>Diabetes</td>
        <td><input type="radio" name="diabetes" value="yes">Yes
            <input type="radio" name="diabetes" value="no">No</td>        
        </tr>
        <tr><td>Epilepsy</td>
        <td><input type="radio" name="epilepsy" value="yes">Yes
            <input type="radio" name="epilepsy" value="no">No</td>        
        </tr>
        <tr><td>Cancer</td>
        <td><input type="radio" name="cancer" value="yes">Yes
            <input type="radio" name="cancer" value="no">No</td>        
        </tr>        
        <tr><td>Any other disease?</td>
        <td><textarea rows="3" cols="30" name="other_disease"></textarea></td>        
        </tr>        
    </tbody>
    </table>
                    

                    </div>
                </div>

                <div class="tab-pane" id="family">
                    <div class='table-responsive'>
    <table class='table small'>
    <td>Question</td><td>Answer</td>
    <tbody>
        <tr><td>High Blood Pressure</td>
        <td><input type="radio" name="fam_high_blood_pressure" value="yes">Yes
            <input type="radio" name="fam_high_blood_pressure" value="no">No</td>        
        </tr>
                <tr><td>Tuberculosis</td>
        <td><input type="radio" name="fam_tuberculosis" value="yes">Yes
            <input type="radio" name="fam_tuberculosis" value="no">No</td>        
        </tr>
          <tr><td>Stroke</td>
        <td><input type="radio" name="fam_stroke" value="yes">Yes
            <input type="radio" name="fam_stroke" value="no">No</td>        
        </tr>
        <tr><td>Diabetes</td>
        <td><input type="radio" name="fam_diabetes" value="yes">Yes
            <input type="radio" name="fam_diabetes" value="no">No</td>        
        </tr>
        <tr><td>Mental Illness</td>
        <td><input type="radio" name="fam_mental_illness" value="yes">Yes
            <input type="radio" name="fam_mental_illness" value="no">No</td>        
        </tr>
        <tr><td>Cancer</td>
        <td><input type="radio" name="fam_cancer" value="yes">Yes
            <input type="radio" name="fam_cancer" value="no">No</td>        
        </tr>
        <tr><td>Heart Disease</td>
        <td><input type="radio" name="fam_heart_disease" value="yes">Yes
            <input type="radio" name="fam_heart_disease" value="no">No</td>        
        </tr> 
    </tbody>
    </table>
                    </div>
                </div>

                <div class="tab-pane" id="lifestyle">
                    <div class='table-responsive'>
    <table class='table small'>
    <td>Question</td><td>Answer</td>
    <tbody>
        <tr><td>Do you take alcohol?</td>
        <td><input type="radio" name="alcohol" value="yes">Yes
            <input type="radio" name="alcohol" value="no">No</td>        
        </tr>
        <tr><td>if yes how much daily?</td>
        <td><input type="text" name="alcohol_ammount"/></td></tr>

        <tr><td>Do you smoke or take tobacco?</td>
        <td><input type="radio" name="tobacco" value="yes">Yes
            <input type="radio" name="tobacco" value="no">No</td>        
        </tr>
        <tr><td>if yes how much daily?</td>
        <td><input type="text" name="tobacco_ammount"/></td></tr>

        <tr><td>Do you have fainting spells?</td>
        <td><input type="radio" name="fainting_spells" value="yes">Yes
            <input type="radio" name="fainting_spells" value="no">No</td>        
        </tr>

        <tr><td>Do you become unusually short of breath when you walk up a flight of stairs?</td>
        <td><input type="radio" name="short_of_breath" value="yes">Yes
            <input type="radio" name="short_of_breath" value="no">No</td>        
        </tr>
        <tr><td>Have you had a cough that started in the last 6 months and has remained for more than a month?</td>
        <td><input type="radio" name="prolonged_cough" value="yes">Yes
            <input type="radio" name="prolonged_cough" value="no">No</td>        
        </tr>

        <tr><td>Have you ever vomited or coughed out blood?</td>
        <td><input type="radio" name="coughed_blood" value="yes">Yes
            <input type="radio" name="coughed_blood" value="no">No</td>        
        </tr> 

                <tr><td>Do you have weakness or paralysis of either your arms or legs</td>
        <td><input type="radio" name="weakness_or_paralysis" value="yes">Yes
            <input type="radio" name="weakness_or_paralysis" value="no">No</td>        
        </tr> 
                <tr><td>Do you ever feel so depressed that it interfers with your work?</td>
        <td><input type="radio" name="depression" value="yes">Yes
            <input type="radio" name="depression" value="no">No</td>        
        </tr> 
                <tr><td>Do you ever feel you need medical or psychiatric help because of nervousness?</td>
        <td><input type="radio" name="psychiatric_help_from_nervousness" value="yes">Yes
            <input type="radio" name="psychiatric_help_from_nervousness" value="no">No</td>        
        </tr> 
           <tr><td>Do you have Hernia/Piles/Hydrocele</td>
        <td><input type="radio" name="hernia_piles_hydrocele" value="yes">Yes
            <input type="radio" name="hernia_piles_hydrocele" value="no">No</td>        
        </tr> 
           <tr><td>Please specify any other significant information, not covered above:</td>
        <td><textarea rows="3" cols="30" name="other_significant_information"></textarea></td>       
        </tr> 
            <tr><td>May we contact you via SMS</td>
        <td><input type="radio" name="sms_contact" value="yes">Yes
            <input type="radio" name="sms_contact" value="no">No</td>
        </tr>
             <tr><td>May we contact you via EMAIL</td>
        <td><input type="radio" name="email_contact" value="yes">Yes
            <input type="radio" name="email_contact" value="no">No</td>        
        </tr>
    </tbody>
    </table>
</div>
    <input type="submit" name="questionaire_complete" value="Complete Questionaire" class="btn btn-lg btn-success"/>
                   
                </div>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>