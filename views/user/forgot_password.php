<?php include_once('views/layout/header.inc.php'); ?>

    <div class="container content-blog">
        <div class="row">
            <div class="col s12 m12">
                <div class="card-panel center">
                    <h1>You forgot your password ?</h1>
                    <form class="login-form" action="?module=password&action=forgot" method="post">
                        <div class="row">
                            <div class="input-field col s6">
                                <input placeholder="Email" id="email" type="email" class="validate" name="email"
                                       required="required" value="<?php if(isset($_COOKIE['EmailUserVolunteers'])) { echo $_COOKIE['EmailUserVolunteers']; } ?>">
                                <label for="email" class="center-align"></label>
                            </div>
                        </div>
                        <div class="row center">
                            <div class="input-field col s6">
                                <button id="submit" class="btn waves-effect waves-light" type="submit" name="action">Send me a new password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include_once('views/layout/footer.inc.php'); ?>