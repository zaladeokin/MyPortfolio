<?php
/*
Run this on your Database server... Replace localhost with your website address.
hint:: Admin@zack.com.ng

GRANT ALL ON Portfolio.* TO 'Admin'@'localhost' IDENTIFIED BY 'webAdmin';

*/
$pdo= new PDO('mysql:host=localhost;port='._PORT_.';dbname='._DB_, _ADMIN_USER_, _ADMIN_PASS_);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>