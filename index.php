<!DOCTYPE html>
<?php 
                require_once('includes/Sessions.php');
                    $session = new Sessions();
                    $session->ifSessionExist();
?>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <link rel="stylesheet" type="text/css" href="./css/index.css">
            <title>CMS Aplication</title>
        </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <!--Before public commit, set this to CMS app and delete this comment  -->
            <a class="navbar-brand" id="brandcolor" href="#">Portfolio</a>
            <span class="navbar-text" data-bs-toggle="modal" data-bs-target="#loginModal">Login</span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <!-- Code base language is english, maybe if languaghe files can be made make them -->
        <!-- Login modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="loginModalLabel">Log in</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="loginForm">
                            <div class="form-group">
                                <h6>mail:</h6>
                                <!-- maybe add the option for username too? -->
                                <input type="email" class="form-control loginmdlfrm" id="email" placeholder="example@mail.com" name="mail" required>
                                <h6>password:</h6>
                                <input type="password" class="form-control loginmdlfrm" id="password" placeholder="password" name="password" required>
                                <button type="submit" name="loginForm" class="btn btn-info btn-block btn-round" >Login!</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <!-- Check deze vertaling -->
                        <span>Not an account? <a href="./registreren.php">Register</a></span>
                    </div>
                </div>
            </div>
        </div>

        <?php
                require_once('includes/UserManagement.php');
                if (isset($_POST['loginForm'])) {
                    $usermanagement = new UserManagement();
                    $usermanagement->login(htmlentities($_POST['mail']), htmlentities($_POST['password']));
                }
        ?>
    </body>
</html>