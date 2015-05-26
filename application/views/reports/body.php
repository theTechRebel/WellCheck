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

<div id="body">

<?php
echo "<br/><br/><br/><br/><br/><br/><br/><br/>";

?>
<?php
echo strtoupper($client->salutation." ".$client->names." ".$client->surname);
echo "<br/><br/>";
echo $client->address;
echo "<br/><br/>";
echo "Tel: ".$client->phone;
echo "<br/><br/>";
echo "E-mail:	".$client->email;
echo "<br/><br/>";
echo "Date of Birth: ".$client->dob;
?>
<?php
echo "

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
      echo "None";
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
?>

</div>
