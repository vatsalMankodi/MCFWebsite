<html>
	  
<?php
    
require 'connection.php';
$conn=Connect();
$name=$conn->real_escape_string($_POST['u_name']);
$college=$conn->real_escape_string($_POST['u_college']);
$email=$conn->real_escape_string($_POST['u_email']);
$password=$conn->real_escape_string(($_POST['u_password']));
$passwordagain=$conn->real_escape_string(md5($_POST['u_passwordagain']));


if($name=='' || $college=='' || $email=='' || $password=='' || $passwordagain==''){
	echo "<script type='text/javascript'> 
				alert('Field cannot be empty');
				window.location.href = '../SignIn.php';
		  </script>";
}

else if(strlen($password)<6){
	echo "<script type='text/javascript'> 
				alert('Password length should be greater than 6');
				window.location.href = '../SignIn.php';
		  </script>"; 	
}
 
else if( !preg_match("#[0-9]+#", $password) ) {
	echo "<script type='text/javascript'> 
				alert('Password should have at least 1 number');
				window.location.href = '../SignIn.php';
		  </script>";
}

else if( !preg_match("#[a-z]+#", $password) ) {
	echo "<script type='text/javascript'> 
				alert('Password should have at least 1 lowercase');
				window.location.href = '../SignIn.php';
		  </script>";
}

else if( !preg_match("#[A-Z]+#", $password) ) {
	echo "<script type='text/javascript'> 
				alert('Password should have at least 1 CAPS!');
				window.location.href = '../SignIn.php';
		  </script>";
}

else if( !preg_match("#\W+#", $password) ) {
	echo "<script type='text/javascript'> 
				alert('Password should have at least 1 symbol');
				window.location.href = '../SignIn.php';
		  </script>";
}

else{
	
	$password= md5($password);
	if($password == $passwordagain)
	{

			$query="INSERT into users(u_name,u_college,u_email,u_password) VALUES('".$name."','".$college."','".$email."','".$password."')";
			$success=$conn->query($query);
				if(!$success){
					die("Couldn't establish connection: ".$conn->error);
				}

				echo "<script type='text/javascript'> 
						alert('Successfully Registered');
						window.location.href = '../login.php';
					  </script>";
				$conn->close();
	}
	else{
		echo "<script type='text/javascript'> 
				alert('Passwords dont match');
				window.location.href = '../SignIn.php';
		  	  </script>";
		$conn->close();
	}
	
}

?>
</html>