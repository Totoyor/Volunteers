<?php include_once('views/layout/header.inc.php'); ?>

<div class="container content-blog">
    <div class="row">
        <div class="col s12 m12">
            <div class="card-panel">
                <form action="?module=user&action=connect" method="post">
                    <div class="card-image col s3 push-s4">
                        <img src="assets/img/avatar.png" class="responsive-img circle">
                        <h5 class="card-title center-align">Connexion</h5>
                    </div>
                    <div class="card-content">
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="email" type="email" class="validate" name="email">
                                <label for="email">Email</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="password" type="password" class="validate" name="password">
                                <label for="password">Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="card-action">
                        <input type="submit" value="Connexion">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once('views/layout/footer.inc.php'); ?>