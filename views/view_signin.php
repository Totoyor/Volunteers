<?php include_once('views/layout/header.inc.php'); ?>

    <div class="container content-blog">
        <div class="row">
            <form class="col s12" method="post" action="?module=user&action=signin">
                <div class="row">
                    <div class="card-image col s3 push-s4">
                        <img src="assets/img/blog/avatar.png" class="responsive-img circle">
                        <h5 class="card-title center-align">Inscription</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="first_name" type="text" class="validate" name="nom">
                        <label for="first_name">Nom</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="last_name" type="text" class="validate" name="prenom">
                        <label for="last_name">Prénom</label>
                    </div>
                </div>
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
                <input type="submit" value="Inscription">
            </form>
        </div>
    </div>

<?php include_once('views/layout/footer.inc.php'); ?>