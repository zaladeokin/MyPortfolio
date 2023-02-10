<?php
/*
Run this on your Database server... Replace localhost with your website address.
hint:: Admin@zack.com.ng

GRANT ALL ON Portfolio.* TO 'Admin'@'localhost' IDENTIFIED BY 'webAdmin';

*/
$pdo= new PDO('mysql:host=localhost;port=3306;dbname=portfolio', 'Admin', 'webAdmin');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>