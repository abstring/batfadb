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
$result = mysqli_query($mysqli,"SELECT batfa_faevents.*, batfa_batteries.* FROM batfa_faevents LEFT JOIN batfa_batteries ON batfa_faevents.batfa_batteries_id = batfa_batteries.id WHERE batfa_faevents.diagnosed IS NULL ORDER BY batfa_faevents.date_created DESC LIMIT 0, 30 ");
while ($row = mysqli_fetch_array($result)){
			$batfaevents[] = $row;	//Array of event arrays
}

echo "<h3>Failure Event History for [bat make model sn]</h3>";

if (isset($batfaevents)){
		echo "<table border=1>
				<tr>
					<th>Date Submitted</th>
					<th>Symptom Date</th>
					<th>Battery</th>
					<th>Symptom</th>
					";
		foreach ($batfaevents as $event){
				echo "
					<tr>
						<td align='center'>".date('m/d/Y',strtotime($event['date_created']))."</td>
						<td align='center'>".date('m/d/Y',strtotime($event['symptom_date']))."</td>
						<td><b>".$event['make']." ".$event['model']."</b><br>SN: ".$event['sn']."<br>PCB: ".$event['pcbsn']."
						<td>".$event['symptom']."</td>
						<td>[BUTTON]</td>
					</tr>";
		}
		echo "</table>";
	}
	else {
		echo "No failure events open!<br>";
	}

echo "<hr>
<p align='center'><a href='batfadb.php'>Enter a new FA event</a></p>";

?>


<?php include("models/usercake_frameset_footer.php"); ?>
