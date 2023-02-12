<?php
include("email.php");
$sub= "Zacchaeus @Webnesis";
$to= "zaladeokin@gmail.com";
send_mail($to,$sub, autoResponse($to), header_param());
?>