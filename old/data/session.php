<?php
session_start();


$sesId = $_GET['sesId'];

if(isset($sesId)) {
        
    
    if(file_exists("login/tempLogin/temp_$sesId.txt")) {
        
        $_SESSION["sessionID"] = $sesId;

        
    } else {
        //echo "Nema";
    }
}


?>