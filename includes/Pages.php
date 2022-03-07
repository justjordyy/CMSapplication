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
            header('Location: index.php?acccreated');
        }
        $connection->closeConnection();
    }

    public function returnPages()
    {
        $str = "";
        $connection = new Database();
        $connection->openConnection();

        $conn = $connection->returnConnection();
        
        $query = $conn->prepare("SELECT * FROM pages");
        $query->execute();
       var_dump($query->fetch(PDO::FETCH_ASSOC));
       foreach($query->fetch(PDO::FETCH_ASSOC) as $row) {
           var_dump($row);
           return $row;
       }
        // while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            // var_dump($query->fetch(PDO::FETCH_ASSOC)); 
            // foreach($row as $navitems) {
            //  return $navitems;
            // }
            // var_dump($row[1]);
                    // return $row;
        }
        // exit;   
        
        
    //    return $str;
    // }
}
?>