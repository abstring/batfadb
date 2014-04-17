<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("models/header.php");
require_once("models/usercake_frameset_header.php");
?>
<div align='center'><img src="img/battery.png"></div>
<h1>Jarvik Heart PB0205-2 Go-No-Go Calculator</h1>

<?php
echo "
	<form action='".$_SERVER['PHP_SELF']."' method='post'>
		<table>
			<tr><td>1st Cell Voltage</td><td><input type='text' name='v1'";
			if(isset($_POST['v1'])){
				echo "value=".$_POST['v1'];
			}
			echo "></td></tr>";

			echo "
			<tr><td>2nd Cell Voltage</td><td><input type='text' name='v2'";
			if(isset($_POST['v2'])){
				echo "value=".$_POST['v2'];
			}
			echo "></td></tr>";

			echo "
			<tr><td>3rd Cell Voltage</td><td><input type='text' name='v3'";
			if(isset($_POST['v3'])){
				echo "value=".$_POST['v3'];
			}
			echo "></td></tr>";

			echo "
			<tr><td>4th Cell Voltage</td><td><input type='text' name='v4'";
			if(isset($_POST['v4'])){
				echo "value=".$_POST['v4'];
			}
			echo "></td></tr>";

			echo "
			<tr><td>5th Cell Voltage</td><td><input type='text' name='v5'";
			if(isset($_POST['v5'])){
				echo "value=".$_POST['v5'];
			}
			echo "></td></tr>";

		echo "</table>
		<input type='submit' value='Calculate'>
	</form>
";

if(isset($_POST['v1']) && isset($_POST['v2']) && isset($_POST['v3']) && isset($_POST['v4']) && isset($_POST['v5'])){
	$v1 = $_POST['v1'];
	$v2 = $_POST['v2'];
	$v3 = $_POST['v3'];
	$v4 = $_POST['v4'];
	$v5 = $_POST['v5'];

	$vavg = ($v1 + $v2 + $v3 + $v4 + $v5) / 5;
	$vhigh = sprintf("%.3f",($vavg + 0.01));
	$vlow = sprintf("%.3f",($vavg - 0.01));
	echo "Average voltage is ".sprintf("%.3f",($vavg))."<br><br>";
	echo "<font size=4>Cell voltage must be between <b>".$vlow."</b> and <b>".$vhigh."</b></font>";
}

?>