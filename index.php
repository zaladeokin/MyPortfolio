<?php
session_start();
require_once('cookie.php');
require_once('header.php');
?>
<div class="row fs-4" style="padding:1em;">
    <div class="col-sm-9">
        <h1>About Me</h1><br />
        <img id="photo" src="\MyPortfolio\images\myPhoto.jpg" /> <!-- <img id="photo" src="images/myPhoto.jpg" /> -->
        <p>
        Hello, I'm Aladeokin Zacchaeus by name, you can simply call me Zack...<br />
        I'm a web developer. <br>
        It will be nice  to introduce myself: what I do? how I do it? and also what I've done?
        I'm in to Web Development and I code using PHP and MySQL for back-end web application and have solid knowledge and experience in HTML, CSS and JavaScript. </p>
        <p>I specialized in the back-end development of web application integrated with front-end development which qualifies me to be called a Full-stack Web Developer.</p>
        <p>In additiion, I use GIT as part of my development tools to manage my code. Also, you can check out my repositories on <a href="https://github.com/zaladeokin">GitHub</a>. If you need a partner to work with remotely, you meet the right person. You can hire me to develop website for your organization,business, blog,e.t.c.</p>
    </div>
    <div class="col-sm-3">
        <div>
            <strong> My Platforms:</strong><br />
            <a href="mailto: zaladeokin@gmail.com"><i class="fa-regular fa-envelope fa-4x" id="gmIco"></i></a>
             <a href="https://github.com/zaladeokin"><i class="fa-brands fa-github fa-4x" id="ghIco"></i></a>
              <a href="https://www.linkedin.com/in/zacchaeus-aladeokin-7b334a22a"><i class="fa-brands fa-linkedin fa-4x" id="liIco"></i></a>
              <a href="https://api.whatsapp.com/send?phone=2348135994222"><i class="fa-brands fa-whatsapp fa-4x" id="waIco"></i></a><br /><br />
            <strong>Check out my:</strong>
            <ul>
                <li><a href="portfolio.php">Portfolio</a></li>
                <li><a href="certification.php">Certification</a></li>
            </ul>
            </p>
        </div>
        <div>
            <strong>My tools:</strong>
             <!-- Caurosel start here-->
                 <?php
                    require_once("skillshow.php");
                 ?>
        <!-- Caurosel ends here -->
        </div>
    </div>
</div>
<?php
require_once('footer.php');
?>
