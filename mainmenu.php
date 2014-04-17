<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("models/header.php");
require_once("models/usercake_frameset_header.php");
?>

<h1>Application Menu</h1>
<p></p>
<table align="center">
	<tr>
		<td><a href="docnums.php"><img src="img/docicon.png" height="55" width="55"></a></td>
		<td><a href="docnums.php"><h2>Document Number Index</h2></a></td>
		<td style="width:120px"><b><font color="orange">In development</font></b></td>
	</tr>
	<tr>
		<td><a href="batfadb.php"><img src="img/fixicon.jpg" height="55" width="55"></a></td>
		<td><a href="batfadb.php"><h2>Battery Failure Analysis</h2></a></td>
		<td><b><font color="orange">In development</font></b></td>
	</tr>
	<tr>
		<td><a href="batdesigner.php"><img src="img/compass.png" height="55" width="55"></a></td>
		<td><a href="batdesigner.php"><h2>Battery Pack Design Tool</h2></a></td>
		<td><b><font color="orange">In development</font></b></td>
	</tr>
	<tr>
		<td><a href="pm.php"><img src="img/gantt.png" height="55" width="55"></a></td>
		<td><a href="pm.php"><h2>Project Management</h2></a></td>
		<td><b><font color="orange">In development</font></b></td>
	</tr>
	<tr>
		<td><a href="purchasereqs.php"><img src="img/cart.png" height="55" width="55"></a></td>
		<td><a href="purchasereqs.php"><h2>Purchase Requests</h2></a></td>
		<td><b><font color="orange">In development</font></b></td>
	</tr>
	<tr>
		<td><img src="img/wrench.png" height="55" width="55"></td>
		<td>
			<h2>Customer Specific Applications</h2><br>
			<a href="PB0205-2_gonogo.php">Jarvik Heart PB0205-2</a>
		</td>
	</tr>
</table>

<?php include("models/usercake_frameset_footer.php"); ?>