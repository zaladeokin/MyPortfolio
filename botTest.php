<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/zlib/zlib.php");
if( isset($_COOKIE['request']) ){//Get Data sumitted && restrict access
    $post= unserialize($_COOKIE['request']);

if(isset($_POST['verify'])){//reCaptcha processing
    $token= $_POST['g-recaptcha-response'];
    $reCaptcha= reCaptchaVerify("6LeMhXAkAAAAAD8itTn2YbPiZZHPnbpvAI6k18NG", $token);
    $reCapVal= $reCaptcha->success;
    if($reCapVal){
        $_SESSION['notBot'] = true;
        $_SESSION['email']= $post['email'];// Restore content for form in contact.php
        $_SESSION['message']= $post['message'];
        setcookie('request', "", time() - (60*5), "/");//destroy cookie on success.
        header("Location: contact.php");
        return;
    }
}




require_once('header.php');
?>
<div class="row fs-4" style="padding:1em;">
    <div class="col-sm">
        <div class="alert alert-danger">
            <h1> Bot activity detected.</h1>
            <p> Please, verify you're a human</p>
            <form method="POST" action="botTest.php" id="bot" role="verification">
            <div id="test" class="g-recaptcha"></div>
            <input type="submit" name="verify" value="Verify">
</form>
          </div> 
        </div>
      </div>
<?php
require_once('footer.php');
}else{ header("Location: index.php"); return; } //First $_COOKIES "if" close here
?>
