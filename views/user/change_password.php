<?php include_once('views/layout/header.inc.php'); ?>
<<<<<<< HEAD

    
 <div class="container content-validate">
=======
    <div class="container content-blog">
>>>>>>> 05feda4084ea4fdf66fba4b1553660321e7fd964
        <div class="row">
            <div class="col m6 offset-m3 offset-l3 center_content">
                <div class="card-panel center">
                    <div class="more_margin"></div>
                    <img src="assets/img/logo_volonteers3.svg" alt="logo" class="logo_validate">
                    <h1 class="title-section">Let's change your password !</h1>
                    <hr class="fancy-hr">
                    <p class="">Please enter your last password then the new one</p>
                   <form class="login-form" action="?module=password&action=newpass" method="post">
                        <div class="row">
                            <div class="input-field col s12">
                                <input placeholder="Last Password" id="password1" type="password" class="validate" name="LastPassword"
                                       required="required" value="" pattern=".{5,10}" title="5 to 10 characters">
                                <label for="password1" class="center-align"></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input placeholder="New Password" id="password2" type="password" class="validate" name="NewPassword"
                                       required="required" value="" pattern=".{5,10}" title="5 to 10 characters">
                                <label for="password2" class="center-align"></label>
                            </div>
                        </div>
                        <div class="row center">
                            <div class="input-field col s12">
                                <button id="submit" class="btn btn-bleu waves-effect waves-light" type="submit">Change my password
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="more_margin"></div>

                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD


=======
>>>>>>> 05feda4084ea4fdf66fba4b1553660321e7fd964
<?php include_once('views/layout/footer.inc.php'); ?>