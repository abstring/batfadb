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
		<td><a href="batfadb.php">Battery Failure Analysis</a></td>
		<td>Database of failure events and their status</td>
		<td><b><font color="orange">In development</font></b></td>
	</tr>
	<tr>
		<td><a href="pm.php">Project Management</a></td>
		<td>Database of project information and associated tasks, deliverables, etc.</td>
		<td><b><font color="orange">In development</font></b></td>
	</tr>
	<tr>
		<td><a href="purchasereqs.php">Purchase Requests</a></td>
		<td>List of purchase requests and their current status</td>
		<td><b><font color="orange">In development</font></b></td>
	</tr>

<?php include("models/usercake_frameset_footer.php"); ?>