<?php
  class Database {

    private $servername = "localhost";
    private $dbname = "cmsapplication";
    private $username = "root";
    private $password = "";
    private $connection;
    //MAYBE ADD PERMISSIONS CHANGE ROOTUSERS WITH USERNAMES

    public function __construct() {}

    public function openConnection() {
      try {
        $conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->connection = $conn;
      } catch(PDOException $e) {
        echo "<style> .openconn{ display: block !important; } </style>";
          $this->connection = "0";
      }
    }
    public function returnConnection() {
      return $this->connection;
    }

    public function closeConnection() {
      try {
        $this->connection = null;
      } catch(PDOException $e) {
        echo "<script type='text/javascript'>document.getElementById('closeconn').style.display='block';</script>";
      }
    }

    public function checkInfo($tabelname, $columname, $itemname) {
      if (!$this->connection) {
        return;
      }
      $sql = "SELECT * FROM $tabelname WHERE $columname = ?";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute(array($itemname));
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($result) {
        return "1";
      } else {
        return "0";
      }
    }

    public function returnItem($tabelname, $columname, $itemname) {
      if (!$this->connection) {
        return;
      }
      $sql = "SELECT * FROM $tabelname WHERE $columname = ?";
      $stmt = $this->connection->prepare($sql);
      $stmt->execute(array($itemname));
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }
  }
?>