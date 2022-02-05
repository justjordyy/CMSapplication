<?php
require_once('./Database.php'); //Makes database connection.
    class UserManagement {







        function registration() {
            // require_once('classes/dbconnections/databaseConnection.php');
            $foo = new DataBaseConnection();
            print "REGISTRATION";
            $foo->openConnection();
            $foo->useradd();
        }
    }
?>