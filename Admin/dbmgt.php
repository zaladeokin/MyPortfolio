<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "portfolio";
// first create DB connection:
 $conn= mysqli_connect($host, $user, $pass, $db);
if ($conn->connect_error) die($conn->connect_error);


//to create table
function createTable($tname, $tProperty)
{
query("CREATE TABLE IF NOT EXISTS $tname($tProperty) ENGINE = InnoDB");
echo "<h1>Table '$tname' created or already exists.</h1><br>";
}

//To make query
function query($query)
{
global $conn;
$result = $conn->query($query);
if (!$result) die($connection->error);
return $result;
}
//use fetch_assoc(),num_Rows with $connection
//close database with mysqli_close($connection)

?>