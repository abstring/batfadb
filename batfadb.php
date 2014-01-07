<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("models/header.php");
require_once("models/db-settings.php"); //Require DB connection
include("models/usercake_frameset_header.php");
?>
<div align='center'><img src="img/fixicon.jpg" height="55" width="55"></div>
<h1>Battery Failure Analysis Database</h1>


<?php
//Database setup

// //Retrieve settings
// $stmt = $mysqli->prepare("SELECT id, name, value FROM ".$db_table_prefix."configuration");	
// $stmt->execute();
// $stmt->bind_result($id, $name, $value);

// while ($stmt->fetch()){
// 	$settings[$name] = array('id' => $id, 'name' => $name, 'value' => $value);
// }
// $stmt->close();

// Enter a serial number for status check
if(empty($_POST)){
	echo "
		<div id='batsninput'>
			<form name='batsn' action='".$_SERVER['PHP_SELF']."' method='post'>
				<p align='center'>
					<label>Scan (or type) battery or PCB <b>serial number</b>:</label>
					<input type='text' name='sninput' size=50 />
					<input type='submit' value='Submit' class='submit' />
				</p>
			</form>
		</div>";
	}

//if we have a serial number but no make/model
if (isset($_POST['sninput']) && !isset($_POST['batmake']) && !isset($_POST['batmodel'])) {
	
	//Set sninput to a variable so we don't have to keep writing $_POST
	$sninput = $_POST['sninput'];

	//Check the database to see if it exists as a battery sn
	$result = mysqli_query($mysqli,"SELECT * FROM batfa_batteries WHERE sn='".$sninput."' OR pcbsn='".$sninput."'");
	$batrecord = mysqli_fetch_array($result); 	//Store the result in a var.


	if (isset($batrecord)){
		$batmake  = $batrecord['make'];
		$batmodel = $batrecord['model'];
		$batsn    = $batrecord['sn'];
		$batid    = $batrecord['id'];
		$pcbsn	  = $batrecord['pcbsn'];
		
		echo "This battery has been recorded before.<br>";
		//echo "Here is a list of failure events for it:<br>";

		$result = mysqli_query($mysqli,"SELECT * FROM batfa_faevents WHERE batfa_batteries_id='".$batid."' ORDER BY symptom_date DESC");

		//Store the database results in an array
		$batfaevents = array();
		while ($row = mysqli_fetch_array($result)){
			$batfaevents[] = $row;	//Array of event arrays
		}
	}

	//Check the serial number format against known pack types and fill in any known data.
	if (!isset($batmake) && !isset($batmodel) && preg_match('/^AJ(\d{2})([A-Z]{3})(\d{4})/', $_POST['sninput'])) {
        //echo "This is a Zoll Surepower II pack.";
        $batsn    = $_POST['sninput'];
        $pcbsn    = 'unknown';
        $batmake  = 'Zoll';
        $batmodel = 'Surepower II';
    }
    if (!isset($batmake) && !isset($batmodel) && preg_match('/^TF00([A-Z]{3})/', $_POST['sninput'])) {
        //echo "This is a Zoll Surepower II PCB.";
        $batsn    = 'unknown';
        $pcbsn    = $_POST['sninput'];
        $batmake  = 'Zoll';
        $batmodel = 'Surepower II';
    }
    
	//I don't recognize it
    if(!isset($batmake) && !isset($batmodel)) {
    	echo "<p>You entered serial number <b>".$_POST['sninput']."</b><br>";
    	echo "I don't recognize this serial number format. Please enter a make / model.";
    	echo "
		<div id='batmminput'>
			<form name='batmm' action='batfadb_newfaevent.php' method='post'>
				<p align='center'>
					<label><b>Make</b> (<i>Zoll, etc.</i>):</label><input type='text' name='batmake' size=20 /><br>
					<label><b>Model</b> (<i>Surepower II</i>):</label><input type='text' name='batmodel' size=20 /><br>
					<input type='radio' name='sntype' value='bat'>This is a <b>Pack</b> Serial Number<br>
					<input type='radio' name='sntype' value='pcb'>This is a <b>PCB</b> Serial Number<br>
					<input type='hidden' name='sninput' value='".$_POST['sninput']."' />
					<input type='hidden' name='newfaevent' value=1 />
					<input type='submit' value='New Failure Event' class='submit' />
				</p>
			</form>
		</div>";
	}
}

//If the serial number was not found in the database, then we should have received it from a $_POST through a manual entry. Process that data accordingly.
// if(isset($_POST['sninput']) && isset($_POST['batmake']) && isset($_POST['batmodel']) && !isset($batrecord) && $_POST['sninput'] == 1){
// 	$batmake  = $_POST['batmake'];
// 	$batmodel = $_POST['batmodel'];
// 	$sntype = $_POST['sntype'];
// 	if($sntype == 'bat'){
// 		$batsn = $_POST['sninput'];
// 		$pcbsn = 'unknown';
// 	}
// 	if($sntype == 'pcb'){
// 		$pcbsn = $_POST['sninput'];
// 		$batsn = 'unknown';
// 	}
// }

//If the internal variables were found in the database or already known from regex matches, just ask if we want a new fa event:
if(isset($batmake) && isset($batmodel) && !isset($newfaevent)){
	echo "Battery: <b>".$batmake." ".$batmodel."</b> Pack SN: <b>".$batsn."</b> PCB SN: <b>".$pcbsn."</b><br>";
	echo "
		<div id='batnewfaevent'>
			<form name='batnewfaeventform' action='batfadb_newfaevent.php' method='post'>
				<p align='left'>
					<input type='hidden' name='batmake' value='".$batmake."' />
					<input type='hidden' name='batmodel' value='".$batmodel."' />
					<input type='hidden' name='batsn' value='".$batsn."' />
					<input type='hidden' name='pcbsn' value='".$pcbsn."' />";

					if(isset($batid)){ //Add ID only if it was found in the database
						echo "<input type='hidden' name='batid' value='".$batid."' />";
					}

					echo "
					<input type='hidden' name='newfaevent' value=1 />
					<input type='submit' value='New Failure Event' class='submit' />
				</p>
			</form>
		</div>";

	//Show any events that already exist in the database for this battery
	if (isset($batrecord)){
		echo "
			<b>Previous Events</b>
			<table>";
		foreach ($batfaevents as $event){
				echo "
					<tr>
						<td>".date('m/d/Y',strtotime($event['symptom_date']))."</td>
						<td>".$event['symptom']."</td>
						<td>";
							if($event['diagnosed']==1){
								echo "<font color='#C0C0C0'>CLOSED ".date('m/d/Y',strtotime($event['diagnosis_date']))." by ".$event['diagnosis_user']."</font>";
							}
							else{
								echo "<b><font color='red'>OPEN</font></b>";
							}
						echo "
						<td><i><font color='#C0C0C0'>(Entered ".date('m/d/Y',strtotime($event['date_created'])).")</font></i></td>
					</tr>";
		}
		echo "</table>";
	}
	else {
		echo "No failures have been recorded yet for this serial number.<br>";
	}
}

echo "<hr>
<p align='center'><a href='batfadb.php'>Enter another serial number</a></p>";

?>


<?php include("models/usercake_frameset_footer.php"); ?>
