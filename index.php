<?php
require('header.php');
?>
<div class="row fs-4" style="padding:1em;">
    <div class="col-sm-9">
        <h1>About Me</h1><br />
        <img id="photo" src="\MyPortfolio\images\myPhoto.jpg" />
        <p>
        Hello, My name is Zack...<br />
        I'm a web developer. <br>
        It will be good to know what i do, how I do it, and lastly what i've done.
        I'm a developer that use PHP and MySQL for back-end web application and equip with adequate knowledge of HTML, CSS and JavaScript. </p>
        <p>I specialized in the back-end development of web application with enough knowledge for front-end development which is essential for a full-stack developer.</p>
        <p>In additiion, I'm skilled in GIT and used it as part of my development tools. Also, you can check me out on GitHub with the username "zaladeokin". If you need a partner to work with remotely, you meet the right person. You can hire me to develop website for your organization,business, blog,e.t.c.</p>
    </div>
    <div class="col-sm-3">
        <div>
            <strong> Are you looking for a WEB Developer?</strong>
            <br><br> <p><span style="color:green">Here I am</span>, it's a pleasure to work with you<br />
            Check out my:
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
require('footer.php');
?>
