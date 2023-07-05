<footer id="footer">
    <div class="row">
        <div clas="col-12">
            <div>
                &copy; <?= date("Y", time()); ?> WEBNESIS <img src="\MyPortfolio\images\icon.png" />
            </div>
        </div>
    </div>
</footer>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script> -->
<script src="http://localhost/MyPortfolio/js/bootstrap.bundle.min.js"></script>

<?php if($index){ ?>

<!--<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
    async defer></script>-->
<script type="text/javascript">
/* var Submit= false;//to make reCaptcha required.

    var Verify= function(response){
        if(response == grecaptcha.getResponse()){
            Submit= true;
        }
    }

  var onloadCallback = function() {
    grecaptcha.render('test', {
        'sitekey': '<?= _V2_SITE_KEY_?>',
        'callback': Verify,
    });
  }
  document.getElementById('bot').addEventListener("submit", function(event){//Make reCaptcha required
    if(Submit){
        document.getElementsByTagName('iframe')[0].removeAttribute("style");
    }else{
        event.preventDefault();
        document.getElementsByTagName('iframe')[0].style.border= "1px solid red";
    }
  });*/
</script>

<?php } ?>

</body>

</html>