<?php
    class userRegistration {//constructir
        public $username           = htmlentities($_POST['username']);
        public   $mail               = htmlentities($_POST['mail']);
        public   $password           = htmlentities($_POST['password']);
        public    $passwordrenterd    = htmlentities($_POST['renterdpassword']);

           
           function registration($username, $mail, $password, $passwordrenterd ) {
               if (isset($_POST['registrationForm'])) {
            if ($password === $passwordrenterd)
            {
                $encryptedpassword = hash('sha256', "encrypted"$password);
            } else {
                return $passworderror;
            }
        }  
    }
?>