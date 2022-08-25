<?php
include("header.php");
?>
<div class="container p-5 fs-4">
    <h1> Upload Certificate</h1><br>
<form class="fs-4">
    <!-- PHP shoud control title length not too be too much-->
            <label for="Title">Title   </label>&nbsp;&nbsp;
            <input type="text" class="form-control" /> <br />
        <label for="Screenshot" class="form-label">Screenshot  </label>
        <input type="file" class="form-control" /> <br /><br />
        <input type="submit"  class="btn btn-primary btn-lg float-end" value="UPLOAD" />
</form>
<br />
</div>

<?php
include("footer.php");
?>