<!DOCTYPE html>
<?php 
    require_once('includes/Sessions.php');
    require_once('includes/Database.php');
    $session = new Sessions();
    $connection = new Database();
    $session->startSession();
    //addmessage that user is already logged in
    $connection->openConnection();
    if ($session->ifSessionExist() == "session" || $connection->returnConnection() === "0") {
        header("location: index.php");
    }
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CMS - Registration</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="./css/registration.css">
    </head>
    <body>
        <div class="container">
            <div class="alert alert-warning alertsize pwdontmatch alert-dismissible fade show" id="pwdontmatch" role="alert">
                <strong>Oops!</strong> Your passwords do not match.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="alert alert-warning alertsize usernameexist alert-dismissible fade show" id="usernameexist" role="alert">
                <strong>Oops!</strong> There is already a account with this username.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="alert alert-warning alertsize mailexist alert-dismissible fade show" id="mailexist" role="alert">
                <strong>Oops!</strong> There is already a account with this mail.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="alert alert-danger alertsize error alert-dismissible fade show" id="error" role="alert">
                <strong>Oops!</strong> Something went wrong please try again.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="registrationFormBackground">
                <form id="registrationForm" method="post">
                    <input type="text" class="reg" id="username" placeholder="username" required name="username">
                    <input type="email" class="reg" id="mail" placeholder="example@mail.com" required name="mail">
                    <input type="password" class="reg" id="password" placeholder="password" required name="password">
                    <input type="password" class="reg" id="passwordrenterd" placeholder="reenter your password" required name="passwordRenterd"><br><br>  
                    <input type="checkbox" required id="regconfirm">
                    <label for="regconfirm">I agree with the Terms Of Service</label><br><br>
                    <button type="submit" name="registrationForm" class="btn btn-info btn-block btn-round" >Register</button>
                </form>
            </div>
        </div>
    </body>
    <?php
        require_once('includes/UserManagement.php');
        if (isset($_POST['registrationForm'])) {
            $usermanagement = new UserManagement();
            $usermanagement->registration(htmlentities($_POST['username']), htmlentities($_POST['mail']), htmlentities($_POST['password']), htmlentities($_POST['passwordRenterd']));
        }
    ?>
</html>