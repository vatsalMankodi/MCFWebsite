
    <?php 
    session_start();

    $event_id = $_SESSION["currEvent_id"];
    $u_id = $_SESSION["u_id"];
    
    
    require 'connection.php';
    
    $conn = Connect();
    
    $sql = "INSERT INTO registers VALUES(".$u_id.",".$event_id."); ";

    mysqli_set_charset($conn,"utf8");

    if(mysqli_query($conn,$sql)){
    
        return true;
        
    }else{
        return false;
    }

?>
    
