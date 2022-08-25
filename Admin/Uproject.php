<?php
include("header.php");
?>
<div class="container p-5 fs-4">
    <h1> Upload Project Work</h1><br>
<form class="fs-4">
    <!-- PHP shoud control title and description length not too be too much-->
            <label for="Title">Title   </label>&nbsp;&nbsp;
            <input type="text" class="form-control" /> <br />
            <label for="Description">Description  </label>
            <textarea class="form-control" rows="10"></textarea><br />
        <label for="Screenshot" class="form-label">Screenshot  </label>
        <input type="file" class="form-control" /> <br /><br />
        <input type="submit"  class="btn btn-primary btn-lg float-end" value="UPLOAD" />
</form>
<br />
</div>

<?php
include("footer.php");
?>