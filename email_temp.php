<?php
function header_tmp(){
return  <<<_header
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Webnesis</title>
        <meta name="keywords" content="website, webpage, development, developer,webnesis, developer" />
        <meta name="author" content="Zacchaeus Aladeokin" />
        <meta name="description" content="Webnesis mail service" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
    #header{
        width:100%;
        height: 3em;
        margin-bottom: 0.5em;
        padding:0%;
        background-color: #1A62D1;
    }
    main{
        width: 80%;
        margin: 0 auto;
    }
    aside{
        margin: 3em 0;
        border-top: 1px inset #1A62D1;
    }
    strong{
        margin-right: 2em;
    }
    .hLogo{
        height:3em;
        float:left;
        margin:0%;
    }
    #sHeading{
        width:85%;
        padding: 0.9%;
        margin:0%;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-size: 2em;
        font-weight: bolder;
        font-style:oblique;
    color: #FFFFFF;
    }
    #photo{
        width:5em;
        height:5em;
        margin:0.5em;
        border-radius: 5rem;
    }
    #footer{
        width:100%;
        height: 3em;
        padding:0%;
        background-color: #1A62D1;
        text-align: center;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-size: 1em;
        font-weight: bolder;
        font-style:oblique;
        color: #FFFFFF;
    }
    footer img{
        position:relative;
        top:0.5em;
        height:1.5em;
    }
</style>
</head>
<body>
<header id="header">
          <a class="navbar-brand" href="http://zack.com.ng">
            <img class="hLogo" src="http://zack.com.ng/images/logo.png" /><span id="sHeading">WEBNESIS</span>
          </a>
</header>
<main>
_header;
    }



function footer_tmp(){
return  <<<_footer
            <aside>
            <strong>Mailing address</strong><a href="mailto: webdev@zack.com.ng">webdev@zack.com.ng</i></a><br>
            <strong>Github</strong><a href="https://github.com/zaladeokin">https://github.com/zaladeokin</a><br>
            <strong>Linkedl</strong><a href="https://www.linkedin.com/in/zacchaeus-aladeokin-7b334a22a">https://www.linkedin.com/in/zacchaeus-aladeokin-7b334a22a</a><br>
            <strong>Whatsapp</strong><a href="https://api.whatsapp.com/send?phone=2348135994222">+(234) 8135994222</a>
            </aside>
            </main>
            <footer id="footer">
            &copy; 2023 WEBNESIS  <img src="http://zack.com.ng/images/icon.png" />
            </div>
        </div>
        </div>
        </footer>
        </body>
        </html>
 _footer;}
?>