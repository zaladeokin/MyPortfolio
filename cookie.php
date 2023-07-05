<?php
session_start();
require_once("Admin/config.php");
require_once($_SERVER['DOCUMENT_ROOT']."/zlib/zlib.php");
include('Facebook/autoload.php');// for facebook login

//Cookie start here
if( isset($_COOKIE['guestEmail'])){
    $_SESSION['email']= $_COOKIE['guestEmail'];
}
if( isset($_COOKIE['client_name']) ){
    $_SESSION['client_name']= $_COOKIE['client_name'];
}

$current_file = basename($_SERVER['SCRIPT_NAME']);

//Include facebook login object on contact.php and index.php
if( ($current_file == "contact.php" || $current_file== "index.php" || $current_file == "fb_callback.php") && !isset($_SESSION['client_name']) ){
    $fb= new \Facebook\Facebook(
        [
            'app_id' => _FB_APP_ID_,
            'app_secret' => _FB_APP_SECRET_KEY_,
            "default_graph_version" => _FB_APP_VERSION_,
        ]
    );
    
    $helper= $fb->getRedirectLoginHelper();
}
?>