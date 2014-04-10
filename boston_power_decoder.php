<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("models/header.php");
require_once("models/usercake_frameset_header.php");
?>
<h1>Decoder Ring for Boston Power Cells</h1>
<div align='center'>
	<form name='search' action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>
		<p align='center'>
			<label>Enter SN to decode:</label>
			<input type='text' name='searchtext' size=50>
			<input type='submit' value='Go' class='submit'><br>
			<font size=1 color="grey">Use a barcode scanner or type it in manually.</font>
		</p>
	</form>
</div>


<?php
if(isset($_POST['searchtext'])){
	$sntext = $_POST['searchtext'];
	$sndecoded = array();
	preg_match('/(^[a-zA-Z]{1})([a-zA-Z0-9]{2})([a-zA-Z]{1})(\d)(\d{2})(\d{3})([a-zA-Z0-9]{5})/',$sntext,$sndecoded);

	switch($sndecoded[1]){
		case 'S': $model = 'Swing or Sonata'; break;
		default: $chemistry = 'Unknown';
	}

	switch($sndecoded[2]){
		case 'A6': $chemistry = '5300'; break;
		default: $chemistry = 'Unknown';
	}

	switch($sndecoded[3]){
		case 'T': $factory = 'Taiwan'; break;
		default: $factory = 'Unknown';
	}

	$yom = '20'.$sndecoded[5];
	$dom = date('Y-m-d',date_create_from_format('z-Y',$sndecoded[6].'-'.$yom));

	echo "Serial number <b>".$sntext."</b> decoded:<br>";
	echo "<table><tr><th>Parameter</th><th>Raw Data</th><th>Decoded Data</th></tr>";
	echo "<tr><td>Model:</td><td>".			$sndecoded[1]."</td><td>".$model."</td></tr>";
	echo "<tr><td>Chemistry:</td><td>".		$sndecoded[2]."</td><td>".$chemistry."</td></tr>";
	echo "<tr><td>Factory:</td><td>".		$sndecoded[3]."</td><td>".$factory."</td></tr>";
	echo "<tr><td>Line:</td><td>".			$sndecoded[4]."</td><td>".$sndecoded[4]."</td></tr>";
	echo "<tr><td>Year of Manf:</td><td>".	$sndecoded[5]."</td><td>".$yom."</td></tr>";
	echo "<tr><td>Day of Manf:</td><td>".	$sndecoded[6]."</td><td>".$dom."</td></tr>";
	echo "<tr><td>Serial number:</td><td>".	$sndecoded[7]."</td></tr>";
	echo "</table>";
}


?>