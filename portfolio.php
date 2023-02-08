<?php
session_start();
require_once('cookie.php');
require_once('publicPDO.php');

//Load project from Database
try{
  $data= $pdo->query("SELECT * FROM Project ORDER BY project_id DESC");
  $cont= ($data->rowCount()) > 0 ? true : false; //check the number of work upload, 0 means no work
}catch(Exception $e){
  error_log("Database(Guest) error  ::::". $e->getMessage());
  $cont= false;
}
?>



<?php
// View start here...........
require_once('header.php');
if(!$cont){
  //  ******** Alternate contentent to generate if no project work is uploaded**********************
echo <<<_END
      <div class="row fs-4" style="padding:1em;">
        <div class="col-sm">
          <div class="alert alert-info">
           <h1> Portfolio.</h1><br />
           <p> Sorry, Portfolio not ready, Works are yet to be uploaded.<br /> 
           Check back later.</p>
          </div> 
      </div>
   </div>
   _END;
}else{
echo <<<_END
    <div class="row fs-4" style="padding:1em;">
        <div class="col-sm-12">
          <h1> Portfolio.</h1><br />
          <p> Some of my completed project are shown below for you to glance through, Feel free to contact me for comment or feedback if there's any.</p>
          <p> I hope you'll enjoy the adventure....</p>
        </div>
      </div>
    _END;
  //Loop through project work here...
  //Control the length of card-title and card-text
 echo ' <div class="row fs-4" style="padding:0.1em;">'; //Begining row <div>here
 $i=1; //Ensure the last item  occupied remaining space
 while($t = $data->fetch(PDO::FETCH_ASSOC)){
    $name= htmlentities($t['project_name']);
    $description= htmlentities($t['description']);
    $md= ($data->rowCount() % 2== 1) && ($i == 1) ? 'col-md-12' : 'col-md-6' ;//Ensure the last item  occupied remaining space
    if( ($data->rowCount() % 3== 1) && ($i == 1) ){$lg= 'col-lg-12';
    }else if( ($data->rowCount() % 3== 2) && ($i < 3) ){$lg= 'col-lg-6';
    }else{ $lg= 'col-lg-4'; }//Ensure the last item  occupied remaining space
  echo <<<_END
      <div class="col-sm-12 $md $lg mb-1">
         <div class="card">
            <img src="images/MyWork/$t[img]" class="card-image-top" />
           <div class="card-body">
              <h1 class="card-title">$name</h1><br />
              <p class="card-text">
              $description
              </p>
            </div>
          </div> 
      </div>
  _END;
  $i += 1;
  }
echo "</div>"; //ending row <div>
}
?>


<?php
require_once('footer.php');
?>
