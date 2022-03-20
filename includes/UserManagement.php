<?php
require_once('Database.php'); //Makes database connection.
require_once('includes/Sessions.php');
    class UserManagement {

        public function __construct() {}

        public function registration($username, $mail, $password, $passwordreenterd) {
            $connection = new Database();
            $connection->openConnection();

            if ($connection->checkinfo("users", "username", $username) === "1")
            {
                echo "<script type='text/javascript'>document.getElementById('usernameexist').style.display='block';</script>>";
                return;
            }

            if ($connection->checkinfo("users", "mail", $mail) === "1")
            {
                echo "<script type='text/javascript'>document.getElementById('mailexist').style.display='block';</script>>";
                return;
            }

            if ($password !== $passwordreenterd) {
                echo "<script type='text/javascript'>document.getElementById('pwdontmatch').style.display='block';</script>>";
                return;
            }
            $hashedpassword = hash("sha256", $password."SaltedPassword");
            //all the checks are completed passwords have been salted
            $conn = $connection->returnConnection();
            $query = $conn->prepare("INSERT INTO users (username, mail, password) VALUES (:username, :mail, :password)");
            $query->bindValue(":username", $username, PDO::PARAM_STR);
            $query->bindValue(":mail", $mail, PDO::PARAM_STR);
            $query->bindValue(":password", $hashedpassword, PDO::PARAM_STR);
            if(!$query->execute() == TRUE)
            {
                echo "<script type='text/javascript'>document.getElementById('error').style.display='block';</script>>";
            } else {
                header('Location: index.php?acccreated');
            }
            $connection->closeConnection();
        }

        public function login($mail, $password) {
            if (!isset($_SESSION["loggedin"])) {
                $connection = new Database();
                $connection->openConnection();
                $hashedpassword = hash("sha256", $password."SaltedPassword");
                if ($connection->checkinfo("users", "mail", $mail) === "1") {
                    $userid = $connection->returnItem("users", "mail", $mail)["id"];
                    if ($connection->returnItem("users", "id", $userid)["password"] === $hashedpassword) {
                        $_SESSION['loggedin'] = $connection->returnItem("users", "mail", $mail)["id"];
                        header("location: index.php");
                    } else {
                        echo "<style>
                        .loginfail{
                            display: block !important;
                        }
                        </style>";
                    }
                } elseif($connection->checkinfo("users", "mail", $mail) === "0") {
                    echo "<style>
                    .loginfail{
                        display: block !important;
                    }
                    </style>";
                } else {
                echo "<style>
                .openconn{
                    display: block !important;
                }
                </style>";
            }
            }
        }

        public function updatePassword($oldpassword, $password, $passwordreenterd, $sessionId) {
            $connection = new Database();
            $connection->openConnection();
            $oldhashedpassword = hash("sha256", $oldpassword."SaltedPassword");
            if ($connection->checkinfo("users", "password", $oldhashedpassword) === "1" ) {
                if ($password !== $passwordreenterd) {
                    echo "<style> .pwdontmatch{ display: block !important; } </style>";
                    return;
                }
                $hashedpassword = hash("sha256", $password."SaltedPassword");
                $conn = $connection->returnConnection();
                $query = $conn->prepare("UPDATE users SET password = :password WHERE id=$sessionId");
                $query->bindValue(":password", $hashedpassword, PDO::PARAM_STR);
                if(!$query->execute() == TRUE)
                {
                    echo "<style> .smthwrong{ display: block !important; } </style>";
                    $message = "something went wrong";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                } else {
                    header('Location: profile.php?updated=password');
                }
                $connection->closeConnection();
            } else {
                echo "<style> .unvalidpw{ display: block !important; } </style>";
                return;
            }
        }

        public function update($columname, $itemname, $sessionId, $newitem) {
            $connection = new Database();
            $connection->openConnection();
            if ($connection->checkinfo("users", $columname, $itemname) === "1") {
                if ($connection->checkinfo("users", $columname, $newitem) === "1") {
                    echo "<style> .unvalid".$columname."{ display: block !important; } </style>";
                    return;
                }
                $conn = $connection->returnConnection();
                $query = $conn->prepare("UPDATE users SET $columname = :$columname WHERE id=$sessionId");
                $query->bindValue(":$columname", $newitem, PDO::PARAM_STR);
                if(!$query->execute() == TRUE)
                {
                    echo "<style> .smthwrong{ display: block !important; } </style>";
                } else {
                    header("Location: profile.php?updated=$columname");
                }
                $connection->closeConnection();
            }
        }

        public function delete($mail, $password, $sessionId) {
            $connection = new Database();
            $connection->openConnection();
            $hashedpassword = hash("sha256", $password."SaltedPassword");
            if ($connection->checkinfo("users", "mail", $mail) === "1" && $connection->checkinfo("users", "password", $hashedpassword) === "1" )
            {
              
              $conn = $connection->returnConnection();
              $query = $conn->prepare("DELETE FROM users WHERE id=$sessionId"); 
              if(!$query->execute() == TRUE)
              {
                  $message = "something went wrong";
                  echo "<script type='text/javascript'>alert('$message');</script>";
                  header("location: profile.php");
              } else {
                $session = new Sessions();
                $session->destroySession();
                $connection->closeConnection();
                header("location: index.php?deleted");
              
                }
            }
        }
    }
?>