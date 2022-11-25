<?php
$page=$_SERVER['SCRIPT_NAME'];
if(isset($_SESSION['admin'])){
  $auth=true;
} else{$auth= false;}

//if( $page == "/Admin/index.php"){
if( $page == "/MyPortfolio/Admin/index.php"){
  //Login page
  $auth= false; //disable navbar
}else if(!$auth){
  header("Location:index.php"); //Must login
}


?>