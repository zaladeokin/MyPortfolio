<?php
if( isset($_COOKIE['guestEmail']) && isset($_COOKIE['guest_Browser']) && $_COOKIE['guest_Browser'] == $_SERVER['HTTP_USER_AGENT']){
    $_SESSION['email']= $_COOKIE['guestEmail'];
}
?>