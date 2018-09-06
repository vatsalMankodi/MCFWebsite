<?php

    session_start();

    $event_id = $_POST['event_id'];
    $_SESSION['currEvent_id'] = $event_id;

    require 'connection.php';
    $conn=Connect();

    $sql = "SELECT event_name,event_desc,event_date FROM event WHERE event_id='".$event_id."'";
    
    
    mysqli_set_charset($conn,"utf8");

    $result = mysqli_query($conn,$sql); 
    $row = mysqli_fetch_row($result);

    $sql = "SELECT src FROM venue WHERE venue_id= (SELECT venue_id FROM at WHERE event_id=".$_SESSION['currEvent_id'].") ;";

    $result = mysqli_query($conn,$sql);  

    $row2 = mysqli_fetch_row($result);
    
    $details= array($row[0],$row[1],$row[2],$row2[0]);

    echo json_encode($details);
               
                  
              
?>