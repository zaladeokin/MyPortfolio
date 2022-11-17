<?php
session_start();
//require_once("adminPDO.php");
//require_once("C:/xampp/htdocs/Zlib/zlib.php");
require_once("auth.php");
//Model start here.

//control access to admin page
$access= isset($_GET['private'])? $_GET['private']:"intruder";
if($access != hash('md5', '111')){
    //header("Location:http://webnesis.22web.org"); //Intruder redirect to non-admin homepage
    header("Location:http://localhost/MyPortfolio/"); //Intruder redirect to non-admin homepage
}

//destroy existing session
if(isset($_SESSION['admin'])){
    session_destroy();
}
$check= "Admin001";
$rt= time(); //request time for salting
$check1= hash('md5', "webAdmin".$rt);

//validate login
if(isset($_POST['user']) && isset($_POST['password'])){
    $user= filter_var($_POST['user'], FILTER_SANITIZE_STRING);
    $password= hash('md5', filter_var($_POST['password'], FILTER_SANITIZE_STRING).$rt);
    if( $user=== $check && $password === $check1){
        $_SESSION['admin']= $user;
        header("Location:home.php"); //To homepage
    }else{
    //header("Location:http://webnesis.22web.org/"); //Incorrect login details redirect to non-admin homepage
    header("Location:http://localhost/MyPortfolio/"); //Incorrect login details redirect to non-admin homepage
    }
}

?>






<?php
//  View starts here
require_once("header.php");
?>

<div class="container p-5 fs-4">
    <h1> Portal</h1><br>
<form method="post" class="fs-4">
    <!-- Login form, PHP should generate hash for this page to be access-->
            <label for="user">User  </label>&nbsp;&nbsp;
            <input type="text" name="user" class="form-control" /> <br />
            <label for="password">Password  </label>&nbsp;&nbsp;
            <input type="password" name="password" class="form-control" /> <br /><br />
            <input type="submit"  class="btn btn-primary btn-lg float-end" value="Login" />
</form>
<br />
</div>

<?php
include("footer.php");
?>