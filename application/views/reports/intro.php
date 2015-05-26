<style>
#body{
  background-image: url("http://localhost//wellness/uiux/images/logo.png");
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

<div id="body">

<?php
echo "<p align='center'> <img src='http://localhost//wellness/uiux/images/header.png'> </p>";
echo "&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;1st Floor, Joina City <br/>";
echo "&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;Tel: 086 4413 1465 | Cell: +263 737 399 924 <br/>";
echo "&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;Email: admin@wellnesscenter.co.zw | Website: www.wellnesscenter.co.zw <br/>";
echo "<hr/>";
echo "<br/>";
?>
<?php
echo "Physical Address:	".$client->address;
echo "<br/><br/>";
echo "Tel: ".$client->phone;
echo "<br/><br/>";
echo "E-mail:	".$client->email;
echo "<br/><br/>";
echo "Dear ".$client->salutation." ".$client->names." ".$client->surname;
echo "<br/><br/>";
?>
<?php
echo "On behalf of the Health & Wellness Center, we hereby congratulate you on completing this health assessment, an important step on your journey to optimal health and well-being.
The following report will cover a variety of topics related to enhancing your wellness and how you can fight the likelihood of non-communicable diseases that are a result of lifestyle. <br/><br/>
Wellness is therefore defined as an active process of becoming aware of and making choices toward a healthy and fulfilling life. This is a life-long process of moving towards enhancing your physical, intellectual, emotional, social and environmental well-being. Wellness is a continuous process towards achieving positive, transformational wellbeing, and wellness completes health.  At the heart of our Wellness interventions, is to respond to those mental, emotional, dietary, fitness-related, physical environmental issues that account for most chronic and lifestyle diseases we currently face. The Centre therefore exists to pre-empt the manifestation of these issues. This report tells you how healthy you are now, and your chances of staying healthy or becoming ill with major health problems in the future. It also guides you with supplementary measures you can take to improve your diet, health and well-being. Most importantly, it shows you what you can do to live longer, healthier life! Like many people today you recognize the value of good health. You realize that it helps you feel better and adds quality to your life; most of us have room to improve our health.<br/><br/>
This report is a summation of information captured through the health questionnaire and clinical assessments undertaken. In order to do this, you need to know where you stand now. Working with your healthcare provider to stay well is as important as getting treatment when you are sick. This personal health guide will help you and your healthcare provider make sure you get the tests and guidance you need to stay healthy. Read your report carefully. If you don’t understand anything in this report, be sure to ask your health care provider about it.<br/><br/>
Wish you a well life!<br/><br/>
Yours faithfully,<br/><br/>
Dr. C. Masiya <br/><br/>
Chief Medical Officer <br/>
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
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
	<tr><td><?php echo str_replace("_"," ",$key);?></td>
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

  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Results from Blood Tests. <br/>";

 echo "<table id='table'>";
 echo "<tr class='tr'><th>Test</th><th>Result</th></tr>";
?>
	<?php foreach ($c as $key => $value) {
		 if($value != ""){
		?>
	<tr><td><?php echo str_replace("_"," ",$key);?></td>
             <td>
  <?php if(!is_array($value)){
   echo str_replace("_"," ",$value);
  }else{
   var_dump($value);
  }

  ?>
   </td></tr>
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
?>

</div>
