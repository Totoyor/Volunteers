<?php include_once('views/layout/header.inc.php'); ?>
    <div class="container content-blog">
        <div class="row">
            <div class="col s12 m12">
                <div class="card-panel center">
                    <h1>Change your password :</h1>
                    <form class="login-form" action="?module=password&action=newpass" method="post">
                        <div class="row">
                            <div class="input-field col s6">
                                <input placeholder="Last Password" id="password1" type="password" class="validate" name="LastPassword"
                                       required="required" value="" pattern=".{5,10}" title="5 to 10 characters">
                                <label for="password1" class="center-align"></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6">
                                <input placeholder="New Password" id="password2" type="password" class="validate" name="NewPassword"
                                       required="required" value="" pattern=".{5,10}" title="5 to 10 characters">
                                <label for="password2" class="center-align"></label>
                            </div>
                        </div>
                        <div class="row center">
                            <div class="input-field col s6">
                                <button id="submit" class="btn waves-effect waves-light" type="submit">Change my password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php include_once('views/layout/footer.inc.php'); ?>