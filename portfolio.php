<?php
require('header.php');
?>

  <!--  ******** Alternate contentent to generate if no project work is uploaded**********************

    <div class="row fs-4" style="padding:1em;">
      <div class="col-sm-9">
        <div class="alert alert-info">
          <h1> Portfolio.</h1><br />
          <p> Sorry, Portfolio not ready, Works are yet to be uploaded.<br /> 
          Check back later.</p>
        </div> 
    </div>
  </div>

  -->
  <div class="row fs-4" style="padding:1em;">
    <div class="col-sm-12">
      <h1> Portfolio.</h1><br />
      <p> Some of my completed project are shown below for you to glance through, Feel free to contact me for comment or feedback if there's any.</p>
      <p> I hope you'll enjoy the adventure....</p>
    </div>
  </div>
  <!-- PHP will loop through project work here...-->
<!-- 
  Use PHP & MySQL to control the length of card-title and card-text
-->
  <!-- first row (4 col each * 3 images)-->
  <div class="row fs-4 bg-dark" style="padding:1em;">
    <div class="col-sm-4 mb-2">
       <div class="card">
        <img src="images\MyWork\MyPort.png" class="card-image-top" />
        <div class="card-body">
          <h1 class="card-title">A Developer Portfolio</h1><br />
          <p class="card-text">
            A web application that shows the project done by a developer with additional pages that provide information about the developer, his certification and how to contact him. A PHP web application using Bootstrap for front-end.
          </p>
        </div>
       </div> 
    </div>
    <div class="col-sm-4 mb-2">
      <div class="card">
        <img src="images\MyWork\MyPort1.png" class="card-image-top" />
        <div class="card-body">
          <h1 class="card-title">A Developer Portfolio</h1><br />
          <p class="card-text">
            A web application that shows the project done by a developer with additional pages that provide information about the developer, his certification and how to contact him. A PHP web application using Bootstrap for front-end.
          </p>
        </div>
       </div> 
    </div>
    <div class="col-sm-4 mb-2">
      <div class="card">
        <img src="images\MyWork\MyPort2.png" class="card-image-top" />
        <div class="card-body">
          <h1 class="card-title">A Developer Portfolio</h1><br />
          <p class="card-text">
            A web application that shows the project done by a developer with additional pages that provide information about the developer, his certification and how to contact him. A PHP web application using Bootstrap for front-end.
          </p>
        </div>
       </div> 
    </div>
</div>

<!-- second row (4 col each * 3 images)-->
<div class="row fs-4 bg-dark" style="padding:1em;">
  <div class="col-sm-4 mb-2">
     <div class="card">
      <img src="images\MyWork\MyPort.png" class="card-image-top" />
      <div class="card-body">
        <h1 class="card-title">A Developer Portfolio</h1><br />
        <p class="card-text">
          A web application that shows the project done by a developer with additional pages that provide information about the developer, his certification and how to contact him. A PHP web application using Bootstrap for front-end.
        </p>
      </div>
     </div> 
  </div>
  <div class="col-sm-4 mb-2">
    <div class="card">
      <img src="images\MyWork\MyPort1.png" class="card-image-top" />
      <div class="card-body">
        <h1 class="card-title">A Developer Portfolio</h1><br />
        <p class="card-text">
          A web application that shows the project done by a developer with additional pages that provide information about the developer, his certification and how to contact him. A PHP web application using Bootstrap for front-end.
        </p>
      </div>
     </div> 
  </div>
  <div class="col-sm-4 mb-2">
    <div class="card">
      <img src="images\MyWork\MyPort2.png" class="card-image-top" />
      <div class="card-body">
        <h1 class="card-title">A Developer Portfolio</h1><br />
        <p class="card-text">
          A web application that shows the project done by a developer with additional pages that provide information about the developer, his certification and how to contact him. A PHP web application using Bootstrap for front-end.
        </p>
      </div>
     </div> 
  </div>
</div>
<!-- Project  display end here-->

<?php
require('footer.php');
?>
