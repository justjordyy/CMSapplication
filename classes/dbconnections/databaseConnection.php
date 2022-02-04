<?php 
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "testdatabase";

    try {
      $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      //Error
      $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e)
    return $conn;
?>