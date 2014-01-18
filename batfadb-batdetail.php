<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("models/header.php");
require_once("models/db-settings.php"); //Require DB connection
include("models/usercake_frameset_header.php");
?>

<h2>Battery Failure Analysis Database</h2>
<h3 align='center'><font color='orange'>Battery History</font></h3>


<?php

// if(!isset($POST['batid'])){
// 	echo "ERROR: No battery ID submitted.<br>";
// }

//Check the database to see if it exists as a battery sn
if(!isset($_GET['batid'])){
	echo "No battery selected.<br>";
}

if(isset($_GET['batid'])){
	$batid = $_GET['batid'];


	$result = mysqli_query($mysqli,"SELECT batfa_faevents.*, batfa_batteries.* FROM batfa_faevents LEFT JOIN batfa_batteries ON batfa_faevents.batfa_batteries_id = batfa_batteries.id WHERE batfa_batteries.id = ".$batid." ORDER BY batfa_faevents.symptom_date ASC LIMIT 0, 30 ");
	while ($row = mysqli_fetch_array($result)){
				$batfaevents[] = $row;	//Array of event arrays
	}

	// $result1 = mysqli_query($mysqli,"SELECT batfa_faevents.*, batfa_batteries.* FROM batfa_faevents LEFT JOIN batfa_batteries ON batfa_faevents.batfa_batteries_id = batfa_batteries.id WHERE batfa_batteries.id = ".$batid." AND batfa_faevents.diagnosed IS NULL ORDER BY batfa_faevents.symptom_date ASC LIMIT 0, 30 ");
	// while ($row = mysqli_fetch_array($result1)){
	// 			$batfaevents_open[] = $row;	//Array of event arrays
	// }

	// $result2 = mysqli_query($mysqli,"SELECT batfa_faevents.*, batfa_batteries.* FROM batfa_faevents LEFT JOIN batfa_batteries ON batfa_faevents.batfa_batteries_id = batfa_batteries.id WHERE batfa_batteries.id = ".$batid." AND batfa_faevents.diagnosed IS NOT NULL ORDER BY batfa_faevents.symptom_date ASC LIMIT 0, 30 ");
	// while ($row = mysqli_fetch_array($result2)){
	// 			$batfaevents_closed[] = $row;	//Array of event arrays
	// }

	echo "<font size=3>".$batfaevents[0]['make']." ".$batfaevents[0]['model']."<br>
		Serial #: <b>".$batfaevents[0]['sn']."</b><br>
		PCB Serial #: <b>".$batfaevents[0]['pcbsn']."</b></font>
		<hr>";

	if (isset($batfaevents)){
			echo "<br><table>
					<tr>
						<th>Date Submitted</th>
						<th>Status</th>
						<th>Symptom</th>
						<th>Diagnosis</th>
						<th>Engineer</th>
						<th>Diagnosis Date</th>
						";
			foreach ($batfaevents as $event){
			echo "
				<tr>
					<td align='center'>".date('m/d/Y',strtotime($event['symptom_date']))."<br>
						<font size=1 color='grey'>Entered ".date('m/d/Y',strtotime($event['date_created']))."</font></td>
					<td align='center'>";

					if($event['diagnosed']==1){
						echo "<font color='green'>CLOSED</font>";
					}
					else{
						echo "<b><font color='red'>OPEN</font></b>";
					}

					echo "</td>
					<td>".$event['symptom']."</td>
					<td>".$event['diagnosis']."</td>
					<td align='center'>".$event['diagnosis_user']."</td>
					<td align='center'>".$event['diagnosis_date']."</td>
				</tr>";
		}
			echo "</table>";
		}
		else {
			echo "No failure events open!<br>";
		}
}
echo "<hr>
<p align='center'><a href='batfadb.php'>Enter a new FA event</a></p>";

?>


<?php include("models/usercake_frameset_footer.php"); ?>
