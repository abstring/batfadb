<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("models/header.php");
include("models/usercake_frameset_header.php");
?>

<h2>Zoll Surepower II Battery Packs</h2>
Scan a pack's serial number to check its status or register a new failure. [text box]

<?php include("models/usercake_frameset_footer.php"); ?>