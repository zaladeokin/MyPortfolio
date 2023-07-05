<?php
include("email_temp.php");
function autoResponse($reader= ""){/*To generate auto reply when someone post on contact form. */
    $head= header_tmp();
    $foot= footer_tmp();
    return  <<<_msg
                $head
                <strong>Hello $reader,</strong><br>
                <p>Your mail was well recieved and will be duly process.</p>
                <p>Thanks for contacting me, if necessary I'll give response as soon as possible. I look forward to serve you better.</p><br>
                Best Regard,<br><br>
                <img id="photo" src="http://zack.com.ng/images/myPhoto.jpg" /><br>
                Zacchaeus A. S.<br>
                (Web Developer)
                $foot
            _msg;
}

function customMessage($content){/* To generate template for contents of any type of message. */
    $head= header_tmp();
    $foot= footer_tmp();
    return  <<<_msg
                $head
                $content
                $foot
            _msg;
}

function header_param(){
$headers = "From: Webnesis \r\n";
$headers .= "Reply-To: webdev@zack.com.ng\r\n";
//$headers .= "CC: "._ADMIN_EMAIL_."\r\n";//a copy is sent here also
//$headers .= "BCC: "._ADMIN_EMAIL_."\r\n";//email copy is sent here too but can't see the bcc field
$headers .= "Content-Type: text/html; charset=ISO-8859-1 \r\n"; 
$headers .= "MIME-Version: 1.0 \r\n";

return $headers;}


function send_mail($to, $sub, $mes, $head){
    mail($to, $sub, $mes, $head);
}

?>