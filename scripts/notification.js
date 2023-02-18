var notf= document.getElementById('auth');
//show signin link
if(notf){
notf.style.top= "25vh";

document.getElementById('close').addEventListener("click", function(event){
    //hide signin link
    notf.style.transitionDelay= "0s";
    notf.style.top= "-50vh";
});
}

var notf1= document.getElementById('hide');
if(notf1){
notf1.addEventListener("click", function(event){
    //Hide logout link
    document.getElementById('logout').style.display= "none";
});
}
