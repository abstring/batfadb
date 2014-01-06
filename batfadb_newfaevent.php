<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("models/header.php");
require_once("models/db-settings.php"); //Require DB connection
include("models/usercake_frameset_header.php");
?>

<h2>Battery Failure Analysis Database</h2>


<?php

//Gather information and present the user a form to fill out:
if(!isset($_POST['faeventready'])){

	//Grab variables from the $_POST:

	//Manual entries come in through $_POST with sntype and sninput set.
	//Regex matches come in through $_POST with everything except batid set.
	//Database matches come in with everything including batid set.

	//Manual entries
	if(isset($_POST['sninput']) && isset($_POST['sntype'])){
		if($_POST['sntype'] == 'bat'){
			$batsn = $_POST['sninput'];
			$pcbsn = 'unknown';
		}
		elseif($_POST['sntype'] == 'pcb'){
			$pcbsn = $_POST['sninput'];
			$batsn = 'unknown';
		}
		else{
			echo "Error: Serial numnber type incorrect ($sntype) from $_POST.<br>";
		}
		$batmake = $_POST['batmake'];
		$batmodel = $_POST['batmodel'];
	}

	//Regex matches
	if(!isset($_POST['batid']) && !isset($_POST['sninput'])){
		$batmake = $_POST['batmake'];
		$batmodel = $_POST['batmodel'];
		$batsn = $_POST['batsn'];
		$pcbsn = $_POST['pcbsn'];
	}

	//Database matches:

	if(isset($_POST['batid'])){
		$batmake  = $_POST['batmake'];
		$batmodel = $_POST['batmodel'];
		$batsn    = $_POST['batsn'];
		$batid    = $_POST['batid'];
		$pcbsn	  = $_POST['pcbsn'];
	}

	//Create the symptom entry form
	echo "Battery: <b>".$batmake." ".$batmodel."</b> Pack SN: <b>".$batsn."</b> PCB SN: <b>".$pcbsn."</b><br>";
	echo "
			<p><b>New Failure Event Information</b></p>
			<div id='newfaevent'>
				<form name='faevent' action='".$_SERVER['PHP_SELF']."' method='post'>
					<label>Failure Date:</label><input type='text' name='symptom_date' size=10 value='".date('m/d/Y')."'><br>
					<textarea name='symptom' rows='3' cols='50'>What happened to this pack?</textarea><br>
					<input type='hidden' name='batmake' value='".$batmake."'>
					<input type='hidden' name='batmodel' value='".$batmodel."'>
					<input type='hidden' name='batsn' value='".$batsn."'>
					<input type='hidden' name='pcbsn' value='".$pcbsn."'>";

					if(isset($batid)){ //Add ID only if it was found in the database
						echo "<input type='hidden' name='batid' value='".$batid."' />";
					}
				echo "
					<input type='hidden' name='faeventready' value=1>
					<input type='hidden' name='date_created' value='".date('m/d/Y')."'>
					<input type='submit' value='Submit' class='submit'>
				</form>
			</div>";
			// $datetest_raw = "12/22/1981";
			// $datetest_sqldate = date('Y-m-d',strtotime($datetest_raw));
			// echo "Raw date:".$datetest_raw." SQL Date:".$datetest_sqldate." Back to regular format:".date('m/d/Y',strtotime($datetest_sqldate))."<br>";

			echo "<hr><p align='center'><a href='batfadb.php'>Enter another serial number</a></p>";
}

//Insert a new record (Database matches only):
if(isset($_POST['faeventready']) && isset($_POST['batid'])){
	
	$batmake  = $_POST['batmake'];
	$batmodel = $_POST['batmodel'];
	$batsn    = $_POST['batsn'];
	$batid    = $_POST['batid'];
	$pcbsn	  = $_POST['pcbsn'];
	$date_created	  = $_POST['date_created'];
	$symptom  = $_POST['symptom'];
	$symptom_date  = date('Y-m-d',strtotime($_POST['symptom_date'])); //store date as Y-m-d for SQL use.
	$date_created  = date('Y-m-d'); //store date as Y-m-d for SQL use.
	echo "Battery: <b>".$batmake." ".$batmodel."</b> Pack SN: <b>".$batsn."</b> PCB SN: <b>".$pcbsn."</b><br>";
	echo "Symptom: <b>".$symptom."</b><br>";
	echo "Symptom Date: <b>".$symptom_date."</b><br>";

	$result = mysqli_query($mysqli,"INSERT INTO batfa_faevents (batfa_batteries_id, date_created, symptom, symptom_date) VALUES ('".$batid."','".$date_created."','".$symptom."','".$symptom_date."')");

	echo "<font color='green'><b>Failure event added.</b></font><br>";

	echo "<hr><p align='center'><a href='batfadb.php'>Enter another serial number</a></p>";
}

//Insert a new battery record AND a new FA event record if we don't have a database match.
if(isset($_POST['faeventready']) && !isset($_POST['batid'])){

	$batmake  = $_POST['batmake'];
	$batmodel = $_POST['batmodel'];
	$batsn    = $_POST['batsn'];
	$pcbsn	  = $_POST['pcbsn'];

	if($result = mysqli_query($mysqli,"INSERT INTO batfa_batteries (sn, make, model, pcbsn) VALUES ('".$batsn."','".$batmake."','".$batmodel."','".$pcbsn."')")){
		$batid = $mysqli->insert_id;
		echo "<font color='green'><b>Added new battery.</b><br></font>";
	}
	else{echo "<font color='red'><b>ERROR</b>: Could not create a new battery record in the database!</font>";
	}

	$date_created	  = $_POST['date_created'];
	$symptom  = $_POST['symptom'];
	$symptom_date  = date('Y-m-d',strtotime($_POST['symptom_date'])); //store date as Y-m-d for SQL use.
	$date_created  = date('Y-m-d'); //store date as Y-m-d for SQL use.
	echo "Battery: <b>".$batmake." ".$batmodel."</b> Pack SN: <b>".$batsn."</b> PCB SN: <b>".$pcbsn."</b><br>";
	echo "Symptom: <b>".$symptom."</b><br>";
	echo "Symptom Date: <b>".$symptom_date."</b><br>";

	$result = mysqli_query($mysqli,"INSERT INTO batfa_faevents (batfa_batteries_id, date_created, symptom, symptom_date) VALUES ('".$batid."','".$date_created."','".$symptom."','".$symptom_date."')");

	echo "<font color='green'><b>Added a new failure event for this battery.</b></font><br>";

	echo "<hr><p align='center'><a href='batfadb.php'>Enter another serial number</a></p>";

}

?>


<?php include("models/usercake_frameset_footer.php"); ?>
