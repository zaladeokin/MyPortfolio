<?php
session_start();
session_destroy();
setcookie('client_name', $name, time()-60*60*24*365, "/");
setcookie('guestEmail', $_SESSION['email'], time()-60*60*24*365, "/");
setcookie('guest_Browser', $_SERVER['HTTP_USER_AGENT'], time()-60*60*24*365, "/");
header("Location: index.php");
?>