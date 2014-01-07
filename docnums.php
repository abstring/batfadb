<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("models/header.php");
require_once("models/usercake_frameset_header.php");
?>
<div align='center'><img src="img/docicon.png"></div>
<h1>Document Number Index</h1>
<p align='center'><b>
	<a href='docnums.php'>Home</a> | 
	<a href='docnums.php?cat=1'>ECOs</a> | 
	<a href='docnums.php?cat=2'>Electrical Parts</a> | 
	<a href='docnums.php?cat=3'>Mechanical Parts</a> | 
	<a href='docnums.php?cat=4'>Fixtures</a> | 
	<a href='docnums.php?cat=5'>Assemblies</a> | 
	<a href='docnums.php?cat=6'>Documents</a> | 
	<a href='docnums.php?cat=7'>Software</a>
</b></p>
<div id='searchbox'>
	<form name='search' action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>
		<p align='center'>
			<label>Search:</label>
			<input type='text' name='searchtext' size=50>
			<?php if(isset($_GET['cat'])){echo "<input type='hidden' name='cat' value=".$_GET['cat'].">";}?>
			<input type='submit' value='Go' class='submit'><br>
			<font size=1 color="grey">Search for any text, including document numbers.<br>
			Search for a date range by entering mm/dd/yyyy - mm/dd/yyyy.</font>
		</p>
	</form>
</div>
<hr>

<?php

//Categories:
// 1 = ECOs 				ECO1###
// 2 = Electrical Parts 	AV-01-1####
// 3 = Mechanical Parts 	AV-02-2####
// 4 = Fixtrues 			AV-02-1####
// 5 = Assemblies 			AV-03-1####
// 6 = Documents 			AV-04-1####	
// 7 = Software 			AV-05-1####

//If we have NO post data
if(empty($_POST)){}

//If a menu category is clicked	
if(isset($_GET['cat'])){
	$cat = $_GET['cat'];
	
	switch ($cat){
		case 1:
			echo "ECOs <br>";
			break;
		case 2:
			echo "Electrical Parts <br>";
			break;
		case 3:
			echo "Mechanical Parts <br>";
			break;
		case 4:
			echo "Fixtures <br>";
			break;
		case 5:
			echo "Assemblies <br>";
			break;
		case 6:
			echo "Documents <br>";
			break;
		case 7:
			echo "Software <br>";
			break;
		default:
			echo "ERROR: Category not defined. <br>";
	}
}

//If a post is returned, process it.
if(isset($_POST)){
	//If the post contains the category, use it.
	if(isset($_POST['cat'])){
		$cat = $_POST['cat'];
		echo "Search results:<br>
			[placeholder for stuff] cat=".$cat."<br>";
	}
}

?>

<?php include("models/usercake_frameset_footer.php"); ?>