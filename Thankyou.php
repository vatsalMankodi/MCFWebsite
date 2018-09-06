<?php
    
require 'connection.php';
$conn=Connect();
$name=$conn->real_escape_string($_POST['u_name']);
$college=$conn->real_escape_string($_POST['u_college']);
$email=$conn->real_escape_string($_POST['u_email']);
$emailagain=$conn->real_escape_string($_POST['u_emailagain']);
$password=$conn->real_escape_string($_POST['u_password']);
$passwordagain=$conn->real_escape_string($_POST['u_passwordagain']);

$query="INSERT into user_info(u_name,u_email,u_contact,u_question) VALUES('".$name."','".$college."','".$email."','".$emailagain."','".$passwrod."','".$passwrodagain."')";
$success=$conn->query($query);
    if(!$success){
        die("Couldn't establish connection: ".$conn->error);
    }

    echo "Thank you for contacting us<br>";
    $conn->close();
?>