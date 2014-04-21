<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("models/header.php");
require_once("models/usercake_frameset_header.php");
?>
<div align='center'><img src="img/battery.png"></div>
<h1>Jarvik Heart PB0205-2 Go-No-Go Calculator</h1>

<?php

//Constants to be determined by Engineering
$nummeasurements 	= 20;		//How many cells to average
$v_high_limit 		= 4.0;		//The high limit of any batch
$v_low_limit 		= 3.4;		//The low limit of any batch
$v_tolerance_high 	= 0.005;	//Bilateral positive tolerance
$v_tolerance_low 	= 0.005;	//Bilateral negative tolerance

//Perform calculations
$error = 0;
$vsum = 0;
for($i=1; $i<=$nummeasurements; $i++){
	//Process inputs
	if(isset($_POST[$i])){
		$vsum = $vsum + $_POST[$i];
	}
}
$vavg = $vsum / $nummeasurements;
$vhigh = sprintf("%.3f",($vavg + $v_tolerance_high));
$vlow = sprintf("%.3f",($vavg - $v_tolerance_low));
if($vavg <= $v_low_limit || $vavg >= $v_high_limit){
	$error = 2;
}

//Master table that creates two columns for displaying data
echo "<table>
		<tr>
			<td valign='top' width='300'>";

//Sub-table that creates all of the inputs
echo "
	<form action='".$_SERVER['PHP_SELF']."' method='post'>
		<table>";



for($i=1; $i<=$nummeasurements; $i++){

	echo "<tr><td>Cell Voltage ".$i."</td><td><input type='text' name=".$i." ";
	if(isset($_POST[$i])){
		if($_POST[$i] > $v_high_limit || $_POST[$i] > ($vavg + $v_tolerance_high)){
			echo "value='".$_POST[$i]." TOO HIGH' style='color:red;font-weight:bold;'";
			$error = 1;
		}
		elseif($_POST[$i] < $v_low_limit || $_POST[$i] < ($vavg - $v_tolerance_low)){
			echo "value='".$_POST[$i]." TOO LOW' style='color:red;font-weight:bold;'";
			$error = 1;
		}
		else{
			echo "value='".$_POST[$i]."'";
		}
		
	}
	
	echo "></td></tr>";
}

echo "</table>

<input type='submit' value='Calculate'>
</form>
<form display='inline' action='".$_SERVER['PHP_SELF']."' method='post'>
<input type='submit' value='Reset Form'>
</form>
</td>";


//Sub-table that creates results
echo "<td valign='top'>";

if($error==0){
	
	echo "The average voltage for these ".$nummeasurements." cells is ".sprintf("%.3f",$vavg)."<br>
	The tolerance requested by the customer is +".($v_tolerance_high*1000)."mV/-".($v_tolerance_low*1000)."mV<br>";
	echo "<font size=4>Each cell voltage must be between <b>".$vlow."</b>V and <b>".$vhigh."</b>V for the rest of the lot.</font><br>";
}
elseif($error==1){
	echo "<b><font size=4 color='red'>Please fix errors and calculate again.</b></font>";
}
else{
	echo "<b>Directions: </b> Build the first ".$nummeasurements." assemblies and measure each of their open circuit voltages (OCV). Enter those measurements in the boxes on the left and press <b>\"Calculate\"</b>.<br><br>
	This calculator will determine the correct voltage limits that should be used for the rest of the lot.<br>";
}

//Close tags of master table
echo "</td>
	</tr>
	</table>";

?>