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
	array(1,"ECOs",				"(ECO)([0-9]{4})"),
	array(2,"Electrical Parts",	"(AV-01-1)([0-9]{4})"),
	array(3,"Mechanical Parts",	"(AV-02-2)([0-9]{4})"),
	array(4,"Fixtures",			"(AV-02-1)([0-9]{4})"),
	array(5,"Assemblies",		"(AV-03-1)([0-9]{4})"),
	array(6,"Documents",		"(AV-04-1)([0-9]{4})"),
	array(7,"Software",			"(AV-05-1)([0-9]{4})")
	);

function nextdocnumber($cat, $docnumindex, $mysqli){
//How to call nextdocnumber:
//echo nextdocnumber(0,$docnumindex,$mysqli);

	//echo "Determining the next document number for category ".$docnumindex[$cat][1].".<br>";
	$result = mysqli_query($mysqli,"SELECT * FROM docnums WHERE number REGEXP '".$docnumindex[$cat][2]."' ORDER BY datemodified DESC;");
	//Store the database results in an array
	$searchresults = array();
	while ($row = mysqli_fetch_array($result)){
		$searchresults[] = $row;	//Array of doc arrays
	}
	$maxnum = 0;
	foreach($searchresults as $result){
		preg_match("/".$docnumindex[$cat][2]."/",$result['number'],$num);
		if($num[2]>=$maxnum){
			$maxnum = $num[2];
		}
	}
	//echo $maxnum."<br>";
	$numformat = "%0".strlen($maxnum)."d";
	$newnum = $num[1].sprintf("%04d",($maxnum + 1));
	//echo "Next number in this category is ".$newnum."<br>";
	return $newnum;

}

function category($docnumber, $docnumindex){
	//This function takes the document number and parses out what type of document it is. It returns a string containing the document category type.
	foreach($docnumindex as $item){
		if (preg_match("/".$item[2]."/", $docnumber)){
			return $item[1];
		}
	}
}


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
	echo "<form action=".$_SERVER['PHP_SELF']." method='post' display='inline' id='newdocform'>
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
	//If the category was already set, use it for the new document.
	if(isset($_POST['cat'])){
		$cat = $_POST['cat']-1;
		//Calculate the next part number
		$nextdocnum = nextdocnumber($cat,$docnumindex,$mysqli);
		echo "
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
					";
		echo "<input type='hidden' name='newnum' value=".$nextdocnum.">";
	}
	//If no category is set, create a select box to choose one.
	if(!isset($_POST['cat'])){
		echo "
				<tr>
					<td>
						<select name='newnum'>";
							for ($cat = 0; $cat <= max(array_map("max", $docnumindex))-1; $cat++) {
								echo "<option value=".nextdocnumber($cat,$docnumindex,$mysqli).">".$docnumindex[$cat][1]."</option>";
							}
		echo "
						</select>
					</td>
					<td><input type='text' size=2 name='newrev' value='A'></td>
					<td><input type='text' size=10 name='newcustomer' value='Customer'></td>
					<td><textarea name='newdescription' form='newdocform' rows=1 cols=35>Description</textarea></td>
					<td><input type='text' name='newproject' value='Project'></td>
					<td><input type='text' size=10 name='newwo'></td>
					<td><input type='text' name='newauthor' value='".$loggedInUser->displayname."'></td>
					<td><input type='text' size=8 name='newdate' value='".date('n/j/Y')."'></td>
				</tr>

		";
	}
	echo "
			</table>
			<input type='submit' value='Create'>
		</form>";
}

//Process data from the new form by checking if newnum is set.
if(isset($_POST['newnum'])){
	
	$newnum = $_POST['newnum'];
	$newrev = $_POST['newrev'];
	$newcustomer = $_POST['newcustomer'];
	$newdescription = $_POST['newdescription'];
	$newproject = $_POST['newproject'];
	$newwo = $_POST['newwo'];
	$newauthor = $_POST['newauthor'];
	$newdate = date('Y-m-d',strtotime($_POST['newdate']));
	echo $newnum." | ".$newrev." | ".$newcustomer." | ".$newdescription." | ".$newproject." | ".$newwo." | ".$newauthor." | ".$newdate."<br>";

	if(mysqli_query($mysqli,"INSERT INTO docnums (number, rev, customer, description, project, workorder, author, datemodified, datecreated) VALUES ('".$newnum."','".$newrev."','".$newcustomer."','".$newdescription."','".$newproject."','".$newwo."','".$newauthor."','".$newdate."','".$newdate."')")){
			echo "Successfully created new document number ".$_POST['newnum']." for customer <b>".$_POST['newcustomer']."</b><br>";
		}
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
	
	//Grab the document iteslf
	$result = mysqli_query($mysqli,"SELECT * FROM docnums WHERE number = '".$docid."';");
	$doc = mysqli_fetch_array($result);

	//Grab any revisions associated with it.
	$result = mysqli_query($mysqli,"SELECT * FROM docnums_revisions WHERE docnumber = '".$docid."' ORDER BY level DESC;");
	while ($row = mysqli_fetch_array($result)){
			$revisions[] = $row;
		}

	echo "<font size=6>".$doc['number']."</font><br>";
	echo "
		<table>
			<tr valign='top'><td align='right'><b>Type:</b></td><td>".category($doc['number'], $docnumindex)."</td></tr>
			<tr valign='top'><td align='right'><b>Customer:</b></td><td>".$doc['customer']."</td></tr>
			<tr valign='top'><td align='right'><b>Description:</b></td><td>".$doc['description']."</td></tr>
			<tr valign='top'><td align='right'><b>Project:</b></td><td>".$doc['project']."</td></tr>
			<tr valign='top'><td align='right'><b>ECO/WO:</b></td><td>".$doc['workorder']."</td></tr>
			<tr valign='top'><td align='right'><b>Author:</b></td><td>".$doc['author']."</td></tr>
			<tr valign='top'><td align='right'><b>Last Modification Date:</b></td><td>".$doc['datemodified']."</td></tr>
			<tr valign='top'><td align='right'><b>Creation Date:</b></td><td>".$doc['datecreated']."</td></tr>
		</table>
		<table><tr><td><h3><u>Revisions</u><a href=''></a></h3></td><td><a href=''><img src='img/plus.png' width='20' height='20'></a></td><td><font color='grey' size=1>New</font></td></tr></table>
		
		
		
	";
	if(isset($revisions)){
		echo "
			<table>
			<tr>
				<th>Rev</th>
				<th>Comment</th>
				<th>Author</th>
				<th>Date</th>
			</tr>
		";
		foreach($revisions as $rev){
			echo "<tr>
					<td>".$rev['level']."</td>
					<td>".$rev['comment']."</td>
					<td>".$rev['author']."</td>
					<td>".$rev['datecreated']."</td>
				</tr>
					";

		}
		echo "</table>";
	}
	else{
		echo "No revisions entered.<br>";
	}
	
}

// <th width='90'>Number</th>
// 				<th width='35'>Rev</th>
// 				<th width='90'>Customer</th>
// 				<th width='300'>Description</th>
// 				<th width='90'>Project</th>
// 				<th width='60'>ECO/WO</th>
// 				<th width='90'>Author</th>
// 				<th width='90'>Date</th>

?>

<?php include("models/usercake_frameset_footer.php"); ?>