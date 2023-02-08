<?php
session_start();
require_once('cookie.php');
require_once('publicPDO.php');

//Load certificate from Database
try{
  $data= $pdo->query("SELECT * FROM Certificate ORDER BY certificate_id DESC");
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
  echo '<div class="row fs-4" style="padding:0.1em;">'; //Begining row <div> here
  $i=1; //Ensure the last item  occupied remaining space
  while($t = $data->fetch(PDO::FETCH_ASSOC)){
    $title= htmlentities($t['title']);
    $verification= htmlentities($t['verification']);
    $md= ($data->rowCount() % 2== 1) && ($i == 1) ? 'col-md-12' : 'col-md-6' ;//Ensure the last item  occupied remaining space
    if( ($data->rowCount() % 3== 1) && ($i == 1) ){$lg= 'col-lg-12';
    }else if( ($data->rowCount() % 3== 2) && ($i < 3) ){$lg= 'col-lg-6';
    }else{ $lg= 'col-lg-4'; }//Ensure the last item  occupied remaining space
    echo <<<_END
      <div class="col-sm-12 $md $lg mb-1">
        <div class="card">
          <img src="images/certificate/$t[img]" class="card-image-top" />
          <div class="card-body">
            <div class="card-title">$title</div>
    _END;
    if($verification != ""){//since verification link is optional, Check if it is provided....
            echo <<<_END
              <div class="card-text"><a href="$verification"><button class="btn btn-info">Verification Link</button></a></div>
              _END;
            }
    echo <<<_END
          </div>
         </div> 
      </div>
    _END;
    $i += 1;
    }
echo "</div>"; //Ending row <div> here
  }
?>



<?php
require_once('footer.php');
?>
