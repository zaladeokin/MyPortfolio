<?php
session_start();
require_once("auth.php");
require_once("adminPDO.php");
require_once($_SERVER['DOCUMENT_ROOT']."/zlib/zlib.php");
$tool="";
if(isset($_POST['tool'])){
    if($_POST['tool'] !=""){
        $tool= $_SESSION['tool'] = $_POST['tool'];
        //check if tool existed, if not add tool
        try{
            $check= $pdo->query("SELECT * FROM Toolbox where tool_name='$tool'");
            $check= $check->rowCount();
            if($check > 0 ){
                $_SESSION['status']= "<div><strong>Status:</strong>&nbsp;".htmlentities($tool)."&nbsp; already existed.</div><br />";
            }else{
                $upload= $pdo->prepare("INSERT INTO Toolbox(tool_name) VALUES(:tl)");
                $upload->execute(array(':tl'=> $tool));
                $_SESSION['status']= "<div><strong>Status:</strong>&nbsp;".htmlentities($tool)."&nbsp; added succesfully</div><br />";
            }
        }catch(Exception $e){
            error_log("Database(Admin) error  ::::". $e->getMessage());
            $_SESSION['status']= "<div><strong>Status:&nbsp;</strong>An error occured</div><br />";
          }
    }else{
        $_SESSION['status']= "<div><strong>Status:</strong>&nbsp;Invalid input</div><br />";
    }
    header("Location: toolbox.php");
    return;

}




?>









<?php
// VIew start here.
require_once("header.php");
?>
<div class="container p-5 fs-4">
    <h1> Toolbox</h1><br />
    <?php 
flashMessage('status');// Flash status message.
$tool= repopulate('tool');// repopulate input bar
?>
    <form method="post" class="fs-4">
        <div class="form-group">
            <label for="text">Check or Add tool </label>&nbsp;&nbsp;
            <input type="text" name="tool" value="<?= $tool; ?>" class="form-control" /> <br />
            <input type="submit" class="form-control btn btn-primary btn-lg float-end" value="Check/Add tool" />
        </div>
    </form>
    <br />
</div>

<?php
require_once("footer.php");
?>