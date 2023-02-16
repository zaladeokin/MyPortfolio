var notf= document.getElementById('auth');
//notf.style.animation= "open 3s linear";
notf.style.top= "25vh";

document.getElementById('close').addEventListener("click", function(event){
    //notf.style.animation= "close 3s linear";
    notf.style.transitionDelay= "0s";
    notf.style.top= "-50vh";
});
