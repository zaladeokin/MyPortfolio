var notf= document.getElementById('auth');
//show signin link
notf.style.top= "25vh";

document.getElementById('close').addEventListener("click", function(event){
    //hide signin link
    notf.style.transitionDelay= "0s";
    notf.style.top= "-50vh";
});

document.getElementById('hide').addEventListener("click", function(event){
    //Hide logout link
    document.getElementById('logout').style.display= "none";
});

