<?php include_once('views/layout/header.inc.php'); ?>



    <div class="container content-validate">
        <div class="row">
            <div class="offset-m1 offset-l3 col s12 m6 center_content">
                <div class="card-panel center">
                    <div class="more_margin"></div>
                    <img src="assets/img/logo_volonteers3.svg" alt="logo" class="logo_validate">
                    <h1 class="title-section">Did you forgot your password ?</h1>
                    <hr class="fancy-hr">
                    <form class="login-form" action="?module=password&action=forgot" method="post">
                        <div class="row">
                            
                            <div class="input-field col s12 m12 l12">
                                 <p>Please enter your email</p>
                                <input placeholder="Email" id="email" type="email" class="validate" name="email" required="required" value="<?php if(isset($_COOKIE['EmailUserVolunteers'])) { echo $_COOKIE['EmailUserVolunteers']; } ?>">
                                <label for="email" class="center-align"></label>
                            </div>
                        </div>
                        <div class="row center">
                            
                            <div class="input-field col s6">

                            </div>
                        </div>

            

                        <div class="more_margin"></div>
                        <button id="submit" class="btn btn-bleu waves-effect waves-light" type="submit" name="action">Send me a new password
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>






    

    <?php include_once('views/layout/footer.inc.php'); ?>