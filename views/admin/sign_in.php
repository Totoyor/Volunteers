<!DOCTYPE html>
<!--[if lt IE 7]>  <html class="lt-ie7"> <![endif]-->
<!--[if IE 7]>     <html class="lt-ie8"> <![endif]-->
<!--[if IE 8]>     <html class="lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html>
<!--<![endif]-->

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Volunteers - Admin</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
  <link rel="icon" type="image/png" href="../assets/admin/_con/images/icon.png">
  <!-- nanoScroller -->
  <link rel="stylesheet" type="text/css" href="../assets/admin/nanoScroller/nanoscroller.css" />
  <!-- FontAwesome -->
  <link rel="stylesheet" type="text/css" href="../assets/admin/font-awesome/css/font-awesome.min.css" />
  <!-- Material Design Icons -->
  <link rel="stylesheet" type="text/css" href="../assets/admin/material-design-icons/css/material-design-icons.min.css" />
  <!-- Main -->
  <link rel="stylesheet" type="text/css" href="../assets/admin/_con/css/_con.min.css" />
  <!-- Custom -->
  <link rel="stylesheet" type="text/css" href="../assets/admin/style.css" />
</head>
<body>
  <section id="sign-in">

    <!-- Background Bubbles -->
    <canvas id="bubble-canvas"></canvas>
    <!-- /Background Bubbles -->

    <!-- Sign In Form -->
    <form action="signin" method="post">
      <div class="row links">
        <div class="col s6 logo">
          <img src="../assets/img/logo_volonteers3.svg" alt="logo">
        </div>
        <div class="col s6 right-align"><a href="<?= PATH_HOME ?>">Back to the website</a>
        </div>
      </div>

      <div class="card-panel clearfix">

        <!-- Username -->
        <div class="input-field">
          <i class="mdi-action-account-circle prefix"></i>
          <input name="username" id="username-input" type="email" class="validate" required>
          <label for="username-input">Username</label>
        </div>
        <!-- /Username -->

        <!-- Password -->
        <div class="input-field">
          <i class="mdi-action-lock-outline prefix"></i>
          <input name="password" id="password-input" type="password" class="validate" required>
          <label for="password-input">Password</label>
        </div>
        <!-- /Password -->

        <button class="waves-effect waves-light btn-large z-depth-0 z-depth-1-hover">Sign In</button>
      </div>

      <div class="links right-align">
        <!--<a href="page-forgot-password.html">Forgot Password?</a>-->
      </div>

    </form>
    <!-- /Sign In Form -->

  </section>
    <footer>&copy; 2016 <strong>Volunteers</strong>. All rights reserved.
  </footer>
  <!-- jQuery -->
  <script type="text/javascript" src="../assets/admin/jquery/jquery.min.js"></script>
  <!-- nanoScroller -->
  <script type="text/javascript" src="../assets/admin/nanoScroller/jquery.nanoscroller.min.js"></script>
  <!-- Materialize -->
  <script type="text/javascript" src="../assets/admin/materialize/js/materialize.min.js"></script>
  <!-- Main -->
  <script type="text/javascript" src="../assets/admin/_con/js/_con.min.js"></script>
  <!-- Custom script -->
  <script type="text/javascript" src="../assets/admin/script.js"></script>
</body>
</html>
<!-- Localized -->