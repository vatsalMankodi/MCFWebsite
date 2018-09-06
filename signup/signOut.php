<?php

    session_start();

    $_SESSION["loggedin"]=false;
    header("Location:../home.html");
    exit();
    

?>
