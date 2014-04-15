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
					<td align='center'><a href='".$_SERVER['PHP_SELF']."?doc=".$item['number']."'>".$item['number']."</td>
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
echo "<p align='center'>Shortcuts: <b>| <a href='docnums.php'>All</a> | ";

for ($cat = 0; $cat <= max(array_map("max", $docnumindex))-1; $cat++) {
	echo "<a href='docnums.php?cat=".$docnumindex[$cat][0]."'>".$docnumindex[$cat][1]."</a> | ";
}
echo "</b></p>";


//If the user is logged in, this method will exist. Otherwise the user is logged out.
if(method_exists($loggedInUser, 'checkPermission')){
	//See if user is allowed to edit records (Administrator-2 or Engineering-5)
	if($loggedInUser->checkPermission(array(2)) || $loggedInUser->checkPermission(array(5))){
		$editor = 1;
	}
}


?>
<!-- A Google-like search box -->
<div align='center'>
			
				<p align='center'>
					
					<form name='search' action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post' display='inline'>
					<label>Search:</label>
					<input type='text' name='searchtext' size=50>
					<?php if(isset($_GET['cat'])){echo "<input type='hidden' name='cat' value=".$_GET['cat'].">";}?>
					<input type='submit' value='Go' class='submit'>
					</form>
					<font size=1 color="grey">Search for any text, including document numbers.<br>
					Search for a date range by entering mm/dd/yyyy - mm/dd/yyyy.</font>
					<?php
						if(isset($editor)){
							echo "<form action='".$_SERVER['PHP_SELF']."' method='post' display='inline'>";
							if(isset($_GET['cat'])){
								echo "<input type='hidden' name='cat' value=".$_GET['cat'].">";
							}
							echo "<input type='hidden' name='new' value=1>
						    	<input type='submit' value='New'>
								</form>";
						}
					?>
				</p>
			
</div>
<hr>

<?php
//Process "new" button actions.
if(isset($_POST['new'])){
	echo "<table class='spectable'>
			<tr>
				<form action='post' display='inline'>";
	//If the category was already set, use it for the new document.
	if(isset($_POST['cat'])){
		//Figure out the next part number
		$nextdocnum = 'ABC12345677';
		echo "<form id='newdocform'>
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
			</tr>
			<tr>
				<td>".$nextdocnum."</td>
				<td><input type='text' size=2 name='newrev' value='A'></td>
				<td><input type='text' size=10 name='newcustomer' value='Customer'></td>
				<td><textarea name='newdescription' form='newdocform' rows=1 cols=35>Description</textarea></td>
				<td><input type='text' name='newproject' value='Project'></td>
				<td><input type='text' size=10 name='newwo'></td>
				<td><input type='text' name='newauthor' value='".$loggedInUser->displayname."'></td>
				<td><input type='text' size=8 name='newdate' value='".date('n/j/Y')."'></td>
			</tr>
			</table>
					";
		echo "<input type='hidden' name='newdoc_cat' value=".$docnumindex[$_POST['cat']-1][0].">";
	}
	//If no category is set, create a select box to choose one.
	if(!isset($_POST['cat'])){
		echo "
		<select name='newdoc_cat'>";
		for ($cat = 0; $cat <= max(array_map("max", $docnumindex))-1; $cat++) {
			echo "<option value=".$docnumindex[$cat][0]."'>".$docnumindex[$cat][1]."</option>";
		}
		echo "
		</select>";
	}
	echo "
		<input type='submit' value='Create'>
		</form>";
}

// <table class='spectable'>
// 			<tr>
// 				<th width='90'>Number</th>
// 				<th width='35'>Rev</th>
// 				<th width='90'>Customer</th>
// 				<th width='300'>Description</th>
// 				<th width='90'>Project</th>
// 				<th width='60'>ECO/WO</th>
// 				<th width='90'>Author</th>
// 				<th width='90'>Date</th>
// 			</tr>


//If we have NO post data and no search term
if(!isset($_POST['cat'])&&!isset($_GET['cat'])&&!isset($_GET['doc'])&&!isset($_POST['searchtext'])){
	//Show the 10 most recently updated documents
	$result = mysqli_query($mysqli,"SELECT * FROM docnums WHERE 1 ORDER BY datemodified DESC LIMIT 0,10;");
		//Store the database results in an array
		$searchresults = array();
		while ($row = mysqli_fetch_array($result)){
			$searchresults[] = $row;	//Array of doc arrays
		}
	echo "Ten most recently updated documents:<br><br>";
	$table = new doctable;
	$table->maketable($searchresults);
}

//If a menu category is clicked	
if(isset($_GET['cat'])){
	$cat = $_GET['cat'];
	
	$result = mysqli_query($mysqli,"SELECT * FROM docnums WHERE number REGEXP '".$docnumindex[$cat - 1][2]."' ORDER BY datemodified DESC;");
	//Store the database results in an array
	$searchresults = array();
	while ($row = mysqli_fetch_array($result)){
		$searchresults[] = $row;	//Array of doc arrays
	}

	echo "<h2>".$docnumindex[$cat - 1][1]."</h2><br>"; //Show the category name under the hr
	//Display a filtered list of documents
	echo "Showing all <b>".$docnumindex[$cat - 1][1]."</b>. These all start with \"".$docnumindex[$cat - 1][2]."\"<br><br>";
	$table = new doctable;
	$table->maketable($searchresults);
}

//Process searches
//First, the general case where no category is selected:
if(isset($_POST['searchtext'])&&!isset($_POST['cat'])){


	//If user enters a date range, process it.
	if (preg_match('/(\d+\/\d+\/\d+)\s*-\s*(\d+\/\d+\/\d+)/',$_POST['searchtext'],$searchdate)) {
		;
		//Format date inputs into proper dates
		$searchdate1 = date('Y-m-d',strtotime($searchdate[1]));
		$searchdate2 = date('Y-m-d',strtotime($searchdate[2]));

		echo "Searching between <b>".$searchdate1."</b> and <b>".$searchdate2."</b>:<br><br>";

		$result = mysqli_query($mysqli,"SELECT * FROM docnums WHERE datemodified BETWEEN '".$searchdate1."' AND '".$searchdate2."' ORDER BY datemodified DESC;");
		//Store the database results in an array
		$searchresults = array();
		while ($row = mysqli_fetch_array($result)){
			$searchresults[] = $row;	//Array of doc arrays
		}
	}

	//Otherwise, the search must be for some text string.
	else {
		echo "Search results for everything containing <b>".$_POST['searchtext']."</b>:<br><br>";
		$searchtext = "%".$_POST['searchtext']."%"; //Add a "%" before and after to the search term in order to grab anything before/after the text - otherwise it will only key as "starts with" instead of "contains".

		$result = mysqli_query($mysqli,"SELECT * FROM docnums WHERE number LIKE '".$searchtext."' OR customer LIKE '".$searchtext."' OR description LIKE '".$searchtext."' OR workorder LIKE '".$searchtext."' OR author LIKE '".$searchtext."' ORDER BY datemodified DESC");
		//Store the database results in an array
		$searchresults = array();
		while ($row = mysqli_fetch_array($result)){
			$searchresults[] = $row;	//Array of doc arrays
		}
	}
	
	$table = new doctable;
	$table->maketable($searchresults);

}

//Second, the case where a specific category has been selected using a POST
if(isset($_POST['searchtext'])&&isset($_POST['cat'])){
	//If the post contains the category, use it.
	$cat = $_POST['cat'];
	$searchtext = "%".$_POST['searchtext']."%"; //Add a "%" before and after to the search term in order to grab anything before/after the text - otherwise it will only key as "starts with" instead of "contains".
	echo "<h2>".$docnumindex[$cat - 1][1]."</h2><br>"; //Show the category name under the hr
	//Display a filtered list of documents
	echo "Search results for <b>".$docnumindex[$cat - 1][1]."</b> containing <b>".$_POST['searchtext']."</b>:<br><br>";
	$result = mysqli_query($mysqli,"SELECT * FROM docnums WHERE number REGEXP '".$docnumindex[$cat - 1][2]."' AND (number LIKE '".$searchtext."' OR customer LIKE '".$searchtext."' OR description LIKE '".$searchtext."' OR workorder LIKE '".$searchtext."' OR author LIKE '".$searchtext."') ORDER BY datemodified DESC;");
	//Store the database results in an array
	$searchresults = array();
	while ($row = mysqli_fetch_array($result)){
		$searchresults[] = $row;	//Array of doc arrays
	}
	$table = new doctable;
	$table->maketable($searchresults);
}

//If a specific document has been requested:
if(isset($_GET['doc'])){
	$docid = $_GET['doc'];
	$result = mysqli_query($mysqli,"SELECT * FROM docnums WHERE number = '".$docid."';");
	//Store the database results in an array
	
	$doc = mysqli_fetch_array($result);
	echo "Number: ".$doc['number']." Description: ".$doc['description']."<br>";
	echo "
		<form>
		<table>
			<tr>
				<td>Document Number:</td><td>
			</tr>
	";
}



?>

<?php include("models/usercake_frameset_footer.php"); ?>