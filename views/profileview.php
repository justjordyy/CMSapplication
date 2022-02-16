<div class="infopos">
    <div class="row">
        <div class="col w-75">
            <div class="card">
                <div class="card-body">
                    <form id="updateusernameForm" method="post">
                        <h6>Username:</h6>
                        <?php
                            echo "<input type='text' class='reg' id='oldusername' placeholder='old username' value=".$username." required name='oldusername'>";
                        ?>
                        <input type="text" class="reg" id="username" placeholder="new username" required name="username">
                        <button type="submit" name="updateusernameForm" class="btn btn-info btn-block btn-round" >Update!</button>
                    </form>
                    <form id="updatemailForm" method="post">
                        <h6>mail:</h6>
                        <?php
                            echo "<input type='text' class='reg' id='oldmail' placeholder='old mail' value=".$usermail." required name='oldmail'>";
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
                    <span type="button" class="btn btn-danger userdelete" data-bs-toggle="modal" data-bs-target="#deleteaccountModal">Delete account</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteaccountModal" tabindex="-1" aria-labelledby="deleteaccountModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteaccountModalLabel">Delete account</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete your account? All your data will be removed permanently</p>
                <form method="post" id="deleteForm">
                    <div class="form-group">
                        <h6>password:</h6>
                        <input type="password" class="form-control loginmdlfrm" id="password" placeholder="password" name="password" required>
                        <button type="submit" name="deleteForm" class="btn btn-light">Delete!</button>
                        <button type="submit" name="deleteForm" class="btn btn-danger">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> 