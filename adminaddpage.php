<?php
    require_once "./includes/package_inc.php";
    if ($sessionStatus == "nosession" ||  $connection->returnConnection() === "0") {
        header("location: index.php");
    }
    if (isset($_POST['createPageForm'])) {
        if (!isset($_POST['pprite'])) {
            $active = "0";
        } else {
            $active = "1";
        }
        if (!isset($_POST['pstaff'])) {
            $adminpage = "0";
        } else {
            $adminpage = "1";
        }

        $pages->createPage(htmlentities($_POST['Ptitle']), $_POST['pcontex'], $active, $adminpage);
    }
    $view = "adminaddpageview.php";
    require_once "./includes/Template.php";