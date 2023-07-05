<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/zlib/zlib.php");
require_once("auth.php");
//Model start here.

//control access to admin page
$access= isset($_GET['private'])? $_GET['private']:"intruder";
if($access != _ADMIN_ACCESS_){
    //header("Location:http://webnesis.22web.org"); //Intruder redirect to non-admin homepage
    header("Location:http://localhost/MyPortfolio/"); //Intruder redirect to non-admin homepage
}

//destroy existing session
if(isset($_SESSION['admin'])){
    session_destroy();
}

//reCaptcha validation
/*if(isset($_POST['verify'])){//reCaptcha processing
    $token= $_POST['g-recaptcha-response'];
    $reCaptcha= reCaptchaVerify(_V2_SECRET_KEY_, $token);
    $reCapVal= $reCaptcha->success;
}else{
    $reCapVal= false;
}*/


$check= _ADMIN_USERNAME_;
$rt= time(); //request time for salting
$check1= hash('md5', _ADMIN_PASSW_.$rt);

//validate login
if( isset($_POST['user']) && isset($_POST['password'])/* && $reCapVal*/ ){
    $user= filter_var($_POST['user'], FILTER_SANITIZE_STRING);
    $password= hash('md5', filter_var($_POST['password'], FILTER_SANITIZE_STRING).$rt);
    if( $user=== $check && $password === $check1){
        $_SESSION['admin']= $user;
        header("Location:home.php"); //To homepage
    }else{
    //header("Location:http://webnesis.22web.org/"); //Incorrect login details redirect to non-admin homepage
    header("Location:http://localhost/MyPortfolio/"); //Incorrect login details redirect to non-admin homepage
    return;
    }
}

?>






<?php
//  View starts here
require_once("header.php");
?>

<div class="container p-5 fs-4">
    <h1> Portal</h1><br>
    <form method="post" class="fs-4" id="bot">
        <?php // Login form, PHP should generate hash for this page to be access ?>
        <label for="user">User </label>&nbsp;&nbsp;
        <input type="text" name="user" class="form-control" /> <br />
        <label for="password">Password </label>&nbsp;&nbsp;
        <input type="password" name="password" class="form-control" /> <br>
        <!--<div id="test" class="g-recaptcha"></div><br>-->
        <input type="submit" name="verify" class="btn btn-primary btn-lg float-end" value="Login" />
    </form>
    <br />
</div>

<?php
require_once("footer.php");
?>