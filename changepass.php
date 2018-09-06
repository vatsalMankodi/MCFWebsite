<html>
	<body>
		 <?php
	
			require 'connection.php';
			$conn=Connect();
			$email=$conn->real_escape_string($_POST['u_email']);
			$password=$conn->real_escape_string(($_POST['u_password']));
			$newpassword=$conn->real_escape_string(($_POST['u_newpassword']));
	
			$temppwd=$password;
			$password= md5($password);
			$find="SELECT * FROM users WHERE u_email='".$email."' AND u_password='".$password."'";
			$result = mysqli_query($conn,$find);
		
			if($email=='' || $temppwd=='' || $newpassword==''){
				echo "<script type='text/javascript'> 
							alert('Field cannot be empty');
							window.location.href = 'pwdchange.php';
					  </script>";
			}
			
			else if(mysqli_num_rows($result)==0){
				echo "<script type='text/javascript'> 
						alert('Password and email dont match');
						window.location.href = 'pwdchange.php';
				  	  </script>";
			}
		
			else if(strlen($newpassword)<6){
				echo "<script type='text/javascript'> 
							alert('Password length should be greater than 6');
							window.location.href = 'pwdchange.php';
					  </script>"; 	
			}

			else if( !preg_match("#[0-9]+#", $newpassword) ) {
				echo "<script type='text/javascript'> 
							alert('Password should have at least 1 number');
							window.location.href = 'pwdchange.php';
					  </script>";
			}

			else if( !preg_match("#[a-z]+#", $newpassword) ) {
				echo "<script type='text/javascript'> 
							alert('Password should have at least 1 lowercase');
							window.location.href = 'pwdchange.php';
					  </script>";
			}

			else if( !preg_match("#[A-Z]+#", $newpassword) ) {
				echo "<script type='text/javascript'> 
							alert('Password should have at least 1 CAPS!');
							window.location.href = 'pwdchange.php';
					  </script>";
			}

			else if( !preg_match("#\W+#", $newpassword) ) {
				echo "<script type='text/javascript'> 
							alert('Password should have at least 1 symbol');
							window.location.href = 'pwdchange.php';
					  </script>";
			}
		
			else if($temppwd==$newpassword){
				echo "<script type='text/javascript'> 
							alert('Please enter a NEW password!!');
							window.location.href = 'pwdchange.php';
					  </script>";
			}
		
			else{
				$newpassword= md5($newpassword);
				
				
				
				
					$query="UPDATE users SET u_password='".$newpassword."' WHERE u_email='".$email."'";
					$success=$conn->query($query);
					if(!$success){
						die("Couldn't establish connection: ".$conn->error);
					}

					echo "<script type='text/javascript'> 
							alert('Successfully changed password!!');
							window.location.href = 'login.php';
						  </script>";
					$conn->close();
				
				
			}
			?>

	</body>
</html>