<?php
    require_once "./includes/package_inc.php";
    $view = "addpageview.php";
    require_once "./includes/Template.php";

    if (isset($_POST['createPageForm'])) {
        $pages->createPage(htmlentities($_POST['Ptitle']), htmlentities($_POST['pcontex']));
    }