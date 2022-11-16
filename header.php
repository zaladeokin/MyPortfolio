<!DOCTYPE html>
<html lang="en">
    <head>
      <?php //Use PHP to generate dynamic title for page. ?>
        <title>Webnesis</title>
        <meta name="keywords" content="website, webpage, development, developer,webnesis, developer" />
        <meta name="author" content="Zacchaeus Aladeokin" />
        <meta name="description" content="This webpage is where you can know about me as your web developer and view my works and certification." />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="stylesheet" href="css/bootstrap.css">
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->

        <!-- <script src="https://kit.fontawesome.com/ff93137bee.js" crossorigin="anonymous"></script> -->
        <link rel="stylesheet" href="myStyle/header.css">
        <link rel="stylesheet" href="myStyle/body.css">
        <link rel="stylesheet" href="myStyle/footer.css">
        </head>
<body>
<header id="header">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">
            <img class="hLogo" src="\MyPortfolio\images\logo.png" /><!--  <img class="hLogo" src="images/logo.png" /> --><span id="sHeading">WEBNESIS</span></div>
          </a>
          <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle menu">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse bg-light" id="menu">
            <ul class="navbar-nav fs-2 text-center">
              <li class="nav-item"><a class="nav-link" href="index.php">About</a></li>
              <li class="nav-item"><a class="nav-link" href="portfolio.php">Portfolio</a></li>
              <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
              <li class="nav-item"><a class="nav-link" href="certification.php">Certification</a></li>
            </ul>
          </div> 
        </div>
      </nav>
    </header>
<?php
/* 
Remember to close the below tag in footer.php
    </body>
</html>
*/
?>