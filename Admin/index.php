<?php
include("header.php");
?>

<div class="container p-5 fs-4">
    <h1> Portal</h1><br>
<form class="fs-4">
    <!-- Login form, PHP should generate hash for this page to be access-->
            <label for="user">User  </label>&nbsp;&nbsp;
            <input type="text" class="form-control" /> <br />
            <label for="password">Password  </label>&nbsp;&nbsp;
            <input type="password" class="form-control" /> <br />
</form>
<br />
</div>

<?php
include("footer.php");
?>