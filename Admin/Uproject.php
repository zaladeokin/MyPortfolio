<?php
session_start();
require_once("adminPDO.php");
//require_once("http://webnesis.byehost7.com/Zlib/zlib.php");
require_once("C:/xampp/htdocs/Zlib/zlib.php");
require_once("auth.php");

if( isset($_FILES['image']) && isset($_POST['name']) && isset($_POST['description']) ){
    $_SESSION['status']="";
    $name= $_SESSION['name'] = $_POST['name'];
    $description= $_SESSION['description'] = $_POST['description'];
    if( $name=="" ){
        $_SESSION['status'] .= "<div class='bg-danger text-center'>The Project Name field must be filled.<br /></div>";
    }
    if( $description == "" ){
        $_SESSION['status'] .= "<div class='bg-danger text-center'>The description field must be filled.<br /></div>";
    }
    if( $_FILES['image']['size'] <= 0 ){
        $_SESSION['status'] .= "<div class='bg-danger text-center'>Choose image to upload.<br /></div>";
    }


    if( $name !="" && $description != "" && $_FILES['image']['size'] > 0 ){
        switch($_FILES['image']['type']){
            //check file type and create file extention, return false if not image.
            case 'image/jpeg': $ext = '.jpg';$valid= true; break;
            case 'image/gif': $ext = '.gif';$valid= true; break;
            case 'image/png': $ext = '.png';$valid= true; break;
            case 'image/tiff': $ext = '.tif';$valid= true; break;
            default: $ext = '';$valid= false; $_SESSION['status'] ="<div class='bg-danger text-center'>Invalid file type.<br /></div>"; break;
        }
        if($valid){
            if( $_FILES['image']['size'] > 1000000 ){ //Ensure file is not above 1MB
                $_SESSION['status'] = "<div class='bg-danger text-center'>File too large (file must not exceed 1MB.<br /></div>";
            }else{
                try{
                    $img= time().$ext;
                    $upload= $pdo->prepare("INSERT INTO Project(project_name, img, description) VALUES(:name, :img, :description)");
                    $upload->execute(array(
                        ':name'=> $name,
                        ':img'=> $img,
                        ':description'=> $description
                    ));
                    //move_uploaded_file($_FILES['image']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/images/MyWork/'.$img);
                    move_uploaded_file($_FILES['image']['tmp_name'], 'C:/xampp/htdocs/MyPortfolio/images/MyWork/'.$img);
                    $_SESSION['status'] = "<div class='container-fluid bg-success text-center text-break p-5 fs-4'><strong>File uploaded successfully.</strong><br />Project Name: $name <br /> Description: $description <br />Filename: $img<br />File Size:". ($_FILES['image']['size']/1000)." KB<br /></div>";
                    unset($_SESSION['name']);
                    unset($_SESSION['description']);
                }catch(Exception $e){
                    error_log("Database(Admin) error  ::::". $e->getMessage());
                    $_SESSION['status'] = "<div class='bg-danger text-center'>An error occurred.<br /></div>";
                }
            }
        }
    }
    header("Location: Uproject.php");
    return;
}

?>





<?php
// View start here
require_once("header.php");

flashMessage('status');//Flash status message
//repopulate form value
$name= repopulate('name');
$description= repopulate('description');
 ?>
<div class="container p-5 fs-4">
    <h1> Upload Project Work</h1><br>
<form method="post" action="Uproject.php" enctype="multipart/form-data" class="fs-4">
    <?php //PHP shoud control title and description length not too be too much ?>
            <label for="Title">Project Name (max of 50 character)   </label>&nbsp;&nbsp;
            <input type="text" name="name" value="<?= $name; ?>" class="form-control" /> <br />
            <label for="description">Description (max of 250 character)  </label>
            <textarea name="description" class="form-control" rows="5"><?= $description; ?></textarea><br />
        <label for="image" class="form-label">Screenshot  </label>
        <input type="file" name="image" class="form-control"  accept="image/*" /> <br /><br />
        <input type="submit"  class="btn btn-primary btn-lg float-end" value="UPLOAD" />
</form>
<br />
</div>

<?php
require_once("footer.php");
?>