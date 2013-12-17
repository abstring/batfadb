<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF'])){die();}
require_once("models/header.php");
require_once("models/usercake_frameset_header.php");
?>

<h1>Welcome</h1>
<p>Welcome to the Aved Engineering Department databasing system. This website has been developed to serve the internal recordkeeping needs of the Engineering Department.</p>
<p>Please login to use the system. If you need help accessing this system, please see Andy String.</p>


<?php include("models/usercake_frameset_footer.php"); ?>