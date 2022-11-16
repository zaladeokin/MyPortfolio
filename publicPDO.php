<?php
/*
Run this on your Database server... Replace localhost with your website address.

GRANT INSERT ON Portfolio.message TO 'Guest'@'localhost' IDENTIFIED BY 'publicUser';
GRANT SELECT ON Portfolio.* TO 'Guest'@'localhost';

*/
$pdo= new PDO('mysql:host=localhost;port=3306;dbname=portfolio', 'Guest', 'publicUser');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>