<?php
include("header.php");
//Tool category from Database
$tool= query("SELECT * FROM tOOLBOX");
$tval= ($tool->num_rows > 0 ) ? true : false; // check if Tool category have been created



$status="";
if( isset($_FILES['certificate']) && $_POST['title']=="" ){
    $status= "<div class='bg-danger text-center'>The title field must be filled.<br /></div>";
}
if( isset($_FILES['certificate']) && $_POST['tool_category'] == "0" ){
    $status .= "<div class='bg-danger text-center'>Choose certificate category.<br /></div>";
}
if( isset($_FILES['certificate']) && $_POST['title'] !="" && $_POST['tool_category'] != "0" ){
    switch($_FILES['certificate']['type']){
        //check file type and create file extention, return false if not image.
        case 'image/jpeg': $ext = '.jpg';$valid= true; break;
        case 'image/gif': $ext = '.gif';$valid= true; break;
        case 'image/png': $ext = '.png';$valid= true; break;
        case 'image/tiff': $ext = '.tif';$valid= true; break;
        default: $ext = '';$valid= false; $status="<div class='bg-danger text-center'>Invalid file type.<br /></div>"; break;
    }
    if($valid){
        if( $_FILES['certificate']['size'] > 1000000 ){ //Ensure file is not above 1MB
            $status = "<div class='bg-danger text-center'>File too large (file must not exceed 1MB.<br /></div>";
        }else{
            $name= time().$ext;
            $title= filter_var($_POST['title'], FILTER_SANITIZE_STRING);
            $verification= filter_var($_POST['verification'], FILTER_VALIDATE_URL);
            $cat= filter_var($_POST['tool_category'], FILTER_SANITIZE_STRING);
            move_uploaded_file($_FILES['certificate']['tmp_name'], 'C:/xampp/htdocs/MyPortfolio/images/certificate/'.$name);
            query("INSERT INTO Certificate(title, img, toolbox_id, verification) VALUES('$title', '$name', $cat, '$verification')");
            $status= "<div class='container-fluid bg-success text-center text-break p-5 fs-4'><strong>File uploaded successfully.</strong><br />Tile: $title <br /> Verification Link: $verification <br />Filename: $name<br />File Size:". ($_FILES['certificate']['size']/1000)." KB<br /></div>";
        }
    }
}
?>





<?php
//view start here....
?>
<?= $status; ?>
<div class="container p-5 fs-4">
    <h1> Upload Certificate</h1><br>
<form method="post" action="Ucertificate.php" enctype="multipart/form-data" class="fs-4">
    <!-- PHP shoud control title length not too be too much-->
            <label for="Title">Title   </label>&nbsp;&nbsp;
            <input type="text" name="title" class="form-control" /> <br />
            <label for="Title">Verification Link(optional)  </label>&nbsp;&nbsp;
            <input type="url" name="verification" class="form-control" /> <br />
            <label for="Screenshot" class="form-label">Screenshot  </label>
            <input type="file" name="certificate" class="form-control" accept="image/*" /> <br />
            <label for="toolbox">Category</label>&nbsp;&nbsp;
            <select name="tool_category" class="form-select form-select-sm">
                <option value='0' selected> Certificate Category</option>
                <?php
                    if($tval){
                        while($t = $tool->fetch_assoc()){
                            echo "<option value='$t[toolbox_id]'>$t[tool_name]</option>";
                        }
                    }
                ?>
            </select><br /><br />
            <input type="submit"  class="btn btn-primary btn-lg float-end" value="UPLOAD" />
</form>
<br />
</div>

<?php
include("footer.php");
?>