<?php
session_start();
require_once("auth.php");
require_once("header.php");
?>
<div class="container-fluid p-5 fs-4">
    <h1> Administration Page</h1><br>
<ul>
<li><a href="toolbox.php">Add Toolbox</a></li>
<li><a href="Uproject.php">Upload Project work.</a></li>
<li><a href="Ucertificate.php">Upload Certificate</a></li>
</ul>
<br />
</div>

<?php
require_once("footer.php");
?>