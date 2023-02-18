<!DOCTYPE html>
<html lang="en">
    <head>
<?php 
//Use PHP to generate dynamic title for page.
require_once('head.php');
?>
        </head>
<body>
<header id="header">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">
            <img class="hLogo" src="images/logo.png" /><span id="sHeading">WEBNESIS</span></div>
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
//Flash POST status message
flashMessage('status');


/* 
Remember to close the below tag in footer.php
    </body>
</html>
*/
?>