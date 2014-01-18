<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("models/header.php");
require_once("models/db-settings.php"); //Require DB connection
include("models/usercake_frameset_header.php");
?>

<h2>Battery Failure Analysis Database</h2>
<h3 align='center'><font color='orange'>Diagnosis</font></h3>


<?php

// if(!isset($POST['batid'])){
// 	echo "ERROR: No battery ID submitted.<br>";
// }

//Process a post from this page
//THIS DOES NOT WORK FOR SOME REASON - TURN ON DEBUG MODE AND INVESTIGATE!!!

if(isset($_POST['faid'])){
	$faid = $_POST['faid'];

	if($result = mysqli_query($mysqli,"
		UPDATE `batfa_faevents` SET
		`diagnosis`='".$_POST['diagnosis']."',
		`diagnosis_code`='".$_POST['diagnosis_code']."',
		`diagnosis_date`='".$_POST['diagnosis_date']."',
		`diagnosed`=1,
		`diagnosis_user`='".$_POST['diagnosis_user']."' WHERE id=".$_POST['faid']){
		echo "<b>Added diagnosis and marked event as <font color='green'>CLOSED</font>.</b><br>";
	}
	else{
		echo "ERROR: Could not add diagnosis.<br>";
	}

	
}

//Make sure an event id came in from GET.
// if(!isset($_GET['faid'])){
// 	echo "No failure event selected.<br>";
// }

//Grab the event data from the database.
if(isset($_GET['faid'])){
	$faid = $_GET['faid'];


	$result = mysqli_query($mysqli,"SELECT batfa_faevents.*, batfa_batteries.* FROM batfa_faevents LEFT JOIN batfa_batteries ON batfa_faevents.batfa_batteries_id = batfa_batteries.id WHERE batfa_faevents.id = ".$faid." LIMIT 0, 30 ");
	$event = mysqli_fetch_array($result);

	echo "<font size=3>".$event['make']." ".$event['model']."<br>
		Serial #: <b>".$event['sn']."</b><br>
		PCB Serial #: <b>".$event['pcbsn']."</b></font>
		<hr>";

	echo "<h3>Symptom</h3><br>".$event['symptom']."<hr>";
	echo "<h3>Diagnosis</h3>
	<div id='diagnosis_input'>
			<form name='diagnosis' action='batfadb_diagnose.php' method='post'>
				<table>
					<tr>
						<td style='vertical-align: top;'>
							<label>Diagnosis Code:</label><input type='text' name='diagnosis_code' size=3><br>
							<font size=1 color='grey'>
							<b>List of Codes:</b><br>
							01 Fuse blown<br>
							02 Something else<br>
							03 Yet another thing<br>
							</font>
						</td>
						<td>
							Notes:<br>
							<textarea name='diagnosis' rows='10' cols='80'></textarea><br>
							<input type='hidden' name='diagnosis_user' value='$loggedInUser->displayname' />
							<input type='hidden' name='diagnosis_date' value='".date('m/d/Y')."'>
							<input type='hidden' name='faid' value='".$faid."'>
							<input type='submit' value='Mark as CLOSED' class='submit' />
						</td>
					</tr>
				</table>
			</form>
		</div>";
	
}
echo "<hr>
<p align='center'><a href='batfadb.php'>Enter a new FA event</a></p>";

?>


<?php include("models/usercake_frameset_footer.php"); ?>
