<?php
session_start();
require('publicPDO.php');

//Load certificate from Database
try{
  $data= $pdo->query("SELECT * FROM Certificate");
  $cont= ($data->rowCount()) > 0 ? true : false; //check the number of work upload, 0 means no work
}catch(Exception $e){
  error_log("Database(Guest) error  ::::". $e->getMessage());
  $cont= false;
}
?>

<?php
//View start here...............................
require_once('header.php');
if(!$cont){
  //******** Alternate content to generate if there's no Certificate**********************
    echo <<<_END
      <div class="row fs-4" style="padding:1em;">
        <div class="col-sm">
          <div class="alert alert-info">
            <h1> Certification.</h1><br />
            <p> Sorry, Certification  not available.<br /> 
          Check back later.</p>
          </div> 
        </div>
      </div>
    _END;
  }else{
    echo <<<_END
        <div class="row fs-4" style="padding:1em;">
          <div class="col-sm-12">
            <h1> Certification.</h1><br />
            <p> The following certify the skills acquired that I used as my development tools, You can verify them through the link that was provided underneath.</p>
          </div>
        </div>
      _END;
  // Loop through certificate list here...
  //Rows for display (4 col each * 3 images)-->
  echo '<div class="row fs-4 bg-dark" style="padding:0.1em;">'; //Begining row <div> here
  $i=0;
  while($t = $data->fetch(PDO::FETCH_ASSOC)){
    echo <<<_END
      <div class="col-sm-4 mb-1">
        <div class="card">
          <img src="images/certificate/$t[img]" class="card-image-top" />
          <div class="card-body">
            <div class="card-title">$t[title]</div>
    _END;
    if($t['verification'] != ""){//since verification link is optional, Check if it is provided....
            echo <<<_END
              <div class="card-text"><a href="$t[verification]"><button class="btn btn-info">Verification Link</button></a></div>
              _END;
            }
    echo <<<_END
          </div>
         </div> 
      </div>
    _END;
    $i += 1;
    if($i==3){ 
        //Additional row <div>
        echo "</div>";
        echo '<div class="row fs-4 bg-dark" style="padding:0.1em;">';
        $i=0;
        }
    }
echo "</div>"; //Ending row <div> here
  }
?>



<?php
require('footer.php');
?>
