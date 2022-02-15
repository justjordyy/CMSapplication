<div class="infopos">
    <div class="row">
        <div class="col w-75">
            <div class="card">
                <div class="card-body">
                    <form id="updateusernameForm" method="post">
                        <h6>Username:</h6>
                        <?php
                            echo "<input type='text' class='reg' id='oldusername' placeholder='old username' value=".$connection->returnItem("users", "id", $_SESSION['loggedin'])["username"]." required name='oldusername'>";
                        ?>
                        <input type="text" class="reg" id="username" placeholder="new username" required name="username">
                        <button type="submit" name="updateusernameForm" class="btn btn-info btn-block btn-round" >Update!</button>
                    </form>
                    <form id="updatemailForm" method="post">
                        <h6>mail:</h6>
                        <?php
                            echo "<input type='text' class='reg' id='oldmail' placeholder='old mail' value=".$connection->returnItem("users", "id", $_SESSION['loggedin'])["mail"]." required name='oldmail'>";
                        ?>
                        <input type="text" class="reg" id="mail" placeholder="new mail" required name="mail">
                        <button type="submit" name="updatemailForm" class="btn btn-info btn-block btn-round" >Update!</button>
                    </form>
                    <form id="updatepasswordForm" method="post">
                        <h6>password:</h6>
                        <input type="password" class="reg" id="oldpassword" placeholder="old password" required name="oldpassword">
                        </br>
                        <input type="password" class="reg" id="password" placeholder="password" required name="password">
                        <input type="password" class="reg" id="passwordrenterd" placeholder="reenter your password" required name="passwordRenterd">
                        <button type="submit" name="updatepasswordForm" class="btn btn-info btn-block btn-round" >Update!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
