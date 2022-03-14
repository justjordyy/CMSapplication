<?php
    require_once "./includes/package_inc.php";
    if ($sessionStatus == "nosession" ||  $connection->returnConnection() === "0") {
        header("location: index.php");
    }
    if (isset($_POST['deletePageForm'])) {
        $pages->deletePage(htmlentities($_GET['delete']));
    }
    $view = "adminpageview.php";
    require_once "./includes/Template.php";