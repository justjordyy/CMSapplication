<?php
require_once('Database.php'); //Makes database connection.
    class UserManagement {

        function registration() {
            // require_once('classes/dbconnections/databaseConnection.php');
            $connection = new DataBaseConnection();
            print "REGISTRATION";
            $connection->openConnection();

            $connection->closeConnection();
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