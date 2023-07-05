<?php
require_once('cookie.php');
require_once('publicPDO.php');
include("email.php"); 

function admin_mail($sender, $mes){//Develop content of mail to be sent to admin.
    $into= <<<_int
        <strong>Hello Zack,</strong><br>
        You have a message from $sender, the details is as follows:<br><br>
        _int;
    $mes= $into.$mes;
    return $body= customMessage($mes);
}

$valid= true;

//Get reCaptcha response
$token= isset($_POST['v-token']) ? $_POST['v-token'] : false;
$score=0;
//verify reCaptcha response
if($token != false){
    $reCaptcha= reCaptchaVerify(_V3_SECRET_KEY_, $token);
    $reCapVal= $reCaptcha->success;
    if($reCapVal){
        $score= $reCaptcha->score;
    }
}

if( isset($_SESSION['notBot']) && $_SESSION['notBot'] === true ){//reCaptcha v2 verification success check as alternate
    $_POST['email']= repopulate('email');
    $_POST['message']= repopulate('message');
    $score=0.9;
    unset($_SESSION['notBot']);
}

if( isset($_POST['email']) && isset($_POST['message']) /*&& $score > 0.8*/ ){
  $_SESSION['status']="";
  $email= $_SESSION['email']= $_POST['email'];
  $message= $_SESSION['message']= $_POST['message'];

  if($email =="" ){ //ensure email is filled
    $valid= false;
    $_SESSION['status'] .= "<div class='bg-danger text-center'><strong>Email field is required.</strong></div>";
  } else if(!(preg_match("[@]", $email))){// Ensure email is valid
    $valid= false;
    $_SESSION['status'] .= "<div class='bg-danger text-center'><strong>Email must have an at-sign (@)</strong></div>";
  }

  if( $message ==""){//ensure message is typed
    $valid= false;
    $_SESSION['status'] .= "<div class='bg-danger text-center'><strong>Enter a valid message.</strong></div>";
  } 

  if( $valid ){//insert message and send email to client and admin
    try{
      $upload= $pdo->prepare("INSERT INTO Message(email, content) VALUES(:em, :msg)");
      $upload->execute(array(
        ':em'=> $email,
        ':msg'=>$message
      ));
      // use mail() function here to send instant email response to client and yourself.....
      $sub= "Zacchaeus @Webnesis";
      $to= isset($_SESSION['client_name']) ? $_SESSION['client_name'] : $email;
      //send_mail($email,$sub, autoResponse($to), header_param());
      //send_mail('webdev@zack.com.ng',"Mail from $to", admin_mail($to, $message), header_param());
      $_SESSION['status'] = "<div class='container-fluid bg-success text-center text-break p-5 fs-4'><strong>Hello &nbsp;".htmlentities($email)."</strong><br> <p>Your message has been recieved, we will get back to you shortly.</p></div>";
      unset($_SESSION['message']);
    }catch(Exception $e){
        error_log("Database(Guest- $email) error  ::::". $e->getMessage());
        $_SESSION['status'] = "<div class='bg-danger text-center'><strong>An error occured, Try again.</strong></div>";
      }
    
  }
  header("Location: contact.php");
  return;
}/*else if(isset($_POST) && $score == 0.8 ){
    $carry= serialize($_POST);
    setcookie('request', "$carry", time() + (60*5), "/");
    header("Location: botTest.php");
}else if($score != 0 && $score < 0.8){
    $_SESSION['status']="<div class='bg-danger text-center'><strong>Human verification failed.</strong></div>";
}*/

/*
  In the upgrading of this app work on having a separate table in Database for email and use Foreign Key on Message table.
*/
?>

<?php
// View start here.................
require_once('header.php');


//Check if email was previously submitted or existed in current session.
$email= repopulate('email',"", false);
//Check if message sent not successfull in previous request.
$message= repopulate('message');
?>
<br>
<div class="row fs-4" style="padding:1em;">
    <div class="col-sm-7 fs-4">
        <h1 class="text-center">Contact Me</h1><br />
        <p> Send me a message for feedback, enquiries, project deal,e.t.c. </p>
        <form method="post" action="contact.php" role="form">
            <input type="hidden" id="v-token" name="v-token">
            <div class="form-group">
                <label for="email">Your Email:</label>
                <input type="email" name="email" value="<?= $email ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea rows="10" name="message" class="form-control"
                    placeholder="Type your message here."><?= $message ?></textarea>
            </div> <br />
            <button type="submit" id="submit" class="btn btn-primary btn-lg float-end">Send Message
                <!--<i class="fa-sharp fa-solid fa-spinner" id="load"></i>-->
            </button>
        </form> <br />
    </div>
    <div class="col-sm-5 text-center">
        <div>
            <strong> Other Platforms:</strong><br />
            <a href="mailto: zaladeokin@gmail.com"><i class="fa-regular fa-envelope fa-4x" id="gmIco"></i></a>
            <a href="https://github.com/zaladeokin"><i class="fa-brands fa-github fa-4x" id="ghIco"></i></a>
            <a href="https://www.linkedin.com/in/zacchaeus-aladeokin-7b334a22a"><i class="fa-brands fa-linkedin fa-4x"
                    id="liIco"></i></a>
            <a href="https://api.whatsapp.com/send?phone=2348135994222"><i class="fa-brands fa-whatsapp fa-4x"
                    id="waIco"></i></a><br /><br />
        </div>
        <div>
            <strong>My tools:</strong>
            <!-- Caurosel start here-->
            <?php
                      require_once("skillshow.php");
                   ?>
            <!-- Caurosel ends here -->
        </div>
    </div>
</div>



<?php
require_once('footer.php');
?>