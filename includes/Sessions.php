<?php
require_once('Database.php'); //Makes database connection.
class Sessions {
    public function __construct() {}

    public function ifSessionExist() {
        session_start();
        if (!isset($_SESSION["loggedin"])) {
            print "no session";
        }
        elseif (isset($_SESSION["loggedin"])) {
            print "LOGGEDIN";
        }
    }
}
?>