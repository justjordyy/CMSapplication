<!DOCTYPE html>
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
        <?php if ($sessionStatus == "nosession") { 
            echo "<nav class=\"navbar navbar-expand-lg navbar-dark bg-dark\">
            <div class=\"container-fluid\">
                <a class=\"navbar-brand\" id=\"brandcolor\" href=\"./index.php\">CMS system</a>".
                $pages->returnPages()
                ."<li class=\"nav-item\"><a class=\"nav-link\" href=\"#\">".$pages->returnPages()."</a></li>
                <span class=\"navbar-text\" data-bs-toggle=\"modal\" data-bs-target=\"#loginModal\">Login</span>
                <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarText\" aria-controls=\"navbarText\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                    <span class=\"navbar-toggler-icon\"></span>
                </button>
            </div>
        </nav>";
        ?>
        
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
                        <!-- Check Translation -->
                        <span>New user? Create your account <a href="./registration.php">here</a></span>
                    </div>
                </div>
            </div>
        </div>  

        <?php
            } elseif ($sessionStatus == "session" && isset($username)) {
            echo "<nav class=\"navbar navbar-expand-lg navbar-dark bg-dark\">
                    <div class=\"container-fluid\">
                        <a class=\"navbar-brand\" id=\"brandcolor\" href=\"./index.php\">CMS app</a>";
                        foreach($pages->returnPages() as $rowitem) {
                           echo " <li class=\"nav-item\" style=\"color: white;\">
                            <a class=\"nav-link\" href=\"#\">".$rowitem."</a>
                            </li>";
                        var_dump($rowitem);
                        } 
                        echo"<span class=\"navbar-text\" onclick=\"showblock()\">".$username."</span>
                        <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarText\" aria-controls=\"navbarText\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                            <span class=\"navbar-toggler-icon\"></span>
                        </button>
                    </div>
                </nav>";
            } else {
                echo "<nav class=\"navbar navbar-expand-lg navbar-dark bg-dark\">
                <div class=\"container-fluid\">
                    <a class=\"navbar-brand\" id=\"brandcolor\" href=\"./index.php\">CMS system</a>".
                    $pages->returnPages()
                    ."<li class=\"nav-item\"><a class=\"nav-link\" href=\"#\">".$pages->returnPages()."</a></li>
                    <span class=\"navbar-text\" data-bs-toggle=\"modal\" data-bs-target=\"#loginModal\">Login</span>
                    <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarText\" aria-controls=\"navbarText\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
                        <span class=\"navbar-toggler-icon\"></span>
                    </button>
                </div>
            </nav>";
            }
        ?>
        
        <div class="float-md-right c" id="usercard">
            <div class="card" style="width: 9rem;">
                <div class="card-body">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                    <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
                </svg>
                    <a class="card-text usercard" href="./profile.php">Your profile</a>
                    <hr/>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                    <a class="card-text usercard" href="./page.php">Change site</a>
                    <hr/>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/>
                        <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                    </svg>
                    <span  class="card-text usercard" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</span>
                </div>
            </div>
        </div>

        <!-- Logout -->
        <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="logoutModalLabel">Log out</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to log out?</p>
                        <a class="btn btn-danger" href ="./logout.php">Log out</a>
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                    </div>
                </div>
            </div>
        </div> 
        <?php
            if (isset($view) && file_exists("./views/".$view)) {
            require_once "./views/".$view;
            }
        ?>
        <div class="delacc">
        <div class="alert alert-warning loginfail alert-dismissible fade show popsize" id="loginfail" role="alert">
                <strong>Oops!</strong> Invalid login credentials
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <div class="alert alert-danger openconn alert-dismissible fade show popsize" id="openconn" role="alert">
            <strong>FATAL ERROR!</strong> Please contact the server administrator! errorcode: openConnectionError
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <div class="alert alert-danger closeconn alert-dismissible fade show popsize" id="closeconn" role="alert">
            <strong>FATAL ERROR!</strong> Please contact the server administrator! errorcode: closeConnectionError
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <!-- Make a message for succesfully created account -->
        <?php if(isset($_GET['deleted'])) { ?>
            <div class="alert alert-success alert-dismissible fade show popsize" role="alert">
                Successfully deleted your account!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> 
            <?php } ?>
            <?php if(isset($_GET['acccreated'])) { ?>
            <div class="alert alert-success alert-dismissible fade show popsize" role="alert">
               Account created succesfully!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div> 
            <?php } ?>
        </div>
    </body>
    <script>
        function showblock(){
            if (document.getElementById("usercard").style.display == 'block') {
                    document.getElementById("usercard").style.display='none';
            } else {
                document.getElementById("usercard").style.display='block';
            }
        }
    </script>
</html>