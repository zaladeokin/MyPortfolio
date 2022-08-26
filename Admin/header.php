<?php
session_start();
$page=$_SERVER['SCRIPT_NAME'];
$auth= true;
if( $page == "/MyPortfolio/Admin/index.php"){
  //Login page
  $auth= false; //disable navbar
  if(isset($_SESSION['admin'])){
    session_destroy();//logout user on loading index.php
    }
}else if(!isset($_SESSION['admin'])){
  header("Location:index.php"); //Must login
}


?>



<?php 
//View start here
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Administration</title>
        <meta name="author" content="Zacchaeus Aladeokin" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="http://localhost/MyPortfolio/css/bootstrap.css">
        <link rel="stylesheet" href="http://localhost/MyPortfolio/myStyle/header.css">
        <!--<link rel="stylesheet" href="myStyle/body.css"> -->
        <link rel="stylesheet" href="http://localhost/MyPortfolio/myStyle/footer.css">
        </head>
<body>
<header id="header">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <!-- <a class="navbar-brand" href="index.php"> -->
            <img class="hLogo" src="\MyPortfolio\images\logo.png" /><span id="sHeading">WEBNESIS</span></div>
          <!-- </a> -->
<?php 
if($auth){
  echo <<<_END
          <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse bg-light" id="menu">
            <ul class="navbar-nav fs-2 text-center">
              <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="Uproject.php">Project</a></li>
              <li class="nav-item"><a class="nav-link" href="Ucertificate.php">Certificate</a></li>
            </ul>
          </div>
      _END;
    }
  ?>
        </div>
      </nav>
    </header>
<?php
echo "$page"; //remove this line when done, it's just for debugging
/* 
Remember to close the below tag in footer.php
    </body>
</html>
*/
?>