<style>
#body{
  background-image: url("http://localhost/wellness/uiux/images/logo.png"); 
  opacity: 0.5;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  z-index: -1; 
}

#table{
  border:solid;
  width:100%;
  vertical-align: middle;
  text-align:center;
  topntail:yes;
  thead-underline:yes;
}
#table tr{
  border:solid;
}
</style>

<?php 
  if($details->package == 'Once Off Test'){
?>

<div id="body">

<?php
echo "<br/><br/><br/><br/><br/><br/><br/><br/>";
?>
<?php
if($details->test == "spirometry"){
  echo strtoupper($client->salutation." ".$client->names." ".$client->surname);
  echo "<br/>";
  echo strtoupper($client->gender);
  echo "<br/>";
  echo "E-mail: ".$client->email;
  echo "<br/>";
  echo "Date of Birth: ".$client->dob;
  echo "<br/>";
  echo "Date: ".getCalendarDateTodayFull();
  echo  "<br/><br/>"; 
}else{
  echo strtoupper($client->salutation." ".$client->names." ".$client->surname);
  echo "<br/>";
  echo $client->address;
  echo "<br/>";
  echo "Tel: ".$client->phone;
  echo "<br/>";
  echo "E-mail: ".$client->email;
  echo "<br/>";
  echo "Date of Birth: ".$client->dob;
  echo "<br/><br/>";
  echo "Type of test: ".$details->package."(s)";
  echo "<br/><br/>";
  echo "Date: ".getCalendarDateTodayFull();
  echo  "<br/><br/>";  
}

?>
<?php
 if($clinicianresults != ""){
  $b = json_decode($clinicianresults, true);

if($details->test == "spirometry"){
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>SPIROMETRY TEST RESULT</b> <br/>";
}else{
  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Clinician Test Results. <br/>";  
}

  echo "<table id='table' border='solid'>";
  echo "<thead><tr><th>Test</th><th>Result</th></tr></thead>";
?>

  <?php foreach ($b as $key => $value) {
     if($value != ""){
    ?>
  <tr><td><?php echo strtoupper(str_replace("_"," ",$key));?></td>
   <td>
  <?php if(!is_array($value)){
   echo str_replace("_"," ",$value);
  }else{
   for ($i=0; $i < count($value); $i++) { 
    echo str_replace("_"," ",$value[$i]);
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
   }
  }

  ?>
   </td></tr>
 <?php }}
echo "</table>";
  }else{
 }
?>

<?php echo "<br/>";?>


<?php
///////////////////////////////////////BLOODS - ONCE OFF TESTS//////////////////////////// 
if($scientisttests != ""){
  $c = json_decode($scientisttests, true);
  $tests = explode(",",$details->test);
  foreach($tests as $test){
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";

    switch($test){
      case "lipidprofile":
      echo "<h4>LIPID PROFILE</h4>";
      break;

      case "pregnancytest":
      echo "<h4>PREGNANCY TEST</h4>";
      break;

      case "urine":
      echo "<h4>URINE TEST</h4>";
      break;

      case "bloodgroup":
      echo "<h4>BLOOD GROUP</h4>";
      break;

      case "bloodsugar":
      echo "<h4>BLOOD SUGAR</h4>";
      break;

      case "hiv":
      echo "<h4>HIV</h4>";
      break;

      case "hpylori":
      echo "<h4>ANTI-H.PYLORI</h4>";
      break;

      case "torchscreen":
      echo "<h4>TORCHES SCREEN</h4>";
      break;

      case "bloodpressure":
      echo "<h4>BLOOD PRESSURE</h4>";
      break;

      case "premaritalindividual":
      echo "PREMARITAL TEST INDIVIDUAL";
      break;

      default:
      echo "<h4>".strtoupper($test)."</h4>";
      break;

    }
    echo "<table id='table'>";
    switch($test){
      case "lipidprofile":
      echo "<tr class='tr'><th>Test</th><th>Result</th><th>Normal Ranges</th></tr>";
      break;

      case "haemoglobin":
      echo "<tr class='tr'><th>Test</th><th>Result</th><th>Normal Ranges</th></tr>";
      break;

      case "bloodsugar":
      echo "<tr class='tr'><th>Test</th><th>Result</th><th>Normal Ranges</th></tr>";
      break;

      case "hba1c":
      echo "<tr class='tr'><th>Test</th><th>Result</th><th>Normal Ranges</th></tr>";
      break;

      default:
      echo "<tr class='tr'><th>Test</th><th>Result</th></tr>";
      break;
    }

    foreach($c as $testName => $result){
      if($result != ""){
        $categoryAndTest = explode("-",$testName);
        if($categoryAndTest[0] == $test){
          echo "<tr><td>".strtoupper(str_replace("_"," ",$categoryAndTest[1]))."</td>";
          echo "<td>";
          if(!is_array($result)){echo str_replace("_"," ",$result);}else{var_dump($result);}
          echo "</td>";
    switch($test){

      case "haemoglobin":
      echo "<td>";
        switch($categoryAndTest[1]){
              case 'haemoglobin':
              echo "12.0 - 16.0 mg/dL";
              break;
            }
      echo "</td>";
      break;

      case "bloodsugar":
            echo "<td>";
        switch($categoryAndTest[1]){
              case 'blood_glucose':
               echo "3.9 - 5.8 mMol/L";
              break;
            }
      echo "</td>";
      break;

      case "hba1c":
            echo "<td>";
        switch($categoryAndTest[1]){
              case 'hba1c':
              echo "4.5 % - 6.5 %";
              break;
            }
      echo "</td>";
      break;


      case "lipidprofile":
        echo "<td>";
          switch($categoryAndTest[1]){
            case 't_cholesterol':
            echo "2.5 - 5.2 mMol/L";
            break;

            case 'triglycerides':
            echo "0.2 - 2.0 mMol/L";
            break;

            case 'hdl_cholesterol':
            echo "1.0 - 1.6 mMol/L";
            break;

            case 'ldl_cholesterol':
            echo "2.2 - 3.2 mMol/L";
            break;

            case 'non_hdl':
            break;

            case 'tc_hdl_ratio':
            echo "=< 4.5";
            break;

            case 'glucose':
            echo "3.9 - 5.8 mMol/L";
            break;

            default:
            break;
          }
          echo "</td></tr>";
      break;

      default:
      echo "</tr>";
      break;
    }
        }
      }
    }
    echo "</table><hr><br/>";
  }
}
?>

 


<?php
if(isset($comments)){
  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Clinician Comments. <br/><br/>";
  echo $comments;

  echo "<br/><br/><br/><br/>";
}
?>

</div>

<?php 
//else statement here
}else{
?>

<div id="body">
<?php
echo "<br/><br/><br/><br/><br/><br/><br/><br/>";
?>
<?php
echo strtoupper($client->salutation." ".$client->names." ".$client->surname);
echo "<br/>";
echo $client->address;
echo "<br/>";
echo "Tel: ".$client->phone;
echo "<br/>";
echo "E-mail: ".$client->email;
echo "<br/>";
echo "Date of Birth: ".$client->dob;
echo "<br/><br/>";
?>
<?php
echo "On behalf of the Health & Wellness Center, we hereby congratulate you on completing this health assessment, an important step on your journey to optimal health and well-being.
The following report will cover a variety of topics related to enhancing your wellness and how you can fight the likelihood of non-communicable diseases that are a result of lifestyle. <br/><br/>
Wellness is therefore defined as an active process of becoming aware of and making choices toward a healthy and fulfilling life. This is a life-long process of moving towards enhancing your physical, intellectual, emotional, social and environmental well-being. Wellness is a continuous process towards achieving positive, transformational wellbeing, and wellness completes health.  At the heart of our Wellness interventions, is to respond to those mental, emotional, dietary, fitness-related, physical environmental issues that account for most chronic and lifestyle diseases we currently face. The Centre therefore exists to pre-empt the manifestation of these issues. This report tells you how healthy you are now, and your chances of staying healthy or becoming ill with major health problems in the future. It also guides you with supplementary measures you can take to improve your diet, health and well-being. Most importantly, it shows you what you can do to live longer, healthier life! Like many people today you recognize the value of good health. You realize that it helps you feel better and adds quality to your life; most of us have room to improve our health.<br/><br/>
This report is a summation of information captured through the health questionnaire and clinical assessments undertaken. In order to do this, you need to know where you stand now. Working with your healthcare provider to stay well is as important as getting treatment when you are sick. This personal health guide will help you and your healthcare provider make sure you get the tests and guidance you need to stay healthy. Read your report carefully. If you don’t understand anything in this report, be sure to ask your health care provider about it.<br/><br/>
Wish you a well life!<br/><br/>
Yours faithfully,<br/>
Dr. C. Masiya <br/>
Chief Medical Officer <br/>
<br/><br/><br/><br/><br/><br/>
";




 if($clinicianresults != ""){
 	$b = json_decode($clinicianresults, true);

  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Results from Clinician Tests. <br/>";
  echo "<table id='table' border='solid'>";
  echo "<thead><tr><th>Test</th><th>Result</th></tr></thead>";
?>

	<?php foreach ($b as $key => $value) {
		 if($value != ""){
		?>
	<tr><td><?php echo strtoupper(str_replace("_"," ",$key));?></td>
   <td> 
  <?php if(!is_array($value)){
   echo str_replace("_"," ",$value);
  }else{
   for ($i=0; $i < count($value); $i++) { 
    echo str_replace("_"," ",$value[$i]);
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
   }
  }

  ?>
   </td></tr>
 <?php }}
echo "</table>";
  }else{
 }
?>

<?php echo "<br/><br/><br/>";?>
<?php echo "<hr/>";?>

<?php
 if($scientisttests != ""){
  $c = json_decode($scientisttests, true);

  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Blood Test Results. <br/>";

 echo "<table id='table'>";
 echo "<tr class='tr'><th>Test</th><th>Result</th><th>Normal Ranges</th></tr>";
?>
  <?php foreach ($c as $key => $value) {
     if($value != ""){
    ?>
  <tr><td><?php echo strtoupper(str_replace("_"," ",$key));?></td>
             <td>
  <?php if(!is_array($value)){
   echo str_replace("_"," ",$value);
  }else{
   var_dump($value);
  }

  ?>








   </td>
   <td><?php
    switch($key){
      case 't_cholesterol':
      echo "2.5 - 5.2 mMol/L";
      break;

      case 'triglycerides':
      echo "0.2 - 2.0 mMol/L";
      break;

      case 'hdl_cholesterol':
      echo "1.0 - 1.6 mMol/L";
      break;

      case 'ldl_cholesterol':
      echo "2.2 - 3.2 mMol/L";
      break;

      case 'non_hdl':
      break;

      case 'tc_hdl_ratio':
      echo "< 0.87 mMol/L";
      break;

      case 'glucose':
      echo "3.9 - 5.8 mMol/L";
      break;

      default:
      break;
    }
   ?></td>
   </tr>
 <?php }}?>
</table>
 <?php }else{
   }?>

<?php echo "<br/><br/><br/>";?>
<?php echo "<hr/>";?>

<?php
if(isset($comments)){
  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Clinician Comments. <br/><br/>";
	echo $comments;

  echo "<br/><br/><br/><br/>";
}
}
?>

</div>
