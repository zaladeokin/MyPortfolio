<?php if( ($current_file == "index.php" || $current_file == "contact.php") && !isset($_SESSION['client_name']) ){ ?>
    <aside id="auth"><button id="close">Discard</button><?php include("fb_auth_page.php"); ?></aside>
<?php 
}
if( isset($_SESSION['client_name']) && !isset($_SESSION['first_login'])){
    $_SESSION['first_login']= true;//to confirm if the previous user should continue current session ?>
    <aside id="logout"><i class="fa-solid fa-xmark float-end fa-1x" id="hide"></i><br>
    <p>Welcome <?= $_SESSION['client_name']; ?><p>
    <p>Not you?&nbsp;&nbsp;<a href="logout.php">Login as different user.</a></p>
    </aside>
<?php } ?>
<footer id="footer">
    <div class="row">
        <div clas="col-12">
            <div>
                &copy; <?= date("Y", time());?> WEBNESIS  <img src="images/icon.png" />
            </div>
        </div>
    </div>
</footer>
<script src="js/bootstrap.bundle.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> -->

<?php if($current_file == "contact.php"){?>

<script>
    /*var disable= document.getElementById("submit");
    disable.disabled= true;
    grecaptcha.ready(function() {
      grecaptcha.execute('6Lc6SW8kAAAAADgC147OPVUdWk4163E2vD6ytmVo', {action: 'contact'}).then(function(token) {
          document.getElementById("v-token").value= token;
          disable.removeChild(document.getElementById("load"));
          disable.appendChild(document.createTextNode("Send Message"));
          disable.disabled= false;
      });
    });*/
</script>

<?php }else if($current_file == "botTest.php"){ ?>

<!--<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
async defer></script>-->
<script type="text/javascript">
/*var Submit= false;//to make reCaptcha required.

var Verify= function(response){
    if(response == grecaptcha.getResponse()){
        Submit= true;
    }
}

var onloadCallback = function() {
grecaptcha.render('test', {
    'sitekey': '6LeMhXAkAAAAALvVjFq_DMr6ZQzGONpeQLg4UX3j',
    'callback': Verify,
    'theme' : 'darK',
});
}
document.getElementById('bot').addEventListener("submit", function(event){//Make reCaptcha required
if(Submit){
    document.getElementsByTagName('iframe')[0].removeAttribute("style");
}else{
    event.preventDefault();
    document.getElementsByTagName('iframe')[0].style.border= "1px solid red";
}
});*/
</script>

<?php } 
if($current_file == "index.php" || $current_file == "contact.php"){
?>
<script src="scripts/notification.js"></script><?php //Sigin notification ?>
<?php } ?>
</body>
</html>