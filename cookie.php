<?php
$browser= isset($_COOKIE['guest_Browser']) ? $_COOKIE['guest_Browser'] : $_SERVER['HTTP_USER_AGENT'];
$cook_email= isset($_COOKIE['guest_EMail']) ? $_COOKIE['guest_EMail'] : "";

if( !isset($_COOKIE['guest_EMail']) && !isset($_COOKIE['guest_Browser']) && !isset($_SESSION['email']) ){
    // don't set cookies if session is not available
    $icook= false;
}else if( (!isset($_COOKIE['guest_EMail']) || !isset($_COOKIE['guest_Browser'])) && isset($_SESSION['email']) && $_SESSION['email'] != ""){// set cookies if not set and session email is set
    $icook= true;
}else if( isset($_SESSION['email'])  && $cook_email != $_SESSION['email'] ){
    if($_SESSION['email'] != ""){
        $icook=true;
    }else{
        $_SESSION['email']= $cook_email;
        $icook= false;
    }
}else if( !isset($_SESSION['email']) && isset($_COOKIE['guest_EMail']) && isset($_COOKIE['guest_Browser']) ){
    $_SESSION['email']= $_COOKIE['guest_EMail'];
    $icook= false;
}

if( isset($_COOKIE['guest_Browser']) && $browser != $_SERVER['HTTP_USER_AGENT']){
    $icook= false;
    $_SESSION['email']= "";
}

if( $icook ){
    setcookie('guest_Email', $_SESSION['email'], time()+60*60*24*365, "localhost/MyPortfolio/");
    setcookie('guest_Browser', $browser, time()+60*60*24*365, "localhost/MyPortfolio/");
}

?>