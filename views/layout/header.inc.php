<!DOCTYPE html>
<html>
<head>
    <?php echo BASE_HOME ?>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <!--Website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?php echo TITLE_HEAD ?></title>
    <!--Import CSS -->
    <link href="assets/css/materialize.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css">
    <!--Import Google Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="grey lighten-4">
<header>
    <nav>
        <div class="nav-wrapper">
              <a href="?" class="brand-logo"><img src="assets/img/logov1.png" alt="logo"></a>
              <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a class="btn btn-menu" href="event/home">Create event</a></li>
                  <?php if(!isset($_SESSION['user_email'])) { ?>
                <li><a onClick="ga('send', 'clic', 'Log In');" class="modal-trigger" href="#login">Log In</a></li>
                <li><a onClick="ga('send', 'clic', 'Sign Up');" class="modal-trigger" href="#signup">Sign Up</a></li>
                  <?php } else { ?>
                  <li><a onClick="ga('send', 'clic', 'Profile');" href="?module=profile"> My Profile</a></li>
                  <li><a onClick="ga('send', 'clic', 'Disconnect');" href="?module=user&action=disconnect">Disconnect</a></li>
                  <?php } ?>
                <li><a onClick="ga('send', 'clic', 'Help');" href="#">Help</a></li>
              </ul>
            <ul id="slide-out" class="side-nav">
                <li><a href="event/home">Create event</a></li>
                <?php if(!isset($_SESSION['user_email'])) { ?>
                <li><a class="modal-trigger" href="#login">Log In</a></li>
                <li><a class="modal-trigger" href="#signup">Sign Up</a></li>
                <?php } else { ?>
                <li><a href="#">My Profile</a></li>
                <li><a href="?module=user&action=disconnect">Disconnect</a></li>
                <?php } ?>
                <li><a href="#">Help</a></li>
            </ul>
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
        </div>
    </nav>

    <!-- MODAL LOGIN (SIGN IN)-->
    <div id="login" class="modal login-card">
        <div class="row col s12">
        <h4 class="titre-login">Log In</h4>
        </div>
        <div class="modal-content">
            <form class="login-form" action="?module=user&action=connect" method="post">
                <div class="row">
                  <div class="input-field col s12">
                      <input placeholder="Email" id="email" type="email" class="validate" name="email" required="required">
                      <label for="email" class="center-align"></label>
                  </div>
                </div>

                <div class="row">
                  <div class="input-field col s12">
                      <input placeholder="Password" id="password" type="password" name="password" required="required">
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
                      <button id="submit" class="btn waves-effect waves-light" type="submit" name="action">Log In</button>
                  </div>
                </div>

                <div class="row space-bot">
                  <div class="input-field col s6 m6 l6">
                      <p class="medium-small"><a class="modal-trigger" href="#signup">Register now!</a></p>
                  </div>
                  <div class="input-field col s6 m6 l6">
                      <p class="margin right-align medium-small"><a href="page-forgot-password.html">Forgot password ?</a></p>
                  </div>
                </div>
          </form>
        </div><!-- fin modal content-->
    </div><!-- FIN MODAL LOG IN-->

    <!-- MODAL REGISTER (SIGN UP)-->
    <div id="signup" class="modal login-card">
        <div class="row col s12">
        <h4 class="titre-login">Join us now !</h4>
        </div>
        <div class="modal-content">
            <form class="login-form" action="?module=user&action=signup" method="post">
                <div class="row">
                    <div class="col s12 m6">
                        <a class="btn btn-fb"><img class="sociallog" src="assets/img/fbmini.png" alt="facebook"></a>
                    </div>
                    <div class="col s12 m6">
                        <a class="btn btn-tw"><img class="sociallog" src="assets/img/twmini.png" alt="twitter"></a>
                    </div>
                </div>

                <div class="row">
                  <div class="input-field col s12">
                    <input placeholder="Your Email" id="email" type="email" class="validate" name="email" required="required">
                    <label for="email" class="center-align"></label>
                  </div>
                </div>

                <div class="row">
                  <div class="input-field col s12">
                      <input placeholder="Your Password" id="password" type="password" name="password" required="required">
                      <label for="password" class="center-align"></label>
                  </div>
                </div>

                <div class="row">
                  <div class="input-field col s12">
                      <button id="submit" class="btn waves-effect waves-light" type="submit" name="action">Sign Up</button>
                  </div>
                </div>

                <div class="row space-bot">
                  <div class="input-field col s12 center">
                    <p class="medium-small center"><a class="modal-trigger" href="#login">Already got an account ? Log in now !</a></p>
                  </div>
                </div>
          </form>
        </div><!-- fin modal content-->
    </div><!-- FIN MODAL REGISTER-->

</header>
