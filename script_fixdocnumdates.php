<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("models/header.php");
require_once("models/usercake_frameset_header.php");

//edit these field names as appropriate:
$inputfield = "datecreatedtxt";
$outputfield = "datecreated";

echo "Attempting to fix date formats for MySQL import.<br>
Input field: [".$inputfield."] Output field: [".$outputfield."]<br><br>";

//Grab all records in the docnum table
$result = mysqli_query($mysqli,"SELECT * FROM docnums WHERE 1");
//Store the database results in an array
$sourcetable = array();
while ($row = mysqli_fetch_array($result)){
	$sourcetable[] = $row;	//Array of doc arrays
}

if (!isset($_GET['commit'])){
	echo "<br>Here are the PROPOSED changes below.<br>Commit these changes to the database? <a href='".$_SERVER['PHP_SELF']."?commit=1'>yes</a><br><br>";
	foreach($sourcetable as $item){
		$textdate = trim($item['datecreatedtxt'],'\'');
		$timestamp = strtotime($textdate);
		$newdate = date('Y-m-d',$timestamp);
		//echo "Raw text: [".$item['datecreatedtxt']."] Trimming off ' marks [".$textdate."] Converting to timestamp [".$timestamp."] New date is ".$newdate."<br>";
		echo $item['id']." Converting [".$item['datecreatedtxt']."] to ".$newdate."<br>";
	}
}

if (isset($_GET['commit'])){
	foreach($sourcetable as $item){
		$textdate = trim($item['datecreatedtxt'],'\'');
		$timestamp = strtotime($textdate);
		$newdate = date('Y-m-d',$timestamp);
		try{
			$result = mysqli_query($mysqli,"UPDATE docnums SET ".$outputfield."='".$newdate."' WHERE id=".$item['id'].";");
			echo "Wrote [".$item['datecreatedtxt']."] to ".$newdate."<br>";
		}
		catch (Exception $e){
			echo "Something went wrong: ".$e."<br>";
		}
	}
	echo "All changes committed to database. Have a nice day!<br>";
}
?>