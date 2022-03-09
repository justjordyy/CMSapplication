<?php
    require_once "./includes/package_inc.php";
    $view = "pageview.php";
    require_once "./includes/Template.php";

    if (!empty(htmlentities($_GET['page']))) {
        $page = $_GET['page'];
        echo $pages->returnPageContext(htmlentities($page));
    }