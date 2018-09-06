$(document).ready(function(){
    
   $(window).scroll(function(){
        
       var y = $(this).scrollTop();
       
       console.log(y);
    
       var boxPos = $(".event-card").position();
         
       var boxHeight = $(".event-card").height();
       
       var headingPos = $(".header-title").position();
         
       var headingHeight = $(".header-title").height();
       
       if(y >= (boxPos.top + boxHeight)){

           $(".header-title").removeClass("hidden");
           $(".header-title").addClass("animated");
       
           $(".box").removeClass("hidden");
           $(".box").addClass("animated");
       
       }else{
           $(".header-title").removeClass("animated");
           $(".box").removeClass("animated");
       }
   });
    
});