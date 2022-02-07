<?php
require_once('Database.php'); //Makes database connection.
    class UserManagement {

        public function __construct() {}

        function registration($username, $mail, $password, $passwordreenterd) {
            $connection = new Database();
            $connection->openConnection();

            if ($connection->checkinfo("users", "username", $username) === "1")
            {
                echo "<script type='text/javascript'>alert('error');</script>";
                return;
            }

            if ($connection->checkinfo("users", "mail", $mail) === "1")
            {
                echo "<script type='text/javascript'>alert('error');</script>";
                return;
            }

            if ($password !== $passwordreenterd) {
                echo "<script type='text/javascript'>alert('error');</script>";
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
                $message = "something went wrong";
                echo "<script type='text/javascript'>alert('$message');</script>";
            } else {
                header('Location: index.php');
            }
            $connection->closeConnection();
        }

        function login($mail, $password) {
            session_start();
            if (!isset($_SESSION["loggedin"])) {
                $connection = new Database();
                $connection->openConnection();
                $hashedpassword = hash("sha256", $password."SaltedPassword");
                if ($connection->checkinfo("users", "mail", $mail) === "1" && $connection->checkinfo("users", "password", $hashedpassword) === "1" )
                {
                    $_SESSION['loggedin'] = $mail;
                }
            }
            var_dump($_SESSION['loggedin']);
        }

/*
--> USERMANAGEMENT
--->login
--->logout
--->register
--->update
--->delete
*/
    }
?>