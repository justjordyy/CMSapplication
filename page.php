<?php
    require_once "./includes/package_inc.php";
    if (!empty(htmlentities($_GET['page']))) {
        $page = $_GET['page'];
        if ($connection->checkInfo('pages', 'id', htmlentities($page)) === "1") {
            if($connection->returnItem('pages', 'id', htmlentities($page))['active'] == '0') {
                if($connection->returnItem('pages', 'id', htmlentities($page))['adminpage'] == '1') {
                    if ($sessionStatus == "nosession") {
                        header('Location: index.php?privatepage');
                        return;
                    }
                }
                $pagecontext = $pages->returnPageContext(htmlentities($page));
        } else {
            header('Location: index.php');
        }
    }
    } else {
        header('Location: index.php');
    }
    $view = "pageview.php";
    require_once "./includes/Template.php";