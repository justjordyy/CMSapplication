<?php
require_once('Database.php'); //Makes database connection.
class Sessions {
    public function __construct() {}

    public function startSession() {
        session_start();
    }

    public function destroySession() {
        session_destroy();
    }
    
    public function ifSessionExist() {
        if (!isset($_SESSION["loggedin"])) {
            return "nosession";
        }
        elseif (isset($_SESSION["loggedin"])) {
            return "session";
        }
    }
}
?>