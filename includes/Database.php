<?php
  class Database {

    private $servername = "localhost";
    private $dbname = "cmsapplication";
    private $username = "root";
    private $password = "";
    private $connection = "";
    //MAYBE ADD PERMISSIONS
    
    public function __construct() {}

    public function openConnection() {
      try {
        $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->connection = $conn;
      } catch(PDOException $e) {
        echo"<script type='text/javascript'>alert('Something went wrong! OpenConnection error')</script>";
      }
    }

    public function closeConnection() {
      try {
        $this->connection = null;
      } catch(PDOException $e) {
        echo"<script type='text/javascript'>alert('Something went wrong! CloseConnection error')</script>";
      }
    }  
  }
?>