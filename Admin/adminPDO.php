<?php
/*
Run this on your Database server... Replace localhost with your website address.

GRANT INSERT 

*/
$pdo= new PDO('mysql:host=localhost;port=3306;dbname=misc', 'zack', 'lack');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>