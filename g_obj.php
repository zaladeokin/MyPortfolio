<?php
include('Google/vendor/autoload.php');// for google login

$client = new Google_Client();
$client->setClientId("693325554997-fdfg2l85a7donm3buln243bki09v4oqg.apps.googleusercontent.com");
$client->setClientSecret("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");
$client->setRedirectUri("https://zlib.zack.com.ng/udemy/verification/g_callback.php");
$client->addScope("email");
$client->addScope("profile");

$service= new Google_Service_Oauth2($client);

?>