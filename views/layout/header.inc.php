<!DOCTYPE html>
<html>
<head>
    <?php BASE_HOME ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?php TITLE_HEAD ?></title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <link href="assets/css/materialize.css" rel="stylesheet" type="text/css">
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="grey lighten-4">
<header>
    <nav>
        <div class="nav-wrapper">
              <a href="?" class="brand-logo"><img src="assets/img/logov1.png" alt="logo"></a>
              <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a class="btn btn-menu" href="?module=event&action=create">Create event</a></li>
                <li><a onClick="ga('send', 'clic', 'Log In');" class="modal-trigger" href="#modal1">Log In</a></li>
                <li><a onClick="ga('send', 'clic', 'Sign Up');" class="modal-trigger" href="#modal2">Sign Up</a></li>
                <li><a onClick="ga('send', 'clic', 'Help');" href="404.php">Help</a></li>
              </ul>
            <ul id="slide-out" class="side-nav">
                <li><a href="?module=event&action=create">Create event</a></li>
                <li><a class="modal-trigger" href="#modal1">Log In</a></li>
                <li><a class="modal-trigger" href="#modal2">Sign Up</a></li>
                <li><a href="404.php">Help</a></li>
            </ul>
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
        </div>
    </nav>

    <!-- MODAL LOGIN-->
    <div id="modal1" class="modal login-card">
        <div class="row col s12">
        <h4 class="titre-login">Log In</h4>
        </div>
        <div class="modal-content">
            <form class="login-form">
                <div class="row">
                  <div class="col s12 m6">
                        <a class="btn btn-fb"><img class="sociallog" src="assets/img/fbmini.png" alt="facebook"></a>
                    </div>          <div class="col s12 m6">
                        <a class="btn btn-tw"><img class="sociallog" src="assets/img/twmini.png" alt="twitter"></a>
                    </div>

                </div>
                <div class="row">
                  <div class="input-field col s12">

                    <input placeholder="Email" id="email" type="text" class="validate">
                    <label for="email" class="center-align"></label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">

                    <input placeholder="Password" id="password" type="password">
                    <label for="password" class="center-align"></label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12 m12 l12  login-text">
                      <input type="checkbox" id="remember-me" />
                      <label for="remember-me" class="space-bot">Remember me</label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">
                    <a href="index.html" class="btn btn-orange col s12">Login</a>
                  </div>
                </div>

                <div class="row space-bot">
                  <div class="input-field col s6 m6 l6">
                    <p class="medium-small"><a class="modal-trigger" href="#modal2">Register now!</a></p>
                  </div>
                  <div class="input-field col s6 m6 l6">
                      <p class="margin right-align medium-small"><a href="page-forgot-password.html">Forgot password ?</a></p>
                  </div>
                </div>
          </form>
        </div><!-- fin modal content-->
    </div><!-- FIN MODAL LOG IN-->

    <!-- MODAL REGISTER-->
    <div id="modal2" class="modal login-card">
        <div class="row col s12">
        <h4 class="titre-login">Join us now !</h4>
        </div>
        <div class="modal-content">
            <form class="login-form">

                <div class="row">
                  <div class="input-field col s12">
                    <input placeholder="Email" id="email" type="text" class="validate">
                    <label for="email" class="center-align"></label>
                  </div>
                </div>
                <div class="row">
                  <div class="input-field col s12">

                    <input placeholder="password" id="password" type="password">
                    <label for="password" class="center-align"></label>
                  </div>
                </div>

                <div class="row">
                  <div class="input-field col s12">
                    <a href="index.html" class="btn btn-orange col s12">Sign Up</a>
                  </div>
                </div>

                <div class="row space-bot">
                  <div class="input-field col s12 center">
                    <p class="medium-small center"><a class="modal-trigger" href="#modal1">Already got an account ? Log in now !</a></p>
                  </div>
                </div>
          </form>
        </div><!-- fin modal content-->
    </div><!-- FIN MODAL REGISTER-->

</header>