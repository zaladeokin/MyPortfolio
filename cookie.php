<?php
session_start();
include('Facebook/autoload.php');// for facebook login

//Cookie start here
if( isset($_COOKIE['guestEmail']) && isset($_COOKIE['guest_Browser']) && $_COOKIE['guest_Browser'] == $_SERVER['HTTP_USER_AGENT']){
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
            'app_id' => "1371963800219541",
            'app_secret' => "95e62a4179ae6a20ccca47eed4e8e245",
            "default_graph_version" => "v2.5",
        ]
    );
    
    $helper= $fb->getRedirectLoginHelper();
}
?>