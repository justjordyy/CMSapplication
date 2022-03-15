<?php
    require_once "./includes/package_inc.php";
    if ($sessionStatus == "nosession" ||  $connection->returnConnection() === "0") {
        header("location: index.php");
    }
    if (empty(htmlentities($_GET['edit']))) {
        header('Location: adminpage.php');
    } else {
        if ($connection->checkInfo('pages', 'id', htmlentities($_GET['edit'])) === "1") {
            $page = $_GET['edit'];
            $pagecontext = $pages->returnPageContext(htmlentities($page));
            $pagename = $connection->returnItem('pages', 'id', htmlentities($_GET['edit']))['pagename'];
            $checkactive = "";
            $checkadmin = "";
            if ($connection->returnItem('pages', 'id', htmlentities($_GET['edit']))['active'] == "1") {
                $checkactive = "checked=checked";
            }
            if ($connection->returnItem('pages', 'id', htmlentities($_GET['edit']))['adminpage'] == "1") {
                $checkadmin = "checked=checked";
            }
        } else {
            header('Location: adminpage.php');
        }
    }

    if (isset($_POST['editPageForm'])) {
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

        $pages->editPage($_GET['edit'], htmlentities($_POST['Ptitle']), $_POST['pcontex'], $active, $adminpage);
    }
    $view = "admineditpageview.php";
    require_once "./includes/Template.php";