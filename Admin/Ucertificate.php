<?php
session_start();
require_once("adminPDO.php");
require_once("C:/xampp/htdocs/Zlib/zlib.php");
require_once("auth.php");

//Tool category from Database
try{
    $tool= $pdo->query("SELECT * FROM tOOLBOX");
    $tval= ($tool->rowCount() > 0 ) ? true : false; // check if Tool category have been created
}catch(Exception $e){
    error_log("Database(Admin) error  ::::". $e->getMessage());
    $tval= false;
}

if( isset($_FILES['certificate']) && isset($_POST['title']) && isset($_POST['tool_category']) ){//$_SESSION['verification'] is optional
    $_SESSION['status']="";
    $title= $_SESSION['title'] = $_POST['title'];
    $cat= $_SESSION['tool_category'] = $_POST['tool_category'];
    $verification= $_SESSION['verification'] = isset($_POST['verification']) ? $_POST['verification']: "";
    if($title==""){
        $_SESSION['status'] .= "<div class='bg-danger text-center'>The title field must be filled.<br /></div>";
    }
    if($cat == "0"){
        $_SESSION['status'] .= "<div class='bg-danger text-center'>Choose certificate category.<br /></div>";
    }
    if($_FILES['certificate']['size'] <= 0){
        $_SESSION['status'] .= "<div class='bg-danger text-center'>Choose image to upload.<br /></div>";
    }

    if( $title !="" && $cat != "0" && $_FILES['certificate']['size'] > 0 ){
        switch($_FILES['certificate']['type']){
            //check file type and create file extention, return false if not image.
            case 'image/jpeg': $ext = '.jpg';$valid= true; break;
            case 'image/gif': $ext = '.gif';$valid= true; break;
            case 'image/png': $ext = '.png';$valid= true; break;
            case 'image/tiff': $ext = '.tif';$valid= true; break;
            default: $ext = '';$valid= false; $_SESSION['status'] .="<div class='bg-danger text-center'>Invalid file type.<br /></div>"; break;
        }
        if($valid){
            if( $_FILES['certificate']['size'] > 1000000 ){ //Ensure file is not above 1MB
                $_SESSION['status'] .= "<div class='bg-danger text-center'>File too large (file must not exceed 1MB.<br /></div>";
            }else{
                try{
                    $name= time().$ext;
                    $upload= $pdo->prepare("INSERT INTO Certificate(title, img, toolbox_id, verification) VALUES(:title, :nam, :cat, :ver)");
                    $upload->execute(array(
                        ':title'=> $title,
                        ':nam'=> $name,
                        ':cat'=> $cat,
                        ':ver'=> $verification
                    ));
                    //move_uploaded_file($_FILES['certificate']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/images/certificate/'.$name);
                    move_uploaded_file($_FILES['certificate']['tmp_name'], 'C:/xampp/htdocs/MyPortfolio/images/certificate/'.$name);
                    $_SESSION['status']= "<div class='container-fluid bg-success text-center text-break p-5 fs-4'><strong>File uploaded successfully.</strong><br />Tile: ".htmlentities($title)." <br /> Verification Link: ".htmlentities($verification)." <br />Filename: $name<br />File Size:". ($_FILES['certificate']['size']/1000)." KB<br /></div>";
                    unset($_SESSION['title']);
                    unset($_SESSION['tool_category']);
                    unset($_SESSION['verification']);
                }catch(Exception $e){
                    error_log("Database(Admin) error  ::::". $e->getMessage());
                    $_SESSION['status'] = "<div class='bg-danger text-center'>An error occurred.<br /></div>";
                }
            }
        }
    }
    header("Location: Ucertificate.php");
    return;
}
?>





<?php
//view start here....
require_once("header.php");

flashMessage('status');//Flash status message
//repopulate form value
$title= repopulate('title');
$verification= repopulate('verification');
$cat= repopulate('tool_category');
$select= ($cat != "" || $cat != "0") ? "" :"selected";
?>
<div class="container p-5 fs-4">
    <h1> Upload Certificate</h1><br>
<form method="post" action="Ucertificate.php" enctype="multipart/form-data" class="fs-4">
    <!-- PHP shoud control title length not too be too much-->
            <label for="Title">Title   </label>&nbsp;&nbsp;
            <input type="text" name="title" value="<?= $title; ?>" class="form-control" /> <br />
            <label for="Title">Verification Link(optional)  </label>&nbsp;&nbsp;
            <input type="url" name="verification" value="<?= $verification; ?>" class="form-control" /> <br />
            <label for="Screenshot" class="form-label">Screenshot  </label>
            <input type="file" name="certificate" class="form-control" accept="image/*" /> <br />
            <label for="toolbox">Category</label>&nbsp;&nbsp;
            <select name="tool_category" class="form-select form-select-sm">
                <option value='0' <?= $select; ?>> Certificate Category</option>
                <?php
                    if($tval){
                        while($t = $tool->fetch(PDO::FETCH_ASSOC)){
                            $select= ($t['toolbox_id'] == $cat) ? "selected": "";
                            echo "<option value='$t[toolbox_id]' $select>$t[tool_name]</option>";
                        }
                    }
                ?>
            </select><br /><br />
            <input type="submit"  class="btn btn-primary btn-lg float-end" value="UPLOAD" />
</form>
<br />
</div>

<?php
require_once("footer.php");
?>