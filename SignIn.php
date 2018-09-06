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
           <div class="jumbotron" style="background-image: url('css/images/signup-jumbo.jpg')">
	<div class="row">
    		
				<div class="panel-body">
					<form method="POST" action="signup/signUpTY.php" role="form">
						<div class="form-group">
							<h2>Create account</h2>
						</div>
						<div class="form-group">
							<label class="control-label" for="signupName">Your name</label>
							<input id="signupName" type="text" maxlength="50" class="form-control" name="u_name">
						</div>
                        <div class="form-group">
							<label class="control-label" for="signupCollege">College Name</label>
							<input list="colleges" id="signuCollege" type="text" maxlength="50" class="form-control" name="u_college">
							  <?php 
									echo "<datalist id='colleges'>";
										require 'connection.php';
										$conn = Connect();
										
										$sql = "SELECT college_name FROM collegepoints";
										
										$result = mysqli_query($conn,$sql);
										if (mysqli_num_rows($result) > 0) {
											// output data of each row

											while($row = mysqli_fetch_assoc($result)) {

												echo "<option value='";
												echo $row['college_name'];
												echo "'>";
											}  
											} else {
												echo "0 results";
											}
								?>
						</div>
						<div class="form-group">
							<label class="control-label" for="signupEmail">Email</label>
							<input id="signupEmail" type="email" maxlength="50" class="form-control" name="u_email">
						</div>
						
						<div class="form-group">
							<label class="control-label" for="signupPassword">Password</label>
							<input id="signupPassword" type="password" maxlength="25" class="form-control" placeholder="at least 6 characters" length="40" name="u_password">
						</div>
						<div class="form-group">
							<label class="control-label" for="signupPasswordagain">Password again</label>
							<input id="signupPasswordagain" type="password" maxlength="25" class="form-control" name="u_passwordagain">
						</div>
						<div class="form-group">
							<button id="signupSubmit" type="submit" class="btn btn-info btn-block">Create your account</button>
						</div>
						<p class="form-group">By creating an account, you agree to our <a href="#">Terms of Use</a> and our <a href="#">Privacy Policy</a>.</p>
						<hr>
						<p>Already have an account? <a href="#">Sign in</a></p>
					</form>
			</div>
        </div>
    </div>
</body>
</html>