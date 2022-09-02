<?php
include("header.php");
$status=$tool="";
if(isset($_POST['tool']) && $_POST['tool'] !=""){
    $tool= filter_var($_POST['tool'], FILTER_SANITIZE_STRING);
    //check if tool existed, if not add tool
    $check= query("SELECT * FROM Toolbox where tool_name='$tool'");
    $check= $check->num_rows;
    if($check > 0 ){
        $status= htmlentities($tool)."&nbsp; already existed.";
    }else{
        query("INSERT INTO Toolbox(tool_name) VALUES('$tool')");
        $status= htmlentities($tool)."&nbsp; added succesfully";
    }

}




?>









<?php
// VIew start here.
?>
<div class="container p-5 fs-4">
    <h1> Toolbox</h1><br />
    <div><strong>Status:</strong>&nbsp;<?= $status ?></div><br />
<form method="post" class="fs-4">
        <div class="form-group">
            <label for="text">Check or Add tool  </label>&nbsp;&nbsp;
            <input type="text" name="tool" value="<?= htmlentities($tool); ?>"class="form-control" /> <br />
        <input type="submit"  class="form-control btn btn-primary btn-lg float-end" value="Check/Add tool" />
        </div>
</form>
<br />
</div>

<?php
include("footer.php");
?>