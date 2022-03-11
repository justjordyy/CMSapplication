<?php
    require_once "./includes/package_inc.php";
    if (!empty(htmlentities($_GET['page']))) {
        $page = $_GET['page'];
        $pagecontext = $pages->returnPageContext(htmlentities($page));
    } else {
        header('Location: index.php');
    }
    $view = "pageview.php";
    require_once "./includes/Template.php";