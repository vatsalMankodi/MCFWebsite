 var canvas = document.getElementById("particles-js"),
            ctx = canvas.getContext("2d");
 Image background = new Image();
 background.src = particle_background.png

 background.onload = function(){

 	ctx.drawImage(background,0,0);
 }