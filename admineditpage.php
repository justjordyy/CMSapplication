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
        } else {
            header('Location: adminpage.php');
        }
    }

    if (isset($_POST['editPageForm'])) {
        $pages->editPage($_GET['edit'], htmlentities($_POST['Ptitle']), $_POST['pcontex']);
    }
    $view = "admineditpageview.php";
    require_once "./includes/Template.php";