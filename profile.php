<?php
    require_once "./includes/package_inc.php";
    if ($sessionStatus == "nosession") {
        header("location: index.php");
    }
    $connection->openConnection();
    if (isset($_POST['deleteForm'])) {
        $usermanagement->delete($usermail, htmlentities($_POST['password']), $userid);
    }
    
    $view = "profileview.php";
    require_once "./includes/Template.php";