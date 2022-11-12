<?php
include("header.php");

$status="";
if( isset($_FILES['image']) && $_POST['name']=="" ){
    $status= "<div class='bg-danger text-center'>The Project Name field must be filled.<br /></div>";
}
if( isset($_FILES['image']) && $_POST['description'] == "" ){
    $status .= "<div class='bg-danger text-center'>The description field must be filled.<br /></div>";
}
if( isset($_FILES['image']) && $_FILES['image']['size'] <= 0 ){
    $status .= "<div class='bg-danger text-center'>Choose image to upload.<br /></div>";
}


if( isset($_FILES['image']) && $_POST['name'] !="" && $_POST['description'] != "" ){
    switch($_FILES['image']['type']){
        //check file type and create file extention, return false if not image.
        case 'image/jpeg': $ext = '.jpg';$valid= true; break;
        case 'image/gif': $ext = '.gif';$valid= true; break;
        case 'image/png': $ext = '.png';$valid= true; break;
        case 'image/tiff': $ext = '.tif';$valid= true; break;
        default: $ext = '';$valid= false; $status="<div class='bg-danger text-center'>Invalid file type.<br /></div>"; break;
    }
    if($valid){
        if( $_FILES['image']['size'] > 1000000 ){ //Ensure file is not above 1MB
            $status = "<div class='bg-danger text-center'>File too large (file must not exceed 1MB.<br /></div>";
        }else{
            $img= time().$ext;
            $pname= filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $description= filter_var($_POST['description'], FILTER_SANITIZE_STRING);
            move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/images/MyWork/'.$img);
            //move_uploaded_file($_FILES['image']['tmp_name'], 'C:/xampp/htdocs/MyPortfolio/images/MyWork/'.$img);
            query("INSERT INTO Project(project_name, img, description) VALUES('$pname', '$img', '$description')");
            $status= "<div class='container-fluid bg-success text-center text-break p-5 fs-4'><strong>File uploaded successfully.</strong><br />Project Name: $pname <br /> Description: $description <br />Filename: $img<br />File Size:". ($_FILES['image']['size']/1000)." KB<br /></div>";
        }
    }
}

?>





<?php
// View start here
?>
<?= $status; ?>
<div class="container p-5 fs-4">
    <h1> Upload Project Work</h1><br>
<form method="post" action="Uproject.php" enctype="multipart/form-data" class="fs-4">
    <!-- PHP shoud control title and description length not too be too much-->
            <label for="Title">Project Name (max of 50 character)   </label>&nbsp;&nbsp;
            <input type="text" name="name" class="form-control" /> <br />
            <label for="description">Description (max of 250 character)  </label>
            <textarea name="description" class="form-control" rows="5"></textarea><br />
        <label for="image" class="form-label">Screenshot  </label>
        <input type="file" name="image" class="form-control"  accept="image/*" /> <br /><br />
        <input type="submit"  class="btn btn-primary btn-lg float-end" value="UPLOAD" />
</form>
<br />
</div>

<?php
include("footer.php");
?>