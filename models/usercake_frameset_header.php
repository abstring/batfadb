<?php
echo "
<body>
<div id='wrapper'>
<div id='content'>
<table>
	<tr>
		<td><img src='img/AvedLogo_small.jpg' alt='Aved logo'></td>
		<td><h1>Engineering Department</h1></td>
	</tr>
</table>";

if (!isUserLoggedIn()){
	echo "<p align='right'>Not logged in.</p>";
}	
else {
	echo "<p align='right'>Logged in as $loggedInUser->displayname.</p>";
}

echo "
<div id='left-nav'>";
include("left-nav.php");
echo "
</div>
<div id='main'>";
?>