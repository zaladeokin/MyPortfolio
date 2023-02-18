<?php
require_once('cookie.php');
require_once('publicPDO.php');
include("email.php");
require_once('g_obj.php');

function admin_mail($sender){//Develop content of mail to be sent to admin.
    $mes= <<<_int
        <strong>Hello Zack,</strong><br>
        $sender is now one of your registered clients. Welcome and follow up your new client. <br><br>
        _int;
    return $body= customMessage($mes);
}

function welcome_mail($sender){//welcome mail to be sent to client.
    $mes= <<<_int
        <strong>Dear $sender,</strong><br>
        I'm happy you've upgraded from an anonymous client to a known one,Thanks for sharing your information with me, It's a priviledge having your contact.<br><br>
            <img id="photo" src="http://zack.com.ng/images/myPhoto.jpg" /><br>
            Zacchaeus A. S.<br>
            (Web Developer)
        _int;
    return $body= customMessage($mes);
}

if(isset($_GET['code'])){//google will return a $_GET['code'] after successfulll verification
    $client->authenticate($_GET['code']);
    $access_token=  $client->getAccessToken($_GET['code']);
    if($access_token){
        $client->setAccessToken($access_token);
        $g= $service->userinfo->get();
        if(!empty($g)){
            $name= $g->name;    $email= $g->email; $img= $g->picture;
            try{
                $data= $pdo->query("SELECT * FROM Client WHERE email='$email'");
                if( ($data->rowCount()) > 0 ){ //User data already exist
                    $_SESSION['client_name']= $name;
                    $_SESSION['email']= $email;
                    $_SESSION['first_login']= true;//to confirm if the previous user should continue current session
                    setcookie('client_name', $name, time()+60*60*24*365, "/");
                    setcookie('guestEmail', $email, time()+60*60*24*365, "/");
                    header("Location: index.php");
                    return;
                }else{//not exist, register client
                    try{
                        $upload= $pdo->prepare("INSERT INTO Client(name, email, img) VALUES(:name, :em, :img)");
                        $upload->execute(array(
                            ':name' => $name,
                            ':em'=> $email,
                            ':img'=> $img
                        ));
                        $sub= "Zacchaeus @Webnesis";
                        send_mail($email,$sub, welcome_mail($name), header_param());
                        send_mail('webdev@zack.com.ng',"New Client ($name)", admin_mail($name), header_param());
                        $_SESSION['client_name']= $name;
                        $_SESSION['email']= $email;
                        $_SESSION['first_login']= true;//to confirm if the previous user should continue current session
                        setcookie('client_name', $name, time()+60*60*24*365, "/");
                        setcookie('guestEmail', $email, time()+60*60*24*365, "/");
                        header("Location: index.php");
                    }catch(Exception $e){
                        error_log("Database(Guest) error  ::::". $e->getMessage());
                        header("Location: index.php");
                        return;
                    }
                }
            }catch(Exception $e){
                error_log("Database(Guest) error  ::::". $e->getMessage());
                header("Location: index.php");
                return;
            }
        }
    }else{
        $_SESSION['status']= "<div class='bg-danger text-center'><strong>Something went wrong.</strong></div>";
        header("Location: index.php");
        return;
    }
}else{
    $_SESSION['status']= "<div class='bg-danger text-center'><strong>Access Denied.</strong></div>";
    header("Location: index.php");
    return;
}

?>