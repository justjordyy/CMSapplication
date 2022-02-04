<!DOCTYPE html>
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
            <div class="registrationFormBackground">
                <form id="registrationForm" method="post">
                    <input type="text" class="reg" id="username" placeholder="username" required name="username">
                    <input type="email" class="reg" id="mail" placeholder="example@mail.com" required name="mail">
                    <input type="password" class="reg" id="password" placeholder="password" required name="password">
                    <input type="password" class="reg" id="passwordrenterd" placeholder="reenter your password" required name="passwordRenterd">    
                    <input type="text" class="reg" id="passwordreg" placeholder="admincode"  name="rol"><br><br>
                    <input type="checkbox" required id="regconfirm">
                    <label for="regconfirm">I agree with the Terms Of Service</label><br><br>
                    <p id="gebrerr">gebruikersnaam is al in gebruik</p>
                    <p id="mailerr">er is al een account met deze mail</p>
                    <p id="wwerr">wachtwoorden komen niet overeen</p>
                    <p id="rolerr">enter a 1 for admin or 0 for creator</p>
                    <p id="dberr">Kon geen verbinding maken met de database</p>
                    <button type="submit" name="registrationForm" class="btn btn-info btn-block btn-round" >Register</button>
                </form>
            </div>
        </div>
    </body>
    <?php
    require_once('classes/users/userRegistration.php');
        $register = new userRegistration();
    // if ($_POST['registrationForm']) {
    //     echo "Loggedin.";
    // }  
    ?>
</html>