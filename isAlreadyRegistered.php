<?php 
        
    require 'connection.php';
    session_start();
        
        
    $event_id = $_SESSION['currEvent_id'];
    $u_id = $_SESSION['u_id'];
    
    if(!$_SESSION["loggedin"])
        echo -1;
    else{
        $conn = Connect();

        $sql = "SELECT u_id,event_id FROM registers WHERE u_id=".$u_id." and event_id=".$event_id;

        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result)>0)
            echo 1;
        else echo 0;
        
        
        
    }
        
?>
    
