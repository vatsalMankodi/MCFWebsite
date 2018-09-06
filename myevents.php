<html>
	<head>
                <link href='css/font.css' rel='stylesheet'>

		<link href="css/bootstrap.min.css" rel="stylesheet"> 
		<link href="mycss.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">
        
		<script src="js/jquery-3.1.1.js"></script>
        <script src="scrollAnimation.js"></script>
         <script>

        $(function(){
            $("#navbar").load("navbar.php");        
            
        });

       
        </script>
	</head>
	<body>
		<section id="navbar_section">
            <div id="navbar" class="container"></div>        
        </section>
		<div class="jumbotron myevents-jumbo">
			
				<h1> Your Events </h1>
				<p> Mark the dates! </p>
		</div>

        
        <div class="container " id="events-container">
            <div class="row">
                <div class="col-md-12 header-title">
                    <h1>Cultural Events</h1>
                
                </div>
            
            </div>
           <div class="row">
           <?php
                
                session_start();
                require 'connection.php';
                $conn=Connect();
               
                $sql = "SELECT event_id,event_name,event_date FROM registers NATURAL JOIN event WHERE event_category='cultural' and u_id=".$_SESSION['u_id']." ORDER BY event_date";

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
                        echo    ' " > <div class="card-block event-card-block">
                                      <h3 class="card-title"> ';
                        echo $row['event_name'];
                        
                        echo '</h3> <p>';
                        echo $row['event_date'];
                        echo '</p>
                            </div>
                                  </div>
                                </div>';
                    }  
                } else {
                    echo "<h3 align='center'>You don't seem to have registered for any enents! Register now!</h3>";
                }
                
            ?>  
            </div>
            <div class="row">
                <div class="col-md-12 header-title slideInUp">
                    <h1>Sports Events</h1>
                
                </div>
            
            </div>
           <div class="row">
          <?php
                
                $conn=Connect();
               
                $conn=Connect();
               
                $sql = "SELECT event_id,event_name,event_date FROM registers NATURAL JOIN event WHERE event_category='sports' and u_id=".$_SESSION['u_id']." ORDER BY event_date";

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
                        echo    '" style= "background-image: url(css/images/box-sports_1.jpg); border-color: white;"> <div class="card-block event-card-block">
                                      <h3 class="card-title"> ';
                        echo $row['event_name'];
                        
                        echo '</h3> <p>';
                        echo $row['event_date'];
                        echo '</p>
                            </div>
                                  </div>
                                </div>';
                    }  
                } else {
                    echo "<h3 align='center'>You don't seem to have registered for any enents! Register now!</h3>";
                }
                
            ?>  

            </div>
            <div class="row">
                <div class="col-md-12 header-title slideInUp">
                    <h1>Technical Events</h1>
                
                </div>
            
            </div>
           <div class="row">
                      <?php
                
               $conn=Connect();
               
                $sql = "SELECT event_id,event_name,event_date FROM registers NATURAL JOIN event WHERE event_category='technical' and u_id=".$_SESSION['u_id']." ORDER BY event_date";

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
                        
                        echo '</h3> <p>';
                        echo $row['event_date'];
                        echo '</p>
                            </div>
                                  </div>
                                </div>';
                    }  
                } else {
                    echo "<h3 align='center'>You don't seem to have registered for any enents! Register now!</h3>";
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
              <div  class='row' id="register-section">
                                        <div id="map"></div>
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