<?php
    require_once('includes/Sessions.php');
    require_once('includes/Database.php');
    $connection = new Database();
    $session = new Sessions();
    $session->startSession();
    
    if ($session->ifSessionExist() == "nosession") {
        //if theres no session, the user will be returned to the index.
        header("location: index.php");
    } elseif ($session->ifSessionExist() == "session") {
        $session->destroySession();
        $connection->closeConnection();
        header("location: index.php");
    } else {
        header("location: index.php");
    }
?>