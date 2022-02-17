<?php
    require_once('Sessions.php');
    require_once('Database.php');
    require_once('UserManagement.php');
    $usermanagement = new UserManagement();
    $connection = new Database();
    $session = new Sessions();
    $connection->openConnection();
    $session->startSession();
    $sessionStatus = $session->ifSessionExist();
    if (isset($sessionStatus) && $sessionStatus == "session") {
        $username = $connection->returnItem("users", "id", $_SESSION['loggedin'])["username"];
        $usermail = $connection->returnItem("users", "id", $_SESSION['loggedin'])["mail"];
        $userid = $connection->returnItem("users", "id", $_SESSION['loggedin'])["id"];
    }
    //Login
    if (isset($_POST['loginForm'])) {
        $usermanagement->login(htmlentities($_POST['mail']), htmlentities($_POST['password']));
    }
?>