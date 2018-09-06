<!DOCTYPE html>
<html lang="en">
    
    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/jquery-3.1.1.js"></script>
        <link href="navbar.css" rel="stylesheet">
        <link href="jumbotorn.css" rel="stylesheet">
        <link href="mycss.css" rel="stylesheet">
    </head>
    <body>        
        <div class="container" id="navbar">
            <nav class="navbar navbar-default navbar-fixed-top">

                <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand active" href="home.html">
                            <img src="logo.png"  alt="Our Logo"  height="25px">
                            <span class="sr-only">(current)</span>
                        </a>
                    </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    
                        <ul class="nav navbar-nav navbar-left">
                            <li><a href="cultural.php">Cultural</a></li>
                            <li><a href="sports.php">Sports</a></li>
                            <li><a href="technical.php">Technical</a></li>
							<li><a href="collegepts.php">College Points</a></li>
                        </ul>
						<?php
                        
						          session_start();
                            
							     if((isset($_SESSION["loggedin"])))  {
                                        if($_SESSION["loggedin"]==true){
                                                                                         
                                            echo "<ul class='nav navbar-nav navbar-right'>
                                            <li><a href='myevents.php'>My Events</a></li>                                            
                                            <li><a href=#>Welcome ".$_SESSION["u_name"]."</a></li>
                                            <li><a href='signup/signOut.php'>Sign Out</a></li>
											<li><a href='pwdchange.php'>Change Password</a></li>
                                            </ul>";        
                                        }
                                     else{
                                         
                                            echo  "<ul class='nav navbar-nav navbar-right'>
                                                <li><a href='SignIn.php' >Register </a></li>
                                                <li><a href='login.php' >Sign In </a></li>
												<li><a href='pwdchange.php'>Change Password</a></li>
                                            </ul>";
                                         
                                     }
                                }else{
                                     
                                            echo  "<ul class='nav navbar-nav navbar-right'>
                                                <li><a href='SignIn.php' >Register </a></li>
                                                <li><a href='login.php' >Sign In </a></li>
												<li><a href='pwdchange.php'>Change Password</a></li>
                                            </ul>";
                                    
                                }

								
								
						
				?>
                        </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
        
      
    <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
  
    </body>
</html>