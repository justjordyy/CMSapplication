<?php
    require_once "./includes/package_inc.php";
    if ($sessionStatus == "nosession") {
        header("location: index.php");
    }
    // $connection->openConnection();
    if (isset($_POST['deleteForm'])) {
        $usermanagement->delete($usermail, htmlentities($_POST['password']), $userid);
    }
   //$columname, $itemname, $sessionId, $newitem
    //update username
    if (isset($_POST['updateusernameForm'])) {
        $usermanagement->update("username", $username, $userid, htmlentities($_POST['username']));
    }

    //update mail
    if (isset($_POST['updatemailForm'])) {
        $usermanagement->update("mail", $username, $userid, htmlentities($_POST['mail']));
    }

    
    $view = "profileview.php";
    require_once "./includes/Template.php";