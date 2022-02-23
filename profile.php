<?php
    require_once "./includes/package_inc.php";
    if ($sessionStatus == "nosession" ||  $connection->returnConnection() === "0") {
        header("location: index.php");
    }
    if (isset($_POST['deleteForm'])) {
        $usermanagement->delete($usermail, htmlentities($_POST['password']), $userid);
    }

    //update username
    if (isset($_POST['updateusernameForm'])) {
        $usermanagement->update("username", $username, $userid, htmlentities($_POST['username']));
    }

    //update mail
    if (isset($_POST['updatemailForm'])) {
        $usermanagement->update("mail", $usermail, $userid, htmlentities($_POST['mail']));
    }

    if (isset($_POST['updatepasswordForm'])) {
        $usermanagement->updatePassword(htmlentities($_POST['oldpassword']), htmlentities($_POST['newpassword']), htmlentities($_POST['newpasswordrenterd']), $userid);
    }

    $view = "profileview.php";
    require_once "./includes/Template.php";