<?php
require('header.php');

$data= query("SELECT * FROM Project");
$cont= ($data->num_rows) > 0 ? true : false; //check the number of work upload, 0 means no work
?>



<?php
// View start here...........

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
  //Rows for display (4 col each * 3 images)
 echo ' <div class="row fs-4 bg-dark" style="padding:0.1em;">'; //Begining row <div>here
 $i=0;
 while($t = $data->fetch_assoc()){
  echo <<<_END
      <div class="col-sm-4 mb-1">
         <div class="card">
            <img src="images/MyWork/$t[img]" class="card-image-top" />
           <div class="card-body">
              <h1 class="card-title">$t[project_name]</h1><br />
              <p class="card-text">
              $t[description]
              </p>
            </div>
          </div> 
      </div>
  _END;
  $i += 1;
  if($i==3){ 
      //Additional row <div>
      echo "</div>";
      echo ' <div class="row fs-4 bg-dark" style="padding:0.1em;">';
      $i=0;
      }
  }
echo "</div>"; //ending row <div>
}
?>


<?php
require('footer.php');
?>
