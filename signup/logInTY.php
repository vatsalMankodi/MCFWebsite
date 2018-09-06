<html>
<body>
    <?php
    session_start();
	
    require 'connection.php';
	$conn=Connect();
	$email=$conn->real_escape_string($_POST['u_email']);
	$password=$conn->real_escape_string(md5($_POST['u_password']));
	
    
	$currUname = validateUsername($email,$conn);
    
    $_SESSION["u_id"]=null;    
    
    echo $_SESSION["status"];
    
	if($_SESSION["status"]=="verified")
		authorizePassword($email,$password,$conn);

    echo $_SESSION["status"];
	
	if($_SESSION["status"]=="authorized"){
        $_SESSION["u_name"]=$currUname;
        
        $_SESSION["loggedin"]= true;
        
        echo "<div>Welcome! ".$_SESSION["u_name"]."</div>";
        header("Location: ../home.html");
        
    }else{
        echo "<script> alert('invalid credentials') </script>";
    }
        

	
	function validateUsername($email,$conn){
		$sql = "SELECT u_name FROM users WHERE u_email ='".$email."'";
        
		$result = mysqli_query($conn,$sql);
	
        if($result === FALSE) { 
            echo mysqli_error($conn);
        }

        $row = mysqli_fetch_row($result);
		
        if($row != null){
			$_SESSION["status"]="verified";
            return $row[0];
		}else{
                echo "row is null";
				$_SESSION["status"]="not-verified";
				return null;
		}
    
		
		
	}
	
    
	function authorizePassword($email,$password,$conn){
		$sql = "SELECT u_name,u_id FROM users WHERE u_email ='".$email."' AND u_password='".$password."'";
		
        $result = mysqli_query($conn,$sql);
        
		$row = mysqli_fetch_row($result);
        
		
        if($row != null){
			$_SESSION["status"]="authorized";
            $_SESSION["u_id"]=$row[1];
		}else{
            $_SESSION["status"]="not-authorized";
		}
	}

?>
    
    
</body>


</html>

