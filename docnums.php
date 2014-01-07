<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("models/header.php");
require_once("models/usercake_frameset_header.php");
?>

<h1>Document Number Index</h1>
<p align='center'><b>ECOs | Electrical Parts | Mechanical Parts | Fixtures | Assemblies | Documents | Software</b></p>
<div id='searchbox'>
	<form name='search' action='".$_SERVER['PHP_SELF']."' method='post'>
		<p align='center'>
			<label>Search:</label>
			<input type='text' name='searchtext' size=50 />
			<input type='submit' value='Go' class='submit' /><br>
			<font size=1 color="grey">Search for any text, including document numbers.<br>
			Search for a date range by entering mm/dd/yyyy - mm/dd/yyyy.</font>
		</p>
	</form>
</div>

<!-- assemblies, software, and documents.</p>
Search: [search box]
Date Search:
---Specific date: [date]
---Date Range: [date] to [date]
---Before [date]
---After [date] -->

<?php

//Search box form
echo "
php stuff here.";

?>

<?php include("models/usercake_frameset_footer.php"); ?>