<?php
session_start();
require_once('cookie.php');
require_once('publicPDO.php');
require_once("C:/xampp/htdocs/Zlib/zlib.php");
//require_once("http://webnesis.byehost7.com/Zlib/zlib.php");
$valid= true;
if( isset($_POST['email']) && isset($_POST['message']) ){
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

  if( $message =="" || $message =="Type your message here." ){//ensure message is typed
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
      $_SESSION['status'] = "<div class='container-fluid bg-success text-center text-break p-5 fs-4'><strong>Hello &nbsp;".htmlentities($email)."</strong><br> <p>Your message has been recieved, we will get back to you shortly.</p></div>";
      unset($_SESSION['message']);
      //setcookie('guestEmail', $_SESSION['email'], time()+60*60*24*365, "webnesis.22web.org");
      //setcookie('guest_Browser', $_SERVER['HTTP_USER_AGENT'], time()+60*60*24*365, "webnesis.22web.org");
      setcookie('guestEmail', $_SESSION['email'], time()+60*60*24*365, "localhost/MyPortfolio");
      setcookie('guest_Browser', $_SERVER['HTTP_USER_AGENT'], time()+60*60*24*365, "localhost/MyPortfolio");
    }catch(Exception $e){
        error_log("Database(Guest- $email) error  ::::". $e->getMessage());
        $_SESSION['status'] = "<div class='bg-danger text-center'><strong>An error occured, Try again.</strong></div>";
      }
    
  }
  header("Location: contact.php");
  return;
}

/*
  In the upgrading of this app work on having a separate table in Database for email and use Foreign Key on Message table.
*/
?>

<?php
// View start here.................
require_once('header.php');

//Flash POST status message
flashMessage('status');

//Check if email was previously submitted or existed in current session.
$email= repopulate('email',"", false);
//Check if message sent not successfull in previous request.
$message= repopulate('message',"Type your message here.");
?>
<br>
<div class="row fs-4" style="padding:1em;">
    <div class="col-sm-7 fs-4">
        <h1 class="text-center">Contact Me</h1><br />
        <p> Send me a message for feedback, enquiries, project deal,e.t.c. </p>
        <form method="post" action="contact.php" role="form">
      <div class="form-group">
        <label for="email">Your Email:</label>
        <input type="email" name= "email" value="<?= $email ?>" class="form-control">
      </div>  
      <div class="form-group">
        <label for="message">Message:</label>
        <textarea rows="10" name="message" class="form-control"><?= $message ?></textarea>
      </div> <br />
      <button type="submit" class="btn btn-primary btn-lg float-end">Send Message</button>
      </form> <br />
    </div>
    <div class="col-sm-5 text-center">
        <div>
          <strong> Other Platforms:</strong><br />
          <a href="mailto: zaladeokin@gmail.com"><i class="fa-regular fa-envelope fa-4x" id="gmIco"></i></a>
          <a href="https://github.com/zaladeokin"><i class="fa-brands fa-github fa-4x" id="ghIco"></i></a>
          <a href="https://www.linkedin.com/in/zacchaeus-aladeokin-7b334a22a"><i class="fa-brands fa-linkedin fa-4x" id="liIco"></i></a>
          <a href="https://api.whatsapp.com/send?phone=2348135994222"><i class="fa-brands fa-whatsapp fa-4x" id="waIco"></i></a><br /><br />
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