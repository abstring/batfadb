<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("models/header.php");
require_once("models/usercake_frameset_header.php");
?>

<h1>Application Menu</h1>
<p></p>
<table border=1 cellpadding="2" align="center">
	<thead>
		<tr>
			<th>Name</th>
			<th>Description</th>
			<th>Status</th>
		</tr>
	</thead>
	<tr>
		<td style="width:175px; vertical-align:text-top"><a href="docnums.php">Document Number Index</a></td>
		<td>Index of document numbers for ECOs, parts, assemblies, and written documents for the Aved Engineering Department</td>
		<td style="width:120px"><b><font color="orange">In development</font></b></td>
	</tr>
	<tr>
		<td style="width:175px; vertical-align:text-top"><a href="batfadb.php">Battery Failure Analysis</a></td>
		<td>Database of failure events and their status</td>
		<td><b><font color="orange">In development</font></b></td>
	</tr>
	<tr>
		<td style="width:175px; vertical-align:text-top"><a href="batdesigner.php">Battery Pack Design Tool</a></td>
		<td>Utility to analytically down-select cell types to suggest optimal pack construction</td>
		<td><b><font color="orange">In development</font></b></td>
	</tr>
	<tr>
		<td style="width:175px; vertical-align:text-top"><a href="pm.php">Project Management</a></td>
		<td>Database of project information and associated tasks, deliverables, etc.</td>
		<td><b><font color="orange">In development</font></b></td>
	</tr>
	<tr>
		<td style="width:175px; vertical-align:text-top"><a href="purchasereqs.php">Purchase Requests</a></td>
		<td>List of purchase requests and their current status</td>
		<td><b><font color="orange">In development</font></b></td>
	</tr>
</table>

<?php include("models/usercake_frameset_footer.php"); ?>