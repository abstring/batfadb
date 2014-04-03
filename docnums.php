<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("models/header.php");
require_once("models/usercake_frameset_header.php");
?>
<div align='center'><img src="img/docicon.png"></div>
<h1>Document Number Index</h1>

<?php
//Category definitions array
//Categories:
// 1 = ECOs 				ECO1###
// 2 = Electrical Parts 	AV-01-1####
// 3 = Mechanical Parts 	AV-02-2####
// 4 = Fixtrues 			AV-02-1####
// 5 = Assemblies 			AV-03-1####
// 6 = Documents 			AV-04-1####	
// 7 = Software 			AV-05-1####


$category = array(
1 	=>	"ECOs",
2 	=> 	"Electrical Parts",
3 	=> 	"Mechanical Parts",
4 	=>	"Fixtures",
5 	=> 	"Assemblies",
6 	=>	"Documents",
7 	=>	"Software"
	);

//Multidimensional array of category names and part numbering pattern regex expressions
$docnumindex = array(
	array(1,"ECOs",				"ECO"),
	array(2,"Electrical Parts",	"AV-01-1"),
	array(3,"Mechanical Parts",	"AV-02-2"),
	array(4,"Fixtures",			"AV-02-1"),
	array(5,"Assemblies",		"AV-03-1"),
	array(6,"Documents",		"AV-04-1"),
	array(7,"Software",			"AV-05-1")
	);

//Class definitions for tables used in this application
class doctable {
	public function maketable($tabledata) {
		echo "
			<table class='spectable'>
			<tr>
				<th width='90'>Number</th>
				<th width='35'>Rev</th>
				<th width='90'>Customer</th>
				<th width='300'>Description</th>
				<th width='90'>Project</th>
				<th width='60'>ECO/WO</th>
				<th width='90'>Author</th>
				<th width='90'>Date</th>
			</tr>";

		foreach($tabledata as $item){
			echo "
				<tr>
					<td align='center'>".$item['number']."</td>
					<td align='center'>".$item['rev']."</td>
					<td align='left'>".$item['customer']."</td>
					<td align='left'>".$item['description']."</td>
					<td align='center'>".$item['project']."</td>
					<td align='center'>".$item['workorder']."</td>
					<td align='center'>".$item['author']."</td>
					<td align='center'>".date('n/j/Y',strtotime($item['datecreated']))."</td>
				</tr>";
		}
		echo "</table>";
	}
	
}

//Create shortcut menu on the top of the page for easy navigation
echo "<p align='center'><b>| <a href='docnums.php'>Home</a> | ";

for ($cat = 0; $cat <= max(array_map("max", $docnumindex))-1; $cat++) {
	echo "<a href='docnums.php?cat=".$docnumindex[$cat][0]."'>".$docnumindex[$cat][1]."</a> | ";
}
echo "</b></p>";
?>

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
if(empty($_POST)){
	//echo "empty POST<br>";
}

//Database tables: batfadb -> docnums -> fields:
// id
// number
// rev
// customer
// description
// workorder
// author
// datecreated (auto)
// datemodified
// project

//If a menu category is clicked	
if(isset($_GET['cat'])){
	$cat = $_GET['cat'];
	echo "<h2>".$docnumindex[$cat - 1][1]."</h2><br>"; //Show the category name under the hr
	//Display a filtered list of documents
	echo "Showing all <b>".$docnumindex[$cat - 1][1]."</b>. These all start with \"".$docnumindex[$cat - 1][2]."\"<br><br>";
	$result = mysqli_query($mysqli,"SELECT * FROM docnums WHERE number REGEXP '".$docnumindex[$cat - 1][2]."' ORDER BY datemodified DESC;");
	//Store the database results in an array
	$searchresults = array();
	while ($row = mysqli_fetch_array($result)){
		$searchresults[] = $row;	//Array of doc arrays
	}
	
	$table = new doctable;
	$table->maketable($searchresults);
}

//Process searches
//First, the general case where no category is selected:
if(isset($_POST['searchtext'])&&!isset($_POST['cat'])){

	echo "Showing search results for <b>".$_POST['searchtext']."</b>:<br><br>";
	
	$searchtext = "%".$_POST['searchtext']."%"; //Add a "%" before and after to the search term in order to grab anything before/after the text - otherwise it will only key as "starts with" instead of "contains".

	$result = mysqli_query($mysqli,"SELECT * FROM docnums WHERE number LIKE '".$searchtext."' OR customer LIKE '".$searchtext."' OR description LIKE '".$searchtext."' OR workorder LIKE '".$searchtext."' OR author LIKE '".$searchtext."' ORDER BY datemodified DESC");
	//Store the database results in an array
	$searchresults = array();
	while ($row = mysqli_fetch_array($result)){
		$searchresults[] = $row;	//Array of doc arrays
	}
	
	$table = new doctable;
	$table->maketable($searchresults);

}
//Second, the case where a specific category is selected:
if(isset($_POST['searchtext'])&&isset($_POST['cat'])){
	//If the post contains the category, use it.
	echo "Search results for <b>".$_POST['searchtext']."</b>:<br>
			[placeholder for search results for \"".$_POST['searchtext']."\" in category ".$_POST['cat']."]";
}



?>

<?php include("models/usercake_frameset_footer.php"); ?>