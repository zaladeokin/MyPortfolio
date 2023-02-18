<?php
if(!isset($_SESSION['client_name'])){
include('g_obj.php');
$g_loginurl= $client->createAuthUrl();//google siginin redirection link

//facebook auth url
    $permissions= ['email'];//Facebook login
    $loginUrl= $helper->getLoginURL("https://zack.com.ng/fb_callback.php", $permissions);
    }
?>
<section>
    <strong>Dear Client,</strong><br>
    <p>In order to have good customer relation and effective communication with client, I'll like to have some information about you. Kindly click any of the button below to continue as an identifiable client.</p>
    <a href="<?= $g_loginurl; ?>"><button><i class="fa-brands fa-google" id="gmIco"></i>&nbsp;Continue with Google</button></a>
    <a href="<?= $loginUrl; ?>"><button><i class="fa-brands fa-facebook" id="fb"></i>&nbsp;Continue with Facebook</button></a> 
</section>