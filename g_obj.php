<?php
include('Google/vendor/autoload.php');// for google login

$client = new Google_Client();
$client->setClientId(_G_SITE_ID_);
$client->setClientSecret(_G_SECRET_KEY_);
$client->setRedirectUri("https://zlib.zack.com.ng/udemy/verification/g_callback.php");
$client->addScope("email");
$client->addScope("profile");

$service= new Google_Service_Oauth2($client);

?>