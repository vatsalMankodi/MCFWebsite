<!DOCTYPE html>
<html> 
<head>
     <title>
         Sign-In
     </title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
            <!-- Bootstrap -->
                <link href='css/font.css' rel='stylesheet'>

        <link href="css/bootstrap.min.css" rel="stylesheet">            
        <link href="mycss.css" rel="stylesheet">
        <link  href="css/signin.css" rel="stylesheet">
        
        <script src="js/jquery-3.1.1.js"></script>
        
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
        <div class="jumbotron" style="background-image: url('css/images/login-jumbo_2.jpg')">
			

		

                    <div class="panel-body">
                        <form method="POST" action="changepass.php" role="form">
                            <div class="form-group">
                                <h2>Change Password</h2>
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="loginEmail">Email</label>
                                <input id="loginEmail" type="email" maxlength="50" class="form-control" name="u_email">
                            </div>

                            <div class="form-group">
                                <label class="control-label" for="loginPassword">Old Password</label>
                                <input id="loginPassword" type="password" maxlength="25" class="form-control" placeholder="at least 6 characters" length="40" name="u_password">
                            </div>
							
							<div class="form-group">
                                <label class="control-label" for="loginPassword">New Password</label>
                                <input id="loginPassword" type="password" maxlength="25" class="form-control" placeholder="at least 6 characters" length="40" name="u_newpassword">
                            </div>
							
                            <div class="form-group">
                                <button id="loginSubmit" type="submit" class="btn btn-info btn-block">Change</button>
                            </div>

                        </form>
        </div>
    </div>
</body>
</html>