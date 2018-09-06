<!DOCTYPE html>
<html>
    <head>
        <title>
            MCF: Technical Events
        </title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
            <!-- Bootstrap -->
        <link href='css/font.css' rel='stylesheet'>

        <link href="css/bootstrap.min.css" rel="stylesheet">            
        <link href="css/animate.css" rel="stylesheet">           
        <link href="mycss.css" rel="stylesheet">
        <link href="css/carousel.css" rel="stylesheet">
        <script src="js/jquery-3.1.1.js"></script>
        <script src="scrollAnimation.js"></script>
        
        <script>
        $(function(){
            $("#navbar").load("navbar.php");   
            
            
        });
        
        </script>
    </head>
    
    <body>
        
        <div id="navbar"></div>
       
        <!-- Carousel
    ================================================== -->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img class="first-slide" src="css/images/carousel_technical_mech2.jpg" alt="First slide">
              <div class="container">
                <div class="carousel-caption">
                  <h1>Build your way</h1>
                  <p>Time to draw your blueprints and execute your idea</p>
                </div>
              </div>
            </div>
            <div class="item">
              <img class="second-slide" src="css/images/carousel_technical_code.jpg">
              <div class="container">
                <div class="carousel-caption">
                  <h1>/*Programming Error 404 */</h1>
                  <p>Programmers get ready for the ultimate coding battle</p>
                  </div>
              </div>
            </div>
            <div class="item">
              <img class="third-slide" src="css/images/carousel_technical_electric.jpg">
              <div class="container">
                <div class="carousel-caption">
                  <h1>Spark-Plug</h1>
                  <p>Let sparks fly out and lighten your dream</p>
                </div>
              </div>
            </div>
          </div>
          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div><!-- /.carousel -->
       
        
        <div class="container " id="events-container">
            <div class="row">
                <div class="col-md-12 header-title hidden slideInUp">
                    <h1>Events</h1>
                
                </div>
            
            </div>
           <div class="row">
           <?php
                
               session_start();
                require 'connection.php';
                $conn=Connect();
               
                $sql = "SELECT event_id,event_name FROM event WHERE event_category='technical' ";

                $result = mysqli_query($conn,$sql);  
                $tempcount = 0;
                    
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    
                    while($row = mysqli_fetch_assoc($result)) {
                      
                        echo '<div class="col-sm-6 col-md-4  col-lg-4 box hidden ';
                        switch($tempcount%3){
                            case 0:
                                echo ' slideInLeft"><div class="card event-card" id=" ';
                                break;
                            case 1:
                                echo ' fadeIn"><div class="card event-card" id=" ';
                                break;
                            case 2:
                                echo ' slideInRight"><div class="card event-card" id=" ';
                                break;
                                    
                        }
                        $tempcount= $tempcount +1;
                        echo $row['event_id'];
                        echo    '" style= "background-image: url(css/images/box-technical.jpg);border-color: deepskyblue;"> <div class="card-block event-card-block">
                                      <h3 class="card-title"> ';
                        echo $row['event_name'];
                        echo '</h3>
                                     </div>
                                  </div>
                                </div>';
                    }  
                } else {
                    echo "0 results";
                }
                
            ?>  

          </div>
            
        </div>
                <!-- The Modal -->
        <div id="myModal" class="event-modal">

          <!-- Modal content -->
          <div class="event-modal-content">
            <span class="close">&times;</span>
            <div class="event-modal-content-details">

                
            
              </div>
                            <div  class='row map-row '>
                  
                    <div style="margin-left:5px;">
                        <h2>Venue : </h2>
                    </div>
             
              </div>
              <div  class='row'>
                  <div class="col-md-12" id="register-section">
                  
                  </div>
                                        
              </div>

            
          </div>

        </div>
        <script>
              function initMap() {
                var uluru = {lat: -25.363, lng: 131.044};
                var map = new google.maps.Map(document.getElementById('map'), {
                  zoom: 2,
                  center: uluru
                    
                    
                });
                var marker = new google.maps.Marker({
                  position: uluru,
                  map: map
                    
                });
                google.maps.event.trigger(map, 'resize');
              }
                $(window).resize(function() {
                    initMap();
                });
            
        </script>
            
        
        <script async defer
    src="https://maps.googleapis.com/maps/api/js?key= AIzaSyAeVLgrOAfgCmingoMa_TTFVNn-_aUuMOU &callback=initMap">
    </script>

             

        <script>
          
            $(".event-card").hover(function(){ 
               $(this).toggleClass("animated");
                $(this).toggleClass("pulse"); 
            });
        
                // Get the modal
            
        
            $('.event-card').click(function(){
               

                 window.id = this.id;
                 $.ajax({
                        url: 'fillModal.php',
                        type: 'post',
                        dataType : 'json',
                        cache : false,
                        data: { event_id: id },
                        success: function(response) { 
                            $(".event-modal-content-details").empty();
                            $(".map-row").empty();

                            $(".event-modal-content-details").html("  <div class='row'> "
                                                                        +"<div class='col-sm-12 col-xs-12 col-md-12'> "                   
                                                                         +       "<h2>"+response[0]+"</h2>"
                                                                                + "<p>"+response[1]+"</p>"
                                                                                + "<p> Date : "+response[2]+"</p>"
                                                                            +"</div>"
                                                                           
                                                                            +"     </div>"
                                                                          +"  </div>");
                            $(".map-row").append("<div style='margin-left:5px;'><h2>Venue : </h2></div");

                            $(".map-row").append(response[3]);

                            $("#myModal").addClass("animated slideInDown");
                            $("#myModal").css("display","block");

                     
                           
                            }
                        });

                    
                                  
                        $("#register-section").empty();

                                  
                    $.ajax({
                        url: 'isAlreadyRegistered.php',
                        type: 'GET',
                        success: function(response) {
                                
                            if(response==-1)
                                $("#register-section").append(" </div><div id='buttonHere'> Log In to Register! </div>");        
                            else if(response==0)
                                $("#register-section").append(" </div><div id='buttonHere'> <button type=button class='btn btn-primary' onclick='register()' > Register Now! </button> </div>");    
                            else if(response==1)
                                $("#register-section").append(" </div><div id='buttonHere'> Already Registered! </div>");        

                            }
                    });
                    initMap();
            });

            
                
            function register(){
             
                console.log("clicked");
                $.ajax({
                    url: 'registerForEvent.php',
                    type: 'post',
                    success : function(response){
                        if(response){
                            $("#buttonHere").empty();
                            $("#buttonHere").html("Successfully Registered!");
                            
                        }
                        else
                            alert("Error!");
                        
                    }
                 
                });
                
                console.log("outside");
                
                    
            }
        
            $(".close").click(function(){
                
                    $("#myModal").css("display","none"); 
                     
            });
            
           
        </script>

    </body>

</html>