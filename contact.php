<?php
require('header.php');
$status="";

if( isset($_POST['email']) && $_POST['email'] =="" ){$status = "<div class='bg-danger text-center'><strong>Email field is required.</strong></div>";} //ensure email is filled
if( isset($_POST['message']) && ($_POST['message'] =="" || $_POST['message']=="Type your message here.") ){$status .= "<div class='bg-danger text-center'><strong>Enter a valid message.</strong></div>";} //ensure message is typed
if( isset($_POST['email']) && isset($_POST['message']) && $_POST['email'] !="" && ($_POST['message'] !="" && $_POST['message']!= "Type your message here.")){
  //insert message and send email to client and admin
  $email= filter_var($_POST['email'], FILTER_SANITIZE_STRING);
  $message= filter_var($_POST['message'], FILTER_SANITIZE_STRING);
  query("INSERT INTO Message(email, content) VALUES('$email', '$message')");
  // use mail() function here to send instant email response to client and yourself.....
        $status= "<div class='container-fluid bg-success text-center text-break p-5 fs-4'><strong>Hello &nbsp;".htmlentities($email)."</strong><br> <p>Your message has been recieved, we will get back to you shortly.</p></div>";
}

/*
  In the upgrading of this app work on having a separate table in Database for email and use Foreign Key on Message table.
*/
?>

<?php
// View start here.................
?>
    <?= $status; ?></strong></div><br />
<div class="row fs-4" style="padding:1em;">
    <div class="col-sm-7 fs-4">
        <h1 class="text-center">Contact Me</h1><br />
        <p> Send me a message for feedback, enquiries, project deal,e.t.c. </p>
        <form method="post" action="contact.php" role="form">
      <div class="form-group">
        <label for="email">Your Email:</label>
        <input type="email" name= "email" class="form-control">
      </div>  
      <div class="form-group">
        <label for="message">Message:</label>
        <textarea rows="10" name="message" class="form-control">Type your message here.</textarea>
      </div> <br />
      <button type="submit" class="btn btn-primary btn-lg float-end">Send Message</button>
      </form> <br />
    </div>
    <div class="col-sm-5 text-center">
        <div>
            <strong> Other Platforms:</strong><br />
            Gmail: zaladeokin@gmail.com<br />
            Github: github.com/zaladeokin <br />
            Linkedin: <br />
            Whatsapp: +2348135994222<br />
            <?php // In live production, comment the above and uncomment the bellow ?>
            <!--
            <a href="mailto: zaladeokin@gmail.com"><i class="fa-regular fa-envelope fa-4x" id="gmIco"></i></a>
             <a href="https://github.com/zaladeokin"><i class="fa-brands fa-github fa-4x" id="ghIco"></i></a>
              <a href="https://www.linkedin.com/in/zacchaeus-aladeokin-7b334a22a"><i class="fa-brands fa-linkedin fa-4x" id="liIco"></i></a>
              <a href="https://api.whatsapp.com/send?phone=2348135994222"><i class="fa-brands fa-whatsapp fa-4x" id="waIco"></i></a><br /><br />
            -->
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
require('footer.php');
?>