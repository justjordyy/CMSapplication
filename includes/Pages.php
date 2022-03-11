<?php
require_once('Database.php'); //Makes database connection.
require_once('includes/Sessions.php');
class Pages {

    public function __construct() {}

    public function createPage($pageTitle, $pageContent)
    {
        $connection = new Database();
        $connection->openConnection();

        $conn = $connection->returnConnection();
        $query = $conn->prepare("INSERT INTO pages (pagename, context) VALUES (:pagename, :context)");

        $query->bindValue(":pagename", $pageTitle, PDO::PARAM_STR);
        $query->bindValue(":context", $pageContent, PDO::PARAM_STR);
        if(!$query->execute() == TRUE)
        {
            echo "<script type='text/javascript'>document.getElementById('error').style.display='block';</script>>";
        } else {
            header('Location: adminpage.php');
        }
        $connection->closeConnection();
    }

    public function returnPages()
    {
        $connection = new Database();
        $connection->openConnection();

        $conn = $connection->returnConnection();
        
        $query = $conn->prepare("SELECT * FROM pages");
        $query->execute();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            echo "<li class=\"nav-item\"><a class=\"nav-text navsett\" href=\"./page.php?page=".htmlentities($row['id'])."\">".htmlentities($row['pagename'])."</a></li>";
        }
    }

    public function returnPageContext($page) {
        $connection = new Database();
        $connection->openConnection();

        if ($connection->checkinfo("pages", "id", $page) === "1") {
            return $connection->returnItem("pages", "id", $page)["context"];
        } else {
            echo "<h1>No page has been found</h1>";
        }
    }

    public function returnPagesInfo() {
        $connection = new Database();
        $connection->openConnection();

        $conn = $connection->returnConnection();
        
        $query = $conn->prepare("SELECT * FROM pages");
        $query->execute();

        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            if ($row['active'] == 1) {
                $active = "Not Visible";
            } else {
                $active = "Visible";
            }
            if ($row['adminpage'] == 1) {
                $admin = "yes";
            } else {
                $admin = "no";
            }
            echo "<tr ><td>".$row['id']."</td><td>".$row['pagename']."</td><td>".$active ."</td><td>".$admin."</td><td><a href=\"./admineditpage.php?edit=".$row['id']."\">
            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-pencil-square\" viewBox=\"0 0 16 16\">
                <path d=\"M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z\"/>
                <path fill-rule=\"evenodd\" d=\"M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z\"/>
            </svg></a>
            </td><td>
            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-trash\" viewBox=\"0 0 16 16\">
                <path d=\"M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z\"/>
                <path fill-rule=\"evenodd\" d=\"M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z\"/>
            </svg></td></tr>";
        }
    }

    public function editPage($id, $pageTitle, $pageContent){
        $connection = new Database();
        $connection->openConnection();
        if ($connection->checkinfo("pages", "id", $id) === "1") {
            $conn = $connection->returnConnection();
            $query = $conn->prepare("UPDATE pages SET pagename = :pagename, context = :context WHERE id=$id");
            $query->bindValue(":pagename", $pageTitle, PDO::PARAM_STR);
            $query->bindValue(":context", $pageContent, PDO::PARAM_STR);
            if(!$query->execute() == TRUE)
            {
                echo "<script type='text/javascript'>document.getElementById('error').style.display='block';</script>>";
            } else {
                header('Location: adminpage.php');
            }
            $connection->closeConnection();
        }
    }
}   
?>