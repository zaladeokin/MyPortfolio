<?php
/*
Run this on your Database server... Replace localhost with your website address.
Hint: Guest@Portfolio
GRANT INSERT ON Portfolio.message TO 'Guest'@'localhost' IDENTIFIED BY 'publicUser';
GRANT SELECT ON Portfolio.* TO 'Guest'@'localhost';

*/
$pdo= new PDO('mysql:host=localhost;port=3306;dbname=portfolio', _USER_, _PASS_);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>