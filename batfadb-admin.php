<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("models/header.php");
require_once("models/db-settings.php"); //Require DB connection
include("models/usercake_frameset_header.php");
?>

<h2>Battery Failure Analysis Database</h2>
<h3 align='center'><font color='orange'>Administration</font></h3>


<?php
echo "<p align='center'><a href='batfadb.php'>Enter a new failure event</a></p>";
echo "<h3>Open FA Events</h3>";
//echo $loggedInUser->checkPermission(array(1));   how to test for permission levels

//Query the database for all OPEN events.
$result = mysqli_query($mysqli,"SELECT batfa_faevents.*, batfa_batteries.* FROM batfa_faevents LEFT JOIN batfa_batteries ON batfa_faevents.batfa_batteries_id = batfa_batteries.id WHERE batfa_faevents.diagnosed IS NULL ORDER BY batfa_faevents.date_created ASC LIMIT 0, 30 ");
while ($row = mysqli_fetch_array($result)){
			$batfaevents[] = $row;	//Array of event arrays
}

if (isset($batfaevents)){
		echo "<table>
				<tr>
					<th>Symptom Date</th>
					<th>Battery</th>
					<th>Symptom</th>
					<th></th>
				</tr>
					";
		foreach ($batfaevents as $event){
			echo "
				<tr>
					<td align='center'>".date('m/d/Y',strtotime($event['symptom_date']))."<br>
						<font size=1 color='grey'>Entered ".date('m/d/Y',strtotime($event['date_created']))."</font></td>
					<td><b>".$event['make']." ".$event['model']."</b><br>
						SN: <a href='batfadb-batdetail.php?batid=".$event['id']."'>".$event['sn']."</a><br>
						PCB: ".$event['pcbsn']."</td>
					<td>".$event['symptom']."</td>
					<td><a href='batfadb-diagnose.php?faid=".$event[0]."'>Diagnose</a></td>
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
